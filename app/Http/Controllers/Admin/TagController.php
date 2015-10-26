<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Requests\Admin\CreateTagRequest;
use App\Http\Requests\Admin\UpdateTagRequest;
use App\Http\Controllers\Controller;

use \App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();
//        dd($tags->toArray());
        return view('admin.tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CreateTagRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        $tag = new Tag($request->all());
        \Auth::user()->tags()->save($tag);

        return redirect()->route('admin.tag.index')->with('message', 'Tag was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        $posts = $tag->posts()->get();
//        foreach($posts as $post) {
//            var_dump($post->title);
//        }
//        dd();
//        dd($posts[1]->title);
//        dd($posts);
        return view('admin.tag.show', compact('tag', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        return view('admin.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTagRequest $request;
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $slug)
    {
        $tag = Tag::whereSlug($slug)->first();
        $tag->fill($request->all())->save();

        return redirect()->route('admin.tag.index')
            ->with('message', 'Tag was changed successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $tag_id = Tag::whereSlug($slug)->first();
        Tag::destroy($tag_id->id);

        return redirect()->route('admin.tag.index')->with('message', 'Tag was deleted Successfully');
    }
}
