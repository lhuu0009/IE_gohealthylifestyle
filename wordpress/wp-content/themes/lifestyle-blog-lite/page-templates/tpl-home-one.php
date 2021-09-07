<?php
/**
 * Template Name: HomePage One
 *
 * @package Lifestyle_Blog_Lite
 */

get_header(); ?>

<div class="container-fluid">

  <div id="primary" class="content-area row">
    <main id="main" class="site-main col-md-12" itemprop="mainContentOfPage">

      <?php 
        get_sidebar('home-intro-post');
      ?>  

      <div class="row">
        <div class="col-md-8 the_stickey_class">
            <?php  get_sidebar('home-middle'); ?> 
        </div>
        <div class="col-md-4 mt-3 the_stickey_class">
            <?php get_sidebar( 'home' ); ?>
        </div>
      </div>

        
    </main>
  </div>	
	
</div>

<?php 
get_footer();
