<?php

function cLng()
{
    return \Illuminate\Support\Facades\App::getLocale();
}

function languages()
{
    return ['en', 'am'];
}

function route_with_lng($routeName)
{
    return route($routeName, ['locale' => cLng()]);
}
