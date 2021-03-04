<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
    version: 1.0
    https://github.com/irfaardy/php-hari-libur
*/
namespace Irfa\HariLibur\Facades;

use Illuminate\Support\Facades\Facade;

class HariLibur extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \Irfa\HariLibur\Func\HariLibur::class;
    }
}
