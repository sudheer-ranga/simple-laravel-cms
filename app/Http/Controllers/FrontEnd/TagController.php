<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Requests;
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
        return view('frontend.tag.index', compact('tags'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
//        return "Single Tag View Page";
        $tag = Tag::whereSlug($slug)->first();
//        $posts = $tag->posts()->get();
        return view('frontend.tag.show', compact('tag'));
    }
}
