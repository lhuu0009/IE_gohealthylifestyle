<?php
/***
 * Intro Post Hook
 * 
 */

if ( ! function_exists( 'lifestyle_blog_intro_post_fnc' ) ) :

	/**
	 * action: lifestyle_blog_intro_post
	 *
	 * @since 1.0.0
	 */
	function lifestyle_blog_intro_post_fnc( $lifestyle_blog_widget_args ) {
 ?>
  <div class="intro_slider_wrap">
      <div class="lifestyle_blog_intro_post_layout_one">
        <?php

          $lifestyle_post_num = $lifestyle_blog_widget_args['count'];
          $lifestyle_cat_id = $lifestyle_blog_widget_args['cat_id'];

          $lifestyle_post_args = array(
            'post_type' => 'post',
            'cat' => array( absint($lifestyle_cat_id) ),
            'posts_per_page'=> absint($lifestyle_post_num),
          );

          $lifestyle_post_query = new WP_Query($lifestyle_post_args);
          if($lifestyle_post_query -> have_posts()):
            while($lifestyle_post_query->have_posts()) :
              $lifestyle_post_query->the_post();
              ?>
              <div class="slider_single_wrap">
                <div cla="item_inner_wrap">
                  <div class="intro_thumbnail">
                    <span style='background: url("<?php the_post_thumbnail_url(); ?>") no-repeat center center; background-size: cover;'></span>
                  </div>
                  <div class="intro_post_overlay">
                    <div class="intro_cat"><?php the_category(); ?></div>
                    <h1 class="intro_title"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>
                    <div class="intro_meta entry-meta">
                      <i class="fas fa-calendar"></i>
                      <?php the_author(); ?> | 
                      <?php echo esc_html(get_the_date()); ?>
                    </div>
                  </div>
                </div>
              </div>
              <?php
            endwhile;
            wp_reset_postdata();
          endif;
        ?>
      </div>
    </div>
    <?php
  }
endif;
