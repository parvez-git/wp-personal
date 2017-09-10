<?php

/* -------------------------------------------------------------------------------
 *  WPPERSONAL : Include Files
 * -----------------------------------------------------------------------------*/
include get_parent_theme_file_path( '/inc/CMB2/init.php' );
include get_parent_theme_file_path( '/inc/metabox-functions.php' );
include get_parent_theme_file_path( '/inc/widget-functions.php' );
include get_parent_theme_file_path( '/inc/custom-post-type.php' );
include get_parent_theme_file_path( '/inc/ajax.php' );
include get_parent_theme_file_path( '/inc/shortcodes.php' );
include get_parent_theme_file_path( '/inc/customizer-api.php' );


/* -------------------------------------------------------------------------------
 *  WPPERSONAL : After Theme Setup
 * -----------------------------------------------------------------------------*/
if ( ! function_exists( 'wppersonal_theme_setup' ) ) :

function wppersonal_theme_setup() {

    load_theme_textdomain( 'wppersonal', get_template_directory() . '/languages' );

    add_theme_support('title-tag');

    add_theme_support( 'automatic-feed-links' );

    add_theme_support( 'post-thumbnails' );

    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'wppersonal' ),
        'secondary' => __('Secondary Menu', 'wppersonal' )
    ) );

    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'link', 'image', 'audio', 'video' ) );

    add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );

    add_image_size( 'slider-image', 1170, 444, true );

    if ( ! isset( $content_width ) ) $content_width = 900;
}

endif;
add_action( 'after_setup_theme', 'wppersonal_theme_setup' );


/* -------------------------------------------------------------------------------
 *  WPPERSONAL : Theme Enqueue Scripts
 * -----------------------------------------------------------------------------*/
function wppersonal_theme_scripts() {

  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0', 'all');
  wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.3.7', 'all');
  wp_enqueue_style( 'bxslider', get_template_directory_uri() . '/css/bxslider.css', array(), '1.1', 'all');
  wp_enqueue_style( 'mainstyle', get_template_directory_uri() . '/css/main.css', array(), '1.1', 'all');
  wp_enqueue_style( 'style', get_stylesheet_uri() );


  wp_enqueue_script( 'bootstrap-min-js', get_template_directory_uri() . '/js/bootstrap.min.js', array ( 'jquery' ), '3.3.7', true);
  wp_enqueue_script( 'bxslider-min', get_template_directory_uri() . '/js/jquery.bxslider.min.js', array ( 'jquery' ), '4.1.2', true);
  wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/scripts.js', array ( 'jquery' ), '1.0.0', true);

  if ( is_singular() ) wp_enqueue_script( "comment-reply" );
}
add_action( 'wp_enqueue_scripts', 'wppersonal_theme_scripts' );


/* -------------------------------------------------------------------------------
 *  WPPERSONAL : Admin Enqueue Scripts
 * -----------------------------------------------------------------------------*/
function wppersonal_admin_style_enqueue() {

  wp_enqueue_script('wppersonal-admin-scripts', get_template_directory_uri() . '/js/admin-scripts.js', array('jquery'), '1.0.0');
}
add_action( 'admin_enqueue_scripts', 'wppersonal_admin_style_enqueue' );


/* -------------------------------------------------------------------------------
 *  WPPERSONAL : Register Sidebar
 * -----------------------------------------------------------------------------*/
function wppersonal_widgets_init() {
  register_sidebar( array(
    'name'          => __( 'Sidebar', 'wppersonal' ),
    'id'            => 'sidebar-right',
    'description'   => __( 'Add widgets here to appear in your sidebar.', 'wppersonal' ),
    'before_widget' => '<div class="sidebar-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3>',
    'after_title'   => '</h3>',
  ) );

  register_sidebar( array(
    'name'          => __( 'Footer 1', 'wppersonal' ),
    'id'            => 'footer-widget-1',
    'description'   => __( 'Add widgets here to appear in your footer.', 'wppersonal' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer 2', 'wppersonal' ),
    'id'            => 'footer-widget-2',
    'description'   => __( 'Add widgets here to appear in your footer.', 'wppersonal' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer 3', 'wppersonal' ),
    'id'            => 'footer-widget-3',
    'description'   => __( 'Add widgets here to appear in your footer.', 'wppersonal' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );
  register_sidebar( array(
    'name'          => __( 'Footer 4', 'wppersonal' ),
    'id'            => 'footer-widget-4',
    'description'   => __( 'Add widgets here to appear in your footer.', 'wppersonal' ),
    'before_widget' => '<div class="footer-widget">',
    'after_widget'  => '</div>',
    'before_title'  => '<h3 class="widget-title">',
    'after_title'   => '</h3>',
  ) );

}
add_action( 'widgets_init', 'wppersonal_widgets_init' );



/* -------------------------------------------------------------------------------
 *  WPPERSONAL : Helper Function
 * -----------------------------------------------------------------------------*/
function excerpt($limit) {
    return wp_trim_words(get_the_excerpt(), $limit);
}



/* -------------------------------------------------------------------------------
 *  WPPERSONAL : Socials Share
 * -----------------------------------------------------------------------------*/

function wppersonal_share_this() {
  global $post;

    $sb_url = urlencode(get_permalink());

    $sb_title = str_replace( ' ', '%20', get_the_title());

    $sb_thumb = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );

    $twitterURL = 'https://twitter.com/intent/tweet?text='.$sb_title.'&amp;url='.$sb_url.'&amp;via=wppersonal';
    $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$sb_url;
    $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$sb_url.'&amp;title='.$sb_title;

    $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$sb_url.'&amp;media='.$sb_thumb[0].'&amp;description='.$sb_title;
    $gplusURL ='https://plus.google.com/share?url='.$sb_title.'';

    $share  = '';
    $share .= '<div class="post-share">';
    $share .= '<a href="'. $twitterURL .'" target="_blank"><i class="fa fa-twitter"></i></a>';
    $share .= '<a href="'.$facebookURL.'" target="_blank"><i class="fa fa-facebook"></i></a>';
    $share .= '<a href="'.$pinterestURL.'" target="_blank"><i class="fa fa-pinterest"></i></a>';
    $share .= '<a href="'.$linkedInURL.'" target="_blank"><i class="fa fa-linkedin"></i></a>';
    $share .= '<a href="'.$gplusURL.'" target="_blank"><i class="fa fa-google-plus"></i></a>';
    $share .= '</div>';

    return $share;
};
