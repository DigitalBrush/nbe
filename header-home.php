
<!DOCTYPE html>

<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
  <meta charset="utf-8">
  <title><?php echo get_bloginfo( 'name' ); ?></title>

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <meta content="Metronic Shop UI description" name="description">
  <meta content="Metronic Shop UI keywords" name="keywords">
  <meta content="keenthemes" name="author">

  <meta property="og:site_name" content="-CUSTOMER VALUE-">
  <meta property="og:title" content="-CUSTOMER VALUE-">
  <meta property="og:description" content="-CUSTOMER VALUE-">
  <meta property="og:type" content="website">
  <meta property="og:image" content="-CUSTOMER VALUE-"><!-- link to image for socio -->
  <meta property="og:url" content="-CUSTOMER VALUE-">

  <link rel="shortcut icon" href="favicon.ico">
  <?php wp_head(); ?>

  <!-- Fonts START -->
  <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|PT+Sans+Narrow|Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900&amp;subset=all" rel="stylesheet" type="text/css"><!--- fonts for slider on the index page -->  
  <!-- Fonts END -->

  <!-- Global styles START -->          
  <link href="<?php echo get_template_directory_uri();?>/assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->
  <link href="<?php echo get_template_directory_uri();?>/assets/pages/css/animate.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/plugins/fancybox/source/jquery.fancybox.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->
  <link href="<?php echo get_template_directory_uri();?>/assets/pages/css/components.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/pages/css/slider.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/pages/css/style-shop.css" rel="stylesheet" type="text/css">
  <link href="<?php echo get_template_directory_uri();?>/assets/corporate/css/style.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/corporate/css/style-responsive.css" rel="stylesheet">
  <link href="<?php echo get_template_directory_uri();?>/assets/corporate/css/themes/red.css" rel="stylesheet" id="style-color">
  <link href="<?php echo get_template_directory_uri();?>/assets/corporate/css/custom.css" rel="stylesheet">
  <!-- Theme styles END -->

</head>
<!-- Head END -->

<!-- Body BEGIN -->
<body class="ecommerce">
  

    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                <div class="col-md-6 col-sm-6 additional-shop-info">
                    <ul class="list-unstyled list-inline">
                        <li>Notre societe</li>
                        <li>Nos services</li>
                        <li>Help & FAQs</li>                      
                      
                    </ul>
                </div>
            
            </div>
        </div>        
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
      <div class="container">
        <?php
        $custom_logo_id = get_theme_mod( 'custom_logo' );
        $image = wp_get_attachment_image_src( $custom_logo_id , 'full' );
        $logourl=$image[0];

        ?>


        <a class="site-logo" href="<?php echo esc_url(home_url('/')); ?>">


          <img src="<?php echo $logourl; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>" style="height:50px;"></a>



        <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

      

        <!-- BEGIN NAVIGATION -->
        <div class="header-navigation">
          <ul>
            <li>
               <?php do_action('ecom_before_menu'); ?> 
<div class="main-menu">
     <nav id="site-navigation" class="navbar navbar-default">    
       <!--  <div class="container">   --> 
            <div class="navbar-header">
                <?php if (function_exists('max_mega_menu_is_enabled') && max_mega_menu_is_enabled('main_menu')) : ?>
                <?php elseif (has_nav_menu('main_menu')) : ?>
                    <span class="navbar-brand brand-absolute visible-xs"><?php esc_html_e('Menu', 'ecom'); ?></span>
                    <?php if (function_exists('ecom_header_cart') && class_exists('WooCommerce')) { ?>
                        <div class="mobile-cart visible-xs" >
                            <?php ecom_header_cart(); ?>
                        </div>  
                    <?php } ?>
                    <?php if (function_exists('ecom_my_account') && class_exists('WooCommerce')) { ?>
                        <div class="mobile-account visible-xs" >
                            <?php ecom_my_account(); ?>
                        </div>
                    <?php } ?>
                    <a href="#" id="main-menu-panel" class="open-panel" data-panel="main-menu-panel">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                <?php endif; ?>
            </div>
            <?php
            $menu_pos = get_theme_mod('main_menu_float', 'left');
            wp_nav_menu(array(
                'theme_location' => 'main_menu',
                'depth' => 5,
                'container_id' => 'main_menu',
                'container' => 'div',
                'container_class' => 'menu-container',
                'menu_class' => 'nav navbar-nav navbar-' . $menu_pos,
                'fallback_cb' => 'Envo_Storefront_WP_Bootstrap_Navwalker::fallback',
                'walker' => new Envo_Storefront_WP_Bootstrap_Navwalker(),
            ));
            ?>
     <!--    </div> -->
        <?php do_action('ecom_menu'); ?>
 </nav> 
</div>
<?php do_action('ecom_after_menu'); ?> 
            
            </li>

            <!-- BEGIN TOP SEARCH -->
            <li class="menu-search">

              <!--       <div class="form-group form-md-line-input has-success form-md-floating-label">
                                                    <div class="input-icon right">
                                                        <input type="text" class="form-control">
                                                        <label for="form_control_1">Regular input</label>
                                                        <span class="help-block">Some help goes here...</span>
                                                        <i class="icon-user"></i>
                                                    </div>
                                                </div> -->


              
            </li>
            <!-- END TOP SEARCH -->
          </ul>
        </div>
        <!-- END NAVIGATION -->
        <div class="col-md-3 col-sm-3 search-nav" >
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">

             <div class="col-md-10">
                <input class="header-search-input" name="s" type="text"/>
                </div>   
              <div class="col-md-2">              
                <button class="header-search-button" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button></div>

            </form>
        </div>
        
          <!-- BEGIN CART -->
        <div class="woo-icons col-md-2 col-sm-2">
       
         <a href="<?php echo esc_url(home_url('/my-account')); ?>"> <i class="fa fa-user wooicon" aria-hidden="true"></i></a>
          <i class="fa fa-heart wooicon" aria-hidden="true"></i>
         <a href="<?php echo esc_url(home_url('/cart')); ?>"> <i class="fa fa-shopping-cart wooicon" aria-hidden="true"></i></a>                        
                  
        </div>
        <!--END CART -->

          
      </div>
    </div>
    <!-- Header END -->