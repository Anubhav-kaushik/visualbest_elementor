<?php

if ( ! function_exists( 'brunn_select_register_widgets' ) ) {
	function brunn_select_register_widgets() {
		$widgets = apply_filters( 'brunn_select_filter_register_widgets', $widgets = array() );
		
		foreach ( $widgets as $widget ) {
			register_widget( $widget );
		}
	}
	
	add_action( 'widgets_init', 'brunn_select_register_widgets' );
}