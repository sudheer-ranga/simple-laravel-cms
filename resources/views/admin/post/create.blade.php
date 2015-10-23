@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Create Post</h2>

            {!! Form::open(['route' => 'admin.post.index']) !!}
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
                    {!! Form::select('tags[]', $tags, null, ['class' => 'form-control', 'multiple' => 'multiple']) !!}
                </div>

                {!! Form::submit('Add Post', ['class' => 'btn btn-primary btn-block']) !!}

            {!! Form::close() !!}
        </div>
    </div>

    @if($errors->any())
        <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
        </ul>
    @endif

@endsection