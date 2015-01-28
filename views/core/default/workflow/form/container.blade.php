
@if($options)

    {{ Form::open( $options ) }}

@endif

@foreach( $fields as $class => $field )

    <div class="field {{{ $class }}}">

        {{ $field }}

    </div>

@endforeach

@if($options)

    {{ Form::close() }}

@endif