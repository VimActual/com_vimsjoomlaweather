<?php

/**
 * @package     Joomla.Administrator
 * @subpackage  com_vimsjoomlaweather
 *
 * @copyright   Copyright (C) 2020 Vim Actual. All rights reserved.
 * @license     GNU General Public License version 3; see LICENSE
 */

 // No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<h2>Simply Your Weather</h2>
<div id="weather-data">
  <?php foreach ($this->weatherData as $data): ?>
    <p><?php echo $data; ?></p>
  <?php endforeach; ?>
<?php
echo $this;
?>
</div>
