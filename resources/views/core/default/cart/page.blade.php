@extends('layouts.default')

@section('head.title')
    Shopping Cart
@stop

@section('main')

    <div class="row">

        <div class="six columns">

            <h5>Your Shopping Cart</h5>

        </div>

        <div class="six columns right">

            <a href="{{ url('/') }}">Keep Shopping</a>

            <span>or</span>

            <button onclick="setLocation('{{ url('checkout') }}')">Continue to Checkout</button>

        </div>

    </div>

    @yield('cart.items')

    <div class="row">

        <div class="six columns">

            <p><strong>shipping calculator</strong></p>

        </div>

        <div class="six columns right">

            <div class="cart-totals">

                @foreach($totals as $label => $total)

                <div class="row">

                    <div class="six columns">{{ $label }}</div>

                    <div class="six columns">{{ $total }}</div>

                </div>

                @endforeach

            </div>

            <button onclick="setLocation('{{ url('checkout') }}')">Continue to Checkout</button>

        </div>
    </div>

@stop