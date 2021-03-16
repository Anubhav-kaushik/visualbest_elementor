<?php
class BrunnCoreElementorVideoButton extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_video_button'; 
	}

	public function get_title() {
		return esc_html__( 'Video Button', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-video-button';
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
			'video_button_type',
			[
				'label'     => esc_html__( 'Video Button Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'overlay' => esc_html__( 'Overlay', 'brunn-core'), 
					'simple' => esc_html__( 'Simple', 'brunn-core')
				),
				'default' => 'overlay'
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
			'video_link',
			[
				'label'     => esc_html__( 'Video Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'video_image',
			[
				'label'     => esc_html__( 'Video Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'brunn-core' ),
				'condition' => [
					'video_button_type' => array( 'overlay' )
				]
			]
		);

		$this->add_control(
			'play_button_color',
			[
				'label'     => esc_html__( 'Play Button Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'video_button_type' => array( 'overlay' )
				]
			]
		);

		$this->add_control(
			'play_button_background_color',
			[
				'label'     => esc_html__( 'Play Button Background Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'video_button_type' => array( 'overlay' )
				]
			]
		);

		$this->add_control(
			'play_button_size',
			[
				'label'     => esc_html__( 'Play Button Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'video_button_type' => array( 'overlay' )
				]
			]
		);

		$this->add_control(
			'play_button_text',
			[
				'label'     => esc_html__( 'Play Button Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'video_button_type' => array( 'simple' )
				]
			]
		);

		$this->add_control(
			'play_button_image',
			[
				'label'     => esc_html__( 'Play Button Custom Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library. If you use this field then play button color and button size options will not work', 'brunn-core' )
			]
		);

		$this->add_control(
			'play_button_hover_image',
			[
				'label'     => esc_html__( 'Play Button Custom Hover Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library. If you use this field then play button color and button size options will not work', 'brunn-core' ),
				'condition' => [
					'video_button_type' => array( 'overlay' )
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ( ! empty( $params['video_image'] ) ) {
			$params['video_image'] = $params['video_image']['id'];
		}

		if ( ! empty( $params['play_button_image'] ) ) {
			$params['play_button_image'] = $params['play_button_image']['id'];
		}

		if ( ! empty( $params['play_button_hover_image'] ) ) {
			$params['play_button_hover_image'] = $params['play_button_hover_image']['id'];
		}

		$params['holder_classes']     = $this->getHolderClasses( $params );
		$params['play_button_styles'] = $this->getPlayButtonStyles( $params );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/video-button', 'video-button', '', $params );
		
		echo $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['video_image'] ) ? 'qodef-vb-has-img' : '';
		$holderClasses[] = $params['video_button_type'] == 'simple' ? 'qodef-vb-simple' : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getPlayButtonStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['play_button_color'] ) ) {
			$styles[] = 'color: ' . $params['play_button_color'];
		}

		if ( ! empty( $params['play_button_background_color'] ) ) {
			$styles[] = 'background-color: ' . $params['play_button_background_color'];
		}
		
		if ( ! empty( $params['play_button_size'] ) ) {
			$styles[] = 'font-size: ' . brunn_select_filter_px( $params['play_button_size'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorVideoButton() );