<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\HariLibur\Core;


class ConfigLoader
{
	/**
     * Method ini berfungsi untuk set tanggal dari config.
     *
     * @return boolean
    */
	public function region()
	{
		if(file_exists(__DIR__.'../../../../../../config/irfa/hari_libur.php') && function_exists('app')){

			return strtoupper(config('irfa.hari_libur.region'));

		} else {

			require(__DIR__.'../../../config/hari_libur.php');

			return strtoupper($conf['region']);
		}
	}
}
