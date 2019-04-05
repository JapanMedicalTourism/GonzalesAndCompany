<div class="showcase-section"> 
  <div class="row">
    <div class="col-md-12">
     <div class="owl-carousel owl-theme batch1">
        <?php  
          $args = array(
              'category_name' => 'services',
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