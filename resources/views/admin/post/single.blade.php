@extends('admin.master')

@section('content')
    <h2>{!! $post->title !!}</h2>
    <p>{!! $post->description !!}</p>
    <h5>Tags:</h5>
    <ul>
        @foreach($post->tags as $tag)
            <li>{!! link_to_route('admin.tag.show', $tag->name, [$tag->id]) !!}</li>
        @endforeach
    </ul>
    {!! link_to_route('admin.post.edit', "Edit", [$post->slug], ['class' => 'btn btn-primary']) !!}

    {!! Form::open(['route' => ['admin.post.destroy', $post->slug], 'method' => 'DELETE']) !!}
        <button class="btn btn-danger">Delete</button>
    {!! Form::close() !!}
@endsection