<?php wp_footer(); ?>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-md-3 logo-proper">
        <a class="#" href="<?php echo get_site_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/footer-logo.png" width="100%" alt=""></a>
        <div class="text">
          <?php  
          $the_slug = 'privacy-policy';
          $args = array(
            'name'        => $the_slug,
            'post_type'   => 'post',
            'post_status' => 'publish',
            'numberposts' => 1
          );
          $my_posts = get_posts($args);
          if( $my_posts ){
        ?>
          <a href="<?php the_permalink($my_posts[0]->ID); ?>" class="w">Read our Privacy Policy</a><br>
          <?php } ?>
          <a href="#" class="w">All Rights Reserved © 2017</a>
        </div>
      </div>
      <div class="col-md-9 footer-proper">
        <div class="links">
          <div>
            <p class="lead w">The Firm</p>
            <!-- <ul class="list-unstyled">
             <li><a href="" class="w"><i class="fa fa-angle-right"></i> About Us</a></li>
             <li><a href="" class="w"><i class="fa fa-angle-right"></i> Our Mission</a></li>
             <li><a href="" class="w"><i class="fa fa-angle-right"></i> G&C Advantage</a></li>
             <li><a href="" class="w"><i class="fa fa-angle-right"></i> G&C DNA</a></li> 
           </ul> -->
           <?php 
              $args = array(
                'menu_class' => 'list-unstyled',
                'theme_location' => 'firm',
                'link_before' => '<i class="fa fa-angle-right"></i> '
              );
              wp_nav_menu($args); 
          ?> 
         </div>
         <div>
          <p class="lead w">Quick Links</p>
          <?php 
              $args = array(
                'menu_class' => 'list-unstyled',
                'theme_location' => 'quicklinks',
                'link_before' => '<i class="fa fa-angle-right"></i> '
              );
              wp_nav_menu($args); 
          ?> 
       </div>
       <div>
        <p class="lead w">Clients</p>
        <?php 
              $args = array(
                'menu_class' => 'list-unstyled',
                'theme_location' => 'clients',
                'link_before' => '<i class="fa fa-angle-right"></i> '
              );
              wp_nav_menu($args); 
          ?> 
     </div>
   </div>
   <div class="newsletter">
    <p class="lead w">Newsletter</p>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Subscribe by typing in your email...">
      <span class="input-group-btn">
        <button class="btn btn-primary" type="button">SUBCRIBE</button>
      </span>
    </div><!-- /input-group -->
  </div>

</div>
</div>
</div>
</footer>
<script>
      jQuery(function( $ ){
        $('.batch1').owlCarousel({
            stagePadding: 50,
            loop:true,
            margin:30, 
            autoplay:true,
            autoplayTimeout:4000,
            autoplayHoverPause:true, 
            nav:false,
            responsive:{
                0:{
                    stagePadding: 50,
                    items:1
                },
                600:{
                    items:2
                },
                800:{
                    items:3
                },
                1100:{
                    items:4
                }
            }
        });
         $('.batch2').owlCarousel({
            stagePadding: 50,
            loop:true,
            margin:30, 
            autoplay:true,
            autoplayTimeout:8000,
            autoplayHoverPause:true, 
            center:true,
            nav:false, 
            responsive:{
                0:{
                    stagePadding: 50,
                    items:1
                },
                600:{
                    items:2
                },
                800:{
                    items:3
                },
                1100:{
                    items:4
                }
            }
        });
      });
    </script>

</body>
</html>