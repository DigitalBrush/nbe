<?php
/**
 * Hero setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
	?>

	<div class="wrapper" id="wrapper-hero">

		<div class="<?php echo esc_attr( $container ); ?>" id="wrapper-static-content" tabindex="-1">

			<div class="row hero-header">
				<div class="col-sm-6 hero-text">
					<div class="slider-text">
						<p class="subtext">New Business Europ</p>
						<h1>Un large réseau de produits alimentaires et cosmétiques français et international</h1>
						<a class="btn btn-lg btn-primary">Acheter maintenant</a>
					</div>
				</div>
				<div class="col-sm-6 hero-image">
					<div class="slider-image">
						<img src="<?php echo get_template_directory_uri(); ?>/img/header-photo.png" />
					</div>
				</div>
			</div>

			<div class="row section-services">

				<div class="col-md-6 col-lg-3">
					<div class="single-service">
						<div class="service-icon">
							<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/check-circle-solid.svg" />
						</div>
						<div class="service-desc">
							<h3 class="title">Recherche de produit</h3>
							<p class="description">Un large réseau de fournisseurs avec qui nous recherchons les produits requis.</p>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="single-service">
						<div class="service-icon">
							<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/check-circle-solid.svg" />
						</div>
						<div class="service-desc">
							<h3 class="title">Logistique & expédition</h3>
							<p class="description">Disposition de palettes de groupage et mixtes, 3000 palettes dans l'entrepôt.</p>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="single-service">
						<div class="service-icon">
							<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/check-circle-solid.svg" />
						</div>
						<div class="service-desc">
							<h3 class="title">Distribution</h3>
							<p class="description">Nous aidons les multinationales à exporter leurs produits  au Moyen-Orient, en Afrique du Nord et de l'Ouest.</p>
						</div>
					</div>
				</div>

				<div class="col-md-6 col-lg-3">
					<div class="single-service">
						<div class="service-icon">
							<img class="img-fluid" src="<?php echo get_template_directory_uri(); ?>/img/check-circle-solid.svg" />
						</div>
						<div class="service-desc">
							<h3 class="title">Avantages</h3>
							<p class="description">Accès à des offres/promotions spéciales  dans le domaine des cosmétiques et de l'alimentation.</p>
						</div>
					</div>
				</div>

			</div>

			<div class="row category-section">
				<div class="col-sm-4">
					<div class="category category-1">
						<p class="subtext">Category 1</p>
						<h1>Boissons</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor</p>
						<a class="btn btn-lg btn-secondary">Voir les produits</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="category category-2">
						<p class="subtext">Category 2</p>
						<h1>Épicerie</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor</p>
						<a class="btn btn-lg btn-secondary">Voir les produits</a>
					</div>
				</div>
				<div class="col-sm-4">
					<div class="category category-3">
						<p class="subtext">Category 3</p>
						<h1>Hygiène & Beauté</h1>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor</p>
						<a class="btn btn-lg btn-secondary">Voir les produits</a>
					</div>
				</div>
			</div>

		</div>

	</div>
