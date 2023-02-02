<?php

namespace j3yzz\MultiNotify\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \j3yzz\MultiNotify\Notify
 */
class Notify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'multi-notify';
    }
}
