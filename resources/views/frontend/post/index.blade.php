@extends('frontend.master')

@section('content')

    <h2>All Posts</h2>
    <div class="row">
        @foreach($posts as $post)
            @include('frontend.post._post_list')
        @endforeach
    </div><!-- /.row -->
@endsection