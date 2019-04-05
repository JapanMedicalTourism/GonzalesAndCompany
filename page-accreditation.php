<?php get_header(); ?>
<?php  
	$args = array(
	    'category_name' => 'accreditation-banner',
	    'posts_per_page' => 5,
	    'orderby' => 'date',
	    'order' => 'ASC'
	);

	$query = new WP_Query( $args );
?>
<div class="container banner main-banner carousel slide" id="carousel-example-generic" data-ride="carousel">
	<?php if($query->have_posts()){ ?>
	<div class="row">
		<div class="col-md-12 carousel-inner" role="listbox">
			<?php 
				$count = 1;
				while($query->have_posts()){ 
					$query->the_post();
					$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
			?>
			<div class="jumbotron banner-carousel primary-bg item <?php if($count == 1){ echo 'active'; } ?>" style="background-image: url('<?php echo $thumb_url[0]; ?>'); background-size: cover;">
				<h1><?php the_title(); ?></h1>
				<?php the_excerpt(); ?>
				<a href="<?php the_permalink(); ?>" role="button" class="btn btn-default">
					EXPLORE
				</a>
			</div>
			<?php 
					$count++;
				} 
			?>
		</div>
		<!--  -->
		<div class="col-md-12">
			<div class="five-banner carousel-indicators">
				<?php 
					$count = 0;
					while($query->have_posts()){ 
						$query->the_post();
						$imageid = MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'secondary-image', get_the_ID());
						$imageurl = wp_get_attachment_image_src($imageid,'large');
				?>
				<div class="banner-tab banner-top selected card-2 <?php if($count == 0){ echo 'active'; } ?>" data-target="#carousel-example-generic" data-slide-to="<?php echo $count; ?>">
					<div class="img">
						<img src="<?php echo $imageurl[0]; ?>" alt="">
					</div>
					<div class="text">
						<?php the_title(); ?>
					</div>
				</div>
				<?php 
						$count++;
					} 
				?>
			</div>

		</div>
		<!--  -->
	</div> 
	<?php } ?> 
</div>
<?php wp_reset_postdata(); ?>
<!-- /container -->

<div class="widget-section">
	<div class="container">
		<div class="row"> 
			<div class="col-md-6 col-sm-6"> 
				<div class="panel contact-widget primary-bg card-2"> 
					<div class="panel-body text-center">
						<p class="lead w title">LET'S DELIVER THE RIGHT SOLUTION</p>
					</div>
					<div class="panel-body">
						<form>
							<div class="form-group">
								<label for="full_name">Full Name*</label>
								<input type="text" class="form-control" id="full_name" placeholder="Enter your full name" required>
							</div>
							<div class="form-group">
								<label for="emailadd">Email Address*</label>
								<input type="email" class="form-control" id="emailadd" placeholder="Enter your email address" required>
							</div>
							<div class="form-group">
								<label for="website">Website</label>
								<input type="text" class="form-control" id="website" placeholder="Enter website name or URL" required>
							</div>
							<div class="form-group">
								<label for="message">Message</label>
								<textarea class="form-control" rows="3" id="message"  placeholder="Type in your message." style="resize: vertical;"></textarea>
							</div> <br>
							<div class="text-center">
								<button type="submit" class="btn btn-default btn-outline btn-wide">
									Submit
								</button>
							</div>

						</form>
					</div>
				</div><br><br>
			</div>  
			<!--  -->
			<div class="col-md-6 col-sm-6">
				<?php  
					$the_slug = 'mock-surveys';
					$args = array(
					  'name'        => $the_slug,
					  'post_type'   => 'post',
					  'post_status' => 'publish',
					  'numberposts' => 1
					);
					$my_posts = get_posts($args);
					if( $my_posts ){
				?>
				<div class="panel panel-widget primary-dark card-2">
					<div class="title text-center">
						<?php echo $my_posts[0]->post_title; ?>
					</div>
					<div class="body scroll-primary" > 
						<?php echo $my_posts[0]->post_excerpt; ?>
					</div>
					<div class="foot text-center">
						<a href="<?php the_permalink($my_posts[0]->ID); ?>" class="btn btn-default btn-outline btn-wide">
							Know more
						</a>
					</div>
				</div>
				<?php } ?>
				<!--  -->
				<?php  
					$the_slug = 'support';
					$args = array(
					  'name'        => $the_slug,
					  'post_type'   => 'post',
					  'post_status' => 'publish',
					  'numberposts' => 1
					);
					$my_posts = get_posts($args);
					if( $my_posts ){
				?>
				<div class="panel panel-widget teal-bg card-2">
					<div class="title text-center">
						<?php echo $my_posts[0]->post_title; ?>
					</div>
					<div class="body scroll-primary" >
						<?php echo $my_posts[0]->post_content; ?>
					</div>
					<div class="foot text-center">
						<div class="row">
							<div class="col-md-6">
								<a href="mailto:contactus@GonzalesAndCompany.com" class="btn btn-default btn-outline btn-block">
									Contact Us
								</a>
							</div>
							<div class="col-md-6">
								<a href="mailto:consulting@GonzalesAndCompany.com" class="btn btn-default btn-outline btn-block">
									Consulting
								</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div> 
			<!--  --> 
		</div>
	</div>
	<!-- /container -->
</div>


<div class="container gonzales-360">  
	<div class="row"> 
		<div class="col-md-12">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/workflow.png" alt="" class="g360" width="100%">  
		</div>
		<?php the_content(); ?>
	</div> 
</div>
<!--  -->


<div class="assist-section primary-bg" style="margin-top: -10px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<p class="lead w">Recently Added Accreditation Services</p>
			</div> 
		</div>
	</div>
</div>

<?php  
	$args = array(
	    'category_name' => 'recently-added-services',
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
<?php get_footer(); ?>