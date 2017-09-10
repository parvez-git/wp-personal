<?php


/*
	Edit default WordPress widgets
*/
function wppersonal_tag_cloud_font_change( $args ) {

	$args['smallest'] = 8;
	$args['largest'] = 8;

	return $args;

}
add_filter( 'widget_tag_cloud_args', 'wppersonal_tag_cloud_font_change' );

function wppersonal_list_categories_output_change( $links ) {

	$links = str_replace('</a> (', '</a> <span> (', $links);
	$links = str_replace(')', ') </span>', $links);

	return $links;

}
add_filter( 'wp_list_categories', 'wppersonal_list_categories_output_change' );


/*
	Save Posts views
*/
function wppersonal_save_post_views( $postID ) {

	$metaKey = 'wppersonal_post_views';
	$views = get_post_meta( $postID, $metaKey, true );

	$count = ( empty( $views ) ? 0 : $views );
	$count++;

	update_post_meta( $postID, $metaKey, $count );

}
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );

/*
	Popular Posts Widget
*/
class WPPersonal_Popular_Posts_Widget extends WP_Widget {

	//setup the widget name, description, etc...
	public function __construct() {

		$widget_ops = array(
			'classname' => 'wppersonal-popular-posts-widget',
			'description' => 'Popular Posts Widget',
		);
		parent::__construct( 'wppersonal_popular_posts', 'WPPersonal Popular Posts', $widget_ops );

	}

	// back-end display of widget
	public function form( $instance ) {

		$title = ( !empty( $instance[ 'title' ] ) ? $instance[ 'title' ] : 'Popular Posts' );
		$tot = ( !empty( $instance[ 'tot' ] ) ? absint( $instance[ 'tot' ] ) : 4 );

		$output = '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'title' ) ) . '">Title:</label>';
		$output .= '<input type="text" class="widefat" id="' . esc_attr( $this->get_field_id( 'title' ) ) . '" name="' . esc_attr( $this->get_field_name( 'title' ) ) . '" value="' . esc_attr( $title ) . '"';
		$output .= '</p>';

		$output .= '<p>';
		$output .= '<label for="' . esc_attr( $this->get_field_id( 'tot' ) ) . '">Number of Posts:</label>';
		$output .= '<input type="number" class="widefat" id="' . esc_attr( $this->get_field_id( 'tot' ) ) . '" name="' . esc_attr( $this->get_field_name( 'tot' ) ) . '" value="' . esc_attr( $tot ) . '"';
		$output .= '</p>';

		echo $output;

	}

	//update widget
	public function update( $new_instance, $old_instance ) {

		$instance = array();
		$instance[ 'title' ] = ( !empty( $new_instance[ 'title' ] ) ? strip_tags( $new_instance[ 'title' ] ) : '' );
		$instance[ 'tot' ] = ( !empty( $new_instance[ 'tot' ] ) ? absint( strip_tags( $new_instance[ 'tot' ] ) ) : 0 );

		return $instance;

	}

	//front-end display of widget
	public function widget( $args, $instance ) {

		$tot = absint( $instance[ 'tot' ] );

		$posts_args = array(
			'post_type'			=> 'post',
			'posts_per_page'	=> $tot,
			'meta_key'			=> 'wppersonal_post_views',
			'orderby'			=> 'meta_value_num',
			'order'				=> 'DESC'
		);

		$posts_query = new WP_Query( $posts_args );

		echo $args[ 'before_widget' ];

		if( !empty( $instance[ 'title' ] ) ):

			echo $args[ 'before_title' ] . apply_filters( 'widget_title', $instance[ 'title' ] ) . $args[ 'after_title' ];

		endif;

		if( $posts_query->have_posts() ):

			echo '<ul>';

				while( $posts_query->have_posts() ): $posts_query->the_post();

					$ppost = '<li>';
					$ppost .= '<a href="' . get_the_permalink() . '" title="' . get_the_title() . '">' . get_the_title() . '</a>';
					$ppost .= '<span class="ppmeta"><i class="fa fa-calendar"></i> '. get_the_date() .'</span>';
					$ppost .= '<span class="ppmeta ppmeta-comments"><i class="fa fa-comments"></i> '. get_comments_number() .'</span>';
					$ppost .= '</li>';
					echo $ppost;

				endwhile;

			echo '</ul>';

		endif;

		echo $args[ 'after_widget' ];

	}

}
add_action( 'widgets_init', function() {
	register_widget( 'WPPersonal_Popular_Posts_Widget' );
} );
