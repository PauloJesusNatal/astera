<?php
/**
* Register widget area.
*
* @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
*
* @package astera
*/

function astera_sidebar_widgets() {

    register_sidebar( array(
      'id'            => 'footer-sidebar',
      'name'          => esc_html( 'Footer sidebar', 'astera' ),
      'description'   => esc_html( 'Footer widgets', 'astera' ),
      'before_widget' => '<section id="%1$s" class="c-footer-widget %2$s">',
      'after_widget'  => '</section>',
      'before_title'  => '<h5>',
      'after_title'   => '</h5>'

    ) );
}

add_action( 'widgets_init', 'astera_sidebar_widgets');
