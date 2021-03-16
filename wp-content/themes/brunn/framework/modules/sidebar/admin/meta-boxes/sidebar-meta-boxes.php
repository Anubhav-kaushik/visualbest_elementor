<?php

if ( ! function_exists( 'brunn_select_map_sidebar_meta' ) ) {
	function brunn_select_map_sidebar_meta() {
		$qodef_sidebar_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => apply_filters( 'brunn_select_filter_set_scope_for_meta_boxes', array( 'page' ), 'sidebar_meta' ),
				'title' => esc_html__( 'Sidebar', 'brunn' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Sidebar Layout', 'brunn' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'brunn' ),
				'parent'      => $qodef_sidebar_meta_box,
                'options'       => brunn_select_get_custom_sidebars_options( true )
			)
		);
		
		$qodef_custom_sidebars = brunn_select_get_custom_sidebars();
		if ( count( $qodef_custom_sidebars ) > 0 ) {
			brunn_select_create_meta_box_field(
				array(
					'name'        => 'qodef_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'brunn' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'brunn' ),
					'parent'      => $qodef_sidebar_meta_box,
					'options'     => $qodef_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_sidebar_meta', 31 );
}