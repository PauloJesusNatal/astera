<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _themename
 */

  get_header(); ?>

  <div class="container">
    <div class="row">
      <?php if( $layout === 'sidebar-left' ) { ?>
        <div class="col-12 col-md-8">
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
      <div class="o-row__column o-row__column--span-12 o-row__column--span-<?php echo esc_attr( $layout ) === 'sidebar-right' || esc_attr( $layout ) === 'sidebar-left' ? '8' : '12' ?>@medium">
        <main role="main">
          <?php get_template_part( 'loop', 'page' ); ?>
        </main>
      </div>
      <?php if( $layout === 'sidebar-right' ) { ?>
        <div class="o-row__column o-row__column--span-12 o-row__column--span-4@medium">
          <?php get_sidebar(); ?>
        </div>
      <?php } ?>
    </div>
  </div>

<?php get_footer(); ?>
