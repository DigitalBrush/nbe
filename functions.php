<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// UnderStrap's includes directory.
$understrap_inc_dir = get_template_directory() . '/inc';

// Array of files to include.
$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
);

// Load WooCommerce functions if WooCommerce is activated.
if ( class_exists( 'WooCommerce' ) ) {
	$understrap_includes[] = '/woocommerce.php';
}

// Load Jetpack compatibility file if Jetpack is activiated.
if ( class_exists( 'Jetpack' ) ) {
	$understrap_includes[] = '/jetpack.php';
}

// Include files.
foreach ( $understrap_includes as $file ) {
	require_once $understrap_inc_dir . $file;
}

function wpb_custom_new_menu() {
	register_nav_menu('topmenu',__( 'Top Menu' ));
  }
  add_action( 'init', 'wpb_custom_new_menu' );

function add_menuclass($ulclass) {
return preg_replace('/<a/', '<a class="nav-link"', $ulclass, -1);
}
add_filter('wp_nav_menu','add_menuclass');


// Woocommerce rating stars always
    add_filter('woocommerce_product_get_rating_html', 'your_get_rating_html', 10, 2);

    function your_get_rating_html($rating_html, $rating) {
    if ( $rating > 0 ) {
        $title = sprintf( __( 'Rated %s out of 5', 'woocommerce' ), $rating );
    } else {
        $title = 'Not yet rated';
        $rating = 0;
    }

    $rating_html  = '<div class="star-rating" title="' . $title . '">';
    $rating_html .= '<span style="width:' . ( ( $rating / 5 ) * 100 ) . '%"><strong class="rating">' . $rating . '</strong> ' . __( 'out of 5', 'woocommerce' ) . '</span>';
    $rating_html .= '</div>';
    return $rating_html;
    }


 // add_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

  add_action( 'woocommerce_after_single_product_summary', 'related_products', 9 );
function related_products(){
    remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
    //add_action('um_post_registration_approved_hook', 'um_post_registration_approved_hook_new', 10, 2);

}



  add_action( 'um_post_registration_approved_hook', 'remove_my_action', 9 );
function remove_my_action(){
    remove_action('um_post_registration_approved_hook', 'um_post_registration_approved_hook', 10, 2);
    add_action('um_post_registration_approved_hook', 'um_post_registration_approved_hook_new', 10, 2);

}

create_page("Brand"," ","page-templates/brands.php");
function create_page($page_name,$content,$template){
     if(get_page_by_title($page_name)==NULL|| get_post_status( get_page_by_title($page_name) )=="trash") {

         $my_post = array(
          'post_title'    => $page_name,
          'post_content'  =>$content,         
          'post_status'   => 'publish',      
          'post_type'     =>'page',
          'comment_status' =>'closed',
          'page_template'  =>$template        
        );
        $post_id = wp_insert_post( $my_post);
        
        
    }
      
        
 }

 add_shortcode ('woo_cart_but', 'woo_cart_but' );
/**
 * Create Shortcode for WooCommerce Cart Menu Item
 */
function woo_cart_but() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count; // Set variable for cart item count
        $cart_url = wc_get_cart_url();  // Set Cart URL
  
        ?>
        <li class="nav-item"><a class="nav-link cart-contents" href="<?php echo $cart_url; ?>" title="My Basket">
        <img class="shop-icon" src="<?php echo get_template_directory_uri(); ?>/img/iconCart.svg" />
	    <?php
        if ( $cart_count > 0 ) {
       ?>
            <span class="cart-contents-count"><?php echo $cart_count; ?></span>
        <?php
        }
        ?>
        </a></li>
        <?php
	        
    return ob_get_clean();
 
}

 add_filter( 'woocommerce_add_to_cart_fragments', 'woo_cart_but_count' );
 /**
  * Add AJAX Shortcode when cart contents update
  */
 function woo_cart_but_count( $fragments ) {
  
     ob_start();
     
     $cart_count = WC()->cart->cart_contents_count;
     $cart_url = wc_get_cart_url();
     
     ?>
     <a class="cart-contents nav-link" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart' ); ?>">
     <img class="shop-icon" src="<?php echo get_template_directory_uri(); ?>/img/iconCart.svg" />
     <?php
     if ( $cart_count > 0 ) {
         ?>
         <span class="cart-contents-count"><?php echo $cart_count; ?></span>
         <?php            
     }
         ?></a>
     <?php
  
     $fragments['a.cart-contents'] = ob_get_clean();
      
     return $fragments;
 }
 
