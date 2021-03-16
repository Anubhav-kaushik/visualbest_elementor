<?php

if ( ! function_exists( 'brunn_select_register_sticky_sidebar_widget' ) ) {
	/**
	 * Function that register sticky sidebar widget
	 */
	function brunn_select_register_sticky_sidebar_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassStickySidebar';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_sticky_sidebar_widget' );
}