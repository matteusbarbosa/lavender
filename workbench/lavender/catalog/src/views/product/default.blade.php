@extends('cms::default')

@section('content')
<h1>{{ $product->name }}</h1>

<ul class="attribute-list">
    <li>
        Sku: {{ $product->sku }}
    </li>
    @foreach($product->attributes as $attribute)
    <li>
        <?php $product_attribute = Lavender\Catalog\Product\ProductAttribute::where("attribute_id", "=", $attribute->id)->where("product_id", "=", $product->id)->firstOrFail(); ?>
        {{ $attribute->label }}: {{ $product_attribute->value }}
    </li>
    @endforeach
</ul>
@stop