<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div class="container">

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md-12">
		
		<?php get_sidebar( 'inset-top' ); ?>

			<?php while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; ?>
			
		</main><!-- #main -->
	</div><!-- #primary -->
	
</div>

<?php 
get_footer();
