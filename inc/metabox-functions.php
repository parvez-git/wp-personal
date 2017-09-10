<?php

/* -------------------------------------------------------------------------------
 *  DEVCAN : CMB2
 * -----------------------------------------------------------------------------*/

if ( file_exists( dirname( __FILE__ ) . '/inc/cmb2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/inc/cmb2/init.php';
} elseif ( file_exists( dirname( __FILE__ ) . '/inc/CMB2/init.php' ) ) {
	require_once dirname( __FILE__ ) . '/inc/CMB2/init.php';
}

add_action( 'cmb2_admin_init', 'devcan_register_gallery_metabox' );
add_action( 'cmb2_admin_init', 'devcan_register_image_metabox' );
add_action( 'cmb2_admin_init', 'devcan_register_aside_metabox' );
add_action( 'cmb2_admin_init', 'devcan_register_video_metabox' );
add_action( 'cmb2_admin_init', 'devcan_register_audio_metabox' );

add_action( 'cmb2_admin_init', 'devcan_register_link_metabox' );
add_action( 'cmb2_admin_init', 'devcan_register_quote_metabox' );

function devcan_register_gallery_metabox() {
	$prefix = '_devcan_';

	$cmb_gallery = new_cmb2_box( array(
		'id'            => $prefix . 'gallery_format',
		'title'         => esc_html__( 'Gallery Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
		'show_on_cb'    => 'devcan_show_on_gallery_post_format', // function should return a bool value
	) );

	$cmb_gallery->add_field( array(
		'name'         => esc_html__( 'Multiple Images', 'wppersonal' ),
		'desc'         => esc_html__( 'Upload or add multiple images/attachments.', 'wppersonal' ),
		'id'           => $prefix . 'gallery_image',
		'type'         => 'file_list',
		'preview_size' => array( 100, 100 ), // Default: array( 50, 50 )
	) );

}

function devcan_register_image_metabox() {
	$prefix = '_devcan_';

	$cmb_image = new_cmb2_box( array(
		'id'            => $prefix . 'image_format',
		'title'         => esc_html__( 'Image Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
	) );

	$cmb_image->add_field( array(
		'name' => esc_html__( 'Image', 'wppersonal' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'wppersonal' ),
		'id'   => $prefix . 'image',
		'type' => 'file',
	) );

}

function devcan_register_aside_metabox() {
	$prefix = '_devcan_';

	$cmb_aside = new_cmb2_box( array(
		'id'            => $prefix . 'aside_format',
		'title'         => esc_html__( 'Aside Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
	) );

	$cmb_aside->add_field( array(
		'name' => esc_html__( 'Aside Image', 'wppersonal' ),
		'desc' => esc_html__( 'Upload an image or enter a URL.', 'wppersonal' ),
		'id'   => $prefix . 'aside',
		'type' => 'file',
	) );

}

function devcan_register_video_metabox() {
	$prefix = '_devcan_';

	$cmb_video = new_cmb2_box( array(
		'id'            => $prefix . 'video_format',
		'title'         => esc_html__( 'Video Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
	) );

	$cmb_video->add_field( array(
		'name' => esc_html__( 'oEmbed', 'wppersonal' ),
		'desc' => sprintf(
			esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'wppersonal' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'   => $prefix . 'embed_video',
		'type' => 'oembed',
	) );

}

function devcan_register_audio_metabox() {
	$prefix = '_devcan_';

	$cmb_audio = new_cmb2_box( array(
		'id'            => $prefix . 'audio_format',
		'title'         => esc_html__( 'Audio Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
	) );

	$cmb_audio->add_field( array(
		'name' => esc_html__( 'oEmbed', 'wppersonal' ),
		'desc' => sprintf(
			esc_html__( 'Enter a youtube, twitter, or instagram URL. Supports services listed at %s.', 'wppersonal' ),
			'<a href="https://codex.wordpress.org/Embeds">codex.wordpress.org/Embeds</a>'
		),
		'id'   => $prefix . 'embed_audio',
		'type' => 'oembed',
	) );

}

function devcan_register_link_metabox() {
	$prefix = '_devcan_';

	$cmb_link = new_cmb2_box( array(
		'id'            => $prefix . 'link_format',
		'title'         => esc_html__( 'Link Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
	) );

	$cmb_link->add_field( array(
		'name' 				=> esc_html__( 'URL', 'wppersonal' ),
		'id'   				=> $prefix . 'link',
		'type' 				=> 'text_url',
		'attributes' 	=> array( 'style' => 'width:95%' ),
	) );

}

function devcan_register_quote_metabox() {
	$prefix = '_devcan_';

	$cmb_quote = new_cmb2_box( array(
		'id'            => $prefix . 'quote_format',
		'title'         => esc_html__( 'Quote Post Format', 'wppersonal' ),
		'object_types'  => array( 'post' ),
	) );

	$cmb_quote->add_field( array(
		'name' => esc_html__( 'Quote', 'wppersonal' ),
		'id'   => $prefix . 'quote_body',
		'type' => 'textarea_small'
	) );
	$cmb_quote->add_field( array(
		'name' => esc_html__( 'Author', 'wppersonal' ),
		'id'   => $prefix . 'quote_author',
		'type' => 'text'
	) );

}
