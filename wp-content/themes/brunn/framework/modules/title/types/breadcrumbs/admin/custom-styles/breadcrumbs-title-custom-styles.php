<?php

if ( ! function_exists( 'brunn_select_breadcrumbs_title_area_typography_style' ) ) {
	function brunn_select_breadcrumbs_title_area_typography_style() {
		
		$item_styles = brunn_select_get_typography_styles( 'page_breadcrumb' );
		
		$item_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-breadcrumbs'
		);
		
		echo brunn_select_dynamic_css( $item_selector, $item_styles );
		
		
		$breadcrumb_hover_color = brunn_select_options()->getOptionValue( 'page_breadcrumb_hovercolor' );
		
		$breadcrumb_hover_styles = array();
		if ( ! empty( $breadcrumb_hover_color ) ) {
			$breadcrumb_hover_styles['color'] = $breadcrumb_hover_color;
		}
		
		$breadcrumb_hover_selector = array(
			'.qodef-title-holder .qodef-title-wrapper .qodef-breadcrumbs a:hover'
		);
		
		echo brunn_select_dynamic_css( $breadcrumb_hover_selector, $breadcrumb_hover_styles );
	}
	
	add_action( 'brunn_select_action_style_dynamic', 'brunn_select_breadcrumbs_title_area_typography_style' );
}