<?php
/**
 * The custyom Custom navigation menus
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/#navigation-menus
 *
 * @package _themename
 */

	// This theme uses wp_nav_menu() in three locations.
  function _themename_register_menus() {

    register_nav_menus( array(
      'main-menu' => esc_html__('Main Menu', '_themename'),
      'footer-menu' => esc_html__('Footer Menu', '_themename'),
      'footer-bottom-menu' => esc_html__('Footer bottom Menu', '_themename')
      ) );
  }

  add_action( 'init', '_themename_register_menus');
