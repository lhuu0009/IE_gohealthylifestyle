/* Go back to the top of the page
 * Special thanks to the Sydney WordPress theme for this awesome function.
 */
	
/*
* Toggles Search Field on and off
*
*/
jQuery(document).ready(function($){

		AOS.init({
			once: true,
		});

		// trigger the effect on scroll 

		
		$(".search-toggle").click(function() {
			$("#search-container").slideToggle('slow', function(){
			$(".search-toggle").toggleClass('active');
			});
		});

		// intro slider
		
		$(".lifestyle_blog_intro_post_layout_one").lightSlider({
			adaptiveHeight:true,
			item:2,
			slideMargin:0,
			pager: false,
			slideMargin:20,
			easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
		      speed:600,
		        responsive : [
		        		{
								breakpoint:768,
								settings: {
										item:1,
										slideMove:1,
										slideMargin:6,
									}
		          		},
						]
		}); 

		// intro slider

		$('.post-slider-wrap').lightSlider({
			item:1,
			loop:false,
			slideMove:1,
			pager: true,
			controls: false,
		  });

		var backTop = function() {
			$(window).scroll(function() {
				if ( $(this).scrollTop() > 800 ) {
					$('.back-to-top').addClass('show');
				} else {
					$('.back-to-top').removeClass('show');
				}
			}); 

			$('.back-to-top').on('click', function() {
				$("html, body").animate({ scrollTop: 0 }, 1000);
				return false;
			});
		};
		
		// Dom Ready
		$(function() {
			backTop();		
		});

});
