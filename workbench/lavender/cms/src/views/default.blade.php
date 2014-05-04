@extends('core::layouts.master')

@section('head.title') Homepage @stop

@section('header')
<div class="menu">
    <a href="/">Lavender</a>
    @if(Auth::check())
    <span>Welcome, {{ Auth::user()->email }}</span>
    @endif
    <ul>
        @foreach(Lavender\Catalog\Category::all() as $category)
        <li><a href="{{ URL::to('category/id/'.$category->id) }}">{{ $category->name }}</a></li>
        @endforeach
        <li>
            <a href="{{ URL::to('pos/cart') }}">Cart ({{ Auth::user() ? count(Auth::user()->cart->items).' items' : 'please login' }})</a>
        </li>
        @if(Auth::check())
        <li>
            <a href="{{ URL::to('crm/user/account') }}">My Account</a>
        </li>
        <li>
            <a href="{{ URL::to('crm/user/logout') }}">Logout</a>
        </li>
        @else
        <li>
            <a href="{{ URL::to('crm/user/login') }}">Login</a>
        </li>
        @endif
    </ul>
</div>
@stop

@section('content')
    Actual content and such will be here.
@stop