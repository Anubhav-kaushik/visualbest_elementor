<?php
class BrunnCoreElementorIconWithText extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_icon_with_text'; 
	}

	public function get_title() {
		return esc_html__( 'Icon With Text', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-icon-with-text';
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
			'type',
			[
				'label'     => esc_html__( 'Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'icon-left' => esc_html__( 'Icon Left From Text', 'brunn-core'), 
					'icon-left-from-title' => esc_html__( 'Icon Left From Title', 'brunn-core'), 
					'icon-top' => esc_html__( 'Icon Top', 'brunn-core')
				),
				'default' => 'icon-left'
			]
		);

		brunn_select_icon_collections()->getElementorParamsArray( $this, '', '' );
		$this->add_control(
			'custom_icon',
			[
				'label'     => esc_html__( 'Custom Icon', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::MEDIA
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
			'background_text',
			[
				'label'     => esc_html__( 'Background Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'link',
			[
				'label'     => esc_html__( 'Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set link around icon and title', 'brunn-core' )
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

		$this->end_controls_section();

		$this->start_controls_section(
			'icon_settings',
			[
				'label' => esc_html__( 'Icon Settings', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'icon_type',
			[
				'label'     => esc_html__( 'Icon Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'qodef-normal' => esc_html__( 'Normal', 'brunn-core'), 
					'qodef-circle' => esc_html__( 'Circle', 'brunn-core'), 
					'qodef-square' => esc_html__( 'Square', 'brunn-core')
				),
				'default' => 'qodef-normal'
			]
		);

		$this->add_control(
			'icon_size',
			[
				'label'     => esc_html__( 'Icon Size', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'qodef-icon-medium' => esc_html__( 'Medium', 'brunn-core'), 
					'qodef-icon-tiny' => esc_html__( 'Tiny', 'brunn-core'), 
					'qodef-icon-small' => esc_html__( 'Small', 'brunn-core'), 
					'qodef-icon-large' => esc_html__( 'Large', 'brunn-core'), 
					'qodef-icon-huge' => esc_html__( 'Very Large', 'brunn-core')
				),
				'default' => 'qodef-icon-medium'
			]
		);

		$this->add_control(
			'custom_icon_size',
			[
				'label'     => esc_html__( 'Custom Icon Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'shape_size',
			[
				'label'     => esc_html__( 'Shape Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$this->add_control(
			'icon_color',
			[
				'label'     => esc_html__( 'Icon Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_hover_color',
			[
				'label'     => esc_html__( 'Icon Hover Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
			]
		);

		$this->add_control(
			'icon_background_color',
			[
				'label'     => esc_html__( 'Icon Background Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'qodef-square', 'qodef-circle' )
				]
			]
		);

		$this->add_control(
			'icon_hover_background_color',
			[
				'label'     => esc_html__( 'Icon Hover Background Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'qodef-square', 'qodef-circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_color',
			[
				'label'     => esc_html__( 'Icon Border Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'qodef-square', 'qodef-circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_hover_color',
			[
				'label'     => esc_html__( 'Icon Border Hover Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'icon_type' => array( 'qodef-square', 'qodef-circle' )
				]
			]
		);

		$this->add_control(
			'icon_border_width',
			[
				'label'     => esc_html__( 'Border Width (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_type' => array( 'qodef-square', 'qodef-circle' )
				]
			]
		);

		$this->add_control(
			'icon_animation',
			[
				'label'     => esc_html__( 'Icon Animation', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$this->add_control(
			'icon_animation_delay',
			[
				'label'     => esc_html__( 'Icon Animation Delay (ms)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'icon_animation' => array( 'yes' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'text_settings',
			[
				'label' => esc_html__( 'Text Settings', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
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
					'h6' => esc_html__( 'h6', 'brunn-core')
				),
				'default' => 'h4',
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
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_top_margin',
			[
				'label'     => esc_html__( 'Text Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$this->add_control(
			'text_padding',
			[
				'label'     => esc_html__( 'Text Padding (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Set left or top padding dependence of type for your text holder. Default value is 13 for left type and 25 for top icon with text type', 'brunn-core' ),
				'condition' => [
					'type' => array( 'icon-left', 'icon-top' )
				]
			]
		);

		$this->end_controls_section();

		$this->start_controls_section(
			'background_text_style',
			[
				'label' => esc_html__( 'Background Text Style', 'brunn-core' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'background_text_size',
			[
				'label'     => esc_html__( 'Background Text Font Size (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'background_text!' => ''
				]
			]
		);

		$this->add_control(
			'background_text_color',
			[
				'label'     => esc_html__( 'Background Text Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'background_text!' => ''
				]
			]
		);

		$this->add_control(
			'background_text_top_margin',
			[
				'label'     => esc_html__( 'Background Text Top Margin (px)', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'background_text!' => ''
				]
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		if ( ! empty( $params['custom_icon'] ) ) {
			$params['custom_icon'] = $params['custom_icon']['id'];
		}
		
		$params['icon_parameters'] = $this->getIconParameters( $params );
		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['content_styles']  = $this->getContentStyles( $params );
		$params['title_styles']    = $this->getTitleStyles( $params );
		$params['background_text_styles'] = $this->getBackgroundTextStyles( $params );
		$params['text_styles']     = $this->getTextStyles( $params );
		
		echo brunn_core_get_shortcode_module_template_part( 'templates/iwt', 'icon-with-text', $params['type'], $params );
	}

	private function getIconParameters( $params ) {
		$params_array = array();
		
		if ( empty( $params['custom_icon'] ) ) {
			$iconPackName = brunn_select_icon_collections()->getIconCollectionParamNameByKey( $params['icon_pack'] );
			
			$params_array['icon_pack']     = $params['icon_pack'];
			$params_array[ $iconPackName ] = $params[ $iconPackName ];
			
			if ( ! empty( $params['icon_size'] ) ) {
				$params_array['size'] = $params['icon_size'];
			}
			
			if ( ! empty( $params['custom_icon_size'] ) ) {
				$params_array['custom_size'] = brunn_select_filter_px( $params['custom_icon_size'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_type'] ) ) {
				$params_array['type'] = $params['icon_type'];
			}
			
			if ( ! empty( $params['shape_size'] ) ) {
				$params_array['shape_size'] = brunn_select_filter_px( $params['shape_size'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_border_color'] ) ) {
				$params_array['border_color'] = $params['icon_border_color'];
			}
			
			if ( ! empty( $params['icon_border_hover_color'] ) ) {
				$params_array['hover_border_color'] = $params['icon_border_hover_color'];
			}
			
			if ( $params['icon_border_width'] !== '' ) {
				$params_array['border_width'] = brunn_select_filter_px( $params['icon_border_width'] ) . 'px';
			}
			
			if ( ! empty( $params['icon_background_color'] ) ) {
				$params_array['background_color'] = $params['icon_background_color'];
			}
			
			if ( ! empty( $params['icon_hover_background_color'] ) ) {
				$params_array['hover_background_color'] = $params['icon_hover_background_color'];
			}
			
			$params_array['icon_color'] = $params['icon_color'];
			
			if ( ! empty( $params['icon_hover_color'] ) ) {
				$params_array['hover_icon_color'] = $params['icon_hover_color'];
			}
			
			$params_array['icon_animation']       = $params['icon_animation'];
			$params_array['icon_animation_delay'] = $params['icon_animation_delay'];
		}
		
		return $params_array;
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array( 'qodef-iwt', 'clearfix' );
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'qodef-iwt-' . $params['type'] : '';
		$holderClasses[] = ! empty( $params['icon_size'] ) ? 'qodef-iwt-' . str_replace( 'qodef-', '', $params['icon_size'] ) : '';
		
		return $holderClasses;
	}

	private function getContentStyles( $params ) {
		$styles = array();
		
		if ( $params['text_padding'] !== '' && $params['type'] === 'icon-left' ) {
			$styles[] = 'padding-left: ' . brunn_select_filter_px( $params['text_padding'] ) . 'px';
		}
		
		if ( $params['text_padding'] !== '' && $params['type'] === 'icon-top' ) {
			$styles[] = 'padding-top: ' . brunn_select_filter_px( $params['text_padding'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
		}
		
		if ( $params['title_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['title_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getTextStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['text_color'] ) ) {
			$styles[] = 'color: ' . $params['text_color'];
		}
		
		if ( $params['text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['text_top_margin'] ) . 'px';
		}
		
		return implode( ';', $styles );
	}

	private function getBackgroundTextStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['background_text_color'] ) ) {
			$styles[] = 'color: ' . $params['background_text_color'];
		}

		if ( $params['background_text_size'] !== '' ) {
			$styles[] = 'font-size: ' . brunn_select_filter_px($params['background_text_size']) . 'px';
		}

		if ( $params['background_text_top_margin'] !== '' ) {
			$styles[] = 'margin-top: ' . brunn_select_filter_px( $params['background_text_top_margin'] ) . 'px';
		}

		return implode( ';', $styles );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorIconWithText() );