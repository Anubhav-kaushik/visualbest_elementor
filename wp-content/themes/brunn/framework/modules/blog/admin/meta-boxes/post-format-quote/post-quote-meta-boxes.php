<?php

if ( ! function_exists( 'brunn_select_map_post_quote_meta' ) ) {
	function brunn_select_map_post_quote_meta() {
		$quote_post_format_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'brunn' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'brunn' ),
				'description' => esc_html__( 'Enter Quote text', 'brunn' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'brunn' ),
				'description' => esc_html__( 'Enter Quote author', 'brunn' ),
				'parent'      => $quote_post_format_meta_box
			)
		);

		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_post_quote_position_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author Position', 'brunn' ),
				'description' => esc_html__( 'Enter Quote author position', 'brunn' ),
				'parent'      => $quote_post_format_meta_box
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_post_quote_meta', 25 );
}