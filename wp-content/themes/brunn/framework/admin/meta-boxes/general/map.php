<?php

if ( ! function_exists( 'brunn_select_map_general_meta' ) ) {
	function brunn_select_map_general_meta() {
		
		$general_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => apply_filters( 'brunn_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'general_meta' ),
				'title' => esc_html__( 'General', 'brunn' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'brunn' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'brunn' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'brunn' ),
				'parent'        => $general_meta_box
			)
		);
		
		$qodef_content_padding_group = brunn_select_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Styles', 'brunn' ),
				'description' => esc_html__( 'Define styles for Content area', 'brunn' ),
				'parent'      => $general_meta_box
			)
		);
		
			$qodef_content_padding_row = brunn_select_add_admin_row(
				array(
					'name'   => 'qodef_content_padding_row',
					'parent' => $qodef_content_padding_group
				)
			);
			
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_background_color_meta',
						'type'        => 'colorsimple',
						'label'       => esc_html__( 'Page Background Color', 'brunn' ),
						'parent'      => $qodef_content_padding_row
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_page_background_image_meta',
						'type'          => 'imagesimple',
						'label'         => esc_html__( 'Page Background Image', 'brunn' ),
						'parent'        => $qodef_content_padding_row
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_page_background_repeat_meta',
						'type'          => 'selectsimple',
						'default_value' => '',
						'label'         => esc_html__( 'Page Background Image Repeat', 'brunn' ),
						'options'       => brunn_select_get_yes_no_select_array(),
						'parent'        => $qodef_content_padding_row
					)
				);
		
			$qodef_content_padding_row_1 = brunn_select_add_admin_row(
				array(
					'name'   => 'qodef_content_padding_row_1',
					'next'   => true,
					'parent' => $qodef_content_padding_group
				)
			);
		
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_page_content_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Padding (eg. 10px 5px 10px 5px)', 'brunn' ),
						'parent' => $qodef_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'    => 'qodef_page_content_padding_mobile',
						'type'    => 'textsimple',
						'label'   => esc_html__( 'Content Padding for mobile (eg. 10px 5px 10px 5px)', 'brunn' ),
						'parent'  => $qodef_content_padding_row_1,
						'args'        => array(
							'col_width' => 4
						)
					)
				);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'brunn' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'brunn' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'brunn' ),
					'qodef-grid-1300' => esc_html__( '1300px', 'brunn' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'brunn' ),
					'qodef-grid-1100' => esc_html__( '1100px', 'brunn' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'brunn' ),
					'qodef-grid-800'  => esc_html__( '800px', 'brunn' )
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_grid_space_meta',
				'type'        => 'select',
				'default_value' => '',
				'label'       => esc_html__( 'Grid Layout Space', 'brunn' ),
				'description' => esc_html__( 'Choose a space between content layout and sidebar layout for your page', 'brunn' ),
				'options'     => brunn_select_get_space_between_items_array( true ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'    => 'qodef_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'brunn' ),
				'parent'  => $general_meta_box,
				'options' => brunn_select_get_yes_no_select_array()
			)
		);
		
			$boxed_container_meta = brunn_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_boxed_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'brunn' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'brunn' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'brunn' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'brunn' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'brunn' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'brunn' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'brunn' ),
						'description'   => esc_html__( 'Choose background image attachment', 'brunn' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'brunn' ),
							'fixed'  => esc_html__( 'Fixed', 'brunn' ),
							'scroll' => esc_html__( 'Scroll', 'brunn' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'brunn' ),
				'parent'        => $general_meta_box,
				'options'       => brunn_select_get_yes_no_select_array(),
			)
		);
		
			$paspartu_container_meta = brunn_select_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'qodef_paspartu_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_paspartu_meta'  => array('','no')
						)
					)
				)
			);
		
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'brunn' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'brunn' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'brunn' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'brunn' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_paspartu_responsive_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'brunn' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'brunn' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'brunn' ),
						'options'       => brunn_select_get_yes_no_select_array(),
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'qodef_enable_fixed_paspartu_meta',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'brunn' ),
						'description'   => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'brunn' ),
						'options'       => brunn_select_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'brunn' ),
				'parent'        => $general_meta_box,
				'options'       => brunn_select_get_yes_no_select_array()
			)
		);
		
			$page_transitions_container_meta = brunn_select_add_admin_container(
				array(
					'parent'     => $general_meta_box,
					'name'       => 'page_transitions_container_meta',
					'dependency' => array(
						'hide' => array(
							'qodef_smooth_page_transitions_meta' => array( '', 'no' )
						)
					)
				)
			);
		
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'brunn' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'brunn' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => brunn_select_get_yes_no_select_array()
					)
				);
		
				$page_transition_preloader_container_meta = brunn_select_add_admin_container(
					array(
						'parent'     => $page_transitions_container_meta,
						'name'       => 'page_transition_preloader_container_meta',
						'dependency' => array(
							'hide' => array(
								'qodef_page_transition_preloader_meta' => array( '', 'no' )
							)
						)
					)
				);
				
					brunn_select_create_meta_box_field(
						array(
							'name'   => 'qodef_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'brunn' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = brunn_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'brunn' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'brunn' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = brunn_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					brunn_select_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'qodef_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'brunn' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'brunn' ),
								'brunn_spinner'         => esc_html__( 'Brunn Spinner', 'brunn' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'brunn' ),
								'pulse'                 => esc_html__( 'Pulse', 'brunn' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'brunn' ),
								'cube'                  => esc_html__( 'Cube', 'brunn' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'brunn' ),
								'stripes'               => esc_html__( 'Stripes', 'brunn' ),
								'wave'                  => esc_html__( 'Wave', 'brunn' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'brunn' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'brunn' ),
								'atom'                  => esc_html__( 'Atom', 'brunn' ),
								'clock'                 => esc_html__( 'Clock', 'brunn' ),
								'mitosis'               => esc_html__( 'Mitosis', 'brunn' ),
								'lines'                 => esc_html__( 'Lines', 'brunn' ),
								'fussion'               => esc_html__( 'Fussion', 'brunn' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'brunn' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'brunn' )
							)
						)
					);
					
					brunn_select_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'qodef_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'brunn' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					brunn_select_create_meta_box_field(
						array(
							'name'        => 'qodef_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'brunn' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'brunn' ),
							'options'     => brunn_select_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'brunn' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'brunn' ),
				'parent'      => $general_meta_box,
				'options'     => brunn_select_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_general_meta', 10 );
}

