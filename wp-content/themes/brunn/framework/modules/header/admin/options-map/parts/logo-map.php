<?php

if ( ! function_exists( 'brunn_select_logo_options_map' ) ) {
	function brunn_select_logo_options_map() {
		
		brunn_select_add_admin_page(
			array(
				'slug'  => '_logo_page',
				'title' => esc_html__( 'Logo', 'brunn' ),
				'icon'  => 'fa fa-coffee'
			)
		);
		
		$panel_logo = brunn_select_add_admin_panel(
			array(
				'page'  => '_logo_page',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Logo', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'brunn' )
			)
		);
		
		$hide_logo_container = brunn_select_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'dependency' => array(
					'hide' => array(
						'hide_logo'  => 'yes'
					)
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'brunn' ),
				'parent'        => $hide_logo_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'brunn' ),
				'parent'        => $hide_logo_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'brunn' ),
				'parent'        => $hide_logo_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'brunn' ),
				'parent'        => $hide_logo_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => SELECT_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'brunn' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'brunn_select_action_options_map', 'brunn_select_logo_options_map', brunn_select_set_options_map_position( 'logo' ) );
}