function addPriceSuffixAction() {
	add_action('woocommerce_price_format', 'addPriceSuffix', 1, 2);
}
 
add_action('woocommerce_before_cart', 'addPriceSuffixAction');
add_action('woocommerce_review_order_before_order_total', 'addPriceSuffixAction');

add_action('admin_menu', 'customize_homepage');

function customize_homepage() { 
    add_menu_page( '','Homepage', '','landing', '','dashicons-welcome-widgets-menus', 90);  
    add_submenu_page('landing','Slider', 'Slider','manage_options','setup_slider','setup_slider');
    add_submenu_page('landing','Services', 'Services','manage_options','services','services');
    add_submenu_page('landing','Brands', 'Brands','manage_options','brands','brands');
    add_submenu_page('landing','Who we are', 'Who we are','manage_options','who_we_are','who_we_are');
}

function setup_slider(){
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
    fieldset {
     
      padding:10px !important;
      border:1px solid #E8E7E6  !important;
    }

    legend { 
     
      font-size:16px !important;
      text-transform:uppercase;
      text-align: center;
    }

   .postbox{

    margin:50px;
    padding:50px;
    padding-bottom:20px;

   } 

</style>


            
<div class="postbox">
<div class="form-body row">

 <form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ) ?>" method="post" enctype="multipart/form-data">
        
<div class="col-md-4 ">
    <fieldset>
        <legend>Slide 1</legend>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('slide_img_1')!="")
        echo "<img src='". get_option('slide_img_1')."' style='margin:auto; width:100%'/>";
        ?>
            
        <input type="file" name="slide_img_1" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
         <div class="form-group form-md-line-input">
        <label class=" control-label">Intro Text</label>
       
        <textarea name="slide_intro_1" class="form-control" autocomplete="off">
        <?php echo get_option('slide_intro_1');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>

 

</div>

<div class="col-md-4 ">
    <fieldset>
        <legend>Slide 2</legend>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('slide_img_2')!="")
        echo "<img src='". get_option('slide_img_2')."' style='margin:auto; width:100%'/>";
        ?>
            
        <input type="file" name="slide_img_2" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
         <div class="form-group form-md-line-input">
        <label class=" control-label">Intro Text</label>
       
        <textarea name="slide_intro_2" class="form-control" autocomplete="off">
        <?php echo get_option('slide_intro_2');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>

</div>



<div class="col-md-4 ">
    <fieldset>
        <legend>Slide 3</legend>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('slide_img_3')!="")
        echo "<img src='". get_option('slide_img_3')."' style='margin:auto;width:100%'/>";
        ?>
            
        <input type="file" name="slide_img_3" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
         <div class="form-group form-md-line-input">
        <label class=" control-label">Intro Text</label>
       
        <textarea name="slide_intro_3" class="form-control" autocomplete="off">
        <?php echo get_option('slide_intro_3');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>
</div>



        </div>
        <hr>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="slider_btn">Submit</button>
        </div>

</form>

</div>


