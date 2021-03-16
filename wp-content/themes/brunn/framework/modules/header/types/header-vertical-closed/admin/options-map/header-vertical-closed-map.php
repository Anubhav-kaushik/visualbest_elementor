<?php

if ( ! function_exists( 'brunn_select_get_hide_dep_for_header_vertical_closed_options' ) ) {
	function brunn_select_get_hide_dep_for_header_vertical_closed_options() {
		$hide_dep_options = apply_filters( 'brunn_select_filter_header_vertical_closed_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'brunn_select_header_vertical_closed_options_map' ) ) {
	function brunn_select_header_vertical_closed_options_map( $panel_header ) {
		$hide_dep_options = brunn_select_get_hide_dep_for_header_vertical_closed_options();
		
		$vertical_closed_container = brunn_select_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'vertical_closed_container',
				'dependency' => array(
					'hide' => array(
						'header_options'  => $hide_dep_options
					)
				)
			)
		);
		
		brunn_select_add_admin_section_title(
			array(
				'parent' => $vertical_closed_container,
				'name'   => 'vertical_closed_opener_style',
				'title'  => esc_html__( 'Vertical Closed Opener Style', 'brunn' )
			)
		);

		$vertical_closed_icon_style_group = brunn_select_add_admin_group(
			array(
				'parent'      => $vertical_closed_container,
				'name'        => 'vertical_closed_icon_style_group',
				'title'       => esc_html__( 'Vertical Closed Icon Style', 'brunn' ),
				'description' => esc_html__( 'Define styles for vetical closed icon', 'brunn' )
			)
		);
		
		$vertical_closed_icon_colors_row = brunn_select_add_admin_row(
			array(
				'parent' => $vertical_closed_icon_style_group,
				'name'   => 'vertical_closed_icon_colors_row'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent' => $vertical_closed_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_closed_icon_color',
				'label'  => esc_html__( 'Color', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent' => $vertical_closed_icon_colors_row,
				'type'   => 'colorsimple',
				'name'   => 'vertical_closed_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'brunn' ),
			)
		);
		
		do_action( 'brunn_select_header_vertical_closed_additional_options', $panel_header );
	}
	
	add_action( 'brunn_select_action_additional_header_menu_area_options_map', 'brunn_select_header_vertical_closed_options_map' );
}