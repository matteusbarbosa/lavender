<ul>

    @foreach($items as $id => $item)

        <li id="{{{ $id }}}">

            <a href="{{ $item->href }}">{{ $item->text }}</a>

            @if($children = $item->children)

                <ul>

                    @foreach($children as $child)

                        <li>

                            <a href="{{ $child->href }}">{{ $child->text }}</a>

                            @if($grandchildren = $child->children)

                                <ul>

                                    @foreach($grandchildren as $grandchild)

                                        <li>

                                            <a href="{{ $grandchild->href }}">{{ $grandchild->text }}</a>

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