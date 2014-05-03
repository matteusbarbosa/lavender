@extends('core::layouts.master')

@section('content')
<h1>{{ $product->name }}</h1>

<ul class="category-list">
    @foreach($product->categories as $category)
    <li>
        <a href="{{ URL::to('category/id/'.$category->id) }}">{{ $category->name }}</a>
    </li>
    @endforeach
</ul>
@stop