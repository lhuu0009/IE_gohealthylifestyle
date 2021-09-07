<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div id="primary" class="content-area container">

<?php get_sidebar( 'breadcrumbs' ); ?>
<?php get_sidebar( 'content-top' ); ?>

<div class="row">
	<div class="col-md-12">
		<main id="main" class="site-main blog1"  itemprop="mainContentOfPage">
			<?php get_template_part( 'template-parts/blog1');	?>			
		</main>
	</div>
	</div>	
	
	<?php get_sidebar( 'content-bottom' ); ?>
	
</div>
<?php get_footer(); ?>