<?php
	include("../include/config.php"); 
	//  include("../include/session.php"); 
    $cnn = new connection(); 
    $event_id = $_GET['event_id'];
   
    
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link rel="icon" href="images/favicon.ico">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="xmlrpc.php" />
		<title>StallBooking</title>
		<link rel='dns-prefetch' href='http://maps.google.com/' />
		<link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
		<link rel='dns-prefetch' href='http://s.w.org/'/>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/main.css">
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
			.sidebar_outer_logo .logo_main,.top_panel_wrap .logo_main,.top_panel_wrap .logo_fixed{height:26px} .contacts_wrap .logo img{height:30px}
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
			margin-top: -2em;
			}
		</style>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="css/my-style.css" rel="stylesheet" type="text/css">
        <style>
        .newdemo{
            padding-left: 0px !important;
            position: relative;
            left: -159.5px;
            box-sizing: border-box;
            width: 1349px;
            padding-right: 159.5px;
        }
        b{
            color:white;
        }
        .org_name b,
        .event_type span b,
        .ev_ticket span b{
            color:black !important;
        }
        .btn .btn-default {
            box-shadow: 0 2px 0 0 #ddd !important;
        }
        .event_blog{
            margin-bottom: 2%;
        }
        </style>
	</head>
	<body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive">
		<div class="body_wrap" style="background-color: #CD714F;">
			<div class="page_wrap">
				<div class="top_panel_fixed_wrap"></div>
				<?php include("include/header.php"); ?>
				<section>
					<div class="banner">
						<?php 
							$selectbanner = $cnn -> getrows("SELECT * FROM slider");
							$getslide = mysqli_fetch_array($selectbanner);
							?>
						<img src="../images/slider/<?php echo $getslide['image']; ?>" style="width: 100%">
						<form>
							<div class="search_box">
								<ul>
									<li><input type="text" name="" placeholder="Enter Anything" style="height: 55px;"></li>
									<li>
										<select style="height: 55px;">
											<option>Madhya Pradesh</option>
										</select>
									</li>
									<li><button type="submit" class="btn"  style="height: 55px;">Search</button></li>
								</ul>
							</div>
						</form>
					</div>
				</section>
				<div class="page_content_wrap page_paddings_no">
					<div class="content_wrap">
						<div class="content">
							<article class="itemscope post_item post_item_single post_featured_center post_format_standard post-133 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
								<section class="post_content" itemprop="articleBody">
									<div class="sc_reviews alignright">
										<!-- #TRX_REVIEWS_PLACEHOLDER# -->
									</div>
									<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1445946460653 newdemo" style="padding-left: 0px;">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="sc_content content_wrap">
														<div id="sc_services_2105538711_wrap" class="sc_services_wrap">
															<div id="sc_services_2105538711" class="sc_services sc_services_style_services-1 sc_services_type_icons  sc_slider_nopagination sc_slider_nocontrols margin_bottom_large" style="width:100%;" data-interval="7852" data-slides-per-view="4">
																<div class="sc_columns columns_wrap">
                                                                <?php 
                                                                     $selectEventmore = $cnn ->getrows("SELECT * from event_master WHERE event_id = '$event_id'");
                                                                    while($getmoreevent = mysqli_fetch_array($selectEventmore))
                                                                {
                                                                ?>
																	<div class="container">
																		<div class="row" style="margin-bottom:2%;">
																			<div class="event_blog">
																				<!-- <h3><b>Events in Bangalore</b></h3> -->
																			</div>
																			<div class="events">
																				<div class="col-md-3" style="background-color: darkgoldenrod;">
																					<div class="event_no">
																						<h4><b>Event ID: <?php echo $getmoreevent['event_id']; ?></b></h4>
																					</div>
																				</div>
																				<div class="col-md-9">
																					<div class="event-title">
																						<h4><b>Farewell Party 2018</b></h4>
																					</div>
																				</div>
																				<br>
																			</div>
																			<div class="row">
																				<div class="event_details">
																					<div class="col-md-3" >
																						<div class="img_ev">
																							<img src="images/event.jpg" style="width:100%;">
																						</div>
																					</div>
																					<div class="col-md-9">
																						<div class="card">
																							<div class="evSn2">
																								<div class="col-md-4">
																									<h5><i class="fa fa-calendar-plus-o fa-lg" style="color:#4caf50;"> </i>&nbsp; <?php echo $getmoreevent['start_date'];  ?> - <?php echo $getmoreevent['end_date'];  ?></h5>
																								</div>
																								<div class="col-md-4">
																									<h4><i class="fa fa-clock-o fa-lg " style="color:#4caf50;;"> </i>&nbsp; From <?php echo $getmoreevent['event_time'];  ?></h4>
																								</div>
																								<br><br>
																								<div class="loc_evnt row" style="margin:15px;">
																									<span><i class="fa fa-map-marker fa-lg" style="color:#4caf50;;"></i><?php echo $getmoreevent['event_address'];  ?></span>
																								</div>
																							</div>
																							<div class="evSn2">
																								<div class="row">
																									<div class="col-md-1">
																										<img src="images/profile-1.jpg" style="width:60px;border-radius: 50%;border: 3px solid #eee;margin-left: 10px;">
																									</div>
																									<div class="col-md-11">
																										<div class="col-md-6">
																											<div class="org_name">
																												<b>Event Organizer</b>
																											</div>
																											<div class="event_type" style="margin-top: 3%;">	
																												<span><b>Event Type :</b></span> Outdoor
																											</div>
																											<p style="margin-top: 3%;">2 Lakh people expected <i>Visitors Expected</i></p>
																										</div>
																										<div class="col-md-6" style="float: right;">
																											<button class="btn btn-default btn-shedow" style="box-shadow: 0 2px 0 0 #ddd;"><span style="font-weight: 600; font-size: 15px;">15</span><b> Stalls Available</b></button>
																											<button class="btn btn-default1" style="box-shadow: 0 2px 0 0 #ddd;"><b><span style="font-weight: 600; font-size: 15px;">100 </span>Total Stalls</b></button>
																											<div class="clearfix"></div>
																											<br>
																											<div class="ev_ticket">
																												<span><b>Tickets Range :</b></span>
																												<span style="background-color: darkgrey; padding: 5px;border-radius: 3px;box-shadow: 0 2px 0 0 #ddd; border-radius: 2px;">
																												<b>1 Day</b> - <i class="fa fa-rupee"></i> 15,000</span>
																												<span style="background-color: darkgrey; padding: 5px;border-radius: 3px;box-shadow: 0 2px 0 0 #ddd; border-radius: 2px;"><b>30 Day</b> - <i class="fa fa-rupee"></i> 15,000</span>
																											</div>
																											<!-- <div class="evnt_facility">
																												<span><i class="fa fa-check fa-lg" style="color: darkgoldenrod;"></i> &nbsp;&nbsp;Table - 1</span>
																												
																												<span style="margin-left: 15%;"><i class="fa fa-check fa-lg" style="color: darkgoldenrod;"></i>&nbsp;&nbsp; Chairs - 2</span>
																												</div> -->
																											<!-- <div class="stall">
																												<a href=""><b>Full Stall - Octanorm</b></a>
																												</div> -->
																										</div>
																										<div class="col-md-12 detail" style="margin-bottom: 15px;margin-top: 3%;text-align: center;">
																											<button class="btn btn-default1"><b>More Detail</b></button>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
                                                                <?php } ?>
																		<!--//row-->
																		<div class="clearfix"></div>
																		<br>
																		<div class="row" style="margin-bottom:2%;">
																			<div class="events">
																				<div class="col-md-3" style="background-color: darkgoldenrod;">
																					<div class="event_no">
																						<h4><b>Event ID: 0011</b></h4>
																					</div>
																				</div>
																				<div class="col-md-9">
																					<div class="event-title">
																						<h4><b>Farewell Party 2018</b></h4>
																					</div>
																				</div>
																				<br>
																			</div>
																			<div class="row">
																				<div class="event_details">
																					<div class="col-md-3" >
																						<div class="img_ev">
																							<img src="images/event.jpg" style="width:100%;">
																						</div>
																					</div>
																					<div class="col-md-9">
																						<div class="card">
																							<div class="evSn2">
																								<div class="col-md-4">
																									<h5><i class="fa fa-calendar-plus-o fa-lg" style="color:#4caf50;"> </i>&nbsp; 31st Dec 2017 - 1st Jan 2018</h5>
																								</div>
																								<div class="col-md-4">
																									<h4><i class="fa fa-clock-o fa-lg " style="color:#4caf50;;"> </i>&nbsp; From 09:00 AM - 09:00 PM</h4>
																								</div>
																								<br><br>
																								<div class="loc_evnt row" style="margin:15px;">
																									<span><i class="fa fa-map-marker fa-lg" style="color:#4caf50;;"></i> Purva Reveria, Old Airport Road, Marathahalli,Bangalore</span>
																								</div>
																							</div>
																							<div class="evSn2">
																								<div class="row">
																									<div class="col-md-1">
																										<img src="images/profile-1.jpg" style="width:60px;border-radius: 50%;border: 3px solid #eee;margin-left: 10px;">
																									</div>
																									<div class="col-md-11">
																										<div class="col-md-6">
																											<div class="org_name">
																												<b>Event Organizer</b>
																											</div>
																											<div class="event_type" style="margin-top: 3%;">	
																												<span><b>Event Type :</b></span> Outdoor
																											</div>
																											<p style="margin-top: 3%;">2 Lakh people expected <i>Visitors Expected</i></p>
																										</div>
																										<div class="col-md-6" style="float: right;">
																											<button class="btn btn-default" style="box-shadow: 0 2px 0 0 #ddd;"><span style="font-weight: 600; font-size: 15px;">15</span><b> Stalls Available</b></button>
																											<button class="btn btn-default1" style="box-shadow: 0 2px 0 0 #ddd;"><b><span style="font-weight: 600; font-size: 15px;">100 </span>Total Stalls</b></button>
																											<div class="clearfix"></div>
																											<br>
																											<div class="ev_ticket">
																												<span><b>Tickets Range :</b></span>
																												<span style="background-color: darkgrey; padding: 5px;border-radius: 3px;box-shadow: 0 2px 0 0 #ddd; border-radius: 2px;">
																												<b>1 Day</b> - <i class="fa fa-rupee"></i> 15,000</span>
																												<span style="background-color: darkgrey; padding: 5px;border-radius: 3px;box-shadow: 0 2px 0 0 #ddd; border-radius: 2px;"><b>30 Day</b> - <i class="fa fa-rupee"></i> 15,000</span>
																											</div>
																											<!-- <div class="evnt_facility">
																												<span><i class="fa fa-check fa-lg" style="color: darkgoldenrod;"></i> &nbsp;&nbsp;Table - 1</span>
																												
																												<span style="margin-left: 15%;"><i class="fa fa-check fa-lg" style="color: darkgoldenrod;"></i>&nbsp;&nbsp; Chairs - 2</span>
																												</div> -->
																											<!-- <div class="stall">
																												<a href=""><b>Full Stall - Octanorm</b></a>
																												</div> -->
																										</div>
																										<div class="col-md-12 detail" style="margin-bottom: 15px;margin-top: 3%;text-align: center;">
																											<button class="btn btn-default1"><b>More Detail</b></button>
																										</div>
																									</div>
																								</div>
																							</div>
																						</div>
																					</div>
																				</div>
																			</div>
																		</div>
																		<!--//row-->
																	</div>
																	<!--//Container -->
																</div>
															</div>
															<!-- /.sc_services -->
														</div>
														<!-- /.sc_services_wrap -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="vc_row-full-width"></div>
								</section>
								<!-- </section> class="post_content" itemprop="articleBody"> -->
							</article>
							<!-- </article> class="itemscope post_item post_item_single post_featured_center post_format_standard post-133 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article"> -->	
							<section class="related_wrap related_wrap_empty"></section>
						</div>
						<!-- </div> class="content"> -->
					</div>
					<!-- </div> class="content_wrap"> -->			
				</div>
				<!-- </.page_content_wrap> -->
				<!-- Footer Section Start -->
				<?php include("include/footer.php") ?>
				<!-- Footer Section Over -->
				<!-- /.footer_wrap -->
				<div class="copyright_wrap copyright_style_socials  scheme_original">
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
				</div>
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
	</body>
</html>