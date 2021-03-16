<?php

if ( ! function_exists( 'brunn_select_sidebar_options_map' ) ) {
	function brunn_select_sidebar_options_map() {
		
		brunn_select_add_admin_page(
			array(
				'slug'  => '_sidebar_page',
				'title' => esc_html__( 'Sidebar Area', 'brunn' ),
				'icon'  => 'fa fa-indent'
			)
		);
		
		$sidebar_panel = brunn_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'brunn' ),
				'name'  => 'sidebar',
				'page'  => '_sidebar_page'
			)
		);
		
		brunn_select_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'brunn' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'brunn' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
            'options'       => brunn_select_get_custom_sidebars_options()
		) );
		
		$brunn_custom_sidebars = brunn_select_get_custom_sidebars();
		if ( count( $brunn_custom_sidebars ) > 0 ) {
			brunn_select_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'brunn' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'brunn' ),
				'parent'      => $sidebar_panel,
				'options'     => $brunn_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'brunn_select_action_options_map', 'brunn_select_sidebar_options_map', brunn_select_set_options_map_position( 'sidebar' ) );
}