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
	<div class="container-fluid" id="wrapper-static-content" tabindex="-1">
		<div class="row section-who">
			<div class="col-md-6">
        <div class="about-text">
          <h1><?php echo get_option('who_header');?></h1>
          <p><?php echo get_option('who_details');?></p>
        </div>
      </div>
      <div class="col-md-6">
        <div class="about-img">
          <img src="<?php echo get_option('who_img_1');?>" class="img-fluid">
        </div>
      </div>
		</div>
	</div>
</div>