<?php


    if(isset($_REQUEST["slider_btn"]))
    {
    
        $slide_intro_1 = $_REQUEST["slide_intro_1"];
        $slide_intro_2 = $_REQUEST["slide_intro_2"];
        $slide_intro_3 = $_REQUEST["slide_intro_3"];
        

        add_option('slide_intro_1',$slide_intro_1,'','yes');
        update_option('slide_intro_1',$slide_intro_1);

        add_option('slide_intro_2',$slide_intro_2,'','yes');
        update_option('slide_intro_2',$slide_intro_2);

        add_option('slide_intro_3',$slide_intro_3,'','yes');
        update_option('slide_intro_3',$slide_intro_3);

               
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php'); 
       
           if ($_FILES) {

               $i=1;
              
                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error']==0) {  
                        $attach_id = media_handle_upload( $file, "" );
                        $image_url_array=wp_get_attachment_image_src($attach_id,'full');
                        $image_url = $image_url_array[0];
                         
                        add_option('slide_img_'.$i,$image_url,'','yes');
                        update_option('slide_img_'.$i,$image_url);
                    }
                 
                   $i++;
                }            

            }

    }


}



function services(){
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
    fieldset {
     
      padding:10px !important;
      border:1px solid #E8E7E6  !important;
    }

    legend { 
     
      font-size:16px !important;
      text-transform:uppercase;
      text-align: center;
    }

   .postbox{

    margin:50px;
    padding:50px;
    padding-bottom:20px;

   } 

</style>


<div class="postbox">
<div class="form-body row">

 <form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ) ?>" method="post" enctype="multipart/form-data">
        
<div class="col-md-3">
    <fieldset>
        <legend>Recherche de produi</legend>
          
         <div class="form-group form-md-line-input">    
       
        <textarea name="intro_1" class="form-control" rows="5" autocomplete="off">
        <?php echo get_option('intro_1');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>

 

</div>

<div class="col-md-3">
    <fieldset>
        <legend>Legistique</legend>
          
         <div class="form-group form-md-line-input">
       
        <textarea name="intro_2" class="form-control" rows="5" autocomplete="off">
        <?php echo get_option('intro_2');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>

</div>



<div class="col-md-3">
    <fieldset>
        <legend>Distribution</legend>
          
         <div class="form-group form-md-line-input">
       
        <textarea name="intro_3" class="form-control" rows="5" autocomplete="off">
        <?php echo get_option('intro_3');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>
</div>

<div class="col-md-3">
    <fieldset>
        <legend>Avantages</legend>
          
         <div class="form-group form-md-line-input">
       
        <textarea name="intro_4" class="form-control" rows="5" autocomplete="off">
        <?php echo get_option('intro_4');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>
</div>




        </div>
        <hr>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="intro_btn">Submit</button>
        </div>

</form>

</div>

<?php

    if(isset($_REQUEST["intro_btn"]))
    {

        $intro_1 = $_REQUEST["intro_1"];
        $intro_2 = $_REQUEST["intro_2"];
        $intro_3 = $_REQUEST["intro_3"];
        $intro_4 = $_REQUEST["intro_4"];
        

        add_option('intro_1',$intro_1,'','yes');
        update_option('intro_1',$intro_1);

        add_option('intro_2',$intro_2,'','yes');
        update_option('intro_2',$intro_2);

        add_option('intro_3',$intro_3,'','yes');
        update_option('intro_3',$intro_3);

        add_option('intro_4',$intro_4,'','yes');
        update_option('intro_4',$intro_4);

    }

}

function brands(){
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
    fieldset {
     
      padding:10px !important;
      border:1px solid #E8E7E6  !important;
    }

    legend { 
     
      font-size:16px !important;
      text-transform:uppercase;
      text-align: center;
    }

   .postbox{

    margin:50px;
    padding:50px;
    padding-bottom:20px;

   } 

</style>


            
<div class="postbox">
<div class="form-body row">

 <form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ) ?>" method="post" enctype="multipart/form-data">
        
