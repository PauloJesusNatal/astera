<?php
/**
 * The template for displaying the footer bootm section
 *
 * @package astera
 */
 ?>

<div class="container">
  <div class="middle-footer">
    <div class="row">
      <div class="col-12 col-md-6">
        <img src="<?php echo get_template_directory_uri(); ?>/dist/assets/images/logo-footer.png" class="img-responsive footer-logo" alt="<?php esc_attr('Astera'); ?>" />
      </div>
      <div class="col-12 col-md-6">
        <nav>
          <?php
            wp_nav_menu( array(
                'theme_location'  => 'main-menu',
                'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                'menu_class'      => 'footer-menu',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
          ?>
        </nav>
      </div>
    </div>
  </div>
  <div class="bottom-footer">
    <div class="row">
      <div class="col-12 col-md-6">
        <p><?php echo esc_html( 'Copyright', 'astera' ); ?> &copy; <?php echo date('Y'); echo esc_html( ', Astera. All Rights Reserved.', 'astera' ); ?></p>
      </div>
      <div class="col-12 col-md-6">
        <nav>
          <?php
            wp_nav_menu( array(
                'theme_location'  => 'footer-bottom-menu',
                'depth'           => 1, // 1 = no dropdowns, 2 = with dropdowns.
                'menu_class'      => 'bottom-footer-menu',
                'fallback_cb'     => 'WP_Bootstrap_Navwalker::fallback',
                'walker'          => new WP_Bootstrap_Navwalker(),
            ) );
          ?>
        </nav>
      </div>
    </div>
  </div>
</div>
