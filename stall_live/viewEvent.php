<?php
   include("../include/config.php"); 
   //include("include/session.php");
   session_start(); 
    $cnn = new connection(); 
    $event_id = $_GET['event_id'];
    
    $e_info=$cnn->getrows("SELECT * FROM event_master where event_id = '$event_id'");
    $g_get=mysqli_fetch_assoc($e_info);
   ?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
   <head>
      <meta charset="UTF-8" />
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <link rel="icon" href="images/favicon.png">
      <link rel="profile" href="http://gmpg.org/xfn/11" />
      <link rel="pingback" href="xmlrpc.php" />
      <title>StallBooking</title>
      <link rel='dns-prefetch' href='http://maps.google.com/' />
      <link rel='dns-prefetch' href='http://fonts.googleapis.com/' />
      <link rel='dns-prefetch' href='http://s.w.org/'/>
      <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
     <!-- <link rel="stylesheet" href="css/style.css">-->
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
         .sidebar_outer_logo .logo_main,.top_panel_wrap .logo_main,.top_panel_wrap .logo_fixed{height:} .contacts_wrap .logo img{height:50px}
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
      <script  src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
      
      <link rel="stylesheet" href="css/lightbox.min.css">
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
      <!--<link href="css/style.css" rel="stylesheet" type="text/css">
      <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
      <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">-->
      <link href="css/my-style.css" rel="stylesheet" type="text/css">
      <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" />
      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/css/bootstrap-datepicker3.css"/>
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
      <style>
      	@media only screen and (max-width: 768px) {
    		.button_style
    		{
    			margin-top: 10px;
    			margin-left: 15%;
    		}
	}
	@media only screen and (max-width: 700px) {
	    .setHW{
	        width:80px !important;
	        height:80px !important;
	    }
	    .setBottom{
	        margin-top:5px !important;
	    }
	}
	
      </style>
     
   </head>
   <body class="home page-template-default page page-id-133 unicaevents_body body_style_wide body_filled theme_skin_default article_style_stretch layout_single-standard template_single-standard top_panel_show top_panel_above sidebar_hide sidebar_outer_hide wpb-js-composer js-comp-ver-5.1 vc_responsive">
      <div class="body_wrap" style="background-color: #CD714F;">
         <div class="page_wrap">
            <div class="top_panel_fixed_wrap"></div>
            <?php include("include/header.php"); ?>
            <hr>
      
            <div class="page_content_wrap page_paddings_no">
           <center>  <h3 style="margin-left:1%;color:#5b9bd5;">Event Information</h3></center>
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
                   
                    $selectEvent = $cnn ->getrows("SELECT um.*,em.*,em.city as ecity FROM event_master em,user_master um WHERE um.user_id = em.user_id AND em.event_id = '$event_id'");
                    $i=1;
                    while($getEvent = mysqli_fetch_array($selectEvent))
                    {
                    ?>
                     <div class="container">
                        <div class="row" style="margin-bottom:2%;">
                           
                            <div class="events">
      <!--<div class="col-md-3" style="background-color: darkgoldenrod;">
        <div class="event_no">
          <h4><b style="font-weight: 300;font-size:16px;">Event ID: <?php echo $getEvent['event_id']; ?></b></h4>
        </div>
      </div>-->
      <div class="col-md-12">
        <div class="event-title">
          <center><h4><b style="color:#fff;"><?php echo $getEvent['event_name']; ?></b></h4></center>
        </div>
      </div>
      <br>
    </div>
    <div class="row">
      <div class="event_details">
        <div class="col-md-3" >
          <div class="img_ev">
            <img src="<?php echo $getEvent['banner']; ?>" style="width:100%;height: 277px;">
          </div>
        </div>
        <div class="col-md-9">
          <div class="card">
          <div class="evSn2">
            <div class="col-md-4" >
              <h4 style=""><i class="fa fa-calendar-plus-o fa-lg"> </i>&nbsp; <?php echo date('d-m-Y',strtotime($getEvent['start_date']));  ?> To <?php echo date('d-m-Y',strtotime($getEvent['end_date']));  ?></h4>
            </div>
            <div class="col-md-4">
              <h4 style=""><i class="fa fa-clock-o fa-lg " > </i>&nbsp; From <?php echo $getEvent['event_time'];  ?></h4>
            </div>
            <br><br>
              <div class="loc_evnt row" style="margin:15px;">
                <span style="font-size: 15px;"><i class="fa fa-map-marker fa-lg" ></i> <?php echo $getEvent['event_address'];  ?></span>
              </div>
            </div>
            <div class="evSn2">
              <div class="row">
              <div class="col-md-2">
                <img class="setHW" src="<?php echo $getEvent['image']; ?>" style="width:60px;border-radius: 50%;border: 3px solid #eee;margin-left: 10px;width:100px;height:100px;">
              </div>
              <div class="col-md-10">
                <div class="col-md-6">
                  <div class="org_name">
                                        <span><b>Event Organizer :</b></span> <span > <?php echo $getEvent['first_name']." ".$getEvent['last_name']; ?></span>
                  </div>
                  <div class="event_type" style="margin-top: 3%;">  
                                        <span><b>City :</b></span> <span ><?php echo $getEvent['ecity']; ?></span>
                  </div>
                                     <p style="margin-top: 3%;"><b style="color:black;">Description: </b><span id="desc" name="desc"><span > <?php echo substr($getEvent['event_desc'],0,70)."..."; ?><span></span>
                                     <a type="button" id="loadMore" name="loadMore" class="" style="padding:3px;cursor:pointer;">Read More</a>
                                     </p>
                                     
                                     <script>
					      $(document).ready(function(){
					      	$("#loadMore").click(function(){
					      		var event_id = '<?php echo $getEvent['event_id'];?>';
					      		
					      		$.ajax({
					      			url:'loadEventDescription.php',
					      			type:'POST',
					      			data:{
					      				event_id:event_id
					      			},
					      			success:function(data)
					      			{
					      				$("#desc").text(data);
					      				$("#loadMore").hide();
					      			}
					      		});
					      	});
					      });
				    </script>
                                     
                </div>
                <div class="col-md-6" style="float: right;">
                  <button class="btn btn-default" style="box-shadow: 0 2px 0 0 #ddd;width:52%;cursor:not-allowed;background-color: #344154;"><span style="font-weight: 600; font-size: 15px;"><?php echo $getEvent['avai_stall']; ?></span><b> Stalls Available</b></button>
                  <button class="btn btn-default1" style="box-shadow: 0 2px 0 0 #ddd;width:46%;cursor:not-allowed;background-color: #344154;"><b><span style="font-weight: 600; font-size: 15px;"><?php echo $getEvent['total_stall']; ?> </span>Total Stalls</b></button>
                  <div class="clearfix"></div>
                  <br>
                  <div class="ev_ticket">
                  <span><b>Rates :</b></span>
                  <span style="background-color: #344154;color:white; padding: 5px;border-radius: 3px;box-shadow: 0 2px 0 0 #ddd; border-radius: 2px;">
                    <i class="fa fa-inr" aria-hidden="true"> &nbsp;<?php echo $getEvent['stall_charge']; ?></i> </span>            
                  </div>
                </div>
                <div class="col-md-12 detail" style="margin-bottom: 15px;margin-top: 3%;text-align: center;">

                                                  <?php
                      
                                                  if(isset($_SESSION['email']) != "")
                                                  {
                                                    $user_type = $_SESSION['user_type'];
                                                    if($user_type == 'Vendor')
                                                    {
                                                    	
                                                      $avai_stall = $getEvent['avai_stall'];
                      if($avai_stall <= 0)
                      { ?>
                        <button class="btn btn-default1" onclick="alert('Stall Not Available.');" style="margin-right: 27%;"><b>Book Now</b></button>
                      <?php }
                      else
                      {
                      
                      		
                                                  ?>
                          <button class="btn btn-default1" data-toggle="modal" data-target="#myModal" style="margin-right: 27%;background-color: #344154;"><b>Book Now</b></button>
                                                <?php } }else {  ?>
                          <button class="btn btn-default1" onclick="alert('Only vendors are allowed to book, Please login as Vendor to Book!');" style="margin-right: 27%;background-color: #344154;"><b>Book Now</b></button>
                                                <?php } }else { ?>
                          <a href="login.php" class="btn btn-danger button_style"  style="margin-right: 27%;border-color: #344154;background-color: #344154;"><b>Login To Book Your Stall</b></a>
                                                <?php }  ?>
                                                                              </div>
               </div>
              </div>
            </div>
          </div>
         <br><br>
        </div>
        
        
      </div>
      <!--<div class="row">
				        <div class="col-md-12">
				        <?php
					        $image=$cnn->getrows("SELECT images FROM `event_master` where event_id = '$event_id'");
					        $getEvent = mysqli_fetch_array($image);
					       
					        $dataimg = explode(",",$getEvent['images']);
					        foreach($dataimg as $dtimg)
					        {
				        ?>
				        <div class="col-md-3">
				        	<img src="images/event/<?php echo $dtimg; ?>" class="img-responsive img-thumbnail" style="width: 100%;height: 150px;">
				        </div>
				        <?php } ?>
				        </div>
				        </div>-->
    </div>
                            
                                                      </div>

                                                       <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog" style="background-color: transparent;">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" style="color:black;background-color:white;" class="close" data-dismiss="modal">X</button>
          <center><h4 class="modal-title">Booking Your Stall</h4></center>
        </div>
        <div class="modal-body">

           <form name="frm" id="frm" action="insertBooking.php" method="POST">
           	<input type="hidden" name="event_id" value="<?php echo $g_get['event_id']; ?>">
           	
			

			<div class="row">
			    <div class="col-md-3">
			    	<div class="form-group">
			     		<label for="shop_no" >No of Stall:</label>
			  		</div>
				</div>
				<div class="col-md-9">
			      	<div class="form-group">
			      		<input type="text" class="form-control col-md-10" id="shop_no" placeholder="Enter Number of Stall" onkeypress="return isNumber(event)" name="shop_no" value="1" required>
					</div>
			    </div>
			</div>

			<div class="row">
			    <div class="col-md-3">
			    	<div class="form-group">
			     		<label for="shop_name" >Stall Name:</label>
			  		</div>
				</div>
				<div class="col-md-9">
			      	<div class="form-group">
			      		<input type="text" class="form-control col-md-10" id="shop_name" placeholder="Enter Stall Name" name="shop_name" required>
					</div>
			    </div>
			</div>

			<div class="row">
			    <div class="col-md-3">
			    	<div class="form-group">
			     		<label for="start_date" >Start Date:</label>
			  		</div>
				</div>
				<div class="col-md-9">
			      	<div class="form-group">
			      		<input type="text" class="form-control col-md-10" id="start_date"  name="start_date" value="<?php echo date('d/m/Y',strtotime($g_get['start_date'])); ?>" required>
					</div>
			    </div>
			</div>

			<div class="row">
			    <div class="col-md-3">
			    	<div class="form-group">
			     		<label for="end_date"><span style="text-decoration:none;">End Date:</span></label>
			  		</div>
				</div>
				<div class="col-md-9">
			      	<div class="form-group">
			      		<input type="text" class="form-control col-md-10" id="end_date" name="end_date" value="<?php echo date('d/m/Y',strtotime($g_get['end_date'])); ?>" required>
					</div>
			    </div>
			</div>
			<hr>
		    <div class="row">
			    <center><button type="submit" name="insertBook" id="insertBook" class="btn btn-default">Submit</button></center>
			</div>
		    
		    
		  </form>

        </div>
        
      </div>
      
    </div>
  </div>
                                                      <?php $i++;} ?>
                                                      <!--//row-->
                                                      <div class="clearfix"></div>
													        <section>
				<div class="container">
					<div class="row">
				        <div class="col-md-12">
				        <h3 style="margin-left:1%;color:#5b9bd5;">Event Images</h3>
