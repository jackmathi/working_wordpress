
<?php
/**
/* Template Name: Career Page 
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
   $page_name = $_POST['page_name'];
   $filename=$_FILES['filename']['name'];

/*
   $uploaddir = get_template_directory_uri().'/career/';
    $uploadfile = $uploaddir . basename($_FILES['filename']['name']);

    echo "<p>";

    if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {
      echo "File is valid, and was successfully uploaded.\n";
    } else {
       echo "Upload failed";
    }*/
 // print_r($target);exit;
//$target_path = "http://localhost/cmhc/wp-content/uploads/career";  
 

$date1=date("Ymd").time().$ext;
$docc=($_FILES['filename']['name']);
$filename =$date1.str_replace(' ','',$docc);
$target = ABSPATH.'wp-content/themes/CMHC/career/';
$resume_mod=date("Ymd").time().$ext;
// var_dump(ABSPATH);
// $target = $target.basename($filename);
//var_dump($target.$_FILES['filename']['name']);
$target1=get_template_directory_uri().'/career';
mkdir($target, 0777,true);
if(is_uploaded_file($_FILES['filename']['tmp_name']))
 {
 //  move_uploaded_file($_FILES['filename']['name'], $target);

  move_uploaded_file($file_tmp=$_FILES["filename"]["tmp_name"],$target.'/'.$resume_mod .$_FILES['filename']['name']);
  // move_uploaded_file($_FILES['filename']['tmp_name'],$target.$_FILES['filename']['name']) or die('cannot upload');
   } 
   
   $tes3=$target1.'/'.$resume_mod .$_FILES['filename']['name'];


   $tabname = 'wp_form';
 // $tabname = $wpdb->prefix.'form';
    $data['name1'] =  $name1 ;
    $data['email'] = $email ;
    $data['phone'] = $phone ;
    $data['message'] =  $message ;
    $data['page_name'] =  $page_name ;
    $data['filename'] =  $filename ;
        $data['filename1'] =  $tes3 ;


   $insert_contact =  $wpdb->insert($tabname,$data );
     // print_r($insert_contact); 
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

input[type=file] {
    opacity: 1;
    border-style: hidden;
        font-size: 12px;
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
<form action="" id="first_form"  method="post"  enctype="multipart/form-data" role="form" onsubmit="return Checkfiles();">
                
 <div class="contact-us">
                        <div class="form-row">
                          <label class="floating-item"><span >Your name</span> <br>
                            <input type="text" id="name1" name="name1"   onkeypress="return onlyAlphabets(event,this);"    size="40" >  
                            
                          </label>
                        </div>
                          <div class="form-row">
                            <label class="floating-item"><span >Your email</span> <br>
                              <input type="email" id="email" name="email"   size="40"  > 
                              
                            </label>
                          </div>
                        <div class="form-row">
                          <label class="floating-item"> <span >Contact number</span> <br>
                            <input type="text" id="phone" name="phone"   pattern="[0-9]+" maxlength="15" onkeypress="return isNumberKey(event)"   >  
                           
                          </label>
                        </div>
                        <div class="form-row">
                          <label class="floating-item"> <span >Resume</span> <br>

                           
                          </label><br>

                         <label class="floating-item">
                            <input type="file" id="file" name="filename"  > 
                           <input type="hidden" value="career" name="page_name"  > 
                          </label>
                        </div> <br>
                        <div class="form-row">
                          <label class="floating-item">    <span >Your message</span><br>
                            <input type="textarea" rows="5" id="message" cols="35"  name="message">  
                        
                          </label>
                        </div>
                        <input type="submit" name="submit" value="Send" class="msg-button button-message">
                       
                            
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

 <script language="javascript">
function Checkfiles()
{
var fup = document.getElementById('filename');
var filename = fup.value;
var ext = filename.substring(filename.lastIndexOf('.') + 1);
if(ext == "pdf" || ext == "PDF" || ext == "JPEG" || ext == "jpeg" || ext == "jpg" || ext == "JPG" || ext == "doc")
{
return true;
} 
else
{
alert("File upload  only PDF &  Doc");
fup.focus();
return false;
}
}
</script>

<SCRIPT language=Javascript>
      
      function isNumberKey(evt)
      {
         var charCode = (evt.which) ? evt.which : event.keyCode
         if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
         return true;
      }
      
   </SCRIPT>

<script language="Javascript" type="text/javascript">

        function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

    </script>
