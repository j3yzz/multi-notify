<?php

namespace j3yzz\MultiNotify\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see \j3yzz\MultiNotify\Notify
 */
class Notify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'notify';
    }
}
