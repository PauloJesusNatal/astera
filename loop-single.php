<?php
/**
 * Single post loop
 *
 * @link https://developer.wordpress.org/themes/basics/the-loop/
 *
 * @package _themename
 */

  if(have_posts()) { ?>
    <?php while(have_posts()) { ?>
      <?php the_post(); ?>

        <?php get_template_part( 'template-parts/post/content', get_post_format() ); ?>

        <?php get_template_part( 'template-parts/single/navigation' ); ?>

      <?php } ?>
  <?php } else { ?>
    <?php get_template_part( 'template-parts/post/content', 'none' ); ?>
  <?php } ?>
