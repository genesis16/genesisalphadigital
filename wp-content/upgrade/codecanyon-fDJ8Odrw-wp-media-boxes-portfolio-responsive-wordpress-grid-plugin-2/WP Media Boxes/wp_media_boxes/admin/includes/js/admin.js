    
/* ======================================================= 
 *
 *  	Media Boxes Admin
 *  	Version: 1.0
 *  	By castlecode
 *
 *  	Contact: http://codecanyon.net/user/castlecode
 *  	Created: July 20, 2014
 *
 *  	Copyright (c) 2013, castlecode. All rights reserved.
 *  	Available only in http://codecanyon.net/
 *      
 * ======================================================= */

(function($){
	$( document ).ready(function() {	

	/* ====================================================================== *
      		SLIDER
 	 * ====================================================================== */

 		$( '.slider' ).each(function(){
 			var $this = $(this);
 			var input = $this.siblings('input');

 			$this.slider({
				value: input.val(),
				min: $this.data('min'),
				max: $this.data('max'),
				step: 1,
				range: "min",
				slide: function( event, ui ) {
					input.val( ui.value );
				},
			});

			input.keyup(function() {
			    $this.slider( "value", input.val() );
			});

 		});	

	/* ====================================================================== *
	      	SHORTCODE FUNCTIONALITY
	 * ====================================================================== */

 		$('.shortcode_id').on('keyup', function(){
			$this = $(this);

			$('.shortcode').val( '[media_boxes id="'+$this.val()+'"]' );
		});

 		$('.shortcode_id').trigger('keyup');	

 	/* ====================================================================== *
	      	CLEAR POST CATEGORIES
	 * ====================================================================== */

 		$('body').on('click', '.clear_all_post_categories', function(e){
 			e.preventDefault();

 			$(this).siblings('.checkbox_post_categories').find('input[type="checkbox"]').prop('checked', false);
 			updateAllPostCategoriesFromFilters();
 		})

 		$('body').on('click', '.select_all_post_categories', function(e){
 			e.preventDefault();

 			$(this).siblings('.checkbox_post_categories').find('input[type="checkbox"]').prop('checked', true);
 			updateAllPostCategoriesFromFilters();
 		})

	/* ====================================================================== *
      		ENABLE RESOLUTIONS
 	 * ====================================================================== */

		function enable_responsivity(){
			if($('*[name="enable_responsivity"]').is(':checked')){
				$('.all_resolutions').fadeIn(300);
			}else{
				$('.all_resolutions').fadeOut(300);
			}
		}
		enable_responsivity();

		$('*[name="enable_responsivity"]').on('click', function(){
			enable_responsivity();
		});

	/* ====================================================================== *
      		ENABLE SPACING FOR DIFFERENT RESOLUTIONS
 	 * ====================================================================== */

		function enable_spacing(){
			if($('*[name="enable_spacing"]').is(':checked')){
				$('.spacing_for_resolutions').fadeIn(300);
			}else{
				$('.spacing_for_resolutions').fadeOut(300);
			}
		}
		enable_spacing();

		$('*[name="enable_spacing"]').on('click', function(){
			enable_spacing();
		});

	/* ====================================================================== *
      		SHOW LOAD MORE BUTTON SOURCE CODE
 	 * ====================================================================== */

		$('.show_load_more_button_css').on('click', function(e){
			e.preventDefault();

			$(this).siblings('.load_more_button_css').fadeToggle();
		});

	/* ====================================================================== *
      		SHOW / HIDE THE POST CATEGORIES ACCORDING TO THE POST TYPE
 	 * ====================================================================== */

 		function changePostType(postType, isHuman){
 			$('.post_categories').hide().insertAfter( $('.media_boxes_options_form') ); // move them outside so they are not visible for the JS later on

 			$('.post_categories').filter('.post-category-'+postType).show().prependTo( $('.query-options') ); // only put back the correct one

 			if( isHuman ){
 				updateAllPostCategoriesFromFilters();
 			}
 		}

	/* ====================================================================== *
      		FILTERS
 	 * ====================================================================== */

 		$('.filter_group_container').on('click', '.remove_filter', function(e){
 			e.preventDefault();

 			if(confirm("Are you sure? this action can't be undone")){
 				$(this).parents('.filter_group').remove();

 				// Remove it from the layout GUI
				remove_sortable_ui_item( $(this).parents('.filter_group').find('.filterId').val() );

 			}
 		});

 		$('.add_new_filter').on('click', function(e){
 			e.preventDefault();

 			/* GET THE MAX FILTER_ID + 1 */
 			var filterId = 0;
 			$('.filter_group_container').find('.filter_group').each(function(){
 				
 				var current_filter_id = parseInt( $(this).find('.filterId').val() );
 				if(current_filter_id > filterId){
 					filterId = current_filter_id;
 				}

 			});
 			filterId++;

 			var newFilter = $(''+
	 			'<div class="filter_group">'+
					'<input class="filterId" type="hidden" name="filters[filter_'+filterId+'][filter_id]" value="'+filterId+'">'+
					'<div class="filter_title">Filter Group '+filterId+' <a class="remove_filter" href="#"><i class="fa fa-times"></i></a></div>'+
					'<div class="filter_option">'+
						'<label for="">"All" word</label>'+
						'<input type="text" name="filters[filter_'+filterId+'][filter_all_word]" title="The All word in the filter" value="All" />'+
					'</div>'+
					'<div class="filter_option">'+
						'<label for="">Layout</label>'+
						'<select name="filters[filter_'+filterId+'][filter_layout]" title="The layout of the filter">'+
							'<option value="inline">In Line</option>'+
							'<option value="dropdown">Dropdown</option>'+
							'<option value="checkboxes">Checkboxes</option>'+
						'</select>'+
					'</div>'+
					'<div class="filter_option">'+
						'<label for="">Default selected filter item</label>'+
						'<select class="selected_item" name="filters[filter_'+filterId+'][filter_selected_item]" title="The selected filter item by default"></select>'+
					'</div>'+
					'<div class="filter_option">'+
						'<label for="">Available filter items</label>'+
						'<div class="sort_filter_items"></div>'+
					'</div>'+
					'<div class="filter_group_view_shortcode">'+
						'<span class="fa fa-code"></span>&nbsp; View Shortcode'+
					'</div>'+
				'</div>');

 			$('.filter_group_container').append( newFilter );
 			updateAllPostCategoriesFromFilters();

 			newFilter.find('.sort_filter_items').sortable().disableSelection();

 			// Add it to the layout GUI
 			add_new_sortable_ui_item(filterId)
 		});

    	function getPostCategories(){
    		var postCategories	= [];

    		if($('.post-types').val() == 'custom-media-gallery'){
    			$('.custom-gallery-category').each(function(){
        			var $this 			= $(this);
        			postCategories.push( { "id" : $this.attr('data-categoryid'), "name" : $this.attr('data-category') } );
        		});
    		}else{
    			$('.media_boxes_options_form').find('.checkbox_post_category input[type="checkbox"]:checked').each(function(){
					var $this = $(this);
	 				postCategories.push( { "id" : $this.val(), "name" : $this.parents('.checkbox_post_category').text() } );
	 			});
    		}
			
 			return postCategories;
    	}

    	function addRemoveCategoriesOptions(container){
    		var post_categories 	= getPostCategories();

    		post_categories.unshift({ "id" : "*", "name" : "All" });

    		/* ## CHECK WHICH FILTERS SHOULDN'T BE THERE AND ERASE THEM ## */

    		container.find('select.selected_item option').each(function(){
    			var $this 		= $(this);
    			var filter_id 	= $this.val();

    			var found 		= post_categories.filter(function(obj){ return obj.id+"" === filter_id+""; })[0];

    			if(found === undefined){
    				$this.remove();
    			}
    		});

    		/* ## CHECK WHICH FILTERS ARE MISSING AND ADD THEM ## */

    		post_categories.forEach(function(row){
    			var filter_id 	= row.id;
    			var filter_name = row.name;

    			if(container.find('select.selected_item').find('option[value="'+filter_id+'"]')[0] === undefined){
    				var new_filter 	= 	'<option value="'+filter_id+'"> '+filter_name+' </option>';

    				container.find('select.selected_item').append(new_filter);
    			}
    		});

    	}

    	function addRemoveCategoriesItems(filtergroup_id, container){
    		var post_categories 	= getPostCategories();

    		/* ## CHECK WHICH FILTERS SHOULDN'T BE THERE AND ERASE THEM ## */

    		container.find('.filter_item').each(function(){
    			var $this 		= $(this);
    			var filter_id 	= $this.find('.filterItemId').val();

    			var found 		= post_categories.filter(function(obj){ return obj.id+"" === filter_id+""; })[0];

    			if(found === undefined){
    				$this.remove();
    			}
    		});

    		/* ## CHECK WHICH FILTERS ARE MISSING AND ADD THEM ## */

    		post_categories.forEach(function(row){
    			var filter_id 	= row.id;
    			var filter_name = row.name;

    			if(container.find('.filter_item').find('input.filterItemId[value="'+filter_id+'"]')[0] === undefined){
    				var new_filter 	= 	'<div class="filter_item"> '+
											'<input class="filterItemId" checked="checked" type="checkbox" name="filters[filter_'+filtergroup_id+'][filter_items][]" value="'+filter_id+'" /> '+ 
											filter_name+
											
											'<div class="filter_visible_only_when">'+
												'<span class="fa fa-eye"></span>'+
												'<input '+
													'class="filterItemVisibilityGroupId" '+
													'type="hidden" '+
													'name="filters[filter_'+filtergroup_id+'][filter_items_visibility]['+filter_id+'][filter_group]" '+
													'value="always_visible" '+
												'/> '+ 
												'<input '+
													'class="filterItemVisibilityItemId" '+
													'type="hidden" '+
													'name="filters[filter_'+filtergroup_id+'][filter_items_visibility]['+filter_id+'][filter_item]" '+
													'value="" '+ 
												'/> '+
											'</div> '+
										'</div>';

    				container.find('.sort_filter_items').append(new_filter);
    			}
    		});

    	}

 		function updateAllPostCategoriesFromFilters(){
 			$('.filter_group_container').find('.filter_group').each(function(){
 				var $this 			= $(this);
 				var filtergroup_id 	= $this.find('.filterId').val();

 				//$this.find('.selected_item').html( getCategoriesOptions() );
 				//$this.find('.sort_filter_items').html( getCategoriesItems(filterId) ).sortable().disableSelection();

 				addRemoveCategoriesOptions($this);
 				addRemoveCategoriesItems(filtergroup_id, $this);
 			});
 		}

 		$('.media_boxes_options_form').on('click', '.checkbox_post_category input[type="checkbox"]', function(){
 			updateAllPostCategoriesFromFilters();
 		});

 		/* SORT THE FILTER ITEMS */

 		$('.sort_filter_items').sortable().disableSelection();

 	/* ====================================================================== *
      		SHOW FILTER GROUP SHORTCODE
 	 * ====================================================================== */

 	 	// init dialog/popup

        var filter_group_shortcode_popup = $('.filter_group_shortcode_popup').dialog({
            autoOpen: false,
            //height: 300,
            width: 400,
            modal: true,
            draggable:false,
            resizable:false,
            title: "Filter Group Shortcode",
        });

        // open init dialog/popup

        $('body').on('click', '.filter_group_view_shortcode', function(){
        	var id_portfolio 	= $('.shortcode_id').val();
        	var id_filter 		= $(this).parents('.filter_group').find('.filterId').val();

        	$('.filter_group_shortcode').val('[media_boxes id="'+id_portfolio+'" id_filter="filter_'+id_filter+'"]');

        	if (document.activeElement) { document.activeElement.blur(); }
        	filter_group_shortcode_popup.dialog( 'open' );
        })

        // close/ok dialog/popup

        $('body').on('click', '.filter_group_shortcode_popup_ok', function(){
            filter_group_shortcode_popup.dialog( 'close' );
        });	

 	/* ====================================================================== *
      		FILTER VISIBLE ONLY WHEN
 	 * ====================================================================== */        

 	 	// init dialog/popup

        var filter_visible_only_when_popup = $('.filter_visible_only_when_popup').dialog({
            autoOpen: false,
            //height: 300,
            width: 400,
            modal: true,
            draggable:false,
            resizable:false,
            title: "Filter item visibility",
        });

        // open init dialog/popup

        var current_visibility_filtergroup_id 	= '';
        var current_visibility_filter_id 		= '';

 	 	$('body').on('click', '.filter_visible_only_when', function(){
 	 		var $this 							= $(this);
 	 		current_visibility_filtergroup_id 	= $this.parents('.filter_group').find('.filterId').val();
 	 		current_visibility_filter_id 		= $this.parents('.filter_item').find('.filterItemId').val();

 	 		create_filter_groups_select();
 	 		create_filter_items_select();
 	 		set_defaults($this);

 	 		if (document.activeElement) { document.activeElement.blur(); }
 	 		filter_visible_only_when_popup.dialog( 'open' );
 	 	})

 	 	function create_filter_groups_select(){
 	 		var new_options 	= '<option value="always_visible">Always Visible</option>';

 	 		$('.filter_group_container .filter_group').each(function(){
 	 			var $this 				= $(this);
 	 			var filtergroup_id 		= $this.find('input.filterId').val();
 	 			var filtergroup_name 	= $this.find('.filter_title').text();
 	 			
 	 			new_options 	+= '<option value="'+filtergroup_id+'">'+filtergroup_name+'</option>';
 	 		});

 	 		$('select.visible_only_when_filter_groups').html(new_options);
 	 	}

 	 	$('select.visible_only_when_filter_groups').on('change', function(){
			create_filter_items_select(); 	 		
 	 	})

 	 	function create_filter_items_select(){
 	 		var select 			= $('select.visible_only_when_filter_items');
 	 		var new_options 	= '';
 	 		var filtergroup_id 	= $('select.visible_only_when_filter_groups').val();

 	 		if(filtergroup_id == 'always_visible'){
 	 			select.hide();
 	 		}else{
 	 			var filtergroup_div = $('.filter_group_container').find('.filterId[value="'+filtergroup_id+'"]').parents('.filter_group');

 	 			filtergroup_div.find('.filter_item').each(function(){
	 				var $this 			= $(this);
	 				var filteritem_id 	= $this.find('input[type="checkbox"]').val();
	 				var filteritem_name = $this.text();

	 				if($this.find('input[type="checkbox"]').is(':checked')){
						new_options 	+= '<option value="'+filteritem_id+'">'+filteritem_name+'</option>';
	 				}
	 			});

	 			select.show();
 	 		}

 	 		select.html(new_options);
 	 	}

 	 	function set_defaults(element){
 	 		/* filter group */

 	 		var group_id 	= element.find('.filterItemVisibilityGroupId').val();
 	 		if( $('select.visible_only_when_filter_groups option[value="'+group_id+'"]')[0] == undefined ){
 	 			group_id 	= 'always_visible';
 	 		}
 	 		$('select.visible_only_when_filter_groups').val( group_id ).trigger('change');

 	 		/* Filter item */

 	 		var item_id 	= element.find('.filterItemVisibilityItemId').val();
 	 		if( $('select.visible_only_when_filter_items option[value="'+item_id+'"]')[0] == undefined ){
 	 			item_id 	= '';

 	 			$('select.visible_only_when_filter_groups').val( 'always_visible' ).trigger('change');
 	 		}
 	 		$('select.visible_only_when_filter_items').val( item_id );
 	 	}

 	 	// close/ok dialog/popup

 	 	$('body').on('click', '.filter_visible_only_when_popup_ok', function(){
 	 		var filtergroup_div = $('.filter_group_container').find('.filterId[value="'+current_visibility_filtergroup_id+'"]').parents('.filter_group');
 	 		var filteritem_div 	= filtergroup_div.find('.filterItemId[value="'+current_visibility_filter_id+'"]').parents('.filter_item');

 	 		filteritem_div.find('.filterItemVisibilityGroupId').val( $('select.visible_only_when_filter_groups').val() );
 	 		filteritem_div.find('.filterItemVisibilityItemId').val( $('select.visible_only_when_filter_items').val() );

            filter_visible_only_when_popup.dialog( 'close' );
        });	

	/* ====================================================================== *
      		SHOW / HIDE CUSTOM GALLERY 
 	 * ====================================================================== */

		$('.post-types').on('change', function(e, isHuman){
			var $this = $(this);
			
			if($this.val() == 'custom-media-gallery'){
				$('.custom-media-gallery').show();
				$('.query-options').hide();
			}else{
				$('.custom-media-gallery').hide();
				$('.query-options').show();
			}

			if(isHuman === undefined){
				isHuman = true;
			}
			changePostType($this.val(), isHuman);
		});

		$('.post-types').trigger('change', [false]);

	/* ====================================================================== *
      		CUSTOM GALLERY (ADD-EDIT-REMOVE THE CATEGORIES)
 	 * ====================================================================== */

 	 	$('body').on('click', '.custom-gallery-new-category', function(){
 	 		var category 		= $(this).siblings('input').val();
 	 		var index 			= 1;

 	 		if(category == ''){ 
 	 			$(this).siblings('input').focus()
 	 			return;
 	 		}

 	 		// Get max index
 	 		$('.custom-gallery-category').each(function(){
 	 			var current_index = parseFloat( $(this).attr('data-categoryid') );
 	 			if(current_index > index){
 	 				index = current_index;
 	 			}
 	 		});

 	 		index++;

 	 		// New category
 	 		var new_category 	= 	'<div class="custom-gallery-category" data-categoryid="'+index+'" data-category="'+category+'">'+
										'<span class="fa fa-trash"></span>&nbsp; <span class="fa fa-pencil"></span>&nbsp; <span class="category_name">'+category+'</span>'+
									'</div>';

 	 		$('.custom-gallery-categories').append(new_category);

 	 		$(this).siblings('input').val('').focus();

 	 		custom_gallery_update_json();
 	 		updateAllPostCategoriesFromFilters();
 	 	})

 	 	// REMOVE CATEGORY

 	 	$('body').on('click', '.custom-gallery-category .fa-trash', function(){
 	 		var $this 		= $(this)
 	 		var category_id = $this.parents('.custom-gallery-category').attr('data-categoryid');

 	 		$('.custom-gallery-item-category[data-categoryid="'+category_id+'"]').remove();
 	 		$this.parents('.custom-gallery-category').remove();

 	 		custom_gallery_update_json();
 	 		updateAllPostCategoriesFromFilters();
 	 	});

 	 	// EDIT CATEGORY

 	 	var custom_gallery_edit_category_popup = $('.custom-gallery-edit-category-popup').dialog({
            autoOpen: false,
            //height: 300,
            width: 400,
            modal: true,
            draggable:false,
            resizable:false,
            title: "Edit Category",
        });

 	 	var current_category_id = '';

 	 	$('body').on('click', '.custom-gallery-category .fa-pencil', function(){
 	 		var $this 			= $(this);
 	 		var category 		= $this.parents('.custom-gallery-category').attr('data-category');
 	 		current_category_id = $this.parents('.custom-gallery-category').attr('data-categoryid');

 	 		$('.custom-gallery-edit-category-popup').find('input').val(category);

 	 		if (document.activeElement) { document.activeElement.blur(); }
 	 		custom_gallery_edit_category_popup.dialog( 'open' );
 	 	});

 	 	 $('body').on('click', '.custom-gallery-edit-category-save', function(){
 	 	 	var category = $('.custom-gallery-edit-category-popup').find('input').val();
        	
        	$('.custom-gallery-category').each(function(){
        		var $this = $(this);
        		if($this.attr('data-categoryid') == current_category_id){
        			$this.attr('data-category', category);
        			$this.find('.category_name').text(category);
        		}
        	});
            
            custom_gallery_update_json();
            updateAllPostCategoriesFromFilters();
            custom_gallery_edit_category_popup.dialog( 'close' );
        });

 	/* ====================================================================== *
      		CUSTOM GALLERY (THE LITTLE-GRID OF ITEMS WHICH ARE SORTABLES)
 	 * ====================================================================== */

 	 	var $gallery 		= $('.custom-gallery-container');
		
		$gallery.sortable({
			distance: 1,
			item: 'custom-gallery-item',
			opacity:0.8,
			placeholder: 'custom-gallery-item-placeholder',
			scrollSensitivity: 100,
			update: function( event, ui ) {
				custom_gallery_update_json();
			}
		});	

    	function check_if_custom_gallery_is_empty(){
    		var items = $gallery.find('.custom-gallery-item:not(.custom-gallery-empty):visible');

    		if( items.length > 0 ){
    			$('.custom-gallery-empty').hide();
    		}else{
    			$('.custom-gallery-empty').show();
    		}
    	}

		$('.custom-add-button').on('click', function(e){
			e.preventDefault();
			open_wp_gallery_new();		
		});

		$gallery.on('click', '.custom-gallery-empty', function(){
			open_wp_gallery_new();	
		});
		
		$('.custom-remove-all-button').on('click', function(){
			$gallery.find('.custom-gallery-item:not(.custom-gallery-empty)').remove();
			check_if_custom_gallery_is_empty();
		});

		// Item buttons

		$('body').on('click', '.custom-gallery-item-edit', function(e){
			e.preventDefault();
			
			open_wp_gallery_edit( $(this).parents('.custom-gallery-item').data('imgid') );	
		});

		$('body').on('click', '.custom-gallery-item-add-category', function(){
			open_categories_of_item( $(this).parents('.custom-gallery-item') );
		});

		$('body').on('click', '.custom-gallery-item-remove', function(){
			$(this).parents('.custom-gallery-item').remove();
			custom_gallery_update_json();
			check_if_custom_gallery_is_empty();
		});

	/* ====================================================================== *
      		CUSTOM GALLERY (OPEN THE WP GALLERY AND ADD-EDIT AN IMAGE)
 	 * ====================================================================== */

		function add_new_custom_gallery_item(img_id, img_src){
    		var newImage = '<div class="custom-gallery-item" data-imgid="'+img_id+'">'+
								'<div class="custom-gallery-item-categories"></div>'+

								'<img src="'+img_src+'">'+

								'<div class="custom-gallery-item-buttons">'+
									'<div class="custom-gallery-item-edit"><span class="fa fa-pencil"></span></div>'+
									'<div class="custom-gallery-item-add-category"><span class="fa fa-filter"></span></div>'+
									'<div class="custom-gallery-item-remove"><span class="fa fa-trash"></span></div>'+
								'</div>	'
							'</div>';

			if($gallery.find('.custom-gallery-item[data-imgid="'+img_id+'"]')[0] === undefined){
				$gallery.append(newImage);
			}
    	}

    	function open_wp_gallery_new(){
    		/* New media uploader wp3.5+ */
			if(typeof wp != 'undefined' && wp != undefined){
				 if( typeof file_frame != 'undefined' ){
        			file_frame.close();
    			}

				// create and open new file frame
				var file_frame = wp.media({
					title: 'Select an Image',
					library: {
						type: 'image'
					},
					button: {
						//Button text
						text: 'Add Images'
					},
					multiple: true,
				});
				
				//callback for selected image
				file_frame.on('select', function() {
					var selected 	= [];
					var selection 	= file_frame.state().get('selection');
					
					selection.map(function(file) {
						selected.push(file.toJSON());
					});

					for (var index in selected) {
						var current 	= selected[index];
						var image 		= current.sizes.thumbnail != undefined ? current.sizes.thumbnail.url : current.url;
						var id 			= current.id;

						add_new_custom_gallery_item(id, image);
					}		

					check_if_custom_gallery_is_empty();
					custom_gallery_update_json();

					$gallery.sortable({
						item: 'custom-gallery-item',
						opacity: 0.8,
						placeholder: 'custom-gallery-item-placeholder',
						scrollSensitivity: 100,
					});	
				});
				
				file_frame.open();
			
			}
    	}

    	function open_wp_gallery_edit(media_id){
    		/* New media uploader wp3.5+ */
			if(typeof wp != 'undefined' && wp != undefined){
				 if( typeof file_frame != 'undefined' ){
        			file_frame.close();
    			}

				// create and open new file frame
				var file_frame = wp.media({
					title: 'Edit an Image',
					library: {
						type: 'image'
					},
					button: {
						//Button text
						text: 'OK'
					},
					multiple: false,
				});

				//when open the gallery
				file_frame.on('open',function() {
				  	var selection 	= file_frame.state().get('selection');
				  	var attachment 	= wp.media.attachment(media_id);

				  	attachment.fetch();
				  	selection.add( attachment ? [ attachment ] : [] );
				});
				
				file_frame.open();
			
			}
    	}

	/* ====================================================================== *
      		CUSTOM GALLERY (ITEM CATEGORIES)
 	 * ====================================================================== */

 	 	// init dialog/popup

        var gallery_item_categories_popup = $('.gallery-item-categories-popup').dialog({
            autoOpen: false,
            //height: 300,
            width: 600,
            modal: true,
            draggable:false,
            resizable:false,
            title: "Add categories to image",
        });

        // open init dialog/popup

        var current_item   	= '';

        function open_categories_of_item(item){
        	// All categories
        	var all_categories 	= '';
        	$('.custom-gallery-category').each(function(){
        		var $this 			= $(this);
        		var checked 		= item.find('.custom-gallery-item-category[data-categoryid="'+$this.attr('data-categoryid')+'"]')[0] !== undefined;
        		var checked_html 	= checked ? 'checked="checked"' : '';

        		all_categories 	+=  '<div class="gallery-item-category-container">'+
        								'<div class="gallery-item-category" data-id="'+$this.attr('data-categoryid')+'">'+
        									'<input type="checkbox" '+checked_html+' /> '+$this.attr('data-category')+
        								'</div>'+
        							'</div>';
        	});

        	$('.gallery-item-categories').html(all_categories);

        	// Open popup
            current_item 	= item;

            if (document.activeElement) { document.activeElement.blur(); }
            gallery_item_categories_popup.dialog( 'open' );
        }

        // save dialog/popup

        $('body').on('click', '.gallery-item-categories-save', function(){

        	var new_categories = '';
        	$('.gallery-item-category').each(function(){
        		var $this = $(this);

        		if($this.find('input[type="checkbox"]').is(':checked')){
        			new_categories += 	'<span class="custom-gallery-item-category" data-categoryid="'+$this.data('id')+'"></span>';
        		}
        	});

        	current_item.find('.custom-gallery-item-categories').html(new_categories);

        	custom_gallery_update_json();
            
            gallery_item_categories_popup.dialog( 'close' );
        });

    /* ====================================================================== *
      		CUSTOM GALLERY (UPDATE JSON)
 	 * ====================================================================== */

 	 	function custom_gallery_update_json(){
 	 		var textarea 		= $('.custom_media_gallery');
 	 		var json 			= {};

 	 		// ITEMS

 	 		var items 			= [];
 	 		$('.custom-gallery-container').find('.custom-gallery-item').each(function(){
 	 			var $this 		= $(this);

 	 			if($this.attr('data-imgid') == undefined) return;

 	 			var categories 	= [];
 	 			$this.find('.custom-gallery-item-category').each(function(){
 	 				categories.push( $(this).attr('data-categoryid') );
 	 			});

 	 			var new_obj 	= { 
 	 				id 			: $this.attr('data-imgid'), 
 	 				categories 	: categories,
 	 			};

 	 			items.push(new_obj)
 	 		});

 	 		// CATEGORIES

 	 		var categories 			= [];
 	 		$('.custom-gallery-categories').find('.custom-gallery-category').each(function(){
 	 			var $this 		= $(this);

 	 			var new_obj 	= { 
 	 				id 			: $this.attr('data-categoryid'), 
 	 				category 	: $this.attr('data-category'),
 	 			};

 	 			categories.push(new_obj)
 	 		});

 	 		textarea.val(JSON.stringify({ items : items, categories : categories }));
 	 	}

	/* ====================================================================== *
      		LAYOUT OF FILTER-SEARCH-SORT
 	 * ====================================================================== */	

 	 	/* Add item, when a new filter is added */

 	 	function add_new_sortable_ui_item(filter_id){
 	 		var new_item = 	'<div class="layout_sortable_ui_item" data-id="filter_'+filter_id+'">'+
								'<i class="fa fa-filter"></i>&nbsp; Filter Group '+filter_id+
								'<input type="hidden" value="filter_'+filter_id+'">'+
							'</div>';

 	 		$('.available_items.layout_sortable_ui').append(new_item);
 			$('.layout_sortable_ui').sortable( "refresh" );
 	 	}

 	 	/* Remove item, when a filter gets deleted */

 	 	function remove_sortable_ui_item(filter_id){
 	 		$('.layout_sortable_ui').find('.layout_sortable_ui_item').filter('[data-id="filter_'+filter_id+'"]').remove();
 			$('.layout_sortable_ui').sortable( "refresh" );
 	 	}

 	 	/* The place holder is the "DROP ZONE 1" & "DROP ZONE 2" text  */

 	 	function show_hide_placeholder(){ 
 	 		$('.layout_sortable_ui').each(function(){
 	 			var sortable_ui 	= $(this); 
		        var sortable_span 	= sortable_ui.find('.drop_zone_placeholder');

		        if( sortable_ui.find('.layout_sortable_ui_item')[0] === undefined ){
		        	sortable_span.fadeIn(300);
		        }else{
		        	sortable_span.hide();
		        }
 	 		});
 	 	}
 	 	show_hide_placeholder();

 	 	/* Add the "dropzone id" to the hidden input (Depending if it goes to dropzone 1 or 2) and remove it when the items go back to the "Available Items" section */

 	 	function refresh_input_name(){
 	 		$('.layout_sortable_ui').each(function(){
 	 			var sortable_ui 		= $(this); 
 	 			var sortable_ui_dz_id 	= sortable_ui.attr('data-drop_zone_id');
		        var sortable_ui_item 	= sortable_ui.find('.layout_sortable_ui_item');
		        var inputs 				= sortable_ui_item.find('input[type="hidden"]');
		        
		        if(sortable_ui_dz_id === undefined){
		        	inputs.removeAttr('name');
		        }else{
		        	inputs.attr('name', sortable_ui_dz_id+'[]');
		        }
 	 		});
 	 	}
 	 	refresh_input_name();

 	 	/* Init sortable */

 	 	$('.layout_sortable_ui').sortable({
            connectWith: '.layout_sortable_ui',
            items : '.layout_sortable_ui_item',
            stop : function(event, ui) {
             	show_hide_placeholder();
             	refresh_input_name();
			},
        }).disableSelection();	

 	/* ====================================================================== *
      		DROP-ZONE CONFIG DIALOG (POPUP/MODAL)
 	 * ====================================================================== */	 	
 	/*

		// I was going to add a dialog (popup) for adding some paddings and margins for the drop-zones (but better add it in the "extra-CSS" section )

        $( '.drop_zone_1_config, .drop_zone_2_config' ).dialog({
	    	autoOpen: false,
	      	//height: 500,
	      	width: 750,
	      	modal: true,
	      	draggable:true,
			resizable:true,
	      	title: "Drop zone style",
    	}).parent().appendTo($(".media_boxes_options_form"));

    	// open dialog

    	$('.configure_drop_zone').on('click', function(){
    		var $this 			= $(this);
    		var drop_zone_id 	= $(this).attr('data-open');
    		

    		$(drop_zone_id).dialog( 'open' );
    	});

    	// close when saving

    	$('.drop_zone_1_config, .drop_zone_2_config').on('click', '.button-primary', function(){
    		var $this 			= $(this);
    		var drop_zone_id 	= $this.attr('data-close');
    		
    		$(drop_zone_id).dialog( 'close' );
    	});

    	<div class="drop_zone_1_config">

			<h4>Margins</h4>

			<div class="grid">
				<div class="col-50p">
					<label>Margin top</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>

				<div class="col-50p">
					<label>Margin bottom</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>
			</div>

			<div class="grid">
				<div class="col-50p">
					<label>Margin left</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>

				<div class="col-50p">
					<label>Margin right</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>
			</div>

			<br>

			<h4>Paddings</h4>

			<div class="grid">
				<div class="col-50p">
					<label>Margin top</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>

				<div class="col-50p">
					<label>Margin bottom</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>
			</div>

			<div class="grid">
				<div class="col-50p">
					<label>Margin left</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>

				<div class="col-50p">
					<label>Margin right</label>
					<input name="drop_zone_1_margin-top" type="text" value="<?php echo $form_sort_by_text; ?>"  />
					px		
				</div>
			</div>

			<div class="form-controls">
				<button class="button-primary green" data-close=".drop_zone_1_config"><span class="fa fa-check"></span> &nbsp;Save</button>
			</div>

		</div>
	*/

	});
})(jQuery);