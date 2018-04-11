<aside class="main-sidebar" style="background-color: #fff;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="image float-left">
        <?php
        $image = $_SESSION['image'];
        if(@$_SESSION['user_type']== 'Master')
        { ?>
        	<img src="../<?php echo $image; ?>" class="rounded-circle" alt="User Image">
        <?php }
        else
        { ?>
        <img src="../stall_live/<?php echo $image; ?>" class="rounded-circle" alt="User Image" style="height: 54px;">
        <?php } ?>
          
        </div>
        <div class="info float-left">
          <p><?php echo $_SESSION['username']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <?php 
        if(@$_SESSION['user_type'] == 'Master')
        {
        ?>
        <li class="active">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="">
          <a href="alldeactiveevents.php">
            <i class="fa fa-th"></i> <span>New Events</span>
          </a>
        </li>
        <li class="">
          <a href="allevents.php">
            <i class="fa fa-th"></i> <span>All Events</span>
          </a>
        </li>
        <li class="">
          <a href="oaddEventCategory.php">
            <i class="fa fa-dashboard"></i> <span>Category</span>
          </a>
        </li>
        <li class="">
          <a href="addCity.php">
            <i class="fa fa-dashboard"></i> <span>City</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>View User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewOrganizer.php">View Organizer</a></li>
            <li><a href="viewVendor.php">View Vendor</a></li>
          </ul>
        </li>
        <li class="">
          <a href="viewEvent.php">
            <i class="fa fa-th"></i>
            <span>View Event</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Send Notification</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="notiOrganizer.php">Organizer</a></li>
            <li><a href="notiVendor.php">Vendor</a></li>
          </ul>
        </li>
        <li class="">
          <a href="viewContact.php">
            <i class="fa fa-th"></i>
            <span>Contact us</span>
          </a>
        </li>
         <li class="">
          <a href="viewEnquiry.php">
            <i class="fa fa-th"></i>
            <span>Enquiry</span>
          </a>
        </li>
        <li class="">
          <a href="viewReport.php">
            <i class="fa fa-th"></i>
            <span>Report</span>
          </a>
        </li>
        <li class="">
          <a href="addSlider.php">
            <i class="fa fa-th"></i>
            <span>Slider</span>
          </a>
        </li>
         <li class="">
          <a href="addGalleryImage.php">
            <i class="fa fa-th"></i>
            <span>Gallery Image</span>
          </a>
        </li>
        <li class="">
          <a href="addPortfolio.php">
            <i class="fa fa-th"></i>
            <span>PortFolio</span>
          </a>
        </li>
         <li class="">
          <a href="addTestimonial.php">
            <i class="fa fa-th"></i>
            <span>Testimonial</span>
          </a>
        </li>
        <li class="">
          <a href="viewContactUs.php">
            <i class="fa fa-th"></i>
            <span>Contact Us</span>
          </a>
        </li>
        <?php 
        }
        if(@$_SESSION['user_type'] == "Organizer")
        { ?>
        <li class="active">
          <a href="../stall_live/index.php">
            <i><img src="../png/006-home.png"></i> <span>Home</span>
          </a>
        </li>
          <li class="active">
          <a href="index.php">
             <i ><img src="../png/dashboard.png"></i> <span>Dashboard</span>
          </a>
        </li>
        <!--<li class="active">
          <a href="oviewVender.php">
            <i ><img src="../png/001-magnifying-glass.png"></i> <span>Search Vendors</span>
          </a>
        </li>-->
        <li class="active">
          <a href="oaddEvent.php">
          <i ><img src="../png/005-event-tent.png"></i>  <span>Add Event</span>
          </a>
        </li>
        <li class="active">
          <a href="oviewEvent.php">
             <i ><img src="../png/004-notes.png"></i> <span>View Booking</span>
          </a>
        </li>
        <li class="active">
          <a href="oviewPaymentNotification.php">
              <i ><img src="../png/003-notifications-button.png"></i> <span>Payment Notification</span>
          </a>
        </li>
        <li class="active">
          <a href="oviewBookingPayment.php">
            <i ><img src="../png/002-credit-cards-payment.png"></i> <span>Payment and Refunds</span>
          </a>
        </li>
        <!-- Used in future -->
        <!--<li class="active">
          <a href="osendNotiVendor.php">
            <i class="fa fa-th"></i> <span>Vendor Notification</span>
          </a>
        </li>-->
        <!--<li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Event Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="oaddEvent.php">Add Event</a></li>
            <li><a href="oviewEvent.php">View Event</a></li>
          </ul>
        </li>-->
        <?php } ?>
       
       <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>View User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addNews.php">Add News</a></li>
            <li><a href="viewStateCityNews.php">View News</a></li>
          </ul>
        </li>  -->
        
         <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>State Supplements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addSupplement.php">Add Supplement</a></li>
            <li><a href="viewSupplement.php">View Supplement</a></li>
            <li><a href="addSupplementNews.php">Add Supplement News</a></li>
            <li><a href="viewSupplementNews.php">View Supplement News</a></li>
          </ul>
        </li> -->

        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>City Supplements</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addCitySupplement.php">Add Supplement</a></li>
            <li><a href="viewCitySupplement.php">View Supplement</a></li>
            <li><a href="addCitySupplementNews.php">Add Supplement News</a></li>
            <li><a href="viewCitySupplementNews.php">View Supplement News</a></li>
          </ul>
        </li>   -->
        
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Advertisement</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addAdvertisement.php">Add Advertisement</a></li>
            <li><a href="viewAdvertisement.php">View Advertisement</a></li>
          </ul>
        </li>     -->
        
         <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Other news</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="addOthernews.php">Add Othernews</a></li>
            <li><a href="viewOthernews.php">View Othernews</a></li>
          </ul>
        </li>    -->
        <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-th"></i>
            <span>Contact</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="viewContact.php">View Contacts</a></li>
          </ul>
        </li>      -->
        
      </ul>
    </section>
    <!-- /.sidebar -->
    <!--div class="sidebar-footer">
		<!-- item-->
		<!-- <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Settings"><i class="fa fa-cog fa-spin"></i></a> -->
		<!-- item-->
		<!-- <a href="#" class="link" data-toggle="tooltip" title="" data-original-title="Email"><i class="fa fa-envelope"></i></a> -->
		<!-- item-->
		<!--a href="logout.php" class="link" data-toggle="tooltip" title="" data-original-title="Logout"><i class="fa fa-power-off"></i></a>
	</div-->
  </aside>