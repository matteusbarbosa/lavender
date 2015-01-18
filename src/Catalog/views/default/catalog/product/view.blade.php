@extends('layouts.single')

@section('head.title')
Product View
@stop

@section('content')

    <h1>{{ $product->name }}</h1>

    @include('catalog.product.price', ['product' => $product])

    @workflow('add_to_cart', ['product' => $product])

@stop