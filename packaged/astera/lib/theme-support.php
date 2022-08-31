<?php
/**
 * Sets up website defaults and registers support for various WordPress features.
 *
 * @link https://developer.wordpress.org/block-editor/how-to-guides/themes/theme-support/
 *
 * @package astera
 */

  function astera_theme_support() {

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
     add_theme_support( 'title-tag' );

    /*
     * Enable support for Post Thumbnails on posts and pages.
     *
     * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
     */
     add_theme_support( 'post-thumbnails' );

    /*
     * This feature allows the use of HTML5 markup for the search forms, comment forms, comment lists, gallery, and caption.
     *
     * @link https://developer.wordpress.org/reference/functions/add_theme_support/#html5
     */
     add_theme_support( 'html5', array('search-form', 'comment-list', 'comment-form', 'gallery', 'caption') );

     /*
      * This feature enables Selective Refresh for Widgets being managed within the Customizer.
      *
      * @link https://developer.wordpress.org/reference/functions/add_theme_support/#customize-selective-refresh-widgets
      */
      add_theme_support( 'customize-selective-refresh-widgets' );

      /*
       * This feature, first introduced in Version_4.5, enables Theme_Logo support for a theme.
       *
       * @link https://developer.wordpress.org/reference/functions/add_theme_support/#custom-logo
       */
       add_theme_support( 'custom-logo', array(
        'height' => 200,
        'width' => 600,
        'flex-height' => true,
        'flex-width' => true
       ) );

     /**
      * Editor styles
      */
      add_theme_support('editor-styles');
      add_editor_style('dist/assets/css/editor.css');

      /**
       * Enabling theme support for align full and align wide option for the block editor
       */
       add_theme_support( 'align-wide' );

      /**
       * Image sizes
       */
       add_image_size('astera-blog-image', 1200, 550, true);
       add_image_size( 'astera_post-thumb', 375, 250, true );
    }

    add_action( 'after_setup_theme', 'astera_theme_support' );
