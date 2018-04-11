		<?php	
			include("../include/config.php"); 
		  	session_start();
		    $cnn = new connection(); 
		    $today = date("Y-m-d");
			 $user_id = $_SESSION['user_id'];
			
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
				<!-- <link rel="stylesheet" href="css/style.css"> -->
				<link rel="stylesheet" href="css/main.css">
				<link rel="stylesheet" type="text/css" href="css/animate.css" />
				<link href="css/styles.css" rel="stylesheet">
				<link href="css/my-style.css" rel="stylesheet">
				
		  		<link href="css/style.css" rel="stylesheet" type="text/css">
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
				<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1445946460653{}.vc_custom_1446027109651{border-top-width: 4px !important;background-image: url(wp-content/uploads/2015/10/Rectangle-6-copyf23d.jpg?id=199) !important;border-top-color: rgba(39,37,48,0.15) !important;border-top-style: solid !important;}.vc_custom_1446032902066{background-color: #f5f5f6 !important;}.vc_custom_1446813363327{background-image: url(http://unicaevents.ancorathemes.com/wp-content/uploads/2015/10/er1.jpg?id=954) !important;}.vc_custom_1446045661779{background-color: #f5f5f6 !important;}</style>
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
	      	@media only screen and (max-width: 768px) {
	    		.imgimg
	    		{
	    			  width: 98% !important;
	    		}
		}
	      </style>
				</style>
				<style>
				.nav-tabs { border-bottom: 2px solid #DDD; }
				.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover { border-width: 0; }
				.nav-tabs > li > a { border: none; color: #666; }
				.nav-tabs > li.active > a, .nav-tabs > li > a:hover { border: none; color: #4285F4 !important; background: transparent; }
				.nav-tabs > li > a::after { content: ""; background: #4285F4; height: 2px; position: absolute; width: 100%; left: 0px; bottom: -1px; transition: all 250ms ease 0s; transform: scale(0); }
				.nav-tabs > li.active > a::after, .nav-tabs > li:hover > a::after { transform: scale(1); }
				.tab-nav > li > a::after { background: #21527d none repeat scroll 0% 0%; color: #fff; }
				.tab-pane { padding: 15px 0; }
				.tab-content{padding:20px}
				.card {background: #FFF none repeat scroll 0% 0%; box-shadow: 0px 1px 3px rgba(0, 0, 0, 0.3); margin-bottom: px; }
				.close:not(.nohover):hover {  
					border: 1px solid red; 
				}
				</style>
				<link href="css/rating.css" rel="stylesheet" type="text/css">
				<script type="text/javascript" src="js/rating.js"></script>
				<style type="text/css">
					.overall-rating{font-size: 14px;margin-top: 5px;color: #8e8d8d;}
				</style>
				<script language="javascript" type="text/javascript">
				$(function() {
					$("#rating_star").codexworld_rating_widget({
						starLength: '5',
						initialValue: '',
						callbackFunctionName: 'processRating',
						imageDirectory: 'images/rating',
						inputAttr: 'postID'
					});
					$("#rating_star1").codexworld_rating_widget({
						starLength: '5',
						initialValue: '',
						callbackFunctionName: 'processRating',
						imageDirectory: 'images/rating',
						inputAttr: 'postID'
					});
				});

				function processRating(val, attrVal){
					//alert('You have rated '+val+' to CodexWorld');

				}
				</script>
				
			</head>
			<body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive" >
				<div class="body_wrap" >
					<div class="page_wrap" >
						<div class="top_panel_fixed_wrap"></div>
						<?php include("include/header.php"); ?>	
						<hr>
						<section>
						<div class="container-fluid" >
						<!--style="background: url(images/default-cover1.jpg);background-size: cover;height: 447px;" -->
								<!--img src="images/slider/15154038561515238902banner1.jpg"  -->
							</div>
						</section>
						
						<div class="container" style="padding-bottom: 39px;">
							<!--<div class="row">
				                <div class="col-md-12">
				                	<div style="float:right;">
				                	<a href="viewProfile.php" class="btn btn-danger" style="color:white;">Profile</a>
				                	<a href="myCompleteEvent.php?user_id=<?php echo $user_id; ?>" class="btn btn-danger" style="color:white;">My Complete Event</a>
				                	<a href="include/logout.php" class="btn btn-danger" style="color:white;">Logout</a>
				                	</div>
				                </div>
				            </div>-->

							<h2 class="section-heading" style="text-align: -webkit-center;"><span class="red">View</span> Booking</h2>
							<div class="row">
				                <div class="col-md-12">
		                            <div class="card">
		                                <ul class="nav nav-tabs" role="tablist">
		                                    <li role="presentation" class="active"><a href="#viewBooking" aria-controls="home" role="tab" data-toggle="tab">Waiting For Approval</a></li>
		                                    <li role="presentation"><a href="#approved" aria-controls="home" role="tab" data-toggle="tab"> Approved</a></li>
		                                    <li role="presentation"><a href="#shop" aria-controls="profile" role="tab" data-toggle="tab">View Stall</a></li>
		                                    <li role="presentation"><a href="#rating" aria-controls="messages" role="tab" data-toggle="tab">Complete</a></li>
		                                    <li role="presentation"><a href="#rating1" aria-controls="messages" role="tab" data-toggle="tab">View Rating And Review</a></li>
		                                </ul>
										<div class="tab-content">
		                                    <div role="tabpanel" class="tab-pane active" id="viewBooking">
												<div class="row">
												<?php 
												$selectEvent11 = $cnn ->countrow("SELECT *, bm.status as bstatus FROM user_master um, event_master em, booking_master bm WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.status='0'");
												if($selectEvent11>0)
												{
												
													$selectEvent = $cnn ->getrows("SELECT *, bm.status as bstatus  FROM user_master um, event_master em, booking_master bm WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.status='0'");
													while($getEvent = mysqli_fetch_array($selectEvent))
													{
												?>
												<div class="mini-desti row" style="padding-bottom: 20px;">
													
												<div class="col-md-6">
													<div class="col-md-4">
														<img src="../stall_live/<?php echo $getEvent['banner'];?>" class="img-responsive img-thumbnail">
													</div>
													<div class="col-md-8">
														<div class="mini-desti-title">
															<div class="pull-left">
																<h5 style="font-size: 15px;font-family: 'aqua_grotesqueregular', serif;"><b><?php echo $getEvent['event_name']; ?></b></h5>
																<span>
																	Start Date : <span style="font-weight: 100; font-family: initial;font-size: 16px;">
																	<?php echo  date('d-M-y',strtotime($getEvent['start_date'])); ?></span><br>	
																</span>
																<span>
																	End Date : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo date('d-M-y',strtotime($getEvent['end_date'])); ?></span>
																</span></br>
																<span>
																	Stall Name : <span style="font-weight: 100;font-family: initial;font-size: 16px;text-transform: capitalize;"><?php echo $getEvent['shop_name']; ?></span>
																</span><!-- end rating -->
															</div>
															<div class="pull-right" >
																<h6 style="text-align: -webkit-center;font-size: 15px;font-weight: 700;"><span>No Of Shop:&nbsp</span><?php echo $getEvent['shop_no']; ?></h6>
															</div>


															<div class="clearfix"></div>
																<div>
																	<p>Status: <span style="color:red">
																	<?php 
																		if($getEvent['bstatus'] == "0"){
																		echo 'Pending'; } else{
																		echo 'Complete'; } ?> </span>
																	</p>
																</div>
															</div>


														</div>
													</div>
												</div>
												<?php } }else{ ?><span style="color:red;">No Data Available.</span> <?php } ?>	
											</div>
										</div>
										<!-- Approved part-->
										<div role="tabpanel" class="tab-pane" id="approved">
												<div class="row">
												<?php 
												$selectEvent12 = $cnn ->getrows("SELECT *, bm.status as bstatus FROM user_master um, event_master em, booking_master bm WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.status='1'  and (em.event_status='1' or em.event_status=0) order by em.event_status ASC");
												if(mysqli_num_rows($selectEvent12) > 0)
												{
												
													$selectEvent = $cnn ->getrows("SELECT *,em.start_date as sd,em.end_date as ed,bm.status as bstatus FROM user_master um, event_master em, booking_master bm WHERE um.user_id = bm.user_id AND em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.status='1'  and (em.event_status='1' or em.event_status=0) order by em.event_status ASC");
													$i=1;
													$j=1;
													$d=1;
													while($getEvent = mysqli_fetch_array($selectEvent))
													{
												?>
												<div class="mini-desti row" style="padding-bottom: 20px;">
													
												<div class="col-md-12">
													<div class="col-md-2">
														<img src="../stall_live/<?php echo $getEvent['banner'];?>" class="img-responsive img-thumbnail">
													</div>
													<div class="col-md-3">
														<div class="mini-desti-title">
															<div class="pull-left">
																<h5 style="font-size: 15px;font-family: 'aqua_grotesqueregular', serif;"><b><?php echo $getEvent['event_name']; ?></b></h5>
																<span>
																	Start Date : <span style="font-weight: 100; font-family: initial;font-size: 16px;">
																	<?php echo  date('d - M - y',strtotime($getEvent['sd'])); ?></span><br>	
																</span>
																<span>
																	End Date : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo date('d - M -y',strtotime($getEvent['ed'])); ?></span>
																</span></br>
																<span>
																	Stall Name : <span style="font-weight: 100;font-family: initial;font-size: 16px;text-transform: capitalize;"><?php echo $getEvent['shop_name']; ?></span>
																</span><!-- end rating -->
															</div>
															<div class="pull-right" >
																<h6 style="text-align: -webkit-center;font-size: 15px;font-weight: 700;"><span>No Of Stall:&nbsp</span><?php echo $getEvent['shop_no']; ?></h6>
															</div>


															<div class="clearfix"></div>
																<div>
																	<p>Status: <span style="color:red">
																	<?php 
																		if($getEvent['bstatus'] == "0"){
																		echo 'Pending'; } else{
																		echo 'Approved'; } ?> </span>
																	</p>
																</div>
															</div>
														</div>
							<div class="col-md-7" style="border:1px solid #f34235;">
							<?php
							$start_date = $getEvent['sd'];
							$end_date = $getEvent['ed'];
							$current_date = date('Y-m-d');
							if($current_date <= $end_date)
							{
							?>
								<form name="frm" id="frm" method="post">
										<!-- <center><h4>Make My Booking Payment</h4><hr></center> -->
										<?php 
										$event_id12 = $getEvent['event_id'];
										$selectAmount = $cnn->getrows("SELECT sum(book_amount) as total_amount FROM booking_payment_master WHERE event_id='$event_id12' AND sender_id='$user_id'");
										$getAmount = mysqli_fetch_array($selectAmount);
										$total_amount = $getAmount['total_amount'];
										$stall_charge = $getEvent['stall_charge'];
										$remainAmount = $stall_charge - $total_amount;
										if($stall_charge != $total_amount)
										{
										?>
								<div class="row">
								<div class="col-md-12">
									<div class="col-md-6">
		                                <h4>Make Payment</h4>
                                	</div>
                                	<div class="col-md-6" style="margin-top:2%;">
	                                	<input type="radio" id="pay1<?php echo $i; ?>" class="pay<?php echo $i; ?>" name="cash" value="cash" checked/>Cash
	                                	<input type="radio" id="pay2<?php echo $i; ?>" class="pay<?php echo $i; ?>" name="bank" value="bank" /> Bank
	                                	<a class="btn btn-danger" style="padding: 4px 11px;float: right;border-radius: 50%;color:white;" data-toggle="modal" data-target="#infomodel">i</a>
	                                	<span class="label label-danger">Your Remain Paid Amount Is: <span id="remainPrice<?php echo $i; ?>"><?php echo $remainAmount; ?></span></span>
	                            	</div>
	                            </div>
	                            <hr>
	                        	</div>
	                        	  
	                        	
	                        	
							<div class="row">
								<!-- for cash -->
								<div class="" id="cashDiv<?php echo $i; ?>"  style="">
                            	<div class="col-md-12">
                            		<div class="col-md-6">
		                                <label></label>
		                                <input type="number" id="cash_amount<?php echo $i; ?>" name="cash_amount" min="0" class="form-control" placeholder="Amount" />
		                                <input type="hidden" id="stall_charge<?php echo $i; ?>" name="stall_charge" value="<?php echo $stall_charge; ?>">
                                	</div>
                                	<div class="col-md-6">
		                                <label></label>
		                                <input type="text" id="comment<?php echo $i; ?>" name="comment" class="form-control" placeholder="Comment" />
                                	</div>
                                	
                                </div>
                                <div class="col-md-12">
                            		<center>
	                                	<div class="col-md-6" style="margin-left:25%;
    margin-bottom: 1%;">
			                                <label></label>
			                                <button type="button" id="sendPayment1<?php echo $i; ?>" name="sendPayment" class="form-control"/>PAY..!</button>
											
											
	                                	</div>
										
                                	</center>
									<div class="col-md-12" >
			                               	<span style="float: right;"><a style="color:red;" data-toggle="modal" data-target="#myModal0<?php echo $d;?>">See All Payment</a></span>
											
											
	                                	</div>
								
                                	<div class="clearfix"></div>
                                	<script>
                                	// Select your input element.
								var number = document.getElementById('cash_amount<?php echo $i; ?>');
								
								// Listen for input event on numInput.
								number.onkeydown = function(e) {
								    if(!((e.keyCode > 95 && e.keyCode < 106)
								      || (e.keyCode > 47 && e.keyCode < 58) 
								      || e.keyCode == 8)) {
								        return false;
								    }
								}
                                	</script>
                            	</div>
                            	</div>
                            	<!-- over for cash -->
                            	<!-- for bank -->
                                <div class="" id="bankDiv<?php echo $i; ?>" style="display: none;">
                                		<div class="col-md-12">
                                		<input type="hidden" id="stall_charge<?php echo $i; ?>" name="stall_charge" value="<?php echo $stall_charge; ?>">

                                		<div class="col-md-6">
			                                <label></label>
			                                <input type="text" id="txn_id<?php echo $i; ?>" name="txn_id" class="form-control" placeholder="Txn ID" />
                                		</div>
                                		<div class="col-md-6">
			                                <label></label>
			                                <input type="text" id="bank_name<?php echo $i; ?>" name="bank_name" class="form-control" placeholder="Bank Name" />
	                                	</div>
	                                	</div>
	                                	<div class="col-md-12">
	                            		<div class="col-md-6">
			                                <label></label>
			                                <input type="number" id="bank_amount<?php echo $i; ?>" name="bank_amount" class="form-control" placeholder="Amount" />
	                                	</div>
	                                	<div class="col-md-6">
			                                <label></label>
			                                <input type="text" id="bankComment<?php echo $i; ?>" name="bankComment" class="form-control" placeholder="Comment" />
	                                	</div>
	                                	</div>
	                                	<!-- <div class="col-md-12">
	                                		
	                                	
                                		</div> -->
                                	<div class="clearfix"></div>

                                	<div class="col-md-12">
                            		<center>
	                                	<div class="col-md-6" style="margin-left:25%;
    margin-bottom: 1%;">
			                                <label></label>
			                                <button type="button" id="sendPayment2<?php echo $i; ?>" name="sendPayment" class="form-control"/>PAY..!</button> 
	                                	</div>
                                	</center>
									<div class="col-md-12" >
			                               	<span style="float: right;"><a style="color:red;" data-toggle="modal" data-target="#myModal0<?php echo $d;?>">See All Payment</a></span>
									</div>
                                	<div class="clearfix"></div>
                            	</div>
                            	</div>
                            	<script>
                                	// Select your input element.
								var number = document.getElementById('bank_amount<?php echo $i; ?>');
								
								// Listen for input event on numInput.
								number.onkeydown = function(e) {
								    if(!((e.keyCode > 95 && e.keyCode < 106)
								      || (e.keyCode > 47 && e.keyCode < 58) 
								      || e.keyCode == 8)) {
								        return false;
								    }
								}
                                	</script>
                            		<!-- Over for bank -->
								  <div class="modal fade" id="myModal0<?php echo $d;?>" role="dialog" style="background: transparent;">
								<div class="modal-dialog  modal-lg">
								
								  <!-- Modal content-->
								  <div class="modal-content">
									<div class="modal-header">
									  
									  <h3 class="section-heading" style="text-align: -webkit-center;"><span class="red">Vendor</span> Payment Info</h3>
									</div>
									<div class="modal-body">
									 <table class="table table-hover">
								<thead>
								  <tr style="background-color: burlywood;color: white;">
									<th>No</th>
									<th>Date</th>
									<th>Amount</th>
									<th>Payment Type</th>
									
								  </tr>
								</thead>
								<tbody >
								<?php 
								$vp_cnt = $cnn ->countrow("SELECT *,DATE_FORMAT(payment_date, '%d-%M-%Y ') as p_date FROM `booking_payment_master` where event_id ='$event_id12' and sender_id = '$user_id' and book_amount != '0' order by payment_date desc");
								if($vp_cnt != "0")
								{
								
								$vp_info = $cnn ->getrows("SELECT *,DATE_FORMAT(payment_date, '%d-%M-%Y ') as p_date FROM `booking_payment_master` where event_id ='$event_id12' and sender_id = '$user_id' and book_amount != '0' order by payment_date desc");
								
								
									$k=1;
									while($vp_get=mysqli_fetch_assoc($vp_info))
									{
								?>
								  <tr>
								  <td><?php echo $k;?></td>
								  <td><?php echo $vp_get['p_date'];?></td>
									<td><?php echo $vp_get['book_amount'];?></td>
									<td><?php echo $vp_get['pay_type'];?></td>
									
								  </tr>
								<?php $k++; } } else { ?>
									<tr>
								  <td colspan="4" style="color:red;">No Payment Info</td>
									
								  </tr>
								<?php }
								?>
								  
								 
								</tbody>
							  </table>
									</div>
									
								  </div>
								  
								</div>
							  </div>	
                            	
                       	</div>
                       	<?php } ?>
					</form>
					
					<!-- Modal -->
<div id="infomodel" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <p>‘Note: This is not integrated with any payment gateway, it helps you with tracking your payments, make your actual payments via bank or cash, make an entry here and tack it’.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
				<?php  }else{ ?> 

                       	<div class="row">
								<div class="col-md-12">
									<!--<div class="col-md-6">-->
		                                <h4 style="text-align:center;">View Payment</h4>
                                	</div>
                                	</div>
                                	<hr>
                                	<div class="row">
                                	<div class="col-md-12" style="">
                                	<?php
								
                                		$event_id121 = $getEvent['event_id'];
						$selectAmount1 = $cnn->getrows("SELECT sum(book_amount) as total_amount FROM booking_payment_master WHERE event_id='$event_id121' AND sender_id='$user_id'");
										$getAmount1 = mysqli_fetch_array($selectAmount1);
										$total_amount = $getAmount1['total_amount'];
                                	?>
						<p style="text-align:center;">Your Paid Amount Is : <?php echo $total_amount; ?> Rupees.  <span style="float: right;"><a style="color:red;margin-top: 10px;" data-toggle="modal" data-target="#myModal<?php echo $j;?>">See All Payment</a></span></p>
	                            	</div>
	                            </div>
	                            <div class="modal fade" id="myModal<?php echo $j;?>" role="dialog" style="background: transparent;">
								<div class="modal-dialog  modal-lg">
								
								  <!-- Modal content-->
								  <div class="modal-content">
									<div class="modal-header">
									  <button type="button" style="color:black;background-color:white;" class="win close" data-dismiss="modal">X</button>
									  <h3 class="section-heading" style="text-align: -webkit-center;"><span class="red">Vendor</span> Payment Info </h3>
									</div>
									<div class="modal-body">
									 <table class="table table-hover">
								<thead>
								  <tr style="background-color: burlywood;color: white;">
									<th>No</th>
									<th>Date</th>
									<th>Amount</th>
									<th>Payment Type</th>
									
								  </tr>
								</thead>
								<tbody >
								<?php 
								$vp_cnt = $cnn ->countrow("SELECT *,DATE_FORMAT(payment_date, '%d-%M-%Y ') as p_date FROM `booking_payment_master` where event_id ='$event_id121' and sender_id = '$user_id' and book_amount != '0' order by payment_date desc");
								if($vp_cnt != "0")
								{
								
								$vp_info = $cnn ->getrows("SELECT *,DATE_FORMAT(payment_date, '%d-%M-%Y ') as p_date FROM `booking_payment_master` where event_id ='$event_id121' and sender_id = '$user_id' and book_amount != '0' order by payment_date desc");
								
								
									$k=1;
									while($vp_get=mysqli_fetch_assoc($vp_info))
									{
								?>
								  <tr>
								  <td><?php echo $k;?></td>
								  <td><?php echo $vp_get['p_date'];?></td>
								  <td><?php echo $vp_get['book_amount'];?></td>
								  <td><?php echo $vp_get['pay_type'];?></td>
									
								  </tr>
								<?php } } else { ?>
									<tr>
								  <td colspan="4" style="color:red;">No Payment Info</td>
									
								  </tr>
								<?php }
								?>
								  
								 
								</tbody>
							  </table>
									</div>
									
								  </div>
								  
								</div>
							  </div>


                       	 <?php } ?>
														</div>
													</div>
												</div>
					<input type="hidden" name="event_id" id="event_id<?php echo $i; ?>" value="<?php echo $getEvent['event_id']; ?>">
					<?php
					$event_id11 = $getEvent['event_id'];
					$selectId = $cnn->getrows("SELECT *FROM user_master um,event_master em WHERE um.user_id = em.user_id AND em.event_id='$event_id11'");
					$getId = mysqli_fetch_array($selectId);
					$receiver_id = $getId['user_id'];
					?>
					<input type="hidden" name="receiver_id" id="receiver_id<?php echo $i; ?>" value="<?php echo $receiver_id; ?>">
					<input type="hidden" name="book_id" id="book_id<?php echo $i; ?>" value="<?php echo $getEvent['book_id']; ?>">
					<script type="text/javascript">
						$(document).ready(function(){
							$("#sendPayment1<?php echo $i; ?>").click(function(){
								var cash_amount = $("#cash_amount<?php echo $i; ?>").val();
								var event_id = $("#event_id<?php echo $i; ?>").val();
								var receiver_id = $("#receiver_id<?php echo $i; ?>").val();
								var book_id = $("#book_id<?php echo $i; ?>").val();
								var stall_charge = $("#stall_charge<?php echo $i; ?>").val();
								var comment = $("#comment<?php echo $i; ?>").val();
								var cash = "cash";
								if(cash_amount == '')
								{
									alert("Plz Enter Amount..!");
								
								
								}
								else
								{
									$.ajax({
										url : 'sendPaymentData.php',
										type : 'POST',
										data : {
												cash_amount:cash_amount,event_id:event_id,event_id:event_id,book_id:book_id,receiver_id:receiver_id,cash:cash,stall_charge:stall_charge,comment:comment
										},
										
									
										success:function(data)
										{
											alert("Your payment request sent to organizer..!");
											$("#cash_amount<?php echo $i; ?>").val("");
											$("#comment<?php echo $i; ?>").val("");
											$("#remainPrice<?php echo $i; ?>").html(data);
										}
										
								});
								}

							
							});
						});

						$(document).ready(function(){
							$("#sendPayment2<?php echo $i; ?>").click(function(){
								var txn_id = $("#txn_id<?php echo $i; ?>").val();
								var bank_name = $("#bank_name<?php echo $i; ?>").val();
								var bank_amount = $("#bank_amount<?php echo $i; ?>").val();
								var event_id = $("#event_id<?php echo $i; ?>").val();
								var receiver_id = $("#receiver_id<?php echo $i; ?>").val();
								var book_id = $("#book_id<?php echo $i; ?>").val();
								var stall_charge = $("#stall_charge<?php echo $i; ?>").val();
								var bankComment= $("#bankComment<?php echo $i; ?>").val();
								var bank = "bank";
								if(bank_amount == '')
								{
									alert("Plz Enter Amount..!");
								}
								else
								{
									$.ajax({
										url : 'sendPaymentData.php',
										type : 'POST',
										data : {
												txn_id:txn_id,bank_name:bank_name,
												bank_amount:bank_amount,book_id:book_id,
												event_id:event_id,receiver_id:receiver_id,bank:bank,stall_charge:stall_charge,bankComment:bankComment
										},
										success:function(data)
										{
											alert("Your payment request sent to organizer..!");
											$("#txn_id<?php echo $i; ?>").val("");
											$("#bank_name<?php echo $i; ?>").val("");
											$("#bank_amount<?php echo $i; ?>").val("");
											$("#bankComment<?php echo $i; ?>").val("");
											$("#remainPrice<?php echo $i; ?>").html(data);
										}
									});
									
								}

								
							});
						});
					</script>  
					<script type="text/javascript">
						$(document).ready(function(){
							$(".pay<?php echo $i; ?>").click(function(){
								var pay = $(this).val();
								
								if(pay == "cash")
								{
									$("#bankDiv<?php echo $i; ?>").css("display","none");
									$("#cashDiv<?php echo $i; ?>").css("display","block");
									$("#pay1<?php echo $i; ?>").prop("checked",true);
									$("#pay2<?php echo $i; ?>").prop("checked",false);
								}
								if(pay == "bank")
								{
									$("#cashDiv<?php echo $i; ?>").css("display","none");
									$("#bankDiv<?php echo $i; ?>").css("display","block");
									$("#pay2<?php echo $i; ?>").prop("checked",true);
									$("#pay1<?php echo $i; ?>").prop("checked",false);
								}
							});

						});
					</script>				
					<hr>			
												<?php $i++; $j++; $d++;} } else{ ?><span style="color:red;">No Data Available.</span> <?php } ?>	
											</div>
										</div>

										<!-- /Approved Part End /-->

		                                <div role="tabpanel" class="tab-pane" id="shop">
										<div class="row">
										<span style="color:red;    margin-left: 2%;">Click on the event to view your stall information.</span>
												<div class="mini-desti row" style="padding-bottom: 20px;">
												
													<!-- <h2 class="section-heading" style="text-align: -webkit-center;"><span class="red">View</span> Shop</h2> -->
												<?php 
												
		$selectEvent = $cnn ->countrow("SELECT *FROM  event_master em, booking_master bm,user_master um WHERE em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.user_id=um.user_id AND bm.status='1'");
				if($selectEvent > 0)
	                        {
		$selectEvent1 = $cnn ->getrows("SELECT DISTINCT em.event_id,um.user_id,sm.user_id,bm.event_id,bm.user_id,em.event_name FROM  event_master em, booking_master bm,user_master um,shop_master sm WHERE em.event_id = bm.event_id AND bm.user_id = '$user_id' AND bm.user_id=um.user_id AND bm.status='1' AND sm.user_id=um.user_id AND sm.event_id=em.event_id");
		$i=0;	                        
	                        while($getEvent = mysqli_fetch_array($selectEvent1))
	                        {
												?>
												
												<div class="col-md-12" style="margin-top: 1%;">
													<div class="mini-desti-title" style="margin-left: 2%;">
														<div class="">
															<span>
																Event : <span style="font-weight: 100; font-family: initial;font-size: 16px;cursor: pointer;" id="eventname<?php echo $i; ?>">
																<?php echo $getEvent['event_name']; ?></span><br>
															</span>
															
															<div id="showshop<?php echo $i; ?>" style="display:none;margin-left: 2%;">
						<?php 
						$event_id=$getEvent['event_id'];
						$user_id=$getEvent['user_id'];
						$selectEvent = $cnn ->getrows("SELECT *FROM shop_master sm, payment_master pm WHERE sm.shop_id=pm.shop_id AND sm.event_id = '$event_id' AND sm.user_id='$user_id'");
																	
																	while($getEvent = mysqli_fetch_array($selectEvent))
																	{ 
																?>	
																<div class="col-md-3">
																	<span>
																		Stall No : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo $getEvent['single_Shop_no']; ?></span>  
																	</span>
																</div>
																<div class="col-md-3">
																<span>
																	Stall Name : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo $getEvent['shop_name']; ?></span>
																</span>
																</div>
																<div class="col-md-3">
																<span>
																	No of Table : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo $getEvent['no_table']; ?></span>
																</span>
																</div>
																<div class="col-md-3">
																<span>
																	No of Chair : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo $getEvent['no_chair']; ?></span>
																</span>
																</div>
																
																<div class="col-md-6">
																<span>
																	Descripation : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo $getEvent['description']; ?></span>
																</span>
																</div>
																<div class="col-md-6">
																<span>
																	Amount : <span style="font-weight: 100;font-family: initial;font-size: 16px;"><?php echo $getEvent['amount']; ?></span>
																</span>
																</div>
																<br>
																<hr style="border:1px solid #eee;">
																<?php } ?>
															</div>
															
														</div>
													</div>
												</div>
												
												<script>
				$(document).ready(function(){
					$("#eventname<?php echo $i; ?>").click(function(){
						$("#showshop<?php echo $i; ?>").slideToggle("slow");
					});
				});
				</script>
											<?php $i++; } } else{ ?><span style="color:red; margin-left: 27px;">No Data Available.</span> <?php } ?>
											</div>
										</div>
										</div>
		                                <div role="tabpanel" class="tab-pane" id="rating">
										
										
					<div class="page_content_wrap page_paddings_no" style="margin-left: -25px;">
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
		                                                <div class="">

		<?php

		    $selectEventew = $cnn ->getrows("SELECT * FROM booking_master WHERE user_id = '$user_id' AND status='1'");
		    	if(mysqli_num_rows($selectEventew) > 0)
		    	{
	      while($getEventew = mysqli_fetch_array($selectEventew))
		    {
		        $event_id = $getEventew['event_id'];
		    	$selectEvent1 = $cnn ->countrow("SELECT * FROM event_master em,user_master um WHERE um.user_id = em.user_id AND em.end_date < '$today' AND em.event_id = '$event_id' AND em.status='1'");
		    
		    	$selectEvent = $cnn ->getrows("SELECT * FROM event_master em,user_master um WHERE um.user_id = em.user_id AND em.event_id = '$event_id' AND em.end_date < '$today' AND em.status='1'");
		    
		    $i=1;
		    while($getEvent = mysqli_fetch_array($selectEvent))
		    {
				$e_id=$getEvent['event_id'];
		?>
		<div class="">
		    <div class="row" style="margin-bottom:2%;">
				<div class="">
					<div class="event_details">
						<div class="">
							<div class="card">
		                        <div class="evSn2">
		                            <div class="row">
		                                <div class="col-md-3">
		                                    <img src="../stall_live/<?php echo $getEvent['banner']; ?>" class="img-responsive img-thumbnail">
		                                </div>
		                                <div class="col-md-9">
		                                    <div class="col-md-6">
		                                        <h5>&nbsp; Event Title : <?php echo $getEvent['event_name'];  ?> </h5>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <h5>&nbsp; Event Organizer : <?php echo $getEvent['first_name']." ".$getEvent['last_name']; ?></h5>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <h5>&nbsp; Address : <?php echo $getEvent['event_address'];  ?></h5>
		                                    </div>
		                                    <div class="col-md-6">
		                                        <h5>&nbsp; Date : <?php echo date('d,M Y',strtotime($getEvent['start_date']));  ?> - <?php echo date('d,M Y',strtotime($getEvent['end_date']));  ?></h5>
		                                    </div>
		                                    <div class="col-md-12">
		                                        <h5>&nbsp; City : <?php echo $getEvent['city']; ?></p></h5>
		                                    </div>
		                                    <br><br>
		                                </div>
		                                <div class="col-md-12" style="text-align: center;">
										<?php 
										$count=$cnn ->countrow("SELECT * FROM review_ratting_master WHERE event_id = '$e_id' and user_id='$user_id'");
										if($count > 0)
										{?>
										 <button class="btn btn-default1" data-toggle="modal" id="<?php echo $getEvent['event_id'];  ?>" onclick="geteventid(this.id)" data-target="#myModal" disabled><b>Rate & Review</b></button>
										<?php }
										else
										{?>
											 <button class="btn btn-default1" data-toggle="modal" id="<?php echo $getEvent['event_id'];  ?>" onclick="geteventid(this.id)" data-target="#myModal"><b>Rate & Review</b></button>
											
										<?php }
										?>
		                                   
		                                    <br><br>
		                                </div>
		                            </div>
		                        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		    
		</div>
		<?php $i++;} } }else{ ?> <span style="color:red;">No Any Event Completed.</span> <?php }  ?>

		</div>          
								<div class="clearfix"></div><br>
								</div>
						  </div>
					   </div>
					</div>
				 </div>
			  </div>
		                           </div>
		                           <div class="vc_row-full-width"></div>
		                        </section>
		                         </article>
		                    <section class="related_wrap related_wrap_empty"></section>
		                  </div>
		               </div>
		             </div>							






										</div>
										
			<div role="tabpanel" class="tab-pane" id="rating1">
										
										
					<div class="page_content_wrap page_paddings_no" style="margin-left: -25px;">
		               <div class="content_wrap">
		                  <div class="content">
		                     <article class="itemscope post_item post_item_single post_featured_center post_format_standard post-133 page type-page status-publish hentry" itemscope="" itemtype="http://schema.org/Article">
		                        <section class="post_content" itemprop="articleBody">
		                           <div class="sc_reviews alignright">
		                              <!-- #TRX_REVIEWS_PLACEHOLDER# -->
		                           </div>
		                           <div data-vc-full-width="true" data-vc-full-width-init="true" class="vc_row wpb_row vc_row-fluid vc_custom_1445946460653 newdemo" style="padding-left: 101.5px; position: relative; left: -101.5px; box-sizing: border-box; width: 1275px; padding-right: 143.5px;">
		                              <div class="wpb_column vc_column_container vc_col-sm-12">
		                                 <div class="vc_column-inner ">
		                                    <div class="wpb_wrapper">
		                                       <div class="sc_content content_wrap">
		                                          <div id="sc_services_2105538711_wrap" class="sc_services_wrap">
		                                             <div id="sc_services_2105538711" class="sc_services sc_services_style_services-1 sc_services_type_icons  sc_slider_nopagination sc_slider_nocontrols margin_bottom_large" style="width:100%;" data-interval="7852" data-slides-per-view="4">
		                                                <div class="">
		<?php
			
		    $selectEventew1 = $cnn ->getrows("SELECT * FROM review_ratting_master rm,event_master em,user_master um WHERE um.user_id=rm.user_id AND rm.user_id = '$user_id' AND rm.event_id = em.event_id");
		   
		   if(mysqli_num_rows($selectEventew1) > 0){ 
	        while($getEventew1 = mysqli_fetch_array($selectEventew1))
	        {
		    $o_rating = $getEventew1['o_rating'];
		    $v_rating = $getEventew1['v_rating'];
		?>

		<div class="">
		    <div class="row" style="margin-bottom:2%;">
				<div class="">
					<div class="event_details">
						<div class="">
							<div class="card">
		                        <div class="evSn2">
		                            <div class="row">
		                                <div class="col-md-2">
		                                    <img src="../stall_live/<?php echo $getEventew1['banner']; ?>" class="img-responsive img-thumbnail" style="border-radius:0%;padding-left: 2%;float: left;  margin-top: 12px;margin-bottom: 12px;">
		                                </div>
		                                <div class="col-md-10">
		                                    <div class="col-md-12">
		                                        <h5>&nbsp;Event : <?php echo $getEventew1['event_name']; ?> </h5>
		                                    </div>
		                                    <div class="col-md-12">
		                                    	<?php
		                                    	for($i=1;$i<=5;$i++)
		                                    	{
		                                    		if($o_rating < $i)
		                                    		{
		                                    	?>
		                                       <img src="images/star_y_off_18.png" style="height:20px;">
		                                       <?php } else {?>
		                                       	
		                                       	<img src="images/ic_grade_black_24dp_2x.png" style="height:20px;">
		                                       <?php } } ?>
		                                       
		                                    </div>
		                                    <div class="col-md-12">
		                                        <h5>&nbsp; Review : <?php echo $getEventew1['o_review']; ?></h5>
		                                    </div>
		                                    <div class="col-md-12">
		                                       <?php
		                                    	for($i=1;$i<=5;$i++)
		                                    	{
		                                    		if($v_rating < $i)
		                                    		{
		                                    	?>
		                                       <img src="images/star_y_off_18.png" style="height:20px;">
		                                       <?php } else {?>
		                                       	
		                                       	<img src="images/ic_grade_black_24dp_2x.png" style="height:20px;">
		                                       <?php } } ?>
		                                    </div>
		                                    <div class="col-md-12">
		                                        <h5>&nbsp; Review: : <?php echo $getEventew1['v_review']; ?></h5>
		                                    </div>
		                                    <br><br>
		                                </div>
		                               
		                            </div>
		                            <hr>

		                        </div>
							</div>
						</div>
					</div>
				</div>
			</div>
		    
		</div>
	<?php } }
	else
	{?>
	<p style="color:red">No Data Available!</p>
	<?php 
	}
	?>
		</div>          
							
								</div>
						  </div>
					   </div>
					</div>
				 </div>
			  </div>
		                           </div>
		                           <div class="vc_row-full-width"></div>
		                        </section>
		                         </article>
		                    <section class="related_wrap related_wrap_empty"></section>
		                  </div>
		               </div>
		             </div>							






										</div>
		                                
									</div>
								</div>
							</div>
						</div>
					</div>

					</div>
					
				</div>
			</div>
			<form class="booking margint-30 clearfix" method="POST" action="reviewratingscript.php">
		  <div class="modal fade" id="myModal" role="dialog" style="background: transparent;">
		    <div class="modal-dialog">
		    
		      <!-- Modal content-->
		      <div class="modal-content">
		        <div class="modal-header">
		          <button type="button" class="close nohover" style="float: right;font-size: 21px;font-weight: 700;line-height: 1;color: #000;text-shadow: 0 1px 0 #fff;filter:alpha(opacity=20);opacity: .2;" data-dismiss="modal">&times;</button>
		          <h4 class="modal-title">Add Review</h4>
		        </div>
		        <div class="modal-body" >
		       <div class="container">
		                    <div class="row">
		                        <div class="col-md-6 offset-1">
		                             <div class="row clearfix">
		                                <div class="form-group col-md-10">
		                                    <label>Organizer Rating</label><br>
		                                    <input name="o_rating"  id="rating_star" type="hidden" postID="1" />
		                                </div>
										<input type="hidden" name="event_id" id="event_id">
										<input type="hidden" name="user_id" value="<?php echo $user_id;?>">
		                            </div>
		                            <div class="row clearfix">
		                                <div class="form-group col-md-10">
		                                    <label>Organizer Review</label>
		                                    <textarea class="form-control" rows="3" name="o_review" placeholder="Enter Overall Review"  style="background-color: #e0ddd7d9;font-weight: 100;" required></textarea>
		                                </div>
		                            </div>
									 <div class="form-group col-md-10">
		                                    <label style="margin-left: -10px;">Venue Rating</label><br>
											<div style="margin-left: -10px;">
		                                    <input name="v_rating"  id="rating_star1" type="hidden" postID="1" />
											</div>
		                                </div>
									    <div class="row clearfix">
		                                <div class="form-group col-md-10">
		                                    <label>Venue Review</label>
		                                    <textarea class="form-control" rows="3" name="v_review" placeholder="Enter Venue Review" style="background-color: #e0ddd7d9;font-weight: 100;" required></textarea>
		                                </div>
		                            </div>
		                           
								</div>
		                    </div>    
		                </div>
		        </div>
		        <div class="modal-footer">
				  <button type="submit" class="btn btn-blue" name="enquiry" style="background-color: cadetblue;" value="enquiry">Add Review</button>
		          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		      
		    </div>
		  </div>
		  </form>
		  
		
			<!-- Footer Section Start -->
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
						</div>
					</div>-->
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
					function geteventid(event_id)
					{
						var id = event_id;
						$("#event_id").val(id);
					}	

					</script>
					<!-- <script type="text/javascript">
						$(document).ready(function(){
							$("#sendPayment1").click(function(){
								var cash_amount = $("#cash_amount").val();
								var cash_date = $("#cash_date").val();
								var cash = "cash";
								$.ajax({
										url : 'sendPaymentData.php',
										type : 'POST',
										data : {
												cash_amount:cash_amount,cash_date:cash_date,cash:cash
										},
										success:function(data)
										{
											alert("Your Cash Payment Done..!");
										}
								});
							});
						});

						$(document).ready(function(){
							$("#sendPayment2").click(function(){
								var txn_id = $("#txn_id").val();
								var bank_name = $("#bank_name").val();
								var bank_amount = $("#bank_amount").val();
								var bank_date = $("#bank_date").val();
								var bank = "bank";

								$.ajax({
										url : 'sendPaymentData.php',
										type : 'POST',
										data : {
												txn_id:txn_id,bank_name:bank_name,
												bank_amount:bank_amount,bank_date:bank_date
										},
										success:function(data)
										{
											alert("Your Bank Payment Done..!");
										}
								});
							});
						});
					</script>  
					<script type="text/javascript">
						$(document).ready(function(){
							$(".pay").click(function(){
								var pay = $(this).val();
								
								if(pay == "cash")
								{
									$("#bankDiv").css("display","none");
									$("#cashDiv").css("display","block");
									$("#pay1").prop("checked",true);
									$("#pay2").prop("checked",false);
								}
								if(pay == "bank")
								{
									$("#cashDiv").css("display","none");
									$("#bankDiv").css("display","block");
									$("#pay2").prop("checked",true);
									$("#pay1").prop("checked",false);
								}
							});

						});
					</script> -->
			</body>
		</html>