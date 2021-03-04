<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\HariLibur\Core;

class DateHelpers
{

    public function convertDate($date)
    {
    	return date('Y-m-d',strtotime($date));
    }

    public function convertToDayName($date)
	{
		$time = strtotime($date);
		$day = date('l', $time);

		return $day;
	}

}
