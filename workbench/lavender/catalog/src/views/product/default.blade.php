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
@stop