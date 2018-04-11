<?php
	include("../include/config.php");
	include("../include/session.php");
	$cnn = new connection();
	$user_id = $_SESSION['user_id'];
	$event_id = $_GET['event_id'];
	$selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em, category_master cm  WHERE um.user_id = em.user_id AND cm.cat_id = em.cat_id AND em.user_id = '$user_id' AND event_id = '$event_id'");
	  $getevent = mysqli_fetch_array($selectevent);
	  $image = $getevent ['images'];
	  $new_image = explode(",",$image);
	?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">
		<link rel="icon" href="../images/favicon.ico">
		<title>StallsBook - View Event Details</title>
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Bootstrap 4.0-->
		<link rel="stylesheet" href="../assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../assets/vendor_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../assets/vendor_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../css/master_style.css">
		<!-- apro_admin Skins. Choose a skin from the css/skins
			folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../css/skins/_all-skins.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
		<script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script>
		<style type="text/css">
		@media only screen and (max-width: 768px) {
		    .sizeded {
		        width: 49%;
		    }
		    span.hideChar
		    {
		    	color:#1646edb3;
		    	display: block;
			  width: 125px;
			  overflow: hidden;
			  white-space: nowrap;
			  text-overflow: ellipsis;
  			}
		}
		</style>
	</head>
	<body class="hold-transition skin-black sidebar-mini">
		<div class="wrapper">
			<?php include("../include/header.php"); ?>
			<?php include("../include/leftbar.php"); ?>
			<div class="content-wrapper">
				<section class="content-header">
					<h1>
						Event Details
						<small>Control panel</small>
					</h1>
				</section>
				<!-- Main content -->
				<section class="content">
					<div class="row">
						<!-- /.col -->
						<div class="col-md-12">
							<div class="box box-primary">
								<div class="box-body box-profile">
									<div class="row">
										<div class="col-md-2">
											<div class="hotel_img">
												<img src="../stall_live/<?php echo $getevent['banner']; ?>" class="img-responsive img-thumbnail" style=" width: 100%;height:132px;">
											</div>
										</div>
										<div class="col-md-8 hotel">
											<h4 style="color: #d14836;"><?php echo $getevent['first_name']." ".$getevent['last_name']  ?></h4>
											
											<div class="row">
											<div class="col-md-6" style="margin-top: 1%;">
												<div class="locations">
												Event Name:
				&nbsp;<?php echo substr($getevent['event_name'],0,100); ?>....
												</div>
											</div>
											<div class="col-md-6">
												<div class="locations">
				Event Charge : &nbsp;<span style="color:red;font-weight:bold;">Rs.</span> <?php echo $getevent['stall_charge']; ?> 
												</div>
											</div>
											</div>
											<!--<b>Event Description:</b> <?php echo substr($getevent['event_desc'],80); ?>
											<br>-->
											<div class="row">
											<div class="col-md-6" style="margin-top: 1%;">
												<div class="locations">
												Event Description:
				&nbsp;<?php echo substr($getevent['event_desc'],0,100); ?>....
													</div>
													</div>
											<div class="col-md-6">
												<div class="locations">
				Event Creation : &nbsp;<?php echo date('d/m/Y',strtotime($getevent['create_date'])); ?>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6" style="margin-top: 1%;">
													<div class="locations">
														<i class="fa fa-map-marker fa-lg" aria-hidden="true" style="color: #d14836;"></i> &nbsp;<?php echo $getevent['event_address']; ?>
													</div>
													<br>
													<div class="locations">
														<i class="fa fa-tree" aria-hidden="true"  style="color: #d14836;"></i> &nbsp;<?php echo $getevent['city']; ?>
													</div>
												</div>
												<div class="col-md-6" style="margin-top: 1%;">
													<div class="locations">
														<i class="fa fa-phone fa-lg" aria-hidden="true" style="color:#d14836; "></i> &nbsp;<?php echo $getevent['mobile']; ?>
													</div>
													<br>
													<div class="locations">
														<i class="fa fa-calendar fa-lg" aria-hidden="true" style="color:#d14836;"></i> &nbsp;<?php echo date('d/M/Y', strtotime($getevent['start_date'])); ?> To <?php echo date('d/M/Y', strtotime($getevent['end_date'])); ?>   
													</div>
												</div>
											</div>
										</div>
										<div class="col-md-2">
											<!-- <p style="font-weight: 600;text-decoration: underline;margin: 0% -49%;">Banner Image :</p>
											<img src="../<?php echo $getevent['banner']; ?>" style="margin-left: -48%;;height: 150px;width: 210px;    border-radius: 2%;"> -->
											<!--<a href="omakeVenderCollectionPayment.php?event_id=<?php echo $event_id; ?>" class="btn btn-danger" style="font-size: 14px;margin-top: 40%;"> Collection <i class="fa fa-thumbs-o-up fa-lg" style="color:darkblue;"></i></a>-->
										</div>
										
									</div>
								</div>
								<!-- <div class="row">
									
									<div class="col-md-12">
										<p style="font-weight: 600;text-decoration: underline;">Event Image :</p>
										<div class="row">
											<?php foreach($new_image as $value) {?>
											<div class="col-md-3">
											<img src="../images/event/<?php echo $value; ?>" style="width:100%;border-radius: 2%;">
											</div>
										<?php } ?>
										</div>
									</div> 

								</div> -->
							</div>
							<!-- /.box-body -->
						</div>
					</div>
					<!-- /.col -->

					<!-- Small boxes (Stat box) -->
				<div class="row">
					<div class="col-12">
						<div class="box">
							<div class="box-header">
								<h3 class="box-title">View Vendor Booking</h3>
								<h6 class="box-subtitle"></h6>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
									<thead>
										<tr>
											<th>No</th>
											<th>Name</th>
											<!--<th>Email</th>-->
											<th>Mobile</th>
											<!--<th>No Of Shop</th>-->
											<th>Stall Name</th>
											<!--<th>Start Date</th>
											<th>End Date</th>-->
                                            <th>Action</th>
											<th>Crud</th>
										</tr>
									</thead>
									<tbody>
										<?php
										//echo "SELECT bm.vfirst_name,bm.vlast_name,bm.vemail,bm.vmobile,bm.shop_no,bm.shop_name,bm.start_date as sd,bm.end_date as ed,bm.user_id,bm.event_id,bm.book_id,pm.status as pay_status,um.user_type FROM booking_master bm,event_master em,user_master um, payment_master pm where bm.event_id = em.event_id AND um.user_id = bm.user_id AND bm.book_id = pm.book_id AND um.user_type='Vendor'";
										
											$selectBook = $cnn -> getrows("SELECT bm.status,bm.shop_no,bm.shop_name,bm.start_date as sd,bm.end_date as ed,bm.user_id,um.first_name,um.last_name,um.mobile,um.email,um.state,um.city,um.image,um.business_image,um.event_org_cmp_name,bm.event_id,bm.book_id,um.user_type FROM booking_master bm,event_master em,user_master um where bm.event_id = em.event_id AND um.user_id = bm.user_id AND bm.event_id='$event_id' AND um.user_type='Vendor' ORDER BY bm.status ASC");
											$i = 1;
											while($getBook = mysqli_fetch_array($selectBook))
											{ 
											      $user_id = $getBook['user_id'];
											     $event_id = $getBook['event_id'];
											     $book_id = $getBook['book_id'];
											     $status = $getBook['status'];
											?>
										<tr>
											<td><?php echo $i; ?></td>
											<td><?php echo $getBook['first_name']; ?></td>
											<!--<td><?php echo $getBook['vemail']; ?></td>-->
											<td><?php echo $getBook['mobile']; ?></td>
											<!--<td><?php echo $getBook['shop_no']; ?></td>-->
											<td><?php echo $getBook['shop_name']; ?></td>
											<!--<td><?php echo date('d-m-y',strtotime($getBook['sd'])); ?></td>
											<td><?php echo date('d-m-y',strtotime($getBook['ed'])); ?></td>-->
											
                                            <td>
                                            <?php if($status == '0') { ?>
                                            					<a href="updateeventdetailstatus.php?event_id=<?php echo $event_id; ?>&book_id=<?php echo $book_id; ?>&status=1" class="btn btn-danger btn-flat" style="font-size:14px;width: 154px;" title="Change Status"> Conform</a>
													
							<a data-toggle="modal" data-target="#myModal11<?php echo $i;?>" class="btn btn-danger btn-flat" style="font-size:14px;width: 154px;color:white;" title="Change Status"> Reject</a>
		
		<!-- Reject Request Modal -->
				<div id="myModal11<?php echo $i;?>" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-md">
				
				    <!-- Modal content-->
				    <div class="modal-content" style="">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
<center>				        <h4 class="modal-title">Reject Request</h4></center>
				      </div>
				     
				      <div class="modal-body">
				        <form name="frm1" id="frm1" action="rejectbooking.php" method="post">
				        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>">
				        <input type="hidden" name="sender_id" id="sender_id" value="<?php echo $user_id; ?>">
				        <input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
				        <input type="hidden" name="status" id="status" value="1">
				        
					<div class="row">
				        	<div class="col-md-3">
				        		Rejection reason?
				        	</div>
				        	<div class="col-md-9">
				        		<textarea type="text" name="reason" id="reason" style="width: inherit;" size="10"></textarea>
				        	</div>
				        </div>
				        <br>
				        
				        <div class="row">
				        	<div class="col-md-12">
				        		<center><button type="submit" name="rejectRequest" id="rejectRequest" class="btn btn-success">Done!</button></center>
				        	</div>
				        </div>
				        
				        </form>
				        
				      </div>
				      
				    </div>
				
				  </div>
				</div>
		<!--End-->
                                            <?php } ?>
                                            
												<?php if($status == '1') { 
												$countStall = $cnn->countrow("SELECT *FROM shop_master WHERE event_id='$event_id' AND user_id='$user_id'");
												if($countStall == 0)
												{
												?>

												<a href="oaddShopForVendor.php?event_id=<?php echo $event_id; ?>&user_id=<?php echo $user_id; ?>" class="btn btn-success btn-flat" title="Assign Stall" style="font-size:14px;color:#fff;width: 157px;"> Assign Stall</a>
												<?php
	}
		$countPay = $cnn->countrow("SELECT *FROM shop_master WHERE event_id='$event_id' AND user_id='$user_id'");
		if($countPay > 0)
		{
												?>
                                            		
                                            		<a href="oshopDetail.php?user_id=<?php echo $user_id; ?>&event_id=<?php echo $event_id; ?>" class="btn btn-danger btn-flat" style="font-size:14px;" title="View Detail"> View Stall</a>
												<?php } }  ?>
												
	<a data-toggle="modal" data-target="#myModal<?php echo $i;?>" class="btn btn-success btn-flat" style="font-size:14px;width: 56px;color:white;" title="Vendor Information"> Info</a>
	
	
	<!-- Payment Modal -->
				<div id="myModal1<?php echo $i;?>" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-md">
				
				    <!-- Modal content-->
				    <div class="modal-content" style="">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
<center>				        <h4 class="modal-title">Booking Amount</h4></center>
				      </div>
				     
				      <div class="modal-body">
				        <form name="frm" id="frm" action="omakeBookPayment.php" method="post">
				        <input type="hidden" name="event_id" id="event_id" value="<?php echo $event_id; ?>">
				        <input type="hidden" name="sender_id" id="sender_id" value="<?php echo $user_id; ?>">
				        <input type="hidden" name="book_id" id="book_id" value="<?php echo $book_id; ?>">
			<?php 
			$stall_charge = $getevent['stall_charge'];
			$selectAmount1 = $cnn->getrows("SELECT sum(book_amount) as amt FROM booking_payment_master WHERE sender_id='$user_id' AND event_id='$event_id'");
			$getAmount1 = mysqli_fetch_array($selectAmount1);
			$book_amount = $getAmount1['amt'];
			$remain_amount= $stall_charge - $book_amount;
			?>
					<div class="row">
				        	<div class="col-md-6">
				        		Remain Amount
				        	</div>
				        	<div class="col-md-6">
				        		<input type="text" name="ramin_amount" id="ramin_amount" style="width: inherit;" value="<?php echo $remain_amount; ?>"  disabled>
				        	</div>
				        </div>
				        <br>
				        <div class="row">
				        	<div class="col-md-6">
				        		Amount
				        	</div>
				        	<div class="col-md-6">
				        		<input type="text" name="book_amount" id="book_amount" style="width: inherit;">
				        	</div>
				        </div>
				        <br>
				        <div class="row">
				        	<div class="col-md-12">
				        		<center><button type="submit" name="pay_done" id="pay_done" class="btn btn-success">Done!</button></center>
				        	</div>
				        </div>
				        
				        </form>
				        
				      </div>
				      
				    </div>
				
				  </div>
				</div>
		<!--End-->
	
	<!-- Modal -->
				<div id="myModal<?php echo $i;?>" class="modal fade" role="dialog">
				  <div class="modal-dialog modal-lg">
				
				    <!-- Modal content-->
				    <div class="modal-content" style="background-color:#f6e7d3;">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal">&times;</button>
<center>				        <h4 class="modal-title">Vendor Profile</h4></center>
				      </div>
				     <span style="color:black;"><hr></span>
				      <div class="modal-body">
				        
				        <div class="row">
				        	
				        		<div class="col-md-12">
				        		<div class="row">
				        			<div class="col-md-3 sizeded">
				        			
				        				<div class="col-md-2 ">Name</div>
				        				<div class="col-md-2 ">Mobile </div>
				        				<div class="col-md-2 ">Email</div>
				        				<div class="col-md-2 ">State</div>
				        				<div class="col-md-2 ">City</div>
				        				<div class="col-md-2 ">Business</div>
				        			</div>
				        			
				        			<div class="col-md-6 sizeded">
				        				<div class="col-md-4"  style="max-width: 100.666667%;">
				        				<span style="color:#1646edb3;line-height: 0px !important;"><?php  echo $getBook['first_name'];  ?></span>
				        				</div>
				        				
				        				<div class="col-md-2" style="max-width: 100.666667%;">
				        				<span style="color:#1646edb3;line-height: 0px !important;"><?php echo $getBook['mobile']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2"  style="max-width: 100.666667%;">
				        				<span style="color:#1646edb3;line-height: 0px !important;" class="hideChar"><?php echo $getBook['email']; ?></span>
				        				</div>
				        				
				        				<div class="col-md-2"  style="max-width: 100.666667%;">
				        				<span style="color:#1646edb3;line-height: 0px !important;"><?php if($getBook['state'] == '')
										{ ?>
											-
									<?php }
										else
										{
										echo  $getBook['state']; }?> </span>
				        				</div>
				        				
				        				<div class="col-md-2"  style="max-width: 100.666667%;">
				        				<span style="color:#1646edb3;line-height: 0px !important;">
										<?php if($getBook['city'] == '')
										{ ?>
											-
										<?php }
										else
										{
										echo  $getBook['city']; }?> 
										</span>
				        				</div>
				        				
				        				<div class="col-md-2"  style="max-width: 100.666667%;">
				        				<span style="color:#1646edb3;line-height: 0px !important;"><?php echo $getBook['event_org_cmp_name']; ?></span>
				        				</div>
				        			</div>
									
				        			
				        			<div class="col-md-3" style="margin-bottom: 7px;">
				        	<center>		Photo
				        			<br>
				        	<img src="../stall_live/<?php echo $getBook['image']; ?>" class="img-responsive img-thumbnail" style="background-size:100%;width:100px;height:100px;">
				        	</center>
				        			</div>
				        		
				        		</div>
				        		</div>
				        		
				        		<br><br><br>
				        		<button class="btn btn-success" style="width:100%;padding: 0;"></button>
				        		<div class="col-md-12" style="text-align:center;margin-bottom: 15px;">
				        		Business Photos
				        		</div>
				        		
				        		<?php
                  if($getBook['business_image'] != '')
                    { 
				        		$business_image = explode(',',$getBook['business_image']);
				        		foreach($business_image as $imgimg)
				        		{
				        		?>
				        		<div class="col-md-3" style="margin-bottom: 15px;">
				        		<img src="../stall_live/images/userProfile/<?php echo $imgimg; ?>" class="img-responsive img-thumbnail" style="background-size:100%;width: 100%; height: 100%;">
				        		</div>
				        		<?php } }?>
				        		
				        	
				        </div>
				        
				      </div>
				      <!--<div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>-->
				    </div>
				
				  </div>
				</div>
		<!--End-->
											</td>
											<td>
												<a href="oeditBooking.php?book_id=<?php echo $book_id; ?>&event_id=<?php echo $event_id; ?>"  title="Edit" class="btn btn-danger btn-flat" style="font-size:14px;"> Edit </a>
                                            	
                                            	<a href="javascript:AlertIt1();" class="btn btn-danger btn-flat">Delete</a>
	                      <script type="text/javascript">
			        function AlertIt1() {
			        var answer = confirm ("Are you sure you want to delete this vendor?")
			        if (answer)
			        window.location="oeditDeleteBookingScript.php?event_id1=<?php echo $event_id; ?>&book_id=<?php echo $book_id; ?>&deleteBook=deleteBook";
			        }
			        </script>
                                            	<!--<a href="oeditDeleteBookingScript.php?event_id1=<?php echo $event_id; ?>&book_id=<?php echo $book_id; ?>&deleteBook=deleteBook" title="Delete" class="btn btn-danger btn-flat" style="font-size:14px;"> Delete </a>-->
											</td>
										</tr>
										<?php $i++; } ?>
										</tfoot>
								</table>
							</div>
							<!-- /.box-body -->
						</div>
						<!-- /.box -->          
					</div>
				</div>
				<!-- /.row -->
			</div>
			<!-- /.row -->


			</section>
			<!-- /.content -->
		</div>
		</div>
		
		
		
		
		<!-- /.content-wrapper -->
		<?php include("../include/footer.php"); ?>
		<!-- /.control-sidebar -->
		<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
		<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<!-- jQuery 3 -->
		<!-- <script src="../assets/vendor_components/jquery/dist/jquery.min.js"></script> -->
		<!-- popper -->
		<script src="../assets/vendor_components/popper/dist/popper.min.js"></script>
		<!-- Bootstrap 4.0-->
		<script src="../assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- SlimScroll -->
		<script src="../assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- FastClick -->
		<script src="../assets/vendor_components/fastclick/lib/fastclick.js"></script>
		<!-- apro_admin App -->
		<script src="../js/template.js"></script>
		<!-- apro_admin for demo purposes -->
		<script src="../js/demo.js"></script>
		<!-- This is data table -->
		<script src="../assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>
		<!-- start - This is for export functionality only -->
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
		<script src="../assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
		
		<script src="../js/pages/data-table.js"></script>
	</body>
</html>