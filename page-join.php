<?php get_header(); ?>
<?php  
	$args = array(
	    'category_name' => 'join-banner',
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
			<!--  -->
			<?php  
				$bgs = array('teal-bg', 'purple-bg', 'orange-bg');
				$args = array(
				    'category_name' => 'join-post-banner',
				    'posts_per_page' => 3,
				    'orderby' => 'date',
				    'order' => 'ASC'
				);

				$query = new WP_Query( $args );
				if($query->have_posts()){ 
					$count = 0;
					while($query->have_posts()){
						$query->the_post();
			?>
			<div class="col-md-4 col-sm-6">
				<div class="panel panel-widget <?php echo $bgs[$count]; ?> card-2">
					<div class="title text-center">
						<?php the_title(); ?>
					</div>
					<div class="body scroll-primary" >
						<?php the_excerpt(); ?>
					</div>
					<div class="foot text-center">
						<a href="<?php the_permalink(); ?>" class="btn btn-default btn-outline btn-wide">
							Know more
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
		</div>
	</div>
	<!-- /container -->
</div>


<div class="container gonzales-360"> 
	<img src="<?php echo get_template_directory_uri(); ?>/assets/fold.png" alt="" class="world hidden-xs hidden-sm">
	<div class="row"> 
		<div class="col-md-6">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/worldwide.png" alt="" class="g360" width="100%"> 
			<?php the_content(); ?>

			</div>
			<div class="col-md-6">
				<div class="panel contact-widget primary-bg card-2"> 
					<div class="panel-body text-center" id="contact-us">
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
		</div> 
	</div>
	<!--  -->

	<iframe width="100%" height="450" frameborder="0" style="border:0"
	src="https://www.google.com/maps/embed/v1/place?q=tokyo&key=AIzaSyAtr5cI6syJp2AAIVMU1Cz7b-dIBP3HroA" allowfullscreen></iframe>
	<div class="assist-section primary-bg" style="margin-top: -10px;">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<p class="lead w">Know more about joining</p>
				</div>
				<div class="col-md-6">

				</div>
			</div>
		</div>
	</div>



	<div class="container gonzales-360"> 
		<img src="<?php echo get_template_directory_uri(); ?>/assets/fold2.png" alt="" class="world" style="left: 0px;">
		<?php  
			$args = array(
			    'category_name' => 'join-know-more',
			    'posts_per_page' => 1,
			    'orderby' => 'date',
			    'order' => 'ASC'
			);

			$query = new WP_Query( $args );
			if($query->have_posts()){ 
				while($query->have_posts()){
					$query->the_post();
		?>
		<div class="row">
			<?php the_content(); ?>

		</div> 
		<?php 
				}
			}
			wp_reset_postdata();
		?>
	</div>
	<?php get_footer(); ?>