<?php
namespace BrunnCore\CPT\Shortcodes\Accordion;

use BrunnCore\Lib;

class Accordion implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'qodef_accordion';
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                    => esc_html__( 'Accordion', 'brunn-core' ),
					'base'                    => $this->base,
					'as_parent'               => array( 'only' => 'qodef_accordion_tab' ),
					'content_element'         => true,
					'category'                => esc_html__( 'by BRUNN', 'brunn-core' ),
					'icon'                    => 'icon-wpb-accordion extended-custom-icon',
					'show_settings_on_create' => true,
					'js_view'                 => 'VcColumnView',
					'params'                  => array(
						array(
							'type'        => 'textfield',
							'param_name'  => 'custom_class',
							'heading'     => esc_html__( 'Custom CSS Class', 'brunn-core' ),
							'description' => esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS', 'brunn-core' )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'style',
							'heading'    => esc_html__( 'Style', 'brunn-core' ),
							'value'      => array(
								esc_html__( 'Accordion', 'brunn-core' ) => 'accordion',
								esc_html__( 'Toggle', 'brunn-core' )    => 'toggle'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'layout',
							'heading'    => esc_html__( 'Layout', 'brunn-core' ),
							'value'      => array(
								esc_html__( 'Boxed', 'brunn-core' )  => 'boxed',
								esc_html__( 'Simple', 'brunn-core' ) => 'simple'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'text_style',
							'heading'    => esc_html__( 'Text Style', 'brunn-core' ),
							'value'      => array(
								esc_html__( 'Default', 'brunn-core' ) => '',
								esc_html__( 'Custom Style', 'brunn-core' )    => 'custom'
							)
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'background_skin',
							'heading'    => esc_html__( 'Background Skin', 'brunn-core' ),
							'value'      => array(
								esc_html__( 'Default', 'brunn-core' ) => '',
								esc_html__( 'White', 'brunn-core' )   => 'white'
							),
							'dependency' => array( 'element' => 'layout', 'value' => array( 'boxed' ) )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'custom_class'    => '',
			'title'           => '',
			'style'           => 'accordion',
			'layout'          => 'boxed',
			'text_style'      => '',
			'background_skin' => ''
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['content']        = $content;
		
		$output = brunn_core_get_shortcode_module_template_part( 'templates/accordion-holder-template', 'accordions', '', $params );
		
		return $output;
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
