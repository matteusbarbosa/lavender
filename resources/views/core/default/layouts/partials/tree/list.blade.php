<ul class="tree-list">

    @foreach($list as $item)

        <li>

            {!! $item['content'] !!}

            @if($item['children'])

                @include('layouts.partials.tree.list', ['list' => $item['children']])

            @endif

        </li>

    @endforeach

</ul>