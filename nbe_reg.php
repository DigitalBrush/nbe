<?php
add_action( 'widgets_init', 'create_tables');

function create_tables(){
  
  global $wpdb;
    
  $charset_collate = $wpdb->get_charset_collate();

  $tbl="CREATE TABLE IF NOT EXISTS `customers` (
  `id`int NOT NULL AUTO_INCREMENT,
  `username` varchar(191) NOT NULL,  
  `company_name` varchar(191) NOT NULL,
  `siret` varchar(191) NOT NULL,
  `vat_number` varchar(191) NOT NULL,
  `address` varchar(191) NOT NULL,
  `phone` varchar(191) NULL,
  `ave_sales` varchar(191) NOT NULL DEFAULT '1',
  `product_categories` varchar(191) NOT NULL,
  PRIMARY  KEY id (id)
) $charset_collate;";
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta($tbl); 

  }


function registration_process(){
  /*if ( !get_option('users_can_register') ) {
    redirect( site_url('wp-login.php?registration=disabled') );
    exit();
  }*/

  $user_login = '';
  $user_email = '';
  //if ( $http_post ) {
    $user_login = $_POST['user_login'];
    $user_email = $_POST['user_email'];
    $errors = register_new_user($user_login, $user_email);
       
    
    
    if ( empty($wp_error) )
    $wp_error = new WP_Error();    
      $wp_error=$errors;
  
  if (is_wp_error($errors) ){?>
  
  
              <div class="box box-warning box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Il y avait un problème</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
                <div class="box-body">
        
  <?php
    
  if ( $wp_error->get_error_code() ) {
    $errors = '';
    $messages = '';
    foreach ( $wp_error->get_error_codes() as $code ) {
      $severity = $wp_error->get_error_data( $code );
      foreach ( $wp_error->get_error_messages( $code ) as $error_message ) {
        if ( 'message' == $severity )
          $messages .= '  ' . $error_message . "<br />\n";
        else
          $errors .= '  ' . $error_message . "<br />\n";
      }
    }
    if ( ! empty( $errors ) ) {
      /**
       * Filter the error messages displayed above the login form.
       *
       * @since 2.1.0
       *
       * @param string $errors Login error message.
       */
      echo '<div id="login_error">' . apply_filters( 'login_errors', $errors ) . "</div>\n";
    }
    if ( ! empty( $messages ) ) {
      /**
       * Filter instructional messages displayed above the login form.
       *
       * @since 2.5.0
       *
       * @param string $messages Login messages.
       */
      echo '<p class="message">' . apply_filters( 'login_messages', $messages ) . "</p>\n";
    }
  }  ?>
              </div><!-- /.box-body -->
              </div><!-- /.box -->
           
 <?php }else{
   
      $user = new WP_User( $errors);
        $user->set_role( 'subscriber');  
   
   ?>      
  
              <div class="box box-success box-solid">
                <div class="box-header with-border">
                  <h3 class="box-title">Succès</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div><!-- /.box-tools -->
                </div><!-- /.box-header -->
               </div><!-- /.box -->
             
   
<?php  
 }  
    
}

function register(){

?>  
  
  <div class="col-md-12">
       <!-- general form elements -->
              <div class="box box-primary" >
                 <div class="box-body"><form name="registerform" id="registerform" action="<?php echo esc_url( $_SERVER['REQUEST_URI'].'?action=register', 'login_post' ) ?>" method="post" novalidate="novalidate">
                  
                    <div class="form-group">
          <label for="user_login">Nom d'utilisateur</label> 
                 <input type="text" name="user_login" id="user_login" class="form-control" value=""  />                     
                    </div>
          
                    <div class="form-group">
                     <label for="user_email"><?php _e('E-mail') ?></label>
                 <input type="email" name="user_email" id="user_email" class="form-control" value="" />
                    </div>
          
          
          
            <?php
            /**
             * Fires following the 'E-mail' field in the user registration form.
             *
             * @since 2.1.0
             */
            do_action( 'register_form' );
            ?>
          
                  </div><!-- /.box-body -->
          <div class="box-footer">                
         <?php if(isset($_REQUEST['wp-submit']))
        registration_process(); ?>
               </div>


                  <div class="box-footer">                

                 <br class="clear" />
  <input type="hidden"  class="form-control" name="redirect_to" value="<?php the_permalink(); ?>" />  
  <input type="submit" name="wp-submit" id="wp-submit" class="btn btn-primary" value="Valider" />
                  </div>
                </form>
              </div><!-- /.box -->
      </div> 


<?php
global $wpdb;

?>



  
  <div style="clear:both;"></div>



      
<?php
}

