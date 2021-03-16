<?php

if ( ! function_exists( 'brunn_select_logo_meta_box_map' ) ) {
	function brunn_select_logo_meta_box_map() {
		
		$logo_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => apply_filters( 'brunn_select_filter_set_scope_for_meta_boxes', array( 'page', 'post' ), 'logo_meta' ),
				'title' => esc_html__( 'Logo', 'brunn' ),
				'name'  => 'logo_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'brunn' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'brunn' ),
				'parent'      => $logo_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'brunn' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'brunn' ),
				'parent'      => $logo_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'brunn' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'brunn' ),
				'parent'      => $logo_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'brunn' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'brunn' ),
				'parent'      => $logo_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'brunn' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'brunn' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_logo_meta_box_map', 47 );
}