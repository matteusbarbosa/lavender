@extends('layouts.split')

@section('head.title')
    Shopping Cart
@stop

@section('left.top')
    <h5>Shopping cart:</h5>
@stop

@section('left')

    @include('cart.items')

@stop

@section('right.top')
    <p>Checkout options:</p>
@stop

@section('right')

@stop