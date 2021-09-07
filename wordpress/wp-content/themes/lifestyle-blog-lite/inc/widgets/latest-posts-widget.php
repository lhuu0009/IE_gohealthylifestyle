<?php
/**
 * Blaze: Lifestyle Blog latest posts
 *
 * Widget show the latest post with thumbnail.
 *
 * @package Lifestyle_Blog_Lite
 * @since 1.0.0
 */

add_action( 'widgets_init', 'lifestyle_blog_register_latestpost_widget' );

function lifestyle_blog_register_latestpost_widget() {
    register_widget( 'Lifestyle_blog_latestpost' );
}

class Lifestyle_blog_latestpost extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'lifestyle_blog_latest_posts',
            'description' => esc_html__( 'A widget to display the latest posts with thumbnail.', 'lifestyle-blog-lite' )
        );
        parent::__construct( 'Lifestyle_blog_latestpost', esc_html__( 'Lifestyle: Latest Posts', 'lifestyle-blog-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'latestpost_title' => array(
                'lifestyle_blog_widgets_name'         => 'latestpost_title',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Widget title', 'lifestyle-blog-lite' ),
                'lifestyle_blog_widgets_field_type'   => 'text'
            ),

            'latestpost_post_order' => array(
                'lifestyle_blog_widgets_name'         => 'latestpost_post_order',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Post Order', 'lifestyle-blog-lite' ),
                'lifestyle_blog_widgets_default'      => 'default',
                'lifestyle_blog_widgets_field_type'   => 'select',
                'lifestyle_blog_widgets_field_options' => array(
                        'default'   => esc_html__( 'Default Order', 'lifestyle-blog-lite' ),
                        'random'    => esc_html__( 'Random Order', 'lifestyle-blog-lite' ),
                    )    
            ),

            'latestpost_post_count' => array(
                'lifestyle_blog_widgets_name'         => 'latestpost_post_count',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Post Count', 'lifestyle-blog-lite' ),
                'lifestyle_blog_widgets_default'      => '5',
                'lifestyle_blog_widgets_field_type'   => 'number'
            ),

        );
        return $fields;
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        if( empty( $instance ) ) {
            return ;
        }

        $lifestyle_blog_widget_title = empty( $instance['latestpost_title'] ) ? '' : $instance['latestpost_title'];
        $lifestyle_blog_post_order   = empty( $instance['latestpost_post_order'] ) ? 'default' : $instance['latestpost_post_order'];
        $lifestyle_blog_post_count   = empty( $instance['latestpost_post_count'] ) ? '5' : $instance['latestpost_post_count'];

        echo $before_widget;
      ?>      
            
            
        <div class="sidebar-widget widget-latest-posts">

          <?php
              if( !empty( $lifestyle_blog_widget_title ) ) {
                  echo $before_title . esc_html( $lifestyle_blog_widget_title ) . $after_title;
              }
          ?>
            <div class="post-block-list post-module-1 mb-4">
                <ul class="list-post">
                    <?php
                        $lifestyle_blog_posts_args = array(
                                'posts_per_page' => absint( $lifestyle_blog_post_count )
                            );
                        if( 'random' === $lifestyle_blog_post_order ) {
                            $lifestyle_blog_posts_args['orderby'] = 'rand';
                        }
                        $lifestyle_blog_posts_query = new WP_Query( $lifestyle_blog_posts_args );
                        if( $lifestyle_blog_posts_query->have_posts() ) {
                            while( $lifestyle_blog_posts_query->have_posts() ) {
                                $lifestyle_blog_posts_query->the_post();
                    ?>	
                    		<li class="mb-1" data-aos="fade-up">

                              <div class="d-flex has-background has-border p-3 hover-up transition-normal border-radius-5">
                                  <div class="post-content media-body">
                                      <h6 class="post-title mb-2 text-limit-2-row font-medium">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                      </h6>
                                      <?php lifestyle_blog_entry_meta_widget(); ?>
                                  </div>
                                  <div class="post-thumb post-thumb-80 d-flex ml-1 border-radius-5 img-hover-scale overflow-hidden">
                                      <a class="color-white zoom" href="<?php the_permalink(); ?>">
                                          <?php the_post_thumbnail( 'lifestyle-blog-widget' ); ?>
                                      </a>
                                  </div>
                              </div>
      						</li>
                    <?php
                            }
                        }
                    ?>
                </ul><!-- posts-content-wrapper -->
            </div>
        </div><!-- latest-posts-wrapper -->
    <?php
        echo $after_widget;
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param   array   $new_instance   Values just sent to be saved.
     * @param   array   $old_instance   Previously saved values from database.
     *
     * @uses    lifestyle_blog_widgets_updated_field_value()   
     *
     * @return  array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            extract( $widget_field );

            // Use helper function to get updated field values
            $instance[$lifestyle_blog_widgets_name] = lifestyle_blog_widgets_updated_field_value( $widget_field, $new_instance[$lifestyle_blog_widgets_name] );
        }

        return $instance;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param   array $instance Previously saved values from database.
     *
     * @uses    lifestyle_blog_widgets_show_widget_field() 
     */
    public function form( $instance ) {
        $widget_fields = $this->widget_fields();

        // Loop through fields
        foreach ( $widget_fields as $widget_field ) {

            // Make array elements available as variables
            extract( $widget_field );
            $lifestyle_blog_widgets_field_value = !empty( $instance[$lifestyle_blog_widgets_name] ) ? wp_kses_post( $instance[$lifestyle_blog_widgets_name] ) : '';
            lifestyle_blog_widgets_show_widget_field( $this, $widget_field, $lifestyle_blog_widgets_field_value );
        }
    }
}
