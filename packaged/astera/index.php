
<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package astera
 */

get_header();

$news_page_title = get_the_title( get_option('page_for_posts', true) );

$news_page_image_url = wp_get_attachment_url( get_post_thumbnail_id(get_option( 'page_for_posts' )) );

?>

<div class="block-wrapper page-header" style="background-image:url('<?php echo $news_page_image_url; ?>');">
  <div class="container">
    <?php if(is_home()) { ?>
      <h1><?php echo $news_page_title; ?></h1>
    <?php } else { ?>
      <h1><?php echo the_title(); ?></h1>
    <?php } ?>
  </div>
</div>


<div class="container news-block news-section">
  <div class="row">
    <?php get_template_part( 'loop'); ?>
  </div>
  <?php the_posts_pagination(); ?>
</div>

<?php get_footer(); ?>
