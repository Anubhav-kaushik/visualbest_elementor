<?php

if ( ! function_exists( 'brunn_select_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function brunn_select_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_sidearea_opener_widget' );
}