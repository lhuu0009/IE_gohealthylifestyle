<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lifestyle_Blog_Lite
 */

?>

	</div><!-- #content -->
	
<div id="bottom-wrapper">
<?php get_sidebar( 'bottom' ); ?>
</div>

<a class="back-to-top"><span class="fa fa-angle-up"></span></a>
	
	<footer id="site-footer" role="contentinfo">

		<div class="container">
			<div class="row">
				<div class="col-md-12">
				<?php get_sidebar( 'footer' ); ?>

					<nav id="footer-menu">
					<?php if ( has_nav_menu( 'footer' ) ) {
						 wp_nav_menu( array( 
								'theme_location' => 'footer', 
								'fallback_cb' => false, 
								'depth' => 1,
								'container' => false, 
							) ); 
						}
					?>
					</nav>
							
					<div id="copyright" class="site-info">		
						<?php
						/* translators: %s: CMS name, i.e. WordPress. */
						printf( esc_html__( 'Proudly powered by %s', 'lifestyle-blog-lite' ), 'WordPress' );
						?>
					</a>
					<span class="sep"> | </span>
						<?php
						/* translators: 1: Theme name, 2: Theme author. */
						printf( esc_html__( 'Theme: %1$s by %2$s.', 'lifestyle-blog-lite' ), 'Lifestyle Blog Lite', '<a href="https://blazethemes.com">BlazeThemes</a>' );
						?>
					</div><!-- .site-info -->

				</div>
			</div>
		</div>	
	</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
