<?php

namespace Vim\Component\com_vimsjoomlaweather\Site\Controller;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;
use Joomla\CMS\Factory;
use Vim\Component\com_vimsjoomlaweather\Site\Model\WeatherModel;

/**
 * @package     Joomla.Site
 * @subpackage  com_vimsjoomlaweather
 *
 * @copyright   Copyright (C) 2020 John Smith. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

/**
 * Vim's Joomla Weather Component Controller
 * @since  0.0.2
 */
class DisplayController extends BaseController {
   public function display($cachable = false, $urlparams = []) {        
    $model = new WeatherModel;
    $weatherData = $model->getWeatherData();
    $view = $this->getView('Weather', 'html');
    $view->weatherData = $weatherData;
    $view->display();
   }
    
} 
