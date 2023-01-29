<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<h2>Simply Your Weather</h2>
<div id="zipcode_form">
    <form action="<?php echo \JRoute::_('index.php'); ?>" method="get">
        <input type="text" name="zipcode">
        <input type="hidden" name="option" value="com_vimsjoomlaweather">
        <input type="hidden" name="view" value="weather">
        <input type="submit" value="Submit">
    </form>
</div>
<div id="weather-data">
<?php
class Weather
{
    private $zip_code = 76101;
    private $location_data;
    private $gridpoint;

    public function __construct()
    {

        if (isset($_GET['zip_code'])) {
                $this->zip_code = intval($_GET['zip_code']);
        }
        echo 'Your zip code is: ' . $this->zip_code;
        echo "<form action='' method='GET'>";
        echo "Enter your zip code: <input type='text' name='zip_code'><br>";
        echo "<input type='submit'>";
        echo "</form>";

        $this->getLocationDetailsFromZipcode();
	$this->getForecastData();
	//return $this->$weatherData;
    }

    private function getLocationDetailsFromZipcode()
    {
        $response = file_get_contents("https://api.zippopotam.us/us/{$this->zip_code}");
        $this->location_data = json_decode($response, true);
    }

    function getForecastData()
    {
        $this->lat = round($this->location_data['places'][0]['latitude'], 4);
        $this->lon = round($this->location_data['places'][0]['longitude'], 4);
        echo 'lat is: ' . $this->lat . '<br>';
        echo 'lon is: ' . $this->lon . '<br>';
        $base_url = "https://api.weather.gov/points/{$this->lat},{$this->lon}";
        $zip_code_url = $base_url . $this->$zip_code;
        // need to provide email
        $curl = curl_init();
        curl_setopt_array($curl, [
                CURLOPT_FOLLOWLOCATION => true, //Gets redirect response
                CURLOPT_RETURNTRANSFER => 1,
                CURLOPT_URL => $zip_code_url,
                CURLOPT_USERAGENT => 'youremail@example.com' // Weather.gov will deny without this
        ]);
        $response = curl_exec($curl);
        //$response = file_get_contents($zip_code_url); // can't use this without modifying php settings
        $weatherData = json_decode($response, true);
        //$this->gridpoint = $weatherData['properties']['gridId']; // get grid point
	$this->weatherData = $weatherData;
	return $this->weatherData;
    }
}
$weatherDataClass = new Weather();
$forecast = $weatherDataClass->getForecastData();
echo 'start of echos<br>';
echo $weatherDataClass->weatherData['properties']['forecastHourly'];
?>

<script>
    function backgroundAnimation(){
    let bgColor = document.getElementsByClassName('weather-box');
    let colors = ["#FFB6C1", "#FFC0CB", "#DC143C", "#FFF0F5", "#DB7093", "#C71585"];
    let i = 0;

    for (let el of bgColor){
        el.addEventListener('mouseover', () => {
            el.style.backgroundColor = colors[i];
            i = (i + 1) % colors.length;
        });
    }
}
</script>
