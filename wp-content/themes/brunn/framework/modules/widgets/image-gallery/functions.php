<?php

if ( ! function_exists( 'brunn_select_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function brunn_select_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_image_gallery_widget' );
}