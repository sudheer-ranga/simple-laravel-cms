@extends('admin.master')

@section('content')
    <h2>Edit Post</h2>

    {!! Form::model($tag, ['route' => ['admin.tag.update', $tag->slug], 'method' => 'PATCH']) !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', null, ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('slug') !!}
        {!! Form::text('slug', null, ['class' => 'form-control']) !!}
    </div>

    {!! Form::submit('Update Post', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['admin.tag.destroy', $tag->slug], 'method' => 'DELETE']) !!}
    <button class="btn btn-danger btn-block">Delete</button>
    {!! Form::close() !!}

    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    @endif
@endsection