<?php

if ( ! function_exists( 'brunn_core_include_shortcodes_file' ) ) {
	/**
	 * Loades all shortcodes by going through all folders that are placed directly in shortcodes folder
	 */
	function brunn_core_include_shortcodes_file() {
		if ( brunn_core_theme_installed() ) {
			foreach ( glob( BRUNN_CORE_SHORTCODES_PATH . '/*/load.php' ) as $shortcode ) {
				if ( brunn_select_is_customizer_item_enabled( $shortcode, 'brunn_performance_disable_shortcode_' ) ) {
					include_once $shortcode;
				}
			}
		}
		
		do_action( 'brunn_core_action_include_shortcodes_file' );
	}
	
	add_action( 'init', 'brunn_core_include_shortcodes_file', 6 ); // permission 6 is set to be before vc_before_init hook that has permission 9
}

if ( ! function_exists( 'brunn_core_load_shortcodes' ) ) {
	function brunn_core_load_shortcodes() {
		include_once BRUNN_CORE_ABS_PATH . '/lib/shortcode-loader.php';
		
		BrunnCore\Lib\ShortcodeLoader::getInstance()->load();
	}
	
	add_action( 'init', 'brunn_core_load_shortcodes', 7 ); // permission 7 is set to be before vc_before_init hook that has permission 9 and after brunn_core_include_shortcodes_file hook
}

if ( ! function_exists( 'brunn_core_add_admin_shortcodes_styles' ) ) {
	/**
	 * Function that includes shortcodes core styles for admin
	 */
	function brunn_core_add_admin_shortcodes_styles() {
		
		//include shortcode styles for Visual Composer
		wp_enqueue_style( 'brunn-core-vc-shortcodes', BRUNN_CORE_ASSETS_URL_PATH . '/css/admin/brunn-vc-shortcodes.css' );
	}
	
	add_action( 'brunn_select_action_admin_scripts_init', 'brunn_core_add_admin_shortcodes_styles' );
}

if ( ! function_exists( 'brunn_core_add_admin_shortcodes_custom_styles' ) ) {
	/**
	 * Function that print custom vc shortcodes style
	 */
	function brunn_core_add_admin_shortcodes_custom_styles() {
		$style                  = apply_filters( 'brunn_core_filter_add_vc_shortcodes_custom_style', $style = '' );
		$shortcodes_icon_styles = array();
		$shortcode_icon_size    = 32;
		$shortcode_position     = 0;
		
		$shortcodes_icon_class_array = apply_filters( 'brunn_core_filter_add_vc_shortcodes_custom_icon_class', $shortcodes_icon_class_array = array() );
		sort( $shortcodes_icon_class_array );
		
		if ( ! empty( $shortcodes_icon_class_array ) ) {
			foreach ( $shortcodes_icon_class_array as $shortcode_icon_class ) {
				$mark = $shortcode_position != 0 ? '-' : '';
				
				$shortcodes_icon_styles[] = '.vc_element-icon.extended-custom-icon' . esc_attr( $shortcode_icon_class ) . ' {
					background-position: ' . $mark . esc_attr( $shortcode_position * $shortcode_icon_size ) . 'px 0;
				}';
				
				$shortcode_position ++;
			}
		}
		
		if ( ! empty( $shortcodes_icon_styles ) ) {
			$style .= implode( ' ', $shortcodes_icon_styles );
		}
		
		if ( ! empty( $style ) ) {
			wp_add_inline_style( 'brunn-core-vc-shortcodes', $style );
		}
	}
	
	add_action( 'brunn_select_action_admin_scripts_init', 'brunn_core_add_admin_shortcodes_custom_styles' );
}

if ( ! function_exists( 'brunn_core_load_elementor_shortcodes' ) ) {
	/**
	 * Function that loads elementor files inside shortcodes folder
	 */
	function brunn_core_load_elementor_shortcodes() {
		if ( brunn_core_theme_installed() && brunn_select_is_elementor_installed() ) {
			foreach ( glob( BRUNN_CORE_SHORTCODES_PATH . '/*/elementor-*.php' ) as $shortcode_load ) {
				include_once $shortcode_load;
			}
		}
	}

	add_action( 'elementor/widgets/widgets_registered', 'brunn_core_load_elementor_shortcodes' );
}

if ( ! function_exists( 'brunn_core_add_elementor_widget_categories' ) ) {
	/**
	 * Registers category group
	 */
	function brunn_core_add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'select',
			[
				'title' => esc_html__( 'Select', 'brunn-core' ),
				'icon'  => 'fa fa-plug',
			]
		);

	}

	add_action( 'elementor/elements/categories_registered', 'brunn_core_add_elementor_widget_categories' );
}

