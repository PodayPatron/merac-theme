<?php
/**
 * Main template file.
 *
 * @package Merac
 */

get_header();

?>

<div id="primary">
	<section class="blog">
		<div class="container">
			<?php if ( is_home() && ! is_front_page() ) : ?>
				<div class="block-title rev-block-title  text-center">
					<div class="main-subtitle promo-main-subtitle">
					</div>
					<h2 class="main-title rev-main-title">
						<?php single_post_title(); ?>
					</h2>
					<p class="main-p promo-main-p">

					</p>
				</div>
			<?php endif; ?>

			<?php if ( have_posts() ) : ?>
				<div class="row margin-b-20">
					<?php
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content' );
					endwhile;
					?>
				</div>
			<?php endif; ?>
		</div>
		<?php merac_pagination(); ?>
	</section>
</div>


<?php
get_footer();
?>