<div class="col-md-4 ">
    <fieldset>
        <legend>Brand 1</legend>
          <div class="form-group form-md-line-input">
        <label class=" control-label">Brand Name</label>

        <input type="text" name="brand_header1" value="<?php echo get_option('brand_header1');?>" class="form-control" autocomplete="off">
       
            <div class="form-control-focus"> </div>
     
         </div>

        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('brand_img_1')!="")
        echo "<img src='". get_option('brand_img_1')."' style='margin:auto; width:100%'/>";
        ?>
            
        <input type="file" name="brand_img_1" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
       

    </fieldset>

 

</div>

<div class="col-md-4 ">
    <fieldset>
        <legend>Brand 2</legend>
           <div class="form-group form-md-line-input">
        <label class=" control-label">Brand Name</label>

        <input type="text" name="brand_header2" value="<?php echo get_option('brand_header2');?>" class="form-control" autocomplete="off">
       
            <div class="form-control-focus"> </div>
     
         </div>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('brand_img_2')!="")
        echo "<img src='". get_option('brand_img_2')."' style='margin:auto; width:100%'/>";
        ?>
            
        <input type="file" name="brand_img_2" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
    

    </fieldset>

</div>



<div class="col-md-4 ">
    <fieldset>
        <legend>Brand 3</legend>
           <div class="form-group form-md-line-input">
        <label class=" control-label">Brand Name</label>

        <input type="text" name="brand_header3" value="<?php echo get_option('brand_header3');?>" class="form-control" autocomplete="off">
       
            <div class="form-control-focus"> </div>
     
         </div>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('brand_img_3')!="")
        echo "<img src='". get_option('brand_img_3')."' style='margin:auto;width:100%'/>";
        ?>
            
        <input type="file" name="brand_img_3" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
       

    </fieldset>
</div>

<div class="col-md-4 ">
    <fieldset>
        <legend>Brand 4</legend>
           <div class="form-group form-md-line-input">
        <label class=" control-label">Brand Name</label>

        <input type="text" name="brand_header4" value="<?php echo get_option('brand_header4');?>" class="form-control" autocomplete="off">
       
            <div class="form-control-focus"> </div>
     
         </div>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('brand_img_4')!="")
        echo "<img src='". get_option('brand_img_4')."' style='margin:auto;width:100%'/>";
        ?>
            
        <input type="file" name="brand_img_4" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
       

    </fieldset>
</div>

<div class="col-md-4 ">
    <fieldset>
        <legend>Brand 5</legend>
           <div class="form-group form-md-line-input">
        <label class=" control-label">Brand Name</label>

        <input type="text" name="brand_header5" value="<?php echo get_option('brand_header5');?>" class="form-control" autocomplete="off">
       
            <div class="form-control-focus"> </div>
     
         </div>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('brand_img_5')!="")
        echo "<img src='". get_option('brand_img_5')."' style='margin:auto;width:100%'/>";
        ?>
            
        <input type="file" name="brand_img_5" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
       

    </fieldset>
</div>



        </div>
        <hr>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="brand_btn">Submit</button>
        </div>

</form>

</div>


