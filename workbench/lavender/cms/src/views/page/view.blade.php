@extends('cms::default')

@section('head.title')
    CMS Page View
@stop

@section('content')
    <h1>{{ $item->title; }}</h1>
    <p>{{ $item->content; }}</p>
@stop