@extends('cms::default')

@section('content')
<h1>user_id: {{ $cart->user_id }}, cart_id: {{ $cart->id }}</h1>

<ul class="cart-list">
    @foreach($cart->items as $item)
    <li>
        {{ $item->item->product->name }}
    </li>
    @endforeach
</ul>
@stop