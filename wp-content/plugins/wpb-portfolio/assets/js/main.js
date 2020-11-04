(function($) {
  "use strict";

	//portfolio selected category
	$('.wpb_portfolio_area').on('click','.wpb_fp_filter_select ul li', function(){
		$(this).parents('.wpb_fp_filter_select').find('.wpb-fp-portfolio-select-sort span').html($(this).html());
	});

	//portfolio sort
	$(".wpb_fp_filter_select_area").hover(function () {
	    $(this).find(".wpb_fp_filter_select").slideToggle(100);
	});


	/**
	 * Mixitup trigger
	 */
		
	if(typeof mixitup != 'undefined'){
		$(".wpb_portfolio_area_mixitup").each(function(){

			var wpb_portfolio  = $(this);

			var mix_id  = $(this).find( '.wpb_portfolio' );

			var mix_id = mixitup(wpb_portfolio, {
	            controls: {
	                scope: 'local',
	            },
	        });

	        wpb_portfolio.find('.wpb-fp-loadmore-btn').on( 'click', function(){
	        	mix_id.destroy();
	        });
		});
	}


	/**
	 * isotope trigger
	 */


	if ( $.isFunction($.fn.imagesLoaded) ) {
		// for each container
		$('.wpb_portfolio_area_isotope').each( function( i, gridContainer ) {
			var $gridContainer = $( gridContainer );

			// init isotope for container
			var $grid = $gridContainer.find('.wpb_portfolio').imagesLoaded( function() {
				$grid.isotope({
					itemSelector: '.wpb-fp-item',
				})
			});

			// initi filters for container
			$gridContainer.find('.wpb-fp-filter').on( 'click', '.filter', function() {
				var filterValue = $( this ).attr('data-filter');
				$grid.isotope({ 
					filter: filterValue 
				});
			});

			// initi filters for filter shortcode
			$('.wpb-portfolio-filter-shortcode').on( 'click', '.filter', function() {
				var filterValue = $( this ).attr('data-filter');
				$grid.isotope({ 
					filter: filterValue 
				});
			});


			var isActive = true;

			$gridContainer.find('.wpb-fp-loadmore-btn').on( 'click', function(){

				if ( isActive ) {
					$grid.isotope('destroy'); // destroy
				} else {
					$grid.isotope({
						itemSelector: '.wpb-fp-item',
					}); // re-initialize
				}

				// set flag
				isActive = !isActive;
			});

		});
	}
	

	/**
	 * Magnifig Popup Gallery
	 */

	$('.wpb_portfolio_quickview_image_only').each(function() {
	    $(this).magnificPopup({
	        delegate: '.wpb_fp_image_lightbox',
	        type: 'image',
	        gallery: {
	          enabled:true
	        }
	    });
	});

	/**
	 * Single portfolio gallery popup
	 */

	$('.wpb_fp_gallery_grid_single').each(function() {
	    $(this).magnificPopup({
	        delegate: 'li',
		    type: 'image',
		    gallery: {
			    enabled: true
			},
	    });
	});
	

	/**
	 * Ajax Quick View
	 */

	$(".wpb_fp_quickview_arrows_no.wpb_portfolio_quickview_image_content").delegate(".wpb_fp_preview", "click", function (e) {

		/* add loader  */
		$(this).closest('.wpb-fp-loader-wrapper').after('<div class="wpb-fp-loading dark"><i></i><i></i><i></i><i></i></div>');

		var post_id          = $(this).attr('data-post-id');
		var lightbox_effect  = $(this).attr('data-effect');
		var data             = { action: 'wpb_fp_quickview', portfolio: post_id };

		$.post(wpb_fp_ajax_name.ajax_url, data, function(response) {

			$.magnificPopup.open({
				mainClass: lightbox_effect,
				tLoading: '',
				type: 'ajax',
				gallery:{
					enabled: false,
				},
				delegate: 'a.wpb_fp_preview',
				items: {
					src: '<div class="white-popup mfp-with-anim wpb_fp_quick_view">'+response+'</div>',
					type: 'inline'
				}
			});

			/* Init lightSlider on quickview */
			if ( $.isFunction($.fn.lightSlider) ) {
				$(".wpb_fp_gallery_slider").each(function() {
				    var t 		= $(this),
				    speed 		= t.data("speed") ? t.data("speed") : '600',
				    rtl 		= t.data("rtl") ? !0 : !1,
				    auto 		= t.data("auto") ? !0 : !1;
				        
				    $(this).lightSlider({
						gallery: true,
						auto: auto,
						speed: speed,
						item: 1,
						loop: true,
						slideMargin: 0,
						thumbItem: 5,
						keyPress: true,
						rtl:rtl,
				    });
				});
			}

			/* remove loader  */
			$('.wpb-fp-loading').remove();
		});

		e.preventDefault();
	});


	/**
	 * Default QuickView with gallery 
	 */
	
	$('.wpb_fp_quickview_arrows_yes').magnificPopup({
		type:'inline',
		midClick: true,
		gallery:{
			enabled:true
		},
		delegate: '.wpb-fp-open-popup-link-gallery',
		removalDelay: 500, //delay removal by X to allow out-animation
		callbacks: {
		    beforeOpen: function() {
		       this.st.mainClass = this.st.el.attr('data-effect');
		    }
		},
	  	closeOnContentClick: false,
	});


	$(document).on('click','.wpb-fp-gallery-item',function(e) {
		var gallery_item 	= $(this);
		var gallery_parent  = gallery_item.closest('.wpb_fp_gallery_has_feature_image');
		var main_image      = gallery_parent.find('.wpb-fp-main-image img');
		var item_src 		= gallery_item.attr("data-mfp-src");

		main_image.attr('src', item_src);
	});


	/**
	 * Ajax Load More Button
	 */
	
	$('.wpb_portfolio_area').each(function() {

		var content_area_this = $(this);
		var content_area = $(this).find('.wpb_portfolio');

		$(this).find('.wpb-fp-loadmore-btn').on( 'click', function(){

	 		var button       	= $(this),
	 			button_text 	= button.text(),
	 			button_loading 	= button.data('loading'),
	 			column_class    = button.data('column_class'),
	 			query_args   	= button.data('query'),
	 			shortcode_atts  = button.data('atts'),
	 			previouspaged   = button.data('paged'),
	 			currentpaged    = parseInt( previouspaged )+ 1,
	 			maxPages   		= parseInt( button.data( 'max-pages' ) );

			$.ajax({
				url: wpb_fp_ajax_loadmore.ajax_url,
				type: 'post',
				data: {
					action			: 'wpb_fp_loadmore',
					page 			: wpb_fp_ajax_loadmore.current_page,
					query_args		: query_args,
					shortcode_atts	: shortcode_atts,
					column_class    : column_class,
				},
				beforeSend : function ( xhr ) {
					button.text(button_loading);
				},
				success: function( result ) {
					if( result ) {
						button.text( button_text );
						content_area.append( result );
						wpb_fp_ajax_loadmore.current_page++;

						// mixitup init again after loading new items
						var mix_id  = content_area;
						var mix_id  = mixitup(content_area_this, {
				            controls: {
				                scope: 'local',
				            }
				        });

						if ( wpb_fp_ajax_loadmore.current_page == maxPages ) {
							button.remove();
						} else {
							button.attr( 'data-paged', wpb_fp_ajax_loadmore.current_page );
						}
						
					}else{
						button.remove();
					}
				}
			});
		});
	});

	/* Init lightSlider on Single Portfolio */
	if ( $.isFunction($.fn.lightSlider) ) {
		$(".wpb_fp_gallery_slider_single, .wpb-fp-single-gallery-shortcode .wpb_fp_gallery_slider").each(function() {
		    var t 		= $(this),
		    speed 		= t.data("speed") ? t.data("speed") : '600',
		    auto 		= t.data("auto") ? !0 : !1,
		    rtl 		= t.data("rtl") ? !0 : !1;
		        
		    $(this).lightSlider({
				gallery: true,
				auto: auto,
				speed: speed,
				item: 1,
				loop: true,
				slideMargin: 0,
				thumbItem: 5,
				keyPress: true,
				rtl:rtl,
		    });
		});
	}


	/**
	 * Add active Class
	 */
	
	$('.wpb-fp-filter-isotope').each( function( i, buttonGroup ) {
		var $buttonGroup = $( buttonGroup );
		$buttonGroup.on( 'click', 'li', function() {
			$buttonGroup.find('.active').removeClass('active');
			$( this ).addClass('active');
		});
	});



	$('.wpb_portfolio_area').each( function() {

		var $this   = $(this);
		var $button = $this.find( '.wpb-fp-menu-toggle' );

		$button.on( 'click', function() {
			$this.find('.wpb-fp-filter').toggleClass('wpb-fp-filter-active');
		});
	});


	// Portfolio slider

	$(function(){
		$(".wpb_fp_slider").each(function() {

			var t = $(this),
		        auto 			= t.data("autoplay") ? !0 : !1,
		        rtl 			= t.data("direction") ? !0 : !1,
		        items 			= t.data("items") ? parseInt(t.data("items")) : '',
		        tablet 			= t.data("tablet") ? parseInt(t.data("tablet")) : '',
		        mobile 			= t.data("mobile") ? parseInt(t.data("mobile")) : '',
		        margin 			= t.data("margin") ? parseInt(t.data("margin")) : '',
		        nav 			= t.data("navigation") ? !0 : !1,
		        pag 			= t.data("pagination") ? !0 : !1,
		        loop 			= t.data("loop") ? !0 : !1,
		        navTextLeft 	= t.data("direction") ? 'right' : 'left',
		        navTextRight 	= t.data("direction") ? 'left' : 'right';

			$(this).owlCarousel({
				nav: nav,
            	navText : ['<i class="wpbfpicons-'+navTextLeft+'" aria-hidden="true"></i>','<i class="wpbfpicons-'+navTextRight+'" aria-hidden="true"></i>'],
				dots: pag,
            	loop: loop,
            	margin: margin,
				autoplay: auto,
				autoHeight: true,
				rtl: rtl,
				items : items,
				responsiveClass:true,
				responsive:{
			        0:{
			            items:mobile,
			        },
			        600:{
			            items:tablet,
			        },
			        1000:{
			            items:items,
			        }
			    }
			});
		});
	});
	
}(jQuery));