<?php

if ( ! function_exists( 'brunn_select_add_product_list_shortcode' ) ) {
	function brunn_select_add_product_list_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'BrunnCore\CPT\Shortcodes\ProductList\ProductList',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	add_filter( 'brunn_core_filter_add_vc_shortcode', 'brunn_select_add_product_list_shortcode' );
}

if ( ! function_exists( 'brunn_select_set_product_list_icon_class_name_for_vc_shortcodes' ) ) {
	/**
	 * Function that set custom icon class name for product list shortcode to set our icon for Visual Composer shortcodes panel
	 */
	function brunn_select_set_product_list_icon_class_name_for_vc_shortcodes( $shortcodes_icon_class_array ) {
		$shortcodes_icon_class_array[] = '.icon-wpb-product-list';
		
		return $shortcodes_icon_class_array;
	}
	
	add_filter( 'brunn_core_filter_add_vc_shortcodes_custom_icon_class', 'brunn_select_set_product_list_icon_class_name_for_vc_shortcodes' );
}

if ( ! function_exists( 'brunn_select_add_product_list_into_shortcodes_list' ) ) {
	function brunn_select_add_product_list_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'qodef_product_list';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'brunn_select_filter_woocommerce_shortcodes_list', 'brunn_select_add_product_list_into_shortcodes_list' );
}