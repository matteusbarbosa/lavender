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
                <td><input type="number" name="qty" value="{{$item->qty}}" /></td>
                <td><button>edit</button></td>
            </tr>
        @endforeach
    </tbody>
</table>