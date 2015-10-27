<?php

namespace App\Http\Controllers\FrontEnd\WithAuth;

use Gate;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Gate::denies('post-comment')) {
            return redirect()->back()->with('message', 'Please Login to Comment');
        }

        $comment = new Comment($request->all());

        $post = Post::whereSlug($request->post)->first();

        $comment->post()->associate($post->id);
        \Auth::user()->comments()->save($comment);

        return redirect()->back()->with('message', 'Comment Successfully Added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug, $id)
    {
        $comment = Comment::findOrFail($id);

        if (Gate::denies('edit-comment', $comment)) {
            return redirect()->route('frontend.post.show', $comment->post->slug)->with('message', 'You are not authorized to edit this comment');
        }

        return view('frontend.withauth.comment.edit', compact('comment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug, $id)
    {
        $comment = Comment::findOrFail($id);

//        if ($request->user()->cannot('update-comment', $comment)) {
//            return redirect()->route('frontend.post.show', $comment->post->slug)->with('message', 'You are not authorized to edit this comment');
//        }

        if (Gate::denies('edit-comment', $comment)) {
            return redirect()->route('frontend.post.show', $comment->post->slug)->with('message', 'You are not authorized to edit this comment');
        }

        $comment->fill($request->all());
        $comment->save();

        return redirect()->route('frontend.post.show', $comment->post->slug)->with('message', 'Your comment has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $slug
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return redirect()->route('frontend.post.show', $comment->post->slug)->with('message', 'Your comment has been deleted!');
    }
}
