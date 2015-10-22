@extends('master')

@section('content')
    <h2>Edit Post</h2>

    {!! Form::model($post, ['route' => ['post.update', $post->slug], 'method' => 'PATCH']) !!}
        <div class="form-group">
            {!! Form::label('title') !!}
            {!! Form::text('title', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('description') !!}
            {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('slug') !!}
            {!! Form::text('slug', null, ['class' => 'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('tags') !!}
            {!! Form::select('tags[]', $tags, $post->tags->lists('id')->toArray(), ['class' => 'form-control', 'multiple' => 'multiple']) !!}
        </div>

        {!! Form::submit('Update Post', ['class' => 'btn btn-primary btn-block']) !!}
    {!! Form::close() !!}

    {!! Form::open(['route' => ['post.destroy', $post->slug], 'method' => 'DELETE']) !!}
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