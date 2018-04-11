<?php
	include("../include/config.php"); 
	include("include/session.php");
	//session_start(); 
	$cnn = new connection();
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<!--<link rel="icon" href="images/favicon.ico">-->
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="xmlrpc.php" />
		<title>StallsBook</title>
		<link rel='dns-prefetch' href='http://maps.google.com/' />
		<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
		<link rel='dns-prefetch' href='http://s.w.org/'/>
		<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
		<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCg51PQrjNhK7arm5xcQAQ0rQ_0qYMQU3Y&sensor=false&libraries=places"></script>
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<link rel="stylesheet" href="css/style.css">
		<style type="text/css">
			img.wp-smiley,
			img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
			}
		</style>
		<script type="text/javascript">
			$(window).scroll(function(){
			 if ($(this).scrollTop() > 50) {
			    $('.top_panel_middle').addClass('newClass');
			 } else {
			    $('.top_panel_middle').removeClass('newClass');
			 }
			});
		</script>
		<style type="text/css">
			.banner
			{
			position: relative;
			}
			.search_box{
			margin: 0 auto 0 auto;
			z-index: 800;
			width: 70%;
			position: absolute;
			bottom: -30px;
			display: block;
			left: 15%;
			}
			.search_box ul
			{
			display: table;
			list-style: none;
			margin:0 auto;
			padding: 0;
			}
			.search_box ul li
			{
			display: table-cell;
			margin:0;
			padding: 0;
			}
			.search_box ul li input, .search_box ul li select
			{
			height: 65px;
			padding: 6px 12px;
			width: 100%;
			min-width: 350px;
			border-right: 1px solid #ccc;
			background: #fff !important;
			}
			.search_box ul li button
			{
			height: 65px;
			padding: 6px 12px;
			width: 100%;
			min-width: 270px;
			border-radius: 0;
			margin-left: -20px;
			}
			.newClass
			{
			position: fixed;
			top:0;
			z-index: 1000;
			margin: 0 auto !important;
			/*height: 100px;*/
			background: #fff;
			width: 100%;
			}
			.app_area
			{
			padding: 5% 0;
			}
			.app_area a
			{
			margin-right: 5px;
			}
		</style>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
		<script type="text/javascript">
			$(window).scroll(function(){
			 if ($(this).scrollTop() > 50) {
			    $('.top_panel_middle').addClass('newClass');
			 } else {
			    $('.top_panel_middle').removeClass('newClass');
			 }
			});
		</script>
		<link rel='stylesheet' id='essential-grid-plugin-settings-css'  href='wp-content/plugins/essential-grid/public/assets/css/settingsa7f4.css?ver=2.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='tp-open-sans-css'  href='http://fonts.googleapis.com/css?family=Open+Sans%3A300%2C400%2C600%2C700%2C800&amp;ver=4.7.8' type='text/css' media='all' />
		<link rel='stylesheet' id='tp-raleway-css'  href='http://fonts.googleapis.com/css?family=Raleway%3A100%2C200%2C300%2C400%2C500%2C600%2C700%2C800%2C900&amp;ver=4.7.8' type='text/css' media='all' />
		<link rel='stylesheet' id='tp-droid-serif-css'  href='http://fonts.googleapis.com/css?family=Droid+Serif%3A400%2C700&amp;ver=4.7.8' type='text/css' media='all' />
		<link rel='stylesheet' id='sb_instagram_styles-css'  href='wp-content/plugins/instagram-feed/css/sb-instagram.minb493.css?ver=1.4.8' type='text/css' media='all' />
		<link rel='stylesheet' id='rs-plugin-settings-css'  href='wp-content/plugins/revslider/public/assets/css/settingsc225.css?ver=5.4.1' type='text/css' media='all' />
		<style id='rs-plugin-settings-inline-css' type='text/css'>
			#rs-demo-id {}
		</style>
		<link rel='stylesheet' id='woocommerce-layout-css'  href='wp-content/plugins/woocommerce/assets/css/woocommerce-layout32bb.css?ver=2.6.14' type='text/css' media='all' />
		<link rel='stylesheet' id='woocommerce-smallscreen-css'  href='wp-content/plugins/woocommerce/assets/css/woocommerce-smallscreen32bb.css?ver=2.6.14' type='text/css' media='only screen and (max-width: 768px)' />
		<link rel='stylesheet' id='woocommerce-general-css'  href='wp-content/plugins/woocommerce/assets/css/woocommerce32bb.css?ver=2.6.14' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-font-google_fonts-style-css'  href='http://fonts.googleapis.com/css?family=Vidaloka:400|Open+Sans:300,300italic,400,400italic,700,700italic|Montserrat:300,300italic,400,400italic,700,700italic&amp;subset=latin,latin-ext' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-fontello-style-css'  href='wp-content/themes/unicaevents/css/fontello/css/fontello.css' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-main-style-css'  href='wp-content/themes/unicaevents/style.css' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-animation-style-css'  href='wp-content/themes/unicaevents/fw/css/core.animation.css' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-shortcodes-style-css'  href='wp-content/themes/unicaevents/shortcodes/theme.shortcodes.css' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-skin-style-css'  href='wp-content/themes/unicaevents/skins/default/skin.css' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-custom-style-css'  href='wp-content/themes/unicaevents/fw/css/custom-style.css' type='text/css' media='all' />
		<style id='unicaevents-custom-style-inline-css' type='text/css'>
			.sidebar_outer_logo .logo_main,.top_panel_wrap .logo_main,.top_panel_wrap .logo_fixed{height:50px} 
		</style>
		<link rel='stylesheet' id='unicaevents-responsive-style-css'  href='wp-content/themes/unicaevents/css/responsive.css' type='text/css' media='all' />
		<link rel='stylesheet' id='theme-skin-responsive-style-css'  href='wp-content/themes/unicaevents/skins/default/skin.responsive.css' type='text/css' media='all' />
		<link rel='stylesheet' id='mediaelement-css'  href='wp-includes/js/mediaelement/mediaelementplayer.min51cd.css?ver=2.22.0' type='text/css' media='all' />
		<link rel='stylesheet' id='wp-mediaelement-css'  href='wp-includes/js/mediaelement/wp-mediaelement.mine049.css?ver=4.7.8' type='text/css' media='all' />
		<link rel='stylesheet' id='js_composer_front-css'  href='wp-content/plugins/js_composer/assets/css/js_composer.minc721.css?ver=5.1' type='text/css' media='all' />
		<script type='text/javascript' src='wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4'></script>
		<script type='text/javascript' src='wp-includes/js/jquery/jquery-migrate.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='wp-content/plugins/essential-grid/public/assets/js/lightboxa7f4.js?ver=2.0.8'></script>
		<script type='text/javascript' src='wp-content/plugins/essential-grid/public/assets/js/jquery.themepunch.tools.mina7f4.js?ver=2.0.8'></script>
		<script type='text/javascript' src='wp-content/plugins/essential-grid/public/assets/js/jquery.themepunch.essential.mina7f4.js?ver=2.0.8'></script>
		<script type='text/javascript' src='wp-content/plugins/revslider/public/assets/js/jquery.themepunch.revolution.minc225.js?ver=5.4.1'></script>
		<script type='text/javascript'>
			/* <![CDATA[ */
			var wc_add_to_cart_params = {"ajax_url":"\/wp-admin\/admin-ajax.php","wc_ajax_url":"\/?wc-ajax=%%endpoint%%","i18n_view_cart":"View Cart","cart_url":"http:\/\/unicaevents.ancorathemes.com\/cart\/","is_cart":"","cart_redirect_after_add":"no"};
			/* ]]>
		</script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min32bb.js?ver=2.6.14'></script>
		<script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cartc721.js?ver=5.1'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/photostack/modernizr.min.js'></script>
		<link rel='https://api.w.org/' href='wp-json/index.html' />
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
		<link rel="canonical" href="index.html" />
		<link rel='shortlink' href='index.html' />
		<link rel="alternate" type="application/json+oembed" href="wp-json/oembed/1.0/embedd5a6.json?url=http%3A%2F%2Funicaevents.ancorathemes.com%2F" />
		<link rel="alternate" type="text/xml+oembed" href="wp-json/oembed/1.0/embed6796?url=http%3A%2F%2Funicaevents.ancorathemes.com%2F&amp;format=xml" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"></script>
		<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1445946460653{background-color: rgba(242,242,244,0.8) !important;*background-color: rgb(242,242,244) !important;}.vc_custom_1446027109651{border-top-width: 4px !important;background-image: url(wp-content/uploads/2015/10/Rectangle-6-copyf23d.jpg?id=199) !important;border-top-color: rgba(39,37,48,0.15) !important;border-top-style: solid !important;}.vc_custom_1446032902066{background-color: #f5f5f6 !important;}.vc_custom_1446813363327{background-image: url(http://unicaevents.ancorathemes.com/wp-content/uploads/2015/10/er1.jpg?id=954) !important;}.vc_custom_1446045661779{background-color: #f5f5f6 !important;}</style>
		<noscript>
			<style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style>
		</noscript>
		<style>
			.top_panel_middle .menu_main_wrap {
			margin-top: 3em;
			}
		</style>
		<script type="text/javascript">
			var ajaxRevslider;
			
			jQuery(document).ready(function() {
				// CUSTOM AJAX CONTENT LOADING FUNCTION
				ajaxRevslider = function(obj) {
					
					var content = "";
			
					data = {};
					
					data.action = 'revslider_ajax_call_front';
					data.client_action = 'get_slider_html';
					data.token = '382673bea1';
					data.type = obj.type;
					data.id = obj.id;
					data.aspectratio = obj.aspectratio;
					
					// SYNC AJAX REQUEST
					jQuery.ajax({
						type:"post",
						url:"http://unicaevents.ancorathemes.com/wp-admin/admin-ajax.php",
						dataType: 'json',
						data:data,
						async:false,
						success: function(ret, textStatus, XMLHttpRequest) {
							if(ret.success == true)
								content = ret.data;								
						},
						error: function(e) {
							console.log(e);
						}
					});
					
					 // FIRST RETURN THE CONTENT WHEN IT IS LOADED !!
					 return content;						 
				};
				
				// CUSTOM AJAX FUNCTION TO REMOVE THE SLIDER
				var ajaxRemoveRevslider = function(obj) {
					return jQuery(obj.selector+" .rev_slider").revkill();
				};
			
				// EXTEND THE AJAX CONTENT LOADING TYPES WITH TYPE AND FUNCTION
				var extendessential = setInterval(function() {
					if (jQuery.fn.tpessential != undefined) {
						clearInterval(extendessential);
						if(typeof(jQuery.fn.tpessential.defaults) !== 'undefined') {
							jQuery.fn.tpessential.defaults.ajaxTypes.push({type:"revslider",func:ajaxRevslider,killfunc:ajaxRemoveRevslider,openAnimationSpeed:0.3});   
						}
					}
				},30);
			});
		</script>
	</head>
	<body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive">
		<div class="body_wrap" style="background-color: #CD714F;">
			<div class="page_wrap">
				<div class="top_panel_fixed_wrap"></div>
				<?php include("include/header.php"); ?>
				<section >
<style type="text/css">
.form-style-6{
	font: 95% Arial, Helvetica, sans-serif;
  /*max-width: 100%;
    margin: -4% 32%;
    padding: 94px 1%;*/
}
.form-style-6 h1{
    background: #248086;
    padding: 20px 0;
    font-size: 140%;
    font-weight: 300;
    text-align: center;
    color: #fff;
    margin: -16px -16px 16px -16px;
}
.form-style-6 input[type="text"],
.form-style-6 input[type="date"],
.form-style-6 input[type="datetime"],
.form-style-6 input[type="email"],
.form-style-6 input[type="number"],
.form-style-6 input[type="search"],
.form-style-6 input[type="time"],
.form-style-6 input[type="url"],
.form-style-6 input[type="file"],
.form-style-6 textarea,
.form-style-6 select 
{
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    background: #fff;
    margin-bottom: 4%;
    border: 1px solid #ccc;
    padding: 1%;
    color: #555;
    font: 95% Arial, Helvetica, sans-serif;
    /*height:35px;*/
}
.form-style-6 input[type="text"]:focus,
.form-style-6 input[type="date"]:focus,
.form-style-6 input[type="datetime"]:focus,
.form-style-6 input[type="email"]:focus,
.form-style-6 input[type="number"]:focus,
.form-style-6 input[type="search"]:focus,
.form-style-6 input[type="time"]:focus,
.form-style-6 input[type="url"]:focus,
.form-style-6 input[type="file"]:focus,
.form-style-6 textarea:focus,
.form-style-6 select:focus
{
    box-shadow: 0 0 5px #43D1AF;
    padding: 3%;
    border: 1px solid #43D1AF;
    height:35px;
}

