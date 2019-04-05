<?php get_header(); ?>
<div class="container banner main-banner">
	<div class="panel contact-widget primary-bg card-2"> 
		<div class="panel-body text-left">
			<h4 class="w">Search Gonzales and Company</h4>
		</div>
		<div class="panel-body">
			<form action="<?php echo get_site_url(); ?>" method="GET">
				<div class="row">
					<div class="col-md-8">
						<div class="form-group"> 
							<input type="text" class="form-control input-lg" id="search" placeholder="Type something..." required list="gonzales" name="s" value="<?php if($_GET['s'] != ''){ echo $_GET['s']; } ?>">
							<datalist id="gonzales">
								<!-- <option value="Put all title of services here">
									<option value="and other keywords">
										<option value="apple">
											<option value="Orange">
												<option value="safari"> -->
												</datalist>
											</div> 
										</div>
										<div class="col-md-4">
											<div class="text-center">
												<button type="submit" class="btn btn-default btn-block btn-outline">
													<i class="fa fa-search"></i> Search
												</button>
											</div>
										</div>
									</div>



								</form>
							</div>
						</div> 

					</div>
					<!-- /container -->
					<?php if($_GET['s'] != ''){ ?>
					<div class="widget-section">
						<div class="container">
							<div class="row" style="margin-top: -70px;margin-bottom: 50px;">
								<!--  --> 
								<!--  -->
								<div class="col-md-12 col-sm-12">
									<div class="panel panel-default ">
										<div class="panel-body">
											<?php  
												global $wp_query;
											?>
											<h3>Search Results <small class="text-muted"><?php echo $wp_query->found_posts; ?> found.</small></h3> 
										</div> 
										<div class="news-container  scroll-primary" style="height: 700px;">
											<?php  
												if(have_posts()){
													$count = 1;
													while(have_posts()){
														the_post();
											?>
											<a href="<?php the_permalink(); ?>" class="list-group-item">
												<small class="text-muted text-uppercase">
													<?php the_date(); ?>
												</small> 
												<span class="text-primary text-title">
													<?php the_title() ?>
												</span> 
												<span class="text-body">
													<?php the_excerpt(); ?>
												</span> 
												<span class="text-info">
													Read more <i class="fa fa-angle-right"></i>
												</span>
											</a>
											<?php
														$count++; 
													}
												} 
											?>
										</div>
										<div class="panel-footer">
											<p class="text-primary"><i class="fa fa-question-circle"></i> Not what you're looking for? No worries, <a href="<?php echo get_link_by_slug('join', 'page'); ?>#contact-us"><b>ask us directly.</b></a></p>
										</div>

									</div>
								</div>

								<!--  -->
							</div>
						</div>
						<!-- /container -->
					</div>
					<?php } ?>





					<div class="assist-section primary-bg" style="margin-top: 0px;">
						<div class="container">
							<div class="row">
								<div class="col-md-6">
									<p class="lead w">Let's deliver the right solution.</p>
								</div>
								<div class="col-md-6">
									<a href="<?php echo get_link_by_slug('join', 'page'); ?>" class="btn btn-default btn-outline btn-block">
										Join Gonzales and Company
									</a>
								</div>
							</div>
						</div>
					</div>
					<?php 
					get_template_part('includes/relatedservices');
					get_footer(); 
					?>