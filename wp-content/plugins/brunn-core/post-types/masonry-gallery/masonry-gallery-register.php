<?php

namespace BrunnCore\CPT\MasonryGallery;

use BrunnCore\Lib;

/**
 * Class MasonryGalleryRegister
 * @package BrunnCore\CPT\MasonryGallery
 */
class MasonryGalleryRegister implements Lib\PostTypeInterface {
	private $base;
	
	public function __construct() {
		$this->base    = 'masonry-gallery';
		$this->taxBase = 'masonry-gallery-category';
	}
	
	/**
	 * @return string
	 */
	public function getBase() {
		return $this->base;
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register() {
		$this->registerPostType();
		$this->registerTax();
	}
	
	/**
	 * Registers custom post type with WordPress
	 */
	private function registerPostType() {
		$menuPosition = 5;
		$menuIcon     = 'dashicons-schedule';
		
		register_post_type( $this->base,
			array(
				'labels'        => array(
					'name'          => esc_html__( 'Brunn Masonry Gallery', 'brunn-core' ),
					'all_items'     => esc_html__( 'Masonry Gallery Items', 'brunn-core' ),
					'singular_name' => esc_html__( 'Masonry Gallery Item', 'brunn-core' ),
					'add_item'      => esc_html__( 'New Masonry Gallery Item', 'brunn-core' ),
					'add_new_item'  => esc_html__( 'Add New Masonry Gallery Item', 'brunn-core' ),
					'edit_item'     => esc_html__( 'Edit Masonry Gallery Item', 'brunn-core' )
				),
				'public'        => false,
				'show_in_menu'  => true,
				'rewrite'       => array( 'slug' => 'masonry-gallery' ),
				'menu_position' => $menuPosition,
				'show_ui'       => true,
				'has_archive'   => false,
				'hierarchical'  => false,
				'supports'      => array( 'title', 'thumbnail' ),
				'menu_icon'     => $menuIcon
			)
		);
	}
	
	/**
	 * Registers custom taxonomy with WordPress
	 */
	private function registerTax() {
		$labels = array(
			'name'              => esc_html__( 'Masonry Gallery Categories', 'brunn-core' ),
			'singular_name'     => esc_html__( 'Masonry Gallery Category', 'brunn-core' ),
			'search_items'      => esc_html__( 'Search Masonry Gallery Categories', 'brunn-core' ),
			'all_items'         => esc_html__( 'All Masonry Gallery Categories', 'brunn-core' ),
			'parent_item'       => esc_html__( 'Parent Masonry Gallery Category', 'brunn-core' ),
			'parent_item_colon' => esc_html__( 'Parent Masonry Gallery Category:', 'brunn-core' ),
			'edit_item'         => esc_html__( 'Edit Masonry Gallery Category', 'brunn-core' ),
			'update_item'       => esc_html__( 'Update Masonry Gallery Category', 'brunn-core' ),
			'add_new_item'      => esc_html__( 'Add New Masonry Gallery Category', 'brunn-core' ),
			'new_item_name'     => esc_html__( 'New Masonry Gallery Category Name', 'brunn-core' ),
			'menu_name'         => esc_html__( 'Masonry Gallery Categories', 'brunn-core' )
		);
		
		register_taxonomy( $this->taxBase, array( $this->base ), array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'query_var'         => true,
			'show_admin_column' => true,
			'rewrite'           => array( 'slug' => 'masonry-gallery-category' )
		) );
	}
}