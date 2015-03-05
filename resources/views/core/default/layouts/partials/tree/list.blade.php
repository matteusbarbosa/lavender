<li>

    <a class="expand" data-children="{{ count($list['children']) }}">[+]</a>

    {!! $list['content'] !!}

    @if($list['children'])

        <ul class="tree-node" style="display: none;">

            @foreach($list['children'] as $child)

                @include('layouts.partials.tree.list', ['list' => $child])

            @endforeach

        </ul>

    @endif

</li>