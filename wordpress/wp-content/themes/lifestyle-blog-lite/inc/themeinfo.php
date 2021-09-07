<?php
/**
 * Theme information page
 * @package Lifestyle_Blog_Lite
 */

//Add the theme page
add_action('admin_menu', 'lifestyle_blog_add_theme_info');
function lifestyle_blog_add_theme_info(){
	$theme_info = add_theme_page( esc_html__('Lifestyle Blog Theme Info','lifestyle-blog-lite'), esc_html__('Lifestyle Blog Info','lifestyle-blog-lite'), 'manage_options', 'lifestyle-blog-info.php', 'lifestyle_blog_info_page' );
    add_action( 'load-' . $theme_info, 'lifestyle_blog_info_hook_styles' );
}

//Callback
function lifestyle_blog_info_page() {
?>
	<div class="info-container">
		<h2 class="info-title"><?php esc_html_e('Lifestyle Blog Info','lifestyle-blog-lite'); ?></h2>
		<div class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
        	<p class="info-text"><a href="<?php echo esc_url('https://blazethemes.com/documentation/lifestyle-blog/');?>" target="_blank"><?php esc_html_e('Setup Tutorials (Documentation)','lifestyle-blog-lite'); ?></a></p></div>
          <div class="info-block"><div class="dashicons dashicons-book-alt info-icon"></div>
        	<p class="info-text"><a href="<?php echo esc_url('https://blazethemes.com/documentation/lifestyle-blog-pro/');?>" target="_blank"><?php esc_html_e('Setup Tutorials Pro version (Documentation)','lifestyle-blog-lite'); ?></a></p></div>     
        <div class="info-block"><div class="dashicons dashicons-desktop info-icon"></div>
        	<p class="info-text"><a href="<?php echo esc_url('https://demo.blazethemes.com/lifestyle-blog'); ?>" target="_blank"><?php esc_html_e('Theme demo','lifestyle-blog-lite'); ?></a></p></div> 

        <div class="info-block"><div class="dashicons dashicons-embed-video info-icon"></div>
        	<p class="info-text"><a href="<?php echo esc_url('https://blazethemes.com/theme/lifestyle-blog-pro/');?>" target="_blank"><?php esc_html_e('Get Pro Version','lifestyle-blog-lite'); ?></a></p></div>      
		<div class="info-block"><div class="dashicons dashicons-laptop info-icon"></div>
        	<p class="info-text"><a href="<?php echo esc_url('https://demo.blazethemes.com/lifestyle-blog-pro/'); ?>" target="_blank"><?php esc_html_e('Pro Theme demo','lifestyle-blog-lite'); ?></a></p></div>       
	</div>
<?php
}

//Styles
function lifestyle_blog_info_hook_styles(){
   	add_action( 'admin_enqueue_scripts', 'lifestyle_blog_info_page_styles' );
}
function lifestyle_blog_info_page_styles() {
	wp_enqueue_style( 'lifestyle_blog-info-style', get_template_directory_uri() . '/css/infopage.css', array(), true );
}