@extends('backend.layouts.empty')

@section('head.title')
Backend Login
@stop

@section('content')

    <div class="row">

        <div class="four columns">

            @yield('backend.login.before')

        </div>

        <div class="four columns">

            <h4>

                <a href="{{{URL::to('backend')}}}">

                    {{ HTML::image(Config::get('store.logo'), Config::get('store.name'), ['width' => 55, 'height' => 55]) }}

                    store login

                </a>

            </h4>

            @workflow('admin_login')

        </div>

        <div class="four columns">

            @yield('backend.login.after')

        </div>

    </div>

@stop