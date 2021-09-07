<?php
/**
 * Blaze: Lifestyle Blog Post Grid widget
 *
 * Widget show the Feature post with thumbnail.
 *
 * @package Lifestyle_Blog_Lite
 * @since 1.0.0
 */

add_action( 'widgets_init', 'lifestyle_blog_register_postgrid_widget' );

function lifestyle_blog_register_postgrid_widget() {
    register_widget( 'Lifestyle_blog_postgrid' );
}

class Lifestyle_blog_postgrid extends WP_widget {

	/**
     * Register widget with WordPress.
     */
    public function __construct() {
        $widget_ops = array( 
            'classname' => 'lifestyle_blog_latest_posts',
            'description' => esc_html__( 'A widget to display the latest posts with thumbnail.', 'lifestyle-blog-lite' )
        );
        parent::__construct( 'Lifestyle_blog_postgrid', esc_html__( 'Lifestyle: Post Grid Layout', 'lifestyle-blog-lite' ), $widget_ops );
    }

    /**
     * Helper function that holds widget fields
     * Array is used in update and form functions
     */
    private function widget_fields() {
        
        $fields = array(

            'postgrid_title' => array(
                'lifestyle_blog_widgets_name'         => 'postgrid_title',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Widget title', 'lifestyle-blog-lite' ),
                'lifestyle_blog_widgets_field_type'   => 'text'
            ),

            'postgrid_category_id' => array(
                'lifestyle_blog_widgets_name'         => 'postgrid_category_id',
                'lifestyle_blog_widgets_title'        => esc_html__( 'Feature Category', 'lifestyle-blog-lite' ),
                'lifestyle_blog_widgets_field_type'   => 'multicheckboxes',
                'lifestyle_blog_widgets_field_options' => lifestyle_blog_categories_checklist()
            ),

            'postgrid_post_count' => array(
                'lifestyle_blog_widgets_name'         => 'postgrid_post_count',
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

        $lifestyle_blog_widget_title = empty( $instance['postgrid_title'] ) ? '' : $instance['postgrid_title'];
        $lifestyle_blog_feature_cat_id  = empty( $instance['postgrid_category_id'] ) ? '' : $instance['postgrid_category_id'];
        $lifestyle_blog_post_count   = empty( $instance['postgrid_post_count'] ) ? '5' : $instance['postgrid_post_count'];

        if ( !empty( $lifestyle_blog_feature_cat_id ) ) {
            $checked_cats = array();
            foreach( $lifestyle_blog_feature_cat_id as $cat_key => $cat_value ) {
                $checked_cats[] = $cat_key;
            }
        } else {
            return;
        }

        $lifestyle_blog_feature_cat_id = implode( ",", $checked_cats );
        
        

        $lifestyle_blog_widget_args = array(
                'title'  => $lifestyle_blog_widget_title,
                'cat_id' => $lifestyle_blog_feature_cat_id,
                'count'  => $lifestyle_blog_post_count
            );
        
        echo $before_widget;
      
            do_action('lifestyle_post_module_1', $lifestyle_blog_widget_args );

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
            $lifestyle_blog_widgets_field_value = !empty( $instance[$lifestyle_blog_widgets_name] ) ? $instance[$lifestyle_blog_widgets_name]: '';
            lifestyle_blog_widgets_show_widget_field( $this, $widget_field, $lifestyle_blog_widgets_field_value );
        }
    }
}
