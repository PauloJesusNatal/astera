<?php
/**
 * The loop
 *
 * @link https://developer.wordpress.org/themes/basics/the-loop/
 *
 * @package _themename
 */

  if ( have_posts() ) : ?>
   <?php while ( have_posts() ) : the_post(); ?>

    <div class="col-12 col-md-4 news-post">
      <div class="post h-100">
        <div class="post-thumb">
          <?php if(get_the_post_thumbnail() !== '') { ?>
            <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
              <?php the_post_thumbnail('_themename_post-thumb'); ?>
            </a>
          <?php } ?>
      </div>
      <div class="post-wrapper">
        <div class="post-meta">
          <?php _themename_post_meta(); ?>
        </div>
        <h3><?php the_title(); ?></h3>
        <?php the_excerpt(); ?>
        <?php  _themename_readmore_link(); ?>
      </div>
      </div>
    </div>

  <?php endwhile; ?>
  <?php wp_reset_postdata(); ?>
<?php endif; ?>
