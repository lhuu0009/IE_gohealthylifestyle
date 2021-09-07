<?php
/**
 * Home Right sidebar column. 
 * @package Lifestyle_Blog_Lite
 */


if ( ! is_active_sidebar( 'homeright'  ) )
	return;
	
	echo '<aside id="right-sidebar right-sidebar-home" class="right-sidebar widget-area">';
	dynamic_sidebar( 'homeright' );	
	echo '</aside>';	
?>