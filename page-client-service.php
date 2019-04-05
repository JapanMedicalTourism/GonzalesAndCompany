<?php get_header(); ?>
<?php  
	$args = array(
	    'category_name' => 'client-service-banner',
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
			<!--  -->
			<?php  
				$bgs = array('orange-bg', 'purple-bg', 'teal-bg');
				$args = array(
				    'category_name' => 'client-service-post-banner',
				    'posts_per_page' => 2,
				    'orderby' => 'date',
				    'order' => 'ASC'
				);

				$query = new WP_Query( $args );
				if($query->have_posts()){ 
					$count = 0;
					while($query->have_posts()){
						$query->the_post();
			?>
			<div class="col-md-6 col-sm-6">
				<div class="panel panel-widget <?php echo $bgs[$count]; ?> card-2">
					<div class="title">
						<?php the_title(); ?>
					</div>
					<div class="body scroll-primary text-left">
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

<?php  
	$args = array(
	    'category_name' => 'client-service-dna',
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
	<img src="<?php echo get_template_directory_uri(); ?>/assets/molecules.png" alt="" class="world">
	<div class="row">
		<div class="col-md-12"> 
			<img src="<?php echo get_template_directory_uri(); ?>/assets/dna.png" alt="" class="g360"> 
		</div>
		<div class="col-md-8 lead">
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="btn btn-lg btn-wide btn-danger">Discover</a>
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
				<p class="lead w">Advantage Services</p>
			</div>
			<div class="col-md-6"> 
			</div>
		</div>
	</div>
</div>

<div class="showcase-section"> 
	<div class="row">
		<div class="col-md-12">
			<div class="owl-carousel owl-theme batch1">
				<?php  
					$args = array(
					    'category_name' => 'advantage-services',
					    'orderby' => 'date',
					    'order' => 'ASC'
					);

					$query = new WP_Query( $args );
					if($query->have_posts()){ 
						while($query->have_posts()){
							$query->the_post();
							$thumb_url = wp_get_attachment_image_src(get_post_thumbnail_id(), '', false);
				?>
				<div class="item" style="background-image: url(<?php echo $thumb_url[0]; ?>);">
					<a href="<?php the_permalink(); ?>"> 
						<div class="title">
							<?php 
								$data = get_the_title();

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
				<?php 
						}
					}
					wp_reset_postdata();
				?>
			</div>
		</div>
	</div> 
</div>
<?php get_footer(); ?>