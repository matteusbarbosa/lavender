<div class="top">

    @yield('footer.top.before')

    <div class="links">

        <ul>

            @yield('backend.footer.top.links')

        </ul>

    </div>

    @yield('footer.top.after')

</div>

@yield('backend.footer.bottom.before')

<div class="bottom">

    @yield('backend.footer.bottom')

</div>

@yield('backend.footer.bottom.after')