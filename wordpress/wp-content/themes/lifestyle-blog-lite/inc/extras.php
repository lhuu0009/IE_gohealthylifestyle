<?php
/**
 * Custom functions that act independently of the theme templates.
 * @package Lifestyle_Blog_Lite
 */

 
/**
 * Adds custom classes to the array of body classes.
 * @param array $classes Classes for the body element.
 * @return array
 */
function lifestyle_blog_body_classes( $classes ) {
	// Adds a class of custom-background-image to sites with a custom background image.
	if ( get_background_image() ) {
		$classes[] = 'custom-background-image';
	}
	
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	return $classes;
}
add_filter( 'body_class', 'lifestyle_blog_body_classes' );


/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 * @since Lifestyle_Blog 
 * Special thanks to the TwentyNinteen theme
 */
function lifestyle_blog_widget_tag_cloud_args( $args ) {
	$args['largest'] = 0.813;
	$args['smallest'] = 0.813;
	$args['unit'] = 'rem';
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'lifestyle_blog_widget_tag_cloud_args' );


/**
 * Move the More Link outside from the contents last summary paragraph tag.
 * @since Lifestyle_Blog 1.0
 */
if ( ! function_exists( 'lifestyle_blog_move_more_link' ) ) :
	function lifestyle_blog_move_more_link($link) {
			$link = '<p class="more-link-wrapper">'.$link.'</p>';
			return $link;
		}
	add_filter('the_content_more_link', 'lifestyle_blog_move_more_link');
endif;


/**
 * Custom comments style
 * @since Lifestyle_Blog 1.0
 */

if (!function_exists('lifestyle_blog_comment')) {
	function lifestyle_blog_comment($comment, $args, $depth) {
	?>

	<li>                        
		<div class="comment-wrapper">
			<?php echo get_avatar($comment, 60); ?>
				<div class="comment-info">
					<cite class="fn"><?php echo wp_kses_post(get_comment_author_link()); ?></cite>  
					<?php if ( in_array( 'bypostauthor', get_comment_class() ) ) : ?><span class="bypostauthor"><?php esc_html_e('Post Author', 'lifestyle-blog-lite'); ?></span><?php endif; ?>				                                     		
					<div class="comment-meta">
						<span class="comment-date">
							<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ) ?>">
								<?php echo esc_html( get_comment_date() ); ?>
								<?php echo esc_html(' at ', 'lifestyle-blog-lite'); ?>
								<?php echo esc_html( get_comment_time() ); ?>	
							</a>
						</span>
						<span class="comment-edit">
							<?php edit_comment_link( esc_html__( 'Edit Comment', 'lifestyle-blog-lite' ), '', '' ); ?>		
						</span>	
					</div>
				</div>
		
			<div id="comment-<?php echo esc_attr( comment_ID()); ?>" class="comment">
				<?php comment_text(); ?>
			</div>
			<div class="comment-reply">
				<span class="reply-icon"></span>
				<?php comment_reply_link( array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']) ) ); ?></div>
		</div>

	<?php if ($comment->comment_approved == '0') : ?>
	<p><em><?php esc_html_e('Your comment is awaiting moderation.', 'lifestyle-blog-lite'); ?></em></p>
	<?php endif; ?>
	<?php 
	}
}	




