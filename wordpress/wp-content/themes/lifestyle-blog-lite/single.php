<?php
/**
 * The template for displaying all single posts.
 * @package Lifestyle_Blog_Lite
 */
 
get_header(); ?>

<div id="primary" class="content-area container">	
	<div class="row">
		<main id="main" class="site-main single1 clearfix"  itemprop="mainContentOfPage">
			<div class="row">
				<?php                         

				// Single with a right sidebar column
					echo '<div class="col-md-8">';   
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'single' );									
						if ( comments_open() || get_comments_number() ) {
						comments_template();
						}
					endwhile;
					echo '</div><div class="col-md-4">';
						get_sidebar( 'right' );
					echo '</div>';					
					
				?>		

			</div>	
		</main>
	</div>
	</div>

<?php 
get_footer();
