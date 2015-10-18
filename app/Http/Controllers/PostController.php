<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;
use \App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $posts = $post->get();
        $posts = Post::all();
        return view('post.index', compact('posts'));
//
//        dd($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {
//        dd($request);
//        $post = new Post;
//        $post->fill($request->all());
//        $post->save();
        Post::create($request->all());
        return redirect(route('post.index'))->with('message', 'Post has been created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
//        dd($post);
        $post = Post::whereSlug($slug)->first();
        return view('post.single', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $post = Post::whereSlug($slug)->first();
        return view('post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CreatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(CreatePostRequest $request, $slug)
    {
        $post = Post::whereSlug($slug)->first();
        $post->fill($request->all());
//        $post->title = $request->title;
//        $post->description = $request->description;
        $post->save();
        return view('post.single', compact('post'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::whereSlug($slug)->first();
        $post->delete();
        return redirect(route('post.index'))->with('message', 'Post has been deleted!');
    }
}
