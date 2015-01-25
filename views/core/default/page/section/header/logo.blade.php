<h1>

    <a href="{{{URL::to('/')}}}">

        {{ HTML::image(Config::get('store.logo'), Config::get('store.name'), ['width' => 55, 'height' => 55]) }}

        {{ Config::get('store.name') }}

    </a>

</h1>