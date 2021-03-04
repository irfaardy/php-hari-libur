<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
    version: 1.0
*/
namespace Irfa\HariLibur\Func;

use Irfa\HariLibur\Core\Libur;
use Irfa\HariLibur\Core\DateHelpers;
use Irfa\HariLibur\Core\ConfigLoader;

class HariLibur extends Libur
{
	private $date;
    /**
     * Method ini berfungsi sebagai setter untuk $date
     *
     * @param string $date
     * @return object
    */
    public function date($date)
    {
        $date_helper = new DateHelpers();
    	$this->date = $date_helper->convertDate($date);
    	return $this;
    }

    /**
     * Method ini berfungsi untuk mengecek hari libur nasional
     *
     * @return boolean
    */
    public function isHoliday()
    {
        $this->checkDate();
        return $this->checkHoliday($this->date);
    }

    /**
     * Method ini berfungsi untuk mengecek akhir pekan (sabtu, minggu)
     *
     * @return boolean
    */
    public function isWeekend()
    {
        $this->checkDate();
        return $this->checkWeekend($this->date);
    }

    /**
     * Method ini berfungsi untuk mengecek hari akhir pekan dan hari libur nasional
     *
     * @return boolean
    */
    public function isOffDay()
    {
        $this->checkDate();
        return $this->checkOffDay($this->date);
    }

    /**
     * Method ini berfungsi untuk mengambil data hari libur nasional
     *
     * @return object
    */
    public function get()
    {
        return $this->fetchHolidays();
    }

    /**
     * Method ini berfungsi untuk mengambil informasi libur 
     * @return string
    */
    public function getInfo()
    {
        $this->checkDate();
        return $this->gettingInfo($this->date);
    }
    
    /**
     * Method ini berfungsi untuk mengecek tanggal sudah diisi apa belum
     *
     * @return mixed
    */
    public function region($region)
    {
        $this->setRegion($region);
        return $this;
    }

    /**
     * Method ini berfungsi untuk mengecek tanggal sudah diisi apa belum
     *
     * @return mixed
    */
    private function checkDate()
    {
        if(empty($this->date))
        {
            throw new \Exception('Parameter date must be provided.');
            return false;
        }
    }

}
