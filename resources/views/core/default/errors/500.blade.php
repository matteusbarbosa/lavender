@extends('layouts.error')

@section('head.title')
	500 Error
@stop

@section('message')
	<div class="content">
		<div class="title">Oops!</div>
		<div class="description">{{ $message }}</div>
	</div>
@stop