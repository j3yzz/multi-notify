<?php

namespace j3yzz\MultiNotify;

use Illuminate\Support\Facades\Facade;

/**
 * @see Notify
 */
class Notify extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'notify';
    }
}
