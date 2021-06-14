<?php
/**
 * Footer file.
 *
 * @package Merac
 */
?>
	<footer class="footer-general">
		<div class="container">

			<div class="row ">

				<div class="col-lg-4">
					<div class="footer-logo">
						<a href="#"><img src="<?php echo get_template_directory_uri() ?>/assets/img/merak-logo.svg" alt=""></a>
					</div>
					<div class="foot-col-about">
						Merak Fashion - Brand clothing and 
						accessories store for women
					</div>
					<div class="payments">
						<img src="<?php echo get_template_directory_uri() ?>/assets/img/payment-metods.png" alt="" srcset="">
					</div>
				</div>

				<div class="col-lg-2">
					<ul class=" vertical-menu-foot">
						<li><a href="#">About</a></li>
						<li><a href="#">Blog</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">FAQs</a></li>
					</ul>
				</div>

				<div class="col-lg-2">
					<ul class="vertical-menu-foot">
						<li><a href="#">Privacy Policy</a></li>
						<li><a href="#">Returns</a></li>
						<li><a href="#">Order tracking</a></li>
						<li><a href="#">Conditions</a></li>
						<li><a href="#">Support</a></li>
					</ul>
				</div>

				<div class="col-lg-4">
					<h4 class="phone">
						+453 211 41 38
					</h4>
					<p class="adress">
						Kongens Nytorv 13, 1095,
						København, Denmark
					</p>
					<div class="socials">
						<i class="fas fa-envelope"></i>
						<i class="fab fa-facebook-f"></i>
						<i class="fab fa-twitter"></i>
						<i class="fab fa-instagram"></i>
						<i class="fab fa-telegram"></i>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="to-top">
		<div class="arrow-top">
			<i class="far fa-arrow-up"></i>
		</div>
		<div class="to-top-text">
			To top
		</div>
	</div>

	<?php wp_footer(); ?>
</body>
</html>