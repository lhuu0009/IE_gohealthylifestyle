<?php
/**
 * Bottom sidebar. 
 * @package Lifestyle_Blog_Lite
 */

if (   ! is_active_sidebar( 'bottom1'  )
	&& ! is_active_sidebar( 'bottom2' )
	&& ! is_active_sidebar( 'bottom3'  )
	&& ! is_active_sidebar( 'bottom4'  )				
	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<div class="container">
       
	<aside id="bottom-sidebars" class="widget-area clearfix row">		   
		<?php if ( is_active_sidebar( 'bottom1' ) ) : ?>
			<div id="bottom1" <?php lifestyle_blog_bottom(); ?>>
				<?php dynamic_sidebar( 'bottom1' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'bottom2' ) ) : ?>      
			<div id="bottom2" <?php lifestyle_blog_bottom(); ?>>
				<?php dynamic_sidebar( 'bottom2' ); ?>
			</div>         
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'bottom3' ) ) : ?>        
			<div id="bottom3" <?php lifestyle_blog_bottom(); ?>>
				<?php dynamic_sidebar( 'bottom3' ); ?>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'bottom4' ) ) : ?>     
			<div id="bottom4" <?php lifestyle_blog_bottom(); ?>>
				<?php dynamic_sidebar( 'bottom4' ); ?>
			</div>
		<?php endif; ?>
	</aside>         

</div>    