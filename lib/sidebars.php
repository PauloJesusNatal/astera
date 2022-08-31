<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package _themename
*/

function _themename_sidebar_widgets() {

    register_sidebar( array(
      'id'            => 'footer-sidebar',
      'name'          => esc_html( 'Footer sidebar', '_themename' ),
      'description'   => esc_html( 'Footer widgets', '_themename' ),
      'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h5>',
      'after_title'   => '</h5>'

    ) );
}

add_action( 'widgets_init', '_themename_sidebar_widgets');
