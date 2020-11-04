(function($) {
  "use strict";


    var WPB_FP_Portfolio_Widget_Handler = function($scope, $){

        /**
         * Portfolio selected category ( Select Filter )
         */

        var wpb_portfolio_area        = $scope.find('.wpb_portfolio_area');
        var wpb_fp_filter_select_area = $scope.find('.wpb_fp_filter_select_area');
        
        wpb_portfolio_area.on('click','.wpb_fp_filter_select ul li', function(){
          $(this).parents('.wpb_fp_filter_select').find('.wpb-fp-portfolio-select-sort span').html($(this).html());
        });

        wpb_fp_filter_select_area.hover(function () {
          $(this).find(".wpb_fp_filter_select").slideToggle(200);
        });


        /**
         * Mixitup trigger
        */

        if(typeof mixitup != 'undefined'){
          var wpb_portfolio_area_mixitup = $scope.find('.wpb_portfolio_area_mixitup');
          wpb_portfolio_area_mixitup.each(function(){

            var wpb_portfolio  = $(this);

            var mix_id  = $(this).find( '.wpb_portfolio' );

            var mix_id = mixitup(wpb_portfolio, {
                    controls: {
                        scope: 'local',
                    }
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
          var wpb_portfolio_area_isotope        = $scope.find('.wpb_portfolio_area_isotope');

          wpb_portfolio_area_isotope.each( function( i, gridContainer ) {
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

        /* Fix isotop layout */
        $(window).on('load',function (){
          setTimeout(function () {
            if( $('.wpb_portfolio').css('height') == '0px' ){
              $(this).css('height', 'unset');
            }
          }, 1000);
        });


        /**
         * Ajax Quick View
         */
        var wpb_portfolio_quick_view = $scope.find('.wpb_portfolio_quickview_image_content');

        if ( $.isFunction($.fn.magnificPopup) ) {
          wpb_portfolio_quick_view.delegate(".wpb_fp_preview", "click", function (e) {

            /* add loader  */
            $(this).closest('.wpb-fp-loader-wrapper').after('<div class="wpb-fp-loading dark"><i></i><i></i><i></i><i></i></div>');

            var post_id = $(this).attr('data-post-id');
            var lightbox_effect = $(this).attr('data-effect');
            var data = { action: 'wpb_fp_quickview', portfolio: post_id};
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
                        var t     = $(this),
                        speed     = t.data("speed") ? t.data("speed") : '600',
                        rtl       = t.data("rtl") ? !0 : !1,
                        auto      = t.data("auto") ? !0 : !1;
                            
                        $(this).lightSlider({
                          gallery: true,
                          auto: auto,
                          speed: speed,
                          item: 1,
                          loop: true,
                          slideMargin: 0,
                          thumbItem: 9,
                          keyPress: true,
                          rtl: rtl,
                        });
                    });
                  }

                  /* remove loader  */
                  $('.wpb-fp-loading').remove();
               });

            e.preventDefault();
          });
        }

        /**
         * Ajax Load More Button
         */

        var wpb_portfolio_area = $('.elementor-editor-active').find($scope).find('.wpb_portfolio_area');

        wpb_portfolio_area.each(function() {

          var content_area_this = $(this);
          var content_area = $(this).find('.wpb_portfolio');

          $(this).find('.wpb-fp-loadmore-btn').on( 'click', function(){

            var button        = $(this),
              button_text     = button.text(),
              button_loading  = button.data('loading'),
              column_class    = button.data('column_class'),
              query_args      = button.data('query'),
              shortcode_atts  = button.data('atts'),
              maxPages        = parseInt( button.data( 'max-pages' ) );

            $.ajax({
              url: wpb_fp_ajax_loadmore.ajax_url,
              type: 'post',
              data: {
                action         : 'wpb_fp_loadmore',
                page           : wpb_fp_ajax_loadmore.current_page,
                query_args     : query_args,
                shortcode_atts : shortcode_atts,
                column_class   : column_class,
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

        /**
         * Magnifig Popup Gallery
         */

        var wpb_portfolio_quickview_image_only = $scope.find('.wpb_portfolio_quickview_image_only');
        
        if ( $.isFunction($.fn.magnificPopup) ) {
          wpb_portfolio_quickview_image_only.each(function() {
              $(this).magnificPopup({
                  delegate: '.wpb_fp_image_lightbox',
                  type: 'image',
                  gallery: {
                    enabled:true
                  }
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


        /**
         * Portfolio Slider
         */
        
        var wpb_portfolio_area        = $scope.find('.wpb_fp_slider');

        wpb_portfolio_area.each(function() {

          var t = $(this),
                auto      = t.data("autoplay") ? !0 : !1,
                rtl       = t.data("direction") ? !0 : !1,
                items       = t.data("items") ? parseInt(t.data("items")) : '',
                tablet      = t.data("tablet") ? parseInt(t.data("tablet")) : '',
                mobile      = t.data("mobile") ? parseInt(t.data("mobile")) : '',
                margin      = t.data("margin") ? parseInt(t.data("margin")) : '',
                nav       = t.data("navigation") ? !0 : !1,
                pag       = t.data("pagination") ? !0 : !1,
                loop      = t.data("loop") ? !0 : !1,
                navTextLeft   = t.data("direction") ? 'right' : 'left',
                navTextRight  = t.data("direction") ? 'left' : 'right';

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
        
    };

    var WPB_FP_Portfolio_Gallery = function($scope, $){

      var $_wpb_fp_gallery_slider = $scope.find(".wpb_fp_el_gallery_slider");

      /* Init lightSlider on Single Portfolio */
      if ( $.isFunction($.fn.lightSlider) ) {
        $_wpb_fp_gallery_slider.each(function() {
            var t     = $(this),
            speed     = t.data("speed") ? t.data("speed") : '600',
            auto      = t.data("auto") ? !0 : !1,
            rtl       = t.data("rtl") ? !0 : !1;
                
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
    }

        
    //Elementor JS Hooks
    $(window).on('elementor/frontend/init', function () {
      elementorFrontend.hooks.addAction('frontend/element_ready/wpb_filterable_portfolio.default', WPB_FP_Portfolio_Widget_Handler);
      //elementorFrontend.hooks.addAction('frontend/element_ready/wpb_filterable_portfolio_gallery.default', WPB_FP_Portfolio_Gallery);
    });

}(jQuery));