<?php 
/**
 * Register theme sidebars
 * @package Lifestyle_Blog_Lite
 */

 
function lifestyle_blog_widgets_init() {

	register_sidebar( array(
		'name' => esc_html__( 'Home Intro Post Section', 'lifestyle-blog-lite' ),
		'id' => 'home_intro_post',
		'description' => esc_html__( 'homepage intro post', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Home Middle Section', 'lifestyle-blog-lite' ),
		'id' => 'home_middle_section',
		'description' => esc_html__( 'homepage middle section', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


	register_sidebar( array(
		'name' => esc_html__( 'Home Right Sidebar', 'lifestyle-blog-lite' ),
		'id' => 'homeright',
		'description' => esc_html__( 'Right sidebar for the homepage', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => esc_html__( 'Blog Right Sidebar', 'lifestyle-blog-lite' ),
		'id' => 'blogright',
		'description' => esc_html__( 'Right sidebar for the blog', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => esc_html__( 'Page Right Sidebar', 'lifestyle-blog-lite' ),
		'id' => 'pageright',
		'description' => esc_html__( 'Right sidebar for pages', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );	

	
	
	register_sidebar( array(
		'name' => esc_html__( 'Header', 'lifestyle-blog-lite' ),
		'id' => 'header',
		'description' => esc_html__( 'This is a header right sidebar content', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<div class="widget-title">',
		'after_title' => '</div>',
	) );
		
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 1', 'lifestyle-blog-lite' ),
		'id' => 'bottom1',
		'description' => esc_html__( 'Bottom 1 position', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 2', 'lifestyle-blog-lite' ),
		'id' => 'bottom2',
		'description' => esc_html__( 'Bottom 2 position', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 3', 'lifestyle-blog-lite' ),
		'id' => 'bottom3',
		'description' => esc_html__( 'Bottom 3 position', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	register_sidebar( array(
		'name' => esc_html__( 'Bottom 4', 'lifestyle-blog-lite' ),
		'id' => 'bottom4',
		'description' => esc_html__( 'Bottom 4 position', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );	

	register_sidebar( array(
		'name' => esc_html__( 'Footer', 'lifestyle-blog-lite' ),
		'id' => 'footer',
		'description' => esc_html__( 'This is a sidebar position that sits above the footer menu and copyright', 'lifestyle-blog-lite' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="widget-title">',
		'after_title' => '</h5>',
	) );
	
}
add_action( 'widgets_init', 'lifestyle_blog_widgets_init' );

/**
 * Count the number of widgets to enable resizable widgets
 * in the bottom group.
 */

function lifestyle_blog_bottom() {
	$count = 0;
	if ( is_active_sidebar( 'bottom1' ) )
		$count++;
	if ( is_active_sidebar( 'bottom2' ) )
		$count++;
	if ( is_active_sidebar( 'bottom3' ) )
		$count++;		
	if ( is_active_sidebar( 'bottom4' ) )
		$count++;
	$class = '';
	switch ( $count ) {
		case '1':
			$class = 'col-md-12';
			break;
		case '2':
			$class = 'col-md-6';
			break;
		case '3':
			$class = 'col-md-4';
			break;
		case '4':
			$class = 'col-sm-6 col-md-3';
			break;
	}
	if ( $class )
		echo 'class="' . esc_attr($class) . '"';
}
