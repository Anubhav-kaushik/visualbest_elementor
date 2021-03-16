<?php
class BrunnCoreElementorProcess extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_process'; 
	}

	public function get_title() {
		return esc_html__( 'Process', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-process';
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
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number Of Columns', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'two' => esc_html__( 'Two', 'brunn-core'), 
					'three' => esc_html__( 'Three', 'brunn-core'), 
					'four' => esc_html__( 'Four', 'brunn-core')
				),
				'default' => 'three'
			]
		);

		$this->add_control(
			'switch_to_one_column',
			[
				'label'     => esc_html__( 'Switch to One Column', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'description' => esc_html__( 'Choose on which stage item will be in one column', 'brunn-core' ),
				'options' => array(
					'' => esc_html__( 'Default None', 'brunn-core'), 
					'1366' => esc_html__( 'Below 1366px', 'brunn-core'), 
					'1024' => esc_html__( 'Below 1024px', 'brunn-core'), 
					'768' => esc_html__( 'Below 768px', 'brunn-core'), 
					'680' => esc_html__( 'Below 680px', 'brunn-core'), 
					'480' => esc_html__( 'Below 480px', 'brunn-core')
				),
				'default' => ''
			]
		);

		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'custom_class',
			[
				'label'     => esc_html__( 'Custom CSS Class', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'brunn-core' )
			]
		);

		$repeater->add_control(
			'title',
			[
				'label'     => esc_html__( 'Title', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'title_tag',
			[
				'label'     => esc_html__( 'Title Tag', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
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

		$repeater->add_control(
			'title_color',
			[
				'label'     => esc_html__( 'Title Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'text',
			[
				'label'     => esc_html__( 'Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$repeater->add_control(
			'text_color',
			[
				'label'     => esc_html__( 'Text Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'text!' => ''
				]
			]
		);

		$repeater->add_control(
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
			'process_item',
			[
				'label'     => esc_html__( 'Process Item', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'brunn-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();



		$params['holder_classes']  = $this->getHolderClasses( $params );
		$params['number_of_items'] = $this->getNumberOfItems( $params['number_of_columns'] );
		?>

		<div class="qodef-process-holder <?php echo esc_attr( $params['holder_classes'] ); ?>">
			<div class="qodef-mark-horizontal-holder">
				<?php for ( $i = 1; $i <= $params['number_of_items']; $i ++ ) { ?>
					<div class="qodef-process-mark">
						<div class="qodef-process-line"></div>
						<div class="qodef-process-circle"><?php echo esc_attr( $i ); ?></div>
					</div>
				<?php } ?>
			</div>
			<div class="qodef-mark-vertical-holder">
				<?php for ( $i = 1; $i <= $params['number_of_items']; $i ++ ) { ?>
					<div class="qodef-process-mark">
						<div class="qodef-process-line"></div>
						<div class="qodef-process-circle"><?php echo esc_attr( $i ); ?></div>
					</div>
				<?php } ?>
			</div>
			<div class="qodef-process-inner">

				<?php foreach ( $params['process_item'] as $pi ) {

					$pi['holder_classes'] = $this->getItemHolderClasses( $pi );
					$pi['title_styles']   = $this->getTitleStyles( $pi );
					$pi['text_styles']    = $this->getTextStyles( $pi );

					echo brunn_core_get_shortcode_module_template_part( 'templates/process-item-template', 'process', '', $pi );
				} ?>

			</div>
		</div>

		<?php
	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = 'qodef-' . $params['number_of_columns'] . '-columns';
		$holderClasses[] = ! empty( $params['switch_to_one_column'] ) ? 'qodef-responsive-' . $params['switch_to_one_column'] : '';
		
		return implode( ' ', $holderClasses );
	}

	private function getNumberOfItems( $params ) {
		$number = 3;
		
		switch ($params) {
			case 'two':
				$number = 2;
				break;
			case 'three':
				$number = 3;
				break;
			case 'four':
				$number = 4;
				break;
		}
		
		return $number;
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';

		return implode( ' ', $holderClasses );
	}

	private function getTitleStyles( $params ) {
		$styles = array();

		if ( ! empty( $params['title_color'] ) ) {
			$styles[] = 'color: ' . $params['title_color'];
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

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorProcess() );