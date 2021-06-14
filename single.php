<?php
/**
 * Single template.
 *
 * @package Merac
 */
$the_post_id = get_the_ID();
$hide_title  = get_post_meta( $the_post_id, '_hide_page_title', true );

get_header();
?>

<section class="reviews light-background">
	<div class="container">
		<h3>
			<?php ( $hide_title !== 'no' ) ? the_title() : ''; ?>
		</h3>
		<?php 
		the_content();
		?>
	</div>
</section>
