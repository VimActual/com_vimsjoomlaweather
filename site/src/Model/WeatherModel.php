<?php
namespace Vim\Component\com_vimsjoomlaweather\Site\Model;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

class WeatherModel extends BaseDatabaseModel {
  public function getWeatherData() {
	chdir(__DIR__);
        exec('python weathermodel.py', $result, $returnValue);
	return $result;
  }
}
