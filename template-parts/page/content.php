<?php
/**
 * Template part for displaying pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _themename
 */

?>
<article <?php post_class('c-page u-margin-bottom-20'); ?>>

  <header class="c-page__header">
    <h1 class="c-page__title">
      <?php the_title(); ?>
    </h1>
  </header>

  <div class="c-page__content">
    <?php the_content(); ?>
  </div>

</article>
