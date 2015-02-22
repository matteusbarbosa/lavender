@extends('layouts.single')

@section('head.title')

    Entity: {{ $entity }}

@stop

@section('content')

    @include('backend.entity.list.table', ['headers' => $headers, 'rows' => $rows])

@stop