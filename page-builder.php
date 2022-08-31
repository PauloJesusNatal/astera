<?php
/**
 * Template Name: Page Builder
 *
 * The template for creating pages through ACF
 *
 * @package _themename
 */

 get_header();

 // Check value exists.
 if( have_rows('page_builder') ):

    // Loop through rows.
    while ( have_rows('page_builder') ) : the_row();


      // Case: Content Block
      if( get_row_layout() == 'content_block' ):

        // Load sub Fields
        $content_block_bg = get_sub_field('content_block_bg');
        $content_block_bg_image = get_sub_field('content_block_bg_image');
        $content_block_bg_colour = get_sub_field('content_block_bg_colour');
        $block_header = get_sub_field('block_header');
        $block_header_content = get_sub_field('block_header_content');
        $block_type = get_sub_field('block_type');
        $block_image_position = get_sub_field('image_position');
        $block_image = get_sub_field('block_image');
        $block_text = get_sub_field('block_text');
        $text_block_right = get_sub_field('text_block_right');
        $text_block_type = get_sub_field('text_block_type');

        ?>
        <div class="block-wrapper content-block " style="background:<?php if( in_array('color', $content_block_bg)) { echo $content_block_bg_colour;} else { ?>url('<?php echo $content_block_bg_image['url'];?>'); <?php }?>">
          <div class="container">
            <div class="row">
              <?php if( in_array('yes', $block_header)) { ?>
                <div class="block-header col-12 <?php if( in_array('image', $content_block_bg)) { echo"image-bg"; }?>">
                  <?php echo $block_header_content;?>
                </div>
              <?php } ?>

              <?php if( in_array('image and text', $block_type)) { ?>
                <?php if( in_array('left', $block_image_position)) { ?>
                  <div class="col-12 col-md-6">
                    <img class="img-responsive slanted-border" src="<?php echo esc_url($block_image['url']);?>" alt="<?php echo esc_attr($block_image['alt']);?>">
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="right">
                        <?php echo $block_text; ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="col-12 col-md-6">
                    <div class="left">
                      <?php echo $block_text; ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <img class="img-responsive slanted-border" src="<?php echo esc_url($block_image['url']);?>" alt="<?php echo esc_attr($block_image['alt']);?>">
                  </div>
                <?php } ?>
              <?php } elseif( in_array('text', $block_type)) { ?>
                <?php if( in_array('full', $text_block_type)) { ?>
                  <div class="col-12 full-text-block">
                    <div>
                      <?php echo $block_text; ?>
                    </div>
                  </div>
                <?php } else { ?>
                  <div class="col-12 col-md-6 bg-image-block">
                    <div class="left">
                      <?php echo $block_text; ?>
                    </div>
                  </div>
                  <div class="col-12 col-md-6 right-text-block">
                      <?php echo $text_block_right; ?>
                  </div>
                  <?php } ?>
              <?php } ?>
            </div>
          </div>
        </div>

      <?php
      // Case: Divider
      elseif( get_row_layout() == 'divider' ):

        // Load sub Fields
        $divider_bg = get_sub_field('divider_bg_colour');
        $divider_height = get_sub_field('divider_height');
        $divider_type = get_sub_field('divider_type');
        $slanted_color = get_sub_field('slanted_color');
        ?>

        <div class="block-wrapper">
          <div class="divider <?php if( in_array('slanted', $divider_type))  echo "slanted"; ?>" style="background-color:<?php echo $divider_bg; ?>; height: <?php echo $divider_height;?>px; <?php if( in_array('slanted', $divider_type))  echo "border-right: 100vw solid $slanted_color"; ?>"></div>
        </div>

      <?php
      // Case: Stats
      elseif( get_row_layout() == 'stats' ):

        // Load sub Fields
        $stats_block_bg = get_sub_field('stats_block_background');

        ?>

        <div class="block-wrapper">
          <div class="stats" style="background-image:url('<?php echo $stats_block_bg['url']; ?>');">
            <div class="container">
              <div class="row">
                 <?php
                   // Check if rows exists
                   if( have_rows('stats_block') ):

                     // Loop through rows
                     while( have_rows('stats_block') ) : the_row();

                     // Load sub Fields
                     $stat_content = get_sub_field('stat_content');
                  ?>

                      <div class="col-12 col-md-3">
                        <?php echo $stat_content; ?>
                      </div>

                  <?php

                      endwhile;

                  endif;
                 ?>
              </div>
            </div>
          </div>
        </div>

        <?php
        // Case: Stats
        elseif( get_row_layout() == 'news' ):

          // Load sub Fields
          $news_block_title = get_sub_field('news_block');

          ?>

          <div class="block-wrapper news-block">
            <div class="container">
              <header>
                <?php echo $news_block_title;  ?>
              </header>

              <?php
                 // the query
                 $the_query = new WP_Query( array(
                    'posts_per_page' => 3,
                 ));
              ?>

              <div class="row">
              <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

                  <div class="col-12 col-md-4 post-container">
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
              </div>

            </div>
          </div>

          <?php
          // Case: Page title section
          elseif( get_row_layout() == 'page_header' ):

            // Load sub Fields
            $page_header_bg = get_sub_field('page_header_bg');
            $page_header_title = get_sub_field('page_header_title');
            $page_header_subtitle = get_sub_field('page_header_subtitle');
            $page_header_icon = get_sub_field('page_header_icon');
            ?>

            <div class="block-wrapper page-header" style="background-image:url('<?php echo $page_header_bg['url']; ?>');">
              <div class="container">
                <?php if($page_header_icon) { ?>
                  <img class="img-responsive" src="<?php echo esc_url($page_header_icon['url']);?>" alt="<?php echo esc_attr($page_header_icon['alt']);?>">
                <?php } ?>
                <div class="titles-wrapper">
                  <h1><?php echo esc_html($page_header_title); ?></h1>
                  <?php if($page_header_subtitle) { ?>
                    <h2><?php echo esc_html($page_header_subtitle); ?></h2>
                  <?php } ?>
                </div>
              </div>
            </div>

            <?php
            // Case: Apps
            elseif( get_row_layout() == 'apps' ):

              // Load sub Fields
              $apps_block_title = get_sub_field('apps_block_title');

              $app_block_content = get_sub_field('app_block_content');

              // Allowed html
             $allowed_html = array(
               'h2' => array(),
                'strong' => array(),
                'br' => array()
              );

              ?>

              <div class="row">
                  <div class="col-md-5ths col-xs-6">
                     ...
                  </div>
              </div>

              <div class="block-wrapper app">
                <div class="container">
                  <?php echo wp_kses( $apps_block_title, $allowed_html );?>
                </div>
                <div class="container-fluid">
                  <div class="row clearfix">
                  <?php
                    // Check if rows exists
                    if( have_rows('app_block_content') ):

                      // Loop through rows
                      while( have_rows('app_block_content') ) : the_row();

                      // Load sub Fields
                      $app = get_sub_field('app');
                    ?>
                    <div class="col-md-5ths">
                       <div class="app-content h-100">
                         <?php echo $app; ?>
                       </div>
                   </div>
                   <?php
                     endwhile;
                   endif; ?>
                   </div>
                </div>
              </div>

              <?php
              // Case: Contacts section
              elseif( get_row_layout() == 'contacts' ):

                // Load sub Fields
                $address = get_sub_field('contact_block_address');
                $email = get_sub_field('contact_block_email');
                $phone = get_sub_field('contact_block_phone');

                // Allowed html
               $allowed_html_contact = array(
                 'h2' => array(),
                  'strong' => array(),
                  'br' => array(),
                  'span' => array()

                );
                ?>

                <div class="block-wrapper contacts">
                  <div class="container">
                    <div class="row">
                      <div class="col-12 contact-info">
                        <div class="row">
                          <div class="col-12 col-md-4">
                            <div class="address h-100">
                              <?php echo wp_kses( $address, $allowed_html_contact );?>
                            </div>
                          </div>
                          <div class="col-12 col-md-4">
                            <div class="email h-100">
                              <?php echo wp_kses( $email, $allowed_html_contact );?>
                            </div>
                          </div>
                          <div class="col-12 col-md-4">
                            <div class="phone h-100">
                              <?php echo wp_kses( $phone, $allowed_html_contact );?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-12  contact-form h-100">
                        <?php //echo do_shortcode( '[contact-form-7 id="137" title="Contacts"]' ); ?>
                        <?php echo do_shortcode( '[contact-form-7 id="169" title="Contact form 1"]' ); ?>
                      </div>
                    </div>
                  </div>
                </div>

                <?php
                // Case: Page slider
                elseif( get_row_layout() == 'page_slider_block' ):

                  // Load sub Fields
                  $page_slider = get_sub_field('page_slider');
                  ?>

                  <div class="block-wrapper">
                      <?php echo $page_slider ?>
                  </div>

                  <?php

                  // Case: Content Block
                  elseif( get_row_layout() == 'challenges_solutions' ):

                    // Load sub Fields
                    $challenges_solutions_bg_color = get_sub_field('challenges_solutions_bg_color');
                    $challenges_solutions_title = get_sub_field('challenges_solutions_title');

                    ?>
                    <div class="block-wrapper challenges-solutions" style="background:<?php echo $challenges_solutions_bg_color;?>">
                      <div class="container">
                        <div class="row">
                            <div class="block-header col-12">
                              <?php echo $challenges_solutions_title;?>
                            </div>
                          </div>

                              <div class="row">
                            <?php
                              // Check if rows exists
                              if( have_rows('challenges_solution_block') ):

                                // Loop through rows
                                while( have_rows('challenges_solution_block') ) : the_row();

                                // Load sub Fields
                                $challenges_solution_block_icon = get_sub_field('challenges_solution_block_icon');
                                $challenges_solution_block_title = get_sub_field('challenges_solution_block_title');
                                $solution_id = get_sub_field('solution_id');
                                $challenge_id = get_sub_field('challenge_id');
                                $solution_content = get_sub_field('solution_content');
                                $challenge_content = get_sub_field('challenge_content');

                              ?>
                            <div class="col-12">
                              <div>
                                <div class="challenge-solution-header">
                                  <h3><i class="fab <?php echo $challenges_solution_block_icon; ?>"></i><span><?php echo esc_html($challenges_solution_block_title);?></span></h3>
                                </div>
                                <div class="challenge-solution-body">

                                  <button class="btn challenges-btn" type="button" data-toggle="collapse" data-target="#<?php echo $challenge_id; ?>" aria-expanded="false" aria-controls="<?php $challenge_id; ?>">
                                     <?php echo esc_html('Challenge', '_themename'); ?>
                                  </button>

                                  <button class="btn solutions-btn" type="button" data-toggle="collapse" data-target="#<?php echo $solution_id; ?>" aria-expanded="false" aria-controls="<?php $solution_id; ?>">
                                     <?php echo esc_html('Solution', '_themename'); ?>
                                   </button>

                                </div>
                                <div class="challenge-solution-footer">

                                  <div class="collapse" id="<?php echo $challenge_id; ?>">
                                    <div class="card card-body">
                                      <?php echo $challenge_content;?>
                                    </div>
                                  </div>

                                  <div class="collapse" id="<?php echo $solution_id; ?>">
                                    <div class="card card-body">
                                      <?php echo $solution_content;?>
                                    </div>
                                  </div>
                                </div>
                             </div>
                           </div>
                         <?php endwhile; ?>
                       <?php endif; ?>
                      </div>
                    </div>
                  </div>
                <?php endif; ?>
              <?php endwhile; // End loop. ?>
            <?php endif; // End if. ?>

<?php get_footer(); ?>
