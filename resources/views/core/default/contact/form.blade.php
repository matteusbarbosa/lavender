@extends('layouts.rightcol')

@section('head.title')
Contact form
@stop

@section('sidebar')

<div class="title">
    <h5>Contact {{ config('store.name') }}</h5>
</div>

<div class="content">
    <label>Email:</label>
    <address>{{ config('store.email') }}</address>
    <label>Phone:</label>
    <address>{{ config('store.phone') }}</address>
    <label>Address:</label>
    <address>{{ config('store.address') }}</address>
    <label>Hours:</label>
    <address>{{ config('store.hours') }}</address>
</div>



@stop

@section('content')

    <h2>Contact form:</h2>

    @workflow('contact')

@stop