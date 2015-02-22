

<table id="entity-table" class="u-max-full-width">

    <thead>

        <tr>

            <th><input type="checkbox" /></th>

            @foreach($headers as $header)

                <th>{!!$header!!}</th>

            @endforeach

        </tr>

    </thead>

    <tbody>

    @foreach($rows as $row)

        <tr>

            <td><input type="checkbox" value="{{ $row->id }}"/></td>

            @foreach($row->toArray() as $key => $value)

                <td>{!! $row->backendValue($key) !!}</td>

            @endforeach

        </tr>

    @endforeach

    </tbody>

    <tfoot>

        <tr>

            <th><input type="checkbox" /></th>

            @foreach($headers as $header)

                <th>{!! $header !!}</th>

            @endforeach

        </tr>

    </tfoot>

</table>

<script>

    $(document).ready( function () {

        $('#entity-table').DataTable();

    } );

</script>