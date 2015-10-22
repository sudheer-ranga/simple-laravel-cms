@extends('master')

@section('content')
    <h2>{!! $post->title !!}</h2>
    <p>{!! $post->description !!}</p>
    {!! link_to_route('post.edit', "Edit", [$post->slug], ['class' => 'btn btn-primary']) !!}

    {!! Form::open(['route' => ['post.destroy', $post->slug], 'method' => 'DELETE']) !!}
        <button class="btn btn-danger">Delete</button>
    {!! Form::close() !!}
@endsection