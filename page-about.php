<?php get_header(); ?>
<?php  
	$args = array(
	    'category_name' => 'about-banner',
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
<?php  
	$args = array(
	    'category_name' => 'about-offers',
	    'posts_per_page' => 1,
	    'orderby' => 'date',
	    'order' => 'ASC'
	);

	$query = new WP_Query( $args );
	if($query->have_posts()){ 
		while($query->have_posts()){
			$query->the_post();
?>
<div class="widget-section">
	<div class="container">
		<div class="row">
			<!--  --> 
			<!--  -->
			<div class="col-md-12 col-sm-12">
				<div class="panel panel-widget primary-dark  card-2 about-banner">
					<div class="title">
						<?php the_title(); ?>
					</div>
					<div class="body scroll-primary text-left" >
						<?php the_excerpt(); ?>
					</div>
					<div class="foot text-center">
						<a href="<?php the_permalink(); ?>" class="btn btn-default btn-outline btn-wide">
							Know more
						</a>
					</div>
				</div>
			</div> 
			<!--  -->
		</div>
	</div>
	<!-- /container -->
</div>
<?php 
		}
	}
	wp_reset_postdata();
?>

<?php  
	$args = array(
	    'category_name' => 'about-tech-integration',
	    'posts_per_page' => 1,
	    'orderby' => 'date',
	    'order' => 'ASC'
	);

	$query = new WP_Query( $args );
	if($query->have_posts()){ 
		while($query->have_posts()){
			$query->the_post();
?>
<div class="container gonzales-360"> 
	<img src="<?php echo get_template_directory_uri(); ?>/assets/analytics.png" alt="" class="world hidden-xs hidden-sm">
	<div class="row">
		<div class="col-md-12"> 
			<img src="<?php echo get_template_directory_uri(); ?>/assets/tech.png" alt="" class="g360"> 
		</div>
		<div class="col-md-8 lead">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-lg btn-wide btn-primary">Discover</a> <br><br><br>
		</div>
	</div> 
</div>
<?php 
		}
	}
	wp_reset_postdata();
?>
<!--  -->


<div class="assist-section primary-bg">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="lead w">We're here to assist you.</p>
			</div>
			<div class="col-md-6">
				<a href="<?php echo get_link_by_slug('join', 'page'); ?>" class="btn btn-default btn-outline btn-block">
					Make an appointment
				</a>
			</div>
		</div>
	</div>
</div>

<?php  
	$args = array(
	    'category_name' => 'about-lifelong-learning',
	    'posts_per_page' => 1,
	    'orderby' => 'date',
	    'order' => 'ASC'
	);

	$query = new WP_Query( $args );
	if($query->have_posts()){ 
		while($query->have_posts()){
			$query->the_post();
?>
<div class="container gonzales-360"> 
	<img src="<?php echo get_template_directory_uri(); ?>/assets/network.png" alt="" class="world hidden-sm hidden-xs" style="left: 0px;">
	<div class="row">
		<div class="col-md-12 text-right"> 
			<img src="<?php echo get_template_directory_uri(); ?>/assets/life.png" alt="" class="g360"> 
		</div>
		<div class="col-md-8 col-md-offset-4 text-right lead">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-lg btn-wide btn-info">Be Enlightened</a> <br><br><br><br>
		</div>
	</div> 
</div>
<?php 
		}
	}
	wp_reset_postdata();
?>

<?php get_footer(); ?>