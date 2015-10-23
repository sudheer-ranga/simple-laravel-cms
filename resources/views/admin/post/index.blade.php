@extends('admin.master')

@section('content')

    <h2>All Posts</h2>
    {!! link_to_route('admin.post.create', 'Create Post', [], ['class' => 'btn btn-primary']) !!}
    <div class="row">
        @foreach($posts as $post)
            @include('admin.post._post_list')
        @endforeach
    </div><!-- /.row -->
@endsection