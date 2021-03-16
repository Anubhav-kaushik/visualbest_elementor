<?php

if ( ! function_exists( 'brunn_select_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function brunn_select_register_button_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_button_widget' );
}