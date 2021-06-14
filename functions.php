<?php
/**
 * Theme Functions.
 *
 * @package Merac
 */

if ( ! defined( 'MERAC_DIR_PATH' ) ) {
	define( 'MERAC_DIR_PATH', untrailingslashit( get_template_directory() ) );
}

if ( ! defined( 'MERAC_DIR_URI' ) ) {
	define( 'MERAC_DIR_URI', untrailingslashit( get_template_directory_uri() ) );
}

require_once MERAC_DIR_PATH . '/inc/helpers/autoloader.php';

/**
 * Get instance theme.
 */
function nz_get_instance_theme() {
	\MERAC_THEME\Inc\MERAC_THEME::get_instance();
}

nz_get_instance_theme();

/**
 * Get the excerpt.
 *
 * @param  mixed $trim_character_count
 */
function merac_the_excerpt( $trim_character_count = 0 ) {
	if ( has_excerpt() || 0 === $trim_character_count ) {
		the_excerpt();
		return;
	}

	$excerpt = wp_strip_all_tags( get_the_excerpt() );
	$excerpt = substr( $excerpt, 0, $trim_character_count );
	$excerpt = substr( $excerpt, 0, strrpos( $excerpt, ' ' ) );

	echo $excerpt . '[...]';
}

/**
 * Merac pagination.
 */
function merac_pagination() {

	$allowed_tags = array(
		'span' => array(
			'class' => array(),
		),
		'a'    => array(
			'class' => array(),
			'href'  => array(),
		),
	);

	$args = array(
		'before_page_number' => '<span class="pages pages-num border border-secondary mr-2 mb-2">',
		'after_page_number'  => '</span>',
	);

	printf(
		'<nav class="block-check-pages clearfix">%s</nav>',
		wp_kses( paginate_links( $args ), $allowed_tags )
	);
}
