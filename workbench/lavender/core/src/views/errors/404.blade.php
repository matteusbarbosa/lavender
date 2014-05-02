@extends('core::layouts.master')

@section('content')
<h1>404 - Page Not Found</h1>
<p>Here's an error just to prove you're lost:</p>
<pre>{{ $error }}</pre>
@stop