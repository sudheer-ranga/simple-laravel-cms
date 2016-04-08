@extends('frontend.master')

@section('content')
    <h2>{!! $tag->name !!}</h2>

    <div class="row">
        @foreach($tag->posts as $post)
            @include('frontend.post._post_list')
        @endforeach
    </div><!-- /.row -->

@endsection