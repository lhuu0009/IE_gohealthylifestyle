<?php
/**
 * Widget for Recent Comment
 *
 * @package Blaze Themes
 * @subpackage Lifestyle_Blog
 * @since 1.0.0
 */
add_action( 'widgets_init', 'lifestyle_blog_register_recent_comment' );

function lifestyle_blog_register_recent_comment() {
    register_widget( 'Lifestyle_blog_recent_comment' );
}

class Lifestyle_blog_recent_comment extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'profile widget',
            'description' => esc_html__( 'Display Recent Comment', 'lifestyle-blog-lite' )
        );
        parent::__construct( 'lifestyle_blog_recent_comment', esc_html__( 'Lifestyle : Recent Comment', 'lifestyle-blog-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(
        	'recent_comment_title' => array(
                'lifestyle_blog_widgets_name'         => 'recent_comment_title',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Widget title', 'lifestyle-blog-lite' ),
                'lifestyle_blog_widgets_field_type'   => 'text'
            ),

            'number_of_comment' => array(
                'lifestyle_blog_widgets_name'         => 'number_of_comment',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Enter the number of comment to display', 'lifestyle-blog-lite' ),
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
        $lifestyle_blog_recent_comment_title = empty( $instance['recent_comment_title'] ) ? '' : $instance['recent_comment_title'];
        $lifestyle_blog_number_of_comment = empty( $instance['number_of_comment'] ) ? '5' : $instance['number_of_comment'];

        echo $before_widget;

             if( !empty( $lifestyle_blog_recent_comment_title ) ) {
                 echo $before_title . esc_html( $lifestyle_blog_recent_comment_title ) . $after_title;
             }
            ?>
            <div class="post-block-list post-module-2 comment_list_wrap sidebar-widget">
	            <ul class="list-post">
	              <?php
	                $args = array(
	                        'number' => absint($lifestyle_blog_number_of_comment),
	                        'status' => 'approve');
	                $lifestyle_blog_comments = get_comments($args);
	                foreach($lifestyle_blog_comments as $comment) {
	                  ?>
	                    <li class="mb-2" data-aos="fade-up">
	                      <div class="d-flex has-background has-border p-3 hover-up transition-normal border-radius-5">
	                          <div class="post-thumb post-thumb-64 d-flex mr-2 border-radius-5 img-hover-scale overflow-hidden">
                                <?php echo get_avatar( $comment, 40 ); ?>
	                          </div>
	                          <div class="post-content media-body">
	                              <p class="mb-2">
	                                <a href="<?php echo esc_url( get_permalink($comment->comment_post_ID) ); ?>#comment" class="comment_author_name">
	                                  <strong><?php echo esc_html($comment->comment_author); ?></strong>
	                                </a>
	                                <span class="ml-2 font-small has-dot comment_date">
	                                  <?php 
	                                    $comment_date = get_comment_date( "F jS, Y", $comment->comment_ID );
	                                    echo esc_html($comment_date);
	                                   ?>
	                                </span>
	                              </p>
	                              <p class="font-small">
	                                <?php echo esc_html($comment->comment_content); ?>
	                              </p>
	                          </div>
	                      </div>
	                    </li>
	                  <?php
	                  }
	                ?>
	            </ul>
	          </div>
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
     * @uses    lifestyle_blog_widgets_updated_field_value()      defined in bloglife-widget-fields.php
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
     * @uses    lifestyle_blog_widgets_show_widget_field()        defined in bloglife-widget-fields.php
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