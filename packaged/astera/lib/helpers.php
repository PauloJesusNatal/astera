<?php
/**
 * Website post meta
 *
 * @package astera
 */

// Use if(!function_exists() to allow child themes to override parent theme functions)
if(!function_exists('astera_post_meta')) {
  function astera_post_meta() {

    /* Translators: %s: Post Author */
    printf(
      esc_html__( ' By %s', 'astera' ),
      '<a href="' . esc_url(get_author_posts_url( get_the_author_meta( 'ID' ))) . '">' . esc_html( get_the_author()) . '</a>'
    );

    /* Translators: %s: Post Date */
    printf(
      esc_html__(' / %s', 'astera'),
      '<a href="' . esc_url(get_permalink()) . '"><time datetime="' . esc_attr( get_the_date('c')) . '">' . esc_html( get_the_date()) . '</time></a>'
    );
  }
}

  //Posts read more link_pages
  function astera_readmore_link() {
    echo '<a class="c-post__readmore" href="' . esc_url(get_permalink()) . '" title="' . the_title_attribute(['echo' => false]) . '">';

    /* Translators: %s: Post Title */
    printf(
      wp_kses(
        __( 'Read more <span class="u-screen-reader-text">About %s', 'astera' ),
        [
          'span' => [
              'class' => []
          ]
        ]
      ),
      get_the_title()
    );

    echo '</a>';
  }

  // Delete post
  function astera_delete_post() {
    $url = add_query_arg([
      'action' => 'astera_delete_post',
      'post' => get_the_ID(),
      'nonce' => wp_create_nonce( 'astera_delete_post' . get_the_ID() )
    ], home_url());
    if(current_user_can( 'delete_post', get_the_ID() )) {
      return "<a href='" . esc_url($url) . "'>" . esc_html__('Delete Post', 'astera') . "</a>";
    }
  }

  // Single post layout option
  function astera_meta( $id, $key, $default ) {
    $value = get_post_meta( $id, $key, true );
    if(!$value && $default) {
      return $default;
    }
    return $value;
  }
?>
