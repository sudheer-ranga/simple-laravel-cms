@extends('master')

@section('content')
    <h2>All Posts</h2>
    <div class="row">
        @foreach($posts as $post)
            @include('post._post_list')
        @endforeach
    </div><!-- /.row -->
@endsection