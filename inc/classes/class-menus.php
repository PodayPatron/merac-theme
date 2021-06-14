<?php
/**
 * Register menus.
 *
 * @package Merac
 */

namespace MERAC_THEME\Inc;

use MERAC_THEME\Inc\Traits\Singleton;

class Menus {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'init', array( $this, 'register_menus' ) );
	}

	/**
	 * Register menus.
	 */
	public function register_menus() {
		register_nav_menus(
			array(
				'merac-header-menu' => esc_html__( 'Header Menu', 'Merac' ),
				'merac-footer-menu' => esc_html__( 'Footer Menu', 'Merac' ),
			)
		);
	}

	/**
	 * Get menu id.
	 *
	 * @param  mixed $location
	 */
	public function get_menu_id( $location ) {
		$locations = get_nav_menu_locations();

		$menu_id = $locations[ $location ];

		return ! empty( $menu_id ) ? $menu_id : '';
	}

	/**
	 * Get child menu items.
	 */
	public function get_child_menu_items( $menu_array, $parent_id ) {
		$child_menus = [];

		if ( ! empty( $menu_array ) && is_array( $menu_array ) ) {
			foreach ( $menu_array as $menu ) {
				if ( intval( $menu->menu_item_parent ) === $parent_id ) {
					array_push( $child_menus, $menu );
				}
			}
		}

		return $child_menus;
	}
}