<?php
$selectImage = $cnn->getrows("SELECT *FROM event_master WHERE event_id='$event_id'");
$getImage = mysqli_fetch_array($selectImage);
$dataimg1 = explode(",",$getImage['images']);
$i++;
foreach($dataimg1 as $dtimg1)
{
?>
<div class="col-md-2">				        
<a class="example-image-link" href="images/event/<?php echo $dtimg1; ?>" data-lightbox="example-set" data-title=""><img class="example-image img-responsive img-thumbnail setBottom" src="images/event/<?php echo $dtimg1; ?>" style="width:100%;height:100px;" alt=""/></a>
</div>
<?php $i++; } ?>

<!--<div>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-3.jpg" data-lightbox="example-set" data-title="Click the right half of the image to move forward."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-3.jpg" alt=""/></a>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-4.jpg" data-lightbox="example-set" data-title="Or press the right arrow on your keyboard."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-4.jpg" alt="" /></a>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-5.jpg" data-lightbox="example-set" data-title="The next image in the set is preloaded as you're viewing."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-5.jpg" alt="" /></a>
      <a class="example-image-link" href="http://lokeshdhakar.com/projects/lightbox2/images/image-6.jpg" data-lightbox="example-set" data-title="Click anywhere outside the image or the X to the right to close."><img class="example-image" src="http://lokeshdhakar.com/projects/lightbox2/images/thumb-6.jpg" alt="" /></a>
    </div>-->
			
			
			        
				        
				            <!--<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
				               
				                <div class="carousel-inner">
				                    <?php 
				              $image=$cnn->getrows("SELECT * FROM `event_master` where event_id = '$event_id'");
				             while($get=mysqli_fetch_assoc($image))
							 {
								 $get1=$get;
								 $get2[]=$get;
							 }
				             $array = explode(',',$get1['images'] );
								$first = $array [0];
								$imag=str_replace(" ","%20",$first);
							
				             if(mysqli_num_rows($image) > 0)
				             { ?>
				              <div class="item active" style="position: relative;   overflow: hidden;">
				               <img  style="width:100%;height:433px;background-image:url(../stall_live/images/event/<?php echo $imag; ?>);background-repeat: no-repeat; background-position:center;background-size:100% 100%;">
				               </div>

							   				<?php 
										foreach ($get2 as $i)
														{
															
															$fsize = $i['images'];
															$size = explode(",",$fsize);
															$len = sizeof($size);
														
																for($i=1;$i<$len;$i++)
																{
																
																?>
														 <div class="item">
				               <img  style="width:100%;height:433px;background-image:url(../stall_live/images/event/<?php echo 	str_replace(" ","%20",$size[$i]); ?>);background-repeat: no-repeat; background-position:center;background-size:100% 100%;">
				               </div>
																	
															<?php
															
																}
															
														}
											?>				
				               
				             <?php } else
				             { ?>
				               <div class="item active">
			                        <img  style="width:100%;height:433px;background-image:url(images/banner.jpg);background-repeat: no-repeat; background-position:center;background-size:100% 100%;">
				               </div>
				             
				            <?php }  ?> 
				                    
				                </div>
				                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
				                    <span class="glyphicon glyphicon-chevron-left"></span></a><a class="right carousel-control"
				                        href="#carousel-example-generic" data-slide="next"><span class="glyphicon glyphicon-chevron-right">
				                        </span></a>
				            </div>-->
				            <!--<div class="main-text hidden-xs">
				                <div class="col-md-12 text-center">
				                    <form>
										<div class="search_box" style="top:142px;">

											<div class="col-md-12">
												<div class="col-md-5" style="padding-right:0px;padding-left: 0px;"><input type="text" name="" placeholder="Enter Anything" style="width: 100%;height: 55px;"></div>
												<div class="col-md-5" style="padding-right:0px;padding-left: 0px;">
													<select style="width: 100%;height: 55px;">
														<option>Madhya Pradesh</option>
													</select>
												</div>
												<div class="col-md-2" style="padding-right:0px;padding-left: 0px;"><button type="submit" class="btn"  style="width: 100%;height: 55px;">Search</button></div>
											</div>
										</div>
									</form>
				                </div>
				            </div>-->
				        </div>
				    </div>
				    </div>

    			<div id="push">
				</div>
				</section>
                                                      <br>
                                                      
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
      <script src="js/lightbox-plus-jquery.min.js"></script>
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
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.4.1/js/bootstrap-datepicker.min.js"></script>
      <script>
    $(document).ready(function(){
      var date_input=$('input[name="start_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
<script>
    $(document).ready(function(){
      var date_input=$('input[name="end_date"]'); //our date input has the name "date"
      var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
      var options={
        format: 'dd/mm/yyyy',
        container: container,
        todayHighlight: true,
        autoclose: true,
      };
      date_input.datepicker(options);
    })
</script>
      <script>
      $(function() {
	  var dates = $('#start_date1, #end_date1').datepicker($.datepicker.regional['en'] = {
	   onSelect: function( selectedDate ) {
	    var option = this.id == "startdate" ? "minDate" : "maxDate",
	     instance = $( this ).data( "datepicker" ),
	     date = $.datepicker.parseDate(
	      instance.settings.dateFormat ||
	      $.datepicker._defaults.dateFormat,
	      selectedDate, instance.settings );
	    dates.not( this ).datepicker( "option", option, date );
	   }
	  });
      });
      </script>
      <script>
      $(document).ready(function(){
      	$("#start_date").change(function(){
      		var selectDate = $(this).val();
      		var start_date = '<?php echo date('d/m/Y',strtotime($g_get['start_date'])); ?>';
      		
      		if(selectDate <= start_date)
      		{
      			alert('Please select date greater or equal to start date.');
      			$("#start_date").val(start_date);
      		}
      	});
      	$("#end_date").change(function(){
      		var selectDate = $(this).val();
      		var end_date = '<?php echo date('d/m/Y',strtotime($g_get['end_date'])); ?>';
      		
      		if(selectDate >= end_date)
      		{
      			alert('Please select date less or equal to end date.');
      			$("#end_date").val(end_date);
      		}
      	});
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