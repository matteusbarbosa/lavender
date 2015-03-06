@extends('layouts.rightcol')

@section('head.title')
    Shopping Cart
@stop

@section('content')

    @workflow('checkout')

@stop

@section('sidebar')
    <p>Checkout review:</p>
@stop