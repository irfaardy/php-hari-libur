<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
*/
namespace Irfa\HariLibur\Core;

use Irfa\HariLibur\Core\DateHelpers;

class Libur extends Localization
{
	private $holidays;
	
	protected function checkHoliday($date)
	{
		$this->populateHoliday();
		if (array_key_exists($date, $this->holidays)) {
			return true;
		} 

		return false;
	}

	protected function checkWeekend($date)
	{
		$dt = new DateHelpers();

		$days = ['Saturday','Sunday'];
		$day = $dt->convertToDayName($date);
		if(in_array($day, $days))
		{
			return true;
		}

		return false;

	}

	protected function setRegion($region)
	{
		$this->regionSet($region);
	}

	protected function checkOffDay($date)
	{
		if($this->checkHoliday($date) || $this->checkWeekend($date))
		{
			return true;
		} 

		return false;
	}
	protected function gettingInfo($date)
	{
		$this->populateHoliday();
		if(array_key_exists($date, $this->holidays))
		{
			return $this->holidays[$date];
		} 

		return null;
	}
	private function populateHoliday()
	{
		$get_holidays = $this->fetchHolidays();
		foreach($get_holidays as $h)
		{
			$this->holidays[$h->date] = $h->description;
		}
	}

	protected function fetchHolidays()
	{
		return $this->holidayData(false)->holidays;
	}

}
