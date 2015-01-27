<div class="tabs row">

    <div class="three columns">

        @foreach($items as $id => $item)

            <div class="tab-label">

                <label for="tab-{{{ $id }}}">{{ $item->content }}</label>

            </div>

        @endforeach

    </div>

    <div class="nine columns">

        <?php $count = 0; ?>

        @foreach($items as $id => $item)

            <div id="tab-{{{ $id }}}" class="tab-content" style="{{{ $count ? 'display:none;' : '' }}}">

                @if($children = $item->children)

                    @foreach($children as $child_id => $child)

                        {{ $child->content }}

                    @endforeach

                @else

                    <comment>No content found.</comment>

                @endif

            </div>

            <?php $count++; ?>

        @endforeach

    </div>

    <script>

        $('.tab-label label').each(function(e,el){

            $(el).on('click', function(){

                if($('.tab-content:visible .changed').length){

                    if(!confirm("There are changes on this page, are you sure you want to continue?")){

                        return;

                    }

                }

                $('.tab-content').hide();

                var content = $(el).attr('for');

                $("#"+content).show();


            });

        });

    </script>

</div>