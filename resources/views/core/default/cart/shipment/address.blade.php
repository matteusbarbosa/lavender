@extends('cart.checkout')

@section('head.title')
    Checkout
@stop

@section('content')

    <h4>Your Shipping Information:</h4>

    @workflow('shipment_address')

@stop