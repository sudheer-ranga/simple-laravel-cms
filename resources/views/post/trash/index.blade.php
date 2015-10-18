@extends('master')

@section('content')

    <h1>Trashed Posts</h1>

    {{--{{ dd($posts) }}--}}

    @if($posts->isEmpty())
        <p>There are no posts in trash</p>
    @else

        @if($posts->count() == 1)
            <p>There is {{ $posts->count() }} post in trash</p>
        @else
            <p>There are {{ $posts->count() }} posts in trash</p>
        @endif

        @foreach($posts as $post)
            <div class="col-xs-12">
                <h2>
                    {!! link_to_route('post.trash.show', $post->title, [$post->slug]) !!}
                </h2>
                <p>{!! $post->description !!}</p>
            </div><!-- /.col -->
        @endforeach
    @endif
@endsection