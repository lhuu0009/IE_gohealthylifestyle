<?php
/**
 * Template part for displaying posts.
 * @package Lifestyle_Blog_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-aos="fade-up">		

	<header class="entry-header">
		<?php // Check for featured image
		if ( has_post_thumbnail() ) {        
			echo '<a class="featured-image-link" href="' . esc_url( get_permalink() ) . '" aria-hidden="true">';
				the_post_thumbnail( 'post-thumbnail');
			echo '</a>';
		}
		?>	
		<div class="no-date"></div>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
		<?php // show sticky featured tag	
		if( is_sticky() && is_home())  :	
			?>
			<div class="featured-post">
				<?php esc_html_e('Featured','lifestyle-blog-lite'); ?>
			</div>
			<?php
		endif; ?>
		<div class="category_wrap">
            <?php the_category(); ?>
        </div>		
		<?php lifestyle_blog_entry_meta(); ?>
	</header>
	
	<div class="entry-content">
		<?php the_excerpt();?>	
	</div>
</article>	