@extends('backend.layouts.default')

@section('main')

<section class="content">

 <div class="row">
    <div class="six columns">
        @yield('left.top')
        @yield('left')
        @yield('left.bottom')
    </div>
    <div class="six columns">
        @yield('right.top')
        @yield('right')
        @yield('right.bottom')
    </div>
  </div>


</section>


@stop