/**
 * This script adds the jquery effects to the Monochrome Pro Theme.
 *
 * @package Monochrome\JS
 * @author StudioPress
 * @license GPL-2.0-or-later
 */
(function($){var $header=$('.site-header'),$hsToggle=$('.toggle-header-search'),$hsWrap=$('#header-search-wrap'),$hsInput=$hsWrap.find('input[type="search"]'),$footer=$('.site-footer'),$container=$('.site-container');$(document).ready(function(){$('body').addClass('js')});$(window).scroll(function(){if(50<$(document).scrollTop()){$('.site-container').addClass('shadow')}else{$('.site-container').removeClass('shadow')}});$container.css('margin-bottom',$footer.outerHeight());$hsToggle.on('click',function(event){event.preventDefault();if($(this).hasClass('close')){hideSearch()}else{showSearch()}});$hsToggle.on('keydown',function(event){if(9===event.keyCode&&!$header.hasClass('search-visible')){return}
event.preventDefault();handleKeyDown(event)});$hsInput.on('keydown',function(event){if(9===event.keyCode||27===event.keyCode){hideSearch(event.target)}});$hsInput.on('blur',hideSearch);function showSearch(){$header.addClass('search-visible');$hsWrap.fadeIn('fast').find('input[type="search"]').focus();$hsToggle.attr('aria-expanded',!0)}
function hideSearch(){$hsWrap.fadeOut('fast').parents('.site-header').removeClass('search-visible');$hsToggle.attr('aria-expanded',!1)}
function handleKeyDown(event){if(13===event.keyCode||32===event.keyCode){event.preventDefault();if($(event.target).hasClass('close')){hideSearch()}else{showSearch()}}}}(jQuery))