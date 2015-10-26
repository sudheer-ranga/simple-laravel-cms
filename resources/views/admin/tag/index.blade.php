@extends('admin.master')

@section('content')

    <h2>All Tags</h2>
    {!! link_to_route('admin.tag.create', 'Create Tag', [], ['class' => 'btn btn-primary']) !!}

    <ul class="row">
        @foreach($tags as $tag)
            <li>{!! link_to_route('admin.tag.show', $tag->name, [$tag->slug]) !!}</li>
        @endforeach
    </ul><!-- /.row -->
@endsection