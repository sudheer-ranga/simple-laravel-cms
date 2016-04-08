<?php

namespace App\Http\Controllers\FrontEnd;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use \App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd("Front Page");
        $posts = Post::all()->sortByDesc('updated_at');
        return view('frontend.post.index', compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::whereSlug($slug)->first();
//        $posts = Post::with('comments')->get();
//        $post = $posts->where('slug', $slug)->first();
        return view('frontend.post.show', compact('post'));

    }
}
