<?php
/**
 * Plugin Name: Wordpress EasyFAQs
 * Plugin URI:
 * Description: This plugin adds very quick to use FAQ functions to pages.
 * Version: 1.0.0
 * Author: Allan McKernan, Thomas Reeve
 * Author URI:
 * License: GPL2
 */

 //Hook into the WP head, and add our Styles
 add_action( 'wp_head', 'easyFAQ' );
function easyFAQ() {
  echo "<link rel='stylesheet'  href='/wp-content/plugins/easyfaq/assets/main.css' type='text/css' media='all'>";
} 
