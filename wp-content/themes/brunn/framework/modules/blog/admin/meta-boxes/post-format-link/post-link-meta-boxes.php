<?php

if ( ! function_exists( 'brunn_select_map_post_link_meta' ) ) {
	function brunn_select_map_post_link_meta() {
		$link_post_format_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'brunn' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'brunn' ),
				'description' => esc_html__( 'Enter link', 'brunn' ),
				'parent'      => $link_post_format_meta_box
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_post_link_meta', 24 );
}