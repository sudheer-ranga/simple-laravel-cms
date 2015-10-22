<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreatePostRequest;
use App\Http\Controllers\Controller;
use \App\Post;
use \App\Tag;

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
        $tags = Tag::lists('name', 'id');
        return view('post.create', compact('tags'));
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
//        dd($request->input('tags'));
//        $post = new Post;
//        $post->fill($request->all());
//        $post->save();
        $post = Post::create($request->all());
        $post->tags()->attach($request->input('tags'));
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
//        dd($post->tags->toArray());
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
        $tags = Tag::lists('name', 'id');
        return view('post.edit', compact('post', 'tags'));
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

//        var_dump($request->input('tags'));
//        dd($post->tags()->lists('id')->toArray());

//        $tag_ids = $post->tags()->lists('id')->toArray();
//        $post->tags()->detach($tag_ids);
//        $post->tags()->attach($request->input('tags'));

//        Using Sync instead of detach and attach for updating the tags to an post
        $post->tags()->sync($request->input('tags'));
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
