<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'nbe' ); ?></a>

		<div class="top-nav">
			<div class="container">
				<div class="row">
					<div class="col-10">
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'topmenu',
								'menu_class'      => 'navbar-top',
								'menu_id'         => 'top-menu',
							)
						);
						?>
					</div>
					<div class="col-2">
						<div class="switch-lang">
							<div class="current-lang"><img class="lang-flag" src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_United_Kingdom.png" />
							</div>
							<div class="lang-dropdown">
								<div class="selecting-lang"><img class="lang-flag" src="https://cdn2.iconfinder.com/data/icons/world-flag-icons/128/Flag_of_France.png" />
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-light" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'nbe' ); ?>
			</h2>
			

		<?php if ( 'container' === $container ) : ?>
			<div class="container">
		<?php endif; ?>
				
				<div class="row header-bar">
					<div class="col-sm-2 logo-bar">

							<!-- Your site title as branding in the menu -->
							<?php if ( ! has_custom_logo() ) { ?>

							<?php } else {
							the_custom_logo();
							} ?><!-- end custom logo -->
						
						<button class="navbar-toggler x" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'nbe' ); ?>">
							<span class="navbar-toggler-icon"></span>
						</button>
					</div>
					

						
					<div class="col-sm-5">
						<!-- The WordPress Menu goes here -->
						<?php
						wp_nav_menu(
							array(
								'theme_location'  => 'primary',
								'container_class' => 'collapse navbar-collapse',
								'container_id'    => 'navbarNavDropdown',
								'menu_class'      => 'navbar-nav mr-auto',
								'fallback_cb'     => '',
								'menu_id'         => 'main-menu',
								'depth'           => 2,
								'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
							)
						);
						?>
					</div>
					<div class="col-sm-3">
						<form class="search-form form-inline my-2 my-lg-0">
							<input type="text" id="box" placeholder="Rechercher un produit..." class="search-box">
							<span class="material-icons">search</span>
						</form>
					</div>
					
					<div class="col-sm-2">
						<ul class="user-menu navbar-nav">
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span class="material-icons">person</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span class="material-icons">favorite</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">
									<span class="material-icons">shopping_cart</span>
								</a>
							</li>
						</ul>
					</div>
				</div>
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