if ( ! function_exists( 'brunn_select_container_background_style' ) ) {
	/**
	 * Function that return container style
	 */
	function brunn_select_container_background_style( $style ) {
		$page_id      = brunn_select_get_page_id();
		$class_prefix = brunn_select_get_unique_page_class( $page_id, true );
		
		$container_selector = array(
			$class_prefix . ' .qodef-content'
		);
		
		$container_class        = array();
		$page_background_color  = get_post_meta( $page_id, 'qodef_page_background_color_meta', true );
		$page_background_image  = get_post_meta( $page_id, 'qodef_page_background_image_meta', true );
		$page_background_repeat = get_post_meta( $page_id, 'qodef_page_background_repeat_meta', true );
		
		if ( ! empty( $page_background_color ) ) {
			$container_class['background-color'] = $page_background_color;
		}
		
		if ( ! empty( $page_background_image ) ) {
			$container_class['background-image'] = 'url(' . esc_url( $page_background_image ) . ')';
			
			if ( $page_background_repeat === 'yes' ) {
				$container_class['background-repeat']   = 'repeat';
				$container_class['background-position'] = '0 0';
			} else {
				$container_class['background-repeat']   = 'no-repeat';
				$container_class['background-position'] = 'center 0';
				$container_class['background-size']     = 'cover';
			}
		}
		
		$current_style = brunn_select_dynamic_css( $container_selector, $container_class );
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'brunn_select_filter_add_page_custom_style', 'brunn_select_container_background_style' );
}