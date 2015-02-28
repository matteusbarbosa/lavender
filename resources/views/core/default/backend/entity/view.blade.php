@extends('layouts.single')

@section('head.title')

    Entity: {{ $model->getEntityName() }}

@stop

@section('content')

    @workflow($workflow, ['entity' => $model])

@stop