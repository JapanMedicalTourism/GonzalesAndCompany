<?php  
get_header();
the_post();
?>
<div class="container banner main-banner">

</div>
<!-- /container -->

<div class="single-section" style="margin-top:  -180px; ">
  <img src="<?php echo get_template_directory_uri(); ?>/assets/bg-1.png" class="attach-img">
  <div class="container">
    <div class="row" style="padding-top: 100px;margin-bottom: 50px;">
      <!--  --> 
      <!--  -->
      <div class="col-md-9"> 
        <div class="panel panel-default">
          <div class="panel-heading primary-bg w card-2 lead">
          <?php  
            $categories = get_the_category();
            $news = 0;
            foreach ($categories as $category) {
              if($category->category_parent == 0){
                echo $category->name;
              }
              if($category->slug == 'news'){
                $news++;
              }
            }
          ?>
          </div>
          <div class="panel-body">
            <h3><?php the_title(); ?> <br>
              <small class="text-muted posted-date">
                <?php 
                  if($news > 0){
                    the_date(); 
                  }
                ?>    
              </small></h3>
              <hr>

              <div class="  scroll-primary" style="height: ;">
                <div class="text-body">
                  <?php the_content(); ?>
                </div>
              </div>
            </div> 

            <div class="panel-footer">
              <p class="text-primary"><i class="fa fa-question-circle"></i> Not what you're looking for? No worries, <a href="<?php echo get_link_by_slug('join', 'page'); ?>#contact-us"><b>ask us directly.</b></a></p>
            </div>

          </div>
        </div>
        <!--  -->
        <div class="col-md-3"  >
          <!-- advertisements or some shit -->
          <div class="panel panel-default">
            <div class="panel-heading primary-bg w card-2 lead">News & Events</div>
            <div class="news-container scroll-primary" style="height: auto;">
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
            <!-- Random promotion from the first 3 shit in index -->
            <?php  
              $args = array(
                  'category_name' => 'expertise',
                  'posts_per_page' => 1,
                  'orderby' => 'rand'
              );

              $query = new WP_Query( $args );
              if($query->have_posts()){ 
                while($query->have_posts()){
                  $query->the_post();
            ?>
              <div class="panel panel-widget card-2 orange-bg">
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
            <?php 
                }
              }
              wp_reset_postdata();
            ?>
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
          <p class="lead w">Other Related Services</p>
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