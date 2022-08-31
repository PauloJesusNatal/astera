<?php
/**
 * Enqueue website scripts and styles
 *
 * @link https://developer.wordpress.org/themes/basics/including-css-javascript/
 *
 * @package _themename
 */

  // Theme styles
  function _themename_styles() {

    wp_enqueue_style( '_themename-styles', get_template_directory_uri().'/dist/assets/css/bundle.css', array(), '1.0.0', 'all' );

  }

  add_action('wp_enqueue_scripts', '_themename_styles');


  // Theme scripts
  function _themename_scripts() {

    wp_enqueue_script( '_themename-scripts', get_template_directory_uri().'/dist/assets/js/bundle.js',  array('jquery'), '1.0.0', true );

  }

  add_action('wp_enqueue_scripts', '_themename_scripts');
