<?php

if ( ! function_exists( 'brunn_select_centered_title_type_options_meta_boxes' ) ) {
	function brunn_select_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'brunn' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'brunn' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_additional_title_area_meta_boxes', 'brunn_select_centered_title_type_options_meta_boxes', 5 );
}