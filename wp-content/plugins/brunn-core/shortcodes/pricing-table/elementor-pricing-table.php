<?php
class BrunnCoreElementorPricingTable extends \Elementor\Widget_Base {

	public function get_name() {
		return 'qodef_pricing_table'; 
	}

	public function get_title() {
		return esc_html__( 'Pricing Table', 'brunn-core' );
	}

	public function get_icon() {
		return 'brunn-elementor-custom-icon brunn-elementor-pricing-table';
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
			'number_of_columns',
			[
				'label'     => esc_html__( 'Number of Columns', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'' => esc_html__( 'Default', 'brunn-core'), 
					'one' => esc_html__( 'One', 'brunn-core'), 
					'two' => esc_html__( 'Two', 'brunn-core'), 
					'three' => esc_html__( 'Three', 'brunn-core'), 
					'four' => esc_html__( 'Four', 'brunn-core'), 
					'five' => esc_html__( 'Five', 'brunn-core'), 
					'six' => esc_html__( 'Six', 'brunn-core')
				),
				'default' => 'three'
			]
		);

		$this->add_control(
			'space_between_items',
			[
				'label'     => esc_html__( 'Space Between Items', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'huge' => esc_html__( 'Huge (40)', 'brunn-core'), 
					'large' => esc_html__( 'Large (25)', 'brunn-core'), 
					'medium' => esc_html__( 'Medium (20)', 'brunn-core'), 
					'normal' => esc_html__( 'Normal (15)', 'brunn-core'), 
					'small' => esc_html__( 'Small (10)', 'brunn-core'), 
					'tiny' => esc_html__( 'Tiny (5)', 'brunn-core'), 
					'no' => esc_html__( 'No (0)', 'brunn-core')
				),
				'default' => 'normal'
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
			'set_active_item',
			[
				'label'     => esc_html__( 'Set Item As Active', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'no' => esc_html__( 'No', 'brunn-core'), 
					'yes' => esc_html__( 'Yes', 'brunn-core')
				),
				'default' => 'no'
			]
		);

		$repeater->add_control(
			'content_background_color',
			[
				'label'     => esc_html__( 'Content Background Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR
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
			'title_border_color',
			[
				'label'     => esc_html__( 'Title Bottom Border Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'title!' => ''
				]
			]
		);

		$repeater->add_control(
			'price',
			[
				'label'     => esc_html__( 'Price', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'price_color',
			[
				'label'     => esc_html__( 'Price Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'price!' => ''
				]
			]
		);

		$repeater->add_control(
			'currency',
			[
				'label'     => esc_html__( 'Currency', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default mark is $', 'brunn-core' )
			]
		);

		$repeater->add_control(
			'currency_color',
			[
				'label'     => esc_html__( 'Currency Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'currency!' => ''
				]
			]
		);

		$repeater->add_control(
			'price_period',
			[
				'label'     => esc_html__( 'Price Period', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'description' => esc_html__( 'Default label is monthly', 'brunn-core' )
			]
		);

		$repeater->add_control(
			'price_period_color',
			[
				'label'     => esc_html__( 'Price Period Color', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::COLOR,
				'condition' => [
					'price_period!' => ''
				]
			]
		);

		$repeater->add_control(
			'button_text',
			[
				'label'     => esc_html__( 'Button Text', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'     => esc_html__( 'Button Link', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXT,
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$repeater->add_control(
			'button_type',
			[
				'label'     => esc_html__( 'Button Type', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::SELECT,
				'options' => array(
					'solid' => esc_html__( 'Solid', 'brunn-core'), 
					'outline' => esc_html__( 'Outline', 'brunn-core'), 
					'simple' => esc_html__( 'Simple', 'brunn-core')
				),
				'default' => 'solid',
				'condition' => [
					'button_text!' => ''
				]
			]
		);

		$repeater->add_control(
			'content',
			[
				'label'     => esc_html__( 'Content', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->add_control(
			'pricing_table_item',
			[
				'label'     => esc_html__( 'Pricing Table Item', 'brunn-core' ),
				'type'      => \Elementor\Controls_Manager::REPEATER,
				'fields'     => $repeater->get_controls(),
				'title_field'     => esc_html__( 'Item', 'brunn-core' )
			]
		);


		$this->end_controls_section();
	}
	public function render() {

		$params = $this->get_settings_for_display();

		$holder_class = $this->getHolderClasses( $params );
		?>
		<div class="qodef-pricing-tables qodef-grid-list qodef-disable-bottom-space clearfix <?php echo esc_attr( $holder_class ) ?>">
            <div class="qodef-pt-wrapper qodef-outer-space">

                <?php foreach ( $params['pricing_table_item'] as $pti ) {

                    $pti['holder_classes']          = $this->getItemHolderClasses( $pti );
                    $pti['holder_styles']           = $this->getHolderStyles( $pti );
                    $pti['title_styles']            = $this->getTitleStyles( $pti );
                    $pti['price_styles']            = $this->getPriceStyles( $pti );
                    $pti['currency_styles']         = $this->getCurrencyStyles( $pti );
                    $pti['price_period_styles']     = $this->getPricePeriodStyles( $pti );

                    echo brunn_core_get_shortcode_module_template_part( 'templates/pricing-table-template', 'pricing-table', '', $pti );
                } ?>

            </div>
        </div>
        <?php

	}

	private function getHolderClasses( $params ) {
		$holderClasses = array();
		
		$holderClasses[] = 'qodef-' . $params['number_of_columns'] . '-columns';
		$holderClasses[] = 'qodef-' . $params['space_between_items'] . '-space';
		
		return implode( ' ', $holderClasses );
	}

	private function getItemHolderClasses( $params ) {
		$holderClasses = array();

		$holderClasses[] = ! empty( $params['custom_class'] ) ? esc_attr( $params['custom_class'] ) : '';
		$holderClasses[] = $params['set_active_item'] === 'yes' ? 'qodef-pt-active-item' : '';

		return implode( ' ', $holderClasses );
	}

	private function getHolderStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['content_background_color'] ) ) {
			$itemStyle[] = 'background-color: ' . $params['content_background_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getTitleStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['title_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['title_color'];
		}

		if ( ! empty( $params['title_border_color'] ) ) {
			$itemStyle[] = 'border-color: ' . $params['title_border_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getPriceStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['price_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getCurrencyStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['currency_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['currency_color'];
		}

		return implode( ';', $itemStyle );
	}

	private function getPricePeriodStyles( $params ) {
		$itemStyle = array();

		if ( ! empty( $params['price_period_color'] ) ) {
			$itemStyle[] = 'color: ' . $params['price_period_color'];
		}

		return implode( ';', $itemStyle );
	}

}
\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorPricingTable() );