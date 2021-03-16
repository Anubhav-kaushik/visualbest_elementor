<?php

if ( class_exists( 'BrunnSelectClassWidget' ) ) {
	class BrunnSelectClassSideAreaOpener extends BrunnSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_side_area_opener',
				esc_html__( 'Brunn Side Area Opener', 'brunn' ),
				array( 'description' => esc_html__( 'Display a "hamburger" icon that opens the side area', 'brunn' ) )
			);

			$this->setParams();
		}

		protected function setParams() {
			$this->params = array(
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_color',
					'title'       => esc_html__( 'Side Area Opener Color', 'brunn' ),
					'description' => esc_html__( 'Define color for side area opener', 'brunn' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'icon_hover_color',
					'title'       => esc_html__( 'Side Area Opener Hover Color', 'brunn' ),
					'description' => esc_html__( 'Define hover color for side area opener', 'brunn' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'widget_margin',
					'title'       => esc_html__( 'Side Area Opener Margin', 'brunn' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'brunn' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'widget_title',
					'title' => esc_html__( 'Side Area Opener Title', 'brunn' )
				)
			);
		}

		public function widget( $args, $instance ) {
			$classes = array(
				'qodef-side-menu-button-opener',
				'qodef-icon-has-hover'
			);

			$classes[] = brunn_select_get_icon_sources_class( 'side_area', 'qodef-side-menu-button-opener' );

			$styles = array();
			if ( ! empty( $instance['icon_color'] ) ) {
				$styles[] = 'color: ' . $instance['icon_color'] . ';';
			}
			if ( ! empty( $instance['widget_margin'] ) ) {
				$styles[] = 'margin: ' . $instance['widget_margin'];
			}
			?>

            <a <?php brunn_select_class_attribute( $classes ); ?> <?php echo brunn_select_get_inline_attr( $instance['icon_hover_color'], 'data-hover-color' ); ?> href="javascript:void(0)" <?php brunn_select_inline_style( $styles ); ?>>
				<?php if ( ! empty( $instance['widget_title'] ) ) { ?>
                    <h5 class="qodef-side-menu-title"><?php echo esc_html( $instance['widget_title'] ); ?></h5>
				<?php } ?>
                <span class="qodef-side-menu-icon">
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
				<span class="qodef-dot"></span>
            </span>
            </a>
		<?php }
	}
}