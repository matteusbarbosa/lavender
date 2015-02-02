<table id="{{{ $id }}}" class="u-max-full-width">

    <thead>

        <tr>

            <th>{{ Form::checkbox('all'); }}</th>

            @foreach($headers as $header)

                <th>{{$header}}</th>

            @endforeach

        </tr>

    </thead>

    <tbody>

        @foreach($rows as $row)

            <tr>

                <td>{{ Form::checkbox($row->id); }}</td>

                @foreach($row->toArray() as $key => $value)

                    @define $val = $row->backendValue($key)

                    @if($val !== false)

                        <td>{{ $val }}</td>

                    @endif

                @endforeach

            </tr>

        @endforeach

    </tbody>

    <tfoot>

        <tr>

            <th>{{ Form::checkbox('all'); }}</th>

            @foreach($headers as $header)

                <th>{{ $header }}</th>

            @endforeach

        </tr>

    </tfoot>

</table>

<script>

    $(document).ready( function () {

        $('#{{{ $id }}}').DataTable();

    } );

</script>