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


   <div class="row">
        
          <div class="col-md-12">

               <div style="width:48vw;
                           height:60vw;
                           float:right;">
                
                 <img src="<?php echo get_option('who_img_1');?>" style="width:100%;">
              </div> 
  
              <div style="width:48vw;
                          height:36vw;
                          margin-top:-54vw;
                          float:left;
                          background-color:#fff;
                          padding: 20px;
                          z-index:10;">
                    <h1><?php echo get_option('who_header');?></h1>
                    <p><?php echo get_option('who_details');?></p>
                   
                
                 
              </div>       
          </div>
       
        </div>

		</div>

	</div>
