<?php

if( brunn_select_contact_form_7_installed()) {
    class BrunnCoreElementorContactForm7 extends \Elementor\Widget_Base {
        public function get_name() {
            return 'qodef_cf7';
        }

        public function get_title() {
            return esc_html__( 'Contact Form 7', 'brunn-core' );
        }

        public function get_icon() {
            return 'brunn-elementor-custom-icon brunn-elementor-contact-form-7';
        }

        public function get_categories() {
            return [ 'select' ];
        }

        protected function _register_controls() {
            $this->start_controls_section(
                'general',
                [
                    'label' => esc_html__( 'General', 'brunn-core' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'cf7',
                [
                    'label'       => esc_html__( 'Select Contact Form', 'void' ),
                    'description' => esc_html__( 'You need to install and activate Contact Form 7 plugin', 'brunn-core' ),
                    'type'        => \Elementor\Controls_Manager::SELECT2,
                    'multiple'    => false,
                    'label_block' => 1,
                    'options'     => $this->get_contact_form_7_posts(),
                ]
            );

            $this->add_control(
                'html_class',
                [
                    'label'       => esc_html__( 'Select Contact Form Style', 'void' ),
                    'description' => esc_html__( 'Contact form 7 - plugin must be installed and there must be some contact forms made with the contact form 7', 'void' ),
                    'type'        => \Elementor\Controls_Manager::SELECT,
                    'options'     => [
                        'default'            => esc_html__( 'Default', 'brunn-core' ),
                        'cf7_custom_style_1' => esc_html__( 'Custom Style 1', 'brunn-core' ),
                        'cf7_custom_style_2' => esc_html__( 'Custom Style 2', 'brunn-core' ),
                        'cf7_custom_style_3' => esc_html__( 'Custom Style 3', 'brunn-core' ),
                    ],
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {
            $params = $this->get_settings_for_display();

            echo brunn_core_get_shortcode_module_template_part('templates/contact-form-7', 'contact-form-7', '', $params);
        }

        protected function get_contact_form_7_posts() {
            $args = array(
                'post_type'      => 'wpcf7_contact_form',
                'posts_per_page' => -1
            );

            $category_list = [];

            if ($categories = get_posts($args)) {
                foreach ($categories as $category) {
                    (int)$category_list[$category->ID] = $category->post_title;
                }
            } else {
                (int)$category_list['0'] = esc_html__('No content from Contact Form 7 found', 'void');
            }
            return $category_list;
        }
    }

    \Elementor\Plugin::instance()->widgets_manager->register_widget_type( new BrunnCoreElementorContactForm7() );
}