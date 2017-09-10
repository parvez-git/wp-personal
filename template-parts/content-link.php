
	<article id="post-<?php the_ID(); ?>" <?php post_class('post-link'); ?>>
		<header class="featured-section">
			<?php
				if( has_post_thumbnail() ){
					$src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'full', false, '' );
				?>
					<div class="featured-link item-bg" style="background-image: url('<?php echo $src[0]; ?>');">

				<?php }else{ ?>

					<div class="featured-link">

				<?php }
			?>			<div class="link-content">
				          <h3 class="link">
				          	<a href="<?php the_permalink(); ?>">
				          			<?php the_title(); ?>
				        		</a>
				        	</h3>
			          	<div class="link-url">
			          		<?php $linkurl = get_post_meta( get_the_ID(), '_devcan_link', 1 ); ?>
										<a href="<?php echo $linkurl; ?>"><?php echo $linkurl; ?></a>
			          	</div>
				        </div>

			        </div> <!-- end .featured-quote -->
      	</header>
				<?php if ( is_single() ) : ?>
					<div class="post-content">
						<?php
								the_content();

								if(has_tag()) :
							?>
									<span class="tags"><i class="fa fa-tags"></i><?php the_tags(); ?></span>
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
				<?php endif; ?>

    </article> <!-- end .article -->
