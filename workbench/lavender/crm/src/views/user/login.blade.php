@extends('cms::default')

@section('content')
<h1>Login / Register</h1>

<ul class="login-list">
    <li>
        <div class="title"><h3>Login</h3></div>
        {{ Form::open(array('url' => 'crm/user/login', 'method' => 'post')) }}
        <ul class="form-list">
            <li>
                {{ Form::label('email', 'User:') }}
                {{ Form::text('email', Input::old('email'), array('placeholder' => 'your@email.com')) }}
            </li>
            <li>
                {{ Form::label('password', 'Pass:') }}
                {{ Form::password('password') }}
            </li>
            <li>
                {{ Form::submit('Login') }}
            </li>
        </ul>
        {{ Form::close() }}
    </li>
    <li>
        <div class="title"><h3>Register</h3></div>
        {{ Form::open(array('url' => 'crm/user/register', 'method' => 'post')) }}
        <ul class="content">
            @if($errors->first('email') || $errors->first('password'))
            <li>
                {{ $errors->first('email') }}
                {{ $errors->first('password') }}
            </li>
            @endif
            <li>
                {{ Form::label('email', 'User:') }}
                {{ Form::text('email', Input::old('email'), array('placeholder' => 'your@email.com')) }}
            </li>
            <li>
                {{ Form::label('password', 'Pass:') }}
                {{ Form::password('password') }}
            </li>
            <li>
                {{ Form::label('password_confirmation', 'Confirm Pass:') }}
                {{ Form::password('password_confirmation') }}
            </li>
            <li>
                {{ Form::submit('Register') }}
            </li>
        </ul>
        {{ Form::close() }}
    </li>
</ul>
@stop