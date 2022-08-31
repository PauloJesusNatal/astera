<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package astera
 */

get_header(); ?>

<div class="container">
  <div class="row">
    <div class="col-12">
      <main role="main">
        <h3><?php esc_html_e('Nothing found here. Maybe try a search?', 'astera'); ?></h3>
        <?php get_search_form(); ?>
      </main>
    </div>
  </div>
</div>

<?php get_footer(); ?>
