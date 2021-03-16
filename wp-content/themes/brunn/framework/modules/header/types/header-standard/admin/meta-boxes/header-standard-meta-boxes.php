<?php

if ( ! function_exists( 'brunn_select_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function brunn_select_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'brunn_select_filter_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'brunn_select_header_standard_meta_map' ) ) {
	function brunn_select_header_standard_meta_map( $parent ) {
		$hide_dep_options = brunn_select_get_hide_dep_for_header_standard_meta_boxes();
		
		brunn_select_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'qodef_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'brunn' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'brunn' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'brunn' ),
					'left'   => esc_html__( 'Left', 'brunn' ),
					'right'  => esc_html__( 'Right', 'brunn' ),
					'center' => esc_html__( 'Center', 'brunn' )
				),
				'dependency' => array(
					'hide' => array(
						'qodef_header_type_meta'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_additional_header_area_meta_boxes_map', 'brunn_select_header_standard_meta_map' );
}