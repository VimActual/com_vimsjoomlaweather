<?php
namespace Vim\Component\com_vimsjoomlaweather\Site\Model;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class WeatherModel extends BaseDatabaseModel {
  public function getWeatherData() {
	chdir(__DIR__);
	if ($zip_code) {
		exec('python weathermodel.py -z $zip_code', $result, $returnValue);
	} else {
		exec('python weathermodel.py', $result, $returnValue);
	}
	return $result;
  }
}
