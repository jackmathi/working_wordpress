
<?php
/**
/* Template Name: Contact Page 
 * @package WordPress
 * @subpackage CMHC
 * @since CMHC
 */
get_header(); 

  global $wpdb;
global $_POST;   
 if (isset($_POST['submit'])) {

   $name1 = $_POST['name1'];
   $email = $_POST['email'];
   $phone = $_POST['phone'];
   $message = $_POST['message'];
   $tabname = 'wp_form';
 // $tabname = $wpdb->prefix.'form';
    $data['name1'] =  $name1 ;
    $data['email'] = $email ;
    $data['phone'] = $phone ;
    $data['message'] =  $message ;
     
   $insert_contact =  $wpdb->insert($tabname,$data );
      print_r($insert_contact); 

   
}

?>

<style type="text/css">
  input, textarea {
 
    resize: none;
    border: 1px solid #C5C5C5;
}

.alert {
  display: none;
}

/**
 * Error color for the validation plugin
 */
.error {
  color: #e74c3c;
}

</style>


<div class="landing-element">

          <!-- sub header Start -->
          <div class="intro-banner">
            <div class="container">
              <div class="row">
                <div class="col-8">
                  <!-- bread-crumb start-->
                  <div class="bread-crumb">
                    <ul class="clearfix">
                      <li><a href="#">Home</a></li>
                    </ul>
                  </div>
                  <!-- bread-crumb end-->
                
                </div>
              </div>
            </div>
          </div>
          <!-- sub header end -->
          
          <!-- contact card section start here -->
            <div class="contactinfo-section">
              <div class="container">
                <div class="row contact-details">
                    <div class="col-6 form-section contact">

                
<?php echo do_shortcode('[sitepoint_contact_form]'); ?>
      
                    </div>
                    <div class="col-6 form-section contact-block">
                      <div class="contact-content">
                        <ul>
                          <li><i class="la la-map-marker"></i>
                            Child Mental Health Clinic<br /> The Courtyard<br />   69, High Street<br />   Ascot<br  />   Berkshire<br />  SL5 7HP
                          </li>
                          <li><i class="la la-phone"></i>078473 47329</li>
                        </ul>
                      </div>
                    </div>
                </div>
              </div>
            </div>
          <!-- contact card section end here -->
        </div>

 <?php get_footer(); ?>

