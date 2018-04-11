<style>
	.popover__title {
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	/* font-size: 15px;
	line-height: 36px;
	text-decoration: none;
	color: rgb(228, 68, 68);
	text-align: center;
	padding: 15px 0;*/
	}
	.popover__wrapper {
	/*position: relative;*/
	/* margin-top: 1.5rem;
	display: inline-block; */
	}
	.popover__content {
	opacity: 0;
	visibility: hidden;
	position: fixed;
	transform: translate(0, 10px);
	background-color: #BFBFBF;
	padding: 1.5rem;
	box-shadow: 0 2px 5px 0 rgba(0, 0, 0, 0.26);
	width: auto;
	/* left: 86%; */
	margin-top: 22px;
	}
	.popover__content:before {
	position: absolute;
	z-index: -1;
	content: '';
	right: calc(50% - 10px);
	top: -8px;
	border-style: solid;
	border-width: 0 10px 10px 10px;
	border-color: transparent transparent #BFBFBF transparent;
	transition-duration: 0.3s;
	transition-property: transform;
	}
	.popover__wrapper:hover .popover__content {
	z-index: 10;
	opacity: 1;
	visibility: visible;
	transform: translate(0, -20px);
	transition: all 0.5s cubic-bezier(0.75, -0.02, 0.2, 0.97);
	}
	.popover__message {
	text-align: center;
	line-height: 0em;
	}
	.newClass {
    position: fixed;
    top: 0;
    z-index: 1000;
    margin: 0 auto !important;
    height: auto;
    background: #fff;
    width: 100%;
}


</style>
<style type="text/css">
.abc
{
    margin-top: -40px !important;
    margin-left: -44px !important;
}
</style>
<header class="top_panel_wrap top_panel_style_3 scheme_original">
	<div class="top_panel_wrap_inner top_panel_inner_style_3 top_panel_position_above">
		<div class="top_panel_top">
			<div class="content_wrap">
				<!--<div class="top_panel_top_contact_phone icon-phone">1-800-64-38</div>-->
				<div class="top_panel_top_open_hours"><span style="color:#ea4e47;font-weight:bold;">&nbsp;&nbsp; Welcome	<?php 
				if($_SESSION['user_type'] == "Organizer")
				{?>
				 to Organizer &nbsp;&nbsp;<label class="label label-danger" style="font-size:12px;"><?php echo $_SESSION['username']; ?></label>
				<?php }
				if($_SESSION['user_type'] == "Vendor")
				{ ?>
				 to Vendor &nbsp;&nbsp;<label class="label label-danger" style="font-size:12px;"><?php echo $_SESSION['username']; ?></label>
				<?php }	?>
				</span></div>
				<!--div class="top_panel_top_contact_email">
					<a href="#" class="__cf_email__" data-cfemail="d9b0b7bfb699b8b7bab6abb8adb1bcb4bcaaf7bab6b4">[email&#160;protected]</a>
					</div-->
				<div class="top_panel_top_user_area">
					<ul id="menu_user" class="menu_user_nav"></ul>
				</div>
			</div>
		</div>
		<div class="top_panel_middle" >
			<div class="content_wrap">
				<div class="columns_wrap columns_fluid">
					<div class="row">
						<div class=" col-md-3">
							<!--<div class="column-1_3 contact_logo" style="margin-bottom: -25px;">-->
								<div class="logo" style="margin-top: none; margin-bottom: none;margin-top: 1.5em;
    margin-bottom: -1.65em;">
								
									<a href="index.php">
									
									<img src="../images/stall.png" style="width:16%;height:43px;">
									
									<img src="images/logo.png" class="logo_main" alt="" style="width:147px;height:37px;margin-top:2px;float:right;">
									
										<div class="logo_slogan"></div>
									</a>
								</div>
							<!--</div>-->
						</div>
						<div class="col-md-9">
							<div class="column-3_3 menu_main_wrap">
								<a href="#" class="menu_main_responsive_button icon-menu"></a>
								<nav class="menu_main_nav_area">
									<ul id="menu_main" class="menu_main_nav" style="margin-top: -25px;">
										<li id="home1" class="menu-item menu-item-type-custom menu-item-object-custom current-menu-ancestor current-menu-parent menu-item-has-children menu-item-792 active "><a href="index.php">Home</a>
										</li>
										
										<?php
				if($_SESSION['user_type'] == "")
				{?>
				 <li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-124 "><a href="login.php" onclick="alert('Login As A Organizer To Create Event.');" style="cursor:pointer">Create Event</a>
				</li>
				<?php } 
				if($_SESSION['user_type'] == "Organizer")
				{?>
				 <li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-124 "><a href="../admin/oaddEvent.php" style="cursor:pointer">Create Event</a>
				</li>
				<?php }
				if($_SESSION['user_type'] == "Vendor")
				{ ?>
				<li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-124 "><a onclick="alert('Only Organizer Can Create Event.');" style="cursor:pointer">Create Event</a>
				</li>
				<?php }	?>
										
										
										
										
										<!--<li id="menu-item-124" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-124 "><a href="addEvent.php" style="cursor:pointer">Create Event</a>
										</li>-->
										<!--<li id="menu-item-1399" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1399"><a href="enquiry.php">Enquiry</a></li>
										<li id="menu-item-804" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-804">
											<a href="#">More <i class="fa fa-caret-down"></i></a>
											<ul style="margin-top: -40px;">
												<li><a href="gallery.php">Gallery</a></li>
												<li><a href="portfolio.php">Port-Folio</a></li>
												<li><a href="aboutus.php">About Us</a></li>
											</ul>
										</li>
										<li id="menu-item-799" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-799"><a href="contactus.php">Contact Us</a>
										</li>-->
										
										<?php
												if(isset($_SESSION['email']) != ''){
													$user_id = $_SESSION['user_id'];
												$user_type = $_SESSION['user_type'];
							if($user_type == "Organizer"){ ?>
							<li id="view1"><a href="viewProfile.php">View Profile</a></li>
							<li id="my1"><a href="../admin/index.php">My Panel</a></li>
						<?php }else{ ?>
						<li id="view1"><a href="viewProfile.php">View Profile</a></li>
						<li id="book1"> <a href="viewmyBooking.php?user_id=<?php echo $user_id; ?>">View Booking</a></li> <?php } ?>
							<li id="logout1"><a href="include/logout.php">Logout</a></li>
							<?php }else{ ?>
							<li id="login1" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-799"> <a href="../stall_live/login.php" style="cursor: pointer;">Login</a></li>
											
												<li id="signup1" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-799">	<a href="registration.php" style="cursor:pointer" > Sign Up</a></li>
											
											<?php } ?>
							
										
							
											
								</nav>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>