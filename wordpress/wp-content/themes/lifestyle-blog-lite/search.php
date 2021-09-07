<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div id="search-template" class="container">

	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md-12">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php printf( esc_html__( 'Search Results for: %s', 'lifestyle-blog-lite' ), '<span>' . get_search_query() . '</span>' ); ?>		
				</h1>
			</header>

			<div id="search-template-form">
				<?php get_search_form(); ?>
			</div>
			
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			lifestyle_blog_multipage_nav();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main>
	</div>
</div>

<?php
get_footer();
