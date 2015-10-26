@extends('admin.master')

@section('content')
    <h2>{!! $tag->name !!}</h2>
    {!! link_to_route('admin.tag.edit', "Edit", [$tag->slug], ['class' => 'btn btn-primary']) !!}

    {!! Form::open(['route' => ['admin.tag.destroy', $tag->slug], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger">Delete</button>
    {!! Form::close() !!}

    <div class="row">
        @foreach($posts as $post)
            @include('admin.post._post_list')
        @endforeach
    </div><!-- /.row -->

@endsection