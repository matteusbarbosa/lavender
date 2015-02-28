<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Qty</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($items as $item)
            <tr>
                <td>{{$item->product->name}}</td>
                <td>@workflow('cart_item_update', ['item' => $item])</td>
            </tr>
        @endforeach
    </tbody>
</table>