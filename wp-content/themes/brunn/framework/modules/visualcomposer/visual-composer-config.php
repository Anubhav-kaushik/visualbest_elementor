<?php

/**
 * Force Visual Composer to initialize as "built into the theme". This will hide certain tabs under the Settings->Visual Composer page
 */
if ( function_exists( 'vc_set_as_theme' ) ) {
	vc_set_as_theme( true );
}

/**
 * Change path for overridden templates
 */
if ( function_exists( 'vc_set_shortcodes_templates_dir' ) ) {
	$dir = SELECT_ROOT_DIR . '/vc-templates';
	vc_set_shortcodes_templates_dir( $dir );
}

if ( ! function_exists( 'brunn_select_configure_visual_composer_frontend_editor' ) ) {
	/**
	 * Configuration for Visual Composer FrontEnd Editor
	 * Hooks on vc_after_init action
	 */
	function brunn_select_configure_visual_composer_frontend_editor() {
		/**
		 * Remove frontend editor
		 */
		if ( function_exists( 'vc_disable_frontend' ) ) {
			vc_disable_frontend();
		}
	}
	
	add_action( 'vc_after_init', 'brunn_select_configure_visual_composer_frontend_editor' );
}

if ( ! function_exists( 'brunn_select_vc_row_map' ) ) {
	/**
	 * Map VC Row shortcode
	 * Hooks on vc_after_init action
	 */
	function brunn_select_vc_row_map() {
		
		/******* VC Row shortcode - begin *******/
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'brunn' ),
				'value'      => array(
					esc_html__( 'Full Width', 'brunn' ) => 'full-width',
					esc_html__( 'In Grid', 'brunn' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'anchor',
				'heading'     => esc_html__( 'Select Anchor ID', 'brunn' ),
				'description' => esc_html__( 'For example "home"', 'brunn' ),
				'group'       => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'brunn' ),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'brunn' ),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Select Background Position', 'brunn' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'brunn' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'brunn' ),
				'value'       => array(
					esc_html__( 'Never', 'brunn' )        => '',
					esc_html__( 'Below 1280px', 'brunn' ) => '1280',
					esc_html__( 'Below 1024px', 'brunn' ) => '1024',
					esc_html__( 'Below 768px', 'brunn' )  => '768',
					esc_html__( 'Below 680px', 'brunn' )  => '680',
					esc_html__( 'Below 480px', 'brunn' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'brunn' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'attach_image',
				'param_name' => 'parallax_background_image',
				'heading'    => esc_html__( 'Select Parallax Background Image', 'brunn' ),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'        => 'textfield',
				'param_name'  => 'parallax_bg_speed',
				'heading'     => esc_html__( 'Select Parallax Speed', 'brunn' ),
				'description' => esc_html__( 'Set your parallax speed. Default value is 1.', 'brunn' ),
				'dependency'  => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'textfield',
				'param_name' => 'parallax_bg_height',
				'heading'    => esc_html__( 'Select Parallax Section Height (px)', 'brunn' ),
				'dependency' => array( 'element' => 'parallax_background_image', 'not_empty' => true ),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'brunn' ),
				'value'      => array(
					esc_html__( 'Default', 'brunn' ) => '',
					esc_html__( 'Left', 'brunn' )    => 'left',
					esc_html__( 'Center', 'brunn' )  => 'center',
					esc_html__( 'Right', 'brunn' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);

		do_action( 'brunn_select_action_additional_vc_row_params' );
		
		/******* VC Row shortcode - end *******/
		
		/******* VC Row Inner shortcode - begin *******/
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'row_content_width',
				'heading'    => esc_html__( 'Select Row Content Width', 'brunn' ),
				'value'      => array(
					esc_html__( 'Full Width', 'brunn' ) => 'full-width',
					esc_html__( 'In Grid', 'brunn' )    => 'grid'
				),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'colorpicker',
				'param_name' => 'simple_background_color',
				'heading'    => esc_html__( 'Select Background Color', 'brunn' ),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'attach_image',
				'param_name' => 'simple_background_image',
				'heading'    => esc_html__( 'Select Background Image', 'brunn' ),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'textfield',
				'param_name'  => 'background_image_position',
				'heading'     => esc_html__( 'Select Background Position', 'brunn' ),
				'description' => esc_html__( 'Set the starting position of a background image, default value is top left', 'brunn' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'        => 'dropdown',
				'param_name'  => 'disable_background_image',
				'heading'     => esc_html__( 'Select Disable Background Image', 'brunn' ),
				'value'       => array(
					esc_html__( 'Never', 'brunn' )        => '',
					esc_html__( 'Below 1280px', 'brunn' ) => '1280',
					esc_html__( 'Below 1024px', 'brunn' ) => '1024',
					esc_html__( 'Below 768px', 'brunn' )  => '768',
					esc_html__( 'Below 680px', 'brunn' )  => '680',
					esc_html__( 'Below 480px', 'brunn' )  => '480'
				),
				'save_always' => true,
				'description' => esc_html__( 'Choose on which stage you hide row background image', 'brunn' ),
				'dependency'  => array( 'element' => 'simple_background_image', 'not_empty' => true ),
				'group'       => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		vc_add_param( 'vc_row_inner',
			array(
				'type'       => 'dropdown',
				'param_name' => 'content_text_aligment',
				'heading'    => esc_html__( 'Select Content Aligment', 'brunn' ),
				'value'      => array(
					esc_html__( 'Default', 'brunn' ) => '',
					esc_html__( 'Left', 'brunn' )    => 'left',
					esc_html__( 'Center', 'brunn' )  => 'center',
					esc_html__( 'Right', 'brunn' )   => 'right'
				),
				'group'      => esc_html__( 'Select Settings', 'brunn' )
			)
		);
		
		/******* VC Row Inner shortcode - end *******/
		
		/******* VC Revolution Slider shortcode - begin *******/
		
		if ( brunn_select_revolution_slider_installed() ) {
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'enable_paspartu',
					'heading'     => esc_html__( 'Select Enable Passepartout', 'brunn' ),
					'value'       => array_flip( brunn_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'group'       => esc_html__( 'Select Settings', 'brunn' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'paspartu_size',
					'heading'     => esc_html__( 'Select Passepartout Size', 'brunn' ),
					'value'       => array(
						esc_html__( 'Tiny', 'brunn' )   => 'tiny',
						esc_html__( 'Small', 'brunn' )  => 'small',
						esc_html__( 'Normal', 'brunn' ) => 'normal',
						esc_html__( 'Large', 'brunn' )  => 'large'
					),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'brunn' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_side_paspartu',
					'heading'     => esc_html__( 'Select Disable Side Passepartout', 'brunn' ),
					'value'       => array_flip( brunn_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'brunn' )
				)
			);
			
			vc_add_param( 'rev_slider_vc',
				array(
					'type'        => 'dropdown',
					'param_name'  => 'disable_top_paspartu',
					'heading'     => esc_html__( 'Select Disable Top Passepartout', 'brunn' ),
					'value'       => array_flip( brunn_select_get_yes_no_select_array( false ) ),
					'save_always' => true,
					'dependency'  => array( 'element' => 'enable_paspartu', 'value' => array( 'yes' ) ),
					'group'       => esc_html__( 'Select Settings', 'brunn' )
				)
			);
		}
		
		/******* VC Revolution Slider shortcode - end *******/
	}
	
	add_action( 'vc_after_init', 'brunn_select_vc_row_map' );
}