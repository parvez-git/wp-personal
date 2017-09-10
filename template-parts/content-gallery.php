
  <article id="post-<?php the_ID(); ?>" <?php post_class('post-gallery'); ?>>

    <header class="featured-section">

      <div id="carousel-post" class="carousel slide featured-gallery" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
          <?php
            $images = get_post_meta( get_the_ID(), '_devcan_gallery_image', true );
            if( $images ) :
            $i = 0;
            foreach ($images as $image) :
              $i++;
              if ($i == 1) {
                $active = "item active";
              }else{
                $active = "item";
              }
          ?>
                  <div class="<?php echo $active; ?>">
                    <img src="<?php echo $image; ?>" alt="Gallery Image-<?php echo $i; ?>" class="img-responsive">
                  </div>

          <?php endforeach; ?>
            </div>

            <a class="left arrow" href="#carousel-post" role="button" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a class="right arrow" href="#carousel-post" role="button" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
        </div>
      <?php else: ?>
        <figure class="featured-section">
          <?php the_post_thumbnail('full', array('class' => 'featured-image item-bg')); ?>
        </figure>
      <?php endif; ?>

    </header>

    <div class="post-content">

      <span><?php the_category( ', ' ); ?></span>

      <?php
        if ( is_single() ) {
          the_title( '<h2>', '</h2>' );
        } else {
          the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
        }
      ?>

      <span><i class="fa fa-user"></i><?php the_author_posts_link(); ?></span>
      <span><i class="fa fa-calendar"></i><?php the_time('F j, Y'); ?></span>

      <?php if ( is_single() ) : ?>

        <div class="post-content-para">
          <?php the_content(); ?>
        </div>

        <?php if(has_tag()) : ?>
            <span class="tags"><i class="fa fa-tags"></i><?php the_tags(); ?></span>
        <?php
          endif;

        else:
      ?>
        <div class="post-content-para">
          <?php the_excerpt(); ?>
        </div>
        <span class="read-more"><a href="<?php the_permalink(); ?>">Read More</a></span>
      <?php endif; ?>

    </div> <!-- end .post-content -->

    <footer>
      <div class="post-footer">
        <span><i class="fa fa-comments-o"></i><a href="<?php comments_link(); ?>"><?php comments_number(); ?></a></span>
      </div> <!-- end .post-footer -->

      <div class="post-share">
        <?php echo wppersonal_share_this(); ?>
      </div> <!-- end .post-share -->
    </footer>

  </article> <!-- end .article -->
