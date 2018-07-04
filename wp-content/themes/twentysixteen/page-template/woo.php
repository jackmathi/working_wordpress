<?php
/*
Template Name: woocommerce page
*/
get_header();
global $_POST;
global $_GET;
function getoauth_nonce(){
$length = 15 ;
$token = "";
$codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$codeAlphabet.= "abcdefghijklmnopqrstuvwxyz";
$codeAlphabet.= "0123456789";
$max = strlen($codeAlphabet); // edited

for ($i=0; $i < $length; $i++) {
$token .= $codeAlphabet[random_int(0, $max-1)];
}

// return $token;
$nonce = base64_encode(utf8_encode($token));
// $nonce = substr($nonce,0,6);
return $nonce ;

}
 function normalize_parameters( $parameters ) {
        $keys       = wc_rest_urlencode_rfc3986( array_keys( $parameters ) );
        $values     = wc_rest_urlencode_rfc3986( array_values( $parameters ) );
        $parameters = array_combine( $keys, $values );
        return $parameters;
    }

function join_with_equals_sign( $params, $query_params = array(), $key = '' ) {
        foreach ( $params as $param_key => $param_value ) {
            if ( $key ) {
                $param_key = $key . '%5B' . $param_key . '%5D'; // Handle multi-dimensional array.
            }
            if ( is_array( $param_value ) ) {
                $query_params = join_with_equals_sign( $param_value, $query_params, $param_key );
            } else {
                $string         = $param_key . '=' . $param_value; // Join with equals sign.
                $query_params[] = wc_rest_urlencode_rfc3986( $string );
            }
        }
        return $query_params;
    }





if (isset($_POST['submit'])) {
/**/
$timestamp=time();
$nonce = getoauth_nonce();

$params = array('oauth_consumer_key' =>'ck_1d0f2a24d8a17eedda12d0bf84bf9d8058ad2b39' , 'oauth_signature_method' => 'HMAC-SHA1', 'oauth_timestamp' =>$timestamp , 'oauth_nonce' => $nonce );
var_dump($params);
 $param_temp=uksort( $params, 'strcmp' );
 $paramsort=array();
foreach ($param_temp as $key => $value) {
	$paramsort[$key] =  $value ;
}
//echo "<pre>";
// print_r($params);

$params = normalize_parameters($params);
$http_method = isset( $_SERVER['REQUEST_METHOD'] ) ? strtoupper( $_SERVER['REQUEST_METHOD'] ) : ''; // WPCS: sanitization ok.
// $request_path = isset( $_SERVER['REQUEST_URI'] ) ? parse_url( $_SERVER['REQUEST_URI'], PHP_URL_PATH ) : ''; // WPCS: sanitization ok.
$request_path='http://localhost/demo-product/wp-json/wc/v2/products' ; 
 $query_string   = implode( '%26', join_with_equals_sign( $params ) ); // Join with ampersand.
$wp_base = get_home_url( null, '/', 'relative' );
if ( substr( $request_path, 0, strlen( $wp_base ) ) === $wp_base ) {
$request_path = substr( $request_path, strlen( $wp_base ) );
}
// $base_request_uri = rawurlencode( get_home_url( null, $request_path, is_ssl() ? 'https' : 'http' ) );

 $base_request_uri = rawurlencode( $request_path );

$string_to_sign = $http_method . '&' . $base_request_uri . '&' . $query_string;
$secret = 'cs_abfe7ebecc96ccf7c5091e53d2ae3849738c9a20';
$signature = base64_encode( hash_hmac('SHA1', $string_to_sign, $secret.'&', true ) );

// var_dump($signature);
// echo "<br>";
// var_dump($string_to_sign);
/**/


// $base_string = 'POST&http://localhost/project1/wp-json/wc/v2/products';

// cs_fc81716f0ece9f1cdbaefd375122481545c31664%2526
// $signature = hash(algo, data)_hmac( 'SHA1', $base_string, $key.'%2526');
// $signature = base64_encode(utf8_encode($signature));

// cs_fc81716f0ece9f1cdbaefd375122481545c31664
$curl = curl_init();


// echo "<br>";
// echo "<div class ='hereee'>";
// var_dump($signature);
// echo "<div>";
curl_setopt_array($curl, array(
CURLOPT_URL => "http://localhost/demo-product/wp-json/wc/v2/products",
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 30,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",

CURLOPT_POSTFIELDS => '{"name":"Premiuhgjhghm Quality","type":"simple","regular_price":"21.99","description":"Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.","short_description":"Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.","categories":[{"id":9},{"id":14}],"images":[{"src":"http:\/\/demo.woothemes.com\/woocommerce\/wp-content\/uploads\/sites\/56\/2013\/06\/T_2_front.jpg","position":0},{"src":"http:\/\/demo.woothemes.com\/woocommerce\/wp-content\/uploads\/sites\/56\/2013\/06\/T_2_back.jpg","position":1}]}' ,
CURLOPT_HTTPHEADER => array(
	    "Authorization: OAuth oauth_consumer_key=\"ck_1d0f2a24d8a17eedda12d0bf84bf9d8058ad2b39\",
	    oauth_signature_method=\"HMAC-SHA1\",
	    oauth_timestamp=\"".$timestamp."\",
	    oauth_nonce=\"".$nonce."\",
	    oauth_signature=\"".$signature."\"",
	    "Cache-Control: no-cache",
	    "Content-Type: application/json"
	  ),

));


$response = curl_exec($curl);
$err = curl_error($curl);
echo $response;
curl_close($curl);

/*if ($err) {
echo "cURL Error #:" . $err;
} else {
echo $response;
}*/
}
?>
<div class="landing-element">

