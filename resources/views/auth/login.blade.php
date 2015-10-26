@extends('auth.master')

@section('content')

@if($errors->any())
    <ul class="alert alert-danger">
        @foreach($errors->all() as $error)
            <li>{!! $error !!}</li>
        @endforeach
    </ul>
@endif

<!-- resources/views/auth/login.blade.php -->
{!! Form::open([route('login')]) !!}

    {!! csrf_field() !!}

    <div class="form-group">
        {!! Form::label('email') !!}
        {!! Form::email('email', Input::old('email'), ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password') !!}
        {!! Form::password('password', ['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('remember') !!}
        {!! Form::checkbox('remember', 'remember') !!}
    </div>

    <button type="submit" class="btn btn-primary">Login</button>

    {!! link_to_route('register', "Register", [], ['class' => 'btn btn-primary']) !!}

{!! Form::close() !!}

@endsection