.form-style-6 input[type="submit"],
.form-style-6 input[type="button"]{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #248086;
    border-bottom: 2px solid #248086;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;    
    color: #fff;
}
.form-style-6 input[type="submit"]:hover,
.form-style-6 input[type="button"]:hover{
    background: #2EBC99;
}

.my-container {
    position: relative;
    background: #5C97FF;
    overflow: hidden;
}
.my-container:before {
    content: ' ';
    display: block;
    position: absolute;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    z-index: 1;
    opacity: 0.6;
    background-image: url('images/image-banner.jpg');
    background-repeat: no-repeat;
    background-position: 40% 0;
    -ms-background-size: cover;
    -o-background-size: cover;
    -moz-background-size: cover;
    -webkit-background-size: cover;
    background-size: cover;
}
form{
    margin-top: 30%;
    margin-bottom: 30%;
}
.my-container form {
   /* width: 463px;*/
    /*padding: 50px;*/
    text-align: center;
    z-index: 2;
    position: relative;
} 

form p{
    font: 95% Arial, Helvetica, sans-serif;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    width: 100%;
    padding: 3%;
    background: #248086;
    border-bottom: 2px solid #fcb41e;
    border-top-style: none;
    border-right-style: none;
    border-left-style: none;
    color: #fff;
    font-size: 20px;
}

