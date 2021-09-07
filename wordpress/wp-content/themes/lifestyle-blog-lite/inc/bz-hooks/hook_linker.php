<?php
/**
 * Include needed hooks
 */

// general hook
require get_template_directory() . '/inc/bz-hooks/general_hooks.php';

// intro post hook
require get_template_directory() . '/inc/bz-hooks/intro_post_hook.php';
add_action('lifestyle_blog_intro_post', 'lifestyle_blog_intro_post_fnc');


// Post Module 1
require get_template_directory() . '/inc/bz-hooks/post_module_1_hook.php';
add_action('lifestyle_post_module_1', 'lifestyle_post_module_1_fnc');
