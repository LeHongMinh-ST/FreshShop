<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Product;
use App\User;
use App\User_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $users = DB::table('users')->get();
        $this->authorize('viewAny', Auth::user());

        $users = User::where('role', '<>', 0)->paginate(9);
        return view('backend.user.list')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('viewAny', Auth::user());
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        $this->authorize('create', User::class);
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->phone = $request->get('phone');
        $user->role = $request->get('role');
        $success = $user->save();
        if ($success)
            $request->session()->flash('success', 'Tao mới thành công nhân viên ' .$user->name);
        else
            $request->session()->flash('error', 'Tạo mới thất bại');

        return redirect()->route('User.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $products = $user->Products;
        $posts = $user->Posts;
        $date_post = $user->Posts()->select(DB::raw('date(created_at) as ngay'))
            ->orderBy('ngay','desc')
            ->groupBy(DB::raw('date(created_at)'))
            ->get();

        $dates = $this->getDateCreated($products);
        if ($dates){
            $dates = array_reverse($dates);
            return view('backend.user.show')->with([
                'user' => $user,
                'products' => $products,
                'dates' => $dates,
                'date_post'=>$date_post,
                'posts'=>$posts
            ]);
        } else return view('backend.user.show')->with([
            'user' => $user,
            'products' => $products,
            'date_post'=>$date_post,
            'posts'=>$posts
            ]);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
//        dd($request->all());
        $user = User::find($id);

        $this->authorize('update', $user);
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->phone = $request->get('phone');

        if ($request->hasFile('avatar')) {
            if ($user->avatar != 'default-avatar.png') {
                $img = 'storage/images/user/avatar' . $user->avatar;
                File::delete($img);
            }
            $avatar = $request->file('avatar');
            $profileavatar = date('YmdHis') . "." . $avatar->getClientOriginalExtension();
            Storage::disk('public')->putFileAs('images/user/avatar', $avatar, $profileavatar);
            $user->avatar = $profileavatar;
        }
        $success = $user->save();

        if ($success)
            $request->session()->flash('success', 'Cập nhật thành công ');
        else
            $request->session()->flash('error', 'Cập nhật thất bại');

        return redirect()->route('User.show', $user->id);
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::find($id);
        $user->role = $request->get('role');
        $success = $user->save();
        if ($success)
            $request->session()->flash('success', 'Cập nhật thành công chức vụ cho nhân viên ' .$user->name);
        else
            $request->session()->flash('error', 'Cập nhật thất bại');

        return redirect()->route('User.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $this->authorize('delete', $user);

        $success = $user->delete();

        if ($success)
            session()->flash('success', 'Khóa thành công tài khoản '. $user->name);
        else
            session()->flash('error', 'Khóa thất bại');
        return redirect()->route('User.index');
    }

    public function trashed()
    {
        $users = User::onlyTrashed()->where('role', '<>', 0)->paginate(6);
        return view('backend.user.trashed')->with(['users' => $users]);
    }

    public function restore($id)
    {
        $user = User::onlyTrashed()->find($id);
        $success = $user->restore();

        if ($success)
            session()->flash('success', 'Khôi phục thành công tài khoản '. $user->name);
        else
            session()->flash('error', 'Khôi phục thất bại');

        return redirect()->route('User.index');
    }

    public function hardDelete($id)
    {
        $user = User::onlyTrashed()->find($id);
        if ($user->avatar != 'default-avatar.png') {
            $img = 'storage/images/user/avatar' . $user->avatar;
            File::delete($img);
        }
        $success = $user->forceDelete();

        if ($success)
            session()->flash('success', 'Xóa thành công '.$user->name);
        else
            session()->flash('error', 'Xóa thất bại');

        return redirect()->route('User.trashed');
    }

    public function getDateCreated($products)
    {
        foreach ($products as $product) {
            $date[] = date_format($product->created_at, 'j M \.\ Y');
        }

        if (isset($date)) return array_unique($date);
        else return 0;
    }

    public function search(Request $request)
    {
        $this->authorize('viewAny', Auth::user());
        $key = $request->get('key');
        $users = User::where('name','like', '%'. $key.'%')->paginate(9);
        return view('backend.user.list')->with(['users' => $users,'key'=>$key]);
    }
}
