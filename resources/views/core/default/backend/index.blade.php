@extends('layouts.empty')

@section('head.title')
Backend Login
@stop

<div class="row">

    <div class="four columns">

        @yield('backend.login.before')

    </div>

    <div class="four columns">

        <h1>

            <a href="{{ url('backend')}} ">

                <image src="{{ asset(config('store.logo')) }}" alt="{{ config('store.name') }}" width="55" height="55" />

                {{ config('store.name') }}

            </a>

        </h1>

        @workflow('admin_login')

    </div>

    <div class="four columns">

        @yield('backend.login.after')

    </div>

</div>