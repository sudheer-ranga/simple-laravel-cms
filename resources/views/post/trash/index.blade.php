@extends('master')

@section('content')

    <h2>Trashed Posts</h2>

    <div class="row">
        <div class="col-sm-12">
        @if($posts->isEmpty())
            <p>There are no posts in trash</p>
        @else

            @if($posts->count() == 1)
                <p>There is {{ $posts->count() }} post in trash</p>
            @else
                <p>There are {{ $posts->count() }} posts in trash</p>
            @endif

            @foreach($posts as $post)
                @include('post.trash._trash_list')
            @endforeach
        @endif
        </div><!-- /.col -->
    </div><!-- /.row -->
@endsection