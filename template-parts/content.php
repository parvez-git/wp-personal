
  <article id="post-<?php the_ID(); ?>" <?php post_class('post-standard'); ?>>

    <?php if( has_post_thumbnail() ): ?>

      <header class="featured-section">
        <a href="<?php the_permalink(); ?>" class="featured-image item-bg" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>')"></a>
      </header>

    <?php endif; ?>

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

          wp_link_pages( array(
            'before'      => '<div class="page-links">' . __( 'Pages:', 'wppersonal' ),
            'after'       => '</div>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
          ) );

        else:
      ?>
      <div class="post-content-para">
        <?php the_excerpt(); ?>
      </div>
        <span class="read-more"><a href="<?php the_permalink(); ?>"><?php echo esc_html('Read More'); ?></a></span>
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
