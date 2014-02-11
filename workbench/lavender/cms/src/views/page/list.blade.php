@extends('cms::default')

@section('head.title')
    CMS Page List
@stop

@section('content')
    <ul class="{{ $type; }}-list">
        @foreach ($items as $item)
            <li class="item">
                <h1>{{ $item->title; }}</h1>
                <p>{{ $item->content; }}</p>
            </li>
        @endforeach
    </ul>
@stop