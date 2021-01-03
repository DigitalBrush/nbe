<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


    <!-- BEGIN PRE-FOOTER -->
    <div class="pre-footer">
      <div class="container">
        <div class="row">
          <!-- BEGIN BOTTOM ABOUT BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>A PROPOS</h2>
            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam sit nonummy nibh euismod tincidunt ut laoreet dolore magna aliquarm erat sit volutpat. Nostrud exerci tation ullamcorper suscipit lobortis nisl aliquip  commodo consequat. </p>
            <p>Duis autem vel eum iriure dolor vulputate velit esse molestie at dolore.</p>
          </div>
          <!-- END BOTTOM ABOUT BLOCK -->
          <!-- BEGIN BOTTOM INFO BLOCK -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>NOS PRODUITS</h2>
           
          </div>
          <!-- END INFO BLOCK -->

          <!-- BEGIN TWITTER BLOCK --> 
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2 class="margin-bottom-0">AIDE</h2>
                
          </div>
          <!-- END TWITTER BLOCK -->

          <!-- BEGIN BOTTOM CONTACTS -->
          <div class="col-md-3 col-sm-6 pre-footer-col">
            <h2>COMPTE CLIENT</h2>
          
          </div>
          <!-- END BOTTOM CONTACTS -->
        </div>
      
      </div>
    </div>
    <!-- END PRE-FOOTER -->




</div><!-- #page we need this extra closing tag here -->

  <script src="<?php echo get_template_directory_uri();?>/assets/plugins/jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/plugins/jquery-migrate.min.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>      
    <script src="<?php echo get_template_directory_uri();?>/assets/corporate/scripts/back-to-top.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->

    <!-- BEGIN PAGE LEVEL JAVASCRIPTS (REQUIRED ONLY FOR CURRENT PAGE) -->
    <script src="<?php echo get_template_directory_uri();?>/assets/plugins/fancybox/source/jquery.fancybox.pack.js" type="text/javascript"></script><!-- pop up -->
    <script src="<?php echo get_template_directory_uri();?>/assets/plugins/owl.carousel/owl.carousel.min.js" type="text/javascript"></script><!-- slider for products -->
    <script src='<?php echo get_template_directory_uri();?>/assets/plugins/zoom/jquery.zoom.min.js' type="text/javascript"></script><!-- product zoom -->
    <script src="<?php echo get_template_directory_uri();?>/assets/plugins/bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script><!-- Quantity -->

    <script src="<?php echo get_template_directory_uri();?>/assets/corporate/scripts/layout.js" type="text/javascript"></script>
    <script src="<?php echo get_template_directory_uri();?>/assets/pages/scripts/bs-carousel.js" type="text/javascript"></script>

<?php wp_footer(); ?>

</body>

</html>

