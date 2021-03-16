<?php

if ( ! function_exists( 'brunn_select_register_custom_font_widget' ) ) {
	/**
	 * Function that register custom font widget
	 */
	function brunn_select_register_custom_font_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassCustomFontWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_custom_font_widget' );
}