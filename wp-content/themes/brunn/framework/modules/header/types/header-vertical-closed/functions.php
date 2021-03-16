<?php

if ( ! function_exists( 'brunn_select_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function brunn_select_register_header_vertical_closed_type( $header_types ) {
		$header_type = array(
			'header-vertical-closed' => 'BrunnSelectNamespace\Modules\Header\Types\HeaderVerticalClosed'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'brunn_select_init_register_header_vertical_closed_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function brunn_select_init_register_header_vertical_closed_type() {
		add_filter( 'brunn_select_filter_register_header_type_class', 'brunn_select_register_header_vertical_closed_type' );
	}
	
	add_action( 'brunn_select_action_before_header_function_init', 'brunn_select_init_register_header_vertical_closed_type' );
}

if ( ! function_exists( 'brunn_select_include_header_vertical_closed_menu' ) ) {
	/**
	 * Registers additional menu navigation for theme
	 */
	function brunn_select_include_header_vertical_closed_menu( $menus ) {
		if ( ! array_key_exists( 'vertical-navigation', $menus ) ) {
			$menus['vertical-navigation'] = esc_html__( 'Vertical Navigation', 'brunn' );
		}
		
		return $menus;
	}
	
	if ( brunn_select_check_is_header_type_enabled( 'header-vertical-closed' ) ) {
		add_filter( 'brunn_select_filter_register_headers_menu', 'brunn_select_include_header_vertical_closed_menu' );
	}
}

if ( ! function_exists( 'brunn_select_get_header_vertical_closed_main_menu' ) ) {
	/**
	 * Loads vertical menu HTML
	 */
	function brunn_select_get_header_vertical_closed_main_menu() {
		brunn_select_get_module_template_part( 'templates/vertical-closed-navigation', 'header/types/header-vertical-closed' );
	}
}

if ( ! function_exists( 'brunn_select_vertical_closed_header_holder_class' ) ) {
	/**
	 * Return holder class for this header type html
	 */
	function brunn_select_vertical_closed_header_holder_class() {
		$center_content = brunn_select_get_meta_field_intersect( 'vertical_header_center_content', brunn_select_get_page_id() );
		$holder_class   = $center_content === 'yes' ? 'qodef-vertical-alignment-center' : 'qodef-vertical-alignment-top';
		
		return $holder_class;
	}
}

if ( ! function_exists( 'brunn_select_get_vertical_closed_header_icon_class' ) ) {
	/**
	 * Loads vertical closed icon class
	 */
	function brunn_select_get_vertical_closed_header_icon_class() {
		$classes = array(
			'qodef-vertical-area-opener'
		);
		
		$classes[] = brunn_select_get_icon_sources_class( 'vertical_closed', 'qodef-vertical-area-opener' );

		return $classes;
	}
}