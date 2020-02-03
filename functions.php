<?php
/*
1. Add theme supports
2. REQUIRE
3. Enqueue scripts and styles
4. Navigation and sidebars
5. Other functions
*/

/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
/* Add theme support */
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'custom-logo' );


/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
/* REQUIRES */
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/

// NAV walker function
require_once get_template_directory() . '/classes/class-wp-bootstrap-navwalker.php';



/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
/* Enqueue scripts and styles */
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/

// Adding required scripts and styles: Bootstrap, fonts
function WP_Nadezda_enqueue() {
    wp_enqueue_style('bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css');
    if($_SERVER['SERVER_NAME'] != 'localhost'){
      wp_enqueue_style('style', get_template_directory_uri() . '/style.min.css');
    } else{
      wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
    }
    wp_enqueue_script( 'customjs', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), '', true );
    //wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v5.2.0/css/all.css');
    wp_enqueue_script( 'bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js', array('jquery'), '', true );
}
add_action('wp_enqueue_scripts', 'WP_Nadezda_enqueue');


/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
/* NAVIGATION AND SIDEBARS */
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/


function register_my_menus() {
  register_nav_menus(
    array(
      'header' => __( 'Primary Menu' ),
      'extra-menu' => __( 'Extra Menu' ) // second menu, supposed for footer navigation but decided to show how to work with widgets
    )
  );
}
add_action( 'init', 'register_my_menus' );

function WP_Nadezda_widgets_init() {

  register_sidebar( array(
    'name'          => 'Footer 1',
    'id'            => 'footer_1',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 2',
    'id'            => 'footer_2',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );

  register_sidebar( array(
    'name'          => 'Footer 3',
    'id'            => 'footer_3',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );
  register_sidebar( array(
    'name'          => 'sidebar',
    'id'            => 'sidebar',
    'before_widget' => '<div id="%1$s" class="widget %2$s">',
    'after_widget'  => '</div>',
    'before_title'  => '<h4 class="widget__title">',
    'after_title'   => '</h4>',
  ) );

}
add_action( 'widgets_init', 'WP_Nadezda_widgets_init' );


/***************************************************************************/
/***************************************************************************/
/***************************************************************************/
/* OTHER FUNCTIONS */
/***************************************************************************/
/***************************************************************************/
/***************************************************************************/

?>