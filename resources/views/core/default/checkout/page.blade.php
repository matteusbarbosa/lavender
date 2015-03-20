@extends('layouts.single')

@section('head.title')
    Shopping Cart
@stop

@section('content')

    @workflow('checkout')

@stop