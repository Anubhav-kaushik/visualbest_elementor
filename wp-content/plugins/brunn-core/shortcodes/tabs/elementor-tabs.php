<?php
class BrunnCoreElementorTabs extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_tabs'; 
	}

	public function get_title() {
		return esc_html__( 'Tabs', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-tabs';
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
					'standard' => esc_html__( 'Standard', 'brunn-core'), 
					'boxed' => esc_html__( 'Boxed', 'brunn-core'), 
					'simple' => esc_html__( 'Simple', 'brunn-core'), 
					'vertical' => esc_html__( 'Vertical', 'brunn-core')
				),
				'default' => 'standard'
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'tab_title',
			[
				'label'     => esc_html__( 'Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'tab_text',
			[
				'label'       => esc_html__( 'Text', 'biagiotti-core' ),
				'type'        => \Elementor\Controls_Manager::WYSIWYG,
			]
		);

		$this->add_control(
			'tabs_item',
			[
				'label'     => esc_html__( 'Tabs Item', 'brunn-core' ),
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

		<div class="qodef-tabs <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<ul class="qodef-tabs-nav clearfix">
				<?php foreach ( $params['tabs_item'] as $tab ) { ?>
					<li>
						<?php if ( ! empty( $tab['tab_title'] ) ) { ?>
							<a href="#tab-<?php echo sanitize_title( $tab['tab_title'] ) ?>"><?php echo esc_html( $tab['tab_title'] ); ?></a>
						<?php } ?>
					</li>
				<?php } ?>
			</ul>

			<?php foreach ( $params['tabs_item'] as $tab ) {

				$rand_number         = rand( 0, 1000 );
				$tab['tab_title'] = $tab['tab_title'] . '-' . $rand_number;

				echo brunn_core_get_shortcode_module_template_part( 'templates/elementor-tab-content', 'tabs', '', $tab );
			} ?>

		</div>
		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = ! empty( $params['type'] ) ? 'qodef-tabs-' . esc_attr( $params['type'] ) : 'qodef-tabs-standard';
		
		return implode( ' ', $holderClasses );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorTabs() );