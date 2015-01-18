@extends('layouts.split')

@section('head.title')
Register or Login
@stop

@section('left.top')
<h5>New Customers</h5>
<p>By creating an account with our store, you will be able to view and track your orders.</p>
@stop

@section('left')
    @workflow('new_customer')
@stop

@section('right.top')
<h5>Registered Customers</h5>
<p>If you have an account with us, please log in.</p>
@stop

@section('right')
    @workflow('existing_customer')
@stop