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

    @if ($post->comments->count() > 0)
        <div class="list-group">
            @foreach ($post->comments as $comment)
                <div class="list-group-item">
                    <p class="author"><b>{!! $comment->user->name !!} Commented</b></p>
                    <p>{{ $comment->comment }}</p>

                    @can('edit-comment', $comment)
                        {!! link_to_route('frontend.withauth.post.comment.edit', 'Edit Comment', [$post->slug, $comment->id], ["class" => "btn btn-primary"]) !!}
                        {!! Form::open(['route' => ['frontend.withauth.post.comment.destroy', $post->slug, $comment->id], 'method' => 'DELETE', "class" => "inline"]) !!}
                            <button class="btn btn-danger">Delete</button>
                        {!! Form::close() !!}
                    @endcan

                </div>
            @endforeach
        </div>
    @else
        <p>No Comments Yet</p>
    @endif

    @can('post-comment', $post)
        {!! Form::open(['route' => ['frontend.withauth.post.comment.store', $post->slug]]) !!}
            {!! Form::label('comment') !!}
            {!! Form::textarea('comment', null, ['class' => 'form-control']) !!}

            {!! Form::submit('Add Comment', ['class' => 'btn btn-primary btn-block']) !!}

        {!! Form::close() !!}
    @else
        Please {!! link_to_route('login', 'login', [], []) !!} to comment
    @endcan

@endsection