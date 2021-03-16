<?php

if ( ! function_exists( 'brunn_select_footer_options_map' ) ) {
	function brunn_select_footer_options_map() {

		brunn_select_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'brunn' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);

		$footer_panel = brunn_select_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'brunn' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);

		brunn_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'brunn' ),
				'parent'        => $footer_panel
			)
		);

        brunn_select_add_admin_field(
            array(
                'type'          => 'yesno',
                'name'          => 'uncovering_footer',
                'default_value' => 'no',
                'label'         => esc_html__( 'Uncovering Footer', 'brunn' ),
                'description'   => esc_html__( 'Enabling this option will make Footer gradually appear on scroll', 'brunn' ),
                'parent'        => $footer_panel
            )
        );

		brunn_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'brunn' ),
				'parent'        => $footer_panel
			)
		);
		
		$show_footer_top_container = brunn_select_add_admin_container(
			array(
				'name'       => 'show_footer_top_container',
				'parent'     => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_top' => 'yes'
					)
				)
			)
		);

		brunn_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '3 3 3 3',
				'label'         => esc_html__( 'Footer Top Columns', 'brunn' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'brunn' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3',
                    '3 3 6' => '3 (25% + 25% + 50%)',
					'3 3 3 3' => '4'
				)
			)
		);

		brunn_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'brunn' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'brunn' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'brunn' ),
					'left'   => esc_html__( 'Left', 'brunn' ),
					'center' => esc_html__( 'Center', 'brunn' ),
					'right'  => esc_html__( 'Right', 'brunn' )
				),
				'parent'        => $show_footer_top_container
			)
		);
		
		$footer_top_styles_group = brunn_select_add_admin_group(
			array(
				'name'        => 'footer_top_styles_group',
				'title'       => esc_html__( 'Footer Top Styles', 'brunn' ),
				'description' => esc_html__( 'Define style for footer top area', 'brunn' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		$footer_top_styles_row_1 = brunn_select_add_admin_row(
			array(
				'name'   => 'footer_top_styles_row_1',
				'parent' => $footer_top_styles_group
			)
		);
		
			brunn_select_add_admin_field(
				array(
					'name'   => 'footer_top_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'brunn' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			brunn_select_add_admin_field(
				array(
					'name'   => 'footer_top_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'brunn' ),
					'parent' => $footer_top_styles_row_1
				)
			);
			
			brunn_select_add_admin_field(
				array(
					'name'   => 'footer_top_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'brunn' ),
					'parent' => $footer_top_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);

		brunn_select_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'brunn' ),
				'parent'        => $footer_panel
			)
		);

		$show_footer_bottom_container = brunn_select_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'parent'          => $footer_panel,
				'dependency' => array(
					'show' => array(
						'show_footer_bottom'  => 'yes'
					)
				)
			)
		);

		brunn_select_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '6 6',
				'label'         => esc_html__( 'Footer Bottom Columns', 'brunn' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'brunn' ),
				'options'       => array(
					'12' => '1',
					'6 6' => '2',
					'4 4 4' => '3'
				),
				'parent'        => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_group = brunn_select_add_admin_group(
			array(
				'name'        => 'footer_bottom_styles_group',
				'title'       => esc_html__( 'Footer Bottom Styles', 'brunn' ),
				'description' => esc_html__( 'Define style for footer bottom area', 'brunn' ),
				'parent'      => $show_footer_bottom_container
			)
		);
		
		$footer_bottom_styles_row_1 = brunn_select_add_admin_row(
			array(
				'name'   => 'footer_bottom_styles_row_1',
				'parent' => $footer_bottom_styles_group
			)
		);
		
			brunn_select_add_admin_field(
				array(
					'name'   => 'footer_bottom_background_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Background Color', 'brunn' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			brunn_select_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_color',
					'type'   => 'colorsimple',
					'label'  => esc_html__( 'Border Color', 'brunn' ),
					'parent' => $footer_bottom_styles_row_1
				)
			);
			
			brunn_select_add_admin_field(
				array(
					'name'   => 'footer_bottom_border_width',
					'type'   => 'textsimple',
					'label'  => esc_html__( 'Border Width', 'brunn' ),
					'parent' => $footer_bottom_styles_row_1,
					'args'   => array(
						'suffix' => 'px'
					)
				)
			);
	}

	add_action( 'brunn_select_action_options_map', 'brunn_select_footer_options_map', brunn_select_set_options_map_position( 'footer' ) );
}