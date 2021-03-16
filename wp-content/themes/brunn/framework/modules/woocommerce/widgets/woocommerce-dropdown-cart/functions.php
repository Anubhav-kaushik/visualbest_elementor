<?php

if ( ! function_exists( 'brunn_select_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register dropdown cart widget
	 */
	function brunn_select_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_woocommerce_dropdown_cart_widget' );
}

if ( ! function_exists( 'brunn_select_get_dropdown_cart_icon_class' ) ) {
	/**
	 * Returns dropdow cart icon class
	 */
	function brunn_select_get_dropdown_cart_icon_class() {
		$classes = array(
			'qodef-header-cart'
		);
		
		$classes[] = brunn_select_get_icon_sources_class( 'dropdown_cart', 'qodef-header-cart' );
		
		return $classes;
	}
}