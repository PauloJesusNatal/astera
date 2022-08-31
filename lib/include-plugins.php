<?php
/**
 * The plugins necessary for the theme to function properly
 *
 * @link http://tgmpluginactivation.com/configuration/
 *
 * @package _themename
 */

  // Include the TGM_Plugin_Activation class.
  require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

  /**
   * Register the required plugins for this theme.
   *
   *  <snip />
   *
   * This function is hooked into tgmpa_init, which is fired within the
   * TGM_Plugin_Activation class constructor.
   */
  function _themename_register_required_plugins() {
  	$plugins = array(
      array(
        'name'               => 'Advanced Custom Fields',
        'slug'               => 'advanced-custom-fields',
        'source'             => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip',
        'required'           => true,
        'version'            => '5.9.4',
        'force_activation'   => true, // Force activation because we need advanced custom fields
        'force_deactivation' => false,
        'external_url'       => ''
      ),
  	);

  	$config = array(

  	);

  	tgmpa( $plugins, $config );
  }
  
  add_action( 'tgmpa_register', '_themename_register_required_plugins' );
