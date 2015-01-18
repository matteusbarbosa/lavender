
@if(!$products->count())

    <div class="none-found">

        <p>No products found.</p>

    </div>

@else

    <ul class="toolbar">

        <li>Viewing {{ $products->getFrom() }} to {{ $products->getTo() }} of {{ $products->getTotal() }}</li>

    </ul>

    <ul>

        @foreach($products as $product)

            <li>

                <a href="{{{ URL::to($product->url) }}}">{{ $product->name }}</a>

            </li>

        @endforeach

    </ul>

    {{ $products->links() }}

@endif