<?php
	include("../include/config.php"); 
	include("../include/session.php"); 
	$cnn = new connection();
	session_start();
    $user_id = $_SESSION['user_id'];
    $user_type = $_SESSION['user_type'];
    $selectUser = $cnn -> getrows("SELECT * FROM user_master WHERE user_id = '$user_id'");
    $viewUser = mysqli_fetch_array($selectUser);    
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" href="images/favicon.png">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="xmlrpc.php" />
		<title>StallsBook</title>
		<link rel='dns-prefetch' href='http://maps.google.com/' />
		<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
		<link rel='dns-prefetch' href='http://s.w.org/'/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link href="css/styles.css" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="css/contactus/util.css">
        <link rel="stylesheet" type="text/css" href="css/contactus/main.css">
        <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
		<script type="text/javascript">
			$(window).scroll(function(){
			 if ($(this).scrollTop() > 50) {
			    $('.top_panel_middle').addClass('newClass');
			 } else {
			    $('.top_panel_middle').removeClass('newClass');
			 }
			});
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">></script>
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
			.sidebar_outer_logo .logo_main,.top_panel_wrap .logo_main,.top_panel_wrap .logo_fixed{height:50px} .contacts_wrap .logo img{height:30px}
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
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/add-to-cart.min32bb.js?ver=2.6.14'></script>
		<script type='text/javascript' src='wp-content/plugins/js_composer/assets/js/vendors/woocommerce-add-to-cartc721.js?ver=5.1'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/photostack/modernizr.min.js'></script>
		<link rel='https://api.w.org/' href='wp-json/index.php' />
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="xmlrpc0db0.php?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="wp-includes/wlwmanifest.xml" />
		<link rel="canonical" href="index.php" />
		<link rel='shortlink' href='index.php' />
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
			/*margin-top: -2em;*/
			}
			.top_panel_middle{
				border-bottom: 1px solid #16121226;
			}
		</style>
		<style type="text/css">
			.main-text
			{
			position: absolute;
			top: 50px;
			width: 96.66666666666666%;
			color: #FFF;
			}
			.btn-min-block
			{
			min-width: 170px;
			line-height: 26px;
			}
			.btn-clear
			{
			color: #FFF;
			background-color: transparent;
			border-color: #FFF;
			margin-right: 15px;
			}
			.btn-clear:hover
			{
			color: #000;
			background-color: #FFF;
			}
			.carousel-control.left {
			background: none;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
			background-repeat: repeat-x;
			}
			.carousel-control.right {
			background: none;
			filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#80000000', endColorstr='#00000000', GradientType=1);
			background-repeat: repeat-x;
			}
        </style>
        <style>
			.scheme_original input[type="text"], .scheme_original input[type="tel"], .scheme_original input[type="number"], .scheme_original input[type="email"], .scheme_original input[type="search"], .scheme_original input[type="password"], .scheme_original select, .scheme_original textarea {
			/* border-color: #f5f5f5; */
		}
        
        </style>
         
	</head>
	<body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive" style="height:auto;">
		<div class="body_wrap" style="background-color: #CD714F;">
			<div class="page_wrap">
				<div class="top_panel_fixed_wrap"></div>
				<?php include("include/header.php"); ?>
				<div class="container">
					<h1>Edit Profile</h1>
					<hr>
					<form action="editProfileScript.php" method="POST" class="form-horizontal" role="form" enctype="multipart/form-data">
					<div class="row">
						<div class="col-md-9">
						
						<div class="form-group">
							<label class="col-lg-3 control-label">First name:</label>
							<div class="col-lg-8">
								<input class="form-control" name="first_name" type="text" value="<?php echo $viewUser['first_name']; ?>" required>
							</div>
						</div>
						<input class="form-control" type="hidden" name="user_id" value="<?php echo $viewUser['user_id']; ?>">
						<!--<div class="form-group">
							<label class="col-lg-3 control-label">Last name:</label>
							<div class="col-lg-8">
								<input class="form-control" name="last_name" type="text" value="<?php echo $viewUser['last_name']; ?>" required/>
							</div>
						</div>-->
						
						<div class="form-group">
							<label class="col-lg-3 control-label">Mobile:</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" name="mobile" value="<?php echo $viewUser['mobile']; ?>" onkeypress="return isNumber(event)"  maxlength="10" required>
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">State:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="state"  value="<?php echo $viewUser['state']; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">City:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="city"  value="<?php echo $viewUser['city']; ?>" required>
							</div>
						</div>
						
						<div class="form-group" style="display:none">
							<label class="col-md-3 control-label">Company Name:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="event_org_cmp_name" value="<?php echo $viewUser['event_org_cmp_name']; ?>" required>
							</div>
						</div>
						<?php
						if(@$user_type=='Vendor')
						{ ?>
						<div class="form-group" style="">
							<label class="col-md-3 control-label">Line Of Business:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="event_org_cmp_name" value="<?php echo $viewUser['event_org_cmp_name']; ?>" required>
							</div>
						</div>
						<?php } 
						if(@$user_type=='Organizer')
						{ ?>
						<div class="form-group" style="">
							<label class="col-md-3 control-label">Company Name:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="event_org_cmp_name" value="<?php echo $viewUser['event_org_cmp_name']; ?>" required>
							</div>
						</div>
						<?php } ?>
						
						<div class="form-group">
							<label class="col-md-3 control-label">Descripation:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="description" value="<?php echo $viewUser['description']; ?>" >
							</div>
						</div>
						
						
						
						<div class="form-group">
							<label class="col-md-3 control-label">Address:</label>
							<div class="col-md-8">
								<input class="form-control" type="text"  name="address"  value="<?php echo $viewUser['address']; ?>" required>
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-3 control-label">Change Password:</label>
							<div class="col-md-8">
								<input class="form-control" type="text" name="password"  value="<?php echo $viewUser['password']; ?>" required>
							</div>
						</div>
						
					</div>
					<?php
						if(@$user_type=='Vendor')
						{ ?>
						
						
					<div class="col-md-3 personal-info">
						<div class="text-center">
						<!--<div id="blah" class="avatar img-circle" ></div>-->
							<img id="blah" class="avatar img-circle" style="background-image: url('<?php echo $viewUser['image']; ?>');background-size: cover;background-repeat: no-repeat; padding:25%;background-position: center;">
							<h6>Upload a photo...</h6>
							<input class="form-control" type="file" id="image" name="image" >
						</div>
						<br>
						
						
							<div class="text-center">
								
								<h6>Business Picture</h6>
								<?php 
								$imgimg = explode(",",$viewUser['business_image']);
								foreach($imgimg as $photo1)
								{
								?>
								<img src="images/userProfile/<?php echo $photo1; ?>" class="avatar img-thumbnail" alt="avatar" style="height: 70px; width: 105px;margin-bottom:2px;">
								<?php } ?>
								<input class="form-control" type="file" id="biz_photo" name="biz_photo[]" multiple>
							</div>
						
						
					</div>
					<?php } 
					if(@$user_type=='Organizer')
						{ ?>
						<div class="col-md-3 personal-info">
						<div class="text-center">
							<img src="<?php echo $viewUser['image']; ?>" id="blah" class="avatar img-circle" alt="avatar" style="
    height: 206px; width: 200px;">
							<h6>Upload a photo...</h6>
							<input class="form-control" type="file" id="image" name="image" >
						</div>
					</div>
					<?php } ?>
					<div class="form-group">
							<label class="col-md-3 control-label"></label>
							<div class="col-md-8">
							<center>
								<button type="submit" name="profile" class="btn btn-primary" value="Save Changes">Save</button>
								<a href="index.php" class="btn btn-danger" style="color:white">Cancel</a>
								</center>
							</div>
						</div>
					</form>
				</div>
			</div>
                
								
							<section class="related_wrap related_wrap_empty"></section>
						</div>
						<!-- </div> class="content"> -->
					</div>
					<!-- </div> class="content_wrap"> -->			
				</div>
				<!-- </.page_content_wrap> -->
                <!-- Footer Section Start -->
                <div style="">
                    <?php include("include/footer.php") ?>
                </div>
				<!-- Footer Section Over -->
				<!-- /.footer_wrap -->
				<!--<div class="copyright_wrap copyright_style_socials  scheme_original">
					<div class="copyright_wrap_inner">
						<div class="content_wrap">
							<div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
								<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_linkedin"><span class="icon-linkedin"></span></a></div>
								<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_facebook"><span class="icon-facebook"></span></a></div>
								<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_twitter"><span class="icon-twitter"></span></a></div>
								<div class="sc_socials_item"><a href="#" target="_blank" class="social_icons social_gplus"><span class="icon-gplus"></span></a></div>
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
		<script type='text/javascript' src='wp-content/plugins/instagram-feed/js/sb-instagram.minb493.js?ver=1.4.8'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-blockui/jquery.blockUI.min44fd.js?ver=2.70'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/woocommerce.min32bb.js?ver=2.6.14'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/jquery-cookie/jquery.cookie.min330a.js?ver=1.4.1'></script>
		<script type='text/javascript' src='wp-content/plugins/woocommerce/assets/js/frontend/cart-fragments.min32bb.js?ver=2.6.14'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/superfish.min.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/jquery.slidemenu.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.utils.js'></script>
		<script type='text/javascript' src='wp-content/themes/unicaevents/fw/js/core.init.js'></script>
		<script type='text/javascript' src='js/theme.init.js'></script>
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
		<script>
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		
		        reader.onload = function (e) {
		            $('#blah').attr('src', e.target.result);
		        }
		
		        reader.readAsDataURL(input.files[0]);
		    }
		}
		
		$("#image").change(function(){
		    readURL(this);
		});
		
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
	</body>
</html>