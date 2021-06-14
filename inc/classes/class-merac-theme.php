<?php
/**
 * Bootstraps the Theme.
 *
 * @package Merac
 */

namespace MERAC_THEME\Inc;

use MERAC_THEME\Inc\Traits\Singleton;

class MERAC_THEME {
	use Singleton;

	protected function __construct() {
		Assets::get_instance();
		Menus::get_instance();
		Meta_Boxes::get_instance();
		Sidebars::get_instance();

		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'after_setup_theme', array( $this, 'setup_theme' ) );
	}

	/**
	 * Setup theme.
	 */
	public function setup_theme() {
		add_theme_support( 'title-tag' );
		add_theme_support(
			'custom-logo',
			array(
				'height' => 60,
				'width'  => 120,
			),
		);
		add_theme_support( 'custom-background' );
		add_theme_support( 'post-thumbnails' );
		add_image_size( 'spec_thumb', 350, 193, true );
		add_theme_support( 'customize-selective-refresh-widgets' );
		add_theme_support( 'automatic-feed-links' );
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
			)
		);
		add_editor_style();
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'align-wide' );

		global $content_width;
		if ( ! isset( $content_width ) ) {
			$content_width = 1240;
		}
	}
}
