<?php
class BrunnCoreElementorCountdown extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_countdown'; 
	}

	public function get_title() {
		return esc_html__( 'Countdown', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-countdown';
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
			'custom_class',
			[
				'label'     => esc_html__( 'Custom CSS Class', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'brunn-core' )
			]
		);

		$this->add_control(
			'skin',
			[
				'label'     => esc_html__( 'Skin', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'qodef-light-skin' => esc_html__( 'Light', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'year',
			[
				'label'     => esc_html__( 'Year', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'2018' => esc_html__( '2018', 'brunn-core'), 
					'2019' => esc_html__( '2019', 'brunn-core'), 
					'2020' => esc_html__( '2020', 'brunn-core'), 
					'2021' => esc_html__( '2021', 'brunn-core'), 
					'2022' => esc_html__( '2022', 'brunn-core')
				),
				'default' => '2018'
			]
		);

		$this->add_control(
			'month',
			[
				'label'     => esc_html__( 'Month', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( 'January', 'brunn-core'), 
					'2' => esc_html__( 'February', 'brunn-core'), 
					'3' => esc_html__( 'March', 'brunn-core'), 
					'4' => esc_html__( 'April', 'brunn-core'), 
					'5' => esc_html__( 'May', 'brunn-core'), 
					'6' => esc_html__( 'June', 'brunn-core'), 
					'7' => esc_html__( 'July', 'brunn-core'), 
					'8' => esc_html__( 'August', 'brunn-core'), 
					'9' => esc_html__( 'September', 'brunn-core'), 
					'10' => esc_html__( 'October', 'brunn-core'), 
					'11' => esc_html__( 'November', 'brunn-core'), 
					'12' => esc_html__( 'December', 'brunn-core')
				),
				'default' => '1'
			]
		);

		$this->add_control(
			'day',
			[
				'label'     => esc_html__( 'Day', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'1' => esc_html__( '1', 'brunn-core'), 
					'2' => esc_html__( '2', 'brunn-core'), 
					'3' => esc_html__( '3', 'brunn-core'), 
					'4' => esc_html__( '4', 'brunn-core'), 
					'5' => esc_html__( '5', 'brunn-core'), 
					'6' => esc_html__( '6', 'brunn-core'), 
					'7' => esc_html__( '7', 'brunn-core'), 
					'8' => esc_html__( '8', 'brunn-core'), 
					'9' => esc_html__( '9', 'brunn-core'), 
					'10' => esc_html__( '10', 'brunn-core'), 
					'11' => esc_html__( '11', 'brunn-core'), 
					'12' => esc_html__( '12', 'brunn-core'), 
					'13' => esc_html__( '13', 'brunn-core'), 
					'14' => esc_html__( '14', 'brunn-core'), 
					'15' => esc_html__( '15', 'brunn-core'), 
					'16' => esc_html__( '16', 'brunn-core'), 
					'17' => esc_html__( '17', 'brunn-core'), 
					'18' => esc_html__( '18', 'brunn-core'), 
					'19' => esc_html__( '19', 'brunn-core'), 
					'20' => esc_html__( '20', 'brunn-core'), 
					'21' => esc_html__( '21', 'brunn-core'), 
					'22' => esc_html__( '22', 'brunn-core'), 
					'23' => esc_html__( '23', 'brunn-core'), 
					'24' => esc_html__( '24', 'brunn-core'), 
					'25' => esc_html__( '25', 'brunn-core'), 
					'26' => esc_html__( '26', 'brunn-core'), 
					'27' => esc_html__( '27', 'brunn-core'), 
					'28' => esc_html__( '28', 'brunn-core'), 
					'29' => esc_html__( '29', 'brunn-core'), 
					'30' => esc_html__( '30', 'brunn-core'), 
					'31' => esc_html__( '31', 'brunn-core')
				),
				'default' => '1'
			]
		);

		$this->add_control(
			'hour',
			[
				'label'     => esc_html__( 'Hour', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'0' => esc_html__( '0', 'brunn-core'), 
					'1' => esc_html__( '1', 'brunn-core'), 
					'2' => esc_html__( '2', 'brunn-core'), 
					'3' => esc_html__( '3', 'brunn-core'), 
					'4' => esc_html__( '4', 'brunn-core'), 
					'5' => esc_html__( '5', 'brunn-core'), 
					'6' => esc_html__( '6', 'brunn-core'), 
					'7' => esc_html__( '7', 'brunn-core'), 
					'8' => esc_html__( '8', 'brunn-core'), 
					'9' => esc_html__( '9', 'brunn-core'), 
					'10' => esc_html__( '10', 'brunn-core'), 
					'11' => esc_html__( '11', 'brunn-core'), 
					'12' => esc_html__( '12', 'brunn-core'), 
					'13' => esc_html__( '13', 'brunn-core'), 
					'14' => esc_html__( '14', 'brunn-core'), 
					'15' => esc_html__( '15', 'brunn-core'), 
					'16' => esc_html__( '16', 'brunn-core'), 
					'17' => esc_html__( '17', 'brunn-core'), 
					'18' => esc_html__( '18', 'brunn-core'), 
					'19' => esc_html__( '19', 'brunn-core'), 
					'20' => esc_html__( '20', 'brunn-core'), 
					'21' => esc_html__( '21', 'brunn-core'), 
					'22' => esc_html__( '22', 'brunn-core'), 
					'23' => esc_html__( '23', 'brunn-core'), 
					'24' => esc_html__( '24', 'brunn-core')
				),
				'default' => '0'
			]
		);

		$this->add_control(
			'minute',
			[
				'label'     => esc_html__( 'Minute', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'0' => esc_html__( '0', 'brunn-core'), 
					'1' => esc_html__( '1', 'brunn-core'), 
					'2' => esc_html__( '2', 'brunn-core'), 
					'3' => esc_html__( '3', 'brunn-core'), 
					'4' => esc_html__( '4', 'brunn-core'), 
					'5' => esc_html__( '5', 'brunn-core'), 
					'6' => esc_html__( '6', 'brunn-core'), 
					'7' => esc_html__( '7', 'brunn-core'), 
					'8' => esc_html__( '8', 'brunn-core'), 
					'9' => esc_html__( '9', 'brunn-core'), 
					'10' => esc_html__( '10', 'brunn-core'), 
					'11' => esc_html__( '11', 'brunn-core'), 
					'12' => esc_html__( '12', 'brunn-core'), 
					'13' => esc_html__( '13', 'brunn-core'), 
					'14' => esc_html__( '14', 'brunn-core'), 
					'15' => esc_html__( '15', 'brunn-core'), 
					'16' => esc_html__( '16', 'brunn-core'), 
					'17' => esc_html__( '17', 'brunn-core'), 
					'18' => esc_html__( '18', 'brunn-core'), 
					'19' => esc_html__( '19', 'brunn-core'), 
					'20' => esc_html__( '20', 'brunn-core'), 
					'21' => esc_html__( '21', 'brunn-core'), 
					'22' => esc_html__( '22', 'brunn-core'), 
					'23' => esc_html__( '23', 'brunn-core'), 
					'24' => esc_html__( '24', 'brunn-core'), 
					'25' => esc_html__( '25', 'brunn-core'), 
					'26' => esc_html__( '26', 'brunn-core'), 
					'27' => esc_html__( '27', 'brunn-core'), 
					'28' => esc_html__( '28', 'brunn-core'), 
					'29' => esc_html__( '29', 'brunn-core'), 
					'30' => esc_html__( '30', 'brunn-core'), 
					'31' => esc_html__( '31', 'brunn-core'), 
					'32' => esc_html__( '32', 'brunn-core'), 
					'33' => esc_html__( '33', 'brunn-core'), 
					'34' => esc_html__( '34', 'brunn-core'), 
					'35' => esc_html__( '35', 'brunn-core'), 
					'36' => esc_html__( '36', 'brunn-core'), 
					'37' => esc_html__( '37', 'brunn-core'), 
					'38' => esc_html__( '38', 'brunn-core'), 
					'39' => esc_html__( '39', 'brunn-core'), 
					'40' => esc_html__( '40', 'brunn-core'), 
					'41' => esc_html__( '41', 'brunn-core'), 
					'42' => esc_html__( '42', 'brunn-core'), 
					'43' => esc_html__( '43', 'brunn-core'), 
					'44' => esc_html__( '44', 'brunn-core'), 
					'45' => esc_html__( '45', 'brunn-core'), 
					'46' => esc_html__( '46', 'brunn-core'), 
					'47' => esc_html__( '47', 'brunn-core'), 
					'48' => esc_html__( '48', 'brunn-core'), 
					'49' => esc_html__( '49', 'brunn-core'), 
					'50' => esc_html__( '50', 'brunn-core'), 
					'51' => esc_html__( '51', 'brunn-core'), 
					'52' => esc_html__( '52', 'brunn-core'), 
					'53' => esc_html__( '53', 'brunn-core'), 
					'54' => esc_html__( '54', 'brunn-core'), 
					'55' => esc_html__( '55', 'brunn-core'), 
					'56' => esc_html__( '56', 'brunn-core'), 
					'57' => esc_html__( '57', 'brunn-core'), 
					'58' => esc_html__( '58', 'brunn-core'), 
					'59' => esc_html__( '59', 'brunn-core'), 
					'60' => esc_html__( '60', 'brunn-core')
				),
				'default' => '0'
			]
		);

		$this->add_control(
			'month_label',
			[
				'label'     => esc_html__( 'Month Label', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'day_label',
			[
				'label'     => esc_html__( 'Day Label', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'hour_label',
			[
				'label'     => esc_html__( 'Hour Label', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'minute_label',
			[
				'label'     => esc_html__( 'Minute Label', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'second_label',
			[
				'label'     => esc_html__( 'Second Label', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'digit_font_size',
			[
				'label'     => esc_html__( 'Digit Font Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'label_font_size',
			[
				'label'     => esc_html__( 'Label Font Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['id']             = mt_rand( 1000, 9999 );
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['holder_data']    = $this->getHolderData( $params );

		echo brunn_core_get_shortcode_module_template_part( 'templates/countdown', 'countdown', '', $params );
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['skin'] ) ? $params['skin'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getHolderData( $params ) {
		$holderData = array();
		
		$holderData['data-year']         = ! empty( $params['year'] ) ? $params['year'] : '';
		$holderData['data-month']        = ! empty( $params['month'] ) ? $params['month'] : '';
		$holderData['data-day']          = ! empty( $params['day'] ) ? $params['day'] : '';
		$holderData['data-hour']         = $params['hour'] !== '' ? $params['hour'] : '';
		$holderData['data-minute']       = $params['minute'] !== '' ? $params['minute'] : '';
		$holderData['data-month-label']  = ! empty( $params['month_label'] ) ? $params['month_label'] : esc_html__( 'Months', 'brunn-core' );
		$holderData['data-day-label']    = ! empty( $params['day_label'] ) ? $params['day_label'] : esc_html__( 'Days', 'brunn-core' );
		$holderData['data-hour-label']   = ! empty( $params['hour_label'] ) ? $params['hour_label'] : esc_html__( 'Hours', 'brunn-core' );
		$holderData['data-minute-label'] = ! empty( $params['minute_label'] ) ? $params['minute_label'] : esc_html__( 'Minutes', 'brunn-core' );
		$holderData['data-second-label'] = ! empty( $params['second_label'] ) ? $params['second_label'] : esc_html__( 'Seconds', 'brunn-core' );
		$holderData['data-digit-size']   = ! empty( $params['digit_font_size'] ) ? $params['digit_font_size'] : '';
		$holderData['data-label-size']   = ! empty( $params['label_font_size'] ) ? $params['label_font_size'] : '';
		
		return $holderData;
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorCountdown() );