<?php  
	$args = array(
	    'category_name' => 'impact',
	    'posts_per_page' => 4,
	    'orderby' => 'date',
	    'order' => 'ASC'
	);

	$query = new WP_Query( $args );
?>
<div id="carousel-example-generic" class="container banner main-banner carousel slide" data-ride="carousel">
	<?php if($query->have_posts()){ ?>
	<div class="row">
		<div class="col-md-9 carousel-inner" role="listbox">
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
	              LEARN MORE
	            </a>
			</div>
			<?php 
					$count++;
				} 
			?>
		</div>
		<!--  -->
		<div class="col-md-3 carousel-indicators">
			<?php 
				$count = 0;
				while($query->have_posts()){ 
					$query->the_post();
					$imageid = MultiPostThumbnails::get_post_thumbnail_id(get_post_type(), 'secondary-image', get_the_ID());
					$imageurl = wp_get_attachment_image_src($imageid,'large');
			?>
			<div class="banner-tab banner-left primary-bg selected card-2 <?php if($count == 0){ echo 'active'; } ?>" data-target="#carousel-example-generic" data-slide-to="<?php echo $count; ?>">
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
		<!--  -->
	</div>  
	<?php } ?>
</div>
<?php wp_reset_postdata(); ?>