

<table id="entity-table" class="u-max-full-width">

    <thead>

        <tr>

            @foreach($headers as $header)

                <th>{!!$header!!}</th>

            @endforeach

            <th class="no-sort"></th>

        </tr>

    </thead>

    <tbody>

    @foreach($rows as $row)

        <tr>

            @foreach($row->toArray() as $key => $value)

                <td>{!! $row->$key()->backend() !!}</td>

            @endforeach

            <td><a href="{{ url('backend',[$entity, 'edit', $row->id]) }}">edit</a></td>

        </tr>

    @endforeach

    </tbody>

</table>

<script>

    $(document).ready( function () {

        $('#entity-table').DataTable({
            order: [
                [ {{ isset($sort_column) ? $sort_column : 0 }}, "{{ isset($sort_dir) ? $sort_dir : 'desc' }}" ]
            ],
            columnDefs: [{
                targets: 'no-sort',
                searchable: false,
                orderable: false
            }]
        });

    } );

</script>