<?php


    if(isset($_REQUEST["brand_btn"]))
    {               
        $brand_header1 = $_REQUEST["brand_header1"];
        $brand_header2 = $_REQUEST["brand_header2"];
        $brand_header3 = $_REQUEST["brand_header3"];
        $brand_header4 = $_REQUEST["brand_header4"];
        $brand_header5 = $_REQUEST["brand_header5"];
       
        

        add_option('brand_header1',$brand_header1,'','yes');
        update_option('brand_header1',$brand_header1);

        add_option('brand_header2',$brand_header2,'','yes');
        update_option('brand_header2',$brand_header2);

        add_option('brand_header3',$brand_header3,'','yes');
        update_option('brand_header3',$brand_header3);

        add_option('brand_header4',$brand_header4,'','yes');
        update_option('brand_header4',$brand_header4);

        add_option('brand_header5',$brand_header5,'','yes');
        update_option('brand_header5',$brand_header5);

      


        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php'); 
       
           if ($_FILES) {

               $i=1;
              
                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error']==0) {  
                        $attach_id = media_handle_upload( $file, "" );
                        $image_url_array=wp_get_attachment_image_src($attach_id,'full');
                        $image_url = $image_url_array[0];
                         
                        add_option('brand_img_'.$i,$image_url,'','yes');
                        update_option('brand_img_'.$i,$image_url);
                    }
                 
                   $i++;
                }            

            }

    }


}
function who_we_are(){
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
    fieldset {
     
      padding:10px !important;
      border:1px solid #E8E7E6  !important;
    }

    legend { 
     
      font-size:16px !important;
      text-transform:uppercase;
      text-align: center;
    }

   .postbox{

    margin:50px;
    padding:50px;
    padding-bottom:20px;

   } 

</style>


            
<div class="postbox">
<div class="form-body row">

 <form action="<?php echo esc_url( $_SERVER['REQUEST_URI'] ) ?>" method="post" enctype="multipart/form-data">
        
<div class="col-md-4 ">
    <fieldset>
        <legend>Image</legend>
        <div class="form-group form-md-line-input">
            <label class="control-label">Image</label>
        <?php
        if(get_option('who_img_1')!="")
        echo "<img src='". get_option('who_img_1')."' style='margin:auto; width:100%'/>";
        ?>
            
        <input type="file" name="who_img_1" value="" class="form-control" autocomplete="off">
        <div class="form-control-focus"> </div>
          
        </div>      
        

    </fieldset>

 

</div>

<div class="col-md-4 ">
    <fieldset>
        <legend>Header</legend>
           
         <div class="form-group form-md-line-input">
        <label class=" control-label">Header</label>

        <input type="text" name="who_header" value="<?php echo get_option('who_header');?>" class="form-control" autocomplete="off">
       
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>

</div>



<div class="col-md-4 ">
    <fieldset>
        <legend>Details</legend>
            
         <div class="form-group form-md-line-input">
        <label class=" control-label">Details</label>
       
        <textarea name="who_details" class="form-control" autocomplete="off">
        <?php echo get_option('who_details');?>
         </textarea> 
            <div class="form-control-focus"> </div>
     
         </div>

    </fieldset>
</div>



        </div>
        <hr>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary" name="who_btn">Submit</button>
        </div>

</form>

</div>


<?php


    if(isset($_REQUEST["who_btn"]))
    {
    
        $who_header = $_REQUEST["who_header"];
        $who_details = $_REQUEST["who_details"];
        

        add_option('who_header',$who_header,'','yes');
        update_option('who_header',$who_header);

        add_option('who_details',$who_details,'','yes');
        update_option('who_details',$who_details);
               
        require_once(ABSPATH . "wp-admin" . '/includes/image.php');
        require_once(ABSPATH . "wp-admin" . '/includes/file.php');
        require_once(ABSPATH . "wp-admin" . '/includes/media.php'); 
       
           if ($_FILES) {

               $i=1;
              
                foreach ($_FILES as $file => $array) {
                    if ($_FILES[$file]['error']==0) {  
                        $attach_id = media_handle_upload( $file, "" );
                        $image_url_array=wp_get_attachment_image_src($attach_id,'full');
                        $image_url = $image_url_array[0];
                         
                        add_option('who_img_'.$i,$image_url,'','yes');
                        update_option('who_img_'.$i,$image_url);
                    }
                 
                   $i++;
                }            

            }

    }


}


add_filter('get_comment_author', 'my_comment_author', 10, 1);
function my_comment_author( $author = '' ) {
// Get the comment ID from WP_Query
$comment = get_comment( $comment_ID );
if (!empty($comment->comment_author) ) {
if($comment->user_id > 0){
$user=get_userdata($comment->user_id);
$author=$user->first_name.' '.substr($user->last_name,0,1).'.'; // this is the actual line you want to change
} else {
$author = __('Anonymous');
}
} else {
$author = $comment->comment_author;
}
return $author;
}
