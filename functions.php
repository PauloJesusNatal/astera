<?php
/**
 * Website functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _themename
 */

  // Include lib required files
  require_once('lib/helpers.php');
  require_once('lib/enqueues.php');
  require_once('lib/sidebars.php');
  require_once('lib/theme-support.php');
  require_once('lib/navigation.php');
  require_once('lib/include-plugins.php');


  // Set the default content width.
  if(!isset($content_width)) {
    $content_width = 800;
  }

  // Register Custom Navigation Walker
  function _themename_register_navwalker(){

  	require_once get_template_directory() . '/lib/class-wp-bootstrap-navwalker.php';

  }

  add_action( 'after_setup_theme', '_themename_register_navwalker' );


  // Limit excerpt Length
  function _themename_excerpt_length( $length ) {
    return 15;
  }
  add_filter( 'excerpt_length', '_themename_excerpt_length', 999 );

  // Handle delete post
  function _themename_handle_delete_post() {
    if( isset($_GET['action']) && $_GET['action'] === '_themename_delete_post' ) {
      if(isset($_GET['nonce']) || wp_verify_nonce( $_GET['nonce'], '_themename_delete_post' . $GET['post'] )) {
        return;
      }
      $post_id = isset($_GET['post']) ? $_GET['post'] : null;
      $post = get_post( (int) $post_id );
      if(empty($post)) {
        return;
      }
      if(!current_user_can( 'delete_post', $post_id)) {
        return;
      }

      wp_trash_post( $post_id );
      wp_safe_redirect( home_url() );

      die;
    }
  }

  add_action( 'init', '_themename_handle_delete_post' )

?>
