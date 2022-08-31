<?php
/**
 * Enqueue website scripts and styles
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package astera
 */

  // Theme styles
  function astera_styles() {

    wp_enqueue_style( 'astera-styles', get_template_directory_uri().'/dist/assets/css/bundle.css', array(), '1.0.0', 'all' );

  }

  add_action('wp_enqueue_scripts', 'astera_styles');


  // Theme scripts
  function astera_scripts() {

    wp_enqueue_script( 'astera-scripts', get_template_directory_uri().'/dist/assets/js/bundle.js',  array('jquery'), '1.0.0', true );

  }

  add_action('wp_enqueue_scripts', 'astera_scripts');
