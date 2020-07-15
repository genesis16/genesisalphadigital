(function($) {
	$(document).ready(function() {

		// Custom select menus
		var x,i,j,selElmnt,a,b,c;for(x=document.getElementsByClassName("instant-ide-custom-select"),i=0;i<x.length;i++){for(selElmnt=x[i].getElementsByTagName("select")[0],(a=document.createElement("DIV")).setAttribute("class","select-selected"),a.innerHTML=selElmnt.options[selElmnt.selectedIndex].innerHTML,x[i].appendChild(a),(b=document.createElement("DIV")).setAttribute("class","select-items select-hide"),j=1;j<selElmnt.length;j++)(c=document.createElement("DIV")).innerHTML=selElmnt.options[j].innerHTML,c.optValue=selElmnt.options[j].value,c.setAttribute("data-option-value",c.optValue),c.addEventListener("click",function(e){var t,s,l,n,i;for(n=this.parentNode.parentNode.getElementsByTagName("select")[0],i=this.parentNode.previousSibling,s=0;s<n.length;s++)if(n.options[s].innerHTML==this.innerHTML){for(n.selectedIndex=s,i.innerHTML=this.innerHTML,t=this.parentNode.getElementsByClassName("same-as-selected"),l=0;l<t.length;l++)t[l].removeAttribute("class");this.setAttribute("class","same-as-selected");break}i.click()}),b.appendChild(c);x[i].appendChild(b),a.addEventListener("click",function(e){e.stopPropagation(),closeAllSelect(this),this.nextSibling.classList.toggle("select-hide"),this.classList.toggle("select-arrow-active")})}function closeAllSelect(e){var t,s,l,n=[];for(t=document.getElementsByClassName("select-items"),s=document.getElementsByClassName("select-selected"),l=0;l<s.length;l++)e==s[l]?n.push(l):s[l].classList.remove("select-arrow-active");for(l=0;l<t.length;l++)n.indexOf(l)&&t[l].classList.add("select-hide")}document.addEventListener("click",closeAllSelect);
		
		new ClipboardJS('.snippet-copy-button');
		
		if(window.self !== window.top) {
			$('body').append('<div id="instant-ide-inside-iframe-overlay"><a href="'+iide_url+'" target="_blank">Click Here To Access Instant IDE In A New Tab</a><div class="instant-ide-login-logo-container"><img width="200" height="200" style="margin:0 auto;display:block;" src="'+iide_url+'assets/css/images/instant-ide-login-logo.png"></div></div>');
		}
		
		$.ajaxSetup({
		    headers : {
		        'iide-ajax-token': $('meta[name="iide-ajax-token"]').attr('content')
		    }
		});

		// String replace, but for ALL instances instead of just the first.
		function instant_ide_replace(string, old_value, new_value) {
			return string.replace(new RegExp(old_value, 'g'), new_value);
		}

		instant_ide_save_state_restore();

		function instant_ide_save_state_restore() {
			$.ajax({
				type : 'POST',
				cache: false,
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_save_state_get'
				},
				success : function(response) {
					if(response) {
						$.each($.parseJSON(response), function(index, value) {
							localStorage.setItem(index, instant_ide_replace(value, '`', '"'));
						});
					}
				}
			});
		}

	setTimeout(function() {

		$('body').removeClass('instant-ide-loading');
		$('#instant-ide-file-editor-loading').hide();
		$('#instant-ide-file-editor-loaded').show();

		if(localStorage.getItem('iide_editor_layout_state') === null) {
			localStorage.setItem('iide_editor_layout_state', 'single');
		}
		if(localStorage.getItem('iide_site_preview_state') === null) {
			localStorage.setItem('iide_site_preview_state', 'closed');
		}
		if(localStorage.getItem('iide_site_preview_url') === null) {
			localStorage.setItem('iide_site_preview_url', iide_platform_url+'/');
		}
		if(localStorage.getItem('iide_console_state') === null) {
			localStorage.setItem('iide_console_state', 'closed');
		}
		if(localStorage.getItem('iide_find_window_dir_id') === null) {
			localStorage.setItem('iide_find_window_dir_id', '');
		}
		if(localStorage.getItem('iide_open_files') === null) {
			localStorage.setItem('iide_open_files', '');
		}
		if(localStorage.getItem('iide_active_tab_one_state') === null) {
			localStorage.setItem('iide_active_tab_one_state', '');
		}
		if(localStorage.getItem('iide_active_tab_two_state') === null) {
			localStorage.setItem('iide_active_tab_two_state', '');
		}
		if(localStorage.getItem('iide_file_dblclicked_state') === null) {
			localStorage.setItem('iide_file_dblclicked_state', '');
		}
		if(localStorage.getItem('iide_opened_dirs') === null) {
			localStorage.setItem('iide_opened_dirs', '');
		}
		if(localStorage.getItem('iide_open_dirs') === null) {
			localStorage.setItem('iide_open_dirs', '');
		}
		if(localStorage.getItem('iide_dirs_scroll_top') === null) {
			localStorage.setItem('iide_dirs_scroll_top', '');
		} else {
			$('#instant-ide-file-tree-container').data('dirs-scroll-top', localStorage.getItem('iide_dirs_scroll_top'));
		}
		if(localStorage.getItem('iide_selected_folder_id') === null) {
			localStorage.setItem('iide_selected_folder_id', '');
		} else {
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-folder-id', localStorage.getItem('iide_selected_folder_id'));
		}
		if(localStorage.getItem('iide_selected_file_parent_dir') === null) {
			localStorage.setItem('iide_selected_file_parent_dir', '');
		} else {
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-parent-dir', localStorage.getItem('iide_selected_file_parent_dir'));
		}
		if(localStorage.getItem('iide_selected_file') === null) {
			localStorage.setItem('iide_selected_file', localStorage.getItem('iide_selected_file'));
		} else {
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-file', localStorage.getItem('iide_selected_file'));
		}
		if(localStorage.getItem('iide_selected_file_dblclicked') === null) {
			localStorage.setItem('iide_selected_file_dblclicked', '');
		} else {
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-dblclicked', localStorage.getItem('iide_selected_file_dblclicked'));
		}		
		if(localStorage.getItem('iide_copy_file_folder_path') === null) {
			localStorage.setItem('iide_copy_file_folder_path', '');
		}
		if(localStorage.getItem('iide_copy_file_folder_action') === null) {
			localStorage.setItem('iide_copy_file_folder_action', '');
		}
		if(localStorage.getItem('iide_copy_file_folder_source') === null) {
			localStorage.setItem('iide_copy_file_folder_source', '');
		}
		localStorage.setItem('iide_active_editor', iide_active_editor);
		localStorage.setItem('iide_dev_path', iide_dev_path);
		
		if(iide_paths_li === '') {
		    if(localStorage.getItem('iide_paths_li') === null) {
		        localStorage.setItem('iide_paths_li', $('.sub-menu-paths').html());
		    } else if(localStorage.getItem('iide_paths_li') !== '') {
		        $('.sub-menu-paths').html(localStorage.getItem('iide_paths_li'));
		    }
		} else {
		    localStorage.setItem('iide_paths_li', iide_paths_li);
			$('.sub-menu-paths').html(iide_paths_li);
		}

		if(localStorage.getItem('iide_path_change_popup') === null || localStorage.getItem('iide_path_change_popup') === 'yes') {
			localStorage.setItem('iide_path_change_popup', 'confirm-reload');
		} else if(localStorage.getItem('iide_path_change_popup') === 'no') {
			localStorage.setItem('iide_path_change_popup', 'auto-reload');
		}
		if(localStorage.getItem('iide_save_state') === null || localStorage.getItem('iide_save_state') === 'yes' || localStorage.getItem('iide_save_state') === 'reset-state') {
			localStorage.setItem('iide_save_state', 'enabled');
		} else if(localStorage.getItem('iide_save_state') === 'no') {
			localStorage.setItem('iide_save_state', 'disabled');
		}
		if(localStorage.getItem('iide_save_state') === 'disabled') {
			// Hide all subfolders on page load.
			$('.instant-ide-file-tree').find('ul').slice(1).hide();
			$('.iideft-directory').find('.iideft-directory > i').replaceWith('<i class="fa fa-caret-right iideft-directory-icon" aria-hidden="true"></i>');
		} else {
			instant_ide_refresh_file_tree(first_refresh = true);
		}
		if(localStorage.getItem('iide_editor_tab_size') === null) {
			localStorage.setItem('iide_editor_tab_size', '4');
		}
		if(localStorage.getItem('iide_editor_font_size') === null) {
			localStorage.setItem('iide_editor_font_size', '14');
		}
		if(localStorage.getItem('iide_editor_font_family') === null) {
			localStorage.setItem('iide_editor_font_family', 'monospace');
		}
		if(localStorage.getItem('iide_theme') === null) {
			localStorage.setItem('iide_theme', 'dark');
		}
		if(localStorage.getItem('iide_ace_editor_kb_handler') === null) {
			localStorage.setItem('iide_ace_editor_kb_handler', 'ace');
		}
		if(localStorage.getItem('iide_monaco_editor_theme') === null) {
			localStorage.setItem('iide_monaco_editor_theme', 'tomorrow-night-iide');
		}
		if(localStorage.getItem('iide_ace_editor_theme') === null) {
			localStorage.setItem('iide_ace_editor_theme', 'tomorrow_night_eighties');
		}
		if(localStorage.getItem('iide_word_wrap') === null) {
			localStorage.setItem('iide_word_wrap', 'off');
		}
		if(localStorage.getItem('iide_show_hidden_files') === null) {
			localStorage.setItem('iide_show_hidden_files', 'false');
		} else if(localStorage.getItem('iide_show_hidden_files') === 'true') {
	    	$('body').addClass('instant-ide-file-tree-show-hidden');
	    }
	    if(localStorage.getItem('iide_splitter_tree_position') === null) {
	        var splitter_tree_position = '20%';
	    	localStorage.setItem('iide_splitter_tree_position', splitter_tree_position);
	    } else {
	        var splitter_tree_position = localStorage.getItem('iide_splitter_tree_position');
	    }
	    if(localStorage.getItem('iide_splitter_editor_position') === null) {
	        var splitter_editor_position = '50%';
	    	localStorage.setItem('iide_splitter_editor_position', splitter_editor_position);
	    } else {
	        var splitter_editor_position = localStorage.getItem('iide_splitter_editor_position');
	    }
	    if(localStorage.getItem('iide_splitter_console_position') === null) {
	        var splitter_console_position = '80%';
	    	localStorage.setItem('iide_splitter_console_position', splitter_console_position);
	    } else {
	        var splitter_console_position = localStorage.getItem('iide_splitter_console_position');
	    }

	    var image_ext_array = ['gif', 'jpg', 'jpeg', 'png', 'svg', 'swf', 'psd', 'bmp', 'tiff', 'ico'];
	    
	    if($('body').hasClass('instant-ide-monaco-editor-active')) {
	    	
			require.config({ paths: { 'vs': 'assets/js/vs/vs' }});
			
			function instant_ide_monaco_editor_build(textarea_id) {
				var textarea_id = textarea_id;
				require(['vs/editor/editor.main'], function() {
					var textarea = $('#'+textarea_id);
					var word_wrap = localStorage.getItem('iide_word_wrap');
					var mode = textarea.data('editor');
					textarea.css('display', 'none');
					var editor = monaco.editor.create(document.getElementById(textarea_id+'-container'), {
						value: [
							textarea.val()
						].join('\n'),
						wordWrap: word_wrap,
						language: mode,
						tabSize: localStorage.getItem('iide_editor_tab_size'),
						fontSize: localStorage.getItem('iide_editor_font_size'),
						fontFamily: 'inherit'
					});
					editor.onDidChangeModelContent(function(e) {
						textarea.val(editor.getValue());
						$('#'+textarea_id+'-container-tab.instant-ide-file-editor-tab-active .instant-ide-file-editor-tab-quit').addClass('file-changed');
					});
					if(localStorage.getItem('iide_monaco_editor_theme') == 'tomorrow-night-iide') {
						monaco.editor.defineTheme('tomorrow-night-iide', {
							base: 'vs-dark', // can also be vs-dark or hc-black
							inherit: true, // can also be false to completely replace the builtin rules
							rules: [
								{ token: 'comment', foreground: '888888' },
								{ token: 'variable', foreground: '6392c3' },
								{ token: 'variable.predefined.php', foreground: 'df7072' },
								{ token: 'string', foreground: '98ca98' },
								{ token: 'metatag', foreground: 'cccccc' },
								{ token: 'tag', foreground: 'ea7477' },
								{ token: 'keyword', foreground: 'c091c0' },
								{ token: 'attribute.name', foreground: 'ee7578' },
								{ token: 'attribute.name.css', foreground: 'fcca65' },
								{ token: 'attribute.value', foreground: '98ca98' },
								{ token: 'keyword.css', foreground: 'cccccc' },
								{ token: 'attribute.value.css', foreground: 'f69056' },
								{ token: 'attribute.value.number.css', foreground: 'f69056' },
								{ token: 'attribute.value.hex.css', foreground: 'f69056' },
								{ token: 'attribute.value.unit.css', foreground: 'bb8dbb' }
							]
						});
					}
					monaco.editor.setTheme(localStorage.getItem('iide_monaco_editor_theme'));
					new ResizeSensor($('#instant-ide-file-editor-container-one'), function() {
						editor.layout({ width: $('#instant-ide-file-editor-container-one').width(), height: $('#instant-ide-file-editor-container-one').height()});
					});
					$('.instant-ide-file-editor-tab').click(function() {
						var that = $(this);
						setTimeout(function() {
							var tab_id = that.attr('id');
							var line = parseInt($('#'+tab_id).attr('data-line-number'), 10);
							if(line !== -1 && editor._domElement.id === textarea_id+'-container') {
								editor.revealLineInCenter(line);
								editor.setPosition({column: 1, lineNumber: line});
							}
						}, 500);
						setTimeout(function() {
							editor.layout({ width: $('#instant-ide-file-editor-container-one').width(), height: $('#instant-ide-file-editor-container-one').height()});
						}, 100);
					});
				});
			}
			
	    } else {
	    	
			function instant_ide_ace_editor_build(textarea_id) {
				var textarea = $('#'+textarea_id);
				var word_wrap = localStorage.getItem('iide_word_wrap') == 'on' ? true : false;
				var mode = textarea.data('editor');
				var editDiv = $('<div>', {
					position: 'absolute',
					width: $('#instant-ide-file-editor-container-one').width(),
					height: $('#instant-ide-file-editor-container-one').height(),
					'id': textarea_id.substring(1)+'-ace',
					'class': textarea.attr('class')
				}).insertBefore(textarea);
				textarea.css('display', 'none');
				var editor = ace.edit(editDiv[0]);
				editor.renderer.setShowGutter(true);
				editor.setShowPrintMargin(false);
				editor.getSession().setValue(textarea.val());
				editor.getSession().setUseWrapMode(word_wrap);
				editor.getSession().setMode('ace/mode/'+mode);
				if(localStorage.getItem('iide_ace_editor_kb_handler') !== 'ace') {
					editor.setKeyboardHandler('ace/keyboard/'+localStorage.getItem('iide_ace_editor_kb_handler'));
				}
				editor.setTheme('ace/theme/'+localStorage.getItem('iide_ace_editor_theme'));
				editor.setOptions({
					useWorker: true,
					enableBasicAutocompletion: true,
					enableLiveAutocompletion: true,
					enableSnippets: true,
					tabSize: localStorage.getItem('iide_editor_tab_size'),
					useSoftTabs: true,
					fontSize: localStorage.getItem('iide_editor_font_size')+'px',
					fontFamily: 'inherit'
				});
				editor.container.style.lineHeight = '1.3';
				editor.focus();
				editor.getSession().on('change', function() {
					textarea.val(editor.getSession().getValue());
					$('#'+textarea_id+'-container-tab.instant-ide-file-editor-tab-active .instant-ide-file-editor-tab-quit').addClass('file-changed');
				});
				$(window).keydown(function(e) {
					if((e.ctrlKey || e.metaKey) && e.which == 70) {
						editor.focus();
						e.preventDefault();
						return false;
					}
				});
				new ResizeSensor($('#instant-ide-file-editor-container-one'), function() {
					$('.ace_editor').width($('#instant-ide-file-editor-container-one').width());
					$('.ace_content').width($('#instant-ide-file-editor-container-one').width());
					$('.ace_editor').height($('#instant-ide-file-editor-container-one').height());
					$('.ace_content').height($('#instant-ide-file-editor-container-one').height());
					editor.resize();
				});
				$('.instant-ide-file-editor-tab').click(function() {
					var that = $(this);
					setTimeout(function() {
						var tab_id = that.attr('id');
						var line = parseInt($('#'+tab_id).attr('data-line-number'), 10);
						if(line !== -1 && editor.container.id === tab_id.replace('container-tab', 'ace')) {
							editor.scrollToLine(line, true, true, function () {});
							editor.gotoLine(line, 0, true);
						}
					}, 500);
					setTimeout(function() {
						var tab_id = that.attr('id');
						if(editor.container.id === tab_id.replace('container-tab', 'ace')) {
							$('.ace_editor').width($('#instant-ide-file-editor-container-one').width());
							$('.ace_content').width($('#instant-ide-file-editor-container-one').width());
							$('.ace_editor').height($('#instant-ide-file-editor-container-one').height());
							$('.ace_content').height($('#instant-ide-file-editor-container-one').height());
							editor.resize();
						}
					}, 100);
				});
			}
			
	    }

		function instant_ide_error_message_popup(message) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				text: message,
				icon: 'error'
			})
		}
		
		function instant_ide_conditional_options_reset_message_popup(message_title, message) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: message_title,
				text: message,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
				focusCancel: true
			}).then((result) => {
				if (result.value) {
        	        localStorage.setItem('iide_path_change_popup', 'confirm-reset');
        	        localStorage.setItem('iide_save_state', 'enabled');
        	        localStorage.setItem('iide_editor_tab_size', '4');
        	        localStorage.setItem('iide_editor_font_size', '14');
        	        localStorage.setItem('iide_editor_font_family', 'monospace');
        	        localStorage.setItem('iide_theme', 'dark');
        	        localStorage.setItem('iide_monaco_editor_theme', 'tomorrow-night-iide');
        	        localStorage.setItem('iide_ace_editor_theme', 'tomorrow_night_eighties');
        	        localStorage.setItem('iide_active_editor', 'monaco');
    				$.ajax({
    					type : 'POST',
    					url : iide_url+'editor/file-editor-ajax.php',
    					data : {
    						action : 'instant_ide_active_editor_write',
    						active_editor : 'monaco'
    					},
    					success : function(response) {
    						if(response) {
                                Swal.fire({
            						onOpen: function() { instant_ide_stop_file_tree_interval(); },
            						onAfterClose: function() { instant_ide_start_file_tree_interval(); },
                                    text: 'Instant IDE Options Have Been Reset',
                                    icon: 'success'
                                })
                                .then((value) => {
            						Swal.fire({
            							onOpen: function() { instant_ide_stop_file_tree_interval(); },
            							onAfterClose: function() { instant_ide_start_file_tree_interval(); },
            							title: 'Reload To Finalize Changes!',
            							text: 'To finalize these changes you must reload Instant IDE. Would you like to do so now?',
            							icon: 'success',
            							showCancelButton: true,
            							confirmButtonText: 'Yes',
            							cancelButtonText: 'No'
            						}).then((result) => {
            							if (result.value) {
            								setTimeout(function() { window.location.reload(true); }, 2000);
            							}
            						})
                                })
    						}
    					}
    				});
				}
			})
		}
		
		function instant_ide_conditional_save_state_reset_message_popup(message_title, message) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: message_title,
				text: message,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
				focusCancel: true
			}).then((result) => {
				if (result.value) {
                    setTimeout(function() { window.location.reload(true); }, 2000);
				} else {
				    $('#instant-ide-file-editor-options-save-state .select-items').find('div[data-option-value="enabled"]').click();
				}
			})
		}
		
		function instant_ide_conditional_delete_message_popup(message_title, message, key, element, e) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: message_title,
				text: message,
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Yes',
				cancelButtonText: 'No',
				focusCancel: true
			}).then((result) => {
				if (result.value) {
					if(key == 'delete_file') {
						instant_ide_file_tree_right_click_delete_file_ajax(key, element, e);
					} else if(key == 'delete_folder') {
						instant_ide_file_tree_right_click_delete_folder_ajax(key, element, e);
					}
				}
			})
		}
		
		function instant_ide_conditional_unzip_delete_message_popup(message_title, message, key, element, e) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); instant_ide_refresh_file_tree(); },
				title: message_title,
				text: message,
				icon: 'success',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) {
					instant_ide_file_tree_right_click_delete_file_ajax(key, element, e);
				}
			})
		}
		
		function instant_ide_conditional_find_replace_message_popup(message_title, message, key, element, e) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: message_title,
				text: message,
				icon: 'success',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) {
					instant_ide_file_tree_right_click_find_replace_ajax(key, element, e);
				}
			})
		}

		function instant_ide_conditional_open_file_changed_message_popup(message_title, message, element) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: message_title,
				text: message,
				icon: 'success',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) {
					var file_path = element.attr('title');
					var rel_path = file_path.substr(0, file_path.lastIndexOf('/'));
					var file_name = element.find('.instant-ide-file-editor-tab-text').text();
					$('body').addClass('instant-ide-open-file-reloading');
					element.find('.instant-ide-file-editor-tab-quit').click();
					setTimeout(function() {
						$('.iideft-directory[data-rel-path="'+rel_path+'"] > ul > li.iideft-file[data-file-name="'+file_name+'"]').dblclick();
						setTimeout(function() {
							$('body').removeClass('instant-ide-open-file-reloading');
						}, 1000);
					}, 500);
				}
			})
		}
		
		function instant_ide_conditional_install_message_popup(message_title, message, key, element, e) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: message_title,
				text: message,
				icon: 'success',
				showCancelButton: true,
				confirmButtonText: 'Yes',
				cancelButtonText: 'No'
			}).then((result) => {
				if (result.value) {
					instant_ide_file_tree_right_click_install_ajax(key, element, e);
				}
			})
		}
		
		/* Right-Click Actions */
		
	    $('#instant-ide-file-tree-container').on('mouseenter', 'li.iideft-file', function() {
	        $(this).addClass('instant-ide-file-tree-file-right-clickable');
	    }).on('mouseleave', 'li.iideft-file', function() {
	        $(this).removeClass('instant-ide-file-tree-file-right-clickable');
	    });
	    
	    $('#instant-ide-file-tree-container').on('mouseenter', 'li.iideft-directory', function() {
	    	$(this).addClass('instant-ide-file-tree-folder-right-clickable');
	    }).on('mouseleave', 'li.iideft-directory', function() {
	    	$(this).removeClass('instant-ide-file-tree-folder-right-clickable');
	    });
	    
		$.contextMenu({
			selector: '.instant-ide-file-editor-tab', 
			items: {
				close_tab: {
					name: 'Close Tab',
					icon: 'far fa-times-circle',
					callback: function(key, opt, e) {
						$(this).find('.instant-ide-file-editor-tab-quit').click();
					}
				},
				close_all_tabs: {
					name: 'Close All Tabs',
					icon: 'fas fa-times-circle',
					callback: function(key, opt, e) {
						$('.instant-ide-file-editor-tab-quit').click();
						if($('body').hasClass('instant-ide-file-editor-layout-two')) {
						    instant_ide_editor_layout_toggle();
						}
					}
				},
				close_other_tabs: {
					name: 'Close Other Tabs',
					icon: 'fas fa-minus-circle',
					callback: function(key, opt, e) {
						$('.instant-ide-file-editor-tab-quit').not($(this).find('.instant-ide-file-editor-tab-quit')).click();
						setTimeout(function() {
    						if($('body').hasClass('instant-ide-file-editor-layout-two')) {
    						    instant_ide_editor_layout_toggle();
    						}
						}, 500);
					}
				},
				toggle_split_view: {
					name: 'Toggle Split View',
					icon: 'fas fa-columns',
					callback: function(key, opt, e) {
						instant_ide_toggle_split_view($(this));
					}
				},
				reload_file: {
					name: 'Reload File',
					icon: 'fas fa-sync-alt',
					callback: function(key, opt, e) {
						$('body').addClass('instant-ide-open-file-reloading');
						var tab_id = $(this).attr('id');
						var tab_container_id = $('#'+tab_id).parent().attr('id');
						var file_path = $(this).attr('title');
						var rel_path = file_path.substr(0, file_path.lastIndexOf('/'));
						var file_name = $(this).find('.instant-ide-file-editor-tab-text').text();
					    if(rel_path === '') {
					        var file = $('#iideft-root-directory > ul > li.iideft-file[data-file-name="'+file_name+'"]');
					    } else {
					        var file = $('.iideft-directory[data-rel-path="'+rel_path+'"] > ul > li.iideft-file[data-file-name="'+file_name+'"]');
					    }
						$(this).find('.instant-ide-file-editor-tab-quit').click();
						setTimeout(function() {
        					if(tab_container_id === 'instant-ide-file-editor-tab-container-two') {
        						instant_ide_file_tree_li_dblclicked_initial(file, container_num = 'two');
        					} else {
        						file.dblclick();
        					}
							setTimeout(function() {
								$('body').removeClass('instant-ide-open-file-reloading');
							}, 500);
						}, 0);
					}
				},
			}
		});

		function instant_ide_toggle_split_view(element) {
			var tab_id = element.attr('id');
			var tab_container_id = element.parent().attr('id');
			if(tab_container_id === 'instant-ide-file-editor-tab-container-one') {
				if(!$('body').hasClass('instant-ide-file-editor-layout-two')) {
					instant_ide_editor_layout_toggle();
				}
				element.appendTo('#instant-ide-file-editor-tab-container-two');
				instant_ide_file_editor_tab_moved(tab_id, 'instant-ide-file-editor-tab-container-two');
			} else {
				element.appendTo('#instant-ide-file-editor-tab-container-one');
				instant_ide_file_editor_tab_moved(tab_id, 'instant-ide-file-editor-tab-container-one');
			}
		}

        if(localStorage.getItem('iide_word_wrap') == 'off') {
        	var cm_word_wrap_name = 'Enable Word Wrap';
        } else {
        	var cm_word_wrap_name = 'Disable Word Wrap';
        }
		
		$.contextMenu({
			selector: '.instant-ide-file-editor-cog', 
			trigger: 'left',
			items: {
				toggle_split_view: {
					name: 'Toggle Split View',
					icon: 'fas fa-columns',
					callback: function() {
					    var active_tab_id = $('#instant-ide-file-editor-tab-container-one .instant-ide-file-editor-tab-active').attr('id');
						$('#instant-ide-file-editor-tab-container-two .instant-ide-file-editor-tab').each(function() {
					         instant_ide_file_editor_tab_moved($(this).attr('id'), 'instant-ide-file-editor-tab-container-one');
						});
						setTimeout(function() {
						    $('#'+active_tab_id).click();
						}, 0);
						instant_ide_editor_layout_toggle();
					}
				},
				toggle_word_wrap: {
					name: cm_word_wrap_name,
					icon: 'fas fa-align-left',
					callback: function() {
	                    if(localStorage.getItem('iide_word_wrap') == 'off') {
	                    	localStorage.setItem('iide_word_wrap', 'on');
	                    	$('.context-menu-item > span:contains("able Word Wrap")').text('Disable Word Wrap');
	                    } else {
	                    	localStorage.setItem('iide_word_wrap', 'off');
	                    	$('.context-menu-item > span:contains("able Word Wrap")').text('Enable Word Wrap');
	                    }
					}
				}
			}
		});

		function instant_ide_editor_layout_toggle() {
			if($('body').hasClass('instant-ide-file-editor-layout-two')) {
				$('body').removeClass('instant-ide-file-editor-layout-two');
				$('.instant-ide-file-editor-cog').appendTo('#instant-ide-file-editor-tab-container-one');
				$('#instant-ide-file-editor-container-inner-wrap-two').hide();
				if($('#instant-ide-file-editor-tab-container-one .instant-ide-file-editor-tab').length > 0) {
					$('#instant-ide-file-editor-tab-container-two .instant-ide-file-editor-tab').removeClass('instant-ide-file-editor-tab-active');
				}
				$('#instant-ide-file-editor-tab-container-two .instant-ide-file-editor-tab').each(function() {
					$(this).appendTo('#instant-ide-file-editor-tab-container-one');
				}).attr('data-tab-container', 'one');
				$('#instant-ide-file-editor-container-two .instant-ide-file-editor-textarea-container').each(function() {
					$(this).find('form').removeClass('instant-ide-file-editor-active-form');
					$(this).appendTo('#instant-ide-file-editor-container-one');
				});
				localStorage.setItem('iide_editor_layout_state', 'single');
			} else {
				$('body').addClass('instant-ide-file-editor-layout-two');
				$('.instant-ide-file-editor-cog').appendTo('#instant-ide-file-editor-tab-container-two');
				$('#instant-ide-file-editor-container-inner-wrap-two').show();
				localStorage.setItem('iide_editor_layout_state', 'double');
			}
			instant_ide_file_editor_layout_sortable();
		}
		
        if(localStorage.getItem('iide_show_hidden_files') == 'false') {
        	var cm_hidden_files_name = 'Show Hidden Files';
        } else {
        	var cm_hidden_files_name = 'Hide Hidden Files';
        }
        
        // Refresh file tree every 5 seconds.
		var refresh_interval_id = setInterval(instant_ide_refresh_file_tree, 5000);
		$('body').addClass('instant-ide-file-tree-interval-set');

        function instant_ide_refresh_file_tree(first_refresh = false) {
        	setTimeout(function() {
				if(false === first_refresh) {
					$('#instant-ide-file-tree-container').data('dirs-scroll-top', $('#instant-ide-file-tree-container').scrollTop());
					localStorage.setItem('iide_dirs_scroll_top', $('#instant-ide-file-tree-container').scrollTop());
				}
				$('#iideft-root-directory').load(window.location.href+' #iideft-root-directory > *', function() {
					var selected_files = $('#instant-ide-file-tree-container-wrap').data('selected-files');
					$('#instant-ide-file-tree-container-wrap').data('refresh-dirs', true);
					if($('#instant-ide-file-tree-container-wrap').attr('data-selected-folder-id') != '') {
						var selected_folder_id = $('#instant-ide-file-tree-container-wrap').attr('data-selected-folder-id');
						$('#'+selected_folder_id+' > a').addClass('iideft-folder-clicked');
					}
					if($('#instant-ide-file-tree-container-wrap').attr('data-selected-file') != '') {
						var selected_file_parent_dir = $('#instant-ide-file-tree-container-wrap').attr('data-selected-file-parent-dir');
						var selected_file = $('#instant-ide-file-tree-container-wrap').attr('data-selected-file');
						if($('#'+selected_file_parent_dir+' > ul > [data-file-name="'+selected_file+'"]').length) {
    						if($('#instant-ide-file-tree-container-wrap').attr('data-selected-file-dblclicked') !== 'false') {
    							$('#'+selected_file_parent_dir+' > ul > [data-file-name="'+selected_file+'"]').addClass('iideft-file-dblclicked');
    						} else {
    							$('#'+selected_file_parent_dir+' > ul > [data-file-name="'+selected_file+'"]').addClass('iideft-file-selected');
    						}
						} else {
						    instant_ide_file_tree_selected_file_check('');
						}
					}
					if($('#instant-ide-file-tree-container-wrap').attr('data-copied-file') != '') {
						var copied_file_parent_dir = $('#instant-ide-file-tree-container-wrap').attr('data-copied-file-parent-dir');
						var copied_file = $('#instant-ide-file-tree-container-wrap').attr('data-copied-file');
						$('#'+copied_file_parent_dir).find('[data-file-name="'+copied_file+'"]').addClass('instant-ide-file-tree-copied-item').css('opacity', '0.5');
					}
					$('#instant-ide-file-tree-container-wrap').data('refresh-dirs', false);
					$('#instant-ide-file-tree-container').scrollTop($('#instant-ide-file-tree-container').data('dirs-scroll-top'));
					instant_ide_elements_draggable();
					instant_ide_elements_droppable();
					instant_ide_build_tool_file_check();
					instant_ide_save_state_update();
				});
        	}, 100);
        }
        
        function instant_ide_stop_file_tree_interval() {
        	if(!$('body').hasClass('instant-ide-file-tree-interval-set'))
        		return false;
        		
        	$('body').removeClass('instant-ide-file-tree-interval-set');
        	clearInterval(refresh_interval_id);
        }
        
        function instant_ide_start_file_tree_interval() {
        	if($('body').hasClass('instant-ide-file-tree-interval-set'))
        		return false;
        	
        	$('body').addClass('instant-ide-file-tree-interval-set');
			refresh_interval_id = setInterval(instant_ide_refresh_file_tree, 5000);
        }

        function instant_ide_reset_file_tree_interval() {
			instant_ide_stop_file_tree_interval()
			instant_ide_start_file_tree_interval();
        }

		$('#iideft-root-directory li').click(function() {
			instant_ide_reset_file_tree_interval();
		});
	    
		$.contextMenu({
			selector: '.instant-ide-file-tree-cog',
		    events: {
		       show : function(options){
		            instant_ide_stop_file_tree_interval();         
		       },
		       hide : function(options){
		           instant_ide_start_file_tree_interval();         
		       }
		    },
			trigger: 'left',
			items: {
				refresh_file_tree: {
					name: 'Refresh File Tree',
					icon: 'fas fa-redo-alt',
					callback: function() {
						instant_ide_refresh_file_tree();
					}
				},
				collapse_folders: {
					name: 'Collapse Folders',
					icon: 'fas fa-compress-arrows-alt',
					callback: function() {
						instant_ide_dir_status_update(type = 'open', action = 'reset');
						setTimeout(function() {
							instant_ide_dir_status_update(type = 'opened', action = 'cleanup');
							setTimeout(function() {
								instant_ide_refresh_file_tree();
								instant_ide_file_tree_scrollbar_check();
							}, 500);
						}, 500);
					}
				},
				'sep1': '---------',
				show_hidden_files: {
					name: cm_hidden_files_name,
					icon: 'fas fa-eye-slash',
	                callback: function() {
	                    if(localStorage.getItem('iide_show_hidden_files') == 'false') {
	                    	$('body').addClass('instant-ide-file-tree-show-hidden');
	                    	localStorage.setItem('iide_show_hidden_files', 'true');
	                    	$('.context-menu-item > span:contains(" Hidden Files")').text('Hide Hidden Files');
	                    } else {
	                    	$('body').removeClass('instant-ide-file-tree-show-hidden');
	                    	localStorage.setItem('iide_show_hidden_files', 'false');
	                    	$('.context-menu-item > span:contains(" Hidden Files")').text('Show Hidden Files');
	                    }
	                }
				}
			}
		});
		
		var ftrc_file_full_path = '';
	    
		$.contextMenu({
			selector: '#iideft-root-directory',
		    events: {
		       show : function(options){
		            instant_ide_stop_file_tree_interval();
		            ftrc_file_full_path = $(this).attr('data-full-path');
		       },
		       hide : function(options){
		           instant_ide_start_file_tree_interval();
		       }
		    },
			items: {
				root_upload_file: {
					name: 'Upload Files',
					icon: 'fas fa-file-upload',
					callback: function(key, opt, e) {
						// Make sure file tree interval is stopped before upload form initiates.
						setTimeout(function() {
							instant_ide_stop_file_tree_interval();
						}, 0);
						$('#instant-ide-file-editor-upload-form').attr('data-file-name', instant_ide_get_rel_path($(this), e)).attr('alt', key);
						$('#instant-ide-file-editor-upload-form-container').fadeToggle('medium');
						$('#instant-ide-file-editor-upload-form-overlay').fadeToggle('medium');
						// File tree interval is restarted at the end of this function...
						instant_ide_file_tree_right_click_upload_file_ajax(key, $(this));
					}
				},
				find_in_folder: {
					name: 'Find In Folder',
					icon: 'fas fa-search',
					callback: function(key, opt, e) {
					    instant_ide_find_in_folder(key, $(this));
					}
				},
				'sep1': '---------',
				paste_file: {
					name: 'Paste',
					icon: 'fas fa-paste',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_paste_file_ajax(key, $(this), e);
						$('.instant-ide-file-tree li').css('opacity', '1');
					}
				},
				'sep2': '---------',
				folder_create_file: {
					name: 'New File',
					icon: 'fas fa-file-alt',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_create_file_ajax(key, $(this), e);
					}
				},
				folder_create_folder: {
					name: 'New Folder',
					icon: 'fas fa-folder-plus',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_create_folder_ajax(key, $(this), e);
					}
				},
				'sep3': '---------',
				preview_folder: {
					name: 'Preview Folder',
					icon: 'fas fa-eye',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_preview_folder_callback($(this), root = true, e);
					}
				},
				'sep4': '---------',
				install_wordpress: {
					name: 'Install WordPress',
					icon: 'fab fa-wordpress',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install WordPress inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				install_october: {
					name: 'Install October CMS',
					icon: 'fas fa-leaf',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install October CMS inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				install_grav: {
					name: 'Install Grav CMS',
					icon: 'fas fa-user-astronaut',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install Grav CMS inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				install_grav_admin: {
					name: 'Install Grav CMS w/Admin',
					icon: 'fas fa-user-astronaut',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install Grav CMS w/Admin inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				'sep5': '---------',
				folder_properties: {
					name: 'Folder Properties',
					icon: 'fas fa-info-circle',
					callback: function(key, opt, e) {
					    var file_name = $(this).attr('data-file-name');
						instant_ide_file_tree_get_file_properties(ftrc_file_full_path, file_name, file_type = 'folder');
					}
				},
			}
		});
		
		function instant_ide_file_tree_get_file_properties(file_path, file_name, file_type) {
		    var title_type = file_type === 'folder' ? 'Folder: ' : 'File: ';
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_get_file_properties',
					file_path : file_path,
					file_type : file_type
				},
				success : function(response) {
					if(response) {
            			Swal.fire({
            				onOpen: function() { instant_ide_stop_file_tree_interval(); },
            				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
            				title: title_type+file_name,
            				text: response,
            				icon: 'success'
            			})
					} else {
					    instant_ide_error_message_popup('File Properties Unknown');
					}
				}
			});
		}
		
		$.contextMenu({
			selector: '.instant-ide-file-tree-file-right-clickable', 
		    events: {
		       show : function(options){
		            instant_ide_stop_file_tree_interval();
		            ftrc_file_full_path = $(this).closest('.iideft-directory').attr('data-full-path')+'/'+$(this).attr('data-file-name');
		       },
		       hide : function(options){
		           instant_ide_start_file_tree_interval();         
		       }
		    },
			items: {
				open_file: {
					name: 'Open',
					icon: 'fas fa-folder-open',
					callback: function(key, opt, e) {
						if($(this).hasClass('iideft-file-zip')) {
							instant_ide_file_tree_right_click_unzip_file_ajax(key, $(this), e);
						} else {
							$(this).dblclick();
						}
					}
				},
				open_file_alt: {
					name: 'Open Alt',
					icon: 'far fa-folder-open',
					callback: function(key, opt, e) {
						if($(this).hasClass('iideft-file-zip')) {
							instant_ide_file_tree_right_click_unzip_file_ajax(key, $(this), e);
						} else if($(this).hasClass('iideft-file-image')) {
							$(this).dblclick();
						} else {
							instant_ide_file_tree_li_dblclicked_initial($(this), container_num = 'two');
						}
					}
				},
				download_file: {
					name: 'Download',
					icon: 'fas fa-file-download',
					callback: function(key, opt, e) {
						var file_name = $(this).attr('data-file-name');
						instant_ide_file_tree_right_click_download_file_ajax(key, $(this), e);
					}
				},
				'sep1': '---------',
				rename_file: {
					name: 'Rename',
					icon: 'fas fa-edit',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_rename_file_ajax($('.context-menu-active a'), e);
						function instant_ide_file_tree_right_click_rename_file_ajax(element, e) {
							var pre_file_name = element.parent().attr('data-file-name');
							Swal.fire({
								onOpen: function() { instant_ide_stop_file_tree_interval(); },
								onAfterClose: function() { instant_ide_start_file_tree_interval(); },
								title: 'Give your file a new name',
								input: 'text',
								inputValue: pre_file_name,
								showCancelButton: true,
								confirmButtonText: 'Submit',
								preConfirm: (name) => {
									return new Promise((resolve) => {
										setTimeout(() => {
											if (name == '') {
												Swal.showValidationMessage(
													'The file name field cannot be empty.'
												)
											}
											resolve()
										}, 0)
									})
								},
								allowOutsideClick: false
							}).then((result) => {
								if (result.value) {
									var file_rel_path = instant_ide_get_rel_path(element.parent(), e);
									var file_rel_path_slash = file_rel_path.indexOf('/') > -1 ? true: false;
									var pre_file_rel_path = file_rel_path_slash ? file_rel_path.substr(0, file_rel_path.lastIndexOf('/') + 1)+pre_file_name : pre_file_name;
									var file_open = false;
									if($('.instant-ide-file-editor-tab-container').find('[data-file-name="'+pre_file_rel_path+'"]').length) {
										file_open = true;
									}
									var new_file_name = result.value;
									var new_file_ext = new_file_name.split('.').pop();
									$.ajax({
										type : 'POST',
										url : iide_url+'editor/file-editor-ajax.php',
										data : {
											action : 'instant_ide_file_tree_right_click_menu_action',
											ftrc_file_full_path : ftrc_file_full_path,
											context_menu_key : key,
											rel_path : pre_file_rel_path,
											old_name : pre_file_name,
											new_name : new_file_name,
											file_open : file_open
										},
										success : function(response) {
											if(response) {
												var response_error = response.substring(0, 12) == 'Rename Error' ? true : false;
												if(response_error) {
													instant_ide_error_message_popup(response.split('|')[0]);
												} else {
													instant_ide_file_tree_selected_file_check(element.parent(), dblclicked = false, parent_id = element.closest('.iideft-directory').attr('id'), new_name = new_file_name);
													instant_ide_refresh_file_tree();
												}
											}
										}
									});
								}
							})
						}
					}
				},
				delete_file: {
					name: 'Delete',
					icon: 'fas fa-trash-alt',
					callback: function(key, opt, e) {
						var file_name = $(this).attr('data-file-name');
						// If multiple files are selected then response appropriately.
						if($('.iideft-file-selected').length > 1) {
							instant_ide_conditional_delete_message_popup('You are about to delete multiple files!', 'Do you want to continue?', key, $(this), e);
						} else {
							instant_ide_conditional_delete_message_popup('You are about to delete the file: '+file_name, 'Do you want to continue?', key, $(this), e);
						}
					}
				},
				'sep2': '---------',
				cut_file: {
					name: 'Cut',
					icon: 'fas fa-cut',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_cut_copy_callback($(this), 'cut', 'file', e);
						$(this).css('opacity', '0.5');
					}
				},
				copy_file: {
					name: 'Copy',
					icon: 'fas fa-copy',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_cut_copy_callback($(this), 'copy', 'file', e);
					}
				},
				paste_file: {
					name: 'Paste',
					icon: 'fas fa-paste',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_paste_file_ajax(key, $(this).parent().parent(), e);
						$('.instant-ide-file-tree li').css('opacity', '1');
					}
				},
				duplicate_file: {
					name: 'Duplicate',
					icon: 'fas fa-clone',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_duplicate_file_ajax(key, $(this), e);
					}
				},
				'sep3': '---------',
				create_file: {
					name: 'New File',
					icon: 'fas fa-file-alt',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_create_file_ajax(key, $(this), e);
					}
				},
				create_folder: {
					name: 'New Folder',
					icon: 'fas fa-folder-plus',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_create_folder_ajax(key, $(this), e);
					}
				},
				'sep4': '---------',
				file_properties: {
					name: 'File Properties',
					icon: 'fas fa-info-circle',
					callback: function(key, opt, e) {
					    var file_name = $(this).attr('data-file-name');
						instant_ide_file_tree_get_file_properties(ftrc_file_full_path, file_name, file_type = 'file');
					}
				},
			}
		});
		
		function instant_ide_file_tree_right_click_upload_file_ajax(key, element) {
			var context_menu_key = key;
			var that = element;
			var form_clone = $('#instant-ide-file-editor-upload-form').clone(true);
			$('#instant-ide-file-editor-upload-form').on('submit', function(e) {
				$('#instant-ide-upload-button').hide();
				$('#instant-ide-file-editor-upload-form .instant-ide-ajax-save-spinner').show();
				var file_rel_path = instant_ide_get_rel_path(that, e);
				
				// Get the selected files from the input.
				var files = $('#instant-ide-file-upload').prop('files');
				
				// Create a new FormData object.
				var formData = new FormData();
				
				var fileSize = 0;
				
				// Loop through each of the selected files.
				for(var i = 0; i < files.length; i++) {
					var file = files[i];
					
					fileSize = fileSize + file.size;
					
					// Add the file to the request.
					formData.append('uploads[]', file, file.name);
				}
				
				formData.append('action', 'instant_ide_file_tree_upload_action');
				formData.append('context_menu_key', context_menu_key);
				formData.append('ftrc_file_full_path', ftrc_file_full_path);
				formData.append('rel_path', file_rel_path);
				
				if(fileSize < ini_file_size) {
    				if(formData) {
    					$.ajax({
    						type : 'POST',
    						xhr: function() {
    							var xhr = new window.XMLHttpRequest();
    							
    							xhr.upload.addEventListener("progress", function(evt) {
    								if (evt.lengthComputable) {
    									var percentComplete = evt.loaded / evt.total;
    									percentComplete = parseInt(percentComplete * 100);
    									$('#instant-ide-file-upload-progress').progressbar({
    										value: percentComplete
    									});
    									
    									if (percentComplete === 100) {
    									
    									}
    								
    								}
    							}, false);
    							
    							return xhr;
    						},
    						url : iide_url+'editor/file-editor-ajax.php',
    						processData: false,
    						contentType: false,
    						cache: false,
    						data: formData,
    						success : function(response) {
    							$('#instant-ide-upload-button').show();
    							$('#instant-ide-file-editor-upload-form .instant-ide-ajax-save-spinner').hide();
    							var response_error = response.substring(0, 12) == 'Upload Error' ? true : false;
    							if(response_error) {
    								instant_ide_error_message_popup(response);
    							    $('#instant-ide-file-editor-upload-form i').click();
    							    $('#instant-ide-file-editor-upload-form').replaceWith(form_clone);
    							} else {
    								if(!that.find('a').first().hasClass('iideft-directory-open')) {
    									that.find('a').first().click();
    								}
    								setTimeout(function() {
    									instant_ide_refresh_file_tree();
    								}, 500);
    							    $('#instant-ide-file-editor-upload-form i').click();
    							    $('#instant-ide-file-editor-upload-form').replaceWith(form_clone);
    							    
    								// Only "start file tree interval" is used here because stop is used right before this entire function executes.
    			                    Swal.fire({
    									onAfterClose: function() { instant_ide_start_file_tree_interval(); },
    			                        text: response,
    			                        icon: 'success'
    			                    })
    							}
    						}
    					});
    				}
				} else {
					var response_error = false;
					instant_ide_error_message_popup('Upload Error: Posted data is too large. '+fileSize+' bytes exceeds the maximum size of '+ini_file_size+' bytes. You can upload larger files by increasing the upload_max_filesize and post_max_size values in your server\'s php.ini file.');
				    $('#instant-ide-file-editor-upload-form i').click();
				    $('#instant-ide-file-editor-upload-form').replaceWith(form_clone);
				}
				e.preventDefault();
			});
		}

		$('#instant-ide-find-window').on('click', '.instant-ide-find-result-page', function() {
			$('.instant-ide-find-result').removeClass('instant-ide-this-find-result-clicked');
			$(this).addClass('instant-ide-this-find-result-clicked');
			var parent_id = $(this).attr('data-parent-id');
			var file_name = $(this).attr('data-file-name');
			var tab_id = parent_id.replace('iideft-directory-', 'instant-ide-')+'-'+instant_ide_classify_string(file_name)+'-textarea-container-tab';
			var search_term = $(this).text();
			var file = $(parent_id).find('ul').first().children('[data-file-name="'+file_name+'"]');
			$('body').addClass('instant-ide-find-result-clicked');
			var count = $(this).attr('data-click-count');
			if(!file.length && count < 10) {
				var rel_path_with_file = $(this).text();
				var rel_path_without_file = rel_path_with_file.substr(0, rel_path_with_file.lastIndexOf('/'));
				var file_rel_path = rel_path_without_file.substr(1);
				var rel_path_array = file_rel_path.split('/');
				var rel_path_split_array = [];
				var index_count = -1;
				$.each(rel_path_array, function(i, e) {
					if(index_count === -1) {
						rel_path_split_array.push(file_rel_path);
					} else {
						var prev_path = rel_path_split_array[index_count];
						rel_path_split_array.push(prev_path.substr(0, prev_path.lastIndexOf('/')));
					}
					index_count++;
				});
				var multi_path_string = rel_path_split_array.toString();
				instant_ide_dir_status_update(type = 'opened', action = 'add_multi', multi_path_string);
				var that = $(this);
				setTimeout(function() {
					instant_ide_refresh_file_tree();
					setTimeout(function() {
						count++;
						that.attr('data-click-count', count);
						that.click();
					}, 300);
				}, 500);
			} else if(file.length) {
				setTimeout(function() {
					$('.iideft-file-edit').removeClass('iideft-file-dblclicked');
					if($(tab_id).parent().attr('id') === 'instant-ide-file-editor-tab-container-two') {
						instant_ide_file_tree_li_dblclicked_initial(file, container_num = 'two');
					} else {
						file.dblclick();
					}
					if($('body').hasClass('instant-ide-ace-editor-active')) {
						var timeout = 500;
					} else {
						var timeout = 1000;
					}
					setTimeout(function() {
						$('body').removeClass('instant-ide-find-result-clicked');
					}, timeout);
				}, 0);
			} else {
				$('body').removeClass('instant-ide-find-result-clicked');
				instant_ide_error_message_popup('This file cannot be opened at this time.');
			}
		});

		$('#instant-ide-file-editor-loaded').on('click', '.instant-ide-find-result', function() {
			$('.instant-ide-find-result').removeClass('instant-ide-this-find-result-clicked');
			$(this).addClass('instant-ide-this-find-result-clicked');
			var parent_id = $(this).attr('data-parent-id');
			var file_name = $(this).attr('data-file-name');
			var tab_id = parent_id.replace('iideft-directory-', 'instant-ide-')+'-'+instant_ide_classify_string(file_name)+'-textarea-container-tab';
			var textarea_container_id = tab_id.replace('-tab', '');
			var search_term = $('#instant-ide-find-menu').val();
			var line_number = $(this).find('span').text().slice(0, -1);
			var file = $(parent_id).find('ul').first().children('[data-file-name="'+file_name+'"]');
			$('body').addClass('instant-ide-find-result-clicked');
			var count = $(this).attr('data-click-count');
			if(!file.length && count < 10) {
				var rel_path_with_file = $('.instant-ide-find-result-page[data-parent-id="'+$(this).attr('data-parent-id')+'"]').first().text();
				var rel_path_without_file = rel_path_with_file.substr(0, rel_path_with_file.lastIndexOf('/'));
				var file_rel_path = rel_path_without_file.substr(1);
				var rel_path_array = file_rel_path.split('/');
				var rel_path_split_array = [];
				var index_count = -1;
				$.each(rel_path_array, function(i, e) {
					if(index_count === -1) {
						rel_path_split_array.push(file_rel_path);
					} else {
						var prev_path = rel_path_split_array[index_count];
						rel_path_split_array.push(prev_path.substr(0, prev_path.lastIndexOf('/')));
					}
					index_count++;
				});
				var multi_path_string = rel_path_split_array.toString();
				instant_ide_dir_status_update(type = 'opened', action = 'add_multi', multi_path_string);
				var that = $(this);
				setTimeout(function() {
					instant_ide_refresh_file_tree();
					setTimeout(function() {
						count++;
						that.attr('data-click-count', count);
						that.click();
					}, 300);
				}, 500);
			} else if(file.length) {
				$('.iideft-file-edit').removeClass('iideft-file-dblclicked');
				if(!$(tab_id).length) {
					var tab_length = false;
				} else {
					var tab_length = true;
					$(tab_id).attr('data-line-number', parseInt(line_number, 10));
				}
				if($(tab_id).parent().attr('id') === 'instant-ide-file-editor-tab-container-two') {
					instant_ide_file_tree_li_dblclicked_initial(file, container_num = 'two');
				} else {
					file.dblclick();
				}
				if($('body').hasClass('instant-ide-ace-editor-active')) {
					var timeout = 500;
				} else {
					var timeout = 1000;
				}
				setTimeout(function() {
					if(false === tab_length) {
						$(tab_id).attr('data-line-number', parseInt(line_number, 10));
						$(tab_id).click();
					}
					setTimeout(function() {
						$('body').removeClass('instant-ide-find-result-clicked');
					}, 500);
				}, timeout);
			} else {
				$('body').removeClass('instant-ide-find-result-clicked');
				instant_ide_error_message_popup('This file cannot be opened at this time.');
			}
		});

		$('#instant-ide-find-window-container i').click(function() {
			localStorage.setItem('iide_find_window_dir_id', '');
			$('body').removeClass('instant-ide-find-window-active');
			$('#instant-ide-find-window-html').html('');
			$('#instant-ide-find-window-container').hide();
		    instant_ide_console_find_window_toggle('find', 'close');
			instant_ide_splitter_loader();
		});
		
		$('.instant-ide-find-window-regex-button').click(function() {
		    $(this).toggleClass('instant-ide-find-window-regex-button-active');    
		});

		if(localStorage.getItem('iide_find_window_dir_id') !== '') {
			instant_ide_find_in_folder('find_in_folder', $('#'+localStorage.getItem('iide_find_window_dir_id')));
		}

		function instant_ide_find_in_folder(key, element) {
			localStorage.setItem('iide_find_window_dir_id', element.attr('id'));
			$('#instant-ide-find-menu').val('');
			$('#instant-ide-replace-menu').val('');
			$('#instant-ide-find-window-html').html('');
			$('#instant-ide-find-directory').text('Folder: /'+element.data('file-name')+'/');
			$('body').addClass('instant-ide-find-window-active');
			$('#instant-ide-find-window-container').show();
			instant_ide_console_find_window_toggle('find', 'open');
			$('#instant-ide-file-editor-console-find-container').css('height', '20%');
			$('#instant-ide-find-window-form').attr('data-file-name', instant_ide_get_rel_path(element)).attr('alt', key);
			$('#instant-ide-replace-window-form').attr('data-file-name', instant_ide_get_rel_path(element)).attr('alt', key);
			$('#instant-ide-find-menu').focus();
			instant_ide_splitter_loader();
			instant_ide_file_tree_right_click_find_in_folder_ajax(key, element);
		}

		function instant_ide_file_tree_right_click_find_in_folder_ajax(key, element) {
			$('#instant-ide-find-window-form').on('submit', function(e) {
				$('#instant-ide-replace-window-form .instant-ide-ajax-save-spinner').show();
				$('#instant-ide-find-window-html').html('');
				var file_rel_path = $(this).attr('data-file-name');
				var find_val = $('#instant-ide-find-menu').val();
				var match_case_val = $('#instant-ide-find-window-match-case').hasClass('instant-ide-find-window-regex-button-active') ? true : false;
				var whole_word_val = $('#instant-ide-find-window-whole-word').hasClass('instant-ide-find-window-regex-button-active') ? true : false;

				$.ajax({
					type : 'POST',
					url : iide_url+'editor/file-editor-ajax.php',
					data : {
						action : 'instant_ide_file_tree_find_action',
						context_menu_key : key,
						rel_path : file_rel_path,
						find_value : find_val,
						replace_value : false,
						match_case_value : match_case_val,
						whole_word_value : whole_word_val,
						find_replace_type : 'find'
					},
					success : function(response) {
						$('#instant-ide-replace-window-form .instant-ide-ajax-save-spinner').hide();
						if(response.substring(0, 10) == 'Find Error') {
							$('#instant-ide-find-window-html').html('<p class="instant-ide-find-result-empty">Found 0 matches in 0 files.</p>');
						} else if(response.substring(0, 10) == 'Form Error') {
							$('#instant-ide-find-window-html').html('<p class="instant-ide-find-result-empty">Search form is empty.</p>');
						} else {
							$('#instant-ide-find-window-html').html(response);
						}
					}
				});
				e.preventDefault();
			});
			$('#instant-ide-replace-window-form').on('submit', function(e) {
				$('#instant-ide-replace-window-form .instant-ide-ajax-save-spinner').show();
				var that = $(this);
				var file_rel_path = $(this).attr('data-file-name');
				var find_val = $('#instant-ide-find-menu').val();
				var replace_val = $('#instant-ide-replace-menu').val();
				var match_case_val = $('#instant-ide-find-window-match-case').hasClass('instant-ide-find-window-regex-button-active') ? true : false;
				var whole_word_val = $('#instant-ide-find-window-whole-word').hasClass('instant-ide-find-window-regex-button-active') ? true : false;

				$.ajax({
					type : 'POST',
					url : iide_url+'editor/file-editor-ajax.php',
					data : {
						action : 'instant_ide_file_tree_find_action',
						context_menu_key : key,
						rel_path : file_rel_path,
						find_value : find_val,
						replace_value : replace_val,
						match_case_value : match_case_val,
						whole_word_value : whole_word_val,
						find_replace_type : 'replace check'
					},
					success : function(response) {
						$('#instant-ide-replace-window-form .instant-ide-ajax-save-spinner').hide();
						if(response.substring(0, 10) == 'Find Error') {
							$('#instant-ide-find-window-html').html('<p class="instant-ide-find-result-empty">Found 0 matches in 0 files.</p>');
						} else if(response.substring(0, 10) == 'Form Error') {
							$('#instant-ide-find-window-html').html('<p class="instant-ide-find-result-empty">Search form is empty.</p>');
						} else {
    						instant_ide_conditional_find_replace_message_popup('Ready To Replace!', response, key, that, e);
						}
					}
				});
				e.preventDefault();
			});
		}
		
		function instant_ide_file_tree_right_click_find_replace_ajax(key, element, e) {
		    $('#instant-ide-replace-window-form .instant-ide-ajax-save-spinner').show();
			var file_rel_path = element.attr('data-file-name');
			var find_val = $('#instant-ide-find-menu').val();
			var replace_val = $('#instant-ide-replace-menu').val();
			var match_case_val = $('#instant-ide-find-window-match-case').hasClass('instant-ide-find-window-regex-button-active') ? true : false;
			var whole_word_val = $('#instant-ide-find-window-whole-word').hasClass('instant-ide-find-window-regex-button-active') ? true : false;

			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_find_action',
					context_menu_key : key,
					rel_path : file_rel_path,
					find_value : find_val,
					replace_value : replace_val,
					match_case_value : match_case_val,
					whole_word_value : whole_word_val,
					find_replace_type : 'replace'
				},
				success : function(response) {
				    $('#instant-ide-replace-window-form .instant-ide-ajax-save-spinner').hide();
					var response_error = response.substring(0, 13) == 'Replace Error' ? true : false;
					if(response_error) {
						instant_ide_error_message_popup('Find And Replace Was Unsuccessful');
					} else {
	                    Swal.fire({
							onAfterClose: function() { $('.instant-ide-file-editor-tab-active').click(); },
	                        text: 'Find And Replace Was Successful',
	                        icon: 'success'
	                    })
						instant_ide_find_replace_open_file_change_check(response.slice(19));
					}
				}
			});
		}

		function instant_ide_find_replace_open_file_change_check(paths) {
			var paths_array = paths.split(',');
			$.each(paths_array, function(i, e) {
				if($('.instant-ide-file-editor-tab[title="'+e+'"]').length) {
					$('.instant-ide-file-editor-tab[title="'+e+'"]').addClass('instant-ide-file-editor-tab-changed');
				}
			});
		}

		$('#instant-ide-file-editor-console-find-container').on('click', '.instant-ide-console-find-bottom-window', function() {
			if($(this).attr('id') === 'instant-ide-file-editor-console-container') {
				instant_ide_console_find_window_toggle(element = 'console', state = 'open');
			} else {
				instant_ide_console_find_window_toggle(element = 'find', state = 'open');
			}
		});

		function instant_ide_console_find_window_toggle(element, state) {
			if(element === 'console') {
				if(state === 'open') {
					$('#instant-ide-file-editor-console-container').css('zIndex', instant_ide_parse_int($('#instant-ide-find-window-container').css('zIndex')) + 1);
				} else {
					$('#instant-ide-file-editor-console-container').css('zIndex', instant_ide_parse_int($('#instant-ide-find-window-container').css('zIndex')) - 1);
				}
			} else {
				if(state === 'open') {
					$('#instant-ide-find-window-container').css('zIndex', instant_ide_parse_int($('#instant-ide-file-editor-console-container').css('zIndex')) + 1);
				} else {
					$('#instant-ide-find-window-container').css('zIndex', instant_ide_parse_int($('#instant-ide-file-editor-console-container').css('zIndex')) - 1);
				}
			}
			$('.instant-ide-console-find-window').removeClass('instant-ide-console-find-top-window').removeClass('instant-ide-console-find-bottom-window');
			if($('body').hasClass('instant-ide-console-active') && $('body').hasClass('instant-ide-find-window-active')) {
				if(element === 'console') {
					$('#instant-ide-file-editor-console-container').addClass('instant-ide-console-find-top-window');
					$('#instant-ide-find-window-container').addClass('instant-ide-console-find-bottom-window');
				} else {
					$('#instant-ide-file-editor-console-container').addClass('instant-ide-console-find-bottom-window');
					$('#instant-ide-find-window-container').addClass('instant-ide-console-find-top-window');
				}
			}
		}
		
		function instant_ide_file_tree_right_click_unzip_file_ajax(key, element, e) {
			var element = element;
			var zip_file_name = element.attr('data-file-name');
			var file_rel_path = instant_ide_get_rel_path(element, e);
			var file_rel_path_slash = file_rel_path.indexOf('/') > -1 ? true: false;
			var pre_file_rel_path = file_rel_path_slash ? file_rel_path.substr(0, file_rel_path.lastIndexOf('/') + 1) : '';
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					rel_path : pre_file_rel_path,
					zip_file_name : zip_file_name
				},
				success : function(response) {
					if(response) {
						var response_error = response == 'Unzip Error!' ? true : false;
						if(response_error) {
							instant_ide_error_message_popup(response);
						} else {
							instant_ide_conditional_unzip_delete_message_popup('Unzip Successful!', 'Would you like to delete the .'+zip_file_name.substr(zip_file_name.lastIndexOf('.') + 1)+' file?', 'delete_file', element, e);
						}
					}
				}
			});
		}
		
		function instant_ide_file_tree_right_click_download_file_ajax(key, element, e) {
			var file_name = element.attr('data-file-name');
			if(file_name.slice(-4) == '.zip') {
				var zip_file_name = file_name;
			} else {
				var zip_file_name = file_name + '.zip';
			}
			var file_rel_path = instant_ide_get_rel_path(element, e);
			var file_rel_path_slash = file_rel_path.indexOf('/') > -1 ? true: false;
			var pre_file_rel_path = file_rel_path_slash ? file_rel_path.substr(0, file_rel_path.lastIndexOf('/') + 1)+file_name : file_name;
			var file_open = false;
			if($('.instant-ide-file-editor-tab-container').find('[data-file-name="'+pre_file_rel_path+'"]').length) {
				file_open = true;
			}
			var new_file_name = element.text();
			var new_file_ext = new_file_name.split('.').pop();
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					rel_path : pre_file_rel_path,
					file_name : file_name
				},
				success : function(response) {
					if(response) {
						$('#instant-ide-file-editor-download-link').attr('href', iide_url+'tmp/'+zip_file_name);
						var download_link = document.getElementById('instant-ide-file-editor-download-link');
						if(download_link) {
						    download_link.click();
						}
					}
				}
			});
		}
		
		$('#instant-ide-file-editor-upload-form-container i').click(function() {
			$('#instant-ide-file-editor-upload-form-container').fadeOut('medium');
			$('#instant-ide-file-editor-upload-form-overlay').fadeOut('medium');
		});
		
		function instant_ide_file_tree_right_click_delete_file_ajax(key, element, e) {
			if($('.iideft-file-selected').length > 1) {
				var file_rel_path = [];
				$('.instant-ide-file-tree').find('.iideft-file-selected').each(function(e) {
					file_rel_path.push(instant_ide_get_rel_path($(this), e, multi = true));
				});
			} else {
				var file_rel_path = instant_ide_get_rel_path(element, e);
			}
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					rel_path : file_rel_path
				},
				success : function(response) {
					var response_error = response.substring(0, 12) == 'Delete Error' ? true : false;
					if(response_error) {
						instant_ide_error_message_popup(response);
					} else {
						if($('.iideft-file-selected').length > 1) {
							$.each(file_rel_path, function(i, val) {
								if($('.instant-ide-file-editor-tab-container').find('[data-file-name="'+val+'"]').length) {
									var file_name_id = instant_ide_classify_string(val);
									var tab_id = 'instant-ide-'+file_name_id+'-textarea-container-tab';
									$('#'+tab_id+' .instant-ide-file-editor-tab-quit').click();
								}
							});
							$('.iideft-file-selected').remove();
						} else {
							if($('.instant-ide-file-editor-tab-container').find('[data-file-name="'+file_rel_path+'"]').length) {
								var file_name_id = instant_ide_classify_string(file_rel_path);
								var tab_id = 'instant-ide-'+file_name_id+'-textarea-container-tab';
								$('#'+tab_id+' .instant-ide-file-editor-tab-quit').click();
							}
							element.remove();
						}
						setTimeout(function() {
						    instant_ide_refresh_file_tree();
						}, 500);
					}
				}
			});
		}
		
		function instant_ide_file_tree_right_click_paste_file_ajax(key, element, e, drop = false) {
			if(key === 'paste_folder' && element.attr('id') === $('.instant-ide-file-tree-copied-item').attr('id')) {
				instant_ide_file_tree_copied_file_check('');
				$('.instant-ide-file-tree li').removeClass('instant-ide-file-tree-copied-item');
				return false;
			}
			var copy_rel_path = localStorage.getItem('iide_copy_file_folder_path');
			var paste_rel_path = instant_ide_get_rel_path(element, e);
			var paste_action = localStorage.getItem('iide_copy_file_folder_action');
			var paste_source = localStorage.getItem('iide_copy_file_folder_source');
			var paste_file_name = copy_rel_path.split('/').pop();
			var paste_ext = paste_file_name.split('.').pop();
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					copy_path : copy_rel_path,
					paste_path : paste_rel_path,
					paste_action : paste_action,
					paste_source : paste_source,
					paste_name : paste_file_name,
					paste_ext : paste_ext
				},
				success : function(response) {
					if(response) {
						var response_error = response.substring(0, 11) == 'Paste Error' ? true : false;
						if(response_error) {
							instant_ide_file_tree_copied_file_check('');
							$('.instant-ide-file-tree li').removeClass('instant-ide-file-tree-copied-item');
							return false;
						} else {
							instant_ide_file_tree_copied_file_check('');
							localStorage.setItem('iide_copy_file_folder_path', '');
							localStorage.setItem('iide_copy_file_folder_action', '');
							localStorage.setItem('iide_copy_file_folder_source', '');
							if(element.hasClass('iideft-directory') && !element.find('a').first().hasClass('iideft-directory-open')) {
								element.find('a').first().click();
							}
							if(paste_source === 'folder') {
								dir_closed = true;
								if(false !== instant_ide_dir_status_update(type = 'open', action = 'replace', copy_rel_path, paste_rel_path+'/'+paste_file_name)) {
									dir_closed = false;
								}
								instant_ide_dir_status_update(type = 'opened', action = 'replace', copy_rel_path, paste_rel_path+'/'+paste_file_name, dir_closed);
								var folder_id_partial = instant_ide_classify_string($('.instant-ide-file-tree-copied-item').attr('data-file-name'));
								var new_paste_folder_id = element.attr('id') === 'iideft-root-directory' ? 'iideft-directory-'+folder_id_partial : element.attr('id')+'-'+folder_id_partial;
								instant_ide_file_tree_selected_folder_check(new_paste_folder_id, plain_id = true);
							} else {
								var parent_id_element = element.hasClass('iideft-file') ? element.parent().parent() : element;
								instant_ide_file_tree_selected_file_check($('.instant-ide-file-tree-copied-item'), dblclicked = false, parent_id = element.attr('id'));
							}
							if(paste_action === 'cut') {
								$('.instant-ide-file-tree-copied-item').remove();
							}
							if($('body').hasClass('instant-ide-file-tree-interval-set') || false !== drop) {
							    setTimeout(function() {
							        instant_ide_refresh_file_tree();
							    }, 300);
							}
						}
					}
				}
			});
		}
		
		function instant_ide_file_tree_right_click_duplicate_file_ajax(key, element, e) {
			var file_rel_path = instant_ide_get_rel_path(element, e);
			var name = element.find('a').first().text();
			var ext = name.split('.').pop();
			var file_type = $.inArray(ext, image_ext_array) > -1 ? 'image' : ext == 'zip' ? 'zip' : ext == 'gz' ? 'zip' : 'edit';
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					rel_path : file_rel_path,
					name : name,
					ext : ext
				},
				success : function(response) {
					if(response) {
						var created_file_name = response.substr(response.indexOf('|') + 1);
						element.after('<li class="iideft-file iideft-file-'+file_type+' ext-'+ext+'" data-file-name="'+created_file_name+'"><a href="#"><i class="iideft-file-icon" aria-hidden="true"></i>'+created_file_name+'</a></li>');
						instant_ide_elements_draggable();
						instant_ide_refresh_file_tree();
					}
				}
			});
		}
		
		function instant_ide_file_tree_right_click_create_file_ajax(key, element, e) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: 'Give your file a name',
				input: 'text',
				showCancelButton: true,
				confirmButtonText: 'Submit',
				preConfirm: (name) => {
					return new Promise((resolve) => {
						setTimeout(() => {
							if ($.inArray(name.split('.').pop(), image_ext_array) > -1) {
								Swal.showValidationMessage(
									'Image files cannot be created.'
								)
							}
							resolve()
						}, 0)
					})
				},
				allowOutsideClick: false
			}).then((result) => {
				if (result.value) {
					var file_rel_path = instant_ide_get_rel_path(element, e);
					var file_rel_path_slash = file_rel_path.indexOf('/') > -1 ? true: false;
					var actual_file_rel_path = file_rel_path_slash ? file_rel_path.substr(0, file_rel_path.lastIndexOf('/') + 1) : '';
					var name = element.attr('id') == 'iideft-root-directory' ? '' : element.find('a').first().text();
					var file_name = result.value;
					var ext = file_name.split('.').pop() == '' ? 'txt' : file_name.split('.').pop();
					$.ajax({
						type : 'POST',
						url : iide_url+'editor/file-editor-ajax.php',
						data : {
							action : 'instant_ide_file_tree_right_click_menu_action',
							ftrc_file_full_path : ftrc_file_full_path,
							context_menu_key : key,
							rel_path : actual_file_rel_path,
							name : name,
							file_name : file_name
						},
						success : function(response) {
							var response_error = response.substring(0, 5) == 'Error' ? true : false;
							if(response_error) {
								instant_ide_error_message_popup(response.split('|')[0]);
							} else {
								if(!element.find('a').first().hasClass('iideft-directory-open')) {
									element.find('a').first().click();
								} else {
								    instant_ide_refresh_file_tree();
								}
							}
						}
					});
				}
			})
		}
		
		function instant_ide_file_tree_right_click_install_ajax(key, element, e) {
			$('#instant-ide-file-editor-menu .instant-ide-ajax-save-spinner').show();
			var file_rel_path = instant_ide_get_rel_path(element, e);
			var name = element.attr('id') == 'iideft-root-directory' ? '' : element.find('a').first().text();
			var context_menu_key = key;
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_one_click_install',
					context_menu_key : context_menu_key,
					rel_path : file_rel_path,
					name : name
				},
				success : function(response) {
					var response_error = response.substring(0, 13) == 'Install Error' ? true : false;
					if(response_error) {
						instant_ide_error_message_popup(response);
					} else {
						$('#instant-ide-file-editor-menu .instant-ide-ajax-save-spinner').hide();
						$('#instant-ide-file-editor-menu .instant-ide-saved').html(response).fadeIn('slow');
						window.setTimeout(function() {
							$('#instant-ide-file-editor-menu .instant-ide-saved').fadeOut('slow'); 
						}, 2000);
						if(element.attr('id') != 'iideft-root-directory' && !element.find('a').first().hasClass('iideft-directory-opened')) {
							if(!element.find('a').first().hasClass('iideft-directory-open')) {
								element.find('a').first().click();
							}
						} else {
							$('#iideft-root-directory').load(window.location.href+' #iideft-root-directory > *', function() {
								$('.instant-ide-file-tree').find('ul').slice(1).hide();
							});
						}
						if(context_menu_key == 'install_october' && element.attr('id') == 'iideft-root-directory')
							var cms_install_url = iide_platform_url_dev_path+'/'+file_rel_path+'install.php';
						else if(context_menu_key == 'install_october' && element.attr('id') != 'iideft-root-directory')
							var cms_install_url = iide_platform_url_dev_path+'/'+file_rel_path+'/install.php';
						else
							var cms_install_url = iide_platform_url_dev_path+'/'+file_rel_path;
							
						var cms_name = response.replace(' Install Successful!', '');

	                    Swal.fire({
							onOpen: function() { instant_ide_stop_file_tree_interval(); },
							onAfterClose: function() { instant_ide_start_file_tree_interval(); },
	                        text: cms_name+' Installer Ready',
	                        icon: 'success'
	                    })
	                    .then((value) => {
							Swal.fire({
								onOpen: function() { instant_ide_stop_file_tree_interval(); },
								onAfterClose: function() { instant_ide_start_file_tree_interval(); },
								title: 'Run Installer!',
								text: 'To finalize the '+cms_name+' CMS installation just click the "Install" button below.',
								icon: 'success',
								showCancelButton: true,
								confirmButtonText: 'Install',
								cancelButtonText: 'Cancel'
							}).then((result) => {
								if (result.value) {
									window.open(cms_install_url, '_blank');
								}
							})
	                    })
					}
				}
			});
		}
		
		$.contextMenu({
			selector: '.instant-ide-file-tree-folder-right-clickable', 
		    events: {
		       show : function(options){
		            instant_ide_stop_file_tree_interval();
		            ftrc_file_full_path = $(this).attr('data-full-path');
		       },
		       hide : function(options){
		           instant_ide_start_file_tree_interval();         
		       }
		    },
			items: {
				open_folder: {
					name: 'Open',
					icon: 'fas fa-folder-open',
					callback: function(key, opt, e) {
						if(!$(this).find('a').first().hasClass('iideft-directory-open')) {
							$(this).find('a').first().click();
						}
					}
				},
				folder_upload_file: {
					name: 'Upload Files',
					icon: 'fas fa-file-upload',
					callback: function(key, opt, e) {
						// Make sure file tree interval is stopped before upload form initiates.
						setTimeout(function() {
							instant_ide_stop_file_tree_interval();
						}, 0);
						$('#instant-ide-file-editor-upload-form').attr('data-file-name', instant_ide_get_rel_path($(this), e)).attr('alt', key);
						$('#instant-ide-file-editor-upload-form-container').fadeToggle('medium');
						$('#instant-ide-file-editor-upload-form-overlay').fadeToggle('medium');
						// File tree interval is restarted at the end of this function...
						instant_ide_file_tree_right_click_upload_file_ajax(key, $(this));
					}
				},
				download_folder: {
					name: 'Download',
					icon: 'fas fa-file-download',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_download_file_ajax(key, $(this), e);
					}
				},
				find_in_folder: {
					name: 'Find In Folder',
					icon: 'fas fa-search',
					callback: function(key, opt, e) {
					    instant_ide_find_in_folder(key, $(this));
					}
				},
				'sep1': '---------',
				rename_folder: {
					name: 'Rename',
					icon: 'fas fa-edit',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_rename_folder_ajax($('.context-menu-active > a'), e);
						function instant_ide_file_tree_right_click_rename_folder_ajax(element, e) {
							var pre_file_name = element.parent().attr('data-file-name');
							var pre_file_clicked = false;
							if(element.hasClass('iideft-folder-clicked')) {
								pre_file_clicked = true;
							}
							Swal.fire({
								onOpen: function() { instant_ide_stop_file_tree_interval(); },
								onAfterClose: function() { instant_ide_start_file_tree_interval(); },
								title: 'Give your folder a new name',
								input: 'text',
								inputValue: pre_file_name,
								showCancelButton: true,
								confirmButtonText: 'Submit',
								preConfirm: (name) => {
									return new Promise((resolve) => {
										setTimeout(() => {
											if (name == '') {
												Swal.showValidationMessage(
													'The folder name field cannot be empty.'
												)
											}
											resolve()
										}, 0)
									})
								},
								allowOutsideClick: false
							}).then((result) => {
								if (result.value) {
									var file_rel_path = instant_ide_get_rel_path(element.parent(), e);
									var file_rel_path_slash = file_rel_path.indexOf('/') > -1 ? true: false;
									var pre_file_rel_path = file_rel_path_slash ? file_rel_path.substr(0, file_rel_path.lastIndexOf('/') + 1)+pre_file_name : pre_file_name;
									var new_file_name = result.value;
									var new_file_rel_path = pre_file_rel_path.substr(0, pre_file_rel_path.lastIndexOf('/') + 1)+new_file_name;
									var file_open = false;
									if($('.instant-ide-file-editor-tab-container').find('[data-file-name="'+pre_file_rel_path+'"]').length) {
										file_open = true;
									}
									$.ajax({
										type : 'POST',
										url : iide_url+'editor/file-editor-ajax.php',
										data : {
											action : 'instant_ide_file_tree_right_click_menu_action',
											ftrc_file_full_path : ftrc_file_full_path,
											context_menu_key : key,
											rel_path : pre_file_rel_path,
											old_name : pre_file_name,
											new_name : new_file_name,
											file_open : file_open
										},
										success : function(response) {
											if(response) {
												var response_error = response.substring(0, 12) == 'Rename Error' ? true : false;
												if(response_error) {
													instant_ide_error_message_popup(response.split('|')[0]);
												} else {
													var stripped_file_rel_path = file_rel_path.substring(0, file_rel_path.lastIndexOf(pre_file_name));
													var folder_rel_path_id = instant_ide_classify_string(stripped_file_rel_path);
													var folder_name_id = instant_ide_classify_string(new_file_name);
													element.parent().attr('id', 'iideft-directory-'+folder_rel_path_id+folder_name_id).attr('data-file-name', new_file_name);
													element.text(result.value);
													instant_ide_file_tree_selected_folder_check(element.parent());
													instant_ide_dir_status_update(type = 'open', action = 'replace', pre_file_rel_path, new_file_rel_path);
													instant_ide_dir_status_update(type = 'opened', action = 'replace', pre_file_rel_path, new_file_rel_path);
													setTimeout(function() {
													    instant_ide_refresh_file_tree();
													}, 500);
												}
											}
										}
									});
								}
							})
						}
					}
				},
				delete_folder: {
					name: 'Delete',
					icon: 'fas fa-trash-alt',
					callback: function(key, opt, e) {
						var folder_name = $(this).attr('data-file-name');
						instant_ide_conditional_delete_message_popup('You are about to delete the folder: '+folder_name, 'Do you want to continue?', key, $(this), e);
					}
				},
				'sep2': '---------',
				cut_folder: {
					name: 'Cut',
					icon: 'fas fa-cut',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_cut_copy_callback($(this), 'cut', 'folder', e);
						$(this).css('opacity', '0.5');
					}
				},
				copy_folder: {
					name: 'Copy',
					icon: 'fas fa-copy',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_cut_copy_callback($(this), 'copy', 'folder', e);
					}
				},
				paste_folder: {
					name: 'Paste',
					icon: 'fas fa-paste',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_paste_file_ajax(key, $(this), e);
						$('.instant-ide-file-tree li').css('opacity', '1');
					}
				},
				duplicate_folder: {
					name: 'Duplicate',
					icon: 'fas fa-clone',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_duplicate_folder_ajax(key, $(this), e);
					}
				},
				'sep3': '---------',
				folder_create_file: {
					name: 'New File',
					icon: 'fas fa-file-alt',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_create_file_ajax(key, $(this), e);
					}
				},
				folder_create_folder: {
					name: 'New Folder',
					icon: 'fas fa-folder-plus',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_create_folder_ajax(key, $(this), e);
					}
				},
				'sep4': '---------',
				preview_folder: {
					name: 'Preview Folder',
					icon: 'fas fa-eye',
					callback: function(key, opt, e) {
						instant_ide_file_tree_right_click_preview_folder_callback($(this), root = false, e);
					}
				},
				set_dev_path_folder: {
					name: 'Set As Dev Path',
					icon: 'fas fa-code',
					callback: function(key, opt, e) {
						if($('body').hasClass('instant-ide-dev-path-set')) {
							Swal.fire({
								onOpen: function() { instant_ide_stop_file_tree_interval(); },
								onAfterClose: function() { instant_ide_start_file_tree_interval(); },
								title: 'A New DEV Path Has Already Been Set!',
								text: 'To set a different DEV Path you must first reload Instant IDE. Would you like to do so now?',
								icon: 'success',
								showCancelButton: true,
								confirmButtonText: 'Yes',
								cancelButtonText: 'No'
							}).then((result) => {
								if (result.value) {
									setTimeout(function() { window.location.reload(true); }, 2000);
								}
							})
						} else {
							var new_dev_path = instant_ide_get_rel_path($(this), e);
							$('.sub-menu-paths li.sub-menu-paths-custom').each(function() {
								if($(this).attr('menu-dev-path') === $('#instant-ide-dev-path').val()+'/'+new_dev_path) {
									$(this).remove();
								}
							});
							$('.sub-menu-paths').prepend('<li id="sub-menu-paths-'+$(this).find('a').first().text()+'" class="sub-menu-paths-custom" menu-dev-path="'+$('#instant-ide-dev-path').val()+'/'+new_dev_path+'">Custom Path: '+$('#instant-ide-dev-path').val()+'/'+new_dev_path+'</li>');
							$('#instant-ide-dev-path').val($('#instant-ide-dev-path').val()+'/'+new_dev_path);
							$('body').addClass('instant-ide-dev-path-set');
							if($('.sub-menu-paths li.sub-menu-paths-custom').length > 5) {
								$('.sub-menu-paths li.sub-menu-paths-custom').last().remove();
							}
							instant_ide_define_paths_li_update($('.sub-menu-paths').html());
							instant_ide_save_state_reset();
							$('#instant-ide-dev-path').blur();
						}
					}
				},
				'sep5': '---------',
				install_wordpress: {
					name: 'Install WordPress',
					icon: 'fab fa-wordpress',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install WordPress inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				install_october: {
					name: 'Install October CMS',
					icon: 'fas fa-leaf',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install October CMS inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				install_grav: {
					name: 'Install Grav CMS',
					icon: 'fas fa-user-astronaut',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install Grav CMS inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				install_grav_admin: {
					name: 'Install Grav CMS w/Admin',
					icon: 'fas fa-user-astronaut',
					callback: function(key, opt, e) {
						instant_ide_conditional_install_message_popup('You are about to install Grav CMS w/Admin inside this directory', 'Do you want to continue?', key, $(this), e);
					}
				},
				'sep6': '---------',
				folder_properties: {
					name: 'Folder Properties',
					icon: 'fas fa-info-circle',
					callback: function(key, opt, e) {
					    var file_name = $(this).attr('data-file-name');
						instant_ide_file_tree_get_file_properties(ftrc_file_full_path, file_name, file_type = 'folder');
					}
				},
			}
		});
		
		function instant_ide_file_tree_right_click_delete_folder_ajax(key, element, e) {
			var file_rel_path = instant_ide_get_rel_path(element, e);
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					rel_path : file_rel_path
				},
				success : function(response) {
					var response_error = response.substring(0, 12) == 'Delete Error' ? true : false;
					if(response_error) {
						instant_ide_error_message_popup(response);
					} else {
						element.remove();
						instant_ide_dir_status_update(type = 'open', action = 'delete', file_rel_path);
						instant_ide_dir_status_update(type = 'opened', action = 'delete', file_rel_path);
						instant_ide_file_tree_selected_folder_check('');
					}
				}
			});
		}
		
		function instant_ide_file_tree_right_click_duplicate_folder_ajax(key, element, e) {
			var folder_rel_path = instant_ide_get_rel_path(element, e);
			var name = element.find('a').first().text();
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_right_click_menu_action',
					ftrc_file_full_path : ftrc_file_full_path,
					context_menu_key : key,
					rel_path : folder_rel_path,
					name : name
				},
				success : function(response) {
					if(response) {
						var created_folder_name = response.substr(response.indexOf('|') + 1);
						var folder_name_id = instant_ide_classify_string(folder_rel_path.substr(0, folder_rel_path.lastIndexOf('/')));
						element.after('<li id="iideft-directory-'+folder_name_id+'-'+created_folder_name+'" class="iideft-directory iideft-temp-directory" data-file-name="'+created_folder_name+'"><i class="fa fa-caret-right iideft-directory-icon" aria-hidden="true"></i><a href="#">'+created_folder_name+'</a><ul style="display: none;"></ul></li>');
						element.find('ul').first().children().clone().appendTo($('.iideft-temp-directory ul'));
						$('.iideft-temp-directory').removeClass('iideft-temp-directory');
						instant_ide_elements_draggable();
						instant_ide_refresh_file_tree();
					}
				}
			});
		}
		
		function instant_ide_file_tree_right_click_create_folder_ajax(key, element, e) {
			Swal.fire({
				onOpen: function() { instant_ide_stop_file_tree_interval(); },
				onAfterClose: function() { instant_ide_start_file_tree_interval(); },
				title: 'Give your folder a name',
				input: 'text',
				showCancelButton: true,
				confirmButtonText: 'Submit',
				preConfirm: (name) => {
					return new Promise((resolve) => {
						setTimeout(() => {
							if (name === '') {
								Swal.showValidationMessage(
									'You must give your folder a name.'
								)
							}
							resolve()
						}, 0)
					})
				},
				allowOutsideClick: false
			}).then((result) => {
				if (result.value) {
					var folder_rel_path = instant_ide_get_rel_path(element, e);
					var folder_rel_path_slash = folder_rel_path.indexOf('/') > -1 ? true: false;
					var actual_folder_rel_path = folder_rel_path_slash ? folder_rel_path.substr(0, folder_rel_path.lastIndexOf('/') + 1) : '';
					var name = element.attr('id') == 'iideft-root-directory' ? '' : element.find('a').first().text();
					var folder_name = result.value;
					$.ajax({
						type : 'POST',
						url : iide_url+'editor/file-editor-ajax.php',
						data : {
							action : 'instant_ide_file_tree_right_click_menu_action',
							ftrc_file_full_path : ftrc_file_full_path,
							context_menu_key : key,
							rel_path : actual_folder_rel_path,
							name : name,
							folder_name : folder_name
						},
						success : function(response) {
							var response_error = response.substring(0, 5) == 'Error' ? true : false;
							if(response_error) {
								instant_ide_error_message_popup(response.split('|')[0]);
							} else {
								if(!element.find('a').first().hasClass('iideft-directory-open')) {
									element.find('a').first().click();
								} else {
								    instant_ide_refresh_file_tree();
								}
							}
						}
					});
				}
			})
		}
		
		function instant_ide_file_tree_right_click_cut_copy_callback(element, action, source, e, dragged = false) {
			localStorage.iide_copy_file_folder_path = instant_ide_get_rel_path(element, e);
			localStorage.iide_copy_file_folder_action = action;
			localStorage.iide_copy_file_folder_source = source;
			$('.instant-ide-file-tree li').removeClass('instant-ide-file-tree-copied-item');
			instant_ide_file_tree_copied_file_check(element);
			element.addClass('instant-ide-file-tree-copied-item');
		}
		
		/* PHP File Tree */
		
		function instant_ide_get_rel_path(element, e = false, multi = false) {
			var rel_path = [];
			element.parents().each(function() {
				if($(this).hasClass('iideft-directory')) {
					rel_path.unshift($(this).find('a').first().text());
				}
			});
			var array_length = rel_path.length;
			var rel_path_string = '';
			for(var i = 0; i < array_length; i++) {
			    rel_path_string += rel_path[i]+'/';
			}
			if(false !== e && false === multi) {
				e.stopPropagation();
			}
			if(element.attr('id') == 'iideft-root-directory') {
				var final_path = '';
			} else {
				var final_path = rel_path_string+element.find('a').first().text();
			}
			return final_path.substring(final_path.indexOf('/') + 1);
		}
		
		$('#instant-ide-file-tree-container').on('click', '.iideft-directory > a', function(e) {
			if($(this).parent().attr('id') === 'iideft-root-directory' || $(this).parent().attr('id') === undefined) {
				return false;
			}
			var folder_rel_path = instant_ide_get_rel_path($(this).parent(), e);
			$(this).toggleClass('iideft-directory-open');
			if(!$(this).hasClass('iideft-directory-opened')) {
			    $(this).parent().find('i:first').replaceWith('<i class="iideft-directory-spinner-container"><img src="'+iide_url+'assets/css/images/ajax-save-in-progress.gif" class="instant-ide-directory-spinner" alt="Progress Spinner" height="16" width="16"></i>');
				$(this).addClass('iideft-directory-opened');
				// Interval restarted after ajax response in instant_ide_file_tree_li_folder_dblclicked_ajax() function.
				instant_ide_stop_file_tree_interval();
				instant_ide_dir_status_update(type = 'opened', action = 'add', folder_rel_path, folder_rel_path);
				instant_ide_dir_status_update(type = 'open', action = 'add', folder_rel_path);
			} else {
				$(this).parent().find('ul:first').slideToggle(0);
				if($(this).hasClass('iideft-directory-open')) {
					$(this).parent().find('i:first').replaceWith('<i class="fa fa-caret-down iideft-directory-icon" aria-hidden="true"></i>');
					instant_ide_dir_status_update(type = 'open', action = 'add', folder_rel_path);
				} else {
					$(this).parent().find('i:first').replaceWith('<i class="fa fa-caret-right iideft-directory-icon" aria-hidden="true"></i>');
					instant_ide_dir_status_update(type = 'open', action = 'close', folder_rel_path);
					setTimeout(function() {
						instant_ide_dir_status_update(type = 'opened', action = 'cleanup');
					}, 100);
				}
				instant_ide_elements_draggable();
				instant_ide_elements_droppable();
			}
			instant_ide_file_tree_scrollbar_check();
		}).on('click', '.iideft-directory > a', function() {
			instant_ide_file_tree_directory_clicked($(this));
		}).on('click', '.iideft-directory-icon', function() {
			$(this).next('a').click();
		}).on('contextmenu', '.iideft-directory > a', function() {
			instant_ide_file_tree_directory_clicked($(this));
		});
		
        function instant_ide_file_tree_directory_clicked(element) {
			instant_ide_file_tree_selected_file_check('');
			$('.iideft-file').removeClass('iideft-file-selected').removeClass('iideft-file-dblclicked');
			$('.iideft-directory a').removeClass('iideft-folder-clicked');
			element.addClass('iideft-folder-clicked');
			instant_ide_file_tree_selected_folder_check(element.parent());
        }

		function instant_ide_file_tree_scrollbar_check() {
		    setTimeout(function() {
    			if(false !== $('#instant-ide-file-tree-container').get(0).scrollHeight > $('#instant-ide-file-tree-container').get(0).clientHeight) {
    				$('#instant-ide-file-tree-container-wrap .instant-ide-file-tree-cog').css('right', '20px');
    			} else {
    				$('#instant-ide-file-tree-container-wrap .instant-ide-file-tree-cog').css('right', '10px');
    			}
		    }, 300);
		}
		instant_ide_file_tree_scrollbar_check();

		/**
		 * return value provides feedback regardin whether or not a path set to be removed actually existed to begin with.
		 * This is useful when trying to determine whether or not a dir was 'open' or not upon event.
		 */
		function instant_ide_dir_status_update(type, action, path = false, new_path = false, dir_closed = false) {
			var local_storage = type === 'open' ? localStorage.getItem('iide_open_dirs') : localStorage.getItem('iide_opened_dirs');
			if(action === 'add_multi') {
				local_storage = local_storage+','+path;
			}
			var dir_array = local_storage.split(',');
			if(action !== 'add_multi') {
				if(false === instant_ide_array_item_exists(dir_array, path) && (action === 'replace' || action === 'remove')) {
					return false;
				} else if(action === 'replace') {
					dir_array = instant_ide_array_dir_path_replace(dir_array, path, new_path);
				} else if(action === 'close' || action === 'delete') {
					dir_array = instant_ide_array_dir_path_remove(dir_array, path, action);
				} else if(action === 'cleanup') {
					dir_array = instant_ide_array_opened_dirs_cleanup(dir_array);
				} else if(action === 'add') {
					dir_array.push(path);
				} else if(action === 'reset') {
					dir_array = [];
				}
			}
			var dirs_updated = instant_ide_array_unique(dir_array);
			var dirs_updated_string = dirs_updated.toString();
			var new_dir_status = dirs_updated_string.charAt(0) == ',' ? dirs_updated_string.substr(1) : dirs_updated_string;
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_dir_status_write',
					status_type : type,
					dir_status : new_dir_status,
					dir_path : path
				},
				success : function(response) {
					if(response) {
						var dir_status_response = response;
						if(response === 'EMPTY') {
							dir_status_response = '';
						}
						if(type === 'open') {
							localStorage.setItem('iide_open_dirs', dir_status_response);
						} else {
							localStorage.setItem('iide_opened_dirs', dir_status_response);
							if(action === 'cleanup') {
								$('.iideft-directory > a').removeClass('iideft-directory-opened');
								$.each(dirs_updated, function(i, e) {
									$('.iideft-directory[data-rel-path = "/'+e+'"]').find('a').first().addClass('iideft-directory-opened');
								});
							}
							if(false !== new_path) {
								instant_ide_file_tree_li_folder_dblclicked_ajax(new_path, dir_closed);
							}
						}
					}
				}
			});
			return true;
		}

		function instant_ide_array_opened_dirs_cleanup(opened_dirs) {
			var result = [];
			var open_dirs_ls = localStorage.getItem('iide_open_dirs');
			var open_dirs_array = open_dirs_ls.split(',');
			$.each(opened_dirs, function(i, e) {
				var sub_items_open = [];
				$.each(open_dirs_array, function(i2, e2) {
					if(e2.startsWith(e)) {
						sub_items_open.push(e2);
					}
				});
				if(sub_items_open.length === 0) {
					$('.instant-ide-file-editor-tab').each(function(i2, e2) {
						if($(this).attr('data-file-name').startsWith(e+'/')) {
							sub_items_open.push($(this).attr('data-file-name'));
						}
					});
				}
				if(sub_items_open.length !== 0) {
					result.push(e);
				}
			});
			return result;
		}

		function instant_ide_array_dir_path_replace(array, path, new_path) {
			var result = [];
			$.each(array, function(i, e) {
				if(e === path || e.startsWith(path+'/')) {
					result.push(e.replace(path, new_path));
				} else {
					result.push(e);
				}
			});
			return result;
		}

		function instant_ide_array_dir_path_remove(array, path, action) {
			var result = [];
			$.each(array, function(i, e) {
				if(action === 'close') {
					if(e !== path) {
						result.push(e);
					}
				} else {
					if(!e.startsWith(path)) {
						result.push(e);
					}
				}
			});
			return result;
		}

		function instant_ide_array_item_exists(array, item) {
			var result = false;
			$.each(array, function(i, e) {
				if(e === item) {
					result = true;
				}
			});
			return result;
		}

		function instant_ide_array_unique(array) {
			var result = [];
			$.each(array, function(i, e) {
				if($.inArray(e, result) == -1) result.push(e);
			});
			result = result.filter(function(el) {
				return el != null;
			});
			return result;
		}
		
		$('#instant-ide-file-tree-container').on('click', '.iideft-file a', function(e) {
		    e.preventDefault();
		});
		
		instant_ide_file_editor_layout_sortable();
		
		function instant_ide_file_editor_layout_sortable() {
			$('#instant-ide-file-editor-tab-container-one, #instant-ide-file-editor-tab-container-two:visible').sortable({
				connectWith: '.instant-ide-file-editor-tab-container',
				items : '.instant-ide-file-editor-tab',
				axis: 'x',
				distance : 10,
				update: function(e,ui) {
					if(this === ui.item.parent()[0]) {
						instant_ide_file_editor_tab_moved(ui.item.attr('id'), $(this).attr('id'));
					}
				}
			}).disableSelection();
		}
		
		function instant_ide_classify_string(string) {
		    return string.replace(/[\W]+/g, '-').toLowerCase();
		}
		
		$('#instant-ide-file-tree-container').on('dblclick', '.iideft-file-edit', function() {
			instant_ide_file_tree_li_dblclicked_initial($(this), container_num = 'one');
		});

		function instant_ide_file_tree_li_dblclicked_initial(element, container_num, auto_load = false) {
			var file_rel_path = instant_ide_get_rel_path(element);
			var file_name_id = instant_ide_classify_string(file_rel_path);
			var tab_id = 'instant-ide-'+file_name_id+'-textarea-container-tab';
			var tab_container_id = $('#'+tab_id).parent().attr('id');
			if(!$('body').hasClass('instant-ide-open-file-reloading')) {
				instant_ide_file_tree_selected_file_check(element, dblclicked = true);
				element.addClass('iideft-file-dblclicked');
			}
			
			if(!$('#'+tab_id).length) {
				if(!$('body').hasClass('instant-ide-find-result-clicked')) {
					$('body').addClass('instant-ide-new-file-dblclicked');
				}
				var file_name = element.text();
				var file_ext = file_rel_path.split('.').pop();
				var file_ext_array = ['php', 'css', 'json', 'less', 'sass', 'scss', 'xml', 'ini', 'html', 'htm', 'yaml'];
				var file_ext_tab_array = ['php', 'css', 'git', 'js', 'md', 'json', 'less', 'sass', 'scss', 'xml', 'ini', 'html', 'htm', 'yaml'];
				var file_ext_text = $('body').hasClass('instant-ide-monaco-editor-active') ? 'plaintext' : 'text';
				
				if(false === auto_load) {
					var local_storage_dir_id_partial = instant_ide_classify_string(file_rel_path.substr(0, file_rel_path.lastIndexOf('/')));
					if(local_storage_dir_id_partial == '') {
						local_storage_dir_id = '#iideft-root-directory';
					} else {
						local_storage_dir_id = '#iideft-directory-'+local_storage_dir_id_partial;
					}
					var local_storage_file = local_storage_dir_id+' > ul > li.iideft-file[data-file-name = "'+file_name+'"]^'+file_rel_path+'^*'+container_num+'*|';
					var local_storage_files = localStorage.getItem('iide_open_files');
					if(local_storage_files.indexOf(local_storage_file) === -1) {
						var local_storage_update = localStorage.getItem('iide_open_files')+local_storage_file;
						localStorage.setItem('iide_open_files', local_storage_update);
					}
					localStorage.setItem('iide_file_dblclicked_state', local_storage_dir_id+' > ul > li.iideft-file[data-file-name = "'+file_name+'"]');
				}

				if(file_ext === 'js') {
					var data_editor = 'javascript';
				} else if(file_ext === 'md') {
					var data_editor = 'markdown';
				} else if($.inArray(file_ext, file_ext_array) > -1) {
					if(file_ext === 'htm') {
						var data_editor = 'html';
					} else {
						var data_editor = file_ext;
					}
				} else {
					var data_editor = file_ext_text;
				}
				
				if(file_ext !== 'ini' && $.inArray(file_ext, file_ext_tab_array) > -1) {
				    var tab_ext_icon = file_ext;
				} else {
				    var tab_ext_icon = 'default';
				}
				
				var textarea = '<div id="instant-ide-'+file_name_id+'-textarea-container" class="instant-ide-file-editor-textarea-container">';
				textarea += '<form action="/" id="instant-ide-'+file_name_id+'-textarea-form" class="instant-ide-file-editor-textarea-form" data-file-name="'+file_rel_path+'">';
				
				textarea += '<input type="hidden" name="action" value="instant_ide_file_editor_save" />';
				textarea += '<input class="instant-ide-file-editor-save-button" type="submit" value="Save Changes" name="Submit" alt="Save Changes" />';
				
				textarea += '<p style="margin:0;">';
				textarea += '<textarea data-editor="'+data_editor+'" wrap="off" id="instant-ide-'+file_name_id+'-textarea" class="instant-ide-tabby-textarea" name="iide[file]" rows="27" style="display:none;"></textarea>';
				textarea += '</p>';
				
				textarea += '</form>';
				textarea += '</div>';
				
				$('#instant-ide-file-editor-container-'+container_num).append(textarea);
				$('#instant-ide-file-editor-tab-container-'+container_num).append('<div id="'+tab_id+'" class="instant-ide-file-editor-tab instant-ide-file-editor-tab-active" title="/'+file_rel_path+'" data-file-name="'+file_rel_path+'" data-tab-container="one" data-line-number="-1"><img src="'+iide_url+'assets/css/images/icons/'+tab_ext_icon+'.svg" class="instant-ide-file-editor-tab-icon"><div class="instant-ide-file-editor-tab-text">'+file_name+'</div><div class="instant-ide-file-editor-tab-quit"></div></div>');
				if(false === auto_load) {
					$('#'+tab_id).click();
				}

				instant_ide_file_tree_li_dblclicked_ajax(file_rel_path, file_name_id);
				instant_ide_file_tree_li_dblclicked(element, file_name_id, container_num);

				if(container_num === 'two') {
					instant_ide_file_editor_tab_moved(tab_id, 'instant-ide-file-editor-tab-container-two', auto_load);
					if(!$('body').hasClass('instant-ide-file-editor-layout-two')) {
						instant_ide_editor_layout_toggle();
					}
				}
			} else if(tab_container_id !== 'instant-ide-file-editor-tab-container-'+container_num) {
				instant_ide_toggle_split_view($('#'+tab_id));
			} else {
				$('#'+tab_id).click();
			}
		}
		
		$('#instant-ide-file-tree-container').on('dblclick', '.iideft-file-image', function(e) {
			var file_rel_path = instant_ide_get_rel_path($(this), e);
			$('body').addClass('instant-ide-image-view-active');
			instant_ide_file_tree_selected_file_check($(this), dblclicked = true);
			$(this).addClass('iideft-file-dblclicked');
			
			$('#instant-ide-image-view-info-name').text($(this).text());
			$('#instant-ide-image-view-info-link').attr('href', iide_platform_url_dev_path+'/'+file_rel_path);
			
			var img = new Image();
			img.src = iide_platform_url_dev_path+'/'+file_rel_path;
			img.onload = function() {
				$('#instant-ide-image-view-info-width').text(this.width+'px');
				$('#instant-ide-image-view-info-height').text(this.height+'px');
				$('#instant-ide-image-file-preview').css('width', (this.width + 2)+'px');
			}
			
			var that = $(this);
			var xhr = new XMLHttpRequest();
			xhr.open('HEAD', iide_platform_url_dev_path+'/'+file_rel_path, true);
			xhr.onreadystatechange = function() {
				if ( xhr.readyState == 4 ) {
					if ( xhr.status == 200 ) {
						if ( that.hasClass('ext-svg') ) {
							$('#instant-ide-file-editor-image-view-info span:nth-child(2)').hide();
						} else {
							$('#instant-ide-file-editor-image-view-info span:nth-child(2)').show();
							$('#instant-ide-image-view-info-size').text(instant_ide_bytes_to_size(xhr.getResponseHeader('Content-Length'), 2));
						}
					} else {
						alert('ERROR');
					}
				}
			};
			xhr.send(null);
			
			$('#instant-ide-image-file-preview img').attr('src', iide_platform_url_dev_path+'/'+file_rel_path);
			setTimeout(function() {
				$('#instant-ide-file-editor-image-view-overlay').show();
				$('#instant-ide-file-editor-image-view-container').show();
			}, 300);
		});
		
		$('#instant-ide-file-tree-container').on('dblclick', '.iideft-file-zip', function(e) {
			instant_ide_file_tree_right_click_unzip_file_ajax('open_file', $(this), e);
		});
		
		$('#instant-ide-file-tree-container').on('dblclick', '.iideft-file-pdf', function(e) {
			var file_rel_path = instant_ide_get_rel_path($(this), e);
            var win = window.open(iide_platform_url_dev_path+'/'+file_rel_path, '_blank');
            if(win) {
                win.focus();
            } else {
                alert('Please allow popups for this website');
            }
		});
		
		/*
		 * NOTE: 'distance' is deprecated, but should be around
		 * for some time to come. I currently know of no better
		 * solution, so it will remain until either I find one
		 * or it has actually been removed from the JQUI library.
		 */
		function instant_ide_elements_draggable() {
			$('.iideft-file').not(':hidden').draggable({
				containment: '#instant-ide-file-tree-container',
				cursor: 'move',
				helper: 'clone',
				distance: 10,
				refreshPositions: true,
				start: function( event, ui ) { $(this).click(); instant_ide_stop_file_tree_interval(); },
				stop: function( event, ui ) { instant_ide_start_file_tree_interval(); }
			});
			
			$('.iideft-directory').not('#iideft-root-directory').not(':hidden').draggable({
				containment: '#instant-ide-file-tree-container',
				cursor: 'move',
				helper: 'clone',
				distance: 10,
				refreshPositions: true,
				start: function( event, ui ) { instant_ide_stop_file_tree_interval(); },
				stop: function( event, ui ) { instant_ide_start_file_tree_interval(); }
			});
		}
		
		instant_ide_elements_draggable();
		
		var drag_hover_timeout;
		
		function instant_ide_elements_droppable() {
			$('.iideft-directory').not(':hidden').droppable({
				greedy: true,
				over: function(e, ui){
					$('.iideft-directory').not($(this)).removeClass('ui-droppable-hover');
					$(this).addClass('ui-droppable-hover');
					$this = $(this).find('a').first();
					if(!$this.hasClass('iideft-directory-open')) {
						drag_hover_timeout = setTimeout(function() { $this.click(); }, 1000);
					}
				},
				out: function (e, ui){
					clearTimeout(drag_hover_timeout);
				},
				drop: function (e, ui){
        		    clearTimeout(drag_hover_timeout);
					$('.iideft-directory').removeClass('ui-droppable-hover');
        		    if($(this).attr('id') === undefined) {
        				instant_ide_file_tree_copied_file_check('');
        				localStorage.setItem('iide_copy_file_folder_path', '');
        				localStorage.setItem('iide_copy_file_folder_action', '');
        				localStorage.setItem('iide_copy_file_folder_source', '');
        		        return false;
        		    }
        			instant_ide_stop_file_tree_interval();
        			var draggable = ui.draggable;
        			if(draggable.hasClass('iideft-file')) {
        				instant_ide_file_tree_right_click_cut_copy_callback(draggable, 'cut', 'file', e, dragged = true);
        				instant_ide_file_tree_right_click_paste_file_ajax('paste_file', $(this), e, drop = true);
        			} else {
        				instant_ide_file_tree_right_click_cut_copy_callback(draggable, 'cut', 'folder', e, dragged = true);
        				instant_ide_file_tree_right_click_paste_file_ajax('paste_folder', $(this), e, drop = true);
        			}
        			setTimeout(function() {
        			    instant_ide_start_file_tree_interval();
        			}, 0);
				}
			});
		}
		
		instant_ide_elements_droppable();
		
		$('#instant-ide-file-tree-container').on('click', '.iideft-file', function(e) {
			if(!e.shiftKey) {
				instant_ide_file_tree_selected_folder_check('');
				$('.iideft-directory a').removeClass('iideft-folder-clicked');
				$('.iideft-file').removeClass('iideft-file-selected').removeClass('iideft-file-dblclicked');
				$(this).addClass('iideft-file-selected');
				instant_ide_file_tree_selected_file_check($(this));
			}
		}).on('contextmenu', '.iideft-file', function(e) {
			if(!e.shiftKey && $('.iideft-file-selected').length < 2) {
				$(this).click();
			}
		});
		
		function instant_ide_file_tree_selected_folder_check(element, plain_id = false) {
			if(element === '') {
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-folder-id', '');
				localStorage.setItem('iide_selected_folder_id', '');
			} else {
			    var el_id = plain_id !== false ? element : element.attr('id');
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-folder-id', el_id);
				localStorage.setItem('iide_selected_folder_id', el_id);
			}
		}
		
		function instant_ide_file_tree_selected_file_check(element, dblclicked = false, parent_id = '', new_name = false) {
			if(element === '') {
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-parent-dir', '');
				localStorage.setItem('iide_selected_file_parent_dir', '');
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-file', '');
				localStorage.setItem('iide_selected_file', '');
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-dblclicked', 'false');
				localStorage.setItem('iide_selected_file_dblclicked', 'false');
			} else {
				if(parent_id !== '') {
					var parent_dir_id = parent_id;
				} else {
					var parent_dir_id = element.parent().parent().attr('id');
				}
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-parent-dir', parent_dir_id);
				localStorage.setItem('iide_selected_file_parent_dir', parent_dir_id);
				if(false !== new_name) {
					var file_name = new_name;
				} else {
					var file_name = element.attr('data-file-name');
				}
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-file', file_name);
				localStorage.setItem('iide_selected_file', file_name);
				$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-dblclicked', dblclicked);
				localStorage.setItem('iide_selected_file_dblclicked', dblclicked);
			}
		}
		
		function instant_ide_file_tree_copied_file_check(element) {
			if(element === '') {
				$('#instant-ide-file-tree-container-wrap').attr('data-copied-file-parent-dir', '');
				$('#instant-ide-file-tree-container-wrap').attr('data-copied-file', '');
			} else {
				$('#instant-ide-file-tree-container-wrap').attr('data-copied-file-parent-dir', element.parent().parent().attr('id'));
				$('#instant-ide-file-tree-container-wrap').attr('data-copied-file', element.attr('data-file-name'));
			}
		}
		
		$('.instant-ide-file-editor-container').on('click', function() {
			instant_ide_file_tree_selected_file_check($('.iideft-file-selected'), dblclicked = true);
			$('.iideft-file-selected').addClass('iideft-file-dblclicked');
			$('.iideft-file-selected').removeClass('iideft-file-selected');
		});
		
		$('.iideft-file-selected').blur(function() {
			instant_ide_file_tree_selected_file_check($(this), dblclicked = true);
			$('.iideft-file').removeClass('iideft-file-selected').removeClass('iideft-file-dblclicked');
			$(this).addClass('iideft-file-dblclicked');
		});
		
		$('#instant-ide-file-tree-container').on('contextmenu', '.iideft-file-dblclicked', function() {
			instant_ide_file_tree_selected_file_check($(this));
			$('.iideft-file-dblclicked').addClass('iideft-file-selected').removeClass('iideft-file-dblclicked');
		});
		
		$('.instant-ide-settings-wrap').on('click', '.instant-ide-file-editor-tab', function(e) {
	        if($(e.target).is('.instant-ide-file-editor-tab-quit')) {
	            e.preventDefault();
	            return false;
	        }
			var tab_id = $(this).attr('id');
			var tab_container_id = $(this).parent().attr('id');
			instant_ide_file_editor_tab_clicked(tab_id, tab_container_id);
		});
		
		function instant_ide_file_editor_tab_clicked(tab_id, tab_container_id) {
			var textarea_id = tab_id.slice(0,-4);
			var textarea_container_id = tab_container_id.replace('-tab', '');
			if($('#'+tab_container_id+' .instant-ide-file-editor-tab').length > 1) {
				var tab = $('#'+tab_container_id+' .instant-ide-file-editor-tab');
				var active_tab = $('#'+tab_container_id+' .instant-ide-file-editor-tab-active');
				tab.removeClass('instant-ide-file-editor-tab-last-active').removeClass('instant-ide-file-editor-tab-active');
				active_tab.addClass('instant-ide-file-editor-tab-last-active');
			}
			$('#'+tab_id).removeClass('instant-ide-file-editor-tab-last-active').addClass('instant-ide-file-editor-tab-active');
			$('#'+textarea_container_id+' .instant-ide-file-editor-textarea-container').hide();
			$('#'+textarea_id).show();
			$('#'+textarea_container_id+' form.instant-ide-file-editor-textarea-form').removeClass('instant-ide-file-editor-active-form');
			$('form#'+textarea_id.slice(0, -9)+'form').addClass('instant-ide-file-editor-active-form');
			$('.instant-ide-file-editor-tab').css('z-index', 1);
			$('.instant-ide-file-editor-tab-active').css('z-index', 2);
			if($('#'+tab_id).hasClass('instant-ide-file-editor-tab-changed')) {
				var tab_rel_path = $('#'+tab_id).attr('data-file-name').split('/');
				var tab_file_name = tab_rel_path.pop();
				instant_ide_conditional_open_file_changed_message_popup('Find/Replace Has Changed "'+tab_file_name+'"!', 'Would you like to reload it now?', $('#'+tab_id));
			}
			if(!$('body').hasClass('instant-ide-find-result-clicked')) {
				$('#'+tab_id).attr('data-line-number', '-1');
			}
			if(tab_container_id === 'instant-ide-file-editor-tab-container-one') {
				localStorage.setItem('iide_active_tab_one_state', '#'+tab_id);
				if($('#instant-ide-file-editor-tab-container-two .instant-ide-file-editor-tab').length === 0) {
				    localStorage.setItem('iide_active_tab_two_state', '');
				}
			} else {
				localStorage.setItem('iide_active_tab_two_state', '#'+tab_id);
			}
		}
		
		function instant_ide_file_editor_tab_moved(tab_id, tab_container_id, auto_load = false) {
			var textarea_id = tab_id.slice(0,-4);
			var textarea_container_id = tab_container_id.replace('-tab', '');
			var original_tab_container_id_num = $('#'+tab_id).attr('data-tab-container');
			var current_tab_container_id_num = tab_container_id.split('-').pop();
			$('#'+tab_id).attr('data-tab-container', current_tab_container_id_num);
			if(original_tab_container_id_num !== current_tab_container_id_num) {
				$('#'+textarea_id).appendTo('#'+textarea_container_id);
				if(false === auto_load) {
					instant_ide_file_editor_tab_check();
				}
				if($('#instant-ide-file-editor-tab-container-two .instant-ide-file-editor-tab').length === 0) {
					instant_ide_editor_layout_toggle();
				}
			}
			if(false === auto_load) {
				setTimeout(function() {
					$('#'+tab_id).click();
				}, 0);
			}
			// Update localStorage iide_open_files tab container value.
			var local_storage_current = localStorage.getItem('iide_open_files');
			var local_storage_updated = '';
			var local_stoarage_current_array = $.grep(local_storage_current.split('|'), function(n){ return (n); });
			var moved_tab_data_file_name = $('#'+tab_id).attr('data-file-name');
			$.each(local_stoarage_current_array, function(index, value) {
				if(value.split('^')[1].split('^')[0] === moved_tab_data_file_name) {
					local_storage_updated += value.replace('*'+original_tab_container_id_num+'*', '*'+current_tab_container_id_num+'*')+'|';
				} else {
					local_storage_updated += value+'|';
				}
			});
			localStorage.setItem('iide_open_files', local_storage_updated);
		}
		
		function instant_ide_file_editor_tab_check() {
			$('.instant-ide-file-editor-tab-container:visible').each(function() {
				var textarea_container_id = $(this).attr('id').replace('-tab', '');
				if($(this).find('.instant-ide-file-editor-tab').length > 0 && $('#'+textarea_container_id).find('.instant-ide-file-editor-active-form').length === 0) {
					$(this).find('.instant-ide-file-editor-tab').click();
				}
			});
		}
		
		$('.instant-ide-settings-wrap').on('click', '.instant-ide-file-editor-tab-quit', function() {
			var confirm_message = 'This file has unsaved changes. Are you sure you want to close it?';
			if($(this).hasClass('file-changed') && !confirm(confirm_message)) {
				return false;
			}
			var tab_id = $(this).parent().attr('id');
			instant_ide_file_editor_tab_quit_clicked(tab_id);
			setTimeout(function() {
				instant_ide_dir_status_update(type = 'opened', action = 'cleanup');
			}, 100);
		});

		function instant_ide_file_editor_tab_quit_clicked(tab_id) {
			var tab_container_id = $('#'+tab_id).parent().attr('id');
			var tab_container_id_num = tab_container_id.split('-').pop();
			var textarea_id = tab_id.slice(0,-4);
			var active_textarea = $('form#'+textarea_id.slice(0, -9)+'form').hasClass('instant-ide-file-editor-active-form') ? true : false;
			var last_active_tab_id = $('#'+tab_container_id+'.instant-ide-file-editor-tab-container').find('.instant-ide-file-editor-tab-last-active').attr('id');
			var next_tab_id = $('#'+tab_container_id+'.instant-ide-file-editor-tab-container').find('.instant-ide-file-editor-tab:not(#'+tab_id+')').attr('id');
			if(active_textarea && last_active_tab_id != undefined) {
				instant_ide_file_editor_tab_clicked(last_active_tab_id, tab_container_id);
			} else if(active_textarea && next_tab_id != undefined) {
				instant_ide_file_editor_tab_clicked(next_tab_id, tab_container_id);
			}

			if($('#'+tab_container_id+' .instant-ide-file-editor-tab').length === 1 && tab_container_id === 'instant-ide-file-editor-tab-container-one') {
				localStorage.setItem('iide_active_tab_one_state', '');
			} else if($('#'+tab_container_id+' .instant-ide-file-editor-tab').length === 1 && tab_container_id === 'instant-ide-file-editor-tab-container-two') {
				localStorage.setItem('iide_active_tab_two_state', '');
			}
			
			var local_storage_current = localStorage.getItem('iide_open_files');
			var local_storage_updated = '';
			var local_stoarage_current_array = $.grep(local_storage_current.split('|'), function(n){ return (n); });
			var closed_data_file_name = $('#'+tab_id).attr('data-file-name');
			$.each(local_stoarage_current_array, function(index, value) {
				if(value.split('^')[1].split('^')[0] !== closed_data_file_name) {
					local_storage_updated += value+'|';
				}
			});
			localStorage.setItem('iide_open_files', local_storage_updated);

			$('#'+tab_id).remove();
			$('#'+textarea_id).remove();
			setTimeout(function() {
				if(tab_container_id_num === 'two' && $('#instant-ide-file-editor-tab-container-two .instant-ide-file-editor-tab').length === 0) {
					instant_ide_editor_layout_toggle();
				}
			}, 0);
		}
		
		function instant_ide_file_tree_li_dblclicked(element, file_name_id, container_num) {
			var textarea_id = 'instant-ide-'+file_name_id+'-textarea-container';
			$('#instant-ide-file-editor-container-'+container_num+' .instant-ide-file-editor-textarea-container').hide();
			$('#'+textarea_id).show();
			$('#instant-ide-file-editor-container-'+container_num+' form.instant-ide-file-editor-textarea-form').removeClass('instant-ide-file-editor-active-form');
			$('form#'+textarea_id.slice(0, -9)+'form').addClass('instant-ide-file-editor-active-form');
			$('.iideft-file').removeClass('iideft-file-active');
			element.addClass('iideft-file-active');
			setTimeout(function() {
				if($('body').hasClass('instant-ide-new-file-dblclicked')) {
					$('body').removeClass('instant-ide-new-file-dblclicked');
				}
			}, 300);
		}
		
		function instant_ide_file_tree_li_dblclicked_ajax(file_rel_path, file_name_id) {
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_file_open',
					file_rel_path : file_rel_path
				},
				success : function(response) {
					if(response) {
						if(response === 'iide_empty_file') {
							response = '';
						}
						$('#instant-ide-'+file_name_id+'-textarea').text(response);
						if($('body').hasClass('instant-ide-monaco-editor-active')) {
							instant_ide_monaco_editor_build('instant-ide-'+file_name_id+'-textarea');
						} else {
							instant_ide_ace_editor_build('instant-ide-'+file_name_id+'-textarea');
						}
					}
				}
			});
		}
		
		function instant_ide_file_tree_li_folder_dblclicked_ajax(folder_rel_path, dir_closed = false) {
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_file_tree_folder_open',
					folder_rel_path : folder_rel_path
				},
				success : function(response) {
					if(response) {
						setTimeout(function() {
							var element = $('.iideft-directory[data-rel-path="/'+folder_rel_path+'"]');
							var element_child = $('.iideft-directory[data-rel-path="/'+folder_rel_path+'"]').find('a').first();
							if(response !== 'Folder Empty') {
								element.find('ul').first().empty().append(response);
								setTimeout(function() {
    								instant_ide_elements_draggable();
    								instant_ide_elements_droppable();
								}, 500);
								if(!$('.ui-droppable-active').length) {
								    instant_ide_start_file_tree_interval();
								}
							}
							if(false === dir_closed) {
								element.find('ul').first().slideToggle(0);
								element.find('i').first().replaceWith('<i class="fa fa-caret-down iideft-directory-icon" aria-hidden="true"></i>');
							}
							element_child.css('background-image', '').css('background-size', '');
						}, 100);
					}
				}
			});
		}
		
		function instant_ide_bytes_to_size(bytes,decimals) {
			if(bytes == 0) return '0 Bytes';
			var k = 1024,
			dm = decimals || 2,
			sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'],
			i = Math.floor(Math.log(bytes) / Math.log(k));
			return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
		}
		
		function instant_ide_get_url_parameter(sParam) {
		    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
		        sURLVariables = sPageURL.split('&'),
		        sParameterName,
		        i;
	
		    for(i = 0; i < sURLVariables.length; i++) {
		        sParameterName = sURLVariables[i].split('=');
	
		        if(sParameterName[0] === sParam) {
		            return sParameterName[1] === undefined ? true : sParameterName[1];
		        }
		    }
		}
		
		/* END PHP File Tree */
		
		/* Build Tools Display */
		
		function instant_ide_build_tool_file_check() {
		    
		    var build_tool_files = ['package.json', 'gulpfile.js', 'gulpfile.babel.js', 'cobalt-scss.json', 'cobalt-less.json'];
		    var build_tools_active = [];
		    
		    $.each(build_tool_files, function(index, value) {
		        if($('.iideft-file-edit[data-file-name="'+value+'"]').length) {
		            build_tools_active.push(value);
		        }
		    });
		    
		    if(build_tools_active.length !== 0) {
		        
		        $('.instant-ide-build-tool-icons-container').show();
		        
				if($.inArray('package.json', build_tools_active) !== -1)
					$('.instant-ide-build-tool-icons-container .fa-npm').show();
				else
					$('.instant-ide-build-tool-icons-container .fa-npm').hide();
				
				if($.inArray('gulpfile.js', build_tools_active) !== -1 || $.inArray('gulpfile.babel.js', build_tools_active) !== -1)
					$('.instant-ide-build-tool-icons-container .fa-gulp').show();
				else
					$('.instant-ide-build-tool-icons-container .fa-gulp').hide();
				
				if($.inArray('cobalt-scss.json', build_tools_active) !== -1)
					$('.instant-ide-build-tool-icons-container .fa-sass').show();
				else
					$('.instant-ide-build-tool-icons-container .fa-sass').hide();
					
				if($.inArray('cobalt-less.json', build_tools_active) !== -1)
					$('.instant-ide-build-tool-icons-container .fa-less').show();
				else
					$('.instant-ide-build-tool-icons-container .fa-less').hide();
		        
		    }
			
		}
		
		instant_ide_build_tool_file_check();
		
		/* END Build Tools Display */
		
		$('#instant-ide-file-editor-container-wrap').on('submit', '.instant-ide-file-editor-active-form', function() {
		    instant_ide_stop_file_tree_interval();
			$('#instant-ide-file-editor-menu .instant-ide-ajax-save-spinner').show();
			var file_full_path = $('#iideft-root-directory').attr('data-full-path')+'/'+$(this).attr('data-file-name');
			var file_rel_path = $(this).attr('data-file-name');
			if($('body').hasClass('instant-ide-site-preview-active')) {
				var site_preview_active = true;
			} else {
				var site_preview_active = false;
			}
			var data = $(this).serialize()+'&file_full_path='+file_full_path+'&file_rel_path='+file_rel_path+'&site_preview_active='+site_preview_active+'&save_action=file-editor-save';
			$.post(iide_url+'editor/file-editor-ajax.php', data, function(response) {
				if(response) {
					if(response !== 'File Updated' && site_preview_active) {
						instant_ide_file_editor_form_submit_show_message('File Updated');
						$('#instant-ide-site-preview-container').html('<div id="instant-ide-site-preview">'+response+'</div>');
					} else if(response !== 'File Updated') {
						instant_ide_file_editor_form_submit_show_message('File Updated - '+response);
					} else {
						instant_ide_file_editor_form_submit_show_message(response);
						if(site_preview_active) {
							if($('#instant-ide-less-php-error-message').length != 0 || $('#instant-ide-scss-php-error-message').length != 0) {
								var address_bar_url = $('#instant-ide-site-preview-icons-url-view-url').text();
								$('#instant-ide-site-preview-container').html('<iframe id="instant-ide-site-preview" src="'+address_bar_url+'?timestamp='+Date.now()+'"></iframe>');
							    $('#instant-ide-site-preview').on('load', function() {
							    	var that = $(this);
							        instant_ide_site_preview_on_load(that);
							    });
							} else {
								setTimeout(function() { document.getElementById('instant-ide-site-preview').contentWindow.location.reload(); }, iide_reload_delay);
							}
						}
					}
				}
			});
			
			return false;
		});
		
		function instant_ide_file_editor_form_submit_show_message(response) {
			$('#instant-ide-file-editor-menu .instant-ide-ajax-save-spinner').hide();
			$('.instant-ide-file-editor-tab-active .instant-ide-file-editor-tab-quit').removeClass('file-changed');
			$('#instant-ide-file-editor-menu .instant-ide-saved').html(response).fadeIn('slow');
			if(response === 'File Updated' || $('body').hasClass('instant-ide-site-preview-active')) {
				window.setTimeout(function() {
					$('#instant-ide-file-editor-menu .instant-ide-saved').fadeOut('slow');
					instant_ide_start_file_tree_interval();
				}, 2000);
			}
		}
		
		$('#sub-menu-add-users').click(function() {
			window.location.href = iide_url+'?enable_setup=true&add_users=true';
		});
		
		$('#sub-menu-delete-users').click(function() {
			window.location.href = iide_url+'?enable_setup=true&delete_users=true';
		});
		
		$('#sub-menu-visit-home').click(function() {
			window.location.href = iide_platform_url;
		});
		
		$('#sub-menu-logout').click(function() {
			window.location.href = iide_url+'logout.php';
		});
		
		$('#sub-menu-open').click(function() {
			$('.iideft-file-selected').dblclick();	
		});
		
		$('#sub-menu-save').click(function() {
			$('.instant-ide-file-editor-active-form .instant-ide-file-editor-save-button').click();
		});
		
		$('#sub-menu-console-open').click(function() {
			if(!$('body').hasClass('instant-ide-console-active')) {
				$('body').addClass('instant-ide-console-active');
				$('#instant-ide-file-editor-console-container').html('<div class="instant-ide-console-find-window-overlay"></div>'+console_iframe);
				setTimeout(function () {
					var iframe_dom = $('iframe#instant-ide-file-editor-console').contents();
					iframe_dom.find('body').removeClass(function(index, className) {
						return (className.match(/(^|\s)instant-ide-theme-\S+/g) || []).join(' ');
					}).addClass('instant-ide-theme-'+localStorage.getItem('iide_theme'));
				}, 1500);
				instant_ide_splitter_loader();
			}
			localStorage.setItem('iide_console_state', 'open');
		    instant_ide_console_find_window_toggle('console', 'open');
		});
		
		$('#sub-menu-console-close').click(function() {
			localStorage.setItem('iide_console_state', 'closed');
			$('body').removeClass('instant-ide-console-active');
			$('#instant-ide-file-editor-console-container').html('');
		    instant_ide_console_find_window_toggle('console', 'close');
			instant_ide_splitter_loader();
		});
		
		$('#sub-menu-console-restart').click(function() {
			if($('body').hasClass('instant-ide-console-active')) {
				$('#instant-ide-file-editor-console-container').html(console_iframe);
			}
		});
		
		$('.sub-menu-snippets').click(function() {
			var id = $(this).attr('id');
			if(id.indexOf('console') >= 0) {
				if($('#instant-ide-file-editor-file-snippets-container').length) {
					$('#instant-ide-file-editor-file-snippets-container').hide();
				}
				$('#instant-ide-file-editor-console-snippets-container').slideToggle();
			} else {
				if($('#instant-ide-file-editor-console-snippets-container').length) {
					$('#instant-ide-file-editor-console-snippets-container').hide();
				}
				$('#instant-ide-file-editor-file-snippets-container').slideToggle();
			}
		});
		
		$('.instant-ide-file-editor-snippets-close').click(function() {
			var id = $(this).parent().attr('id');
			$('.instant-ide-file-editor-snippets-container').slideUp();
		});
		
		$('.sub-menu-paths li').click(function() {
			var dev_path = $(this).attr('menu-dev-path');
			if(dev_path != localStorage.getItem('iide_dev_path')) {
				if($(this).hasClass('sub-menu-paths-custom')) {
					var this_html = $(this)[0].outerHTML;
					$(this).remove();
					$('.sub-menu-paths').prepend(this_html);
				}
				instant_ide_define_paths_li_update($('.sub-menu-paths').html());
				instant_ide_save_state_reset();
				$('#instant-ide-dev-path').val(dev_path);
				$('#instant-ide-dev-path').blur();
			}
		});
		
		$('#sub-menu-site-preview-open').click(function() {
			if(!$('body').hasClass('instant-ide-site-preview-active')) {
				localStorage.setItem('iide_site_preview_state', 'open');
				$('body').addClass('instant-ide-site-preview-active');
				$('body').removeClass('instant-ide-site-preview-file-tree-active');
				$('.instant-ide-site-preview-icons-container').show();
			    if($($('.instant-ide-saved:contains("LESS Compile Error")').length > 0 || '.instant-ide-saved:contains("SCSS Compile Error")').length > 0) {
			    	$('.instant-ide-file-editor-active-form .instant-ide-file-editor-save-button').click();
			    } else {
			    	$('#instant-ide-site-preview-container').html('<iframe id="instant-ide-site-preview" src="'+localStorage.getItem('iide_site_preview_url')+'?timestamp='+Date.now()+'"></iframe>');
			    }
				$('#instant-ide-site-preview-icons-url-view-url').text(localStorage.getItem('iide_site_preview_url')).attr('contenteditable', 'true').on('focusin', function() {
				    $('body').addClass('instant-ide-site-preview-address-bar-active');
				}).on('focusout', function() {
				    $('body').removeClass('instant-ide-site-preview-address-bar-active');
				});
				instant_ide_splitter_loader();
			    $('#instant-ide-site-preview').on('load', function() {
			    	var that = $(this);
			        instant_ide_site_preview_on_load(that);
			    });
			}
		});
		
		function instant_ide_site_preview_on_load(that) {
		    instant_ide_site_preview_resize();
		    $(window).resize(instant_ide_site_preview_resize);
	        that.contents().on('mousedown, mouseup, click', function() {
	        	setTimeout(function() {
					var current_url = document.getElementById('instant-ide-site-preview').contentWindow.location.href;
		            $('#instant-ide-site-preview-icons-url-view-url').text(current_url.split('?')[0]);
		            localStorage.setItem('iide_site_preview_url', current_url.split('?')[0]);
	        	}, 1000);
	        });
		}
		
		function instant_ide_site_preview_resize() {
		    if(!$('body').hasClass('instant-ide-site-preview-active')) {
                return false;   
		    }
    		var width = Math.round($('#instant-ide-site-preview').width());
    		var height = Math.round($('#instant-ide-site-preview').height());
    		$('#instant-ide-site-preview-size-indicator').text('w: '+width+'px / h: '+height+'px');
		}
		
		$('#sub-menu-site-preview-close').click(function() {
			localStorage.setItem('iide_site_preview_state', 'closed');
			localStorage.setItem('iide_site_preview_url', iide_platform_url+'/')
			$('body').removeClass('instant-ide-site-preview-active');
			$('.instant-ide-site-preview-icons-container').hide();
			$('.instant-ide-file-tree-cog').show();
			$('#instant-ide-site-preview-container').html('');
			$('.instant-ide-build-tool-icons-container').css('margin-right', '0');
			instant_ide_splitter_loader();
		});
		
		$('#sub-menu-site-preview-restart').click(function() {
			if($('body').hasClass('instant-ide-site-preview-active')) {
				$('#instant-ide-site-preview-container').html('<iframe id="instant-ide-site-preview" src="'+iide_platform_url+'?timestamp='+Date.now()+'"></iframe>');
				$('#instant-ide-site-preview-icons-url-view-url').text(iide_platform_url+'/');
				localStorage.setItem('iide_site_preview_url', iide_platform_url+'/');
			    $('#instant-ide-site-preview').on('load', function() {
			    	var that = $(this);
			        instant_ide_site_preview_on_load(that);
			    });
			}
		});
		
		function instant_ide_file_tree_right_click_preview_folder_callback(element, root, e) {
			if(!$('body').hasClass('instant-ide-site-preview-active')) {
				$('#sub-menu-site-preview-open').click();
			}
			if(root) {
				var preview_url = iide_platform_url+'/';
			} else {
				var preview_url = iide_platform_url+'/'+instant_ide_get_rel_path(element, e)+'/';
			}
			$('#instant-ide-site-preview-container').html('<iframe id="instant-ide-site-preview" src="'+preview_url+'?timestamp='+Date.now()+'"></iframe>');
		    $('#instant-ide-site-preview-icons-url-view-url').text(preview_url);
		    localStorage.setItem('iide_site_preview_url', preview_url);
		    $('#instant-ide-site-preview').on('load', function() {
		    	var that = $(this);
		        instant_ide_site_preview_on_load(that);
		    });
		}
		
		$('.instant-ide-site-preview-icons-container i:not(.fa-external-link-alt)').click(function() {
			if($(this).hasClass('fa-sync-alt')) {
				document.getElementById('instant-ide-site-preview').contentWindow.location.reload();
		    } else if($(this).hasClass('fa-arrow-left')) {
				document.getElementById('instant-ide-site-preview').contentWindow.history.back();
	        	setTimeout(function() {
					var current_url = document.getElementById('instant-ide-site-preview').contentWindow.location.href;
		            $('#instant-ide-site-preview-icons-url-view-url').text(current_url.split('?')[0]);
		            localStorage.setItem('iide_site_preview_url', current_url.split('?')[0]);
	        	}, 1000);
		    } else if($(this).hasClass('fa-arrow-right')) {
				document.getElementById('instant-ide-site-preview').contentWindow.history.forward();
	        	setTimeout(function() {
					var current_url = document.getElementById('instant-ide-site-preview').contentWindow.location.href;
		            $('#instant-ide-site-preview-icons-url-view-url').text(current_url.split('?')[0]);
		            localStorage.setItem('iide_site_preview_url', current_url.split('?')[0]);
	        	}, 1000);
			} else {
				var width = $(this).attr('title').split('x')[0];
				var height = $(this).attr('title').split('x')[1];
				if(width == '100') {
					$('#instant-ide-site-preview').css('width', '100%').css('min-width', '1300px').css('height', '100%');
				} else {
					$('#instant-ide-site-preview').css('width', width+'px').css('min-width', width+'px').css('height', height+'px');
				}
				instant_ide_site_preview_resize();
			}
		});
		
		$('.instant-ide-site-preview-icons-container i.fa-external-link-alt').click(function() {
			var current_url = document.getElementById('instant-ide-site-preview').contentWindow.location.href;
			window.open(current_url.split('?')[0], '_blank');
		});

		function instant_ide_site_preview_menu_position() {
			$('#instant-ide-site-preview-icons-url-view').width($('#instant-ide-site-preview-container').width() - 339);
			if($('body').hasClass('instant-ide-site-preview-active')) {
				var build_icons_margin = $('#instant-ide-site-preview-container').width() - 324;
			} else {
				var build_icons_margin = 0;
			}
			$('.instant-ide-build-tool-icons-container').css('margin-right', build_icons_margin);
		}
		
		$('#sub-menu-options-open').click(function() {
			$('body').addClass('instant-ide-options-active');
			$('#instant-ide-file-editor-options-container').fadeIn('medium');
			$('#instant-ide-file-editor-options-overlay').fadeIn('medium');
			$(this).addClass('menu-item-popup-active');
		});
		
		$('#sub-menu-options-close').click(function() {
			$('body').removeClass('instant-ide-options-active');
			$('#instant-ide-file-editor-options-container').fadeOut('medium');
			$('#instant-ide-file-editor-options-overlay').fadeOut('medium');
			$('#sub-menu-options-open').removeClass('menu-item-popup-active');
		});
		
		$('#sub-menu-options-reset').click(function() {
			instant_ide_conditional_options_reset_message_popup('You are about to reset the Instant IDE Optoins', 'Do you want to continue?');
		});
		
		$('.menu-heading-help').click(function() {
			$('body').toggleClass('instant-ide-help-active');
			$('#instant-ide-help-container').fadeToggle('medium');
			$('#instant-ide-help-overlay').fadeToggle('medium');
		});
		
		$('.instant-ide-menu-popup-container').click(function(e) {
			var container_id = $(this).attr('id');
			var inner_container_id = $('#'+container_id+' :first-child').attr('id');
			if($(e.target).is('#'+inner_container_id) || $(e.target).is('#'+inner_container_id+' *')) {
				return;
			}
			if(container_id === 'instant-ide-file-editor-image-view-container') {
				$('body').removeClass('instant-ide-image-view-active');
				$('#instant-ide-file-editor-image-view-container').fadeOut('medium');
				$('#instant-ide-file-editor-image-view-overlay').fadeOut('medium');
			} else if(container_id === 'instant-ide-file-editor-upload-form-container') {
				$('#instant-ide-file-editor-upload-form-container').fadeOut('medium');
				$('#instant-ide-file-editor-upload-form-overlay').fadeOut('medium');
			} else if(container_id === 'instant-ide-file-editor-options-container') {
				$('#sub-menu-options-close').click();
			} else {
				$('.menu-item-popup-active').click();
			}
		});
		
		$('.menu-item-popup').click(function() {
			if($(this).hasClass('menu-item-popup-active')) {
				$(this).removeClass('menu-item-popup-active');
			} else {
				$(this).addClass('menu-item-popup-active');
			}
		});
		
		$('#instant-ide-file-editor-options-active-editor .select-items').find('div[data-option-value="'+localStorage.getItem('iide_active_editor')+'"]').click();
		
		$('#instant-ide-file-editor-options-active-editor .select-items div').click(function() {
			var active_editor = $(this).attr('data-option-value');
			if(active_editor != localStorage.getItem('iide_active_editor')) {
				$.ajax({
					type : 'POST',
					url : iide_url+'editor/file-editor-ajax.php',
					data : {
						action : 'instant_ide_active_editor_write',
						active_editor : active_editor
					},
					success : function(response) {
						if(response) {
		                    Swal.fire({
								onOpen: function() { instant_ide_stop_file_tree_interval(); },
								onAfterClose: function() { instant_ide_start_file_tree_interval(); },
		                        text: response,
		                        icon: 'success'
		                    })
		                    .then((value) => {
								Swal.fire({
									onOpen: function() { instant_ide_stop_file_tree_interval(); },
									onAfterClose: function() { instant_ide_start_file_tree_interval(); },
									title: 'Reload To Finalize Changes!',
									text: 'To finalize these changes you must reload Instant IDE. Would you like to do so now?',
									icon: 'success',
									showCancelButton: true,
									confirmButtonText: 'Yes',
									cancelButtonText: 'No'
								}).then((result) => {
									if (result.value) {
										setTimeout(function() { window.location.reload(true); }, 2000);
									}
								})
		                    })
						}
					}
				});
				localStorage.setItem('iide_active_editor', active_editor);
			}
		});

		$('#instant-ide-dev-path').val(localStorage.getItem('iide_dev_path'));
		
		$('#instant-ide-dev-path').blur( function() {
			var dev_path = $(this).val();
			if(dev_path != localStorage.getItem('iide_dev_path')) {
				var new_dev_path = dev_path.slice(-1) == '/' ? dev_path.slice(0,-1) : dev_path;
				$.ajax({
					type : 'POST',
					url : iide_url+'editor/file-editor-ajax.php',
					data : {
						action : 'instant_ide_dev_path_write',
						dev_path : new_dev_path
					},
					success : function(response) {
						if(response) {
							if(localStorage.getItem('iide_path_change_popup') === 'auto-reload') {
								let timerInterval;
			                    Swal.fire({
			                        title: 'DEV Path Changed',
			                        text: 'Reloading...',
			                        icon: 'success',
			                        showConfirmButton: false,
									timer: 3000,
									onBeforeOpen: () => {
										Swal.showLoading()
									},
									onClose: () => {
										clearInterval(timerInterval)
									}
			                    })
								setTimeout(function() { window.location.reload(true); }, 3000);
							} else {
			                    Swal.fire({
									onOpen: function() { instant_ide_stop_file_tree_interval(); },
									onAfterClose: function() { instant_ide_start_file_tree_interval(); },
			                        text: response,
			                        icon: 'success'
			                    })
			                    .then((value) => {
									Swal.fire({
										onOpen: function() { instant_ide_stop_file_tree_interval(); },
										onAfterClose: function() { instant_ide_start_file_tree_interval(); },
										title: 'Reload To Finalize Changes!',
										text: 'To finalize these changes you must reload Instant IDE. Would you like to do so now?',
										icon: 'success',
										showCancelButton: true,
										confirmButtonText: 'Yes',
										cancelButtonText: 'No'
									}).then((result) => {
										if (result.value) {
											setTimeout(function() { window.location.reload(true); }, 2000);
										}
									})
			                    })
							}
						}
					}
				});
				localStorage.setItem('iide_dev_path', new_dev_path);
			}
		});
		
		function instant_ide_define_paths_li_update(new_paths) {
			$.ajax({
				type : 'POST',
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_paths_li_write',
					paths_li : new_paths
				},
				success : function(response) {
					if(response) {
					    // Silence.
					}
				}
			});
			localStorage.setItem('iide_paths_li', new_paths);
		}

		$('#instant-ide-file-editor-options-path-change-popup .select-items').find('div[data-option-value="'+localStorage.getItem('iide_path_change_popup')+'"]').click();
		$('#instant-ide-file-editor-options-path-change-popup .select-items div').click(function() {
			var selection = $(this).attr('data-option-value');
			localStorage.setItem('iide_path_change_popup', selection);
		});

		$('#instant-ide-file-editor-options-save-state .select-items').find('div[data-option-value="'+localStorage.getItem('iide_save_state')+'"]').click();
		$('#instant-ide-file-editor-options-save-state .select-items div').click(function() {
			var selection = $(this).attr('data-option-value');
			localStorage.setItem('iide_save_state', selection);
			if(selection === 'reset-state') {
			    instant_ide_conditional_save_state_reset_message_popup('You are about to reset the Instant IDE Save State', 'To perform this action you must reload Instant IDE. Would you like to do so now?');
			}
		});
		
		$('input[name="iide_theme"][value="'+localStorage.getItem('iide_theme')+'"]').prop('checked', true);
		$('body').removeClass(function(index, className) {
			return (className.match(/(^|\s)instant-ide-theme-\S+/g) || []).join(' ');
		}).addClass('instant-ide-theme-'+localStorage.getItem('iide_theme'));
		
		$('input[name=iide_theme]').change( function() {
			var selection = $(this).val();
			$('body').removeClass(function(index, className) {
				return (className.match(/(^|\s)instant-ide-theme-\S+/g) || []).join(' ');
			}).addClass('instant-ide-theme-'+selection);
			var iframe_dom = $('iframe#instant-ide-file-editor-console').contents();
			if(iframe_dom !== null) {
				iframe_dom.find('body').removeClass(function(index, className) {
					return (className.match(/(^|\s)instant-ide-theme-\S+/g) || []).join(' ');
				}).addClass('instant-ide-theme-'+selection);
			}
			localStorage.setItem('iide_theme', selection);
		});
		
		if($('body').hasClass('instant-ide-monaco-editor-active')) {
			$('#instant-ide-file-editor-options-monaco-editor-theme .select-items').find('div[data-option-value="'+localStorage.getItem('iide_monaco_editor_theme')+'"]').click();
			$('#instant-ide-monaco-editor-theme-preview img').attr('src', iide_url+'assets/css/images/monaco-themes/'+localStorage.getItem('iide_monaco_editor_theme')+'.png');
			$('body').removeClass(function(index, className) {
				return (className.match(/(^|\s)instant-ide-monaco-theme-\S+/g) || []).join(' ');
			}).addClass('instant-ide-monaco-theme-'+localStorage.getItem('iide_monaco_editor_theme'));

			$('#instant-ide-file-editor-options-monaco-editor-theme .select-items div').click(function() {
				var selection = $(this).attr('data-option-value');
				$('#instant-ide-monaco-editor-theme-preview img').attr('src', iide_url+'assets/css/images/monaco-themes/'+selection+'.png');
				$('body').removeClass(function(index, className) {
					return (className.match(/(^|\s)instant-ide-monaco-theme-\S+/g) || []).join(' ');
				}).addClass('instant-ide-monaco-theme-'+selection);
				localStorage.setItem('iide_monaco_editor_theme', selection);
			});
		} else {
			$('#instant-ide-file-editor-options-ace-editor-key-bindings .select-items').find('div[data-option-value="'+localStorage.getItem('iide_ace_editor_kb_handler')+'"]').click();
			$('#instant-ide-file-editor-options-ace-editor-key-bindings .select-items div').click(function() {
				var selection = $(this).attr('data-option-value');
				localStorage.setItem('iide_ace_editor_kb_handler', selection);
			});
			
			$('#instant-ide-file-editor-options-ace-editor-theme .select-items').find('div[data-option-value="'+localStorage.getItem('iide_ace_editor_theme')+'"]').click();
			$('#instant-ide-ace-editor-theme-preview img').attr('src', iide_url+'assets/css/images/ace-themes/'+localStorage.getItem('iide_ace_editor_theme')+'.png');

			$('#instant-ide-file-editor-options-ace-editor-theme .select-items div').click(function() {
				var selection = $(this).attr('data-option-value');
				$('#instant-ide-ace-editor-theme-preview img').attr('src', iide_url+'assets/css/images/ace-themes/'+selection+'.png');
				localStorage.setItem('iide_ace_editor_theme', selection);
			});
		}
		
		$('#instant-ide-file-editor-options-tab-size .select-items').find('div[data-option-value="'+localStorage.getItem('iide_editor_tab_size')+'"]').click();
		$('#instant-ide-file-editor-options-tab-size .select-items div').click(function() {
			var selection = $(this).attr('data-option-value');
			localStorage.setItem('iide_editor_tab_size', selection);
		});

		$('#instant-ide-file-editor-options-font-size .select-items').find('div[data-option-value="'+localStorage.getItem('iide_editor_font_size')+'"]').click();
		$('#instant-ide-file-editor-options-font-size .select-items div').click(function() {
			var selection = $(this).attr('data-option-value');
			localStorage.setItem('iide_editor_font_size', selection);
		});

		$('#instant-ide-file-editor-options-font-family .select-items').find('div[data-option-value="'+localStorage.getItem('iide_editor_font_family')+'"]').click();
		if(localStorage.getItem('iide_editor_font_family') !== 'monospace') {
			$('body').addClass('instant-ide-editor-font-'+localStorage.getItem('iide_editor_font_family'));
		}
		$('#instant-ide-file-editor-options-font-family .select-items div').click(function() {
			var selection = $(this).attr('data-option-value');
			localStorage.setItem('iide_editor_font_family', selection);
			$('body').removeClass(function(index, className) {
				return (className.match (/(^|\s)instant-ide-editor-font-\S+/g) || []).join(' ');
			});
			if(selection !== 'monospace') {
				$('body').addClass('instant-ide-editor-font-'+selection);
			}
		});
		
		$('.instant-ide-file-tree').on('click', '.iideft-file', function(e) {
	        if(e.shiftKey) {
				$(this).addClass('iideft-file-selected');
	        }
		});
		
        instant_ide_splitter_loader();
        $(window).resize(instant_ide_splitter_loader);
        
        function instant_ide_splitter_loader() {
            if($('body').hasClass('instant-ide-splitter-loaded')) {
                $('#instant-ide-file-editor-preview-container').split().destroy();
                $('#instant-ide-file-tree-editor-container').split().destroy();
                $('#instant-ide-file-editor-preview-console-container').split().destroy();
            }
            var tree_position = splitter_tree_position;
            if($('body').hasClass('instant-ide-site-preview-active')) {
                var editor_position = splitter_editor_position;
            } else {
                var editor_position = '100%';
            }
            if($('body').hasClass('instant-ide-console-active') || $('body').hasClass('instant-ide-find-window-active')) {
                var console_position = splitter_console_position;
            } else {
                var console_position = '100%';
            }
            instant_ide_splitter(tree_position, editor_position, console_position);
            instant_ide_site_preview_menu_position();
        }

        function instant_ide_splitter(tree_position = '20%', editor_position = '100%', console_position = '100%') {
            $('body').addClass('instant-ide-splitter-loaded');
            var tree_editor_container = $('#instant-ide-file-tree-editor-container').height('100%').split({
                orientation: 'vertical',
                limit: 10,
                percent: true,
				position: instant_ide_px_to_percent_width(tree_position),
                onDrag: function(event) {
                    splitter_tree_position = instant_ide_px_to_percent_width(tree_editor_container.position());
                    if(!$('body').hasClass('instant-ide-site-preview-active')) {
                        instant_ide_splitter_loader();
                    }
                },
                onDragEnd: function(event) {
                    localStorage.setItem('iide_splitter_tree_position', splitter_tree_position);
                }
            });
            var editor_preview_container = $('#instant-ide-file-editor-preview-container').height('100%').split({
                orientation: 'vertical',
                limit: 10,
                percent: true,
                position: instant_ide_px_to_percent_width(editor_position),
                onDrag: function(event) {
                    instant_ide_site_preview_resize();
                    $('#instant-ide-site-preview').css('width', '100%').css('min-width', 'auto').css('height', '100%');
                },
                onDragEnd: function(event) {
                    instant_ide_site_preview_menu_position();
                    splitter_editor_position = instant_ide_px_to_percent_width(editor_preview_container.position(), width_offset = $('#instant-ide-file-tree-container').width() + 12);
                    localStorage.setItem('iide_splitter_editor_position', splitter_editor_position);
                }
            });
            var editor_preview_console_container = $('#instant-ide-file-editor-preview-console-container').height($(window).height() - 26).split({
                orientation: 'horizontal',
                limit: 10,
                percent: true,
                position: instant_ide_px_to_percent_height(console_position),
                onDragEnd: function(event) {
                    splitter_console_position = instant_ide_px_to_percent_height(editor_preview_console_container.position(), height_offset = 26);
                    localStorage.setItem('iide_splitter_console_position', splitter_console_position);
                }
            });
            if($('body').hasClass('instant-ide-site-preview-active')) {
                $('#instant-ide-file-editor-container-wrap').next('.vsplitter').show();
            } else {
                $('#instant-ide-file-editor-container-wrap').next('.vsplitter').hide();
                $('#instant-ide-file-editor-container-wrap').width($('#instant-ide-file-editor-container-wrap').width());
            }
            if($('body').hasClass('instant-ide-console-active') || $('body').hasClass('instant-ide-find-window-active')) {
                $('#instant-ide-file-editor-preview-container').next('.hsplitter').show();
            } else {
                $('#instant-ide-file-editor-preview-container').next('.hsplitter').hide();
                $('#instant-ide-file-editor-preview-container').height($('#instant-ide-file-editor-preview-container').height());
            }
        }
        
        // parseInt, but with a percentage check.
        function instant_ide_parse_int(value) {
            if(/^\d+(\.\d+)?%$/.test(value)) {
                return value;
            } else {
                return parseInt(value, 10);
            }
        }
        
        function instant_ide_px_to_percent_width(value, width_offset = 0) {
            if(/^\d+(\.\d+)?%$/.test(value)) {
                return value;
            } else {
                return (parseInt(value, 10) / ($(window).width() - width_offset)) * 100 +'%';
            }
        }
        
        function instant_ide_px_to_percent_height(value, height_offset = 0) {
            if(/^\d+(\.\d+)?%$/.test(value)) {
                return value;
            } else {
                return (parseInt(value, 10) / ($(window).height() - height_offset)) * 100 +'%';
            }
        }
        
        function instant_ide_percent_to_px_width(value) {
            if(!/^\d+(\.\d+)?%$/.test(value)) {
                return value;
            } else {
                return (parseInt(value, 10) * $(window).width()) / 100;
            }
        }
        
        function instant_ide_percent_to_px_height(value) {
            if(!/^\d+(\.\d+)?%$/.test(value)) {
                return value;
            } else {
                return (parseInt(value, 10) * $(window).height()) / 100;
            }
        }

		if(localStorage.getItem('iide_editor_layout_state') == 'double') {
			instant_ide_editor_layout_toggle();
		}
		if(localStorage.getItem('iide_site_preview_state') == 'open') {
			$('#sub-menu-site-preview-open').click();
		}
		if(localStorage.getItem('iide_console_state') == 'open') {
			$('#sub-menu-console-open').click();
		}
		if(localStorage.getItem('iide_open_files') != '') {
			instant_ide_auto_open_files();
		}

		function instant_ide_auto_open_files() {
			var local_storage_current = localStorage.getItem('iide_open_files');
			var local_stoarage_current_array = $.grep(local_storage_current.split('|'), function(n){ return (n); });

			$.each(local_stoarage_current_array, function(index, value) {
			    if($(value.split('^')[0]).length) {
			        instant_ide_file_tree_li_dblclicked_initial($(value.split('^')[0]), container_num = value.split('*')[1].split('*')[0], auto_load = true);
			    } else {
			        var local_storage_updated = local_storage_current.replace(value+'|', '');
        			localStorage.setItem('iide_open_files', local_storage_updated);
			    }
			});
			$('.iideft-file-edit').removeClass('iideft-file-dblclicked');
			$(localStorage.getItem('iide_active_tab_one_state')).click();
			$(localStorage.getItem('iide_active_tab_two_state')).click();
		}
	
		$(window).keydown(function(e) {
			if((e.ctrlKey || e.metaKey) && e.which == 83) {
				e.preventDefault();
				$('.instant-ide-file-editor-active-form .instant-ide-file-editor-save-button').click();
				return false;
			}
			if((e.ctrlKey || e.metaKey) && e.which == 70) {
				e.preventDefault();
				return false;
			}
	        if($('.iideft-file-selected')[0]) {
	        	instant_ide_stop_file_tree_interval();
		        if(e.shiftKey && e.which == 38) {
					$('.instant-ide-file-tree').find('.iideft-file-selected').first().prev().not('.iideft-directory').addClass('iideft-file-selected');
		        }
		        if(e.shiftKey && e.which == 40) {
					$('.instant-ide-file-tree').find('.iideft-file-selected').last().next().addClass('iideft-file-selected');
		        }
	        }
	        if($('body').hasClass('instant-ide-image-view-active')) {
		        if(e.which == 27) {
					$('body').removeClass('instant-ide-image-view-active');
					$('#instant-ide-file-editor-image-view-container').fadeOut('medium');
					$('#instant-ide-file-editor-image-view-overlay').fadeOut('medium');
		        }
	        }
	        if($('body').hasClass('instant-ide-options-active')) {
		        if(e.which == 27) {
					$('#sub-menu-options-close').click();
		        }
	        }
	        if($('body').hasClass('instant-ide-help-active')) {
		        if(e.which == 27) {
					$('.menu-heading-help').click();
		        }
	        }
	        if($('body').hasClass('instant-ide-site-preview-address-bar-active')) {
		        if(e.which == 13) {
					$('#instant-ide-site-preview').attr('src', $('#instant-ide-site-preview-icons-url-view-url').text());
					return false;
		        }
	        }
		});
		
		window.onbeforeunload = function(e) {
			if($('.instant-ide-file-editor-tab-quit.file-changed').length) {
				return confirm('Confirm refresh');
			}
			if(localStorage.getItem('iide_save_state') === 'disabled' || localStorage.getItem('iide_save_state') === 'reset-state') {
				instant_ide_save_state_reset();
			} else {
				instant_ide_save_state_update();
			}
		};

		function instant_ide_save_state_update(reset = false) {
		    var iide_path_change_popup = instant_ide_replace(localStorage.getItem('iide_path_change_popup'), '"', '`');
		    var iide_save_state = instant_ide_replace(localStorage.getItem('iide_save_state'), '"', '`');
		    var iide_editor_tab_size = instant_ide_replace(localStorage.getItem('iide_editor_tab_size'), '"', '`');
		    var iide_editor_font_size = instant_ide_replace(localStorage.getItem('iide_editor_font_size'), '"', '`');
		    var iide_editor_font_family = instant_ide_replace(localStorage.getItem('iide_editor_font_family'), '"', '`');
		    var iide_theme = instant_ide_replace(localStorage.getItem('iide_theme'), '"', '`');
		    var iide_ace_editor_kb_handler = instant_ide_replace(localStorage.getItem('iide_ace_editor_kb_handler'), '"', '`');
		    var iide_monaco_editor_theme = instant_ide_replace(localStorage.getItem('iide_monaco_editor_theme'), '"', '`');
		    var iide_ace_editor_theme = instant_ide_replace(localStorage.getItem('iide_ace_editor_theme'), '"', '`');
		    var iide_word_wrap = instant_ide_replace(localStorage.getItem('iide_word_wrap'), '"', '`');
		    var iide_show_hidden_files = instant_ide_replace(localStorage.getItem('iide_show_hidden_files'), '"', '`');
        	var iide_editor_layout_state = reset === false ? instant_ide_replace(localStorage.getItem('iide_editor_layout_state'), '"', '`') : 'single';
			var iide_site_preview_state = reset === false ? instant_ide_replace(localStorage.getItem('iide_site_preview_state'), '"', '`') : 'closed';
			var iide_console_state = reset === false ? instant_ide_replace(localStorage.getItem('iide_console_state'), '"', '`') : 'closed';
			var iide_find_window_dir_id = reset === false ? instant_ide_replace(localStorage.getItem('iide_find_window_dir_id'), '"', '`') : '';
			var iide_open_files = reset === false ? instant_ide_replace(localStorage.getItem('iide_open_files'), '"', '`') : '';
			var iide_active_tab_one_state = reset === false ? instant_ide_replace(localStorage.getItem('iide_active_tab_one_state'), '"', '`') : '';
			var iide_active_tab_two_state = reset === false ? instant_ide_replace(localStorage.getItem('iide_active_tab_two_state'), '"', '`') : '';
			var iide_file_dblclicked_state = reset === false ? instant_ide_replace(localStorage.getItem('iide_file_dblclicked_state'), '"', '`') : '';
			var iide_dirs_scroll_top = reset === false ? instant_ide_replace(localStorage.getItem('iide_dirs_scroll_top'), '"', '`') : '';
			var iide_selected_folder_id = reset === false ? instant_ide_replace(localStorage.getItem('iide_selected_folder_id'), '"', '`') : '';
			var iide_selected_file_parent_dir = reset === false ? instant_ide_replace(localStorage.getItem('iide_selected_file_parent_dir'), '"', '`') : '';
			var iide_selected_file = reset === false ? instant_ide_replace(localStorage.getItem('iide_selected_file'), '"', '`') : '';
			var iide_selected_file_dblclicked = reset === false ? instant_ide_replace(localStorage.getItem('iide_selected_file_dblclicked'), '"', '`') : '';
			var iide_splitter_tree_position = reset === false ? instant_ide_replace(localStorage.getItem('iide_splitter_tree_position'), '"', '`') : '20%';
			var iide_splitter_editor_position = reset === false ? instant_ide_replace(localStorage.getItem('iide_splitter_editor_position'), '"', '`') : '50%';
			var iide_splitter_console_position = reset === false ? instant_ide_replace(localStorage.getItem('iide_splitter_console_position'), '"', '`') : '80%';
			var iide_site_preview_url = reset === false ? instant_ide_replace(localStorage.getItem('iide_site_preview_url'), '"', '`') : iide_platform_url+'/';

        	var save_state_content = '{';
        	save_state_content += '"iide_path_change_popup": "'+iide_path_change_popup+'",';
        	save_state_content += '"iide_save_state": "'+iide_save_state+'",';
        	save_state_content += '"iide_editor_tab_size": "'+iide_editor_tab_size+'",';
        	save_state_content += '"iide_editor_font_size": "'+iide_editor_font_size+'",';
        	save_state_content += '"iide_editor_font_family": "'+iide_editor_font_family+'",';
        	save_state_content += '"iide_theme": "'+iide_theme+'",';
        	save_state_content += '"iide_ace_editor_kb_handler": "'+iide_ace_editor_kb_handler+'",';
        	save_state_content += '"iide_monaco_editor_theme": "'+iide_monaco_editor_theme+'",';
        	save_state_content += '"iide_ace_editor_theme": "'+iide_ace_editor_theme+'",';
        	save_state_content += '"iide_word_wrap": "'+iide_word_wrap+'",';
        	save_state_content += '"iide_show_hidden_files": "'+iide_show_hidden_files+'",';
        	save_state_content += '"iide_editor_layout_state": "'+iide_editor_layout_state+'",';
			save_state_content += '"iide_site_preview_state": "'+iide_site_preview_state+'",';
			save_state_content += '"iide_console_state": "'+iide_console_state+'",';
			save_state_content += '"iide_find_window_dir_id": "'+iide_find_window_dir_id+'",';
			save_state_content += '"iide_open_files": "'+iide_open_files+'",';
			save_state_content += '"iide_active_tab_one_state": "'+iide_active_tab_one_state+'",';
			save_state_content += '"iide_active_tab_two_state": "'+iide_active_tab_two_state+'",';
			save_state_content += '"iide_file_dblclicked_state": "'+iide_file_dblclicked_state+'",';
			save_state_content += '"iide_dirs_scroll_top": "'+iide_dirs_scroll_top+'",';
			save_state_content += '"iide_selected_folder_id": "'+iide_selected_folder_id+'",';
			save_state_content += '"iide_selected_file_parent_dir": "'+iide_selected_file_parent_dir+'",';
			save_state_content += '"iide_selected_file": "'+iide_selected_file+'",';
			save_state_content += '"iide_selected_file_dblclicked": "'+iide_selected_file_dblclicked+'",';
			save_state_content += '"iide_splitter_tree_position": "'+iide_splitter_tree_position+'",';
			save_state_content += '"iide_splitter_editor_position": "'+iide_splitter_editor_position+'",';
			save_state_content += '"iide_splitter_console_position": "'+iide_splitter_console_position+'",';
			save_state_content += '"iide_site_preview_url": "'+iide_site_preview_url+'"';
			save_state_content += '}';

			$.ajax({
				type : 'POST',
				cache: false,
				url : iide_url+'editor/file-editor-ajax.php',
				data : {
					action : 'instant_ide_save_state_write',
					save_state_content : save_state_content
				},
				success : function(response) {
					if(response) {
						
					}
				}
			});
		}

		function instant_ide_save_state_reset() {
			localStorage.setItem('iide_editor_layout_state', 'single');
			localStorage.setItem('iide_site_preview_state', 'closed');
			localStorage.setItem('iide_console_state', 'closed');
			localStorage.setItem('iide_find_window_dir_id', '');
			localStorage.setItem('iide_open_files', '');
			localStorage.setItem('iide_active_tab_one_state', '');
			localStorage.setItem('iide_active_tab_two_state', '');
			localStorage.setItem('iide_file_dblclicked_state', '');
			localStorage.setItem('iide_opened_dirs', '');
			localStorage.setItem('iide_open_dirs', '');
			instant_ide_dir_status_update(type = 'opened', action = 'reset');
			instant_ide_dir_status_update(type = 'open', action = 'reset');
			localStorage.setItem('iide_dirs_scroll_top', '');
			$('#instant-ide-file-tree-container').data('dirs-scroll-top', '');
			localStorage.setItem('iide_selected_folder_id', '');
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-folder-id', '');
			localStorage.setItem('iide_selected_file_parent_dir', '');
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-parent-dir', '');
			localStorage.setItem('iide_selected_file', '');
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-file', '');
			localStorage.setItem('iide_selected_file_dblclicked', '');
			$('#instant-ide-file-tree-container-wrap').attr('data-selected-file-dblclicked', '');
			instant_ide_save_state_update(reset = true);
		}

	}, 500);
	
	});
})(jQuery);