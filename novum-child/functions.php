<?php remove_filter( 'the_content', 'wpautop' );
remove_filter('template_redirect','redirect_canonical');
add_theme_support( 'align-wide' );
add_theme_support( 'wp-block-styles' );

/*----------------------------------------STOCK NUMBER SELECTOR----------------------------------------*/
/*      Remove from all products */
/*--------------------------------------------------------------------------------------*/
// function custom_remove_all_quantity_fields( $return, $product ) {return true;}
// add_filter( 'woocommerce_is_sold_individually','custom_remove_all_quantity_fields', 10, 2 );

/*----------------------------------------YDCOZA----------------------------------------*/
/*      Versioning */
/*--------------------------------------------------------------------------------------*/
function versioning(){
     return time();
    // return '1.1.1';
    
}

/*----------------------------------------YDCOZA----------------------------------------*/
/*      Enque scripts */
/*--------------------------------------------------------------------------------------*/
function theme_enqueue_scripts() {
    $cache_buster = versioning();
    $parent_style = 'generate-style';
    // wp_enqueue_style( 'ydcoza-forms', get_stylesheet_directory_uri() . '/inc/css/ydcoza-forms.css', array( $parent_style ), $cache_buster, 'all'  );
    wp_enqueue_style( 'ydcoza-defaults-style', get_stylesheet_directory_uri() . '/inc/css/ydcoza-default.css', array( $parent_style ), $cache_buster, 'all'  );
    
    // wp_enqueue_script ( 'app-js', get_stylesheet_directory_uri() . '/inc/js/app.js', array(), $cache_buster, true );

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_scripts', 120 );

/*----------------------------------------YDCOZA----------------------------------------*/
/*     Add Page Slug in Body Class of your WordPress Themes  */
/*--------------------------------------------------------------------------------------*/
//Page Slug Body Class
function ydcoza_add_slug_body_class( $classes ) {
    global $post;
    if ( isset( $post ) ) {
    $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter( 'body_class', 'ydcoza_add_slug_body_class' );


/*----------------------------------------YDCOZA----------------------------------------*/
/*  Logout Redirect */
/*--------------------------------------------------------------------------------------*/
add_action('wp_logout','ps_redirect_after_logout');
function ps_redirect_after_logout(){
         wp_redirect( site_url().'/login' );
         exit();
}

/*----------------------------------------YDCOZA----------------------------------------*/
/*	Disable WordPress Admin Bar for all users but admins. */
/*--------------------------------------------------------------------------------------*/
add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if (!current_user_can('administrator') && !is_admin()) {
      show_admin_bar(false);
    }
}

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
} add_action( 'login_enqueue_scripts', 'ydcoza_login_logo' );

/*----------------------------------------YDCOZA----------------------------------------*/
/*  Changing the Copyright Message */
/*--------------------------------------------------------------------------------------*/
add_filter( 'generate_copyright','tu_custom_copyright' );
function tu_custom_copyright() {
    return 'Copyright © Novum Intelligence ' . date('Y') . ' All Rights Reserved.';
}

/*----------------------------------------YDCOZA----------------------------------------*/
/*  Additional Functions */
/*--------------------------------------------------------------------------------------*/
// Action Hooks
// get_template_part( 'inc/functions/action-hooks' );

// Shortcodes
get_template_part( 'inc/functions/shortcodes' );

// Woo
// get_template_part( 'inc/functions/woo-functions' );
