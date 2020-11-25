/**
 * Animate elements with CSS as they appear in the viewport via custom classes.
 *
 * Add a single custom class to a block's Advanced field in the block editor:
 * - fade-in
 * - fade-in-up
 *
 * Blocks will be hidden but then animate into view when their top or bottom
 * appears between the viewport top and bottom.
 *
 * Enqueueing this file at the bottom of your site's body element is enough to
 * make the effects available. No further configuration or CSS is required.
 *
 * @author StudioPress
 * @link https://www.studiopress.com/
 * @version 1.0.0
 * @license GPL-2.0-or-later
 */
var studiopress=studiopress||{};studiopress.blockEffects=(function(){'use strict';var effectClasses=['.fade-in','.fade-in-up'];var ticking=!1;var addCSS=function(){var style=document.createElement('style');style.classList.add('studiopress-block-effects-js');style.innerHTML='.fade-in, .fade-in-up { opacity: 0; -webkit-animation-duration: 1s; animation-duration: 1s; -webkit-animation-fill-mode: both; animation-fill-mode: both; -webkit-animation-timing-function: ease-in-out; animation-timing-function: ease-in-out; } '+'@media print { .fade-in, .fade-in-up { opacity: 1 !important; -webkit-animation: unset !important; animation: unset !important; -webkit-transition: none !important; transition: none !important; } } '+'@-webkit-keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } } '+'@keyframes fadeIn { from { opacity: 0; } to { opacity: 1; } } '+'.fade-in.in-viewport { -webkit-animation-name: fadeIn; animation-name: fadeIn; } '+'@-webkit-keyframes fadeInUp { from { opacity: 0; -webkit-transform: translate3d(0, 20px, 0); transform: translate3d(0, 20px, 0); } '+'to { opacity: 1; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); } } '+'@keyframes fadeInUp { from { opacity: 0; -webkit-transform: translate3d(0, 20px, 0); transform: translate3d(0, 20px, 0); } '+'to { opacity: 1; -webkit-transform: translate3d(0, 0, 0); transform: translate3d(0, 0, 0); } } '+'.fade-in-up.in-viewport { -webkit-animation-name: fadeInUp; animation-name: fadeInUp; } ';document.body.appendChild(style)};var isInViewport=function(elem){var bounding=elem.getBoundingClientRect();return((0<=bounding.top&&bounding.top<=(window.innerHeight||document.documentElement.clientHeight))||(0<=bounding.bottom&&bounding.bottom<=(window.innerHeight||document.documentElement.clientHeight)))};var addInViewPortClass=function(){var i,j,elements;for(i=0;i<effectClasses.length;++i){elements=document.querySelectorAll(effectClasses[i]);for(j=0;j<elements.length;++j){if(isInViewport(elements[j])){elements[j].classList.add('in-viewport')}}}
ticking=!1};var update=function(){if(!ticking){window.requestAnimationFrame(addInViewPortClass);ticking=!0}};return{init:function(){addCSS();update();window.addEventListener('load',update,!1);window.addEventListener('scroll',update,!1);window.addEventListener('resize',update,!1)}}}());studiopress.blockEffects.init()