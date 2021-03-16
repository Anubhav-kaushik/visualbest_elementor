<?php

if ( brunn_select_contact_form_7_installed() ) {
	include_once SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'brunn_select_filter_register_widgets', 'brunn_select_register_cf7_widget' );
}

if ( ! function_exists( 'brunn_select_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function brunn_select_register_cf7_widget( $widgets ) {
		$widgets[] = 'BrunnSelectClassContactForm7Widget';
		
		return $widgets;
	}
}