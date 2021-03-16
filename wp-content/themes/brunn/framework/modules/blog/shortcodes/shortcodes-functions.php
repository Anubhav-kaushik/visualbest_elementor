<?php

if ( ! function_exists( 'brunn_select_include_blog_shortcodes' ) ) {
	function brunn_select_include_blog_shortcodes() {
		foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/load.php' ) as $shortcode_load ) {
			include_once $shortcode_load;
		}
	}
	
	if ( brunn_select_core_plugin_installed() ) {
		add_action( 'brunn_core_action_include_shortcodes_file', 'brunn_select_include_blog_shortcodes' );
	}
}

// Load blog elementor widgets
if ( ! function_exists( 'brunn_select_include_blog_elementor_widgets_files' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function brunn_select_include_blog_elementor_widgets_files() {
		if ( brunn_select_core_plugin_installed() ) {
			foreach ( glob( SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/blog/shortcodes/*/elementor-*.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'brunn_select_include_blog_elementor_widgets_files' );
}