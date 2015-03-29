@extends('cart.checkout')

@section('head.title')
    Checkout
@stop

@section('content')

    <h4>Review your order:</h4>

    @workflow('cart_review')

@stop