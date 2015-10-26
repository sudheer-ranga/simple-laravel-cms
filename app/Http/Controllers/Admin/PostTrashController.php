<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use \App\Http\Requests;
use \App\Http\Controllers\Controller;
use \App\Post;
use \App\Tags;

class PostTrashController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::onlyTrashed()->get()->sortByDesc('deleted_at');
        return view('admin.post.trash.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function create()
//    {
//        return "Delete this create method";
//    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
//    public function store(Request $request)
//    {
//        return "Store Trash. I think need to delete this";
//    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::onlyTrashed()->where('slug', $slug)->first();
//        dd($post);
        return view('admin.post.trash.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
//    public function edit($id)
//    {
//        return "Edit the Trashed Posts";
//    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        Post::onlyTrashed()->where('slug', $slug)->first()->restore();
        return redirect(route('admin.post.trash.index'))->with('message', 'Post has been restored!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        Post::onlyTrashed()->where('slug', $slug)->first()->forceDelete();
        return redirect(route('admin.post.trash.index'))->with('message', 'Post has been deleted permanently!');
    }
}
