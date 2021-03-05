<?php
/* 
	Author: Irfa Ardiansyah <irfa.backend@protonmail.com>
    version: 1.1
    https://github.com/irfaardy/php-hari-libur
*/
namespace Irfa\HariLibur\Core;

use Irfa\HariLibur\Core\ConfigLoader as Conf;

class Localization
{
	private $region;
	/**
     * Method ini berfungsi untuk set tanggal dari config.
     *
     * @return boolean
    */
	private function lang()
	{
		if(!empty($this->region))
		{
			return strtoupper($this->region);
		}

		$config = new Conf();
		return $config->region();
	}

	protected function regionSet($region)
	{
		$this->region = $region;
	}
	/**
     * Method ini berfungsi untuk mengambil data libur dari file json.
     *
     * @return boolean
    */
	public function holidayData($array = true)
	{
		$published_file = __DIR__.'../../../../../../resources/data-libur-nasional/'.$this->lang().'.json';
		if(file_exists($published_file))
		{
			$file = $published_file;
		} else{
			$file = __DIR__.'../../Data/'.$this->lang().'.json';
		}
		
		$this->checkFile($file);
		$arr = file_get_contents($file);
		if($this->isJson($arr))
		{
    		return json_decode($arr,$array);
		} else{
			 throw new \Exception('Json data is invalid.');

			 return false;
		}
	}
	/**
     * Method ini berfungsi untuk validasi json
     *
     * @return boolean
    */
	private function isJson($string) {
		 json_decode($string);
		 return (json_last_error() == JSON_ERROR_NONE);
	}

	private function checkFile($file)
	{
		if(!file_exists($file))
		{
			 throw new \Exception('Region "'.$this->lang().'" is not found.');
			 return false;
		}
	}

}
