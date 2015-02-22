<?php


if ( ! function_exists('menu'))
{
    function menu($menu)
    {
        return Menu::make($menu);
    }
}