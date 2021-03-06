<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div id="primary" class="content-area container">

	<div class="row">
		<div class="col-md-12">
			<main id="main" class="site-main blog1"  itemprop="mainContentOfPage">
				<?php get_template_part( 'template-parts/blog1');	?>			
			</main>
		</div>
	</div>
	
</div>

<?php get_footer(); ?>