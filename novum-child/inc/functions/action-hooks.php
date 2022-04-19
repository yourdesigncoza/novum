<?php
// https://docs.generatepress.com/collection/hooks/
/*----------------------------------------YDCOZA----------------------------------------*/
/*  Custom Secondary nav text */
/*--------------------------------------------------------------------------------------*/
/*--add_action( 'generate_inside_secondary_navigation','example_function_name' );  
function example_function_name() { 
    echo '<span class="nav-cta">Free delivery for orders over <b>R750!</b></span>';
}--*/
/*----------------------------------------YDCOZA----------------------------------------*/
/*  Changing the Copyright Message */
/*--------------------------------------------------------------------------------------*/
// https://docs.generatepress.com/article/changing-the-copyright-message/
add_filter( 'generate_copyright','tu_custom_copyright' );
function tu_custom_copyright() {
    return 'Copyright © Novum Intelligence ' . date('Y') . ' All Rights Reserved.';
}

// add_filter( 'generate_sections_sidebars','__return_true' );

// add_filter( 'generate_sidebar_layout', '__return_false' );

/*----------------------------------------YDCOZA----------------------------------------*/
/*  Add Sections To Custom Post Types */
/*--------------------------------------------------------------------------------------*/
// add_filter( 'generate_sections_post_types','generate_add_section_post_types' );
// function generate_add_section_post_types() {
//       return array( 'page','post','campaign' );
// }

/*----------------------------------------YDCOZA----------------------------------------*/
/*  GeneratePress: Remove all Google Fonts loading and options */
/*--------------------------------------------------------------------------------------*/
// add_filter( 'generate_typography_google_fonts', '__return_empty_string', 100 ); // Must be greater than 50.
// add_filter( 'generate_google_fonts_array', '__return_empty_array' );
// add_filter( 'generate_typography_customize_list', '__return_empty_array' );


// add_filter( 'generate_typography_default_fonts', function( $fonts ) {
//     $fonts[] = 'Eurostile';
//     return $fonts;
// } );

// add_filter( 'generate_woocommerce_menu_item_location', 'tu_move_menu_cart_item' );
// function tu_move_menu_cart_item() {
//     return 'secondary';
// }

/*----------------------------------------YDCOZA----------------------------------------*/
/*  PreLoader */
/*--------------------------------------------------------------------------------------*/
function ydcoza_preloader_body() {
  echo '<div id="preloader"><div id="preloader_status">&nbsp;</div></div>';
}
// add_action( 'generate_before_header', 'ydcoza_preloader_body' );

function ydcoza_preloader_footer() {
  echo "
  <script type='text/javascript'>
    //<![CDATA[
        jQuery(window).on('load', function() { // makes sure the whole site is loaded
            jQuery('#preloader_status').fadeOut(); // will first fade out the loading animation
            jQuery('#preloader').delay(100).fadeOut('slow'); // will fade out the white DIV that covers the website.
            jQuery('body').delay(100).css({'overflow':'visible'});
            // jQuery('body').addClass('show-body');
          })
    //]]>
</script>";
}
// add_action( 'wp_footer', 'ydcoza_preloader_footer' );

/*----------------------------------------YDCOZA----------------------------------------*/
/*  Login Logo */
/*--------------------------------------------------------------------------------------*/
function ydcoza_login_logo() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {
    background-image: url(https://novumintelligence.com/wp-content/uploads/2021/11/cropped-Novum-Intelligence-logo.png);
    padding-bottom: 10px;
    background-size: 200px;
    width: 200px;
    height: 70px;
}
</style>
 <?php 
} 
// add_action( 'login_enqueue_scripts', 'ydcoza_login_logo' );
