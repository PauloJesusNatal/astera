<?php
/**
 * The header for the website
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package astera
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <?php wp_head(); ?>
  </head>
  <body <?php body_class(); ?>>
    <?php wp_body_open(); ?>

    <!-- Preloader -->
    <div class="preloader-wrapper">
      <div class="preloader">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/preloader.svg"/>
      </div>
    </div>

    <header id="siteHeader">
      <nav class="navbar navbar-expand-lg navbar-fixed-top" id="mainNav">
        <div class="container">

          <!-- Brand -->
          <?php if(has_custom_logo()) {
            the_custom_logo();
          } else { ?>
            <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php esc_html( bloginfo( 'name' ) );  ?></a>
          <?php } ?>

          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
          </button>

            <!-- Site navigation -->
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <?php
                wp_nav_menu( array(
                    'theme_location'  => 'main-menu',
                    'depth'           => 2, // 1 = no dropdowns, 2 = with dropdowns.
                    'menu_class'      => 'navbar-nav ml-auto',
                    'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                    'walker'          => new WP_Bootstrap_Navwalker(),
                ) );
              ?>
            </div>
          </div>
        </nav>
      </header>

    <div id="content">

<?php
