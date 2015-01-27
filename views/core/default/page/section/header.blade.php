<div class="top row">

    <div class="logo eight columns">

        @include('page.section.header.logo')

    </div>

    <div class="links four columns">

        <ul>

            @yield('header.top.links')

        </ul>

    </div>

</div>

<div class="bottom block">

    <nav class="navigation">

        @menu('frontend')

    </nav>

</div>