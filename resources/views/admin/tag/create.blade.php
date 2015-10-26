@extends('admin.master')

@section('content')
    <div class="container">
        <div class="row">
            <h2>Create Tag</h2>

            {!! Form::open(['route' => 'admin.tag.index']) !!}

                <div class="form-group">
                    {!! Form::label('name') !!}
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                </div>

                {!! Form::submit('Add Tag', ['class' => 'btn btn-primary btn-block']) !!}

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