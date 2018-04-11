<?php
	include("../include/config.php"); 
	//include("include/session.php"); 
	$cnn = new connection();

	if($_POST['search_event'])
	{
		$search_event = $_POST['search_event'];

		$currentDate = date('Y-m-d');
		
        $selectEvents = $cnn->countrow("SELECT *FROM event_master em,user_master um WHERE em.user_id=um.user_id AND em.start_date <= '$currentDate' AND em.end_date  >= '$currentDate' AND em.status='1' AND (em.event_name like '%$search_event%' OR um.city like '%$search_event%' OR um.first_name like '%$search_event%' OR um.last_name like '%$search_event%') ORDER BY em.start_date ASC");
        if($selectEvents > 0)
        {
            $selectEvent1 = $cnn->getrows("SELECT em.city as ucity,em.*,um.* FROM event_master em,user_master um WHERE em.user_id=um.user_id AND em.start_date <= '$currentDate' AND em.end_date  >= '$currentDate' AND em.status='1' AND (em.event_name like '%$search_event%' OR um.city like '%$search_event%' OR um.first_name like '%$search_event%' OR um.last_name like '%$search_event%') ORDER BY em.start_date ASC");
            $i=1;
            while($getEvent = mysqli_fetch_array($selectEvent1))
            {
                    	?>
                        <div class="portfolio-col portfolio-col3 setWid">
                            <div class="portfolio-normal clearfix">
                                
                                <div class="portfolio-img-box clearfix">
                                    <div class="portfolio-img cover-fix clearfix" style="background-image: url('../stall_live/<?php echo $getEvent['banner']; ?>');">
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
                                                        <div class="">
                                                            <a href="eventGallery.php" class="clearfix"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
					   
					    $selectEvent12 = $cnn->countrow("SELECT *FROM event_master em,user_master um WHERE em.user_id=um.user_id AND em.start_date > '$currentDate' AND em.status='1' AND (em.event_name like '%$search_event%' OR um.city like '%$search_event%' OR um.first_name like '%$search_event%' OR um.last_name like '%$search_event%') ORDER BY em.start_date ASC");
        if($selectEvent12 > 0)
        {
            $selectEvent1 = $cnn->getrows("SELECT em.city as ucity,em.*,um.* FROM event_master em,user_master um WHERE em.user_id=um.user_id AND em.start_date > '$currentDate' AND em.status='1' AND (em.event_name like '%$search_event%' OR um.city like '%$search_event%' OR um.first_name like '%$search_event%' OR um.last_name like '%$search_event%') ORDER BY em.start_date ASC");
            $i=1;
            while($getEvent = mysqli_fetch_array($selectEvent1))
            {
                    	?>
                        <div class="portfolio-col portfolio-col3">
                            <div class="portfolio-normal clearfix">
                                
                                <div class="portfolio-img-box clearfix">
                                    <div class="portfolio-img cover-fix clearfix" style="background-image: url('../stall_live/<?php echo $getEvent['banner']; ?>');">
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
                                                        <div class="">
                                                            <a href="eventGallery.php" class="clearfix"><i class="fa fa-eye" aria-hidden="true"></i></a>
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
					   
					   else if($selectEvents == '0' && $selectEvents == '0'){ echo "<span style='color:red;'>No Event Right Now......</span>"; } 
	}
?>