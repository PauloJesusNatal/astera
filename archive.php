<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _themename
 */

 get_header(); ?>

  <div class="block-wrapper page-header" style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/solution-title-bar-bg.jpg')">
    <div class="container">
      <header>
        <?php the_archive_title( '<h1>', '</h1>' ); ?>
        <?php the_archive_description( '<p>', '</p>' ); ?>
      </header>
    </div>
  </div>

  <div class="container news-block news-section">
    <div class="row">
      <?php get_template_part( 'loop'); ?>
    </div>
    <?php the_posts_pagination(); ?>
  </div>

<?php get_footer(); ?>
