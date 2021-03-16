<?php
class BrunnCoreElementorGoogleMap extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_google_map'; 
	}

	public function get_title() {
		return esc_html__( 'Google Map', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-google-map';
	}

	public function get_categories() {
		return [ 'select' ];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'general',
			[
				'label' => esc_html__( 'General', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'address1',
			[
				'label'     => esc_html__( 'Address 1', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'address2',
			[
				'label'     => esc_html__( 'Address 2', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address1!' => ''
				]
			]
		);

		$this->add_control(
			'address3',
			[
				'label'     => esc_html__( 'Address 3', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address2!' => ''
				]
			]
		);

		$this->add_control(
			'address4',
			[
				'label'     => esc_html__( 'Address 4', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address3!' => ''
				]
			]
		);

		$this->add_control(
			'address5',
			[
				'label'     => esc_html__( 'Address 5', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'address4!' => ''
				]
			]
		);

		$this->add_control(
			'snazzy_map_style',
			[
				'label'     => esc_html__( 'Snazzy Map Style', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Enabling this option will set predefined snazzy map style', 'brunn-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'snazzy_map_code',
			[
				'label'     => esc_html__( 'Snazzy Map Code', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA,
				'description' => esc_html__( 'Fill code from snazzy map site <a href="https://snazzymaps.com/" target="_blank">https://snazzymaps.com/</a> to add predefined style for your google map', 'brunn-core' ),
				'condition' => [
					'snazzy_map_style' => array( 'yes' )
				]
			]
		);

		$this->add_control(
			'custom_map_style',
			[
				'label'     => esc_html__( 'Custom Map Style', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Enabling this option will allow Map editing', 'brunn-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no',
				'condition' => [
					'snazzy_map_style' => array( 'no' )
				]
			]
		);

		$this->add_control(
			'color_overlay',
			[
				'label'     => esc_html__( 'Color Overlay', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'description' => esc_html__( 'Choose a Map color overlay', 'brunn-core' ),
				'condition' => [
					'custom_map_style' => array( 'yes' )
				],
				'default' => '#393939'
			]
		);

		$this->add_control(
			'saturation',
			[
				'label'     => esc_html__( 'Saturation', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Choose a level of saturation (-100 = least saturated, 100 = most saturated)', 'brunn-core' ),
				'condition' => [
					'custom_map_style' => array( 'yes' )
				],
				'default' => '-100'
			]
		);

		$this->add_control(
			'lightness',
			[
				'label'     => esc_html__( 'Lightness', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Choose a level of lightness (-100 = darkest, 100 = lightest)', 'brunn-core' ),
				'condition' => [
					'custom_map_style' => array( 'yes' )
				],
				'default' => '-60'
			]
		);

		$this->add_control(
			'pin',
			[
				'label'     => esc_html__( 'Pin', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select a pin image to be used on Google Map', 'brunn-core' )
			]
		);

		$this->add_control(
			'zoom',
			[
				'label'     => esc_html__( 'Map Zoom', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter a zoom factor for Google Map (0 = whole worlds, 19 = individual buildings)', 'brunn-core' ),
				'default' => '12'
			]
		);

		$this->add_control(
			'scroll_wheel',
			[
				'label'     => esc_html__( 'Zoom Map on Mouse Wheel', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Enabling this option will allow users to zoom in on Map using mouse wheel', 'brunn-core' ),
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'map_height',
			[
				'label'     => esc_html__( 'Map Height (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'default' => '600'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['is_elementor'] = true;
		$params['enable_direction_link'] = 'no';

		$rand_id = mt_rand( 100000, 3000000 );
		
		$params['map_data'] = $this->getMapDate( $params, $rand_id );
		$params['map_id']   = 'qodef-map-' . $rand_id;
		
		echo brunn_core_get_shortcode_module_template_part( 'templates/google-map-template', 'google-map', '', $params );
	}

	private function getMapDate( $params, $id ) {
		$map_data = array();
		
		$addresses_array = array();
		if ( $params['address1'] != '' ) {
			array_push( $addresses_array, esc_attr( $params['address1'] ) );
		}
		if ( $params['address2'] != '' ) {
			array_push( $addresses_array, esc_attr( $params['address2'] ) );
		}
		if ( $params['address3'] != '' ) {
			array_push( $addresses_array, esc_attr( $params['address3'] ) );
		}
		if ( $params['address4'] != '' ) {
			array_push( $addresses_array, esc_attr( $params['address4'] ) );
		}
		if ( $params['address5'] != '' ) {
			array_push( $addresses_array, esc_attr( $params['address5'] ) );
		}
		
		if ( $params['pin']['id'] != "" ) {
			$map_pin = wp_get_attachment_image_src( $params['pin']['id'], 'full', true );
			$map_pin = $map_pin[0];
		} else {
			$map_pin = get_template_directory_uri() . "/assets/img/pin.png";
		}
		
		$map_data[] = "data-addresses='[\"" . implode( '","', $addresses_array ) . "\"]'";
		$map_data[] = 'data-custom-map-style=' . $params['custom_map_style'];
		$map_data[] = 'data-color-overlay=' . $params['color_overlay'];
		$map_data[] = 'data-saturation=' . $params['saturation'];
		$map_data[] = 'data-lightness=' . $params['lightness'];
		$map_data[] = 'data-zoom=' . $params['zoom'];
		$map_data[] = 'data-pin=' . $map_pin;
		$map_data[] = 'data-unique-id=' . $id;
		$map_data[] = 'data-scroll-wheel=' . $params['scroll_wheel'];
		$map_data[] = 'data-height=' . $params['map_height'];
		$map_data[] = $params['snazzy_map_style'] == 'yes' ? 'data-snazzy-map-style=yes' : '';
		
		return implode( ' ', $map_data );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorGoogleMap() );