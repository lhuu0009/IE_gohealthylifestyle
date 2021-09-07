<?php
/***
 * Intro Post Hook
 * 
 */

if ( ! function_exists( 'lifestyle_post_module_1_fnc' ) ) :

	/**
	 * action: lifestyle_blog_favourite_post
	 *
	 * @since 1.0.0
	 */
	function lifestyle_post_module_1_fnc($lifestyle_blog_widget_args) {

    $lifestyle_title= $lifestyle_blog_widget_args['title'];
    $lifestyle_post_num = $lifestyle_blog_widget_args['count'];
    $lifestyle_cat_id = $lifestyle_blog_widget_args['cat_id'];
    ?>
    

        <div class="post_module_2 pt-3 pb-3">
          <div class="header_one position-relative">
              <h5><?php echo esc_html($lifestyle_title); ?></h5>
          </div>

          <div class="loop_list loop_list_style_1">
              <div class="row">

                <?php
                  $lifestyle_post_args = array(
                    'post_type' => 'post',
                    'cat' => array($lifestyle_cat_id),
                    'posts_per_page'=> absint($lifestyle_post_num),
                  );
                  $lifestyle_post_query = new WP_Query($lifestyle_post_args);
                  if($lifestyle_post_query -> have_posts()):
                    while($lifestyle_post_query->have_posts()) :
                      $lifestyle_post_query->the_post();
                    ?>

                    <article class="col-md-6 mb-5" data-aos="fade-up">
                        <div class="post_card_1 border-radius-10 hover-up">
                            <div class="post_thumb thumb_overlay img_hover_slide position-relative" style="background-image: url(<?php echo esc_url(get_the_post_thumbnail_url()); ?>)">
                                <div class="social_share"></div>
                            </div>
                            <div class="post_content p-3">
                                <div class="entry_meta meta-0 font-small mb-2">
                                    <?php the_category(); ?>
                                </div>
                                <div class="d-flex post_card_content">
                                    <h5 class="post_title mb-2">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h5>
                                    <div class="post_excerpt mb-2 font-small text_muted">
                                        <?php the_excerpt(); ?>
                                    </div>

                                    <!-- entry-meta -->
                                    <?php lifestyle_blog_entry_meta(); ?>

                                </div>
                            </div>
                        </div>
                    </article>
                    <?php
                    endwhile;
                  wp_reset_postdata();
                endif;
                ?>
              </div>
          </div>
        </div>
    <?php
  }
endif;
