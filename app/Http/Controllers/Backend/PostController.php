<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        dd("Minh");
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::latest()->paginate(6);
        foreach ($posts as $post)
        {
            $post->user = $post->User->name;
        }

        return view('backend.post.list')->with(['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
//        dd($request);
        $post = new Post();
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->description = $request->get('description');
        $post->slug = Str::slug($post->title);
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('thumbnail')) {

            $thumbnail_old = 'storage/images/post/' . $post->thumbnail;
            File::delete($thumbnail_old);

            $thumbnail = $request->file('thumbnail');
            $path = 'images/post';
            $profie = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            Storage::disk('public')->putFileAs($path, $thumbnail, $profie);
            $post->thumbnail = $profie;
        }

        $success = $post->save();
        if ($success)
            $request->session()->flash('success', 'Tao mới thành công bài viết '.$post->name);
        else
            $request->session()->flash('error', 'Tạo mới thất bại');

        return redirect()->route('Post.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
//        dd($post->Images);
        return view('backend.post.update')->with(['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePostRequest $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');
        $post->description = $request->get('description');
        $post->slug = Str::slug($post->title);
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->file('thumbnail');
            $path = 'images/post';
            $profie = date('YmdHis') . "." . $thumbnail->getClientOriginalExtension();
            Storage::disk('public')->putFileAs($path, $thumbnail, $profie);
            $post->thumbnail = $profie;
        }

        $success = $post->save();
        if ($success)
            $request->session()->flash('success', 'Cập nhật thành công bài viết '.$post->name);
        else
            $request->session()->flash('error', 'Gỡ thất bại');

        return redirect()->route('Post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $success = $post->delete();
        if ($success)
            session()->flash('success', 'Gỡ thành công  bài viết '.$post->name);
        else
            session()->flash('error', 'Gỡ thất bại');
        return redirect()->route('Post.index');
    }

    public function trashed()
    {
        $posts = Post::onlyTrashed()->paginate(6);

        foreach ($posts as $post)
        {
            $post->user = $post->User->name;
        }

        return view('backend.post.trashed')->with(['posts'=>$posts]);

    }

    public function restore($id)
    {
        $post = Post::onlyTrashed()->find($id);
        $success = $post->restore();
        if ($success)
            session()->flash('success', 'Khôi phục thành công  bài viết '.$post->name);
        else
            session()->flash('error', 'Khôi phục thất bại');
        return redirect()->route('Post.index');
    }

    public function hardDelete($id)
    {
        $post = Post::onlyTrashed()->find($id);

        $thumbnail = 'storage/images/post/' . $post->thumbnail;
        File::delete($thumbnail);

        $success = $post->forceDelete();
        if ($success)
            session()->flash('success', 'Xóa thành thành công  bài viết '.$post->name);
        else
            session()->flash('error', 'Xóa thất bại');
        return redirect()->route('Post.trashed');
    }

    public function search(Request $request)
    {
        $key = $request->get('key');
        $role = $request->get('role');
        $posts = Post::where('title','like','%'.$key.'%')->paginate(9);
        foreach ($posts as $post)
        {
            $post->user = $post->User->name;
        }
        if ($role == 1 )
        {
            return view('frontend.page.post.posts')->with([
                'posts' => $posts,
                'key'=>$key
            ]);
        }else {
            return view('backend.post.list')->with([
                'posts' => $posts,
                'key'=>$key
            ]);
        }

    }
}
