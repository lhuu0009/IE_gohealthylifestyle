<?php
/**
 * Home Middle section column. 
 * @package Lifestyle_Blog_Lite
 */


if ( ! is_active_sidebar( 'home_middle_section'  ) )
	return;
	
	dynamic_sidebar( 'home_middle_section' );		
