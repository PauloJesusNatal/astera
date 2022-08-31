<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link    https://codex.wordpress.org/Template_Hierarchy
 *
 * @package _themename
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
  if( post_password_required() ) {
    return;
  }
 ?>

 <div id="comments" class="c-comments">

   <?php if(have_comments()) { ?>
     <h2 class="comments-title">
       <?php
        /* translators: 1 is number of comments and 2 is post title */
          printf(
            esc_html( _n(
              '%1$s Reply to "%2$s"',
              '%1$s Replies to "%2$s"',
              get_comments_number(),
              '_themename'
            )),
            number_format_i18n( get_comments_number() ),
            get_the_title()
          )
        ?>
     </h2>

     <ul class="c-comments__list">

       <?php
        wp_list_comments( array(
          'short_ping' => true,
          'avatar_size' => 50,
          'reply_text'  => 'hello',
          'callback' => '_themename_comment_callback'
        ));
       ?>
    </ul>
    <?php the_comments_pagination(); ?>
    <?php } ?>

    <?php if( ! comments_open() && get_comments_number()) { ?>
        <p class="c-comments__closed"><?php esc_html_e( 'Comments are closed for this post', '_themename' ); ?></p>
    <?php } ?>

    <?php comment_form(); ?>

 </div>
