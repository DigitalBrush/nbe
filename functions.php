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


add_action('admin_menu', 'customize_homepage');

function customize_homepage() { 
    add_menu_page( '','Homepage', '','landing', '','dashicons-welcome-widgets-menus', 90);  
    add_submenu_page('landing','Slider', 'Slider','manage_options','setup_slider','setup_slider');
    add_submenu_page('landing','Intro', 'Intro','manage_options','intro','intro');
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

<!-------------------------------------------------------intro ----------------------------->

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


function brands(){

}
function who_we_are(){

}
