<?php

if ( ! function_exists( 'brunn_select_dropdown_cart_icon_styles' ) ) {
	/**
	 * Generates styles for dropdown cart icon
	 */
	function brunn_select_dropdown_cart_icon_styles() {
		$icon_color       = brunn_select_options()->getOptionValue( 'dropdown_cart_icon_color' );
		$icon_hover_color = brunn_select_options()->getOptionValue( 'dropdown_cart_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo brunn_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a', array( 'color' => $icon_color ) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo brunn_select_dynamic_css( '.qodef-shopping-cart-holder .qodef-header-cart a:hover', array( 'color' => $icon_hover_color ) );
		}
	}
	
	add_action( 'brunn_select_action_style_dynamic', 'brunn_select_dropdown_cart_icon_styles' );
}