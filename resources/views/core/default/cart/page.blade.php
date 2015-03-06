@extends('layouts.default')

@section('head.title')
    Shopping Cart
@stop

@section('main')

    <div class="row">
        <div class="seven columns">
            <h5>Your Shopping Cart</h5>
        </div>
        <div class="five columns">
            <a href="{{ url('/') }}">Keep Shopping</a> or <button onclick="setLocation('{{ url('checkout') }}')">Continue to Checkout</button>
        </div>
    </div>

    @include('cart.items', ['items' => app('cart')->items])

    <div class="row">
        <div class="seven columns">
            <p><strong>shipping calculator</strong></p>
        </div>
        <div class="five columns right">
            <button onclick="setLocation('{{ url('checkout') }}')">Continue to Checkout</button>
        </div>
    </div>

@stop