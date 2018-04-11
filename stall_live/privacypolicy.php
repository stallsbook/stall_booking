<?php
include("../include/config.php"); 
$cnn = new connection(); 
 session_start();
 ?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" href="images/favicon.ico">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="xmlrpc.php" />
		<title>Stall Booking</title>
		<link rel='dns-prefetch' href='http://maps.google.com/' />
		<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
		<link rel='dns-prefetch' href='http://s.w.org/'/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<!-- <link rel="stylesheet" href="css/style.css"> -->
		<link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/animate.css" />
		<link href="css/styles.css" rel="stylesheet">
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
		.text-upper {
    text-transform: uppercase;
	    color:#fff;
}
span.atma-span {
    font-family: 'Atma', cursive;
    font-weight: 600;
    font-size: 24px;
}

.green {
    color: #fff;
}
		</style>
	</head>
	<body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive">
		<div class="body_wrap" >
			<div class="page_wrap" >
				<div class="top_panel_fixed_wrap"></div>
				<?php include("include/header.php"); ?>	
				<!--section>
				<br>
			
					<div class="banner" style="background: url(../images/section-info2_bg.jpg) top left repeat;color: #ffffff;">
						
						<div style="background:url(../images/section-info2.png)top left repeat;background-position:right; height: 350px;
    background-repeat: no-repeat;  display: block;" >
                         <h3 style="margin-left: 99px;padding-top: 50px; margin-bottom: -65px;color: black;" class="text-upper">We create <span class="atma-span green">the atmosphere</span> you wish<br> to offer to your child and friends.</h3>
						</div>
						</div>
				</section-->
				
				<div class=" ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <center><h2 class="section-heading">Privacy & Policy </h2></center>
                            <p >StallsBook is a technology platform for Event Discovery, Stall Booking and Payment Tracking. </p>
							<p>The term 'Stallsbook.com' or 'us' or 'we' refers to the owner of the website / App. The term 'you' refers to the user or viewer of our website / App.</p>
							<p>This privacy policy sets out how StallsBook uses and protects any information that you enter when you use this website / App.</p>
							<p>StallsBook is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website / App, then you can be assured that it will only be used in accordance with this privacy statement.</p>
							<p>StallsBook may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes. </p>
                           
                            <!-- END .counter-section -->
							<br>
							<h4><b>What we collect</b></h4>
							<p>We may collect the following information:</p>
							<p>During Sign up:</p>
							<ul style="list-style-type:circle">
							<li>Full Name </li>
							<li>Contact information including Email and Mobile no </li>
							<li>Your Gender</li>
							<li>Organizer company/Vendor line of business</li>
							<li>Demographic information such as Address</li>
							<li>Profile photo</li>
							</ul>
							<p>During Create event: This option is enabled only for the organizer</p>
							<p>The information you provide to host your event includes your Event name, Event category, Event address, event timings, Stall Chargers, Total stalls, Event banner and Event images</p>
							<br>
							<h4><b>What we do with the information we gather</b></h4>
							<ul style="list-style-type:circle">
							<li>We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:</li>
							<li>Internal record keeping. </li>
							<li>We may use the information to improve our products and services.</li>
							<li>We may periodically send promotional emails about new products, special offers or other information which we think you may find interesting using the email address which you have provided.</li>
							<li>From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone. We may use the information to customize the website / App according to your interests.</li>
							<li>Security</li>
							<li>We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online. </li>
							</ul>
							
							<br>
							<h4><b>How we use cookies</b></h4>
							<ul style="list-style-type:circle">
							<li>A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences. </li>
							<li>We use traffic log cookies to identify which pages are being used. This helps us analyse data about web page traffic and improve our website / App in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system. </li>
							<li>Overall, cookies help us provide you with a better website / App, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us. </li>
							<li>You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website / App.</li>
							
							</ul>
							
							<br>
							<h4><b>Controlling your personal information</b></h4>
							<ul style="list-style-type:circle">
							<li>All organizer please note that we don’t want to be the mediator between you and the vendor, our website / App and App allows vendors to contact you directly from your event page, however your contact information is not exposed otherwise if you have not created any event. </li>
							<li>All Vendors please not that, once your booking for a particular event is conformed organizer is allowed access your contact information, however your contact information is not exposed to any one until you have made any bookings.</li>
							<li>The other information like organizer profile photo, vendor profile photo, event images and the vendor business images are viewable for all</li>
												
							</ul>
							<p>We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law to do so. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen.</p>
							<p>If you believe that any information we are holding on you is incorrect or incomplete, please write to our email stallsbook@gmail.com as soon as possible. We will promptly correct any information found to be incorrect.</p>
							<br>
							<h4><b>Disclaimer Policy</b></h4>
							<ul style="list-style-type:circle">
							<li>StallsBook makes no warranty that:</li>
								<ol type="I">
								  <li>the services will meet your requirements,</li>
								  <li>the services will be uninterrupted, timely, secure, or error-free,</li>
								  <li>the results that may be obtained from the use of the services will be accurate of reliable,</li>
								  <li>the quality, safety or legality of any content, products, services, information or other material purchased or obtained by you or events attended, through the services, or the services themselves (or any part thereof), will meet your expectations, or</li>
								  <li>any errors in the services will be corrected./li>
								</ol>  
								<li>StallsBook is not responsible and shall have no liability for the content, products, services, actions or inactions of any user, buyer or other non-organizer, organizer or third party before, during and/or after an event</li>	
								<li>StallsBook will have no liability with respect to any warranty disclaimed in (i) through (v) above mentioned.</li>	
								<li>You acknowledge that StallsBook has no control over and does not guarantee the quality, safety or legality of events advertised, the truth or accuracy of any users (including buyers, other non-organizers and organizers) content or listings, or the ability of any user (including buyers, other non-organizers and organizers) to perform or actually complete a transaction. The foregoing disclaimers shall not apply to the extent prohibited by applicable law./li>									
							</ul>
							</br>
							
							
                        </div>
                      
						
					</div>
					
                </div>
                <!-- END .container -->
            </div>
			
		
		
		
			
			
			
			
			
			<?php include("include/footer.php") ?>
				
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
		</body>
	
</html>
	
				