<?php
/**
 * The Template for displaying all single posts.
 *
 * https://developer.wordpress.org/themes/template-files-section/post-template-files/#single-php
 *
 * @package _themename
 */

 get_header(); ?>

  <div class="block-wrapper page-header" style="background-image:url('<?php echo get_template_directory_uri(); ?>/dist/assets/images/solution-title-bar-bg.jpg')">
    <div class="container">
      <h1><?php echo get_the_title($post->ID); ?></h1>
    </div>
  </div>
  <div class="container single-post">
    <div class="row">
      <div class="col-12">
        <main role="main">
          <?php get_template_part( 'loop', 'single' ); ?>
        </main>
      </div>
    </div>
  </div>

 <?php get_footer(); ?>
