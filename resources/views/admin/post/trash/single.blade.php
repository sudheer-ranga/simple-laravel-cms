@extends('admin.master')

@section('content')
    <h2>{!! $post->title !!}</h2>
    <p>{!! $post->description !!}</p>

    <ul>
        @foreach($post->tags as $tag)
            <li>{{ $tag->name }}</li>
        @endforeach
    </ul>

    {!! Form::open(['route' => ['admin.post.trash.update', $post->slug], 'method' => 'PATCH']) !!}
        <button class="btn btn-primary btn-block">Restore Post</button>
    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.post.trash.destroy', $post->slug], 'method' => 'DELETE']) !!}
        <button class="btn btn-danger btn-block">Delete Permanently</button>
    {!! Form::close() !!}
@endsection