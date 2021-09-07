<?php
/**
 * For the header sidebar
 * @package Lifestyle_Blog_Lite
 */

if (   ! is_active_sidebar( 'header'  )	)
		return;
	// If we get this far, we have widgets. Let do this.
?>

<aside class="widget-area"><?php dynamic_sidebar( 'header' ); ?></aside>



