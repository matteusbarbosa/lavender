@extends('layouts.single')

@section('head.title')

    {{ $title }}

@stop

@section('content')

    <div class="row">

        <ul class="tabs three columns">

        @foreach($tabs as $index => $tab)

            <li class="tab-title{{ !$index ? ' active' : null }}">

                <label>{{ $tab['label'] }}</label>

            </li>

        @endforeach

        </ul>

        <div class="tabs-content nine columns">

        @foreach($tabs as $index => $tab)

            <div class="tab-panel" style="{{ !$index ? null : 'display:none' }}">

                {!! $tab['content'] !!}

            </div>

        @endforeach

        </div>

    </div>

    <script>

        /**
         * Hide and show tab panels
         */
        $('ul.tabs li').click(function(){

            var current_index = $('ul.tabs').find('li.active').index();

            var current_panel = $('div.tab-panel')[current_index];

            if($(current_panel).find('.changes').length){

                if(!confirm('Changes on this tab will not be saved.')){

                    return false;

                }

            }

            $('ul.tabs li').removeClass('active');

            $(this).addClass('active');

            var selected = $(this).index();

            var panels = $('div.tab-panel');

            panels.hide();

            $(panels[selected]).show();

        });

        $(document).ready( function () {

            if($('ul.tabs li').length < 2){

                $('ul.tabs').remove();

            }

            $('div.tab-panel :input').bind('change', function(){

                $(this).addClass('changes');

            });

        } );

    </script>

@stop