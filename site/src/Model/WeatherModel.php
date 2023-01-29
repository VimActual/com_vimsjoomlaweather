<?php
namespace Vim\Component\com_vimsjoomlaweather\Site\Model;

use Joomla\CMS\MVC\Model\BaseDatabaseModel;

/* Not needed anymore php is handling the weather form and data processing
class WeatherModel extends BaseDatabaseModel {
  public function getWeatherData() {
	chdir(__DIR__);
	if ($zipcode) {
		exec('python weathermodel.py -z' . $zipcode, $weatherData, $returnValue);
		echo 'your zip code is: ' . $zipcode;
	} else {
		exec('python weathermodel.py', $weatherData, $returnValue);
		echo ' there is no zip code entered';
	}
	return $weatherData;
  }
}
 */
class WeatherModel extends BaseDatabaseModel {
	public function getWeatherData() {
		return 0;
	}
}
?>
