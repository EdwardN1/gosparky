<?php
/*
Plugin Name: Slick Slider WordPress Plugin
Plugin URI: https://www.technicks.com
Description: The last carousel you'll ever need. Ken Wheeler's Slick Slider brought to WordPress https://github.com/kenwheeler/slick. This is a bare bones enqueue of the scripts with ACF integration.
Author: Edward Nickerson
License: GPLv2 or later
Version: 1.0.1
Author URI: https://www.technicks.com
*/

define('tchss_FUNCTIONSPATH', plugin_dir_path(__FILE__) . '/includes/');
define('tchss_PLUGINPATH', plugin_dir_path(__FILE__));
define('tchss_PLUGINURI', plugin_dir_url(__FILE__));


foreach (glob(tchss_FUNCTIONSPATH . 'autoinc-*.php') as $filename) {
    require_once($filename);
}