</style>            
				<div class="my-container">
				
                    <div class="form-style-6" >
					<div class="col-md-6 col-md-offset-3" style="margin-top: 35px;  margin-bottom: 35px;">
                    <form action="addEventscript.php" method="POST"  enctype="multipart/form-data">
                        <p>Create Event</p>
                       
                         <div class="row">
                        <div class="col-sm-6">
                                <input type="text" id="event_name" name="event_name" class="form-control" placeholder="Event Name" required/>
                            </div>
                        <div class="col-sm-6">
                                <input type="text" id="city" name="city" class="form-control" placeholder="City Name" required/>
                            </div>
                            </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-control" name="cat_id" id="cat_id" style="height:33px" required/>
									<option selected disabled value="">Select Event Category</option>
                                    <?php
                                        $selectCat = $cnn -> getrows("SELECT *FROM category_master");
                                        while($getCat = mysqli_fetch_array($selectCat))
                                        {
                                    ?>
									<option value="<?php echo $getCat['cat_id']; ?>"><?php echo $getCat['cat_name']; ?></option>
									<?php } ?>
								</select>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" style="height:33px" id="locality" name="event_address" onFocus="initializeAutocomplete()"   placeholder="Event Address" required/>
                            </div>
                        </div>
                       
                       <div class="row">
							<div class="col-sm-6">
                                <span style="float:left;color:white;"><b>Latitude</b></span>            
								<input type="text" class="form-control" style="cursor:not-allowed;" name="latitude" id="latitude" readonly placeholder="Latitude"  required/>	
							</div>
							<div class="col-sm-6">
                                <span style="float:left;color:white;"><b>Longitude</b></span>
								<input type="text" class="form-control" style="cursor:not-allowed;" name="longitude" id="longitude" readonly placeholder="Longitude" required/>
							</div>
                       </div>
                       
                       
						<div class="row" style="">
							<div class="col-sm-6">
                                <span style="float:left;color:white;"><b>Start Date</b></span>            
								<input type="text" class="form-control" name="start_date" id="datepicker1" placeholder="dd/mm/yyyy"  required/>	
							</div>
							<div class="col-sm-6">
                                <span style="float:left;color:white;"><b>End Date</b></span>
								<input type="text" class="form-control" name="end_date" id="datepicker2" placeholder="dd/mm/yyyy" required/>
							</div>
                       </div>
                        <div class="row">
                            <div class="col-sm-6">
							 <span style="float:left;color:white;"><b>From</b></span> 
                                <input type="time" class="form-control" id="event_time1" name="event_time" value="10:00 AM" maxlength="8" placeholder="Event Time" required/>
                            </div>
                            <div class="col-sm-6">
							 <span style="float:left;color:white;"><b>To</b></span>
                               <input type="time" class="form-control" id="event_time2" name="event_to_time" value=""  maxlength="8" placeholder="Event Time" required/>
                               <span style="color:red;font-weight:bold;" id="error"></span>                  
                            </div>
                        </div>
						<!-- <div class="row">
							<div class="col-sm-6">
								<input type="email" id="email" name="email" placeholder="E-mail" required/>
							</div>
							<div class="col-sm-6">
								<input type="text" id="city" name="city" placeholder="City" required/>
							</div>				
						</div> -->
						<div class="row">
						<div class="col-md-6">
						<input type="text" class="form-control" id="stall_charge" name="stall_charge" placeholder="Stall Charge" onkeypress="return isNumber(event)" required/>   
						</div>
						<div class="col-md-6">
						<input type="text" id="total_stall" class="form-control" name="total_stall" placeholder="Total No of Stalls" onkeypress="return isNumber(event)" required/>
						</div>
						</div>
						
						  
						                  
                        <textarea type="text" id="event_desc" class="form-control" name="event_desc" size="10" placeholder="Description" required/></textarea>
                        
                       <!-- <input type="number" id="avai_stall" name="avai_stall" style="margin-top: -2%;" placeholder="Available Stall" required/> -->
                       
                         <div style="margin-top: -3%;"><span style="float:left;color:white;"><b>Banner Image</b></span>                   
                       <input type="file" id="banner" class="form-control" name="banner" style="height:40px"  accept="image/x-png,image/gif,image/jpeg,image/png,image/jpg" required/></div>
                       <div style="margin-top: -3%;"><span style="float:left;color:white;"><b>Event Image</b></span>     <span style="color:white;">Insert Multiple Image. Size Must Be ( 1080px X 450px )</span>              
                       
                       <input class="form-control" type="file" id="images" name="images[]" style="height:40px;margin-top: -2%;"  accept="image/x-png,image/gif,image/jpeg,image/png,image/jpg" multiple required>
                   </div>
                       <?php
                       if(isset($_SESSION['email']) != "")
                       {	$user_type = $_SESSION['user_type'];
                       		if(@$user_type == "Organizer")
                       		{ ?>
                       			<input type="submit" class="form-control" id="addEvent" style="padding:0%" name="addEvent" value="Create Event" />
                       		<?php }
                       		else
                       		{ ?>
                       			<input type="button" class="form-control" id="addEvent1" style="padding:0%" onclick="alert('Only Organizer Can Create Event.');" name="addEvent1" value="Create Event" />
                       		<?php } 
                        
                        }else { ?>
                        	<input type="submit"  id="addEvent2" disabled name="addEvent2" style="padding:0%" style="padding: 0%;" value="Login To Create Event" />
                        <?php } ?>
                    </form>
                </div>
				</div>
                </div>
				</section>
				<div class="page_content_wrap page_paddings_no">
					<div class="content_wrap">
						<div class="content">
							<article class="itemscope post_item post_item_single post_featured_center post_format_standard post-133 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
							</article>
							<section class="related_wrap related_wrap_empty"></section>
						</div>
						<!-- </div> class="content"> -->
					</div>
					<!-- </div> class="content_wrap"> -->			
				</div>
				<!-- </.page_content_wrap> -->
				<!-- Footer Section Start -->
				<?php include("include/footer.php"); ?>
				<!-- Footer Section Over -->
				<!--<div class="copyright_wrap copyright_style_socials  scheme_original">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
								<div class="sc_socials_item"><a href="#"  class="social_icons social_linkedin"><span class="icon-linkedin"></span></a></div>
								<div class="sc_socials_item"><a href="#"  class="social_icons social_facebook"><span class="icon-facebook"></span></a></div>
								<div class="sc_socials_item"><a href="#"  class="social_icons social_twitter"><span class="icon-twitter"></span></a></div>
								<div class="sc_socials_item"><a href="#"  class="social_icons social_gplus"><span class="icon-gplus"></span></a></div>
							</div>
							<div class="copyright_text">
								<p><a href="#">StallBooking</a> © 2017 All Rights Reserved <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></p>
							</div>
						</div>
					</div>
				</div>-->
			</div>
			<!-- /.page_wrap -->
		</div>
		<!-- /.body_wrap -->
		<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
		<div class="custom_html_section"></div>
	
		<link rel='stylesheet' id='themepunchboxextcss-css'  href='wp-content/plugins/essential-grid/public/assets/css/lightboxa7f4.css?ver=2.0.8' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-swiperslider-style-css'  href='wp-content/themes/unicaevents/fw/js/swiper/swiper.css' type='text/css' media='all' />
		<link rel='stylesheet' id='unicaevents-messages-style-css'  href='wp-content/themes/unicaevents/fw/js/core.messages/core.messages.css' type='text/css' media='all' />
		<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
		<script type='text/javascript' src='wp-content/plugins/instagram-feed/js/sb-instagram.minb493.js?ver=1.4.8'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min32bb.js?ver=2.6.14'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min32bb.js?ver=2.6.14'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/superfish.min.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/jquery.slidemenu.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.utils.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.init.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/js/theme.init.js'></script>
		<script type='text/javascript' src='wp-includes/js/mediaelement/mediaelement-and-player.min51cd.js?ver=2.22.0'></script>
		<script type='text/javascript' src='wp-includes/js/mediaelement/wp-mediaelement.mine049.js?ver=4.7.8'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.googlemap.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/social/social-share.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.debug.js'></script>
		<script type='text/javascript' src='wp-includes/js/wp-embed.mine049.js?ver=4.7.8'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/shortcodes/theme.shortcodes.js'></script>
		<script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/dist/js_composer_front.minc721.js?ver=5.1'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/swiper/swiper.jquery.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.messages/core.messages.js'></script>
		<!--<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.messages/core.messages.js'></script>-->
		
		<script type="text/javascript">
		  function initializeAutocomplete(){
		    var input = document.getElementById('locality');
		    // var options = {
		    //   types: ['(regions)'],
		    //   componentRestrictions: {country: "IN"}
		    // };
		    var options = {}
		
		    var autocomplete = new google.maps.places.Autocomplete(input, options);
		
		    google.maps.event.addListener(autocomplete, 'place_changed', function() {
		      var place = autocomplete.getPlace();
		      var lat = place.geometry.location.lat();
		      var lng = place.geometry.location.lng();
		      var placeId = place.place_id;
		      // to set city name, using the locality param
		      var componentForm = {
		        locality: 'short_name',
		      };
		      for (var i = 0; i < place.address_components.length; i++) {
		        var addressType = place.address_components[i].types[0];
		        if (componentForm[addressType]) {
		          var val = place.address_components[i][componentForm[addressType]];
		          document.getElementById("city").value = val;
		        }
		      }
		      document.getElementById("latitude").value = lat;
		      document.getElementById("longitude").value = lng;
		      document.getElementById("location_id").value = placeId;
		    });
		  }
		</script>
		<script>        
          		function isNumber(evt) {
    			evt = (evt) ? evt : window.event;
    			var charCode = (evt.which) ? evt.which : evt.keyCode;
    			if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        			return false;
    			}
   			 return true;
		}
       		</script>
		<script>
			function getValue(obj)
			{
			    if(obj.value == "Organizer")
			    {
			        document.getElementById("eventname").style.display = "block";
			        document.getElementById("event_description").style.display = "block";
			    }
			    else
			    {
			        document.getElementById("eventname").style.display = "none";
			        document.getElementById("event_description").style.display = "none";
			    }
			}
		</script>
		<script>
		$(document).ready(function(){
			$("#stall_charge").keyup(function(){
				var stall_charge = $("#stall_charge").val();
				if(stall_charge > 100000)
				{
					alert('Enter Amount Less Then 100000');
					$("#stall_charge").val('');
					$("#stall_charge").focus();
				}
			});
		});
		</script>
		<script>
		$(document).ready(function(){
			$("#total_stall").keyup(function(){
				var total_stall = $("#total_stall").val();
				if(total_stall > 1000)
				{
					alert('Enter Amount Less Then 1000');
					$("#total_stall").val('');
					$("#total_stall").focus();
				}
			});
		});
		</script>
		<script>
		$(document).ready(function(){
			//$("#datepicker1").datepicker({ minDate: 0 });
			
			$( "#datepicker1" ).datepicker({
			defaultDate: "+1w",
			minDate: 0,
			firstDay: 0,
			dateFormat: 'dd/mm/yy',
			changeMonth: true,
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
				
							
				var minDate = $(this).datepicker('getDate');
		        var newMin = new Date(minDate.setDate(minDate.getDate() + 1));
				$( "#datepicker2" ).datepicker( "option", "minDate", newMin );
			}
		});
		$( "#datepicker2" ).datepicker({
			defaultDate: "+1w",
			minDate: '+2d',
			changeMonth: true,
			firstDay: 0,
			dateFormat: 'dd/mm/yy',
			numberOfMonths: 1,
			onClose: function( selectedDate ) {
		        var maxDate = $(this).datepicker('getDate');
		        var newMax  = new Date(maxDate.setDate(maxDate.getDate() - 1));
				$( "#datepicker1" ).datepicker( "option", "maxDate",  newMax);
			}
		});
		
		//$("#datepicker1").datepicker('setDate', '+1');
		//$("#datepicker2").datepicker('setDate', '+8');
		});
		</script>
		<script>
		$(document).ready(function(){
			$("#event_time2").val("08:00 PM");
			$("#event_time2").keyup(function(){
				var event_time1 = $("#event_time1").val();
				var event_time2 = $("#event_time2").val();
				var a = "01/01/1990 "+event_time1;
				var b = "01/01/1990 "+event_time2;
				
				var aDate = new Date(a).getTime();
				var bDate = new Date(b).getTime();
				
				if(aDate < bDate){
				    //console.log('a happened before b');
				     $("#error").text('');
				}else if (aDate > bDate){
				    //console.log('a happend after b');
				     $("#error").text('Please Enter Time Greater Then From Time.');
				    //$("#event_time2").val("08:00 PM");
				}else{
				    //console.log('a and b happened at the same time');
				   
				}
			});
		});
		</script>
	</body>
</html>