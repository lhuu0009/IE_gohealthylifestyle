<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Lifestyle_Blog_Lite
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<div class="form-group">
		<span class="screen-reader-text"><?php _x( 'Search for:', 'Screen reader text', 'lifestyle-blog-lite' ); ?></span>
			
	    <input type="text" class="form-control" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" placeholder="<?php _x( 'Enter search words', 'Search field placeholder','lifestyle-blog-lite' ) ; ?>">
	        
		<button class="search-button" type="submit"><span class="fa fa-search"></span></button>
			
	</div>
</form> 
<?php
