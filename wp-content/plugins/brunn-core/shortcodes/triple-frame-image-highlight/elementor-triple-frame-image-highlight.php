<?php
class BrunnCoreElementorTripleFrameImageHighlight extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_triple_frame_image_highlight'; 
	}

	public function get_title() {
		return esc_html__( 'Triple Frame Image Highlight', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-triple-frame-image-highlight';
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
			'centered_image',
			[
				'label'     => esc_html__( 'Centered Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'centered_image_link',
			[
				'label'     => esc_html__( 'Centered Image Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'left_image',
			[
				'label'     => esc_html__( 'Left Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'left_image_link',
			[
				'label'     => esc_html__( 'Left Image Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'right_image',
			[
				'label'     => esc_html__( 'Right Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
			]
		);

		$this->add_control(
			'right_image_link',
			[
				'label'     => esc_html__( 'Right Image Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'enable_navigation',
			[
				'label'     => esc_html__( 'Enable Navigation', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'link_target',
			[
				'label'     => esc_html__( 'Link Target', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'brunn-core'), 
					'_blank' => esc_html__( 'New Window', 'brunn-core')
				),
				'default' => '_self'
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ( ! empty( $params['centered_image'] ) ) {
			$params['centered_image'] = $params['centered_image']['id'];
		}

		if ( ! empty( $params['left_image'] ) ) {
			$params['left_image'] = $params['left_image']['id'];
		}

		if ( ! empty( $params['right_image'] ) ) {
			$params['right_image'] = $params['right_image']['id'];
		}

        $params['holder_classes'] = $this->getHolderClasses( $params );

        echo brunn_core_get_shortcode_module_template_part('templates/triple-frame-image-highlight-template', 'triple-frame-image-highlight', '', $params);
	}

    private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = !empty($params['layout']) ? 'qodef-tfih-'.$params['layout'] : '';
		$holderClasses[] = ($params['enable_navigation'] == 'yes') ? 'qodef-tfih-with-nav' : '';
		
		return implode( ' ', $holderClasses );
    }

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorTripleFrameImageHighlight() );