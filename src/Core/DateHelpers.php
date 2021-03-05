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

	public function greaterThanDate($neddle, $haystack)
	{
		$b =[];
		foreach ($haystack as $k => $v) {
			if(strtotime($k) > strtotime($neddle)){
				$b[] = (object) ['date' => $k, 'description' => $v];
			}
		}

		return $b;
		
	}

	public function lessThanDate($neddle, $haystack)
	{
		$b =[];
		foreach ($haystack as $k => $v) {
			if(strtotime($k) < strtotime($neddle)){
				$b[] = (object) ['date' => $k, 'description' => $v];
			}
		}

		return $b;
		
	}

}
