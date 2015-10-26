<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\CreatePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
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
//        $user = \Auth::user();
//        $posts = $post->get();
        $posts = Post::all()->sortByDesc('updated_at');
        return view('admin.post.index', compact('posts'));
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
        return view('admin.post.create', compact('tags'));
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

//        $post = Post::create($request->all());

        $post = new Post($request->all());
        \Auth::user()->posts()->save($post);

//        dd($post->tags());

        $post->tags()->attach($request->input('tags'));
        return view('admin.post.show', compact('post'));

//        return redirect()->route('admin.post.show')
//            ->with('post', $post)
//            ->with('message', 'Post has been created successfully!');
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
//        dd($post->tags->toArray());
        $post = Post::whereSlug($slug)->first();
        return view('admin.post.show', compact('post'));
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
        return view('admin.post.edit', compact('post', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, $slug)
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

        return redirect()->route('admin.post.index')
            ->with('message', 'Post was updated successfully');
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
        return redirect()->route('admin.post.index')
            ->with('message', 'Post has been deleted!');
    }
}
