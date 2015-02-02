@extends('backend.layouts.single')

@section('head.title')

    Entity: {{ $entity }}

@stop

@section('content')

    {{ $table }}

@stop