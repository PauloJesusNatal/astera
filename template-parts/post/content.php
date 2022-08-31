<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _themename
 */

?>
<article class="container">

  <div class="row">
    <div class="feat-image">
    <?php if(get_the_post_thumbnail() !== '') { ?>
      <?php the_post_thumbnail( '_themename-blog-image' ); ?>
    <?php } ?>
    </div>

    <div class="post-meta">
      <?php _themename_post_meta(); ?>
    </div>

    <div class="post-content">
      <?php
      if(is_single()) {
        the_content();
      } else {
        the_excerpt();
      } ?>
    </div>

    <?php if(is_single()) { ?>
      <footer>
        <?php
          if(has_category()) {
            echo '<div class="c-post__cats">';
              /* translators: used between categories */
              $cats_list =  get_the_category_list(esc_html__(', ', '_themename'));
              /* translators: %s is the categories list */
              printf(esc_html__( 'Posted in %s', '_themename' ), $cats_list);
            echo "</div>";
          }
          if(has_tag()) {
            echo '<div class="c-post__tags">';
              $tags_list =  get_the_tag_list('<ul><li>', '</li><li>', '</li></ul>');
              echo $tags_list;
            echo "</div>";
          }
         ?>
      </footer>
    <?php }

    if(!is_single()) { _themename_readmore_link(); }

    ?>
  </div>

</article>
