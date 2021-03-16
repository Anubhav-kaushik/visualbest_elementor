<?php

if ( ! function_exists( 'brunn_select_portfolio_category_additional_fields' ) ) {
	function brunn_select_portfolio_category_additional_fields() {
		
		$fields = brunn_select_add_taxonomy_fields(
			array(
				'scope' => 'portfolio-category',
				'name'  => 'portfolio_category_options'
			)
		);
		
		brunn_select_add_taxonomy_field(
			array(
				'name'   => 'qodef_portfolio_category_image_meta',
				'type'   => 'image',
				'label'  => esc_html__( 'Category Image', 'brunn-core' ),
				'parent' => $fields
			)
		);
	}
	
	add_action( 'brunn_select_action_custom_taxonomy_fields', 'brunn_select_portfolio_category_additional_fields' );
}