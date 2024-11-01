<?php
/*
Plugin Name: The plugin for functions that don't belong in themes
Plugin URI: http://www.doitwithwp.com
Description: Too many themes try and include functionality that should be restricted to a plugin. So this plugin tries to keep all of them in one place.
Version: 0.1
Author: Dave Clements
Author URI: http://www.theukedge.com
License: GPL2
*/

/***************************
* global variables
***************************/

$tpfftdbit_plugin_name = 'The plugin for functions that don\'t belong in themes';

$tpfftdbit_options = get_option('tpfftdbit_settings'); // retrieves plugin settings from options table

/***************************
* includes
***************************/

include('includes/options-page.php'); // loads the admin settings page
include('includes/use-data.php'); // uses the data in the site

/***************************
* internationalisation
***************************/

function tpfftdbit_text_domain () {
	load_plugin_textdomain ('tpfftdbit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

add_action ('init', 'tpfftdbit_text_domain');