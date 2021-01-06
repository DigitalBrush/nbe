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

<div class="section">
	<div class="<?php echo esc_attr( $container ); ?>" id="wrapper-static-content" tabindex="-1">
		<div class="row contact-cta">
			<div class="col-md-9">
				<span></span>
				<h1><span>Contactez-nous</span></h1>
				<p><span>Lorem ipsum dolor sit amet</span></p>
			</div>
			<div class="col-md-3 text-right">
				<a class="btn btn-lg btn-primary" href="" target="_blank">Je Prends Contact</a>
			</div>
		</div>
	</div>
</div>
