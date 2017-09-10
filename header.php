<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
      <meta charset="<?php bloginfo( 'charset' ); ?>" />
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
  </head>
<body <?php body_class(); ?>>

  <div class="wppersonal-sidebar sidebar-closed">
    <div class="sidebar-container">
      <a href="#" class="js-toggleSidebar sidebar-close"><i class="fa fa-close"></i></a>
      <div class="sidebar-scroll">
        <div class="logo">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
        </div>
        <?php
          wp_nav_menu( array(
            'theme_location'  => 'primary',
            'container'       => 'nav',
            'menu_id'         => 'navigation',
            'menu_class'      => 'main-menu'
          ) );
        ?>
      </div>
    </div>
  </div>
  <div class="sidebar-overlay js-toggleSidebar"></div>

  <header class="header-section">
    <div class="container">
      <div class="row">
        <div class="header-top-area"></div>
        <div class="header-top">
          <div class="col-sm-4 col-md-4">
            <a href="#" class="js-toggleSidebar slidebar-open">
              <i class="fa fa-align-justify"></i>
            </a>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="logo">
              <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
            </div>
          </div>
          <div class="col-sm-4 col-md-4">
            <div class="socials">

            <?php if( get_theme_mod( 'socials_url_facebook' ) != '' ) { ?>
              <a id="social-facebook" href="<?php echo get_theme_mod( 'socials_url_facebook' ); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
            <?php } if( get_theme_mod( 'socials_url_twitter' ) != '') { ?>
              <a id="social-twitter" href="<?php echo get_theme_mod( 'socials_url_twitter' ); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
            <?php } if( get_theme_mod( 'socials_url_youtube' ) != '') { ?>
              <a id="social-youtube" href="<?php echo get_theme_mod( 'socials_url_youtube' ); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
            <?php } if( get_theme_mod( 'socials_url_linkedin' ) != '') { ?>
              <a id="social-linkedin" href="<?php echo get_theme_mod( 'socials_url_linkedin' ); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
            <?php }  ?>

            </div> <!-- end .socials -->
          </div>

        </div> <!-- end .header-top -->
      </div> <!-- end .row -->
