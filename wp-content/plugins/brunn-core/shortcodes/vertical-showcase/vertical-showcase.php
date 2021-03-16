<?php
namespace BrunnCore\CPT\Shortcodes\VerticalShowcase;

use BrunnCore\Lib;

class VerticalShowcase implements Lib\ShortcodeInterface {
	private $base;
	
	public function __construct() {
		$this->base = 'qodef_vertical_showcase';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );

	}

	protected function setParams() {
		$cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );
		
		$contact_forms = array();
		if ( $cf7 ) {
			foreach ( $cf7 as $cform ) {
				$contact_forms[ $cform->ID ] = $cform->post_title;
			}
		} else {
			$contact_forms[0] = esc_html__( 'No contact forms found', 'brunn' );
		}

		$formatted_cf_array = array();
		
		if ( is_array( $contact_forms ) && count( $contact_forms ) ) {
			foreach ( $contact_forms as $key=>$value ) {
				$formatted_cf_array[ $value ] = $key;
			}
		}


		return $formatted_cf_array;


	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'     => esc_html__( 'Vertical Showcase', 'brunn-core' ),
					'base'     => $this->getBase(),
					'category' => esc_html__( 'by BRUNN', 'brunn-core' ),
					'icon'     => 'icon-wpb-vertical-showcase extended-custom-icon',
					'params'   => array(
						array(
							'type'       => 'param_group',
							'param_name' => 'link_items',
							'heading'    => esc_html__( 'Link Items', 'brunn-core' ),
							'params'     => array(
								array(
									'type'       => 'textfield',
									'param_name' => 'slide_text',
									'heading'    => esc_html__( 'Text above number', 'brunn-core' ),
								),
								array(
									'type'       => 'textfield',
									'param_name' => 'title',
									'heading'    => esc_html__( 'Slide Title', 'brunn-core' ),
								),
								array(
									'type'       => 'textfield',
									'param_name' => 'subtitle',
									'heading'    => esc_html__( 'Slide Subtitle', 'brunn-core' ),
								),
								array(
									'type'        => 'attach_image',
									'param_name'  => 'image',
									'heading'     => esc_html__( 'Image', 'brunn-core' ),
									'description' => esc_html__( 'Select image from media library', 'brunn-core' )
								)
							)
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'contact_form_title',
							'heading'    => esc_html__( 'Contact Form Title', 'brunn-core' ),
							'group'     => esc_html__( 'Last Slide', 'brunn-core' )
						),
						array(
							'type'       => 'textfield',
							'param_name' => 'contact_form_subtitle',
							'heading'    => esc_html__( 'Contact Form Subtitle', 'brunn-core' ),
							'group'     => esc_html__( 'Last Slide', 'brunn-core' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'contact_form',
							'heading'     => esc_html__( 'Select Contact Form 7', 'brunn' ),
							'value'       => $this->setParams(),
							'save_always' => true,
							'group'     => esc_html__( 'Last Slide', 'brunn-core' )
						),
						array(
                            'type'        => 'dropdown',
                            'param_name'  => 'widget_area',
                            'heading'     => esc_html__( 'Widget Area', 'brunn-core' ),
                            'value'       => array_merge(
                                array(
                                    '' => ''
                                ),
                                array_flip(brunn_select_get_custom_sidebars())
                            ),
                            'description' => esc_html__( 'Choose a widget area to be rendered at the bottom of the shortcode.', 'brunn-core' ),
                            'group'     => esc_html__( 'Last Slide', 'brunn-core' )
                        ),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_phone_frame',
							'heading'     => esc_html__( 'Enable Phone Frame', 'brunn-core' ),
							'value'       => array_flip( brunn_select_get_yes_no_select_array( false, true ) ),
							'save_always' => true,
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_app_store_link',
							'heading'     => esc_html__( 'Enable App Store Link', 'brunn-core' ),
							'value'       => array_flip( brunn_select_get_yes_no_select_array( false ) ),
							'save_always' => true,
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'app_store_link',
							'heading'     => esc_html__( 'Link Address', 'brunn-core' ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'enable_app_store_link', 'value' => array( 'yes' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'enable_play_store_link',
							'heading'     => esc_html__( 'Enable Google Play Store Link', 'brunn-core' ),
							'value'       => array_flip( brunn_select_get_yes_no_select_array( false ) ),
							'save_always' => true,
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'play_store_link',
							'heading'     => esc_html__( 'Link Address', 'brunn-core' ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'enable_play_store_link', 'value' => array( 'yes' ) )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$args   = array(
			'link_items'       		 => '',
			'contact_form'		     => '',
			'contact_form_title'	 => '',
			'contact_form_subtitle'	 => '',
			'widget_area'			 => '',
			'enable_phone_frame'	 => 'yes',
			'enable_app_store_link'  => 'no',
			'app_store_link' 		 => '#',
			'enable_play_store_link' => 'no',
			'play_store_link'		 => '#'
		);
		$params = shortcode_atts( $args, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params, $args );
		$params['link_items']          = json_decode( urldecode( $params['link_items'] ), true );
		
		$html = brunn_core_get_shortcode_module_template_part( 'templates/vertical-showcase', 'vertical-showcase', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params, $args ) {
		$holderClasses = array();

		$holderClasses[] = $params['enable_phone_frame'] == "no" ? 'qodef-vs-no-frame' : '';
		
		return implode( ' ', $holderClasses );
	}

}