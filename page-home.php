<?php  
get_header();
get_template_part('includes/homecarousel');
the_post();
?>
<!-- /container -->

<div class="widget-section">
	<div class="container">
		<div class="row">
			<!--  -->
			<div class="col-md-3 col-sm-6">
				<div class="panel panel-default">
					<div class="panel-heading primary-bg w card-2 lead">News & Events</div>
					<div class="news-container scroll-primary">
						<?php 
							$args = array(
							    'category_name' => 'news',
							    'posts_per_page' => 4,
							    'orderby' => 'date',
							    'order' => 'DESC'
							);

							$query = new WP_Query( $args );
							if($query->have_posts()){ 
								while($query->have_posts()){
									$query->the_post();
									get_template_part('includes/newsblock');
						?>
						<a href="<?php echo get_link_by_slug('news', 'page'); ?>" class="list-group-item"> 
							<span class="text-info text-title">
								See All News
							</span> 
							<span class="text-info">
								View the archives
							</span>
						</a> 
						<?php
								} 
							}else{ 
						?>
						<a href="javascript:void(0)" class="list-group-item"> 
							<span class="text-info text-title">
								No news found.
							</span> 
						</a> 
						<?php 
							} 
							wp_reset_postdata();
						?>
					</div>

				</div>
			</div>
			<!--  -->
			<?php  
				$bgs = array('orange-bg', 'purple-bg', 'teal-bg');
				$args = array(
				    'category_name' => 'expertise',
				    'posts_per_page' => 4,
				    'orderby' => 'date',
				    'order' => 'ASC'
				);

				$query = new WP_Query( $args );
				if($query->have_posts()){ 
					$count = 0;
					while($query->have_posts()){
						$query->the_post();
			?>
			<div class="col-md-3 col-sm-6">
				<div class="panel panel-widget card-2 <?php echo $bgs[$count]; ?>">
					<div class="title">
						<?php the_title(); ?>
					</div>
					<div class="body scroll-primary">
						<?php the_excerpt(); ?>
					</div>
					<div class="foot">
						<a href="<?php the_permalink(); ?>" class="btn btn-default btn-outline btn-block">
							learn more
						</a>
					</div>
				</div>
			</div>
			<?php 
						$count++; 
					}
				}
				wp_reset_postdata();
			?>
			<!--  -->
		</div>
	</div>
	<!-- /container -->
</div>


<div class="container gonzales-360"> 
	<img src="<?php echo get_template_directory_uri(); ?>/assets/world.png" alt="" class="world">
	<div class="row">
		<div class="col-md-12"> 
			<img src="<?php echo get_template_directory_uri(); ?>/assets/360.png" alt="" class="g360"> 
		</div>
		<div class="col-md-8 lead">
			<?php the_content(); ?>
		</div>
	</div> 
</div>
<!--  -->


<div class="assist-section primary-bg">
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
	$args = array(
	    'category_name' => 'featured-projects',
	    'orderby' => 'date',
	    'order' => 'ASC'
	);

	$query = new WP_Query( $args );
	if($query->have_posts()){ 
		$projects = array();
		while($query->have_posts()){
			$query->the_post();
			$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
			$projects[] = array(get_the_title(), get_the_permalink(), $thumb_url[0]);
		}
	}
	$half = ceil(count($projects) / 2);
?>
<div class="showcase-section"> 
	<div class="row">
		<div class="col-md-12">
			<div class="owl-carousel owl-theme batch1">
				<?php 
					for ($x=0; $x < $half; $x++) { 
				?>
				<div class="item" style="background-image: url(<?php echo $projects[$x][2]; ?>);">
					<a href="<?php echo $projects[$x][1]; ?>"> 
						<div class="title">
							<?php 
								$data = $projects[$x][0];

								if (strlen($data) % 2 == 0) //if lenhth is odd number
								    $length = strlen($data) / 2;
								else
								    $length = (strlen($data) + 1) / 2; //adjust length

								for ($i = $length, $j = $length; $i > 0; $i--, $j++) //check towards forward and backward for non-alphabet
								{
								    if (!ctype_alpha($data[$i - 1])) //forward
								    {
								        $point = $i; //break point
								        break;
								    } else if (!ctype_alpha($data[$j - 1])) //backward
								    {
								        $point = $j; //break point
								        break;
								    }
								}
								$string1 = substr($data, 0, $point);
								$string2 = substr($data, $point);
								echo $string1 . '<br>' . $string2;
							?>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="owl-carousel owl-theme batch2">
				<?php 
					for ($x=$half; $x < count($projects); $x++) { 
				?>
				<div class="item" style="background-image: url(<?php echo $projects[$x][2]; ?>);">
					<a href="<?php echo $projects[$x][1]; ?>"> 
						<div class="title">
							<?php 
								$data = $projects[$x][0];

								if (strlen($data) % 2 == 0) //if lenhth is odd number
								    $length = strlen($data) / 2;
								else
								    $length = (strlen($data) + 1) / 2; //adjust length

								for ($i = $length, $j = $length; $i > 0; $i--, $j++) //check towards forward and backward for non-alphabet
								{
								    if (!ctype_alpha($data[$i - 1])) //forward
								    {
								        $point = $i; //break point
								        break;
								    } else if (!ctype_alpha($data[$j - 1])) //backward
								    {
								        $point = $j; //break point
								        break;
								    }
								}
								$string1 = substr($data, 0, $point);
								$string2 = substr($data, $point);
								echo $string1 . '<br>' . $string2;
							?>
						</div>
					</a>
				</div>
				<?php } ?>
			</div>
		</div> 
	</div>
</div>
<?php
get_footer();
?>