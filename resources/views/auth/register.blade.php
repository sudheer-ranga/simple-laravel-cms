@extends('auth.master')

@section('content')
<!-- resources/views/auth/register.blade.php -->

@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif

{!! Form::open([route('register')]) !!}
    {!! csrf_field() !!}
    <div class="form-group">
        {!! Form::label('name') !!}
        {!! Form::text('name', Input::old('name') , ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::email('email', Input::old('email'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password_confirmation') !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    </div>

    <button type="submit" class="btn btn-primary">Register</button>

{!! Form::close() !!}

@endsection