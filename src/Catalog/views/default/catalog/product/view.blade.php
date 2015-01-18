@extends('layouts.single')

@section('head.title')
Product View
@stop

@section('content')

<h1>{{ $product->name }}</h1>

<div class="price">Price: ${{ $product->price }}</div>

@stop