<?php
/**
 * The custyom Custom navigation menus
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/#navigation-menus
 *
 * @package astera
 */

	// This theme uses wp_nav_menu() in three locations.
  function astera_register_menus() {

    register_nav_menus( array(
      'main-menu' => esc_html__('Main Menu', 'astera'),
      'footer-menu' => esc_html__('Footer Menu', 'astera'),
      'footer-bottom-menu' => esc_html__('Footer bottom Menu', 'astera')
      ) );
  }

  add_action( 'init', 'astera_register_menus');
