@extends('master')

@section('content')
    <h1>List Posts</h1>

    @foreach($posts as $post)
        <div class="col-xs-12">
            <h2>
                {!! link_to_route('post.show', $post->title, [$post->slug]) !!}
            </h2>
            <p>{!! $post->description !!}</p>
        </div><!-- /.col -->
    @endforeach
@endsection