<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lifestyle_Blog_Lite
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

				
	<div class="no-date"></div>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title" itemprop="headline">', '</h1>' ); ?>
		<?php // show sticky featured tag	
		if( is_sticky() && is_single() )  :	
			?>
			<div class="featured-post">
				<?php esc_html_e('Featured', 'lifestyle-blog-lite' );?>		
			</div>
			<?php
		endif; ?>			
							
		<div class="entry-meta">
			<?php lifestyle_blog_post_info(); ?>
		</div>
					
	</header><!-- .entry-header -->

	<?php the_post_thumbnail( 'post-thumbnail', array( 'itemprop' => "image")); ?>
		 
	<div class="entry-content" itemprop="text">
		<?php the_content(); ?>
		<?php	lifestyle_blog_multipage_nav();	?>
	</div><!-- .entry-content -->
			

	<footer class="entry-footer" itemscope itemtype="http://schema.org/WPFooter">		
		<?php 
			// get the post footer info
			lifestyle_blog_entry_footer(); 
		?>			
	</footer>	
	
	<?php	
		// show the author bio
		if ( is_single() && get_the_author_meta( 'description' ) ) :
			get_template_part( 'author-bio' );
		endif;
	?>	
		
	<?php	
		// get the post next and previous post navigation			
		lifestyle_blog_post_pagination();	
	?>
	
</article><!-- #post-## -->