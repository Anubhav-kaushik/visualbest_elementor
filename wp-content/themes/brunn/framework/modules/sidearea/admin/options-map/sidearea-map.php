<?php

if ( ! function_exists( 'brunn_select_sidearea_options_map' ) ) {
	function brunn_select_sidearea_options_map() {

        brunn_select_add_admin_page(
            array(
                'slug'  => '_side_area_page',
                'title' => esc_html__('Side Area', 'brunn'),
                'icon'  => 'fa fa-indent'
            )
        );

        $side_area_panel = brunn_select_add_admin_panel(
            array(
                'title' => esc_html__('Side Area', 'brunn'),
                'name'  => 'side_area',
                'page'  => '_side_area_page'
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'select',
                'name'          => 'side_area_type',
                'default_value' => 'side-menu-slide-from-right',
                'label'         => esc_html__('Side Area Type', 'brunn'),
                'description'   => esc_html__('Choose a type of Side Area', 'brunn'),
                'options'       => array(
                    'side-menu-slide-from-right'       => esc_html__('Slide from Right Over Content', 'brunn'),
                    'side-menu-slide-with-content'     => esc_html__('Slide from Right With Content', 'brunn'),
                    'side-area-uncovered-from-content' => esc_html__('Side Area Uncovered from Content', 'brunn'),
                ),
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'text',
                'name'          => 'side_area_width',
                'default_value' => '',
                'label'         => esc_html__('Side Area Width', 'brunn'),
                'description'   => esc_html__('Enter a width for Side Area (px or %). Default width: 405px.', 'brunn'),
                'args'          => array(
                    'col_width' => 3,
                )
            )
        );

        $side_area_width_container = brunn_select_add_admin_container(
            array(
                'parent'     => $side_area_panel,
                'name'       => 'side_area_width_container',
                'dependency' => array(
                    'show' => array(
                        'side_area_type' => 'side-menu-slide-from-right',
                    )
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'color',
                'name'          => 'side_area_content_overlay_color',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Color', 'brunn'),
                'description'   => esc_html__('Choose a background color for a content overlay', 'brunn'),
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $side_area_width_container,
                'type'          => 'text',
                'name'          => 'side_area_content_overlay_opacity',
                'default_value' => '',
                'label'         => esc_html__('Content Overlay Background Transparency', 'brunn'),
                'description'   => esc_html__('Choose a transparency for the content overlay background color (0 = fully transparent, 1 = opaque)', 'brunn'),
                'args'          => array(
                    'col_width' => 3
                )
            )
        );

        $side_area_icon_style_group = brunn_select_add_admin_group(
            array(
                'parent'      => $side_area_panel,
                'name'        => 'side_area_icon_style_group',
                'title'       => esc_html__('Side Area Icon Style', 'brunn'),
                'description' => esc_html__('Define styles for Side Area icon', 'brunn')
            )
        );

        $side_area_icon_style_row1 = brunn_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row1'
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_color',
                'label'  => esc_html__('Color', 'brunn')
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row1,
                'type'   => 'colorsimple',
                'name'   => 'side_area_icon_hover_color',
                'label'  => esc_html__('Hover Color', 'brunn')
            )
        );

        $side_area_icon_style_row2 = brunn_select_add_admin_row(
            array(
                'parent' => $side_area_icon_style_group,
                'name'   => 'side_area_icon_style_row2',
                'next'   => true
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_color',
                'label'  => esc_html__('Close Icon Color', 'brunn')
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent' => $side_area_icon_style_row2,
                'type'   => 'colorsimple',
                'name'   => 'side_area_close_icon_hover_color',
                'label'  => esc_html__('Close Icon Hover Color', 'brunn')
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'color',
                'name'        => 'side_area_background_color',
                'label'       => esc_html__('Background Color', 'brunn'),
                'description' => esc_html__('Choose a background color for Side Area', 'brunn')
            )
        );

		brunn_select_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'image',
				'name'        => 'side_area_background_image',
				'label'       => esc_html__( 'Background Image', 'brunn' ),
				'description' => esc_html__( 'Choose an background image for Side Area', 'brunn' ),
			)
		);

        brunn_select_add_admin_field(
            array(
                'parent'      => $side_area_panel,
                'type'        => 'text',
                'name'        => 'side_area_padding',
                'label'       => esc_html__('Padding', 'brunn'),
                'description' => esc_html__('Define padding for Side Area in format top right bottom left', 'brunn'),
                'args'        => array(
                    'col_width' => 3
                )
            )
        );

        brunn_select_add_admin_field(
            array(
                'parent'        => $side_area_panel,
                'type'          => 'selectblank',
                'name'          => 'side_area_aligment',
                'default_value' => '',
                'label'         => esc_html__('Text Alignment', 'brunn'),
                'description'   => esc_html__('Choose text alignment for side area', 'brunn'),
                'options'       => array(
                    ''       => esc_html__('Default', 'brunn'),
                    'left'   => esc_html__('Left', 'brunn'),
                    'center' => esc_html__('Center', 'brunn'),
                    'right'  => esc_html__('Right', 'brunn')
                )
            )
        );
    }

    add_action('brunn_select_action_options_map', 'brunn_select_sidearea_options_map', brunn_select_set_options_map_position( 'sidearea' ) );
}