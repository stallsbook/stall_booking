<?php
	include("../include/config.php");
	include("include/session.php");
	$cnn = new connection();
    $user_id = $_POST['user_id'];
    $i = 1;
    $selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em WHERE um.user_id = em.user_id AND em.user_id = '$user_id'");
    while($getevent = mysqli_fetch_array($selectevent))
    {
       $event_id = $getevent['user_id'];
       $image = $getevent ['images'];
       $new_image = explode(",",$image);
?>	 
<style type="text/css">
@media only screen and (max-width: 700px) {
		    .setMargin{
		               margin: 0% 0% !important;
		    }
		    .setWidth{
		              width:40.5% !important;
		    }
		}
</style>
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <div class="box-body box-profile">
                <div class="row">
                    <div class="col-md-2">
                        <div class="hotel_img">
                            <img src="../stall_live/<?php echo $getevent['banner']; ?>" class="img-responsive" style="height:150px; width: 100%;">
                        </div>
                    </div>
                    <div class="col-md-8 hotel">
                        <h4 style="color: #d14836;"><?php echo $getevent['first_name']." ".$getevent['last_name']  ?></h4>
                        <b>Event Name:</b> <?php echo $getevent['event_name']; ?>
                        <!-- <br>
                        <b>Event Description:</b> <?php echo $getevent['event_desc']; ?> -->
                        <br>
                        <div class="row">
                            <div class="col-md-6" style="margin-top: 1%;">
                                <div class="locations">
                                    <i class="fa fa-map-marker fa-lg" aria-hidden="true" style="color: #d14836;"></i> &nbsp;<?php echo $getevent['event_address']; ?>
                                </div>
                                <br>
                                <div class="locations">
                                    <i class="fa fa-share" aria-hidden="true" style="color:#d14836;"></i>&nbsp;
                                    <strong>Total Stall : </strong> &nbsp;<?php echo $getevent['avai_stall']; ?>
                                </div>
                            </div>
                            <div class="col-md-6" style="margin-top: 1%;">
                                <div class="locations">
                                    <i class="fa fa-calendar fa-lg" aria-hidden="true" style="color:#d14836;"></i> &nbsp;<?php echo date('d/M/Y', strtotime($getevent['start_date'])); ?><strong> To </strong> <?php echo date('d/M/Y', strtotime($getevent['end_date'])); ?>   
                                </div>
                                <br>	
                                <div class="locations">
                                    <i class="fa fa-share" aria-hidden="true" style="color:#d14836;"></i>&nbsp;<strong>Book Stall : </strong>&nbsp;&nbsp;<?php echo $getevent['total_stall']; ?>
                                </div>
                                <!-- <br>
                                <div class="locations">
                                    <strong>Book Stall : </strong>&nbsp;&nbsp;300
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 btn-center">
                       <a href="viewmoreEventDetail.php?user_id=<?php echo $user_id; ?>&event_id=<?php echo $getevent['event_id']; ?>" style="margin: 0% -49%;font-size: 14px;" class="btn btn-flat btn-danger setMargin" >View More&nbsp;<i class="fa fa-fw fa-arrow-circle-o-right"></i></a><br>
                       <?php 
                            $current_date = date('Y-m-d');
                            $start_date = date('Y-m-d',strtotime($getevent['start_date']));
                            $end_date = date('Y-m-d',strtotime($getevent['end_date']));
                                            	
                            if($current_date >= $start_date && $current_date <= $end_date)
                            {
                            ?>
                       <a class="btn btn-danger setMargin setWidth" style="margin: 0% -49%;font-size: 14px;width: 86%; margin-top: 3%;color: white;">Running</a>
                       <?php }else if($end_date <= $current_date){ ?>
                       <a class="btn btn-danger setMargin setWidth" style="margin: 0% -49%;font-size: 14px;width: 86%; margin-top: 3%;color: white;">Past</a>
                       <?php }else if($start_date >= $current_date){ ?>
                       <a class="btn btn-danger setMargin setWidth" style="margin: 0% -49%;font-size: 14px;width: 86%; margin-top: 3%;color: white;">Future</a>
                       <?php } ?>
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
</div>

<hr>
<?php } ?>

               