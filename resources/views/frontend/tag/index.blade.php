@extends('frontend.master')

@section('content')

    <h2>All Tags</h2>
    <ul class="row">
        @foreach($tags as $tag)
            <li>{!! link_to_route('frontend.tag.show', $tag->name, [$tag->slug]) !!}</li>
        @endforeach
    </ul><!-- /.row -->
@endsection