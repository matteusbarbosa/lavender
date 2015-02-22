
@foreach($messages as $type => $messagebag)

    <ul class="message-group {{{ $type }}}">

        @foreach( $messagebag->all() as $message )

            <li class="message">{{ $message }}</li>

        @endforeach

    </ul>

@endforeach