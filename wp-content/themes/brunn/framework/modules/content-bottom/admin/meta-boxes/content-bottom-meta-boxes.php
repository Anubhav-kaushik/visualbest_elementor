<?php

if ( ! function_exists( 'brunn_select_map_content_bottom_meta' ) ) {
	function brunn_select_map_content_bottom_meta() {
		
		$content_bottom_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => apply_filters( 'brunn_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'content_bottom_meta' ),
				'title' => esc_html__( 'Content Bottom', 'brunn' ),
				'name'  => 'content_bottom_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_enable_content_bottom_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Enable Content Bottom Area', 'brunn' ),
				'description'   => esc_html__( 'This option will enable Content Bottom area on pages', 'brunn' ),
				'parent'        => $content_bottom_meta_box,
				'options'       => brunn_select_get_yes_no_select_array()
			)
		);
		
		$show_content_bottom_meta_container = brunn_select_add_admin_container(
			array(
				'parent'          => $content_bottom_meta_box,
				'name'            => 'qodef_show_content_bottom_meta_container',
				'dependency' => array(
					'show' => array(
						'qodef_enable_content_bottom_area_meta' => 'yes'
					)
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_content_bottom_sidebar_custom_display_meta',
				'type'          => 'selectblank',
				'default_value' => '',
				'label'         => esc_html__( 'Sidebar to Display', 'brunn' ),
				'description'   => esc_html__( 'Choose a content bottom sidebar to display', 'brunn' ),
				'options'       => brunn_select_get_custom_sidebars(),
				'parent'        => $show_content_bottom_meta_container,
				'args'          => array(
					'select2' => true
				)
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'type'          => 'select',
				'name'          => 'qodef_content_bottom_in_grid_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Display in Grid', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will place content bottom in grid', 'brunn' ),
				'options'       => brunn_select_get_yes_no_select_array(),
				'parent'        => $show_content_bottom_meta_container
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'type'        => 'color',
				'name'        => 'qodef_content_bottom_background_color_meta',
				'label'       => esc_html__( 'Background Color', 'brunn' ),
				'description' => esc_html__( 'Choose a background color for content bottom area', 'brunn' ),
				'parent'      => $show_content_bottom_meta_container
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_content_bottom_meta', 71 );
}