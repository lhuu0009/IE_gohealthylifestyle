<?php
/**
 * Custom template tags for this theme.
 * @package Lifestyle_Blog_Lite
 */
 

 // Prints HTML with meta information
if ( ! function_exists( 'lifestyle_blog_post_info' ) ) :

function lifestyle_blog_post_info() {

	// show post date	
	echo '<span class="posted-on">' . esc_html( get_the_date() ) . '</span>';

	// show author	
	?>
	<span class="byline">
		<?php esc_html_e('Written by', 'lifestyle-blog-lite'); ?>
		<?php echo esc_html( get_the_author() ); ?>
	</span>		
	<?php
}
endif;
 

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
if ( ! function_exists( 'lifestyle_blog_entry_footer' ) ) :
function lifestyle_blog_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		/* translators: used between list items, there is a space after the comma */		
		$categories_list = get_the_category_list( ', ', 'lifestyle-blog-lite' );
		if ( $categories_list ) {
			printf( '<div class="cat-links">' . esc_html__( 'Posted in %1$s', 'lifestyle-blog-lite' ) . '</div>', $categories_list ); // WPCS: XSS OK.
		}
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( ', ', 'lifestyle-blog-lite' ) );
		if ( $tags_list ) {
			printf( '<div class="tags-links">' . esc_html__( 'Tagged %1$s', 'lifestyle-blog-lite' ) . '</div>', $tags_list ); // WPCS: XSS OK.
		}
	}
	
	
	if ( ! is_single()  && ! is_search() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		comments_popup_link( esc_html__( 'Leave a comment', 'lifestyle-blog-lite' ), esc_html__( '1 Comment', 'lifestyle-blog-lite' ), esc_html__( '% Comments', 'lifestyle-blog-lite' ) );
		echo '</span>';
	}

	edit_post_link(
		sprintf(
			/* translators: %s: Name of current post */
			esc_html__( 'Edit %s', 'lifestyle-blog-lite' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


/**
 * Multi-page navigation.
 */
if ( ! function_exists( 'lifestyle_blog_multipage_nav' ) ) :
function lifestyle_blog_multipage_nav() {
	wp_link_pages( array(
		'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'lifestyle-blog-lite' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
		'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'lifestyle-blog-lite' ) . ' </span>%',
		'separator'   => ', ',
	) );
}
endif;



/**
 * Blog pagination when more than one page of post summaries.
 * Add classes to next_posts_link and previous_posts_link
 */
add_filter('next_posts_link_attributes', 'lifestyle_blog_posts_link_attributes_1');
add_filter('previous_posts_link_attributes', 'lifestyle_blog_posts_link_attributes_2');

function lifestyle_blog_posts_link_attributes_1() {
    return 'class="post-nav-older"';
}
function lifestyle_blog_posts_link_attributes_2() {
    return 'class="post-nav-newer"';
}


/**
 * Single Post previous or next navigation.
 */
if ( ! function_exists( 'lifestyle_blog_post_pagination' ) ) :

function lifestyle_blog_post_pagination() {
	the_post_navigation( array(	
		'next_text' => '<span class="meta-nav" aria-hidden="true">' . esc_html__( 'Next Post', 'lifestyle-blog-lite' ) . '</span><span class="next_icon fa"><i class="fas fa-angle-right"></i></span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Next Post:', 'lifestyle-blog-lite' ) . '</span> ' .
			'<span class="post-title">%title</span>',
			
		'prev_text' => '<span class="prev_icon"><i class="fas fa-angle-left"></i></span><span class="meta-nav" aria-hidden="true">' . esc_html__( 'Previous Post', 'lifestyle-blog-lite' ) . '</span> ' .
			'<span class="screen-reader-text">' . esc_html__( 'Previous Post:', 'lifestyle-blog-lite' ) . '</span> ' .
			'<span class="post-title">%title</span>',
	) );
}
endif;


/**
 * Category dropdown
 */
if ( !function_exists( 'lifestyle_blog_categories_dropdown' ) ) :
    /**
     * Category dropdown
     *
     * @return array();
     */
    function lifestyle_blog_categories_dropdown() {
        $lifestyle_blog_categories = get_categories( array( 'hide_empty' => 1 ) );
        $lifestyle_blog_categories_lists = array();
        $lifestyle_blog_categories_lists['0'] = esc_html__( 'Select Category', 'lifestyle-blog-lite' );
        foreach( $lifestyle_blog_categories as $category ) {
            $lifestyle_blog_categories_lists[esc_attr( $category->term_id )] = esc_html( $category->name );
        }
        return $lifestyle_blog_categories_lists;
    }
endif;


/**
 * Category checkbox list
 */
if ( !function_exists( 'lifestyle_blog_categories_checklist' ) ) :

    /**
     * Category list
     *
     * @return array();
     */
    function lifestyle_blog_categories_checklist() {
        $lifestyle_blog_categories = get_categories( array( 'hide_empty' => 1 ) );
        $lifestyle_blog_categories_lists = array();
        foreach( $lifestyle_blog_categories as $category ) {
            $lifestyle_blog_categories_lists[absint( $category->term_id )] = esc_html( $category->name ) .' ('. absint( $category->count ) .')';
        }
        return $lifestyle_blog_categories_lists;
    }
endif;



/**
 * lifestyle_blog_entry_meta
 */

if ( !function_exists( 'lifestyle_blog_entry_meta' ) ) :
    /**
     * Category list
     *
     * @return array();
     */
    function lifestyle_blog_entry_meta() {
        ?>
        <div class="entry-meta meta_1 text-uppercase mt-2">
        	<?php

	          	// show post date	
				echo '<span class="posted-on">' . esc_html( get_the_date() ) . '</span>';
				
				// show author
				?>
				<span class="byline">
					<?php esc_html_e('Written by ', 'lifestyle-blog-lite'); ?>
						<?php echo esc_html( get_the_author() ); ?>
				</span>		
      	</div>

        <?php
    }

endif;

/**
 * lifestyle_blog_entry_meta
 */

if ( !function_exists( 'lifestyle_blog_entry_meta_widget' ) ) :

    /**
     * Category list
     *
     * @return array();
     */
    function lifestyle_blog_entry_meta_widget() {
        ?>
        <div class="entry-meta meta_1 float-left font-x-small text-uppercase">
          	<span class="post_on"><?php echo esc_html( get_the_date() ); ?></span>
      	</div>

        <?php
    }

endif;
