
@if(!$products->count())

    <div class="none-found">

        <p>No products found.</p>

    </div>

@else

    <ul class="toolbar">

        <li>Page {{ $products->currentPage() }} of {{ $products->lastPage() }}</li>

    </ul>

    <ul>

        @foreach($products as $product)

            <li>

                {!! $product->name()->toLink($product->getUrl(), ['class' => 'product']) !!}

            </li>

        @endforeach

    </ul>

    @paginate($products)

@endif