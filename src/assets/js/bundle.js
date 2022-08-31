import $ from 'jquery';
import './vendor/bootstrap';

$(document).ready(function() {

  // Website preloader
  $('.preloader-wrapper').delay(1500).fadeOut();
  $('body').removeClass('preloader-site');

  // Toggle submenu class to hide/show submenu
  $('.navbar .dropdown').hover( function() {
    $(this).find('.dropdown-menu').first().stop(true, true).toggleClass('dropdown-menu-active');
  });

  // Replace collapse content for new content
  $('button').click( function(e) {
      $('.collapse').collapse('hide');
  });

});
