<?php
  function load_custom_js() {
    if(!is_admin()) {

      wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/custom.js',array('jquery'),false,true);

    }
  }

  function load_custom_css() {
    if(!is_admin()) {

    }
  }

  add_action('wp_enqueue_scripts','load_custom_js');
	add_action('wp_enqueue_scripts','load_custom_css');

?>
