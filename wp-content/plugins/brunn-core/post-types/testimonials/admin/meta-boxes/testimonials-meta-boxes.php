<?php

if ( ! function_exists( 'brunn_core_map_testimonials_meta' ) ) {
	function brunn_core_map_testimonials_meta() {
		$testimonial_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'testimonials' ),
				'title' => esc_html__( 'Testimonial', 'brunn-core' ),
				'name'  => 'testimonial_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_title',
				'type'        => 'text',
				'label'       => esc_html__( 'Title', 'brunn-core' ),
				'description' => esc_html__( 'Enter testimonial title', 'brunn-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_text',
				'type'        => 'text',
				'label'       => esc_html__( 'Text', 'brunn-core' ),
				'description' => esc_html__( 'Enter testimonial text', 'brunn-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author',
				'type'        => 'text',
				'label'       => esc_html__( 'Author', 'brunn-core' ),
				'description' => esc_html__( 'Enter author name', 'brunn-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_testimonial_author_position',
				'type'        => 'text',
				'label'       => esc_html__( 'Author Position', 'brunn-core' ),
				'description' => esc_html__( 'Enter author job position', 'brunn-core' ),
				'parent'      => $testimonial_meta_box,
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_core_map_testimonials_meta', 95 );
}