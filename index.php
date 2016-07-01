<?php
/*
 * Plugin Name: Wordpress EasyFAQs
 * Plugin URI:
 * Description: This plugin adds very quick to use FAQ functions to pages.
 * Version: 1.0.0
 * Author: Allan McKernan, Thomas Reeve
 * Author URI:
 * License: GPL2
 */


 //Hook into the WP head, and add our Styles
 function easyFAQCSS() {
   //Insert our stylesheet
   //echo "<link rel='stylesheet'  href='/wp-content/plugins/easyfaq/assets/main.css' type='text/css' media='all'>";
   wp_register_style( 'easyFAQstyles', plugins_url( '/assets/main.css', __FILE__ ), array(), '20120208', 'all' );
   wp_enqueue_style('easyFAQstyles');
 }
add_action( 'wp_enqueue_scripts', 'easyFAQCSS' );

//Hook JS into footer
function easyFAQJSFiles(){
  wp_register_script( 'easyFAQJS', plugins_url( '/assets/easyFAQ.js', __FILE__ ) );
  wp_enqueue_script('jquery');
  wp_enqueue_script( 'easyFAQJS' );
}
add_action( 'wp_enqueue_scripts', 'easyFAQJSFiles' );

 //Spit out dummy HTML
 function exampleFAQOutput(){
   ?>
    <ul class="easy-faq-container">
    <?php
    $randomInt = rand(3,15);
     for($x = 0; $x <= $randomInt ; $x++){ ?>
      <li>
        <div class="title">Example question</div>
        <div class="content">
          <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </li>
     <?php
      } ?>
  </ul>
  <?php
 }

 add_shortcode('easyFAQDummy' , 'exampleFAQOutput');
