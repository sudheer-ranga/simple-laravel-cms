@extends('frontend.master')

@section('content')
    <p>Edit this comment</p>
    {!! Form::model($comment, ['route' => ['frontend.withauth.post.comment.update', $comment->post->slug, $comment->id], 'method' => 'PATCH']) !!}
    {!! Form::label('comment') !!}
    {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}

    {!! Form::submit('Update Comment', ['class' => 'btn btn-primary btn-block']) !!}

    {!! Form::close() !!}
@endsection