<?php

if ( class_exists( 'BrunnSelectClassWidget' ) ) {
	class BrunnSelectClassSeparatorWidget extends BrunnSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_separator_widget',
				esc_html__( 'Brunn Separator Widget', 'brunn' ),
				array( 'description' => esc_html__( 'Add a separator element to your widget areas', 'brunn' ) )
			);

			$this->setParams();
		}

		protected function setParams() {
			$this->params = array(
				array(
					'type'    => 'dropdown',
					'name'    => 'type',
					'title'   => esc_html__( 'Type', 'brunn' ),
					'options' => array(
						'normal'     => esc_html__( 'Normal', 'brunn' ),
						'full-width' => esc_html__( 'Full Width', 'brunn' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'position',
					'title'   => esc_html__( 'Position', 'brunn' ),
					'options' => array(
						'center' => esc_html__( 'Center', 'brunn' ),
						'left'   => esc_html__( 'Left', 'brunn' ),
						'right'  => esc_html__( 'Right', 'brunn' )
					)
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'border_style',
					'title'   => esc_html__( 'Style', 'brunn' ),
					'options' => array(
						'solid'  => esc_html__( 'Solid', 'brunn' ),
						'dashed' => esc_html__( 'Dashed', 'brunn' ),
						'dotted' => esc_html__( 'Dotted', 'brunn' )
					)
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'brunn' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'width',
					'title' => esc_html__( 'Width (px or %)', 'brunn' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'thickness',
					'title' => esc_html__( 'Thickness (px)', 'brunn' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'top_margin',
					'title' => esc_html__( 'Top Margin (px or %)', 'brunn' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'bottom_margin',
					'title' => esc_html__( 'Bottom Margin (px or %)', 'brunn' )
				)
			);
		}

		public function widget( $args, $instance ) {
			if ( ! is_array( $instance ) ) {
				$instance = array();
			}

			//prepare variables
			$params = '';

			//is instance empty?
			if ( is_array( $instance ) && count( $instance ) ) {
				//generate shortcode params
				foreach ( $instance as $key => $value ) {
					$params .= " $key='$value' ";
				}
			}

			echo '<div class="widget qodef-separator-widget">';
			echo do_shortcode( "[qodef_separator $params]" ); // XSS OK
			echo '</div>';
		}
	}
}