add_action( 'register_form', 'ts_show_extra_register_fields' );
function ts_show_extra_register_fields(){
?>

                  <div class="form-group">
          <label for="password"><?php _e('Password') ?></label>
          <input type="password" name="password" id="password" class="form-control"   value=""  />
          
          </div>
    
    
          <div class="form-group">
          <label for="repeat_password">Répéter le mot de passe</label>
          <input id="repeat_password" class="form-control" type="password"  value="" name="repeat_password" />
          
          </div>
    
    
    
             </div><!-- /.box-body -->

               
         
               
              </div><!-- /.box -->
      </div>  
        
    <div class="col-md-12">
       <!-- general form elements -->
              <div class="box box-primary" >     
                
                  <div class="box-body">
    
    
    <div class="form-group">
        <label for="company_name">Nom de société</label>
    <input id="company_name" class="form-control" type="text"  value="" name="company_name" />
   
    </div>
  


    <div class="form-group">
        <label for="siret">N° de siret</label>
    <input id="siret" class="form-control" type="text"  value="" name="siret" />
    
    </div>


    <div class="form-group">
        <label for="vat_number">N° de TVA</label>
    <input id="vat_number" class="form-control" type="text"  value="" name="vat_number" />
    
    </div>

    <div class="form-group">
        <label for="address">Adresse</label>
    <input id="address" class="form-control" type="text"  value="" name="address" />
    
    </div>

    <div class="form-group">
        <label for="phone">Téléphone</label>
    <input id="phone" class="form-control" type="text"  value="" name="phone" />
    
    </div>

     <div class="form-group">
        <label for="ave_sales">Surface moyenne de vente</label>
    <input id="ave_sales" class="form-control" type="text"  value="" name="ave_sales" />
    
    </div>

    <div class="form-group">
        <label for="product_categories">Sélection des catégorie de produit</label><br>
            <?php

                    $taxonomy     = 'product_cat';
                    $orderby      = 'name';  
                    $show_count   = 0;      // 1 for yes, 0 for no
                    $pad_counts   = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no  
                    $title        = '';  
                    $empty        = 0;

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
                        ?> 
                        <label><input type="checkbox" name="product_categories[]" value="<?php echo $cat->name  ?>"><?php echo $cat->name  ?></label>       
                                    
                  <?php

                          
                    }       
                  }
                  ?>

    
    </div>

  
 
      

<?php
}

// Check the form for errors
add_action( 'register_post', 'ts_check_extra_register_fields', 10, 3 );
function ts_check_extra_register_fields($login, $email, $errors) {
  if ( $_POST['password'] !== $_POST['repeat_password'] ) {
    $errors->add( 'passwords_not_matched', "<strong>ERROR</strong>: Passwords must match" );
  }
}

add_action( 'user_register', 'ts_register_extra_fields', 100 );
function ts_register_extra_fields( $user_id ){
  $userdata = array();
  $userdata['ID'] = $user_id;
  if ( $_POST['password'] !== '' ) {
    $userdata['user_pass'] = $_POST['password'];
  }
  $new_user_id = wp_update_user( $userdata );
}
?>
<?php
// Storing values into the  custom users table
add_action( 'user_register', 'register_user', 100 );
function register_user(){
 global $wpdb;
  $usern=$_POST['user_login']; 
  $categories=implode(",",$_POST['product_categories']);
  
 $wpdb->query("INSERT INTO customers
   (`username`,`company_name`,`siret`,`vat_number`,`address`,`phone`,`ave_sales`,`product_categories`)
                    VALUES
   ('{$usern}','{$_POST['company_name']}','{$_POST['siret']}','{$_POST['vat_number']}','{$_POST['address']}','{$_POST['phone']}','{$_POST['ave_sales']}','{$categories}')");
}

add_filter( 'gettext', 'ts_edit_password_email_text' );
function ts_edit_password_email_text ( $text ) {
  if ( $text == 'A password will be e-mailed to you.' ) {
    $text = '';
  }
  return $text;
}

function reg_shortcode() { 
  
     ob_start();       
     register(); 
    return ob_get_clean();
}
add_shortcode( 'client-reg', 'reg_shortcode' );

create_page("Register","[client-reg]","page-templates/fullwidthpage.php");  

add_action('admin_menu', 'customers');

function customers() { 
    add_menu_page( '','Customers', '','customers', '','dashicons-welcome-widgets-menus', 90);  
    add_submenu_page('customers','', 'View All','manage_options','view_customers','view_customers');
}


function view_customers(){
 
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<style type="text/css">
    fieldset {
     
      padding:10px !important;
      border:1px solid #E8E7E6  !important;
    }

    .folder{
     
      padding:10px !important;
      margin:10px;
      border:1px solid #E8E7E6  !important;
      width:100px;
      height:100px;
      float: left;
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
<?php

global $wpdb;

?>

<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Username</th>
                <th>Nom de société</th>
                <th>N° de siret</th>
                <th>N° de TVA</th>
                <th>Adresse</th>
                <th>Téléphone</th>
                <th>Surface moyenne de vente</th>
                <th>Sélection des catégorie de produit</th>

             
        </thead>
        <tbody>
    <?php   

    $query="SELECT * FROM `customers`";
 
     $result= $wpdb->get_results($query);   
   
    foreach($result as $row){
   
  ?>
      
  <td align="left"><?php echo $row->username;?></td>
  <td align="left"><?php echo $row->company_name;?></td>
  <td align="left"><?php echo $row->siret;?></td>
  <td align="left"><?php echo $row->vat_number;?></td>
  <td align="left"><?php echo $row->address;?></td>
  <td align="left"><?php echo $row->phone;?></td>
   <td align="left"><?php echo $row->ave_sales;?></td>
  <td align="left"><?php echo $row->product_categories;?></td>


  </tr>
  <?php   
  
    }
  ?>
        

        </tbody>
     
    </table>

</div>

<?php

}


?>