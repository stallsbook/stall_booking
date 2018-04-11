<?php
	include("../include/config.php"); 
	 //include("include/session.php"); 
	 session_start();
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
			
					<div class="banner" style="background: url(../images/section-info2_bg.jpg) top left repeat;color: #ffffff;  margin-top: -35px;">
						
						<div style="background:url(../images/section-info2.png)top left repeat;background-position:right; height: 350px;
    background-repeat: no-repeat;  display: block;" >
                         <h3 style="margin-left: 99px;padding-top: 50px; margin-bottom: -65px;color: black;" class="text-upper">We create <span class="atma-span green">the atmosphere</span> you wish<br> to offer to your child and friends.</h3>
						</div>
						</div>
				</section-->
				
				<div class=" ">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-xs-12">
                            <h2 class="section-heading"><span class="red">Who</span> We Are?</h2>
                            <p class="marginb-40">Specialized in professionnal and private event organization on the Côte d’Azur (Monaco, Nice, Cannes, Saint-Tropez, …)<br> Jingle Academy Events welcomes you from conception to realization of your project :<strong> birthday, private party, theme party,christmas party, baby party</strong>                                …<br><br> Our professionnal team puts at your disposal their competences, creativity, and experiences to success your personnalized event.<br><br>We suggest you a large choice of services: <strong>DJ, musicians, singers, dancers, decorations, blazes, pyrotechnic shows, photographer...</strong>                                </p>
                            <div class="counter-section2 row text-center marginb-60 clearfix">
                                <div class="col-md-3 col-md-3 col-md-12">
                                    <div class="counters">
                                        <div class="statsbar text-center article">
                                            <div class="stat-symbol-before green"></div>
                                            <div class="stat-number green clearfix" data-from="0" data-to="80" data-speed="2000"></div>
                                            <div class="stat-symbol-after blue">+</div>
                                            <div class="stat-title">
                                                <h3>Event</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-3 col-md-12">
                                    <div class="counters">
                                        <div class="statsbar text-center article">
                                            <div class="stat-symbol-before green"></div>
                                            <div class="stat-number green clearfix" data-from="0" data-to="500" data-speed="2000"></div>
                                            <div class="stat-symbol-after red">+</div>
                                            <div class="stat-title">
                                                <h3>Organization</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-3 col-md-12">
                                    <div class="counters">
                                        <div class="statsbar text-center article">
                                            <div class="stat-symbol-before yellow"></div>
                                            <div class="stat-number yellow clearfix" data-from="0" data-to="500" data-speed="2000"></div>
                                            <div class="stat-symbol-after yellow">+</div>
                                            <div class="stat-title">
                                                <h3>Vendor</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3 col-md-3 col-md-12">
                                    <div class="counters">
                                        <div class="statsbar text-center article">
                                            <div class="stat-symbol-before blue"></div>
                                            <div class="stat-number blue clearfix" data-from="0" data-to="99" data-speed="2000"></div>
                                            <div class="stat-symbol-after blue">%</div>
                                            <div class="stat-title">
                                                <h3>Successful..</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END .counter-section -->
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12 ">
						
						  <img src="../images/about_01.jpg" style="margin-left: px;width:80%"class="img-responsive center-block" alt="">
                        </div>
						
						
					</div>
					
                </div>
                <!-- END .container -->
            </div>
			
			<div class="section-info our_parties-section2 text-center clearfix" style="background: url(../images/our-parties-background.png) top left repeat;">
			<div class="container" >
			<div class="col-md-12 " style="text-align:center;">		
                <h2 class="section-heading">Our <span class="red">Animators</span></h2>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s, when an unknown printer took a galley<br> of type and scrambled it to make a type
                    specimen book.</p>
               <br>
			    <br>
                    </div>
			</div>
			</div>
		
		<div class="section-info section-padding paddingb-80 our_entertaiment text-center clearfix " >
                <div class="container">
                    <h2 class="section-heading paddingt-70">  <span class="red">Events</span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown..</p>
                    <div class="features2 margint-50 marginb-70 clearfix">
                        <div class="col-md-3 col-sm-3 col-xa-12">
                            <div class="col-features2 marginb-30 text-center clearfix">
                                <div class="article-icon">
                                    <!-- If you want to use font-awesome icon -->
                                    <div class="icon clearfix">
                                        <i class="fa fa-star-o fa-icon green-bg"></i>
                                    </div>
                                    <!-- If you want to use image icon 
                    <div class="img-icon clearfix">
                      <div class="img-icon-circle blue-bg">
                        <img width="40" height="40" src="images/features2-img-icon.png" alt="" class="img-responsive center-block">
                      </div>
                    </div>-->
                                </div>
                                <div class="article-body">
                                    <h3>Creative workshop</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown...</p>
                                </div>
                            </div>
                            <!-- END .col-features2 -->
                            <div class="col-features2 text-center clearfix">
                                <div class="article-icon">
                                    <!-- If you want to use font-awesome icon -->
                                    <div class="icon clearfix">
                                        <i class="fa fa-star-o fa-icon blue-bg"></i>
                                    </div>
                                    <!-- If you want to use image icon 
                    <div class="img-icon clearfix">
                      <div class="img-icon-circle blue-bg">
                        <img width="40" height="40" src="images/features2-img-icon.png" alt="" class="img-responsive center-block">
                      </div>
                    </div>-->
                                </div>
                                <div class="article-body">
                                    <h3>Magicians and Mentalists</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown...</p>
                                </div>
                            </div>
                            <!-- END .col-features2 -->
                        </div>
                        <!-- END .col-md-3 -->
                        <div class="col-md-3 col-sm-3 col-xa-12">
                            <div class="col-features2 marginb-30 text-center clearfix">
                                <div class="article-icon">
                                    <!-- If you want to use font-awesome icon -->
                                    <div class="icon clearfix">
                                        <i class="fa fa-star-o fa-icon orange-bg"></i>
                                    </div>
                                  
                                </div>
                                <div class="article-body">
                                    <h3>Balloon Artist</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown...</p>
                                </div>
                            </div>
                            <!-- END .col-features2 -->
                            <div class="col-features2 text-center clearfix">
                                <div class="article-icon">
                                    <!-- If you want to use font-awesome icon -->
                                    <div class="icon clearfix">
                                        <i class="fa fa-star-o fa-icon red-bg"></i>
                                    </div>
                                   
                                </div>
                                <div class="article-body">
                                    <h3>Clowns/Jugglers</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown...</p>
                                </div>
                            </div>
                            <!-- END .col-features2 -->
                        </div>
                        <!-- END .col-md-3 -->
                        <div class="col-md-3 col-sm-3 col-xa-12">
                            <img src="../images/feature_01.jpg" alt="" class="img-responsive center-block">
                        </div>
                        <!-- END .col-md-3 -->
                        <div class="col-md-3 col-sm-3 col-xa-12">
                            <div class="col-features2 text-center clearfix">
                                <div class="article-icon">
                                    <!-- If you want to use font-awesome icon -->
                                    <div class="icon clearfix">
                                        <i class="fa fa-star-o fa-icon yellow-bg"></i>
                                    </div>
                                    
                                </div>
                                <div class="article-body">
                                    <h3>Candy Bar</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown...</p>
                                </div>
                            </div>
                            <!-- END .col-features2 -->
                            <div class="col-features2 marginb-30 text-center clearfix">
                                <div class="article-icon">
                                    <!-- If you want to use font-awesome icon -->
                                    <div class="icon clearfix">
                                        <i class="fa fa-star-o fa-icon" style="background-color:#b1c009;"></i>
                                    </div>
                                   
                                </div>
                                <div class="article-body">
                                    <h3>Make Up</h3>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown...</p>
                                </div>
                            </div>
                            <!-- END .col-features2 -->
                        </div>
                        <!-- END .col-md-3 -->
                    </div>
                    <!-- END .features2 -->
                </div>
            </div>
			
			
			
			
			
			<?php include("include/footer.php") ?>
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
		</body>
	
</html>
	
				