@extends('core::layouts.master')

@section('header')
    Header Nav: <a href="{{ URL::to('/') }}">HOME</a>, <a href="{{ URL::to('cms/page/0') }}">page 1</a>, <a href="{{ URL::to('cms/page/1') }}">page 2</a>, <a href="{{ URL::to('cms/page/2') }}">page 3</a>, <a href="{{ URL::to('cms/page') }}">page list</a>
@stop

@section('content')
    Welcome to Lavender.
@stop

@section('footer')
    Footer Nav: <a href="{{ URL::to('cms/post/0') }}">post 1</a>, <a href="{{ URL::to('cms/post/1') }}">post 2</a>, <a href="{{ URL::to('cms/post/2') }}">post 3</a>, <a href="{{ URL::to('cms/post') }}">post list</a>
@stop