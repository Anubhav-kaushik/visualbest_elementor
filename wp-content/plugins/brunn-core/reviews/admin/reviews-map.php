<?php

if ( ! function_exists( 'brunn_core_reviews_map' ) ) {
	function brunn_core_reviews_map() {
		
		$reviews_panel = brunn_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Reviews', 'brunn-core' ),
				'name'  => 'panel_reviews',
				'page'  => '_page_page'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'text',
				'name'        => 'reviews_section_title',
				'label'       => esc_html__( 'Reviews Section Title', 'brunn-core' ),
				'description' => esc_html__( 'Enter title that you want to show before average rating on your page', 'brunn-core' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $reviews_panel,
				'type'        => 'textarea',
				'name'        => 'reviews_section_subtitle',
				'label'       => esc_html__( 'Reviews Section Subtitle', 'brunn-core' ),
				'description' => esc_html__( 'Enter subtitle that you want to show before average rating on your page', 'brunn-core' ),
			)
		);
	}
	
	add_action( 'brunn_select_action_additional_page_options_map', 'brunn_core_reviews_map', 75 ); //one after elements
}