      <div class="row">
        <div class="slider-section">
          <ul class="bxslider">
          <?php

            $slider_query = new WP_Query(array(
              'post_type'      => 'post',
              'posts_per_page' => get_theme_mod( 'slider_number' ),
              'cat'            => get_theme_mod( 'cstmzr_categories', 1 )
            ));
            if( $slider_query->have_posts() ):
              while( $slider_query->have_posts() ): $slider_query->the_post();
          ?>
            <li>
            <?php
              if(has_post_thumbnail()){
                the_post_thumbnail( 'slider-image', array( 'class' => 'img-responsive' ));
              } else{ ?>
                <img src="<?php echo get_template_directory_uri() ?>/img/header-bg.jpg" />
             <?php }
            ?>
              <div class="slider-content">
                <h5><?php the_category( ', ' ); ?></h5>
                <?php the_title( '<h1><a href="'.esc_url(get_permalink()).'">', '</a></h1>'); ?>
              </div>
            </li>

          <?php endwhile; wp_reset_postdata(); ?>
          <?php else: ?>
            <li>
              <img src="<?php echo get_template_directory_uri() ?>/img/header-bg.jpg" />
              <div class="slider-content">
                <h5>Blog Category</h5>
                <h1>Blog Title.</h1>
              </div>
            </li>
          <?php endif; ?>
          </ul>
          <div class="slider-controller">
            <span id="slidermain-prev"></span>
            <span id="slidermain-next"></span>
          </div>
        </div>
      </div> <!-- end .row -->
