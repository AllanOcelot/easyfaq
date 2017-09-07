<?php
/*
 * Plugin Name: EasyPages FAQs
 * Plugin URI:
 * Description: This plugin adds very quick to use FAQ functions to pages.
 * Version: 1.0.0
 * Author: Allan McKernan
 * Author URI: http://www.workofcode.com
 * License: GPL2
 */


 ##########################################################
 ##### Add our Styles and Our Javascript to Wordpress #####
 ##########################################################
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

############################################################
#
#
#
#
#
#
#
#
#
#
#
###############################################
##### Create Custom Post Type for our FAQ #####
###############################################
add_action( 'init', 'easyFAQPostType' );
function easyFAQPostType() {
	$labels = array(
		'name'               => _x( 'FAQs', 'post type general name', 'your-plugin-textdomain' ),
		'singular_name'      => _x( 'FAQ', 'post type singular name', 'your-plugin-textdomain' ),
		'menu_name'          => _x( 'FAQs', 'admin menu', 'your-plugin-textdomain' ),
		'name_admin_bar'     => _x( 'FAQ', 'add new on admin bar', 'your-plugin-textdomain' ),
		'add_new'            => _x( 'Add New', 'FAQ', 'your-plugin-textdomain' ),
		'add_new_item'       => __( 'Add New FAQ', 'your-plugin-textdomain' ),
		'new_item'           => __( 'New FAQ', 'your-plugin-textdomain' ),
		'edit_item'          => __( 'Edit FAQ', 'your-plugin-textdomain' ),
		'view_item'          => __( 'View FAQ', 'your-plugin-textdomain' ),
		'all_items'          => __( 'All FAQ', 'your-plugin-textdomain' ),
		'search_items'       => __( 'Search FAQ', 'your-plugin-textdomain' ),
		'not_found'          => __( 'No FAQs found.', 'your-plugin-textdomain' ),
		'not_found_in_trash' => __( 'No FAQs found in Trash.', 'your-plugin-textdomain' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'your-plugin-textdomain' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'FAQs' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
    'taxonomies'          => array( 'category' ),
    'menu_icon'          => 'dashicons-format-status',
		'supports'           => array( 'title', 'editor')
	);

	register_post_type( 'FAQ', $args );
}
########################################################
#
#
#
#
#
#
#
#
#
#
#
########################################################
##### Query the FAQ and put them into our UL ###########
########################################################
function easyFAQQuery($atts){

  //Get user input from the shorttag
  $a = shortcode_atts( array(
        'colour'   => 'default',
        'category' => 'default',
    ), $atts );

  //We return, rather than echo our output as HTML
  $faqHTML = "";

  //We query our post types here, if the user selects a category, we filter the FAQ's by that
    //Query all
    if($a['category'] == 'default'){
      $args = array(
      	'post_type' => 'FAQ',
        'posts_per_page' => '-1'
      );
    }else{
      $args = array(
        'post_type' => 'FAQ',
        'posts_per_page' => '-1',
        'category_name' => $a['category']
      );
    }




  $the_query = new WP_Query( $args );

  // Loop Over Results
  if ( $the_query->have_posts() ) {
    $faqHTML .= "<ul class='easy-faq-container'>";

  	while ( $the_query->have_posts() ) {
  		$the_query->the_post();
        $faqHTML .= "<li>";
           if($a['colour'] == 'default'){
              $faqHTML .= "<div class='title'>";
            }else{
              $faqHTML .= "<div class='title' style='background-color:" . $a['colour'] . "'>";
            }

            $faqHTML .= "" . get_the_title() . "";

        $faqHTML .= "</div>";

        $faqHTML .= "<div class='content'>";
          $faqHTML .= "". get_the_content() . "";
        $faqHTML .= "</div>";
      $faqHTML .= "</li>";
  	}
  	$faqHTML .= "</ul>";
  } else {
  	// no posts found
    $faqHTML .= "<div class='faq-error-message'> Sorry, there are no matching FAQ's. </div>";
  }

  return $faqHTML;
  $faqHTML = "";
  /* Restore original Post Data */
  wp_reset_postdata();
}

## Add funciton as shortcode so user can call it ##
add_shortcode('easyFAQ' , 'easyFAQQuery');
