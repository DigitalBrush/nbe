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

		<div class="<?php echo esc_attr( $container ); ?>" id="wrapper-static-content" tabindex="-1">

			<div class="row hero-header">
				<div class="col-sm-6 hero-text">
					<div class="slider-text">
						<p class="subtext">New Business Europ</p>
						<h1><?php echo get_option('slide_intro_1');?></h1>
						<a href="<?php echo esc_url(home_url('shop')); ?>" class="btn btn-lg btn-primary">Acheter maintenant</a>
					</div>
				</div>
				<div class="col-sm-6 hero-image">
					<div class="slider-image">
						<img src="<?php echo get_option('slide_img_1');?>" style="width:100%"/>
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
							<p class="description"><?php echo get_option('intro_1');?></p>
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
							<p class="description"><?php echo get_option('intro_2');?></p>
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
							<p class="description"><?php echo get_option('intro_3');?>.</p>
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
							<p class="description"><?php echo get_option('intro_4');?></p>
						</div>
					</div>
				</div>

			</div>

			<div class="row category-section">

				  <?php

                    $taxonomy     = 'product_cat';
                    $orderby      = 'name';  
                    $show_count   = 0;      // 1 for yes, 0 for no
                    $pad_counts   = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no  
                    $title        = '';  
                    $empty        = 1;

                    $args = array(
                           'taxonomy'     => $taxonomy,
                           'orderby'      => $orderby,
                           'show_count'   => $show_count,
                           'pad_counts'   => $pad_counts,
                           'hierarchical' => $hierarchical,
                           'title_li'     => $title,
                           'hide_empty'   => $empty
                    );
                   $all_categories = get_categories( $args );
                   $num=1;
                   foreach ($all_categories as $cat) {
                      if($cat->category_parent == 0) {
                          $category_id = $cat->term_id; ?>  


				<div class="col-sm-4">
					<div class="category">
						<div class="category-inner">
							<p class="subtext">Category <?php echo $num;?></p>
							<h2><?php echo $cat->name  ?></h2>
							<p><?php echo $cat->description; ?></p>
							<a href="<?php echo get_term_link($cat->slug, 'product_cat');?>" class="btn btn-lg btn-secondary">Voir les produits</a>
						</div>
						<div class="category-image">
						<?php
							$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );    
							$image = wp_get_attachment_url( $thumbnail_id ); 
						?>
						<img src="<?php echo $image; ?>" style="width:100%; height:200px">
					  </div>
				  	</div>
                </div>
                  <?php

                          
                    }       
                  }
                  ?>

			</div>

	</div>
