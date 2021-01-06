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

<h1 class="section-title">Meilleures ventes</h1>
<div class="row product-section">         

 
              <?php
                  // $args = array(
                  //   'posts_per_page' => '4',
                  //   'product_cat' => 'computers',
                  //   'post_type' => 'product',
                  //   'orderby' => 'title',
                  // );

                  $args = array(
                  'post_type' => 'product',
                  'meta_key' => 'total_sales',
                  'orderby' => 'meta_value_num',
                  'posts_per_page' => 4,
                    );


                  $query = new WP_Query( $args );
                  if( $query->have_posts()) : while( $query->have_posts() ) : $query->the_post();
              ?>
                  
          

              <div class="col-md-3 col-6">
              <div class="product">
               <a href="<?php echo esc_url(get_permalink());?>" rel="bookmark">
                <div class="product-item woocommerce">
                  <div class="pi-img-wrapper">
                    <?php if (has_post_thumbnail(get_the_ID() ) ): ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'single-post-thumbnail' ); ?>

                      <img src="<?php echo $image[0]; ?>" class="img-fluid product-img">


                    <?php endif; ?>         
                  </div>
                  <h3 class="entry-title"><?php the_title(); ?></h3>

                  <?php $product = wc_get_product( get_the_ID() ); ?>

                  <div class="pi-price">
                    <?php echo $product->get_price_html(); ?><br>
                  </div>
                  <div class="pi-rating">
                     <?php echo wc_get_rating_html( $product->get_average_rating() );?>
                  </div>
                

                
                </div>
                  </a> 
                  </div>

              </div>
         
                  <?php

                  endwhile;
                  endif;
                  ?>  
        </div>

		</div>

	</div>
