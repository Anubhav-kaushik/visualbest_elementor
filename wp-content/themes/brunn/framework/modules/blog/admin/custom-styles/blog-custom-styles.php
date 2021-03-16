<?php


if ( ! function_exists( 'brunn_select_blog_custom_style' ) ) {
	function brunn_select_blog_custom_style() {

		$item_styles      = array();

		$background_color = brunn_select_options()->getOptionValue( 'blog_single_background_color' );
		
		$item_selector = array(
			'.qodef-blog-holder.qodef-blog-single article .qodef-post-text'
		);

		if ( ! empty( $background_color ) ) {
			$item_styles['background-color'] = $background_color;
		}
		
		echo brunn_select_dynamic_css( $item_selector, $item_styles );
	}
	
	add_action( 'brunn_select_action_style_dynamic', 'brunn_select_blog_custom_style' );
}