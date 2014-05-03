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
</ul>
@stop

@section('content')
<h1>Welcome to Lavender.</h1>
@stop