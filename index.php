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
    'menu_icon'          => 'dashicons-format-status',
		'supports'           => array( 'title', 'editor', 'author')
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
function easyFAQQuery(){

  $args = array(
  	'post_type' => 'FAQ',
    'posts_per_page' => '-1'
  );
  $the_query = new WP_Query( $args );

  // Loop Over Results
  if ( $the_query->have_posts() ) {
  	echo "<ul class='easy-faq-container'>";
  	while ( $the_query->have_posts() ) {
  		$the_query->the_post(); ?>
      <li>
        <div class="title"><?php echo the_title(); ?></div>
        <div class="content">
          <?php echo the_content(); ?>
        </div>
      </li>
      <?php
  	}
  	echo '</ul>';
  } else {
  	// no posts found
  }
  /* Restore original Post Data */
  wp_reset_postdata();
}

## Add funciton as shortcode so user can call it ##
add_shortcode('easyFAQ' , 'easyFAQQuery');

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
##### Below simply for testing content #################
########################################################
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
