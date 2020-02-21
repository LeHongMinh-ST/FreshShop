<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
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
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::paginate(6);
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
    public function store(Request $request)
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

        $post->save();

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
    public function update(Request $request, $id)
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

        $post->save();

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
        $post->delete();
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
        $post->restore();

        return redirect()->route('Post.index');
    }

    public function hardDelete($id)
    {
        $post = Post::onlyTrashed()->find($id);

        $thumbnail = 'storage/images/post/' . $post->thumbnail;
        File::delete($thumbnail);

        $post->forceDelete();
        return redirect()->route('Post.trashed');
    }
}
