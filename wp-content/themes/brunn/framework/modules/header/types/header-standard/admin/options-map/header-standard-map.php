<?php

if ( ! function_exists( 'brunn_select_get_hide_dep_for_header_standard_options' ) ) {
	function brunn_select_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'brunn_select_filter_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'brunn_select_header_standard_map' ) ) {
	function brunn_select_header_standard_map( $parent ) {
		$hide_dep_options = brunn_select_get_hide_dep_for_header_standard_options();
		
		brunn_select_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'brunn' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'brunn' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'brunn' ),
					'left'   => esc_html__( 'Left', 'brunn' ),
					'center' => esc_html__( 'Center', 'brunn' )
				),
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_additional_header_menu_area_options_map', 'brunn_select_header_standard_map' );
}