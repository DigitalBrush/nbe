<?php
/**
 * Template Name: Brands page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
do_action( 'woocommerce_before_main_content' );
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
			<header class="woocommerce-products-header">
						<?php if ( apply_filters( 'woocommerce_show_page_title', true ) ) : ?>
							<h1 class="woocommerce-products-header__title page-title"><?php echo $_GET['brand']; ?></h1>
						<?php endif; ?>

						<?php
						/**
						 * Hook: woocommerce_archive_description.
						 *
						 * @hooked woocommerce_taxonomy_archive_description - 10
						 * @hooked woocommerce_product_archive_description - 10
						 */
						do_action( 'woocommerce_archive_description' );
						?>

					</header>
			</div>
			<div class="row">

			<?php get_template_part( 'sidebar-templates/sidebar', 'left' ); ?>

			<div class="col-md-9 content-area" id="primary">

				<main class="site-main" id="main" role="main">

				<?php
				
				do_action( 'woocommerce_before_shop_loop' );

				// The query
					  $args = array(
					    'post_type' => 'product',
					    'tax_query' => array(
					      array(
					        'taxonomy' => 'pa_marque',
					        'field'    => 'name',
					        'terms'    => $_GET['brand']
					      )
					    )
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
               
						
				do_action( 'woocommerce_after_main_content' );
				?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
