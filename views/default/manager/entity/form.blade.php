@extends('backend.layouts.single')

@section('head.title')
    Entity: {{ $entity }}
@stop

@section('content')
    {{ $form }}
@stop