<?php

function wppersonal_customize_register( $wp_customize ) {

	class Cstmzr_Category_Checkboxes_Control extends WP_Customize_Control {
	    public $type = 'category-checkboxes';

	    public function render_content() {

	        echo '<script src="' . get_template_directory_uri() . '/js/theme-customizer.js"></script>';
	        echo '<span class="customize-control-title">' . esc_html( $this->label ) . '</span>';

	        foreach ( get_categories() as $category ) {
	            echo '<label><input type="checkbox" name="category-' . $category->term_id . '" id="category-' . $category->term_id . '" class="cstmzr-category-checkbox"> ' . $category->cat_name . '</label><br>';
	        }

	        ?><input type="hidden" id="<?php echo $this->id; ?>" class="cstmzr-hidden-categories" <?php $this->link(); ?> value="<?php echo sanitize_text_field( $this->value() ); ?>"><?php
	    }
	}

	$wp_customize->add_section( 'slider_section', array(
	  'title' 		=> __( 'Slider Section', 'wppersonal' ),
	  'description' => __( 'Add slider settings from here', 'wppersonal' ),
	  'priority' 	=> 20,
	) );

	$wp_customize->add_setting( 'slider_number', array(
	  'default' 			=> 4,
  	  'transport' 			=> 'refresh',
  	  'sanitize_callback'   => 'absint'
	) );
	$wp_customize->add_control( 'slider_number', array(
	  'label' 	=> __( 'Number of Slides', 'wppersonal' ),
  	  'type' 	=> 'number',
	  'section' => 'slider_section',
	  'input_attrs' => array(
	    'min' => 1,
	    'max' => 10
	  ),
	) );

	$wp_customize->add_setting( 'cstmzr_categories', array(
	  'sanitize_callback'   => ''
    ) );
	$wp_customize->add_control(
	    new Cstmzr_Category_Checkboxes_Control(
	        $wp_customize,
	        'cstmzr_categories',
	        array(
	            'label' => 'Categories',
	            'section' => 'slider_section',
	            'settings' => 'cstmzr_categories'
	        )
	    )
	);


	// Socials Section
	$wp_customize->add_section( 'general_section', array(
	  'title' 		=> __( 'General Section', 'wppersonal' ),
	  'description' => __( 'Add Socials link and Copyright text here', 'wppersonal' ),
	  'priority' 	=> 30,
	  'panel' 		=> '',
	) );

	// Socials URL
  	$wp_customize->add_setting( 'socials_url_facebook', array(
	  'default' 			=> '',
  	  'transport' 			=> 'refresh',
	  'priority' 			=> 10,
	  'sanitize_callback'   => 'esc_url_raw',
	) );
  	$wp_customize->add_control( 'socials_url_facebook', array(
	  'label' 	=> __( 'Facebook URL', 'wppersonal' ),
  	  'type' 	=> 'text',
	  'section' => 'general_section',
	) );

	$wp_customize->add_setting( 'socials_url_twitter', array(
	  'default' 			=> '',
  	  'transport' 			=> 'refresh',
	  'priority' 			=> 10,
	  'sanitize_callback'   => 'esc_url_raw',
	) );
  	$wp_customize->add_control( 'socials_url_twitter', array(
	  'label' 	=> __( 'Twitter URL', 'wppersonal' ),
  	  'type' 	=> 'text',
	  'section' => 'general_section',
	) );

	$wp_customize->add_setting( 'socials_url_youtube', array(
	  'default' 			=> '',
  	  'transport' 			=> 'refresh',
	  'priority' 			=> 10,
	  'sanitize_callback'   => 'esc_url_raw',
	) );
  	$wp_customize->add_control( 'socials_url_youtube', array(
	  'label' 	=> __( 'Youtube URL', 'wppersonal' ),
  	  'type' 	=> 'text',
	  'section' => 'general_section',
	) );

	$wp_customize->add_setting( 'socials_url_linkedin', array(
	  'default' 			=> '',
  	  'transport' 			=> 'refresh',
	  'priority' 			=> 10,
	  'sanitize_callback'   => 'esc_url_raw',
	) );
  	$wp_customize->add_control( 'socials_url_linkedin', array(
	  'label' 	=> __( 'LinkedIn URL', 'wppersonal' ),
  	  'type' 	=> 'text',
	  'section' => 'general_section',
	) );


  	// Copyright Text
  	$wp_customize->add_setting( 'copyright_text', array(
	  'default' 			=> '@2017 - All right reserved.',
  	  'transport' 			=> 'postMessage',
	  'priority' 			=> 20,
	  'sanitize_callback'   => 'esc_textarea'
	) );

  	$wp_customize->add_control( 'copyright_text', array(
	  'label' 	=> __( 'Copyright Text', 'wppersonal' ),
  	  'type' 	=> 'textarea',
	  'section' => 'general_section',
	) );



}
add_action( 'customize_register', 'wppersonal_customize_register' );



function wppersonal_customizer_live_preview()
{
	wp_enqueue_script(
		'wppersonal-themecustomizer',
		get_template_directory_uri().'/js/customize-scripts.js',
		array( 'jquery','customize-preview' ),
		'',
		true
	);
}
add_action( 'customize_preview_init', 'wppersonal_customizer_live_preview' );
