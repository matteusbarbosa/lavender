@extends('cms::default')

@section('content')
<h1>{{ $product->name }}</h1>

<ul class="attribute-list">
    <li>
        Sku: {{ $product->sku }}
    </li>
    @foreach($product->attributes() as $attribute)
    <li>
        {{ $attribute->label }}: {{ $attribute->value }}
    </li>
    @endforeach
</ul>


<ul class="form-list">
    <li>
        {{ Form::open(array('id' => 'purchase-form', 'files' => true, 'method' => 'post', 'url' => 'pos/cart/add/'.$product->id)) }}
        {{ Form::token() }}
        <div class="options-container">

        </div>
        <div class="buttons-container">
            {{ Form::submit("Add to Cart", array('onclick' => 'alert("Added '.$product->name.' to your cart.")')) }}
        </div>
        {{ Form::close() }}
    </li>
</ul>


@stop