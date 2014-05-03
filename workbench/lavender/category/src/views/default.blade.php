@extends('core::layouts.master')

@section('content')
<h1>{{ $category->name }}</h1>

<ul class="product-list">
    @foreach($category->products as $product)
    <li>
        <a href="{{ URL::to('product/id/'.$product->id) }}">{{ $product->name }} (sku: {{ $product->sku }})</a>
    </li>
    @endforeach
</ul>
@stop