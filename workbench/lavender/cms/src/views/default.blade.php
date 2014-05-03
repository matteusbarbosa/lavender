@extends('core::layouts.master')

@section('header')
<ul class="category-list">
    <li>
        <a href="{{ URL::to('/') }}">Home</a>
    </li>
    @foreach(Lavender\Catalog\Category::all() as $category)
    <li>
        <a href="{{ URL::to('category/id/'.$category->id) }}">{{ $category->name }}</a>
    </li>
    @endforeach
    <li>
        <a href="{{ URL::to('pos/cart') }}">Cart ({{ count(Lavender\Crm\User::find(1)->get()[0]->cart->items) }} items)</a>
    </li>
</ul>
@stop

@section('content')
<h1>Welcome to Lavender.</h1>
@stop