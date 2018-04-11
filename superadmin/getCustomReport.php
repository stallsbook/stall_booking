<?php
	include("../include/config.php");
	include("include/session.php");
    $cnn = new connection();
    $i =1;
    if(isset($_POST["start_year"]))
    {
        $event_year =$_POST['start_year'];
        $year = strtok($event_year, '-');
        $selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em WHERE um.user_id = em.user_id AND  EXTRACT( YEAR FROM em.start_date ) ='$year'");
    }
    else if(isset($_POST["event_month"]))
    {
        $event_month = $_POST['event_month'];
        $selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em WHERE um.user_id = em.user_id AND  EXTRACT( MONTH FROM em.start_date ) ='$event_month'");
    }
    else if(isset($_POST["start_date"]))
    {
        $event_date = $_POST['start_date'];
        $selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em WHERE um.user_id = em.user_id AND em.start_date = '$event_date'");
    }
    else if(isset($_POST['start_year']) && isset($_POST['event_month'])){
        $event_year =$_POST['start_year'];
        $year = strtok($event_year, '-');
        $event_month = $_POST['event_month'];
        $selectevent = $cnn -> getrows("SELECT * FROM user_master um, event_master em WHERE um.user_id = em.user_id AND  EXTRACT( MONTH FROM em.start_date ) ='$event_month' AND EXTRACT( MONTH FROM em.start_date ) ='$event_month' ");
    }
?>	 
<!-- <div class="row">
    <div class="col-sm-12">                
        <table id="example" class="table table-bordered table-hover display nowrap margin-top-10 table-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Event Name</th>
                    <th>Organizer Name</th>
                    <th>Address</th>
                    <th>Image</th>
                </tr>
            </thead> -->
            <!-- <tbody> -->
                <?php 
                while($getevent = mysqli_fetch_array($selectevent))
                {
                ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $getevent['event_name']; ?></td>
                        <td><?php echo $getevent['first_name']; ?></td>
                        <td><?php echo $getevent['event_address']; ?></td>
                        <td><img src="../stall_live/<?php echo $getevent['banner']; ?>" height="50" width="50"></td>
                    </tr>
                    <?php $i++;  } ?>
                <!-- </tbody> -->
            
            <!-- </table>
    </div>
</div> -->             