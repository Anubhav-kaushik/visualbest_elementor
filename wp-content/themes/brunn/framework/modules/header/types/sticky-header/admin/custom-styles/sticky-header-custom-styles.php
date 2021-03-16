<?php

if ( ! function_exists( 'brunn_select_sticky_header_styles' ) ) {
	/**
	 * Generates styles for sticky haeder
	 */
	function brunn_select_sticky_header_styles() {
		$background_color        = brunn_select_options()->getOptionValue( 'sticky_header_background_color' );
		$background_transparency = brunn_select_options()->getOptionValue( 'sticky_header_transparency' );
		$border_color            = brunn_select_options()->getOptionValue( 'sticky_header_border_color' );
		$header_height           = brunn_select_options()->getOptionValue( 'sticky_header_height' );
		
		if ( ! empty( $background_color ) ) {
			$header_background_color              = $background_color;
			$header_background_color_transparency = 1;
			
			if ( $background_transparency !== '' ) {
				$header_background_color_transparency = $background_transparency;
			}
			
			echo brunn_select_dynamic_css( '.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array( 'background-color' => brunn_select_rgba_color( $header_background_color, $header_background_color_transparency ) ) );
		}
		
		if ( ! empty( $border_color ) ) {
			echo brunn_select_dynamic_css( '.qodef-page-header .qodef-sticky-header .qodef-sticky-holder', array( 'border-color' => $border_color ) );
		}
		
		if ( ! empty( $header_height ) ) {
			$height = brunn_select_filter_px( $header_height ) . 'px';
			
			echo brunn_select_dynamic_css( '.qodef-page-header .qodef-sticky-header', array( 'height' => $height ) );
			echo brunn_select_dynamic_css( '.qodef-page-header .qodef-sticky-header .qodef-logo-wrapper a', array( 'max-height' => $height ) );
		}
		
		$sticky_container_selector = '.qodef-sticky-header .qodef-sticky-holder .qodef-vertical-align-containers';
		$sticky_container_styles   = array();
		$container_side_padding    = brunn_select_options()->getOptionValue( 'sticky_header_side_padding' );
		
		if ( $container_side_padding !== '' ) {
			if ( brunn_select_string_ends_with( $container_side_padding, 'px' ) || brunn_select_string_ends_with( $container_side_padding, '%' ) ) {
				$sticky_container_styles['padding-left']  = $container_side_padding;
				$sticky_container_styles['padding-right'] = $container_side_padding;
			} else {
				$sticky_container_styles['padding-left']  = brunn_select_filter_px( $container_side_padding ) . 'px';
				$sticky_container_styles['padding-right'] = brunn_select_filter_px( $container_side_padding ) . 'px';
			}
			
			echo brunn_select_dynamic_css( $sticky_container_selector, $sticky_container_styles );
		}
		
		// sticky menu style
		
		$menu_item_styles = brunn_select_get_typography_styles( 'sticky' );
		
		$menu_item_selector = array(
			'.qodef-main-menu.qodef-sticky-nav > ul > li > a'
		);
		
		echo brunn_select_dynamic_css( $menu_item_selector, $menu_item_styles );
		
		
		$hover_color = brunn_select_options()->getOptionValue( 'sticky_hovercolor' );
		
		$menu_item_hover_styles = array();
		if ( ! empty( $hover_color ) ) {
			$menu_item_hover_styles['color'] = $hover_color;
		}
		
		$menu_item_hover_selector = array(
			'.qodef-main-menu.qodef-sticky-nav > ul > li:hover > a',
			'.qodef-main-menu.qodef-sticky-nav > ul > li.qodef-active-item > a'
		);
		
		echo brunn_select_dynamic_css( $menu_item_hover_selector, $menu_item_hover_styles );
	}
	
	add_action( 'brunn_select_action_style_dynamic', 'brunn_select_sticky_header_styles' );
}