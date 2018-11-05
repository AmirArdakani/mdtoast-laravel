<?php

namespace Amirardakani\MaterialToast\Facades;


use Illuminate\Support\Facades\Facade;

class Toast extends Facade
{

    protected static function getFacadeAccessor()
    {
        return 'toast';
    }
}