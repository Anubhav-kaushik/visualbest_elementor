<?php

if ( class_exists( 'BrunnSelectClassWidget' ) ) {
	class BrunnSelectClassButtonWidget extends BrunnSelectClassWidget {
		public function __construct() {
			parent::__construct(
				'qodef_button_widget',
				esc_html__( 'Brunn Button Widget', 'brunn' ),
				array( 'description' => esc_html__( 'Add button element to widget areas', 'brunn' ) )
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
						'solid'   => esc_html__( 'Solid', 'brunn' ),
						'outline' => esc_html__( 'Outline', 'brunn' ),
						'simple'  => esc_html__( 'Simple', 'brunn' )
					)
				),
				array(
					'type'        => 'dropdown',
					'name'        => 'size',
					'title'       => esc_html__( 'Size', 'brunn' ),
					'options'     => array(
						'small'  => esc_html__( 'Small', 'brunn' ),
						'medium' => esc_html__( 'Medium', 'brunn' ),
						'large'  => esc_html__( 'Large', 'brunn' ),
						'huge'   => esc_html__( 'Huge', 'brunn' )
					),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'brunn' )
				),
				array(
					'type'    => 'textfield',
					'name'    => 'text',
					'title'   => esc_html__( 'Text', 'brunn' ),
					'default' => esc_html__( 'Button Text', 'brunn' )
				),
				array(
					'type'  => 'textfield',
					'name'  => 'link',
					'title' => esc_html__( 'Link', 'brunn' )
				),
				array(
					'type'    => 'dropdown',
					'name'    => 'target',
					'title'   => esc_html__( 'Link Target', 'brunn' ),
					'options' => brunn_select_get_link_target_array()
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'color',
					'title' => esc_html__( 'Color', 'brunn' )
				),
				array(
					'type'  => 'colorpicker',
					'name'  => 'hover_color',
					'title' => esc_html__( 'Hover Color', 'brunn' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'background_color',
					'title'       => esc_html__( 'Background Color', 'brunn' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'brunn' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_background_color',
					'title'       => esc_html__( 'Hover Background Color', 'brunn' ),
					'description' => esc_html__( 'This option is only available for solid button type', 'brunn' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'border_color',
					'title'       => esc_html__( 'Border Color', 'brunn' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'brunn' )
				),
				array(
					'type'        => 'colorpicker',
					'name'        => 'hover_border_color',
					'title'       => esc_html__( 'Hover Border Color', 'brunn' ),
					'description' => esc_html__( 'This option is only available for solid and outline button type', 'brunn' )
				),
				array(
					'type'        => 'textfield',
					'name'        => 'margin',
					'title'       => esc_html__( 'Margin', 'brunn' ),
					'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'brunn' )
				)
			);
		}

		public function widget( $args, $instance ) {
			$params = '';

			if ( ! is_array( $instance ) ) {
				$instance = array();
			}

			// Filter out all empty params
			$instance = array_filter( $instance, function ( $array_value ) {
				return trim( $array_value ) != '';
			} );

			// Default values
			if ( ! isset( $instance['text'] ) ) {
				$instance['text'] = 'Button Text';
			}

			// Generate shortcode params
			foreach ( $instance as $key => $value ) {
				$params .= " $key='$value' ";
			}

			echo '<div class="widget qodef-button-widget">';
			echo do_shortcode( "[qodef_button $params]" ); // XSS OK
			echo '</div>';
		}
	}
}