<?php
class BrunnCoreElementorBanner extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_banner'; 
	}

	public function get_title() {
		return esc_html__( 'Banner', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-banner';
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
			'image',
			[
				'label'     => esc_html__( 'Image', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA,
				'description' => esc_html__( 'Select image from media library', 'brunn-core' )
			]
		);

		$this->add_control(
			'overlay_color',
			[
				'label'     => esc_html__( 'Image Overlay Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'hover_behavior',
			[
				'label'     => esc_html__( 'Hover Behavior', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'qodef-visible-on-hover' => esc_html__( 'Visible on Hover', 'brunn-core'), 
					'qodef-visible-on-default' => esc_html__( 'Visible on Default', 'brunn-core'), 
					'qodef-disabled' => esc_html__( 'Disabled', 'brunn-core')
				),
				'default' => 'qodef-visible-on-hover'
			]
		);

		$this->add_control(
			'info_position',
			[
				'label'     => esc_html__( 'Info Position', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'default' => esc_html__( 'Default', 'brunn-core'), 
					'centered' => esc_html__( 'Centered', 'brunn-core')
				),
				'default' => 'default'
			]
		);

		$this->add_control(
			'info_content_padding',
			[
				'label'     => esc_html__( 'Info Content Padding', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Please insert padding in format top right bottom left', 'brunn-core' )
			]
		);

		$this->add_control(
			'subtitle',
			[
				'label'     => esc_html__( 'Subtitle', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'subtitle_tag',
			[
				'label'     => esc_html__( 'Subtitle Tag', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'h1' => esc_html__( 'h1', 'brunn-core'), 
					'h2' => esc_html__( 'h2', 'brunn-core'), 
					'h3' => esc_html__( 'h3', 'brunn-core'), 
					'h4' => esc_html__( 'h4', 'brunn-core'), 
					'h5' => esc_html__( 'h5', 'brunn-core'), 
					'h6' => esc_html__( 'h6', 'brunn-core'), 
					'p' => esc_html__( 'p', 'brunn-core')
				),
				'default' => 'h5',
				'condition' => [
					'subtitle!' => ''
				]
			]
		);

		$this->add_control(
			'subtitle_color',
			[
				'label'     => esc_html__( 'Subtitle Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'subtitle!' => ''
				]
			]
		);

		$this->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'h1' => esc_html__( 'h1', 'brunn-core'), 
					'h2' => esc_html__( 'h2', 'brunn-core'), 
					'h3' => esc_html__( 'h3', 'brunn-core'), 
					'h4' => esc_html__( 'h4', 'brunn-core'), 
					'h5' => esc_html__( 'h5', 'brunn-core'), 
					'h6' => esc_html__( 'h6', 'brunn-core'), 
					'p' => esc_html__( 'p', 'brunn-core')
				),
				'default' => 'h2',
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_light_words',
			[
				'label'     => esc_html__( 'Words with Light Font Weight', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter the positions of the words you would like to display in a &quot;light&quot; font weight. Separate the positions with commas (e.g. if you would like the first, third, and fourth word to have a light font weight, you would enter &quot;1,3,4&quot;)', 'brunn-core' ),
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'title_top_margin',
			[
				'label'     => esc_html__( 'Title Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'target',
			[
				'label'     => esc_html__( 'Target', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'_self' => esc_html__( 'Same Window', 'brunn-core'), 
					'_blank' => esc_html__( 'New Window', 'brunn-core')
				),
				'default' => '_self',
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->add_control(
			'link_text',
			[
				'label'     => esc_html__( 'Link Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->add_control(
			'link_color',
			[
				'label'     => esc_html__( 'Link Text Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'link!' => ''
				]
			]
		);

		$this->add_control(
			'link_top_margin',
			[
				'label'     => esc_html__( 'Link Text Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'link!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ( ! empty( $params['image'] ) ) {
			$params['image'] = $params['image']['id'];
		}
		
		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['overlay_styles']  = $this->getOverlayStyles( $params );
		$params['subtitle_styles'] = $this->getSubitleStyles( $params );
		$params['title']           = $this->getModifiedTitle( $params );
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['link_styles']     = $this->getLinkStyles( $params );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/banner', 'banner', '', $params );
		
		echo $html;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['hover_behavior'] ) ? $params['hover_behavior'] : '';
		$holderClasses[] = 'qodef-banner-info-' . $params['info_position'];
		
		return implode( ' ', $holderClasses );
	}

	private function getOverlayStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['overlay_color'] ) ) {
			$styles[] = 'background-color: ' . $params['overlay_color'];
		}
		
		if ( ! empty( $params['info_content_padding'] ) ) {
			$styles[] = 'padding: ' . $params['info_content_padding'];
		}
		
		return implode( ';', $styles );
	}

	private function getSubitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['subtitle_color'] ) ) {
			$styles[] = 'color: ' . $params['subtitle_color'];
		}
		
		return implode( ';', $styles );
	}

	private function getModifiedTitle( $params ) {
		$title             = $params['title'];
		$title_light_words = str_replace( ' ', '', $params['title_light_words'] );
		
		if ( ! empty( $title ) ) {
			$light_words = explode( ',', $title_light_words );
			$split_title = explode( ' ', $title );
			
			if ( ! empty( $title_light_words ) ) {
				foreach ( $light_words as $value ) {
					if ( ! empty( $split_title[ $value - 1 ] ) ) {
						$split_title[ $value - 1 ] = '<span class="qodef-banner-title-light">' . $split_title[ $value - 1 ] . '</span>';
					}
				}
			}
			
			$title = implode( ' ', $split_title );
		}
		
		return $title;
	}

	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( ! empty( $params['title_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getLinkStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['link_color'] ) ) {
			$styles[] = 'color: ' . $params['link_color'];
		}
		
		if ( ! empty( $params['link_top_margin'] ) ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['link_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorBanner() );