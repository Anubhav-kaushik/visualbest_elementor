<?php

if ( ! function_exists( 'brunn_select_get_title_types_meta_boxes' ) ) {
	function brunn_select_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'brunn_select_filter_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'brunn' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'brunn_select_map_title_meta' ) ) {
	function brunn_select_map_title_meta() {
		$title_type_meta_boxes = brunn_select_get_title_types_meta_boxes();
		
		$title_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => apply_filters( 'brunn_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'title_meta' ),
				'title' => esc_html__( 'Title', 'brunn' ),
				'name'  => 'title_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'brunn' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'brunn' ),
				'parent'        => $title_meta_box,
				'options'       => brunn_select_get_yes_no_select_array()
			)
		);
		
			$show_title_area_meta_container = brunn_select_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'qodef_show_title_area_meta_container',
					'dependency' => array(
						'hide' => array(
							'qodef_show_title_area_meta' => 'no'
						)
					)
				)
			);
		
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'brunn' ),
						'description'   => esc_html__( 'Choose title type', 'brunn' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'brunn' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'brunn' ),
						'options'       => brunn_select_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'brunn' ),
						'description' => esc_html__( 'Set a height for Title Area', 'brunn' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'brunn' ),
						'description' => esc_html__( 'Choose a background color for title area', 'brunn' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'brunn' ),
						'description' => esc_html__( 'Choose an Image for title area', 'brunn' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'brunn' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'brunn' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'brunn' ),
							'hide'                => esc_html__( 'Hide Image', 'brunn' ),
							'hide-on-mobile'      => esc_html__( 'Hide Image on Mobile', 'brunn' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'brunn' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'brunn' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'brunn' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'brunn' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'brunn' )
						)
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'brunn' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'brunn' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'brunn' ),
							'header-bottom' => esc_html__( 'From Bottom of Header', 'brunn' ),
							'window-top'    => esc_html__( 'From Window Top', 'brunn' )
						)
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'brunn' ),
						'options'       => brunn_select_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'brunn' ),
						'description' => esc_html__( 'Choose a color for title text', 'brunn' ),
						'parent'      => $show_title_area_meta_container
					)
				);

				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_title_text_font_size_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Title Font Size', 'brunn' ),
						'description' => esc_html__( 'Enter number of pixels', 'brunn' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);

                brunn_select_create_meta_box_field(
                    array(
                        'name'        => 'qodef_title_area_title_width_meta',
                        'type'        => 'text',
                        'label'       => esc_html__('Title Width', 'brunn'),
                        'description' => esc_html__('Set a width for Title Area', 'brunn'),
                        'parent'      => $show_title_area_meta_container,
                        'args'        => array(
                            'col_width' => 2,
                            'suffix'    => 'px'
                        )
                    )
                );

                brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'brunn' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'brunn' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'          => 'qodef_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'brunn' ),
						'options'       => brunn_select_get_title_tag( true, array( 'p' => 'p' ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'        => 'qodef_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'brunn' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'brunn' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'brunn_select_action_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_title_meta', 60 );
}