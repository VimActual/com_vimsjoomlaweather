<?php

namespace Vim\Component\com_vimsjoomlaweather\Site\View\Weather;

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView as BaseHtmlView;
# Make sure to add any php namespaces that the View of MVC needs
use Vim\Component\com_vimsjoomlaweather\Site\Model\WeatherModel;

/**
 * @package     Joomla.Site
 * @subpackage  com_vimsjoomlaweather
 *
 * @copyright   Copyright (C) 2020 Vim Actual. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

/**
 * View for the user identity validation form
 */
class HtmlView extends BaseHtmlView {
    

    /**
     * Display the view
     *
     * @param   string  $template  The name of the layout file to parse.
     * @return  void
     */
    public function display($template = null) {
        $weatherModel = new WeatherModel();
        $this->result = $weatherModel->getWeatherData();
        parent::display($template);
    }

}
