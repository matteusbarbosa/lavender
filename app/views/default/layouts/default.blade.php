@extends('layouts.master')

@section('styles')
{{ HTML::script('assets/js/script.js') }}
{{ HTML::style('assets/css/styles.css') }}
@stop

@section('head.anchor')
Lavender Ecommerce
@stop

@section('messages')
    @if(isset($messages))
        <ul class="messages">
            <li class="error-msg">
                <ul>
                    @foreach($messages as $message)
                    <li>
                        <span>{{ $message }}</span>
                    </li>
                    @endforeach
                </ul>
            </li>
        </ul>
    @endif
@stop

@section('header')
    <h1>Lavender Ecommerce</h1>
    <hr/>
@stop

@section('footer')
    @include('page.footer')
@stop