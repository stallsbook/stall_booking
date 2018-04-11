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
		<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>
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
			.sidebar_outer_logo .logo_main,.top_panel_wrap .logo_main,.top_panel_wrap .logo_fixed{height:50px} .contacts_wrap .logo img{height:50px}
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

<style type="text/css">
	
.p-y-2 {
    padding-top: 28px;
    padding-bottom: 28px;
}
.p-y-3 {
    padding-top: 45px;
    padding-bottom: 45px;
}
.m-b-1 {
    margin-bottom: 18px;
}
.m-t-1 {
    margin-top: 18px;
}

.main_counter_area{
    background: url(https://images.pexels.com/photos/196288/pexels-photo-196288.jpeg?w=940&h=650&auto=compress&cs=tinysrgb) no-repeat top center;
    background-size: cover;
    overflow: hidden;
}
.main_counter_area .main_counter_content .single_counter{
    background: rgba(236, 72, 72, 0.5);
        color: #fff;
}
.main_counter_area .main_counter_content .single_counter i{
    font-size:36px;
}

</style>
 <style>
      	@media only screen and (max-width: 768px) {
    		.font_size
    		{
    			font-size: 1.929em !important;
    		}
	}
      </style>
      <style type="text/css">
	@media only screen and (max-width: 700px) {
	    .setWid{
	        width: 100% !important;
	    }
	}
	</style>
	</head>
	<body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive">
		<div class="body_wrap">
			<div class="page_wrap">
				<div class="top_panel_fixed_wrap"></div>
				<?php include("include/header.php"); ?>

				<!-- slider -->
				<section>
				
					<div class="row">
				        <div class="col-md-12">
				            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				             
				                <div class="carousel-inner">
				                 <?php 
				              $image=$cnn->getrows("SELECT * FROM `slider` order by s_id asc limit 1");
				              $get=mysqli_fetch_assoc($image);
				              $id=$get['s_id'];
				             if(mysqli_num_rows($image) > 0)
				             { ?>
				              <div class="item active">
				               <img  style="width:100%;height:433px;background-image:url(../images/slider/<?php echo $get['image']; ?>);background-repeat: no-repeat; background-position:center;background-size:cover;">
				               </div>
				               
				             <?php  $image1=$cnn->getrows("select * from `slider` where s_id != '$id'");
				               while($get1=mysqli_fetch_assoc($image1))
				               {?>
				                 <div class="item ">
				               <img  style="width:100%;height:433px;background-image:url(../images/slider/<?php echo $get1['image']; ?>);background-repeat: no-repeat; background-position:center;background-size:cover;">
				               </div>
				               
				             <?php } } else
				             { ?>
				               <div class="item active">
			                        <img  style="width:100%;height:433px;background-image:url(images/banner.jpg);background-repeat: no-repeat; background-position:center;background-size:cover;">
				               </div>
				             
				            <?php }  ?> 
				                   
				                </div>
				                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
				                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
				                        </span></a>
				            </div>
				            <!--<div class="main-text">
				                <div class="col-md-12 text-center">
				                    <form name="search_event1" id="search_event1" method="POST">
										<div class="search_box" style="top:0px;">

											<div class="col-md-12">
												<div class="col-md-10" style="padding-right:0px;padding-left: 0px;">
													<input type="text" name="search_event" id="search_event" placeholder="Enter Anything like City, Event Name, Organizer Name" style="width: 100%;height: 55px;">
												</div>
												
												<div class="col-md-2" style="padding-right:0px;padding-left: 0px;">
													<button type="button" class="btn" id="searcn_button"  style="width: 100%;height: 55px;">Search</button></div>
											</div>
										</div>
									</form>
				                </div>
				            </div>-->
				        </div>
				    </div>

    			<div id="push">
				</div>
				</section>
				<!-- slider over -->
				
				            
				<div class="page_content_wrap page_paddings_no">
				
					<div class="content_wrap">
						<div class="content">
							<article class="itemscope post_item post_item_single post_featured_center post_format_standard post-133 page type-page status-publish hentry" itemscope itemtype="http://schema.org/Article">
								<section class="post_content" itemprop="articleBody">
									<div class="sc_reviews alignright">
										
									</div>
									<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1445946460653">
									<div class="main-text" style="width:100%;position:initial;margin-bottom:24px;margin-top:10px;">
				                <div class="col-md-12 text-center">
				                    <form name="search_event1" id="search_event1" method="POST">
										<div class="search_box" style="top:0px;">

											<div class="col-md-12">
												<div class="col-md-10" style="padding-right:0px;padding-left: 0px;">
													<input type="text" name="search_event" id="search_event" placeholder="Enter Anything like City, Event Name, Organizer Name" style="width: 100%;height: 55px;border-color:#bdc3c7;">
												</div>
												
												<div class="col-md-2" style="padding-right:0px;padding-left: 0px;">
													<button type="button" class="btn" id="searcn_button"  style="width: 100%;height: 55px;">Search</button></div>
											</div>
										</div>
									</form>
				                </div>
				            </div>
										<div class="wpb_column vc_column_container vc_col-sm-12">
										
										
											<div class="vc_column-inner">
												<div class="wpb_wrapper">
												
												<div class="sc_content content_wrap">	
												<div class="section-info section-events margint-20 section-padding row-height clearfix">
												
                <div class="">
                	
                    <h2 class="section-heading text-upper text-center"> Featured events in your <span class="red">Area </span></h2>
                    
                    <div class="portfolio-section margint-50 clearfix">
                       <div id="fill_event_div">
                       <div class="row">
                    	<?php
                    	$currentDate = date('Y-m-d');
                    	$selectEvents = $cnn->countrow("SELECT em.*,em.city as ucity FROM event_master em,user_master um  WHERE em.user_id =um.user_id and em.start_date <= '$currentDate' AND em.end_date  >= '$currentDate' AND em.status='1' ORDER BY em.start_date ASC");
                    	if($selectEvents > 0)
                    	{
                    	$selectEvent1 = $cnn->getrows("SELECT em.*,um.*,em.city as ucity FROM event_master em,user_master um  WHERE em.user_id =um.user_id and em.start_date <= '$currentDate' AND em.end_date  >= '$currentDate' AND em.status='1' ORDER BY em.start_date ASC");
                    	$i=1;
						
                    	$i=1;
                    	while($getEvent = mysqli_fetch_array($selectEvent1))
                    	{
                       
                    	?>
                        
                        <div class="col-md-4 portfolio-col portfolio-col3" style="float:left;">

                            <div class="portfolio-normal clearfix">
                                
                                      
                                <div class="portfolio-img-box clearfix">
                                
                                    <div class="portfolio-img cover-fix clearfix" style="background-image: url('<?php echo $getEvent['banner']; ?>');">
                                        <div class="date-wrap wrap-right date clearfix">
                                            <p><?php echo date('d, M Y',strtotime($getEvent['start_date'])); ?></p>
                                            
                                        </div>
                                         
                                        
                                        <div class="overlay">
                                            <div class="mask-wrap wrap-left clearfix">
                                                <div class="mask clearfix">
                                                    <div class="mask-info">
                                                        <div class="mask-front">
                                                            <p>View Detail</p>
                                                        </div>
                                                        <div class="mask-back">
                                                            <a href="viewEvent.php?event_id=<?php echo $getEvent['event_id']; ?>" class="clearfix"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                            
                                            <div class="mask-wrap wrap-right clearfix">
                                                <div class="mask clearfix">
                                                    <div class="mask-info">
                                                        <!--<div class="mask-front">
                                                            <p>Photo</p>
                                                        </div>-->
                                                       
                                                        <div class="">
                                                            <a href="#" class="clearfix"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="mask-wrap ">
                                                <div class="">
                                                    <div class="mask-info">
                                                        <div class="mask-front">
                                                            <p style="color: #ffffff;text-align: -webkit-center;background: #8697a738;margin-right: -241px;"><?php echo $getEvent['ucity']; ?><br><span>Organizer:<?php echo $getEvent['first_name']; ?></span><br><span style="float:left;">Time :<?php echo $getEvent['event_time']; ?></span><br></p>
                                                            
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                </div>
                                             
                                            </div>
                                            

                                          
                                        </div>
                                         
                                        
                                    </div>
                                 
                                </div>
                                  <div>
                                                            <p style="text-align: -webkit-center;color: #5b9bd4;font-size: 16px;"><a href="viewEvent.php?event_id=<?php echo $getEvent['event_id']; ?>"><?php echo $getEvent['event_name']; ?></a></p>
                                                        </div>
                            </div>
                          
                        </div>
						<?php $i++; } } 
					   $currentDate = date('Y-m-d');
                    	$selectEvent12 = $cnn->countrow("SELECT em.*,em.city as ucity FROM event_master em,user_master um  WHERE em.user_id =um.user_id and em.start_date > '$currentDate' AND em.status='1' ORDER BY em.start_date ASC");
                    	if($selectEvent12 > 0)
                    	{
                    	
                    	
						$selectEvent1 = $cnn->getrows("SELECT em.*,um.*,em.city as ucity FROM event_master em,user_master um  WHERE em.user_id =um.user_id and em.start_date > '$currentDate' AND em.status='1' ORDER BY em.start_date ASC");
                    	$i=1;
                    	while($getEvent = mysqli_fetch_array($selectEvent1))
                    	{
                       
                    	?>
                        
                        <div class="col-md-4 portfolio-col portfolio-col3" style="float:left;">

                            <div class="portfolio-normal clearfix">
                                
                                      
                                <div class="portfolio-img-box clearfix">
                                
                                    <div class="portfolio-img cover-fix clearfix" style="background-image: url('<?php echo $getEvent['banner']; ?>');">
                                        <div class="date-wrap wrap-right date clearfix">
                                            <p><?php echo date('d, M Y',strtotime($getEvent['start_date'])); ?></p>
                                            
                                        </div>
                                         
                                        
                                        <div class="overlay">
                                            <div class="mask-wrap wrap-left clearfix">
                                                <div class="mask clearfix">
                                                    <div class="mask-info">
                                                        <div class="mask-front">
                                                            <p>View Detail</p>
                                                        </div>
                                                        <div class="mask-back">
                                                            <a href="viewEvent.php?event_id=<?php echo $getEvent['event_id']; ?>" class="clearfix"><i class="fa fa-eye" aria-hidden="true"></i>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              
                                            
                                            <div class="mask-wrap wrap-right clearfix">
                                                <div class="mask clearfix">
                                                    <div class="mask-info">
                                                        <!--<div class="mask-front">
                                                            <p>Photo</p>
                                                        </div>-->
                                                       
                                                        <div class=""> <!--mask-back-->
                                                            <a href="#" class="clearfix"><i class="fa fa-eye" aria-hidden="true"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                                <div class="mask-wrap ">
                                                <div class="">
                                                    <div class="mask-info">
                                                        <div class="mask-front">
                                                            <p style="color: #ffffff;text-align: -webkit-center;background: #8697a738;margin-right: -241px;"><?php echo $getEvent['ucity']; ?><br><span>Organizer:<?php echo $getEvent['first_name']; ?></span><br><span style="float:left;">Time :<?php echo $getEvent['event_time']; ?></span><br></p>
                                                            
                                                        </div>
                                                       
                                                        
                                                    </div>
                                                </div>
                                             
                                            </div>
                                            

                                          
                                        </div>
                                         
                                        
                                    </div>
                                 
                                </div>
                                  <div>
                                                            <p style="text-align: -webkit-center;color: #5b9bd4;font-size: 16px;"><a href="viewEvent.php?event_id=<?php echo $getEvent['event_id']; ?>"><?php echo $getEvent['event_name']; ?></a></p>
                                                        </div>
                            </div>
                          
                        </div>
                       <?php $i++; } 
					   
					   } else if($selectEvents == '0' && $selectEvents == '0'){ echo "<span style='color:red;'>No Event Right Now......</span>"; } ?>
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

									<div class="vc_row-full-width"></div>
									<div id="homepage-hello" class="vc_row wpb_row vc_row-fluid">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="sc_content content_wrap" style=" padding-bottom: 1.15em;">
														<h3 class="sc_title sc_title_underline sc_align_center margin_bottom_tiny font_size" style="text-align:center;font-size:2.929em;"><span style="color: #fcb41e;">Hello!</span> StallsBook is not JUST a  Stall Booking Company or Stall Find Partner, it’s your One Stop solution to manage all the Events/Exhibitions. </h3>
														<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_1 margin_top_tiny- margin_bottom_huge" style="margin:0 auto;width:62%;">
															<div class="column-1_1 sc_column_item sc_column_item_1 odd first">
																<div class="wpb_text_column wpb_content_element " >
																	<div class="wpb_wrapper">
				<!--<h4 style="text-align: center;font-weight:bold;color:red;">Stalls Book</h4>-->
																		<p style="text-align: left;font-size:18px;">Stalls Book is not just a stall finder or a stall booking partner neither it is the mediator between organizer and vendors, it’s your book with all the stalls info and a one stop solution to manage all your Events/Exhibitions.</p>
																		<p style="text-align: left;">Choose type of user below to read what stalls book means to you</p>
	<!--<p style="float:left;"><h4 style="color:#2245c3;">Organizer:</h4></p>-->
	<div class=""><span id="or_click" style="color:blue;font-size:16px;cursor:pointer;color:red;"><input type="radio" name="or1" id="or1" checked>Organizer</span>&nbsp;&nbsp;&nbsp;&nbsp;<span id="vr_click" style="color:blue;font-size:16px;cursor:pointer;"><input type="radio" name="vr1" id="vr1">Vendor</span></div>
	<br>
	<div class="or" style="display:block;">
																		<p style="text-align: left;">1. Now no more paying commission on stall bookings: Post your event and get leads from vendors directly without mediators involved!</p>
																		<p style="text-align: left;">2. Say goodbye to all the paper work, as managing all your bookings, payments and getting real time reports anytime anywhere is just click away.</p>
																		<p style="text-align: left;">3. All events in StallsBook are google maps integrated so no more confusion in navigating all your vendors to the event spot.</p>
																		<p style="text-align: left;">4. Upload pics of your previous events and let all vendors know how successful your events are.</p>
																		<p style="text-align: left;">5. No more marketing messages required, notify all the vendors about your event directly from our application.</p>
																		<p style="text-align: left;">6. Check out the vendors profile and know their line of business before accepting stall booking requests, this will help you in conducting events with monopoly stalls.</p>
																		
																		<p style="text-align: left;font-size:16px;">So why wait more, just <a href="registration.php" style="color:green;">register</a>/<a href="login.php" style="color:green;">login</a> as Organizer and post your First event right now!!!!</p>
	</div>
					<!--<p style="float:left;"><h4 style="color:#2245c3;">Vendors:</h4></p>-->
	<div class="vr" style="display:none;">
					<p style="text-align: left;">1.	Now no more paying commission on stall bookings: no mediators involved Get in touch with organizer directly</p>
					<p style="text-align: left;">2.	Say goodbye to all the paper work, managing all your bookings, payments and getting real time reports anytime anywhere is just click away.</p>
						<p style="text-align: left;">3.	Searching for events made simple, search by city, organizer, event name or by the venue.</p>
							<p style="text-align: left;">4.	Know your competitor: before booking event checkout which other vendors are doing the event and gauge your competition.</p>
									<p style="text-align: left;">5.	Read and write reviews about the organizer and the event venue.</p>
									<p style="text-align: left;">6.	No more last-minute surprises, get your bookings conformation beforehand from the organizer.</p>
									<p style="text-align: left;">7.	All events in StallsBook are google maps integrated so no more confusion in navigating to the event spot.</p>
									<p style="text-align: left;font-size:16px;">So why wait more, just <a href="registration.php" style="color:green;">register</a>/<a href="login.php" style="color:green;">login</a> as Vendor and book your First event right now!!!!</p>
									</div>

																	</div>
																</div>
															</div>
														</div>
														<!-- <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4 margin_bottom_huge">
															<div class="column-1_4 sc_column_item sc_column_item_1 odd first" style="margin-left: -20px;">
																<div class="sc_section" data-animation="animated fadeIn normal">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-page1_icon5 aligncenter"></span>
																		<h4 style="font-size: 1.214em;color: #272530;text-align: center" class="vc_custom_heading icon_title" >Find the perfect venue for free</h4>
																		<span class="sc_icon none aligncenter number_icon "></span>
																	</div>
																</div>
															</div>
															<div class="column-1_4 sc_column_item sc_column_item_2 even">
																<div class="sc_section" data-animation="animated fadeIn normal">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-page1_icon6 aligncenter"></span>
																		<h4 style="font-size: 1.214em;color: #272530;text-align: center" class="vc_custom_heading icon_title" >Connect with the best organiser</h4>
																		<span class="sc_icon none aligncenter number_icon "></span>
																	</div>
																</div>
															</div>
															<div class="column-1_4 sc_column_item sc_column_item_3 odd">
																<div class="sc_section">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-page1_icon7 aligncenter"></span>
																		<h4 style="font-size: 1.214em;color: #272530;text-align: center" class="vc_custom_heading icon_title" >Let us help you with the Stall</h4>
																		<span class="sc_icon none aligncenter number_icon "></span>
																	</div>
																</div>
															</div>
															<div class="column-1_4 sc_column_item sc_column_item_4 even">
																<div class="sc_section" data-animation="animated fadeIn normal">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-page1_icon8 aligncenter"></span>
																		<h4 style="font-size: 1.214em;color: #272530;text-align: center" class="vc_custom_heading icon_title" >Enjoy the profit Join our team</h4>
																		<span class="sc_icon none aligncenter number_icon "></span>
																	</div>
																</div>
															</div>
														</div> -->
													</div>
												</div>
											</div>
										</div>
									</div>
									<hr>
									<!--<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1446027109651">-->
										<!-- <div class="wpb_column vc_column_container vc_col-sm-12"> -->
											<!-- <div class="vc_column-inner "> -->
							<!--<section id="counter" class="counter">
					            <div class="main_counter_area">
					                <div class="overlay p-y-3">
					                    <div class="container-fluid">
					                        <div class="row">
					                            <div class="main_counter_content text-center white-text wow fadeInUp">
					                                <div class="col-md-3">
					                                    <div class="single_counter p-y-2 m-t-1" style="background: rgba(5, 12, 14, 0.53);">
					                                        <i class="fa fa-heart m-b-1"></i>
					                                        <h2 class="statistic-counter" style="color:#fff;">
					                                        	<?php $selectOrganizer = $cnn -> countrow("SELECT *FROM user_master WHERE user_type='Organizer'"); 
					                                        	echo $selectOrganizer;
					                                        	?>
					                                        	
					                                        </h2>
					                                        <p>Organizer</p>
					                                    </div>
					                                </div>
					                                <div class="col-md-3">
					                                    <div class="single_counter p-y-2 m-t-1" style="background:rgba(5, 12, 14, 0.53);">
					                                        <i class="fa fa-check m-b-1"></i>
					                                        <h2 class="statistic-counter" style="color:#fff;"><?php 
											$selectevent = $cnn -> countrow("SELECT * FROM event_master");
											echo $selectevent;
											?></h2>
					                                        <p>Event</p>
					                                    </div>
					                                </div>
					                                <div class="col-md-3">
					                                    <div class="single_counter p-y-2 m-t-1" style="background: rgba(5, 12, 14, 0.53);">
					                                        <i class="fa fa-refresh m-b-1"></i>
					                                        <h2 class="statistic-counter" style="color:#fff;"><?php 
											$selectvenoder = $cnn -> countrow("SELECT *FROM user_master WHERE user_type='Vendor'");
											echo $selectvenoder;
											?></h2>
					                                        <p>Vendor</p>
					                                    </div>
					                                </div>
					                                <div class="col-md-3">
					                                    <div class="single_counter p-y-2 m-t-1" style="background: rgba(5, 12, 14, 0.53);">
					                                        <i class="fa fa-beer m-b-1"></i>
					                                        <h2 class="statistic-counter" style="color:#fff;">48</h2>
					                                        <p>Visited Customer</p>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                </div>
					            </div>
					        </section>-->
					        <!-- End of counter Section -->

					<!-- <div class="">
							<div class="" style=" padding-top: 2.5em; padding-bottom: 2.7em;">
														
													</div>
												</div> -->
											<!-- </div> -->
										<!-- </div> -->
									</div>
									<div class="vc_row-full-width"></div>
									<?php
									$selectImage1 = $cnn -> countrow("SELECT * FROM gallery_image LIMIT 4");
									if($selectImage1 > 0)
									{
									?>
									<!--<div class="page_wrap" >
<h2 class="sc_title sc_title_underline sc_align_center margin_top_small margin_bottom_tiny" style="text-align:center;">Gallery</h2>
							<h6 class="sc_title sc_title_style1 sc_align_center margin_bottom_large" style="text-align:center;"><span class="sc_title_style1_before"></span>Happy clients about us<span class="sc_title_style1_after"></span></h6>
							<div class="">
									<div class="row">
										<div class="col-md-12">
									<?php 
											$selectImage = $cnn -> getrows("SELECT * FROM gallery_image LIMIT 4"); 
											while($getImage = mysqli_fetch_array($selectImage))
											{
										?>
										<div class="col-md-3">
										<div class="">
											<a href="../images/gallery/<?php echo $getImage['image']; ?>">
											<figure><img src="../images/gallery/<?php echo $getImage['image']; ?>"  style="width:100%;height: 200px;px;background-size: cover;  background-position: center center;margin-bottom: 8px;background-repeat: no-repeat; " currentSlide(1)" class="hover-shadow cursor"></figure></a>
										</div>
										</div>
										
										<?php } ?>
										</div>
										</div>
										</div>
									</div>	-->
									<?php } 
                  		$count = $cnn -> countrow("SELECT * FROM testimonial");
                      if($count != '0')
                      {
                  ?>
									<div class="vc_row-full-width"></div>
									<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1446032902066" style="margin-top: 13%;">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="sc_content content_wrap" style="padding-bottom:1em;">
														<h2 class="sc_title sc_title_underline sc_align_center margin_top_small margin_bottom_tiny" style="text-align:center;">Testimonials</h2>
														<h6 class="sc_title sc_title_style1 sc_align_center margin_bottom_large" style="text-align:center;"><span class="sc_title_style1_before"></span>Happy clients about us<span class="sc_title_style1_after"></span></h6>
														<div id="sc_testimonials_487717240" class="sc_testimonials sc_testimonials_style_testimonials-1  sc_slider_swiper swiper-slider-container sc_slider_nopagination sc_slider_controls sc_slider_controls_bottom margin_bottom_medium" data-interval="70000" data-slides-per-view="3" style="width:100%;">
															<div class="slides swiper-wrapper">
						<?php 
            $i= 1 ;
						$selectTesti = $cnn -> getrows("SELECT * FROM testimonial");
						while($getTesti = mysqli_fetch_assoc($selectTesti))
						{
              
						?>
						<div class="swiper-slide" data-style="width:100%;" style="width:100%;">
						<div id="sc_testimonials_487717240_1" class="sc_testimonial_item">
						<div class="sc_testimonial_content">
								<p><?php echo substr($getTesti['t_desc'],0,20); ?>...</p>
						</div>
							<div class="sc_testimonial_avatar"><img class="wp-post-image" width="75" height="75" alt="Jessica Mann" src="../<?php echo $getTesti['t_image']; ?>"></div>
						<div class="sc_testimonial_author"><span class="sc_testimonial_author_name"><?php echo $getTesti['t_name']; ?></span></div>
							</div>
							</div>
							<?php
           
               } ?>										

															</div>
															<div class="sc_slider_controls_wrap"><a class="sc_slider_prev" href="#"></a><a class="sc_slider_next" href="#"></a></div>
															<div class="sc_slider_pagination_wrap"></div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
                  <?php } ?>
									<div class="vc_row-full-width"></div>
									<div class="app_area">
										<div class="vc_col-sm-6">
											<div class="col-md-6">
											<a href="https://play.google.com/store/apps/details?id=com.alex.stallbook" target="_blank"><img src="images/app1.jpg" class="img-responsive img-thumbnail" height="200px;"></a>
											</div>
											<div class="col-md-6">
											<a href="https://play.google.com/store/apps/details?id=com.alex.stallbook" target="_blank"><img src="images/app2.jpg" class="img-responsive img-thumbnail" height="200px;"></a>
											</div>
										</div>
										<br><br>
										<div class="vc_col-sm-6">
											<h2>Get Our App</h2>
											<h5 style="font-weight:bold;">
											<ul>
												<li>Discover local Events/Exhibitions in your Area</li>
												<li>Find more details about the event:
												<ul>
													<li>Event bookings, </li>
													<li>Organizer and Venue reviews</li>
													<li>Other events by the selected organizer</li>
													<li>Other events at the selected venue</li>
												</ul>
												</li>
												<li>Track Bookings</li>
												<li>Track Payments and Refunds</li>
											</ul>
											</h5>
											<a href="https://play.google.com/store/apps/details?id=com.alex.stallbook" target="_blank"><img src="images/android.png" class="img-responsive" style="height: 45px; "></a>
										</div>
									</div>
									
									<div id="form-parallax" data-vc-full-width="true" data-vc-full-width-init="false" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1446813363327 vc_row-no-padding">
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="sc_content content_wrap">
														<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
															<div class="column-1_4 sc_column_item sc_column_item_1 odd first" style="margin-left:24%"></div>
															<div class="column-1_2 sc_column_item sc_column_item_2 even">
																<h2 class="sc_title sc_title_underline sc_align_center margin_top_small margin_bottom_tiny" style="text-align:center;color:#ffffff;">Online Request</h2>
																<h6 class="sc_title sc_title_style1 sc_align_center margin_top_small margin_bottom_large" style="text-align:center;color:#ffffff;"><span class="sc_title_style1_before" style="background-color: #ffffff"></span>Drop us a few lines<span class="sc_title_style1_after" style="background-color: #ffffff"></span></h6>
																<div  id="sc_form_1300488981_wrap" class="sc_form_wrap">
																	<div  id="sc_form_1300488981" class="sc_form sc_form_style_form_1 aligncenter margin_bottom_huge" style="width:88%;">
																		<form action="contactscript.php" id="sc_form_1300488981" data-formtype="form_1" method="POST">
																<div class="sc_form_info">
											<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
											<div class="column-1_2 sc_column_item sc_column_item_1">
										<div class="sc_form_item sc_form_field label_over"><label class="required" for="sc_form_username">Name:</label><input id="sc_form_username" name="c_name" type="text"  placeholder="Name:" required="true"></div>
													</div>
										<div class="column-1_2 sc_column_item sc_column_item_2">
										<div class="sc_form_item sc_form_field label_over"><label class="required" for="sc_form_phone">Phone:</label><input id="sc_form_phone" name="c_mobile" type="text" maxlength="10"  onkeypress="return isNumber(event)" placeholder="Phone:" required="true"></div>
												</div>
													</div>
											</div>
									<div class="sc_form_item sc_form_message label_over"><label class="required" for="sc_form_message">Email</label>
									<input style="width: 100%;" id="sc_form_phone" name="c_email" type="text" placeholder="Email:" required="true">
									</div>
									<div class="sc_form_item sc_form_message label_over"><label class="required" for="sc_form_message">Message</label>
									<textarea type="text" id="sc_form_message" 
									name="c_description" placeholder="Message:" required="true"></textarea>
									</div>
										<input type="submit" value="send" name="contact" class="sc_form_item sc_form_button">
																		</form>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="vc_row-full-width"></div>
									<div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid vc_custom_1446045661779">
									<?php 
									$selectus = $cnn-> getrows("SELECT *FROM contact_us_master");
									$getus = mysqli_fetch_array($selectus);
									?>
										<div class="wpb_column vc_column_container vc_col-sm-12">
											<div class="vc_column-inner ">
												<div class="wpb_wrapper">
													<div class="sc_content content_wrap margin_top_huge margin_bottom_large">
														<div class="columns_wrap sc_columns columns_nofluid sc_columns_count_4 contact-row ">
															<div class="column-1_3 sc_column_item sc_column_item_1 odd first" style="    margin-left: -12px;">
																<div class="sc_section" style="    height: 200px;">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-contacts_icon1 aligncenter" style="font-size:2.35em; line-height: 1em;color:#ff635c;"></span>
																		<h6 class="sc_title sc_title_regular sc_align_center" style="text-align:center;">Postal Address</h6>
																		<div class="wpb_text_column wpb_content_element " >
																			<div class="wpb_wrapper">
																				<p style="text-align: center;"><?php echo $getus['con_address']; ?>
																				</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="column-1_3 sc_column_item sc_column_item_2 even">
																<div class="sc_section" style="    height: 200px;">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-contacts_icon2 aligncenter" style="font-size:2.35em; line-height: 1em;color:#ff635c;"></span>
																		<h6 class="sc_title sc_title_regular sc_align_center" style="text-align:center;">Phone &amp; E-mail</h6>
																		<div class="wpb_text_column wpb_content_element " >
																			<div class="wpb_wrapper">
																				<p style="text-align: center;">Phone: +91 <?php echo $getus['con_mobile']; ?><br />
																					Email: <?php echo $getus['con_email']; ?><br />
																					<!--<a href="#"><span class="__cf_email__" data-cfemail="056a63636c66604563646769602b666a68">[email&#160;]</span></a>-->
																				</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="column-1_3 sc_column_item sc_column_item_3 odd">
																<div class="sc_section" style="    height: 200px;">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-contacts_icon3 aligncenter" style="font-size:2.35em; line-height: 1em;color:#ff635c;"></span>
																		<h6 class="sc_title sc_title_regular sc_align_center" style="text-align:center;">Open Hours</h6>
																		<div class="wpb_text_column wpb_content_element " >
																			<div class="wpb_wrapper">
																				<p style="text-align: center;"><?php echo $getus['con_open']; ?>
																																						</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
															<div class="column-1_4 sc_column_item sc_column_item_4 even" style="display:none">
																<div class="sc_section">
																	<div class="sc_section_inner">
																		<span class="sc_icon icon-contacts_icon4 aligncenter" style="font-size:2.35em; line-height: 1em;color:#ff635c;"></span>
																		<h6 class="sc_title sc_title_regular sc_align_center" style="text-align:center;">Sessions</h6>
																		<div class="wpb_text_column wpb_content_element " >
																			<div class="wpb_wrapper">
																				<p style="text-align: center;">Mornings, 8 am – 12 noon<br />
																					Afternoons, 1 pm – 5 pm<br />
																					Full Day, 8 am – 5 pm
																				</p>
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

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>

        <script>
        jQuery('.statistic-counter').counterUp({
                delay: 10,
                time: 2000
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
        <script>
        $(document).ready(function(){
        	$("#searcn_button").click(function(){
        		var search_event = $("#search_event").val();

        		$.ajax({
        				url : 'searchEventData.php',
        				type : 'POST',
        				data : {
        						search_event:search_event
        				},
        				success:function(data)
        				{
        					if(data == "")
        					{
        						window.location.href="index.php";
        					}
        					else
        					{
        						$("#fill_event_div").html(data);	
        					}
        					
        				}
        		});
        	});
        });
        </script>
	<script>
	$(document).ready(function(){
		/*$("#or_click").click(function(){
			$(".or").css("display","block");
			$(".vr").css("display","none");
			$("#or_click").css("color","red");
			$("#vr_click").css("color","blue");
		});
		$("#vr_click").click(function(){
			$(".vr").css("display","block");
			$(".or").css("display","none");
			$("#vr_click").css("color","red");
			$("#or_click").css("color","blue");
		});*/
		$('input[type=radio][name=or1]').change(function() {
		        $(".or").css("display","block");
			$(".vr").css("display","none");
			$("#or_click").css("color","red");
			$("#vr_click").css("color","blue");
			$("#vr1").prop("checked",false);
		});
		$('input[type=radio][name=vr1]').change(function() {
		        $(".vr").css("display","block");
			$(".or").css("display","none");
			$("#vr_click").css("color","red");
			$("#or_click").css("color","blue");
			$("#or1").prop("checked",false);
		});
	});
	</script>
	</body>
</html>