<div class="table" id="cart-table">

<div class="thead">

    <div class="row">

        <div class="eight columns">Name</div>

        <div class="four columns">Qty</div>

    </div>

</div>

<div class="tbody">

@foreach($items as $item)

    <div class="row">

        <div class="eight columns">

            {{$item->product->name}}

        </div>

        <div class="four columns">

            @workflow('cart_item_update', ['item' => $item])

        </div>

    </div>

@endforeach

</div>

<div class="tfoot">

    <div class="row"></div>

</div>

</div>