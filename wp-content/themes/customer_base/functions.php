<?php
  function load_custom_js() {
    if(!is_admin()) {
      wp_enqueue_script('jquery-bootstrap','//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js',array('jquery'),false,true);
      wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/custom.js',array('jquery'),false,true);
    }
  }

  function load_custom_css() {
    if(!is_admin()) {

    }
  }

  function load_custom_post_types() {
   /*
    register_post_type( 'custom_post_type',
      array(
        'labels' => array(
          'name' => 'custom_post_name',
          'singular_name' => 'custom_post_name_singular',
            'add_new' => 'custom_post_add_new_post',
            'add_new_item' => 'custom_post_add_new_post_item' ),
        ),
          'menu_icon' => 'dashicons-location',
          'menu_position' => 20,
        'public' => true
      )
    );
    */
  }

  function load_custom_languages() {
    load_child_theme_textdomain( 'customerx', get_stylesheet_directory() . '/languages' );
  }

  add_action('init','load_custom_post_types');
  add_action('after_setup_theme','load_custom_languages');
  add_action('wp_enqueue_scripts','load_custom_js');
	add_action('wp_enqueue_scripts','load_custom_css');

  add_image_size('heading-image',1920,250,array('center','center'));
?>
