<?php

if ( ! function_exists( 'brunn_select_vertical_closed_icon_styles' ) ) {
	function brunn_select_vertical_closed_icon_styles() {
		$icon_color       = brunn_select_options()->getOptionValue( 'vertical_closed_icon_color' );
		$icon_hover_color = brunn_select_options()->getOptionValue( 'vertical_closed_icon_hover_color' );
		
		$icon_hover_selector = array(
			'.qodef-vertical-area-opener:hover'
		);
		
		if ( ! empty( $icon_color ) ) {
			echo brunn_select_dynamic_css( '.qodef-vertical-area-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo brunn_select_dynamic_css( $icon_hover_selector, array(
				'color' => $icon_hover_color . '!important'
			) );
		}
	}
	
	add_action( 'brunn_select_action_style_dynamic', 'brunn_select_vertical_closed_icon_styles' );
}