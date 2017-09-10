<?php get_header(); ?>

    </div> <!-- end .container -->
  </header> <!-- end .header-section -->
      
  <section class="main-content-section">
    <div class="container">
      <div class="row">

          <div class="blog-posts">

            <article id="page-404">

                <header class="page-content text-center">
                  <h2><?php _e( 'Oops! That page can&rsquo;t be found.', 'wppersonal' ); ?></h2>
                  <p><?php _e( 'It looks like nothing was found at this location. ', 'wppersonal' ); ?></p>
                  <a class="wppersonal-btn" href="<?php echo esc_url( home_url( '/' ) ); ?>">Go Home</a>
                </header>

            </article> <!-- end .article --> 

          </div> <!-- end .blog-posts -->
        
      </div> <!-- end .row -->
    </div> <!-- end .container -->
  </section> <!-- end .main-comtent -->

<?php get_footer(); ?>