@extends('layouts.single')

@section('head.title')

    Entity: {{ $entity }}

@stop

@section('content')

    @workflow('entity_manager', ['entity' => $model])

@stop