	
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-quote'); ?>>
		<header class="featured-section">
			<?php 
				if( has_post_thumbnail() ){
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
				?>
					<div class="featured-quote item-bg" style="background-image: url('<?php echo $src[0]; ?>');">

				<?php }else{ ?>

					<div class="featured-quote">

				<?php } 
			?>			<div class="quote-content">
				          	<h3 class="quote">
				          		<a href="<?php the_permalink(); ?>">
				          			<?php echo get_post_meta( get_the_ID(), '_devcan_quote_body', 1 ) ?>
				        		</a>
				        	</h3>
				          	<div class="author">
				          		<?php echo get_post_meta( get_the_ID(), '_devcan_quote_author', 1 ) ?>
				          	</div>
				        </div>
				        
			        </div> <!-- end .featured-quote -->
      	</header>
    </article> <!-- end .article -->  