  
  <article id="page-<?php the_ID(); ?>">

    <?php if( has_post_thumbnail() ): ?>

      <header class="featured-section page-featured-image item-bg" style="background-image: url('<?php echo wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ), 'full' ); ?>')">
      </header>
      
    <?php endif; ?>

    <div class="page-content">


      <?php 
          the_title( '<h2>', '</h2>' );
          the_content(); 
      ?>

    </div> <!-- end .post-content -->

  </article> <!-- end .article --> 