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


   <div class="row quote-v1 margin-bottom-30 " style="background:gray;padding:20px;">
          <div class="col-md-9">
            <span>
                <h1>CONTACTESZ-NOUS ?</h1>
            <p>Lorem ipsum dolor sit amet</p>
            </span>
          </div>
          <div class="col-md-3 text-right">
            <a class="btn-transparent" href="" target="_blank">JE PRENDS CONTACT</a>
          </div>
        </div>

		</div>

	</div>
