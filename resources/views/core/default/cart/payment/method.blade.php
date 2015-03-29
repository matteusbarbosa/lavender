@extends('cart.checkout')

@section('head.title')
    Checkout
@stop

@section('content')

    <h4>Your Payment Information:</h4>

    @workflow('payment_method')

@stop