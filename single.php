<?php get_header(); ?>
      
    </div> <!-- end .container -->
  </header> <!-- end .header-section -->
  
  <section class="main-content-section">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <div class="blog-posts single-post">

            <?php

              while ( have_posts() ) : the_post();

                wppersonal_save_post_views( get_the_ID() );

                get_template_part( 'template-parts/content', get_post_format() );

              endwhile; wp_reset_postdata();

            ?>
            
          </div> <!-- end .blog-posts -->


          <!-- POST PAGINATION -->
          <div class="row">
            <div class="col-md-6">
              <?php 
                if(get_previous_post()): 
                  $previous_post = get_previous_post();
                  $prev = wp_get_attachment_image_src( get_post_thumbnail_id($previous_post->ID), 'thumbnail', false, '' );
                ?> 
              <div class="post-prev item-bg" style="background-image: url('<?php echo $prev[0]; ?>');"> 
                <?php previous_post_link('%link','<i class="fa fa-long-arrow-left"></i> %title'); ?>  
              </div>
              <?php endif; ?>
            </div> <!-- end .col-md-6 -->
            <div class="col-md-6"> 
              <?php 
                if(get_next_post()): 
                  $next_post = get_next_post();
                  $next = wp_get_attachment_image_src( get_post_thumbnail_id($next_post->ID), 'thumbnail', false, '' );
              ?> 
              <div class="post-next item-bg" style="background-image: url('<?php echo $next[0]; ?>');"> 
                <?php next_post_link('%link','%title <i class="fa fa-long-arrow-right"></i>'); ?>  
              </div>
              <?php endif; ?>
            </div> <!-- end .col-md-6 -->
          </div> <!-- end .row -->


          <div class="row">
            <div class="col-md-12">
              <?php  
                if ( comments_open() || get_comments_number() ) :
                  comments_template();
                endif;
              ?>
            </div>
          </div>

          <!-- AUTHOR DETAILS -->
          <div class="row">
            <div class="col-md-12">
              <div class="post-author">
                <div class="author-img item-bg"><?php echo get_avatar( get_the_author_meta( 'ID' ), 222 ); ?></div>
                <div class="author-details">
                  <h4><?php the_author(); ?> <span class="pull-right"><a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">All Post</a></span></h4>
                  <p><?php the_author_meta('description'); ?></p>
                </div>
              </div> <!-- end .post-author -->
            </div>
          </div> <!-- end .row -->

          <!-- RELATED POST -->
            <?php
                                                
              $term_list = get_the_terms(get_the_ID(),'category');
              $cats = array();
              foreach($term_list as $term){
                  $cats[] = $term->term_id;
              }
              $single_query = new WP_Query(array(
                  'posts_per_page' => -1,
                  'post_type'      => 'post',
                  'category__in'   => $cats,
                  'orderby'        => 'rand',
                  'post__not_in'   => array(get_the_ID()),
              ));
              
            if( $single_query->have_posts() ): ?>
              <div class="related-post">
                <h3>Related Post</h3>
                <div class="related-post-slider">

              <?php while($single_query->have_posts()): $single_query->the_post(); ?>

                <div class="single-related-post">
                  <?php 
                    if( has_post_thumbnail() ): 
                      $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
                      $image_url = $image_url[0]; 
                  ?>
                    <div class="related-post-image item-bg" style="background-image: url('<?php echo $image_url; ?>');"></div>
                    <?php else: echo excerpt(28); ?>
                    <?php endif; ?>
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                </div>

              <?php endwhile; wp_reset_postdata(); ?>

                </div> <!-- end .related-post-slider -->

                <div class="post-controller">
                  <span id="slider-prev"></span>
                  <span id="slider-next"></span>
                </div>

              </div> <!-- end .related-post -->

            <?php endif; ?>


        </div> <!-- end .col-md-9 -->

        <div class="col-md-3">

          <?php get_sidebar(); ?>

        </div> <!-- end .col-md-3 -->
      </div> <!-- end .row -->
    </div> <!-- end .container -->
  </section> <!-- end .main-comtent -->
  
<?php get_footer(); ?>