if( ! function_exists( 'brunn_core_remove_widgets_for_elementor') ) {
	function brunn_core_remove_widgets_for_elementor( $black_list ) {

		$black_list[] = 'BrunnSelectClassSearchOpener';
		$black_list[] = 'BrunnSelectClassSideAreaOpener';
		$black_list[] = 'BrunnSelectClassAuthorInfoWidget';
		$black_list[] = 'BrunnSelectClassBlogListWidget';
		$black_list[] = 'BrunnSelectClassButtonWidget';
		$black_list[] = 'BrunnSelectClassContactForm7Widget';
		$black_list[] = 'BrunnSelectClassCustomFontWidget';
		$black_list[] = 'BrunnSelectClassIconWidget';
		$black_list[] = 'BrunnSelectClassImageGalleryWidget';
		$black_list[] = 'BrunnSelectClassRecentPosts';
		$black_list[] = 'BrunnSelectClassSearchPostType';
		$black_list[] = 'BrunnSelectClassSeparatorWidget';
		$black_list[] = 'BrunnSelectClassSocialIconWidget';
		$black_list[] = 'BrunnSelectClassClassIconsGroupWidget';
		$black_list[] = 'BrunnSelectClassStickySidebar';
		$black_list[] = 'BrunnSelectClassWoocommerceDropdownCart';

		return $black_list;
	}

	add_filter('elementor/widgets/black_list', 'brunn_core_remove_widgets_for_elementor');
}

if ( ! function_exists( 'brunn_core_return_elementor_templates' ) ) {
	/**
	 * Function that returns all Elementor saved templates
	 */
	function brunn_core_return_elementor_templates() {
		return Elementor\Plugin::instance()->templates_manager->get_source( 'local' )->get_items();
	}
}

if ( ! function_exists( 'brunn_core_generate_elementor_templates_control' ) ) {
	/**
	 * Function that adds Template Elementor Control
	 */
	function brunn_core_generate_elementor_templates_control( $object ) {
		$templates = brunn_core_return_elementor_templates();

		//if ( ! empty( $templates ) ) {
		$options = [
			'0' => '— ' . esc_html__( 'Select', 'brunn-core' ) . ' —',
		];

		$types = [];

		if ( ! empty( $templates ) ) {

			foreach ( $templates as $template ) {
				$options[ $template['template_id'] ] = $template['title'] . ' (' . $template['type'] . ')';
				$types[ $template['template_id'] ]   = $template['type'];
			}
		};

		$object->add_control(
			'template_id',
			[
				'label'       => esc_html__( 'Choose Template', 'brunn-core' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => '0',
				'options'     => $options,
				'types'       => $types,
				'label_block' => 'true'
			]
		);

	}
}

if( ! function_exists('brunn_core_elementor_icons_style') ){
	function brunn_core_elementor_icons_style(){

		wp_enqueue_style( 'brunn-core-elementor', BRUNN_CORE_ASSETS_URL_PATH . '/css/admin/brunn-elementor.css');

	}

	add_action( 'elementor/editor/before_enqueue_scripts', 'brunn_core_elementor_icons_style' );
}

if ( ! function_exists( 'brunn_core_get_elementor_shortcodes_path' ) ) {
	function brunn_core_get_elementor_shortcodes_path() {
		$shortcodes       = array();
		$shortcodes_paths = array(
			BRUNN_CORE_SHORTCODES_PATH . '/*' => BRUNN_CORE_URL_PATH,
			BRUNN_CORE_CPT_PATH . '/**/shortcodes/*' => BRUNN_CORE_URL_PATH,
			BRUNN_INSTAGRAM_SHORTCODES_PATH . '/*' => BRUNN_INSTAGRAM_URL_PATH,
			BRUNN_TWITTER_SHORTCODES_PATH . '/*' => BRUNN_TWITTER_URL_PATH,
			SELECT_FRAMEWORK_MODULES_ROOT_DIR . '/**/shortcodes/*' => SELECT_FRAMEWORK_ROOT . '/'
		);

		foreach ( $shortcodes_paths as $dir_path => $url_path ) {
			foreach ( glob( $dir_path, GLOB_ONLYDIR ) as $shortcode_dir_path ) {
				$shortcode_name     = basename( $shortcode_dir_path );
				$shortcode_url_path = $url_path . substr( $shortcode_dir_path, strpos( $shortcode_dir_path, basename( $url_path ) ) + strlen( basename( $url_path ) ) + 1 );

				$shortcodes[ $shortcode_name ] = array(
					'dir_path' => $shortcode_dir_path,
					'url_path' => $shortcode_url_path
				);
			}
		}

		return $shortcodes;
	}
}
if ( ! function_exists( 'brunn_core_add_elementor_shortcodes_custom_styles' ) ) {
	function brunn_core_add_elementor_shortcodes_custom_styles() {
		$style                  = '';
		$shortcodes_icon_styles = array();

		$shortcodes_icon_class_array = apply_filters( 'brunn_core_filter_add_vc_shortcodes_custom_icon_class', $shortcodes_icon_class_array = array() );
		sort( $shortcodes_icon_class_array );

		$shortcodes_path = brunn_core_get_elementor_shortcodes_path();
		if ( ! empty( $shortcodes_icon_class_array ) ) {
			foreach ( $shortcodes_icon_class_array as $shortcode_icon_class ) {
				$shortcode_name = str_replace( '.icon-wpb-', '', esc_attr( $shortcode_icon_class ) );

				if ( key_exists( $shortcode_name, $shortcodes_path ) && file_exists( $shortcodes_path[ $shortcode_name ]['dir_path'] . '/assets/img/dashboard_icon.png' ) ) {
					$shortcodes_icon_styles[] = '.brunn-elementor-custom-icon.brunn-elementor-' . $shortcode_name . ' {
                        background-image: url( "' . $shortcodes_path[ $shortcode_name ]['url_path'] . '/assets/img/dashboard_icon.png" );
                    }';
				}
			}
		}

		if ( ! empty( $shortcodes_icon_styles ) ) {
			$style = implode( ' ', $shortcodes_icon_styles );
		}
		if ( ! empty( $style ) ) {
			wp_add_inline_style( 'brunn-core-elementor', $style );
		}
	}

	add_action( 'elementor/editor/before_enqueue_scripts', 'brunn_core_add_elementor_shortcodes_custom_styles', 15 );
}

