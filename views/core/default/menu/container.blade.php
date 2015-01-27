<ul>

    @foreach($items as $id => $item)

        <li id="{{{ $id }}}">

            {{ $item->content }}

            @if($children = $item->children)

                <ul>

                    @foreach($children as $child)

                        <li>

                            {{ $child->content }}

                            @if($grandchildren = $child->children)

                                <ul>

                                    @foreach($grandchildren as $grandchild)

                                        <li>

                                            {{ $grandchild->content }}

                                        </li>

                                    @endforeach

                                </ul>

                            @endif

                        </li>

                    @endforeach

                </ul>

            @endif

        </li>

    @endforeach

</ul>