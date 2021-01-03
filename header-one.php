<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="http://gmpg.org/xfn/11">

	  <!-- Global styles START -->          

  <link href="<?php echo get_template_directory_uri();?>/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Global styles END --> 
   
  <!-- Page level plugin styles START -->


  <link href="<?php echo get_template_directory_uri();?>/assets/plugins/owl.carousel/assets/owl.carousel.css" rel="stylesheet">
  <!-- Page level plugin styles END -->

  <!-- Theme styles START -->

  <link href="<?php echo get_template_directory_uri();?>/assets/pages/css/slider.css" rel="stylesheet">

  <link href="<?php echo get_template_directory_uri();?>/assets/corporate/css/style.css" rel="stylesheet">



	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?>>
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

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
           
<div class="main-menu">
     <nav id="site-navigation" class="navbar navbar-default">    
       <!--  <div class="container">   --> 
          
         	<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 2,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
    
 </nav> 
</div>

            
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