<?php
/**
 * Register Meta boxes.
 *
 * @package Merac
 */

namespace MERAC_THEME\Inc;

use MERAC_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
	use Singleton;

	protected function __construct() {
		$this->setup_hooks();
	}

	/**
	 * Actions.
	 */
	protected function setup_hooks() {
		add_action( 'add_meta_boxes', array( $this, 'add_custom_meta_box' ) );
		add_action( 'save_post', array( $this, 'save_post_meta_data' ) );
	}

	/**
	 * Add custom meta box.
	 */
	public function add_custom_meta_box() {
		$screens = array( 'post' );
		foreach ( $screens as $screen ) {
			add_meta_box(
				'hide-page-title',           // Unique ID
				__( 'Hide page title', 'Merac' ),  // Box title
				array( $this, 'custom_meta_box_html' ),  // Content callback, must be of type callable
				$screen,                   // Post type
				'side' // context
			);
		}
	}

	/**
	 * Custom meta box html.
	 *
	 * @param  mixed $post
	 */
	public function custom_meta_box_html( $post ) {

		$value = get_post_meta( $post->ID, '_hide_page_title', true );

		/**
		 * Use nonce for verification.
		 * This will create a hidden input field with id and name as
		 * 'hide_title_meta_box_nonce_name' and unique nonce input value.
		 */
		wp_nonce_field( plugin_basename( __FILE__ ), 'hide_title_meta_box_nonce_name' );

		?>
		<label for="aquila-field">
			<?php esc_html_e( 'Hide the page title', 'Merac' ); ?>
		</label>
		<select name="aquila_hide_title_field" id="aquila-field" class="postbox">
			<option value="">
				<?php esc_html_e( 'Select', 'merac' ); ?>
			</option>
			<option value="yes" <?php selected( $value, 'yes' ); ?>>
				<?php esc_html_e( 'Yes', 'merac' ); ?>
			</option>
			<option value="no" <?php selected( $value, 'no' ); ?>>
				<?php esc_html_e( 'No', 'merac' ); ?>
			</option>
		</select>
		<?php
	}

	/**
	 * Save post meta data.
	 *
	 * @param  mixed $post_id
	 */
	public function save_post_meta_data( $post_id ) {
		if ( ! current_user_can( 'edit_post', $post_id ) ) {
			return;
		}

		if ( ! isset( $_POST[ 'hide_title_meta_box_nonce_name' ] ) ||
			! wp_verify_nonce( $_POST[ 'hide_title_meta_box_nonce_name' ], plugin_basename( __FILE__ ) )
		) {
			return;
		}

		if ( array_key_exists( 'aquila_hide_title_field', $_POST ) ) {
			update_post_meta(
				$post_id,
				'_hide_page_title',
				$_POST[ 'aquila_hide_title_field' ]
			);
		}
	}
}
