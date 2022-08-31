<?php
/**
 * Post navigation( Prev/next posts)
 *
 * @package astera
 */

  $prev = get_previous_post();
  $next = get_next_post();
  ?>

  <?php if($prev || $next) { ?>
    <nav role="navigation">
      <div class="c-post-navigation__links">
        <?php if($prev) { ?>
          <div class="c-post-navigation__post c-post-navigation__post--prev">
            <a class="c-post-navigation__link" href="<?php the_permalink( $prev->ID ) ?>">
              <?php if(has_post_thumbnail($prev->ID)) { ?>
                <div class="c-post-navigation__thumbnail">
                  <?php echo get_the_post_thumbnail( $prev->ID, 'thumbnail' ); ?>
                </div>
              <?php } ?>
              <div class="c-post-navigation__content">
                <span class="c-post-navigation__subtitle">
                  <?php esc_html_e( 'Previous Post', 'astera' ); ?>
                </span>
                <span class="c-post-navigation__title">
                  <?php echo esc_html( get_the_title( $prev->ID )); ?>
                </span>
              </div>
            </a>
          </div>
        <?php } ?>
        <?php if($next) { ?>
          <div class="c-post-navigation__post c-post-navigation__post--next">
            <a class="c-post-navigation__link" href="<?php the_permalink( $next->ID ) ?>">
              <?php if(has_post_thumbnail($next->ID)) { ?>
                <div class="c-post-navigation__thumbnail">
                  <?php echo get_the_post_thumbnail( $next->ID, 'thumbnail' ); ?>
                </div>
              <?php } ?>
              <div class="c-post-navigation__content">
                <span class="c-post-navigation__subtitle">
                  <?php esc_html_e( 'Next Post', 'astera' ); ?>
                </span>
                <span class="c-post-navigation__title">
                  <?php echo esc_html( get_the_title( $next->ID )); ?>
                </span>
              </div>
            </a>
          </div>
        <?php } ?>
      </div>
    </nav>
  <?php } ?>
