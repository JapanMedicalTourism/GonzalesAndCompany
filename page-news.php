<?php  
  get_header();
?>
<div class="container banner main-banner">

</div>
<!-- /container -->

<div class="widget-section" style="margin-top:  -180px; ">
  <div class="container">
    <div class="row" style="padding-top: 100px;margin-bottom: 50px;">
      <!--  --> 
      <!--  -->
      <div class="col-md-8"> 
       <div class="panel panel-default">
        <div class="panel-heading primary-bg w card-2 lead">News & Events</div>
        <div class="news-container scroll-primary" style="height: 700px;">
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
          ?>
          <a href="<?php the_permalink(); ?>" class="list-group-item">
            <small class="text-muted text-uppercase">
              <?php the_date(); ?>
            </small> 
            <span class="text-primary text-title">
              <?php the_title(); ?>
            </span> 
            <span class="text-body">
              <?php the_excerpt(); ?>
            </span> 
            <span class="text-info">
              Lunch and Learn <i class="fa fa-angle-right"></i>
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
    <div class="col-md-4">
      <!-- advertisements or some shit -->

      <!-- Random promotion from the first 3 shit in index -->
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
  <!--  -->
</div>

<!--  -->
</div>
</div>
<!-- /container -->
</div>





<div class="assist-section primary-bg"  style="margin-top: 0px;">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <p class="lead w">Explore Gonzales and Company</p>
      </div>
      <div class="col-md-6">
        <a href="<?php echo get_link_by_slug('join', 'page'); ?>" class="btn btn-default btn-outline btn-block">
          Join Us
        </a>
      </div>
    </div>
  </div>
</div>

<?php 
  get_template_part('includes/relatedservices');
  get_footer(); 
?>