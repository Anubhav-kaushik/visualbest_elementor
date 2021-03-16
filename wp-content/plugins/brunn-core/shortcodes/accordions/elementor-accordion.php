<?php
class BrunnCoreElementorAccordion extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_accordion'; 
	}

	public function get_title() {
		return esc_html__( 'Accordion', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-accordions';
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
			'style',
			[
				'label'     => esc_html__( 'Style', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'accordion' => esc_html__( 'Accordion', 'brunn-core'),
					'toggle' => esc_html__( 'Toggle', 'brunn-core')
				),
				'default' => 'accordion'
			]
		);

		$this->add_control(
			'layout',
			[
				'label'     => esc_html__( 'Layout', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'boxed' => esc_html__( 'Boxed', 'brunn-core'),
					'simple' => esc_html__( 'Simple', 'brunn-core')
				),
				'default' => 'boxed'
			]
		);

		$this->add_control(
			'text_style',
			[
				'label'     => esc_html__( 'Text Style', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'),
					'custom' => esc_html__( 'Custom Style', 'brunn-core')
				),
				'default' => ''
			]
		);

		$this->add_control(
			'background_skin',
			[
				'label'     => esc_html__( 'Background Skin', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'),
					'white' => esc_html__( 'White', 'brunn-core')
				),
				'default' => '',
				'condition' => [
					'layout' => array( 'boxed' )
				]
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Enter accordion section title', 'brunn-core' )
			]
		);

		$repeater->add_control(
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
				'default' => 'h3'
			]
		);

		$repeater->add_control(
			'text',
			[
				'label'       => esc_html__( 'Text', 'biagiotti-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'accordion_tab',
			[
				'label'     => esc_html__( 'Accordion Tab', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'brunn-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$params['holder_classes'] = $this->getHolderClasses( $params );
		?>

		<div class="qodef-accordion-holder <?php echo esc_attr( $params['holder_classes'] ); ?> clearfix">
			<?php foreach ( $params['accordion_tab'] as $tab ) {

				echo brunn_core_get_shortcode_module_template_part( 'templates/elementor-accordion-template', 'accordions', '', $tab );
			} ?>
		</div>
		<?php
	}

	private function getHolderClasses( $params ) {
		$holder_classes = array( 'qodef-ac-default' );
		
		$holder_classes[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holder_classes[] = $params['style'] == 'toggle' ? 'qodef-toggle' : 'qodef-accordion';
		$holder_classes[] = $params['text_style'] == 'custom' ? 'qodef-ac-custom-text' : '';
		$holder_classes[] = ! empty( $params['layout'] ) ? 'qodef-ac-' . esc_attr( $params['layout'] ) : '';
		$holder_classes[] = ! empty( $params['background_skin'] ) ? 'qodef-' . esc_attr( $params['background_skin'] ) . '-skin' : '';
		
		return implode( ' ', $holder_classes );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorAccordion() );