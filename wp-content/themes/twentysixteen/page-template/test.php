
<?php
/**
/* Template Name: 2332 Page 
 * @package WordPress
 * @subpackage CMHC
 * @since CMHC
 */
get_header(); ?>




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
                  <h1>Contact</h1>
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

                      <font color="#FF0000">
<?php
if(isset($_POST['submit']))
{
$flag=1;
if($_POST['customer_name']=='')
{
$flag=0;
echo "Please Enter Your Name<br>";
}
else if(!preg_match('/[a-zA-Z_x7f-xff][a-zA-Z0-9_x7f-xff]*/',$_POST['customer_name']))
{
$flag=0;
echo "Please Enter Valid Name<br>";
}
if($_POST['customer_email']=='')
{
$flag=0;
echo "Please Enter E-mail<br>";
}
else if(!eregi("^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$", $_POST['customer_email']))
{
$flag=0;
echo "Please Enter Valid E-Mail<br>";
}
if($_POST['customer_phone']=='')
{
$flag=0;
echo "Please Enter Contact Number<br>";
}
if($_POST['customer_message']=='')
{
$flag=0;
echo "Please Enter Message";
}
if ( empty($_POST) )
{
print 'Sorry, your nonce did not verify.';
exit;
}
else
{
if($flag==1)
{
wp_mail(get_option("admin_email"),trim($_POST[customer_name])." sent you a message from ".get_option("blogname"),stripslashes(trim($_POST[customer_phone])),stripslashes(trim($_POST[customer_message])),"From: ".trim($_POST[customer_name])." <".trim($_POST[customer_email]).">rnReply-To:".trim($_POST[customer_email]));
echo "Mail Successfully Sent";

}
}
}
?>
</font>
                       
  <form  name="contactform" method="post" id="contactus_form">
                      <div class="contact-us">
                        
                        <div class="form-row">
                          <label class="floating-item">
                            <input type="text" name="customer_name"   class="floating-item-input input-item">  
                            <span class="floating-item-label">Your name</span>
                          </label>
                        </div>
                          <div class="form-row">
                            <label class="floating-item">
                              <input type="email" name="customer_email"   class="floating-item-input input-item"> 
                              <span class="floating-item-label">Your email</span>
                            </label>
                          </div>
                        <div class="form-row">
                          <label class="floating-item">
                            <input type="number" name="customer_phone"  class="floating-item-input input-item">  
                            <span class="floating-item-label">Contact number</span>
                          </label>
                        </div>
                        <div class="form-row">
                          <label class="floating-item">
                            <textarea type="text" name="customer_message"></textarea>
                          
                            <span class="floating-item-label">Subject</span>
                          </label>
                        </div>
                        <input type="submit" class="msg-button button-message" name="submit" id="submit" value="Send"/>
                        
                      </div>
                      </form>


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
