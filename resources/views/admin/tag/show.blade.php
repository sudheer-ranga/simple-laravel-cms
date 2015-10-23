@extends('admin.master')

@section('content')
    <h2>{!! $tag->name !!}</h2>
    {!! link_to_route('admin.tag.edit', "Edit", [$tag->id], ['class' => 'btn btn-primary']) !!}

    {!! Form::open(['route' => ['admin.tag.destroy', $tag->id], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger">Delete</button>
    {!! Form::close() !!}
@endsection