<?php
/**
 * Template Name: Right Column
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div class="container">

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md-12">
	
			<div class="row">
			
				<div class="col-md-8 the_stickey_class" itemprop="mainContentOfPage">
					
					<?php 
					while ( have_posts() ) : the_post();
						get_template_part( 'template-parts/content', 'page' );

						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					endwhile; 
					?>
					
				</div>

				<div class="col-md-4 the_stickey_class">        
					<?php get_sidebar( 'right' ); ?>       
				</div>
			
			</div>
			
		</main>
	</div>
	
</div>

<?php 
get_footer();
