@extends('layouts.single')

@section('head.title')
Home
@stop

@section('content')
<p>Hello, {{ app('store')->theme->name }}!</p>
@stop