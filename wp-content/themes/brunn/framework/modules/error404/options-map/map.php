<?php

if ( ! function_exists( 'brunn_select_error_404_options_map' ) ) {
	function brunn_select_error_404_options_map() {
		
		brunn_select_add_admin_page(
			array(
				'slug'  => '__404_error_page',
				'title' => esc_html__( '404 Error Page', 'brunn' ),
				'icon'  => 'fa fa-exclamation-triangle'
			)
		);
		
		$panel_404_header = brunn_select_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_header',
				'title' => esc_html__( 'Header', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_background_color_header',
				'label'       => esc_html__( 'Background Color', 'brunn' ),
				'description' => esc_html__( 'Choose a background color for header area', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'text',
				'name'          => '404_menu_area_background_transparency_header',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'brunn' ),
				'description'   => esc_html__( 'Choose a transparency for the header background color (0 = fully transparent, 1 = opaque)', 'brunn' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $panel_404_header,
				'type'        => 'color',
				'name'        => '404_menu_area_border_color_header',
				'label'       => esc_html__( 'Border Color', 'brunn' ),
				'description' => esc_html__( 'Choose a border bottom color for header area', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_404_header,
				'type'          => 'select',
				'name'          => '404_header_style',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'brunn' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'brunn' ),
				'options'       => array(
					''             => esc_html__( 'Default', 'brunn' ),
					'light-header' => esc_html__( 'Light', 'brunn' ),
					'dark-header'  => esc_html__( 'Dark', 'brunn' )
				)
			)
		);
		
		$panel_404_options = brunn_select_add_admin_panel(
			array(
				'page'  => '__404_error_page',
				'name'  => 'panel_404_options',
				'title' => esc_html__( '404 Page Options', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent' => $panel_404_options,
				'type'   => 'color',
				'name'   => '404_page_background_color',
				'label'  => esc_html__( 'Background Color', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_image',
				'label'       => esc_html__( 'Background Image', 'brunn' ),
				'description' => esc_html__( 'Choose a background image for 404 page', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_background_pattern_image',
				'label'       => esc_html__( 'Pattern Background Image', 'brunn' ),
				'description' => esc_html__( 'Choose a pattern image for 404 page', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'image',
				'name'        => '404_page_title_image',
				'label'       => esc_html__( 'Title Image', 'brunn' ),
				'description' => esc_html__( 'Choose a background image for displaying above 404 page Title', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_title',
				'default_value' => '',
				'label'         => esc_html__( 'Title', 'brunn' ),
				'description'   => esc_html__( 'Enter title for 404 page. Default label is "404".', 'brunn' )
			)
		);
		
		$first_level_group = brunn_select_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'first_level_group',
				'title'       => esc_html__( 'Title Style', 'brunn' ),
				'description' => esc_html__( 'Define styles for 404 page title', 'brunn' )
			)
		);
		
		$first_level_row1 = brunn_select_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row1'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent' => $first_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_title_color',
				'label'  => esc_html__( 'Text Color', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_title_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_title_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$first_level_row2 = brunn_select_add_admin_row(
			array(
				'parent' => $first_level_group,
				'name'   => 'first_level_row2',
				'next'   => true
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'brunn' ),
				'options'       => brunn_select_get_font_style_array()
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'brunn' ),
				'options'       => brunn_select_get_font_weight_array()
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_title_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $first_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_title_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'brunn' ),
				'options'       => brunn_select_get_text_transform_array()
			)
		);

        $first_level_group_responsive = brunn_select_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'first_level_group_responsive',
                'title'       => esc_html__( 'Title Style Responsive', 'brunn' ),
                'description' => esc_html__( 'Define responsive styles for 404 page title (under 680px)', 'brunn' )
            )
        );

        $first_level_row3 = brunn_select_add_admin_row(
            array(
                'parent' => $first_level_group_responsive,
                'name'   => 'first_level_row3'
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $first_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_title_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_subtitle',
				'default_value' => '',
				'label'         => esc_html__( 'Subtitle', 'brunn' ),
				'description'   => esc_html__( 'Enter subtitle for 404 page. Default label is "PAGE NOT FOUND".', 'brunn' )
			)
		);
		
		$second_level_group = brunn_select_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => 'second_level_group',
				'title'       => esc_html__( 'Subtitle Style', 'brunn' ),
				'description' => esc_html__( 'Define styles for 404 page subtitle', 'brunn' )
			)
		);
		
		$second_level_row1 = brunn_select_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row1'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent' => $second_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_subtitle_color',
				'label'  => esc_html__( 'Text Color', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_subtitle_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$second_level_row2 = brunn_select_add_admin_row(
			array(
				'parent' => $second_level_group,
				'name'   => 'second_level_row2',
				'next'   => true
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'brunn' ),
				'options'       => brunn_select_get_font_style_array()
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'brunn' ),
				'options'       => brunn_select_get_font_weight_array()
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_subtitle_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $second_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_subtitle_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'brunn' ),
				'options'       => brunn_select_get_text_transform_array()
			)
		);

        $second_level_group_responsive = brunn_select_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'second_level_group_responsive',
                'title'       => esc_html__( 'Subtitle Style Responsive', 'brunn' ),
                'description' => esc_html__( 'Define responsive styles for 404 page subtitle (under 680px)', 'brunn' )
            )
        );

        $second_level_row3 = brunn_select_add_admin_row(
            array(
                'parent' => $second_level_group_responsive,
                'name'   => 'second_level_row3'
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_subtitle_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_subtitle_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $second_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_subtitle_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'text',
				'name'          => '404_text',
				'default_value' => '',
				'label'         => esc_html__( 'Text', 'brunn' ),
				'description'   => esc_html__( 'Enter text for 404 page.', 'brunn' )
			)
		);
		
		$third_level_group = brunn_select_add_admin_group(
			array(
				'parent'      => $panel_404_options,
				'name'        => '$third_level_group',
				'title'       => esc_html__( 'Text Style', 'brunn' ),
				'description' => esc_html__( 'Define styles for 404 page text', 'brunn' )
			)
		);
		
		$third_level_row1 = brunn_select_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row1'
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent' => $third_level_row1,
				'type'   => 'colorsimple',
				'name'   => '404_text_color',
				'label'  => esc_html__( 'Text Color', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'fontsimple',
				'name'          => '404_text_google_fonts',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_font_size',
				'default_value' => '',
				'label'         => esc_html__( 'Font Size', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row1,
				'type'          => 'textsimple',
				'name'          => '404_text_line_height',
				'default_value' => '',
				'label'         => esc_html__( 'Line Height', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		$third_level_row2 = brunn_select_add_admin_row(
			array(
				'parent' => $third_level_group,
				'name'   => '$third_level_row2',
				'next'   => true
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_style',
				'default_value' => '',
				'label'         => esc_html__( 'Font Style', 'brunn' ),
				'options'       => brunn_select_get_font_style_array()
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_font_weight',
				'default_value' => '',
				'label'         => esc_html__( 'Font Weight', 'brunn' ),
				'options'       => brunn_select_get_font_weight_array()
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'textsimple',
				'name'          => '404_text_letter_spacing',
				'default_value' => '',
				'label'         => esc_html__( 'Letter Spacing', 'brunn' ),
				'args'          => array(
					'suffix' => 'px'
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $third_level_row2,
				'type'          => 'selectblanksimple',
				'name'          => '404_text_text_transform',
				'default_value' => '',
				'label'         => esc_html__( 'Text Transform', 'brunn' ),
				'options'       => brunn_select_get_text_transform_array()
			)
		);

        $third_level_group_responsive = brunn_select_add_admin_group(
            array(
                'parent'      => $panel_404_options,
                'name'        => 'third_level_group_responsive',
                'title'       => esc_html__( 'Text Style Responsive', 'brunn' ),
                'description' => esc_html__( 'Define responsive styles for 404 page text (under 680px)', 'brunn' )
            )
        );

        $third_level_row3 = brunn_select_add_admin_row(
            array(
                'parent' => $third_level_group_responsive,
                'name'   => 'third_level_row3'
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_font_size',
                'default_value' => '',
                'label'         => esc_html__( 'Font Size', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_line_height',
                'default_value' => '',
                'label'         => esc_html__( 'Line Height', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $third_level_row3,
                'type'          => 'textsimple',
                'name'          => '404_text_responsive_letter_spacing',
                'default_value' => '',
                'label'         => esc_html__( 'Letter Spacing', 'brunn' ),
                'args'          => array(
                    'suffix' => 'px'
                )
            )
        );
		
		brunn_select_add_admin_field(
			array(
				'parent'      => $panel_404_options,
				'type'        => 'text',
				'name'        => '404_back_to_home',
				'label'       => esc_html__( 'Back to Home Button Label', 'brunn' ),
				'description' => esc_html__( 'Enter label for "Back to home" button', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'parent'        => $panel_404_options,
				'type'          => 'select',
				'name'          => '404_button_style',
				'default_value' => '',
				'label'         => esc_html__( 'Button Skin', 'brunn' ),
				'description'   => esc_html__( 'Choose a style to make Back to Home button in that predefined style', 'brunn' ),
				'options'       => array(
					''            => esc_html__( 'Default', 'brunn' ),
					'light-style' => esc_html__( 'Light', 'brunn' )
				)
			)
		);
	}
	
	add_action( 'brunn_select_action_options_map', 'brunn_select_error_404_options_map', brunn_select_set_options_map_position( '404' ) );
}