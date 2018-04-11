<style type="text/css">
@media only screen and (max-width: 700px) {
    .divdata {
        width: 100% !important;
    }
    .divdata1 {
        width: 100% !important;
    }
}
</style>
	<footer class="footer_wrap widget_area scheme_original">
					<div class="footer_wrap_inner widget_area_inner">
						<div class="content_wrap">
							<div class="columns_wrap">
							
								<!--<aside id="text-3" class="widget_number_1 column-1_4 widget widget_text" style="margin-left: -20px;">
									<div class="textwidget">
										<h5 class="widget_title custom">Stall with huge Profits</h5>
										<div class="clearfix"></div>
										<span style="line-height: 1.692; font-size: 0.929em">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris hendrerit fringilla ligula, nec congue leo pharetra in. Lorem ipsum dolor sit amet, consectetur.
										</span>
									</div>
								</aside>-->
								
								<aside id="nav_menu-3" class="widget_number_2 column-1_4 widget widget_nav_menu divdata" style="width:33%;">
									<h5 class="widget_title">Site links</h5>
									<div class="menu-site-links-container">
										<ul id="menu-site-links">
											<li style="width: 32%;">
												<div class="sc_socials_item"><a href="#"  class="social_icons social_linkedin"><span class="icon-linkedin"></span></a></div>
											</li>
											<li style="width: 32%;">
												<div class="sc_socials_item"><a href="#"  class="social_icons social_facebook"><span class="icon-facebook"></span></a></div>
											</li>
											<li style="width: 32%;">
												<div class="sc_socials_item"><a href="#"  class="social_icons social_twitter"><span class="icon-twitter"></span></a></div>
											</li>
										</ul>
									</div>
								</aside>
								
								<aside id="unicaevents_widget_recent_reviews-3" class="widget_number_3 column-1_4 widget widget_recent_reviews divdata1" style="width:66%;">
									<h5 class="widget_title">Recent Reviews</h5>
									<div class="recent_reviews">
									<div class="row">
									<?php
									$selectComment = $cnn -> getrows("SELECT *FROM review_ratting_master rrm,event_master em,user_master um WHERE rrm.event_id = em.event_id AND rrm.user_id=um.user_id order by rrm.rr_id DESC limit 2");
									while($getComment = mysqli_fetch_array($selectComment))
									{ ?>
										<!--<article class="post_item with_thumb first">-->
										<div class="col-md-6">
											<div class=""><img class="img-responsive img-thumbnail" style="width:100px;height:75px;" alt="How to Start an Event Planning Service" src="<?php echo $getComment['banner']; ?>"></div>
											<div class="post_content">
												<h6 class="post_title"><a style="cursor:auto;text-decoration:none;"><?php echo $getComment['o_review']; ?></a></h6>
												<div class="post_rating reviews_summary blog_reviews">
													<div class="criteria_summary criteria_row">
														<div class="reviews_stars reviews_style_stars" data-mark="4.4">
															<div class="reviews_stars_wrap">
		<?php
		$rate = $getComment['o_rating'];
		
		for($i=1;$i<=5;$i++)
		{
			if($i <= $rate)
			{ ?>
				<img src="images/fill.png" height="15" width="15">
			<?php }
			else
			{ ?>
				<img src="images/blank.png" height="15" width="15">
			<?php }
		}
		?>														
			<div class="reviews_value" style="color:orange;font-weight:bold;"><?php echo $getComment['o_rating']; ?></div>
															</div>
					<br><br>
														</div>
													</div>
												</div>
											</div>
											<div class="post_info"><span class="post_info_item post_info_posted"><a style="cursor:auto;text-decoration:none;" class="post_info_date"><?php echo date('d M, Y',strtotime($getComment['date'])); ?></a></span><span class="post_info_item post_info_posted_by"><a style="cursor:auto;text-decoration:none;" class="post_info_author"><?php echo $getComment['first_name']; ?></a></span></div>
										<!--</article>-->
										</div>
										<?php } ?>
										</div>
									</div>
								</aside>
								
								
								
							</div>
							<!-- /.columns_wrap -->
						</div>
						<!-- /.content_wrap -->
					</div>
					<!-- /.footer_wrap_inner -->
				</footer>
				<div class="copyright_wrap copyright_style_socials  scheme_original">
						<div class="copyright_wrap_inner">
							<div class="content_wrap">
								<div class="sc_socials sc_socials_type_icons sc_socials_shape_square sc_socials_size_tiny">
									<div class="sc_socials_item"><a href="#"  class="social_icons social_linkedin"><span class="icon-linkedin"></span></a></div>
									<div class="sc_socials_item"><a href="#"  class="social_icons social_facebook"><span class="icon-facebook"></span></a></div>
									<div class="sc_socials_item"><a href="#" class="social_icons social_twitter"><span class="icon-twitter"></span></a></div>
									<div class="sc_socials_item"><a href="#"  class="social_icons social_gplus"><span class="icon-gplus"></span></a></div>
								</div>
								<div class="copyright_text">
									<p><a href="#">StallsBook</a> © 2017 All Rights Reserved <a href="termscondition.php">Terms of Use</a> and <a href="privacypolicy.php">Privacy Policy</a></p>
								</div>
							</div>
						</div>
					</div>