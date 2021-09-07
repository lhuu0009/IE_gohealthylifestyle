<?php

/**
 * Custom hooks for Lifestyle Blog
 * 
 */

// navigation fallback
if ( ! function_exists( 'lifestyle_blog_primary_navigation_fallback' ) ) :

	/**
	 * Fallback for primary navigation.
	 *
	 * @since 1.0.0
	 */
	function lifestyle_blog_primary_navigation_fallback() {
    ?>
		<div class="menu-header-menu-container">
		  <ul id="menu-header-menu" class="primary-menu">
		    <li class="menu-item">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
            <?php esc_html_e( 'Home', 'lifestyle-blog-lite' ); ?>
          </a>
        </li>
          <?php

          $args = array(
            'posts_per_page' => 5,
            'post_type'      => 'page',
            'orderby'        => 'name',
            'order'          => 'ASC',
            );

          $the_query = new WP_Query( $args );

          if ( $the_query->have_posts() ) {
            while ( $the_query->have_posts() ) {
              $the_query->the_post();
              the_title( '<li class="menu-item"><a href="' . esc_url( get_permalink() ) . '">', '</a></li>' );
            }

            wp_reset_postdata();
          }
          ?>
      </ul>
    </div> 
    <?php
	}
endif;
