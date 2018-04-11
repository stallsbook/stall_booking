<header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">SB</span>
      <!--<span class="logo-mini"><img src="../images/apro.png" alt="">SB</span>-->
      <!-- logo for regular state and mobile devices -->
      <?php
      if($_SESSION['user_type'] == 'Master')
      {
      ?>
      <span class="logo-lg"><b>Stall Booking </b> Admin</span>
      <?php }
      if($_SESSION['user_type'] == 'Organizer')
      { ?>
      <span class="logo-lg"><b>Organizer </b> Panel</span>
      <?php } ?>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <span style="font-weight: bold;color:#ff855f;font-size: 17px;">  <?php echo $_SESSION['username']; ?> </span>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
	<?php
	if($_SESSION['user_type']=='Master')
	{ ?>
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell"></i>
            </a>
            <ul class="dropdown-menu scale-up">
              <li class="header">
              <?php
								$countneweventa = $cnn -> countrow("SELECT * FROM `event_master` WHERE DATE(`create_date`) = CURDATE() AND status = '0' ");
							?>
              You have <?php echo $countneweventa; ?> notifications
              </li>
              <li>
                <ul class="menu inner-content-div">
                  <?php
										$selecteverd = $cnn -> getrows("SELECT * FROM `event_master` WHERE DATE(`create_date`) = CURDATE() AND status = '0' ");
										$i = 1;
										while($sltevet = mysqli_fetch_array($selecteverd))
										{
                  ?>
                  <li>
                    <p style="padding: 2%;">( <?php echo $i; ?> ) You Can Get <span style="color:red;"><?php echo $sltevet['event_name']; ?></span> Event.</p>
                    <!--<a href="#">
                      <i class="fa fa-users text-aqua"></i> Curabitur id eros quis nunc suscipit blandit.
                    </a>-->
                  </li>
                  <?php $i++; } ?>
                </ul>
              </li>
            </ul>
          </li>
	<?php } ?>
		  <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
             <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:#f96868b8;">
			<?php echo date('d M, Y'); ?>&nbsp;&nbsp;&nbsp;&nbsp;
			<?php $image = $_SESSION['image']; 
			if($_SESSION['user_type']=='Master')
			{ ?>
			              <img src="../<?php echo $image; ?>" class="user-image rounded-circle" alt="User Image">
			<?php }
			else
			{ ?>
			              <img src="../stall_live/<?php echo $image; ?>" class="user-image rounded-circle" alt="User Image">
			<?php } ?>

            </a>
            
            <ul class="dropdown-menu scale-up">
              <!-- User image -->
              <li class="user-header">
              
              <?php $image = $_SESSION['image']; 
			if($_SESSION['user_type']=='Master')
			{ ?>
			              <img src="../<?php echo $image; ?>" class="float-left rounded-circle" alt="User Image">
			<?php }
			else
			{ ?>
			              <img src="../stall_live/<?php echo $image; ?>" class="float-left rounded-circle" alt="User Image" style="heigth:84px;width:90px;">
			<?php } ?>
                

                <p>
                  <?php echo $_SESSION['username']; ?>
                  <small class="mb-5"><?php echo $_SESSION['email']; ?></small>
                  <?php 
                  if($_SESSION['user_type']=='Master')
                  {
                  ?>
                  <a href="viewProfile.php" class="btn btn-danger btn-sm">View Profile</a>
                  <?php } else { ?>
                  	<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-danger btn-sm">Forget Password</button>
                  <?php } ?>
                </p>
              </li><hr>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class=""><!-- pull-right -->
                  <a href="../logout.php" class="btn btn-block btn-danger"><i class="ion ion-power"></i> Log Out</a>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">
			
			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
				<center><h4 class="modal-title">Change Password</h4></center>
			      </div>
			      <div class="modal-body">
			        <form name="forgetpass" id="forgetpass" action="../admin/changePassword.php" method="POST">
			        <div class="row">
			            <div class="col-md-12 form-group">
			               	    <label>Enter Password</label>
			               		<input class="form-control" type="text" id="newPassword" name="newPassword" placeholder="Enter New Password" required>
			                </div>
			        </div>
			        <div class="row">
			            <div class="col-md-12 col-md-offset-3">
			               		<center><button type="submit" name="changePass" id="changePass" class="btn btn-danger">Submit</button></center>
			            </div>
			        </div>   
			        
			        </form>
			      </div>
			      
			    </div>
			
			  </div>
			</div>