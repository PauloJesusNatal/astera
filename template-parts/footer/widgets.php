<?php
/**
 * The footer widget sidebar
 *
 * @link http://tgmpluginactivation.com/configuration/
 *
 * @package _themename
 */
 ?>

<div class="top-footer">
  <div class="container">
    <?php
      if(is_active_sidebar( 'footer-sidebar')) {
        dynamic_sidebar( 'footer-sidebar');
    }?>
  </div>
</div>
