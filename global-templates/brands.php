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

			

		

<div class="row category-section">         
       
          	<br><br>
            <h1 style="text-align: center;">NOS MARQUES</h1>
            <br><br>
</div>

<div class="row category-section">         
 
              <?php for( $i=1;$i<6;$i++):?>                
              

              <div class="col-md-2">
                
                <img src="<?php echo get_option('brand_img_'.$i);?>" style="height:100px;">
               
              </div>

              <?php endfor; ?>      

          <!-- END SALE PRODUCT -->
        </div>

		</div>

	</div>
