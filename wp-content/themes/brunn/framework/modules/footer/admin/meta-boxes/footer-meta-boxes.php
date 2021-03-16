<?php

if ( ! function_exists( 'brunn_select_map_footer_meta' ) ) {
	function brunn_select_map_footer_meta() {
		
		$footer_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => apply_filters( 'brunn_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'footer_meta' ),
				'title' => esc_html__( 'Footer', 'brunn' ),
				'name'  => 'footer_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_disable_footer_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Footer for this Page', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'brunn' ),
				'options'       => brunn_select_get_yes_no_select_array(),
				'parent'        => $footer_meta_box
			)
		);
		
		$show_footer_meta_container = brunn_select_add_admin_container(
			array(
				'name'       => 'qodef_show_footer_meta_container',
				'parent'     => $footer_meta_box,
				'dependency' => array(
					'hide' => array(
						'qodef_disable_footer_meta' => 'yes'
					)
				)
			)
		);
		
			brunn_select_create_meta_box_field(
				array(
					'name'          => 'qodef_footer_in_grid_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Footer in Grid', 'brunn' ),
					'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'brunn' ),
					'options'       => brunn_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
			
			brunn_select_create_meta_box_field(
				array(
					'name'          => 'qodef_uncovering_footer_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Uncovering Footer', 'brunn' ),
					'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'brunn' ),
					'options'       => brunn_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			brunn_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_top_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Top', 'brunn' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'brunn' ),
					'options'       => brunn_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_top_styles_group = brunn_select_add_admin_group(
				array(
					'name'        => 'footer_top_styles_group',
					'title'       => esc_html__( 'Footer Top Styles', 'brunn' ),
					'description' => esc_html__( 'Define style for footer top area', 'brunn' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'show' => array(
							'qodef_show_footer_top_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			$footer_top_styles_row_1 = brunn_select_add_admin_row(
				array(
					'name'   => 'footer_top_styles_row_1',
					'parent' => $footer_top_styles_group
				)
			);
		
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'brunn' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'brunn' ),
						'parent' => $footer_top_styles_row_1
					)
				);
		
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_top_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'brunn' ),
						'parent' => $footer_top_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
			
			brunn_select_create_meta_box_field(
				array(
					'name'          => 'qodef_show_footer_bottom_meta',
					'type'          => 'select',
					'default_value' => '',
					'label'         => esc_html__( 'Show Footer Bottom', 'brunn' ),
					'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'brunn' ),
					'options'       => brunn_select_get_yes_no_select_array(),
					'parent'        => $show_footer_meta_container
				)
			);
		
			$footer_bottom_styles_group = brunn_select_add_admin_group(
				array(
					'name'        => 'footer_bottom_styles_group',
					'title'       => esc_html__( 'Footer Bottom Styles', 'brunn' ),
					'description' => esc_html__( 'Define style for footer bottom area', 'brunn' ),
					'parent'      => $show_footer_meta_container,
					'dependency'  => array(
						'show' => array(
							'qodef_show_footer_bottom_meta' => array( '', 'yes' )
						)
					)
				)
			);
			
			$footer_bottom_styles_row_1 = brunn_select_add_admin_row(
				array(
					'name'   => 'footer_bottom_styles_row_1',
					'parent' => $footer_bottom_styles_group
				)
			);
			
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_background_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Background Color', 'brunn' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_border_color_meta',
						'type'   => 'colorsimple',
						'label'  => esc_html__( 'Border Color', 'brunn' ),
						'parent' => $footer_bottom_styles_row_1
					)
				);
				
				brunn_select_create_meta_box_field(
					array(
						'name'   => 'qodef_footer_bottom_border_width_meta',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Border Width', 'brunn' ),
						'parent' => $footer_bottom_styles_row_1,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_footer_meta', 70 );
}