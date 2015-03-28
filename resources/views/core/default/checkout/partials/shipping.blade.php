
<h4>Checkout</h4>

<div class="checkout-states">

    <h5 class="tab active">Shipping</h5>

    @include('layouts.partials.form', ['options' => $options, 'fields' => $fields])

    <h5 class="tab">Payment</h5>

    <h5 class="tab">Review</h5>

</div>

