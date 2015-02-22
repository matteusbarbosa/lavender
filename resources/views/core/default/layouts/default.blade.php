@extends('layouts.master')

@section('head')
@include('page.section.head')
@stop

@section('header')
@yield('logo')
@include('page.section.header')
@stop

@section('footer')
@include('page.section.footer')
@stop
