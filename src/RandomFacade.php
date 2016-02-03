<?php

namespace Webcraft\Random;

use Illuminate\Support\Facades\Facade;

class RandomFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'random';
    }
}
