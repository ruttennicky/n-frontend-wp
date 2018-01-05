<?php
  function load_custom_js() {

    wp_enqueue_script('custom-scripts', get_stylesheet_directory_uri() . '/js/custom.js',array('jquery'),false,true);

  }

  function load_custom_css() {

  }

  add_action('wp_enqueue_scripts','load_custom_js');
	add_action('wp_enqueue_scripts','load_custom_css');

?>
