<?php

if ( ! function_exists( 'brunn_select_map_woocommerce_meta' ) ) {
	function brunn_select_map_woocommerce_meta() {
		
		$woocommerce_meta_box = brunn_select_create_meta_box(
			array(
				'scope' => array( 'product' ),
				'title' => esc_html__( 'Product Meta', 'brunn' ),
				'name'  => 'woo_product_meta'
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'        => 'qodef_product_featured_image_size',
				'type'        => 'select',
				'label'       => esc_html__( 'Dimensions for Product List Shortcode', 'brunn' ),
				'description' => esc_html__( 'Choose image layout when it appears in Select Product List - Masonry layout shortcode', 'brunn' ),
				'options'     => array(
					''                   => esc_html__( 'Default', 'brunn' ),
					'small'              => esc_html__( 'Small', 'brunn' ),
					'large-width'        => esc_html__( 'Large Width', 'brunn' ),
					'large-height'       => esc_html__( 'Large Height', 'brunn' ),
					'large-width-height' => esc_html__( 'Large Width Height', 'brunn' )
				),
				'parent'      => $woocommerce_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_title_area_woo_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'brunn' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'brunn' ),
				'options'       => brunn_select_get_yes_no_select_array(),
				'parent'        => $woocommerce_meta_box
			)
		);
		
		brunn_select_create_meta_box_field(
			array(
				'name'          => 'qodef_show_new_sign_woo_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show New Sign', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will show new sign mark on product', 'brunn' ),
				'parent'        => $woocommerce_meta_box
			)
		);
	}
	
	add_action( 'brunn_select_action_meta_boxes_map', 'brunn_select_map_woocommerce_meta', 99 );
}