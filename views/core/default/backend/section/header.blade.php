<div class="top row">

    <div class="logo eight columns">

        @include('backend.section.header.logo')

    </div>

    <div class="links four columns">

        <ul>

            @yield('header.top.links')

        </ul>

    </div>

</div>

<div class="bottom block">

    <nav class="navigation">

        @menu('backend')

    </nav>

</div>