@extends('layouts.rightcol')

@section('head.title')
Contact form
@stop

@section('sidebar')

<div class="title">
    <h5>Contact {{ Config::get('store.name') }}</h5>
</div>

<div class="content">
    <label>Email:</label>
    <address>{{ Config::get('store.email') }}</address>
    <label>Phone:</label>
    <address>{{ Config::get('store.phone') }}</address>
    <label>Address:</label>
    <address>{{ Config::get('store.address') }}</address>
    <label>Hours:</label>
    <address>{{ Config::get('store.hours') }}</address>
</div>



@stop

@section('content')

    <h2>Contact form:</h2>

    @workflow('contactform')

@stop