<?php
/**
 * Template Name: Homepage
 *
 * This is the template that displays the landing page
 *
 * 
 */

get_header(); 

?>
  <!-- BEGIN SLIDER -->
     <div class="main">
       <div class="container">
       <div class="page-slider margin-bottom-35">
        <div id="carousel-example-generic" class="carousel slide carousel-slider"> 
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>          
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <!-- First slide -->

              <?php if(get_option('slide_img_1')!=""):?>
                <div class="item carousel-item-four active" style="
    background: url(<?php echo get_option('slide_img_1');?>);
    background-size: cover;
    background-position: center center;">
                    <div class="container">
                        <div class="carousel-position-four text-left col-md-6">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v3 " data-animation="animated fadeInDown"><?php echo get_option('slide_intro_1');?>
                            </h2>
                     <a href="<?php echo esc_url(home_url('shop')); ?>" class="btn btn-primary btn-large">ACHETER MAINTENENT</a>       
                        </div>
                    </div>
                </div> 

              <?php endif ?>
              <?php if(get_option('slide_img_2')!=""):?>

                <div class="item carousel-item-four" style="
    background: url(<?php echo get_option('slide_img_2');?>);
    background-size: cover;
    background-position: center center;">
                    <div class="container">
                        <div class="carousel-position-four text-left col-md-6">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v3 " data-animation="animated fadeInDown"><?php echo get_option('slide_intro_2');?>
                            </h2>
                     <a href="<?php echo esc_url(home_url('shop')); ?>" class="btn btn-primary btn-large">ACHETER MAINTENENT</a>       
                        </div>
                    </div>
                </div> 
             <?php endif ?>
             <?php if(get_option('slide_img_3')!=""):?>
                        <div class="item carousel-item-four" style="
    background: url(<?php echo get_option('slide_img_3');?>);
    background-size: cover;
    background-position: center center;">
                    <div class="container">
                        <div class="carousel-position-four text-left col-md-6">
                            <h2 class="margin-bottom-20 animate-delay carousel-title-v3 " data-animation="animated fadeInDown"><?php echo get_option('slide_intro_3');?>
                            </h2>
                     <a href="<?php echo esc_url(home_url('shop')); ?>" class="btn btn-primary btn-large">ACHETER MAINTENENT</a>       
                        </div>
                    </div>
                </div> 
             <?php endif ?>
              
            </div>

               <!-- Controls -->
            <a class="left carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="prev">
                <i class="fa fa-angle-left" aria-hidden="true"></i>
            </a>
            <a class="right carousel-control carousel-control-shop" href="#carousel-example-generic" role="button" data-slide="next">
                <i class="fa fa-angle-right" aria-hidden="true"></i>
            </a>
           
        </div>
      </div>
    </div>
  </div>
    <!-- END SLIDER -->

  <div class="main">
      <div class="container">
        <!-- BEGIN SERVICE BOX -->   
        <div class="row service-box margin-bottom-40">
          <div class="col-md-3 col-sm-3">
            <div class="service-box-heading">
              <em><i class="fa fa-search red" aria-hidden="true"></i></em>
              <span>Recherche de produit</span>
            </div>
            <p style="padding-left:40px;"><?php echo get_option('intro_1');?></p>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="service-box-heading">
              <em><i class="fa fa-truck red" aria-hidden="true"></i></em>
              <span>Legistique </span>
            </div>
            <p style="padding-left:40px;"><?php echo get_option('intro_2');?></p>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="service-box-heading">
              <em><i class="fa fa-crosshairs red" aria-hidden="true"></i></em>
              <span>Distribution</span>
            </div>
            <p style="padding-left:40px;"><?php echo get_option('intro_3');?></p>
          </div>
           <div class="col-md-3 col-sm-3">
            <div class="service-box-heading">
              <em><i class="fa fa-tag red" aria-hidden="true"></i></em>
              <span>Avantages</span>
            </div>
            <p style="padding-left:40px;"><?php echo get_option('intro_4');?></p>
          </div>
        </div>
        <!-- END SERVICE BOX -->

        <div class="row margin-bottom-40">
          <!-- BEGIN CONTENT -->
          <div class="col-md-12 col-sm-12">
        
            <div class="content-page">
              <div class="row margin-bottom-40">
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
                   foreach ($all_categories as $cat) {
                      if($cat->category_parent == 0) {
                          $category_id = $cat->term_id; ?>    
                        

              <div class="col-md-4">
                  <div class="home-category">                
                                    
                    <div class="category-pane" style="text-align:left;">

                       <p></p>

                        <h1><?php echo $cat->name  ?></h1>
                      <p>
                        <?php echo $cat->description; ?>
                      </p>
                      <a href="<?php echo get_term_link($cat->slug, 'product_cat');?>" class="btn btn-primary btn-category">
                         Voir les Produits <i class="m-icon-swapright m-icon-white"></i>
                      </a>
                    </div>
               <?php
                $thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );    
                $image = wp_get_attachment_url( $thumbnail_id ); 
                ?>
                   <img src="<?php echo $image; ?>" style="width:100%; height:200px">


                  </div>
                </div>

                  <?php

                          
                    }       
                  }
                  ?>

               </div>
            </div>
          </div>
        </div>
      
         <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h1 style="text-align: center;">NOS MARQUES</h1>
            <br><br>
            <div class="owl-carousel owl-carousel5">
              <?php
                  $args = array(
                    'posts_per_page' => '5',
                    'post_cat' => 'our-brands',
                    'post_type' => 'post',
                    'orderby' => 'id',
                  );


                  $query = new WP_Query( $args );
                  if( $query->have_posts()) : while( $query->have_posts() ) : $query->the_post();
              ?>
                  
              

              <div class="col-md-2">
                <div class="product-item">
                  <div class="pi-img-wrapper">
                 <?php if (has_post_thumbnail(get_the_ID() ) ): ?>
                <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'single-post-thumbnail' ); ?>

                <img src="<?php echo $image[0]; ?>" style="height:100px;">


              <?php endif; ?>
                    
                  </div>
              

                
                </div>
              </div>

                  <?php

                  endwhile;
                  endif;
                  ?>      

             
           
           
          
            </div>
          </div>
          <!-- END SALE PRODUCT -->
        </div>
           <div class="row margin-bottom-40">
          <!-- BEGIN SALE PRODUCT -->
          <div class="col-md-12 sale-product">
            <h1 style="text-align: center;">Meilleures ventes</h1>
            <br><br>
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
                  
          

              <div class="col-md-3">
               <a href="<?php echo esc_url(get_permalink());?>" rel="bookmark">
                <div class="product-item woocommerce">
                  <div class="pi-img-wrapper">
                 <?php if (has_post_thumbnail(get_the_ID() ) ): ?>
                  <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID()), 'single-post-thumbnail' ); ?>

                  <img src="<?php echo $image[0]; ?>" class="product-img">


                <?php endif; ?>
                                    
                  </div>
                  <h2 class="entry-title"><?php the_title(); ?></h2>

                  <?php $product = wc_get_product( get_the_ID() ); ?>

                  <div class="pi-price">
                    <?php echo $product->get_price_html(); ?><br>
                    
                     <?php echo wc_get_rating_html( $product->get_average_rating() );?>
                  </div>
                

                
                </div>
                   </a> 

              </div>
         
                  <?php

                  endwhile;
                  endif;
                  ?>      

          </div>
          <!-- END SALE PRODUCT -->
        </div>

        <div class="row margin-bottom-40">
        
          <div class="col-md-12">

               <div style="width:48vw;
                           height:60vw;
                           float:right;">
                
                 <img src="http://154.79.248.116:34/wp-content/uploads/2020/12/dude.png" style="width:100%;">
              </div> 
  
              <div style="width:48vw;
                          height:36vw;
                          margin-top:-54vw;
                          float:left;
                          background-color:#fff;
                          padding: 20px;
                          z-index:10;">
                    <h1>Qui SOMMES-NOUS ?</h1>
                    <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.</p>
                     <p>Lorem ipsum dolor sit amet, dolore eiusmod quis tempor incididunt ut et dolore Ut veniam unde nostrudlaboris. Sed unde omnis iste natus error sit voluptatem.</p>
                
                 
              </div>       
          </div>
       
        </div>

          <!-- BEGIN BLOCKQUOTE BLOCK -->   
        <div class="row quote-v1 margin-bottom-30">
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
        <!-- END BLOCKQUOTE BLOCK -->


      </div>
    </div>
  
<?php get_footer(); ?>