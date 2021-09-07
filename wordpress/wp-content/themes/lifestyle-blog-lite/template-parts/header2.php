<?php
/**
 * Template for displaying Header style 2
 * @package Lifestyle_Blog_Lite
 */

 ?>
<header id="masthead" class="site-header header2" role="banner">	
	<div class="top-header-section">
		<div id="site-branding" class="flex-item">		
		
			<?php if ( get_custom_logo() ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div><!-- .site-logo -->
			<?php } 

			if ( get_bloginfo( 'name' ) ) { ?>
				<div id="site-title">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
				</div>
			<?php } ?>
		</div><!-- .site-branding -->

		<div id="header-sidebar">
			<?php get_sidebar( 'header' ); ?>
		</div>
	</div>
	
	<div class="lifestyle_nav_wrap">
		<div class="container-fluid header2">
			<div class="row">
				<div class="col-lg-8">	

					<nav id="site-navigation" class="main-navigation"  aria-label="<?php esc_attr_e( 'Primary Menu', 'lifestyle-blog-lite' ); ?>">
						<button id="menu-toggle" class="menu-toggle">
							<?php esc_html_e( 'Menu', 'lifestyle-blog-lite' ); ?>		
						</button>
						<div id="site-header-menu" class="site-header-menu">
						<?php
							wp_nav_menu( array(
								'theme_location' => 'primary',
								'menu_class'     => 'primary-menu',
								'fallback_cb' => 'lifestyle_blog_primary_navigation_fallback',
								) );
						?>
						</div>
					</nav>	

				</div>
				<div class="col-lg-4">		
					<nav id="social-navigation" class="social-navigation">
					<?php if ( has_nav_menu( 'social' ) ) :
							wp_nav_menu( array(
								'theme_location' => 'social', 
								'depth' => 1, 
								'container' => false, 
								'menu_class' => 'social-icons', 
							) );						
						endif; ?>
					</nav>
				</div>
			</div>
		</div>
	</div>
</header>
<?php