<!-- sub header Start -->
<div class="intro-banner">
<div class="container">
<div class="row">
<div class="col-8">
<!-- bread-crumb start-->
<div class="bread-crumb">
<ul class="clearfix">
<li>
<a href="#">Home</a>
</li>
</ul>
</div>
<!-- bread-crumb end-->
<h1>Career</h1>
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
<div class="contact-us">
<form id="careerform" action=" " method="post" enctype="multipart/form-data">
<?php wp_nonce_field('conactus_nonce','contact_us_form'); ?>
<div class="error-message" id="validcar_name_err">
</div>
<div class="form-row">
<label class="floating-item">
<input type="text" name="prodname" class="floating-item-input input-item validcar_name" >
<span class="floating-item-label">Name</span>
</label>

</div>
<!-- <div class="error-message" id="validcar_email_err">
</div> -->
<!--<div class="form-row">
<label class="floating-item">
<input type="text" name="prodtype" class="floating-item-input input-item validcar_email">
<span class="floating-item-label">Email</span>

</label>


</div>-->
<!-- <div class="error-message" id="validcar_numb_err">
</div>
<div class="form-row">
<label class="floating-item">
<input type="number" name="number" class="floating-item-input input-item validcar_number">
<span class="floating-item-label">Contact number</span>
</label>


</div> -->
<!-- <div class="error-message" id="validcar_edu_err">
</div>
<div class="form-row">
<label class="floating-item">
<input type="textbox" name="education" class="floating-item-input input-item validcar_education">
<span class="floating-item-label">Education</span>
</label>


</div> -->
<!-- <div class="error-message" id="validcar_resume_err">
</div>
<div class="form-row">
<label class="floating-item">
<input type="file" name="resume" class="floating-item-input input-item validcar_resume">
<span class="floating-item-label">Upload Resume(PDF, jpg ,png)</span>
</label>

</div> -->
<br>
<!-- <div id="validcar_resume_msg" style="position: relative; margin-top: 5px;"> -->
<!-- </div> -->

<br>
<br>
<input type="text" name="submit" hidden="true" value="1">
<button class="msg-button button-message">SEND MESSAGE</button>
</form>
<button onclick="ajaxpost_pppp();">Send ajax</button>
</div>
</div>

</div>
</div>
</div>

<!-- contact card section end here -->
</div>

<?php
get_footer();
?>

