<?php get_header(); ?>
      
      
    </div> <!-- end .container -->
  </header> <!-- end .header-section -->
      
  <section class="main-content-section">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="blog-posts">

            <?php if ( have_posts() ) :

              while ( have_posts() ) : the_post();

                get_template_part( 'template-parts/content', 'page' );

              endwhile; 

            else :

              get_template_part( 'template-parts/content', 'none' );

            endif; ?>

          </div> <!-- end .blog-posts -->
        </div> <!-- end .col-md-9 -->

        <div class="col-md-3">

          <?php get_sidebar(); ?>

        </div> <!-- end .col-md-3 -->
        
      </div> <!-- end .row -->
    </div> <!-- end .container -->
  </section> <!-- end .main-comtent -->

<?php get_footer(); ?>
