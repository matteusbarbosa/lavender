@extends('layouts.single')

@section('head.title')

    {{ $title }}

@stop

@section('content')

    @include('backend.partials.table', ['headers' => $headers, 'rows' => $rows, 'edit_url' => $edit_url])

@stop