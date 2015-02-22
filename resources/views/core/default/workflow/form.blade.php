
{!! Form::open( $options ) !!}

@foreach( $fields as $field )

    <div class="field">

        {!! $field !!}

    </div>

@endforeach

{!! Form::close() !!}