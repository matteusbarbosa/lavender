<?php


if ( ! function_exists('menu'))
{
    function menu($menu)
    {
        return Menu::make($menu);
    }
}


if ( ! function_exists('printArray'))
{
    function printArray(array $array, $before = '', $after = '')
    {
        foreach($array as $item){

            echo $before.$item.$after;

        }
    }
}