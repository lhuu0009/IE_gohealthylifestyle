<?php
/**
 * Define custom fields for widgets
 * 
 * @package Blaze Themes
 * @subpackage Lifestyle Blog
 * @since 1.0.0
 */

function lifestyle_blog_widgets_show_widget_field( $instance = '', $widget_field = '', $bz_widget_field_value = '' ) {
    
    extract( $widget_field );

    switch ( $lifestyle_blog_widgets_field_type ) {

        // Standard text field
        case 'text' :
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>"><?php echo esc_html( $lifestyle_blog_widgets_title ); ?>:</label>
                <input class="widefat" id="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ) ); ?>" type="text" value="<?php echo esc_html( $bz_widget_field_value ); ?>" />

                <?php if ( isset( $lifestyle_blog_widgets_description ) ) { ?>
                    <br />
                    <small><em><?php echo esc_html( $lifestyle_blog_widgets_description ); ?></em></small>
                <?php } ?>
            </p>
        <?php
            break;

        /**
         * Checkbox field
         */
        case 'checkbox' :
            ?>
            <p>
                <input id="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ) ); ?>" type="checkbox" value="1" <?php checked( '1', $bz_widget_field_value ); ?>/>
                <label for="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>"><?php echo esc_html( $lifestyle_blog_widgets_title ); ?></label>

                <?php if ( isset( $lifestyle_blog_widgets_description ) ) { ?>
                    <br />
                    <em><?php echo wp_kses_post( $lifestyle_blog_widgets_description ); ?></em>
                <?php } ?>
            </p>
            <?php
            break;

        // Select field
        case 'select' :
            if( empty( $bz_widget_field_value ) ) {
                $bz_widget_field_value = $lifestyle_blog_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>"><?php echo esc_html( $lifestyle_blog_widgets_title ); ?>:</label>
                <select name="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ) ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>" class="widefat">
                    <?php foreach ( $lifestyle_blog_widgets_field_options as $athm_option_name => $athm_option_title ) { ?>
                        <option value="<?php echo esc_attr( $athm_option_name ); ?>" id="<?php echo esc_attr( $instance->get_field_id( $athm_option_name ) ); ?>" <?php selected( $athm_option_name, $bz_widget_field_value ); ?>><?php echo esc_html( $athm_option_title ); ?></option>
                    <?php } ?>
                </select>

                <?php if ( isset( $lifestyle_blog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $lifestyle_blog_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        case 'number' :
            if( empty( $bz_widget_field_value ) ) {
                $bz_widget_field_value = $lifestyle_blog_widgets_default;
            }
        ?>
            <p>
                <label for="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>"><?php echo esc_html( $lifestyle_blog_widgets_title ); ?>:</label>
                <input name="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ) ); ?>" type="number" step="1" min="1" id="<?php echo esc_attr( $instance->get_field_id( $lifestyle_blog_widgets_name ) ); ?>" value="<?php echo esc_html( $bz_widget_field_value ); ?>" class="small-text" />

                <?php if ( isset( $lifestyle_blog_widgets_description ) ) { ?>
                    <br />
                    <small><?php echo esc_html( $lifestyle_blog_widgets_description ); ?></small>
                <?php } ?>
            </p>
        <?php
            break;

        //Multi checkboxes
        case 'multicheckboxes':
            ?>
                <p><span class="field-label"><label><?php echo esc_html( $lifestyle_blog_widgets_title ); ?></label></span></p>
                <ul class="mt-multiple-checkbox">

                <?php    
                foreach ( $lifestyle_blog_widgets_field_options as $athm_option_name => $athm_option_title ) {
                    if ( isset( $bz_widget_field_value[$athm_option_name] ) ) {
                        $bz_multi_select = 1;
                    } else {
                        $bz_multi_select = 0;
                    }
                    
                ?>
                    <div class="mt-single-checkbox">
                        <p>
                            <input id="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ).'['.$athm_option_name.']' ); ?>" name="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ).'['.$athm_option_name.']' ); ?>" type="checkbox" value="1" <?php checked( '1', $bz_multi_select ); ?>/>
                            <label for="<?php echo esc_attr( $instance->get_field_name( $lifestyle_blog_widgets_name ).'['.$athm_option_name.']' ); ?>"><?php echo esc_html( $athm_option_title ); ?></label>
                        </p>
                    </div><!-- .mt-single-checkbox -->
                <?php
                    }
                    echo '</ul>';
                    if ( isset( $lifestyle_blog_widgets_description ) ) {
                ?>
                    <em><?php echo wp_kses_post( $lifestyle_blog_widgets_description ); ?></em>
                <?php
                    }
            break;


    }
}

function lifestyle_blog_widgets_updated_field_value( $widget_field, $new_field_value ) {

    extract( $widget_field );

    if ( $lifestyle_blog_widgets_field_type == 'number') {
        return absint( $new_field_value );
    } elseif ( $lifestyle_blog_widgets_field_type == 'textarea' ) {
        return ( stripslashes( wp_filter_post_kses( addslashes( $new_field_value ) ) ) );
    } elseif ( $lifestyle_blog_widgets_field_type == 'url' ) {
        return esc_url_raw( $new_field_value );
    } elseif ( $lifestyle_blog_widgets_field_type == 'multicheckboxes' ) {
        $multicheck_list = array();
        if ( is_array( $new_field_value ) ) {
            foreach( $new_field_value as $key => $value ) {
                $multicheck_list[absint( $key )] = esc_attr( $value );
            }
        }
        return $multicheck_list;
    }  else {
        return sanitize_text_field( $new_field_value );
    }
}
