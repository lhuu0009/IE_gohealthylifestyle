<?php
/**
 * Home Right sidebar column. 
 * @package Lifestyle_Blog_Lite
 */


if ( ! is_active_sidebar( 'home_intro_post'  ) )
	return;
	
	dynamic_sidebar( 'home_intro_post' );		