//function that maps "Anchor" option for section
if( ! function_exists('brunn_core_map_section_anchor_option') ){
	function brunn_core_map_section_anchor_option( $section, $args ){
		$section->start_controls_section(
			'section_select_anchor',
			[
				'label' => esc_html__( 'Brunn Anchor', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'anchor_id',
			[
				'label' => esc_html__( 'Brunn Anchor ID', 'brunn-core' ),
				'type'  => Elementor\Controls_Manager::TEXT,
			]
		);

		$section->end_controls_section();
	}

	add_action('elementor/element/section/_section_responsive/after_section_end', 'brunn_core_map_section_anchor_option', 10, 2);
}

//function that renders "Anchor" option for section
if( ! function_exists('brunn_core_render_section_anchor_option') ) {
	function brunn_core_render_section_anchor_option( $element )   {
		if( 'section' !== $element->get_name() ) {
			return;
		}

		$params = $element->get_settings_for_display();

		if( ! empty( $params['anchor_id'] ) ){
			$element->add_render_attribute( '_wrapper', 'data-qodef-anchor', $params['anchor_id'] );
		}
	}

	add_action( 'elementor/frontend/section/before_render', 'brunn_core_render_section_anchor_option');
}

//function that maps "Parallax" option for section
if ( ! function_exists( 'brunn_core_map_section_parallax_option' ) ) {
	function brunn_core_map_section_parallax_option( $section, $args ) {
		$section->start_controls_section(
			'section_select_parallax',
			[
				'label' => esc_html__( 'Brunn Parallax', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'select_enable_parallax',
			[
				'label'        => esc_html__( 'Enable Parallax', 'brunn-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'no',
				'options'      => [
					'no'     => esc_html__( 'No', 'brunn-core' ),
					'holder' => esc_html__( 'Yes', 'brunn-core' ),
				],
				'prefix_class' => 'qodef-parallax-row-'
			]
		);

		$section->add_control(
			'select_parallax_image',
			[
				'label'              => esc_html__( 'Parallax Image', 'brunn-core' ),
				'type'               => Elementor\Controls_Manager::MEDIA,
				'condition'          => [
					'select_enable_parallax' => 'holder'
				],
				'frontend_available' => true,
			]
		);

		$section->add_control(
			'select_parallax_speed',
			[
				'label'     => esc_html__( 'Parallax Speed', 'brunn-core' ),
				'type'      => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'select_enable_parallax' => 'holder'
				],
				'default'   => ''
			]
		);

		$section->add_control(
			'select_parallax_height',
			[
				'label'     => esc_html__( 'Parallax Section Height (px)', 'brunn-core' ),
				'type'      => Elementor\Controls_Manager::TEXT,
				'condition' => [
					'select_enable_parallax' => 'holder'
				],
				'default'   => ''
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'brunn_core_map_section_parallax_option', 10, 2 );
}

//frontend function for "Parallax"
if ( ! function_exists( 'brunn_core_render_section_parallax_option' ) ) {
	function brunn_core_render_section_parallax_option( $element ) {
		if ( 'section' !== $element->get_name() ) {
			return;
		}

		$params = $element->get_settings_for_display();

		if ( ! empty( $params['select_parallax_image']['id'] ) ) {
			$parallax_image_src = $params['select_parallax_image']['url'];
			$parallax_speed     = ! empty( $params['select_parallax_speed'] ) ? $params['select_parallax_speed'] : '1';
			$parallax_height    = ! empty( $params['select_parallax_height'] ) ? $params['select_parallax_height'] : 0;

			$element->add_render_attribute( '_wrapper', 'class', 'qodef-parallax-row-holder' );
			$element->add_render_attribute( '_wrapper', 'data-parallax-bg-speed', $parallax_speed );
			$element->add_render_attribute( '_wrapper', 'data-parallax-bg-image', $parallax_image_src );
			$element->add_render_attribute( '_wrapper', 'data-parallax-bg-height', $parallax_height );
		}
	}

	add_action( 'elementor/frontend/section/before_render', 'brunn_core_render_section_parallax_option' );
}

//function that renders helper hidden input for parallax data attribute section
if ( ! function_exists( 'brunn_core_generate_parallax_helper' ) ) {
	function brunn_core_generate_parallax_helper( $template, $widget ) {
		if ( 'section' === $widget->get_name() ) {
			$template_preceding = "
            <# if( settings.select_enable_parallax == 'holder' ){
		        let parallaxSpeed = settings.select_parallax_speed !== '' ? settings.select_parallax_speed : '1';
	            let parallaxImage = settings.select_parallax_image.url !== '' ? settings.select_parallax_image.url : '0'
	        #>
		        <input type='hidden' class='qodef-parallax-helper-holder' data-parallax-bg-speed='{{ parallaxSpeed }}' data-parallax-bg-image='{{ parallaxImage }}'/>
		    <# } #>";
			$template           = $template_preceding . " " . $template;
		}

		return $template;
	}

	add_action( 'elementor/section/print_template', 'brunn_core_generate_parallax_helper', 10, 2 );
}

//function that maps "Content Alignment" option for section
if ( ! function_exists( 'brunn_core_map_section_content_alignment_option' ) ) {
	function brunn_core_map_section_content_alignment_option( $section, $args ) {
		$section->start_controls_section(
			'select_section_content_alignment',
			[
				'label' => esc_html__( 'Brunn Content Alignment', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'select_content_alignment',
			[
				'label'        => esc_html__( 'Content Alignment', 'brunn-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'left',
				'options'      => [
					'left'   => esc_html__( 'Left', 'brunn-core' ),
					'center' => esc_html__( 'Center', 'brunn-core' ),
					'right'  => esc_html__( 'Right', 'brunn-core' )
				],
				'prefix_class' => 'qodef-content-aligment-'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'brunn_core_map_section_content_alignment_option', 10, 2 );
}

//function that maps "Grid" option for section
if ( ! function_exists( 'brunn_core_map_section_grid_option' ) ) {
	function brunn_core_map_section_grid_option( $section, $args ) {
		$section->start_controls_section(
			'select_section_grid_row',
			[
				'label' => esc_html__( 'Brunn Grid', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'select_enable_grid_row',
			[
				'label'        => esc_html__( 'Make this row "In Grid"', 'brunn-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'no',
				'options'      => [
					'no'      => esc_html__( 'No', 'brunn-core' ),
					'section' => esc_html__( 'Yes', 'brunn-core' ),
				],
				'prefix_class' => 'qodef-row-grid-'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'brunn_core_map_section_grid_option', 10, 2 );
}

//function that adds maps "Disable Background" option for section
if ( ! function_exists( 'brunn_core_map_section_disable_background' ) ) {
	function brunn_core_map_section_disable_background( $section, $args ) {
		$section->start_controls_section(
			'select_section_background',
			[
				'label' => esc_html__( 'Brunn Background', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_ADVANCED,
			]
		);

		$section->add_control(
			'select_disable_background',
			[
				'label'        => esc_html__( 'Disable row background', 'brunn-core' ),
				'type'         => Elementor\Controls_Manager::SELECT,
				'default'      => 'no',
				'options'      => [
					'no'   => esc_html__( 'Never', 'brunn-core' ),
					'1280' => esc_html__( 'Below 1280px', 'brunn-core' ),
					'1024' => esc_html__( 'Below 1024px', 'brunn-core' ),
					'768'  => esc_html__( 'Below 768px', 'brunn-core' ),
					'680'  => esc_html__( 'Below 680px', 'brunn-core' ),
					'480'  => esc_html__( 'Below 480px', 'brunn-core' )
				],
				'prefix_class' => 'qodef-disabled-bg-image-bellow-'
			]
		);

		$section->end_controls_section();
	}

	add_action( 'elementor/element/section/_section_responsive/after_section_end', 'brunn_core_map_section_disable_background', 10, 2 );
}