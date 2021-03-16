<?php

if ( ! function_exists( 'brunn_select_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function brunn_select_general_options_map() {
		
		brunn_select_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'brunn' ),
				'icon'  => 'fa fa-institution'
			)
		);
		
		$panel_design_style = brunn_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Design Style', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'brunn' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'brunn' ),
				'parent'        => $panel_design_style
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'brunn' ),
				'parent'        => $panel_design_style
			)
		);
		
		$additional_google_fonts_container = brunn_select_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'dependency' => array(
					'show' => array(
						'additional_google_fonts'  => 'yes'
					)
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'brunn' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'brunn' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'brunn' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'brunn' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'brunn' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'brunn' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'brunn' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'brunn' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'  => esc_html__( '100 Thin', 'brunn' ),
					'100i' => esc_html__( '100 Thin Italic', 'brunn' ),
					'200'  => esc_html__( '200 Extra-Light', 'brunn' ),
					'200i' => esc_html__( '200 Extra-Light Italic', 'brunn' ),
					'300'  => esc_html__( '300 Light', 'brunn' ),
					'300i' => esc_html__( '300 Light Italic', 'brunn' ),
					'400'  => esc_html__( '400 Regular', 'brunn' ),
					'400i' => esc_html__( '400 Regular Italic', 'brunn' ),
					'500'  => esc_html__( '500 Medium', 'brunn' ),
					'500i' => esc_html__( '500 Medium Italic', 'brunn' ),
					'600'  => esc_html__( '600 Semi-Bold', 'brunn' ),
					'600i' => esc_html__( '600 Semi-Bold Italic', 'brunn' ),
					'700'  => esc_html__( '700 Bold', 'brunn' ),
					'700i' => esc_html__( '700 Bold Italic', 'brunn' ),
					'800'  => esc_html__( '800 Extra-Bold', 'brunn' ),
					'800i' => esc_html__( '800 Extra-Bold Italic', 'brunn' ),
					'900'  => esc_html__( '900 Ultra-Bold', 'brunn' ),
					'900i' => esc_html__( '900 Ultra-Bold Italic', 'brunn' )
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'brunn' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'brunn' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'brunn' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'brunn' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'brunn' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'brunn' ),
					'greek'        => esc_html__( 'Greek', 'brunn' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'brunn' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'brunn' )
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'brunn' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #00bbb3', 'brunn' ),
				'parent'      => $panel_design_style
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'brunn' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'brunn' ),
				'parent'      => $panel_design_style
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'page_background_image',
				'type'        => 'image',
				'label'       => esc_html__( 'Page Background Image', 'brunn' ),
				'description' => esc_html__( 'Choose the background image for page content', 'brunn' ),
				'parent'      => $panel_design_style
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'page_background_image_repeat',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Page Background Image Repeat', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will set the background image as a repeating pattern throughout the page, otherwise the image will appear as the cover background image', 'brunn' ),
				'parent'        => $panel_design_style
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'brunn' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'brunn' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'brunn' ),
				'parent'        => $panel_design_style
			)
		);
		
			$boxed_container = brunn_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'dependency' => array(
						'show' => array(
							'boxed'  => 'yes'
						)
					)
				)
			);
		
				brunn_select_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'brunn' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'brunn' ),
						'parent'      => $boxed_container
					)
				);
				
				brunn_select_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'brunn' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'brunn' ),
						'parent'      => $boxed_container
					)
				);
				
				brunn_select_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'brunn' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'brunn' ),
						'parent'      => $boxed_container
					)
				);
				
				brunn_select_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'brunn' ),
						'description'   => esc_html__( 'Choose background image attachment', 'brunn' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'brunn' ),
							'fixed'  => esc_html__( 'Fixed', 'brunn' ),
							'scroll' => esc_html__( 'Scroll', 'brunn' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'brunn' ),
				'parent'        => $panel_design_style
			)
		);
		
			$paspartu_container = brunn_select_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'dependency' => array(
						'show' => array(
							'paspartu'  => 'yes'
						)
					)
				)
			);
		
				brunn_select_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'brunn' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'brunn' ),
						'parent'      => $paspartu_container
					)
				);
				
				brunn_select_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'brunn' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'brunn' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
		
				brunn_select_add_admin_field(
					array(
						'name'        => 'paspartu_responsive_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Responsive Passepartout Size', 'brunn' ),
						'description' => esc_html__( 'Enter size amount for passepartout for smaller screens (tablets and mobiles view)', 'brunn' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				brunn_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'brunn' )
					)
				);
		
				brunn_select_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'enable_fixed_paspartu',
						'label'         => esc_html__( 'Enable Fixed Passepartout', 'brunn' ),
						'description' => esc_html__( 'Enabling this option will set fixed passepartout for your screens', 'brunn' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => 'qodef-grid-1300',
				'label'         => esc_html__( 'Initial Width of Content', 'brunn' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'brunn' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'qodef-grid-1100' => esc_html__( '1100px - default', 'brunn' ),
					'qodef-grid-1300' => esc_html__( '1300px', 'brunn' ),
					'qodef-grid-1200' => esc_html__( '1200px', 'brunn' ),
					'qodef-grid-1000' => esc_html__( '1000px', 'brunn' ),
					'qodef-grid-800'  => esc_html__( '800px', 'brunn' )
				)
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'brunn' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'brunn' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = brunn_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Settings', 'brunn' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'brunn' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'brunn' ),
				'parent'        => $panel_settings
			)
		);
		
			$page_transitions_container = brunn_select_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'dependency' => array(
						'show' => array(
							'smooth_page_transitions'  => 'yes'
						)
					)
				)
			);
		
				brunn_select_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'brunn' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'brunn' ),
						'parent'        => $page_transitions_container
					)
				);
				
				$page_transition_preloader_container = brunn_select_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'dependency' => array(
							'show' => array(
								'page_transition_preloader'  => 'yes'
							)
						)
					)
				);
				
					brunn_select_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'brunn' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = brunn_select_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'brunn' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'brunn' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = brunn_select_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					brunn_select_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'brunn' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
								'brunn_spinner'         => esc_html__( 'Brunn Spinner', 'brunn' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'brunn' ),
								'pulse'                 => esc_html__( 'Pulse', 'brunn' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'brunn' ),
								'cube'                  => esc_html__( 'Cube', 'brunn' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'brunn' ),
								'stripes'               => esc_html__( 'Stripes', 'brunn' ),
								'wave'                  => esc_html__( 'Wave', 'brunn' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'brunn' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'brunn' ),
								'atom'                  => esc_html__( 'Atom', 'brunn' ),
								'clock'                 => esc_html__( 'Clock', 'brunn' ),
								'mitosis'               => esc_html__( 'Mitosis', 'brunn' ),
								'lines'                 => esc_html__( 'Lines', 'brunn' ),
								'fussion'               => esc_html__( 'Fussion', 'brunn' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'brunn' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'brunn' )
							)
						)
					);
					
					brunn_select_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'brunn' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					brunn_select_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'brunn' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'brunn' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'brunn' ),
				'parent'        => $panel_settings
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'brunn' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'brunn' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = brunn_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'brunn' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'brunn' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = brunn_select_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'brunn' )
			)
		);
		
		brunn_select_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'brunn' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'brunn' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'brunn_select_action_options_map', 'brunn_select_general_options_map', brunn_select_set_options_map_position( 'general' ) );
}

