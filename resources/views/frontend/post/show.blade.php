@extends('frontend.master')

@section('content')
    <h2>{!! $post->title !!}</h2>
    <p>{!! $post->description !!}</p>
    <h5>Tags:</h5>
    <ul>
        @foreach($post->tags as $tag)
                    <li>{!! link_to_route('frontend.tag.show', $tag->name, [$tag->slug]) !!}</li>
        @endforeach
    </ul>

    <h2>Comments</h2>

    {!! Form::open(['route' => 'frontend.withauth.post.comment.store']) !!}
        {!! Form::label('comment') !!}
        {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}

        {!! Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block']) !!}

    {!! Form::close() !!}

@endsection