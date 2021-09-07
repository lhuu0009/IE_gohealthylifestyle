<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div class="container">
	<div id="primary" class="content-area row">
		<main id="main" class="site-main col-md-12">

			<section id="not-found">
				<header id="page-header">
					<div>
						<span id="error-title"><?php esc_html_e( 'Error', 'lifestyle-blog-lite' ); ?></span>
						<span id="error-code"><?php esc_html_e( '404', 'lifestyle-blog-lite' ); ?></span>
					</div>
				</header>
				<h1 id="error-subtitle"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'lifestyle-blog-lite' ); ?></h1>
				<div class="page-content">
					<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'lifestyle-blog-lite' ); ?></p>
					<?php get_search_form(); ?>
				</div>		
			</section>

		</main>
	</div>
</div>
	
<?php
get_footer();
