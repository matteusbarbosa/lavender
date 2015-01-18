@extends('layouts.single')

@section('head.title')
Forgot Password
@stop

@section('content')

    <h2>Forgot your password?</h2>

    @workflow('customer_forgot_password')

@stop