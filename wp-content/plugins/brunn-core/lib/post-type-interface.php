<?php

namespace BrunnCore\Lib;

/**
 * interface PostTypeInterface
 * @package BrunnCore\Lib;
 */
interface PostTypeInterface {
	/**
	 * @return string
	 */
	public function getBase();
	
	/**
	 * Registers custom post type with WordPress
	 */
	public function register();
}