<?php
/**
 * Content template.
 *
 * @package Merac
 */

$the_post_id   = get_the_ID();
$article_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag' ] );

if ( ! empty( $article_terms ) && ! is_array( $article_terms ) ) {
	return;
}
?>

<div class="col-lg-4">
	<article class="inner-article text-center">
		<div class="art-img">
			<a href="<?php the_permalink(); ?>"></a>
			<div class="img-scale">
				<?php
				the_post_thumbnail( 'spec_thumb' );
				?>
			</div>
		</div>
		<div class="artic-category">
			Category
		</div>
		<div class="artic-text">
			<h5 class="blog-title">
				<a href="<?php the_permalink(); ?>">
					<?php the_title(); ?>
				</a>
			</h5>
			<div class="date">
				<span class="date-text">
					<?php echo get_the_date( 'M j, Y' ); ?>
				</span>
				<span class="date-text">
					<img class="author" src="./img/merak-testimonials-3.jpg" alt="">
					By
				</span>
				<span>
					<?php the_author(); ?>
				</span>
			</div>
			<div>
				<?php esc_html( merac_the_excerpt( 200 ) ); ?>
			</div>
			<div>
				<?php foreach ( $article_terms as $key => $article_term ) : ?>
					<a class="btn"  href="<?php echo esc_url( get_the_excerpt( $article_term ) ); ?>">
						<?php
						echo esc_html( $article_term->name ); 
						?>
					</a>
				<?php endforeach; ?>
			</div>
			<footer class="article-footer">
				<div class="continue">
					<a href="<?php the_permalink(); ?>">
						Continue reading
						<i class="fal fa-arrow-right continue-arrow"></i>
					</a>
				</div>
			</footer>
		</div>
	</article>
</div>

