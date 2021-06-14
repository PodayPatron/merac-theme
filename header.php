<?php
/**
 * Header file.
 *
 * @package Merac
 */

$menu_class     = \MERAC_THEME\Inc\Menus::get_instance();
$header_menu_id = $menu_class->get_menu_id( 'merac-header-menu' );

$header_menus = wp_get_nav_menu_items( $header_menu_id );

?>
<!DOCTYPE html>
<html lang="<?php language_attributes(); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body>
	<?php wp_body_open(); ?>
	<header class="header-general">
		<?php
		get_template_part( 'template-parts/content', 'post' );
		?>
		<!-- HEADER TOP-->
		<div class="header-top header-row bg-red color-scheme-light">
			<div class="container">
				<div class="header-row-inner">
					<div class="header-col header-col-left ">
						<div class="info-box  contact-box">
							<div>Call Now: (+035) 527-1710-70</div>
						</div>
						<div class="info-box  contact-box">
							<div>Email: Contact@merak.com</div>
						</div>
					</div>
					<div class="header-col header-col-right">
						<div class="info-box header-info-box">
							<div class="ample-text">Ample end might folly quiet one set spoke.</div>
						</div>
						<div class="info-box header-info-box box-border">
							<div>USD</div>
							<i class="arrow-down fas fa-chevron-down"></i>
						</div>
						<div class="info-box header-info-box">
							<div class="usa-flag">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/united-states.svg" alt="">
							</div>
							<div>USA</div>
							<i class="arrow-down fas fa-chevron-down"></i>
						</div>	
					</div>

				</div>
			</div>
		</div>
		<!-- HEADER MAIN-->
		<div class="header-main header-row">
			<div class="container">
				<div class="header-row-inner">
					<div class="header-col-left flex-align flex-shrink">

						<div class="main-logo">
							<?php
							if ( function_exists( 'the_custom_logo' ) ) {
								$custom_logo_id = get_theme_mod( 'custom_logo' );
								$logo           = wp_get_attachment_image_src( $custom_logo_id );
							}
							?>
							<a href="#">
								<img src="<?php echo $logo[0]; ?>">
							</a>
						</div>

					</div>
					<div class="header-col-center">

						<form class="header-search flex-align" action="">
							<button class="form-btn center-icon">
								<i class="fal fa-search"></i>
							</button>
							<input placeholder="Search for products" type="text" name="" id="">
							<div class="header-select">
								<span></span>
								<select class="header-select-inner" name="">
									<option value="0">Select Category</option>
									<option value="1">1</option>
									<option value="2">2</option>
								</select>
							</div>
						</form>

					</div>
					<div class="header-col-right flex-align">
						<div class="burger">
							<i class="fas fa-bars"></i>
						</div>

						<div class="info-box sign-box">
							<i class="icons-main-header fal fa-user-alt"></i>
							<div>Login / Register</div>
						</div>
						<div class="info-box sign-box">
							<i class="icons-main-header far fa-heart"></i>
							<div>Wishlist</div>
						</div>
						<div class="info-box sign-box">
							<i class="icons-main-header fal fa-shopping-bag"></i>
							<div>2 <span class="light-color">/ $280.00</span></div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!--HEADER BOTTOM-->
		<div class="header-bottom header-row">
			<div class="container">

				<div class="header-row-inner">
					<div class="header-col header-col-left flex-align">

						<ul class="main-nav-vertical">
							<li class=" bg-red ">
								<a class="inner-link " href="#">
									<span class="main-li-text color-scheme-light"><i class="fas burger-bar fa-bars"></i>Browse Categories</span>
									<i class="fal fa-chevron-down"></i>
								</a>
								<ul class="dropdown">
									<li>
										<a href="#">
											<span class="link-img">
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/category-svg/merak-category-icon-1.svg" alt="">
											</span>
											<span class="header-col">Sweatshirts</span>
											<span class="arrow-right">
												<i class="fas fa-chevron-right"></i>
											</span>
										</a>
									</li>
								</ul>

							</li>
						</ul>

						<?php if ( ! empty( $header_menus ) && is_array( $header_menus ) ) : ?>
							<ul class="main-nav main-nav-vertical">
								<?php foreach ( $header_menus as $menu_item ) : ?>
									<?php if ( ! $menu_item->menu_item_parent ) : ?>
										<?php 
										$child_menu_items = $menu_class->get_child_menu_items( $header_menus, $menu_item->ID ); 
										$has_children = ! empty( $child_menu_items ) && is_array( $child_menu_items );
										?>

										<?php if ( ! $has_children ) : ?>
											<li class="">
												<a href="<?php echo esc_html( $menu_item->url ); ?>">
													<?php echo esc_html( $menu_item->title ); ?>
													<i class="fal fa-chevron-down"></i>
												</a>
											</li>
										<?php else : ?>
											<li class="">
												<a href="<?php echo esc_html( $menu_item->url ); ?>">
													<?php echo esc_html( $menu_item->title ); ?>
													<i class="fal fa-chevron-down"></i>
												</a>
												<ul class="dropdown">

													<?php foreach ( $child_menu_items as $child_menu_item ) : ?>
														<li class="">
															<a href="<?php echo esc_html( $child_menu_item->url ); ?>">
																<span class="header-col">
																	<?php echo esc_html( $child_menu_item->title ); ?>
																</span>
															</a>
														</li>
													<?php endforeach; ?>

												</ul>
											</li>
										<?php endif; ?>
									<?php endif; ?>
								<?php endforeach; ?>
							</ul>
						<?php endif; ?>

					</div>
					<div class="header-col-right">
						<div class="disconds">
							Winter <span class="primary-color">discounts</span> up to 40%
						</div>
					</div>
				</div>
			</div>
		</div>

	</header>
