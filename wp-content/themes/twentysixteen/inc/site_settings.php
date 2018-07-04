<?php

    // create custom plugin settings menu
    add_action('admin_menu', 'site_create_content');
	function site_create_content() {
		$themepage = add_theme_page('Theme options ', 'Theme options', 'administrator','common-settings', 'site_settings_form');
		
		//call register settings function
		add_action( 'admin_init', 'register_site_settings' );
		add_action('admin_print_styles-' . $themepage, 'site_settings_admin_styles');
	}
	function register_site_settings(){
		$settings_val = array( 'site_logo','sticky_logo','mobile_logo','site_favicon', 'footer_copy',   'ss_linkedIn','ss_youtube','ss_facebook', 'ss_twitter','ss_mail','ss_hours','banner_default','banner_default1','banner_default2','banner_heading','banner_descri','banner_heading1','banner_descri1','banner_heading2','banner_descri2','ft_email','ft_callus','ft_sclshar','ft_form','ss_abt-sub-tit','ss_contact','partnerslogo1','partnerslogo2','partnerslogo3','partnerslogo4','ss_abt','ss_abt-tit','ss_testi-tit','ss_abt_image','ss_abt','tours_title','pop_dess','new_dess_','new_dess_sub','ss_dollor','to_mail','from_email','offers_title','offers_text','offers_pdf_english','offers_pdf_chinese','offers_image','conditions_sub_title','conditions_title','assessments_title','assessments_sub_title','treatmets_title','treatmets_sub_title','resource_title','resource_content','resource_button_text','resource_button_link','footer_content','con_button_title','con_button_text','con_button_link','app_button_text','app_button_link','contact_us_email','ss_abt_one','btn_link','btn_name','left_descri','right_descri','resource_sub_heading1','resource_sub_heading2','resource_sub_heading5'
);
			
		foreach($settings_val as $set )
			register_setting( 'common-settings-group', $set );
	}

	function site_settings_admin_styles(){
		wp_enqueue_style('jquery-style', '//ajax.googleapis.com/ajax/libs/jqueryui/1.8.2/themes/smoothness/jquery-ui.css');
		wp_enqueue_style('farbtastic');
		wp_enqueue_style( 'wp-color-picker');
		wp_enqueue_style('thickbox');
		wp_enqueue_script('jquery');
		wp_enqueue_script('media-upload');
		wp_enqueue_media();
	}

	function site_settings_form(){
		get_template_part('inc/upload-scripts');
		
?>
		<div class="wrap">
		<p style="text-align: center;"><img src="<?php echo get_option('site_logo'); ?>" style="text-align: center;height: 83px!important;"></p>
			<form class="site-setting-form" method="post" id="point-settings" name="common-settings" action="options.php">
				<?php settings_fields('common-settings-group');?>
					<div class="settings-container">
						<ul class='k2b-tabs'>
							
							<li><a href="#k2b-tab1"><span class="dashicons dashicons-admin-generic"></span> Common Settings</a></li>
							<li><a href="#k2b-tab2"><span class="dashicons dashicons-admin-home"></span> Home Page</a></li>
					 		<li><a href="#k2b-tab4"><span class="dashicons dashicons-location"></span> Contact Details</a></li>
							<li><a href="#k2b-tab8"><span class="dashicons dashicons-welcome-widgets-menus"></span> Footer Settings</a></li>
							
						</ul>
						<div class="set_tab">
		
						<div id="k2b-tab1" class="tab-wrapper">
						   	<h2>Common Settings</h2>
							<table class="form-table">
								<?php		 
								  //echo get_admin_input('up_image', 'site_favicon', 'Favicon', get_option('site_favicon'), '');
									echo get_admin_input('up_image', 'site_logo', 'Site Logo', get_option('site_logo'), '');
									echo get_admin_input('up_image', 'banner_default', 'Default Banner', get_option('banner_default'), '');
									echo get_admin_input('text', 'banner_heading', 'Banner Heading ', get_option('banner_heading'), '');
									echo get_admin_input('editor', 'banner_descri', 'Banner Description', get_option('banner_descri'), '');


									echo get_admin_input('up_image', 'banner_default1', 'Default Banner1', get_option('banner_default1'), '');
									echo get_admin_input('text', 'banner_heading1', 'Banner Heading', get_option('banner_heading1'), '');
									echo get_admin_input('editor', 'banner_descri1', 'Banner Description', get_option('banner_descri1'), '');

									echo get_admin_input('up_image', 'banner_default2', 'Default Banner2', get_option('banner_default2'), '');
									echo get_admin_input('text', 'banner_heading2', 'Banner Heading', get_option('banner_heading2'), '');
									echo get_admin_input('editor', 'banner_descri2', 'Banner Description', get_option('banner_descri2'), '');
								
									 
								?>
						  	</table>  							  	
						</div>
						
						
						
						
						<div id="k2b-tab2" class="tab-wrapper">
						  <h2>Talk to us in confidence</h2>
						  <i>Contact Us Button</i>
							<table class="form-table">
								<?php		 
								echo get_admin_input('textdomain(text_domain)', 'con_button_title', 'Title', get_option('con_button_title'), '');	   
								echo get_admin_input('text', 'con_button_text', 'Button Text', get_option('con_button_text'), '');	   
								echo get_admin_input('text', 'con_button_link', 'Button Link', get_option('con_button_link'), '');	  

								?>
						  	</table> 
						  	
						  	 <i>Appoiment Button<i>
							<table class="form-table">
								<?php		 
								echo get_admin_input('text', 'app_button_text', 'Button Text', get_option('app_button_text'), '');	   
								echo get_admin_input('text', 'app_button_link', 'Button Link', get_option('app_button_link'), '');	  

								?>
						  	</table> 
						  	
						  	<hr/>
							
							<h2>About Us</h2>
							<table class="form-table">
								<?php		 
								  
								  echo get_admin_input('editor', 'left_descri', 'Left Description', get_option('left_descri'), '');
								  echo get_admin_input('editor', 'right_descri', 'Right Description', get_option('right_descri'), '');
								  echo get_admin_input('text', 'btn_name', 'Button Name', get_option('btn_name'), '');
								  echo get_admin_input('text', 'btn_link', 'URL', get_option('btn_link'), '');
								//  echo get_admin_input('up_image', 'ss_abt_image', 'Background Image', get_option('ss_abt_image'), '');
								
									 
									 
								?>
						  	</table> 
						  	<hr/>
						  	
						  
						  	<!--<h2>Quotation Description</h2>
							<table class="form-table">
								<?php		 
								//echo get_admin_input('editor', 'quotation_title', 'Quotation', get_option('quotation_title'), '');
								///echo get_admin_input('editor', 'quotation_title1', '', get_option('quotation_title1'), '');
								//echo get_admin_input('text', 'conditions_sub_title', 'Sub Title', get_option('conditions_sub_title'), '');
								   
								?>
						  	<!--</table> 
						  	<hr/>

						  	
						  	<h2>Assessments Section</h2>
							<table class="form-table">
								<?php		 
								echo get_admin_input('text', 'assessments_title', 'Title', get_option('assessments_title'), '');	   
								echo get_admin_input('text', 'assessments_sub_title', 'Sub Title', get_option('assessments_sub_title'), '');	   
								?>
						  	<!--</table>
						  	
						  	<hr/>-->
						  <!--	<h2>fourth Section</h2>
							<table class="form-table">
								<?php		 
								echo get_admin_input('text', 'treatmets_title', 'Title', get_option('treatmets_title'), '');	   
								echo get_admin_input('text', 'treatmets_sub_title', 'Sub Title', get_option('treatmets_sub_title'), '');	   
								?>
							<!--</table> -->
						  	
<hr/>
						  	
						   <h2>Fourth Section</h2>
							<table class="form-table">
								<?php	                                
								echo get_admin_input('text', 'resource_title', 'Heading', get_option('resource_title'), '');	   
								echo get_admin_input('editor', 'resource_content', 'Description', get_option('resource_content'), '');	   
								echo get_admin_input('text', 'resource_sub_heading1', 'Sub Heading', get_option('resource_sub_heading1'), '');	   
								echo get_admin_input('text', 'resource_sub_heading2', ' ', get_option('resource_sub_heading2'), '');	   
								?>
						  	</table> 

						  	<hr/>
						  	
						   <h2>fifth Section</h2>
							<table class="form-table">
								<?php	      
								echo get_admin_input('text', 'resource_sub_heading5', 'Heading', get_option('resource_sub_heading5'), '');	
								?>
						  	</table> 
						   
						 						  	
						</div>
						
						<div id="k2b-tab4" class="tab-wrapper">
							<h2>Contact Details</h2>

						   	<table class="form-table">
								<?php
									
									
							 echo get_admin_input('text', 'ss_mail', 'Mail', get_option('ss_mail'), '');
							 echo get_admin_input('text', 'ss_hours', 'Call Us', get_option('ss_hours'), '');
							 echo get_admin_input('textarea', 'ss_contact', 'Address', get_option('ss_contact'), '');
							 echo get_admin_input('text', 'from_email', 'Footer Email', get_option('from_email'), '');
							 echo get_admin_input('text', 'contact_us_email', 'From Email', get_option('contact_us_email'), '');
																 
								
								?>
						  	</table>
							</div>
						
							 
					
						
					  	
									
						<div id="k2b-tab8" class="tab-wrapper">
							<h2>Footer Settings</h2>
							<table class="form-table">
								 <?php
								echo get_admin_input('textarea', 'footer_copy', 'Footer Copyright Text', get_option('footer_copy'), '');
								echo get_admin_input('editor', 'footer_content', 'Footer Contact Us Form Content', get_option('footer_content'), '');
									?>
							</table>
						</div>
						
						</div>

						<br/>
					  	<p class="submit" style=" text-align: center;"><input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" name="submit-settings" /></p>
				</div><!-- settings-container -->		
			</form>
		</div><!-- wrap -->
<?php }?>
