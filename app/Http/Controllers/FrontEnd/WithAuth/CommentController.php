<?php

namespace App\Http\Controllers\FrontEnd\WithAuth;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "List comments for a post";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return "Create a comment for a post";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->input('comment'));
        $comment = new Comment($request->all());
        \Auth::user()->comments()->save($comment);
//        dd($comment->post()->title);
//        dd($request->post);

//        $post = new Post;

//        $comment->post()->attach($request->input('comment'));
//        $comment->post()->associate($post);
//        $comment->save();
//        dd($comment->post());

//        dd($request->user()->id);
        return "Store a comment in the database";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "Show single comment. Not needed.";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "Edit a comment for a particular post and particular user";
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
        return "Update a comment for a particular post and particular user";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "Delete a comment for a particular post and particular user";
    }
}
