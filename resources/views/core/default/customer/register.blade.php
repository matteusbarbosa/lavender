@extends('layouts.single')

@section('head.title')
Reset Password
@stop

@section('content')

    <h2>New customer</h2>

    @workflow('customer_register')

@stop