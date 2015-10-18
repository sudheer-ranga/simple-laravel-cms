@extends('master')

@section('content')
    <h1>{!! $post->title !!}</h1>
    <p>{!! $post->description !!}</p>


    {!! Form::open(['route' => ['post.trash.update', $post->slug], 'method' => 'PATCH']) !!}
        <button class="btn btn-primary btn-block">Restore Post</button>
    {!! Form::close() !!}

    {!! Form::open(['route' => ['post.trash.destroy', $post->slug], 'method' => 'DELETE']) !!}
        <button class="btn btn-danger btn-block">Delete Permanently</button>
    {!! Form::close() !!}
@endsection