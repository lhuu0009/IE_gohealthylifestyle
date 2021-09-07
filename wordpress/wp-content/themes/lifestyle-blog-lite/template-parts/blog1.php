<?php
 /**
 * Top featured image with right sidebar
 *
 * @package Lifestyle_Blog_Lite
 *
 */
 ?>
 

<div class="row">
	<div class="col-md-8 the_stickey_class">
		<?php
		if ( have_posts() ) :
			if ( is_home() && ! is_front_page() ) : ?>
				<header>
					<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
				</header>
			<?php elseif (is_archive()): ?>
				<header class="page-header">
					<?php
						the_archive_title( '<h1 class="page-title">', '</h1>' );
						the_archive_description( '<div class="category-description">', '</div>' );
					?>
				</header>			
			<?php	endif; ?>

			<div class="blog_wrap_ajax">
				<?php 	/* Start the Loop */
				while ( have_posts() ) : the_post();		
					get_template_part( 'template-parts/content', 'blog1' );
				endwhile; 
				?>
			</div>
			<div class="paginate_blog_wrap">
				<?php 
					echo paginate_links();
				?>
			</div>
			<?php
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif; ?>
		
	</div>

	<div class="col-md-4 the_stickey_class">        
		<?php get_sidebar( 'right' ); ?>       
	</div>

</div>