<?php
/**
* The template for displaying the footer
*
* Contains the closing of the #content div and all content after.
*
* @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
*
* @package astera
*/
?>
    </div> <!-- #content -->

    <footer id="footer" role="contentinfo">
      <?php get_template_part( 'template-parts/footer/widgets' ); ?>
      <?php get_template_part( 'template-parts/footer/bottom' ); ?>
    </footer>

    <?php wp_footer(); ?>
  </body>
</html>