if ( ! function_exists( 'brunn_select_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function brunn_select_page_general_style( $style ) {
		$current_style = '';
		$page_id       = brunn_select_get_page_id();
		$class_prefix  = brunn_select_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = brunn_select_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = brunn_select_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = brunn_select_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = brunn_select_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.qodef-boxed .qodef-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= brunn_select_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style     = array();
		$paspartu_res_style = array();
		$paspartu_res_start = '@media only screen and (max-width: 1024px) {';
		$paspartu_res_end   = '}';
		
		$paspartu_header_selector                = array(
			'.qodef-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled .qodef-sticky-header',
			'.qodef-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		$paspartu_header_appear_selector         = array(
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-page-header .qodef-fixed-wrapper.fixed',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-sticky-header.header-appear',
			'.qodef-paspartu-enabled.qodef-fixed-paspartu-enabled .qodef-mobile-header.mobile-header-appear .qodef-mobile-header-inner'
		);
		
		$paspartu_header_style                   = array();
		$paspartu_header_appear_style            = array();
		$paspartu_header_responsive_style        = array();
		$paspartu_header_appear_responsive_style = array();
		
		$paspartu_color = brunn_select_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = brunn_select_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( brunn_select_string_ends_with( $paspartu_width, '%' ) || brunn_select_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
				
				$paspartu_clean_width      = brunn_select_string_ends_with( $paspartu_width, '%' ) ? brunn_select_filter_suffix( $paspartu_width, '%' ) : brunn_select_filter_suffix( $paspartu_width, 'px' );
				$paspartu_clean_width_mark = brunn_select_string_ends_with( $paspartu_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_style['left']              = $paspartu_width;
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
				
				$paspartu_header_style['left']              = $paspartu_width . 'px';
				$paspartu_header_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_width ) . 'px)';
				$paspartu_header_appear_style['margin-top'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.qodef-paspartu-enabled .qodef-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= brunn_select_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		if ( ! empty( $paspartu_header_style ) ) {
			$current_style .= brunn_select_dynamic_css( $paspartu_header_selector, $paspartu_header_style );
			$current_style .= brunn_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_style );
		}
		
		$paspartu_responsive_width = brunn_select_get_meta_field_intersect( 'paspartu_responsive_width', $page_id );
		if ( $paspartu_responsive_width !== '' ) {
			if ( brunn_select_string_ends_with( $paspartu_responsive_width, '%' ) || brunn_select_string_ends_with( $paspartu_responsive_width, 'px' ) ) {
				$paspartu_res_style['padding'] = $paspartu_responsive_width;
				
				$paspartu_clean_width      = brunn_select_string_ends_with( $paspartu_responsive_width, '%' ) ? brunn_select_filter_suffix( $paspartu_responsive_width, '%' ) : brunn_select_filter_suffix( $paspartu_responsive_width, 'px' );
				$paspartu_clean_width_mark = brunn_select_string_ends_with( $paspartu_responsive_width, '%' ) ? '%' : 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width;
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_clean_width ) . $paspartu_clean_width_mark . ')';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width;
			} else {
				$paspartu_res_style['padding'] = $paspartu_responsive_width . 'px';
				
				$paspartu_header_responsive_style['left']              = $paspartu_responsive_width . 'px';
				$paspartu_header_responsive_style['width']             = 'calc(100% - ' . ( 2 * $paspartu_responsive_width ) . 'px)';
				$paspartu_header_appear_responsive_style['margin-top'] = $paspartu_responsive_width . 'px';
			}
		}
		
		if ( ! empty( $paspartu_res_style ) ) {
			$current_style .= $paspartu_res_start . brunn_select_dynamic_css( $paspartu_selector, $paspartu_res_style ) . $paspartu_res_end;
		}
		
		if ( ! empty( $paspartu_header_responsive_style ) ) {
			$current_style .= $paspartu_res_start . brunn_select_dynamic_css( $paspartu_header_selector, $paspartu_header_responsive_style ) . $paspartu_res_end;
			$current_style .= $paspartu_res_start . brunn_select_dynamic_css( $paspartu_header_appear_selector, $paspartu_header_appear_responsive_style ) . $paspartu_res_end;
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'brunn_select_filter_add_page_custom_style', 'brunn_select_page_general_style' );
}