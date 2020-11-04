/*!
* WP Grid Builder Plugin
*
* @package   WP Grid Builder
* @author    Loïc Blascos
* @link      https://www.wpgridbuilder.com
* @copyright 2019-2020 Loïc Blascos
*
*/
!function(e){var t={};function s(i){if(t[i])return t[i].exports;var n=t[i]={i:i,l:!1,exports:{}};return e[i].call(n.exports,n,n.exports,s),n.l=!0,n.exports}s.m=e,s.c=t,s.d=function(e,t,i){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},s.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(s.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)s.d(i,n,function(t){return e[t]}.bind(null,n));return i},s.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="",s(s.s=0)}([function(e,t,s){"use strict";function i(e,t,s){return t in e?Object.defineProperty(e,t,{value:s,enumerable:!0,configurable:!0,writable:!0}):e[t]=s,e}function n(e,t){var s=Object.keys(e);if(Object.getOwnPropertySymbols){var i=Object.getOwnPropertySymbols(e);t&&(i=i.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),s.push.apply(s,i)}return s}function o(e){for(var t=1;t<arguments.length;t++){var s=null!=arguments[t]?arguments[t]:{};t%2?n(Object(s),!0).forEach((function(t){i(e,t,s[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(s)):n(Object(s)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(s,t))}))}return e}function a(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}function l(e,t){for(var s=0;s<t.length;s++){var i=t[s];i.enumerable=i.enumerable||!1,i.configurable=!0,"value"in i&&(i.writable=!0),Object.defineProperty(e,i.key,i)}}function r(e,t,s){return t&&l(e.prototype,t),s&&l(e,s),e}function c(e,t){return(c=Object.setPrototypeOf||function(e,t){return e.__proto__=t,e})(e,t)}function h(e,t){if("function"!=typeof t&&null!==t)throw new TypeError("Super expression must either be null or a function");e.prototype=Object.create(t&&t.prototype,{constructor:{value:e,writable:!0,configurable:!0}}),t&&c(e,t)}function u(e){return(u=Object.setPrototypeOf?Object.getPrototypeOf:function(e){return e.__proto__||Object.getPrototypeOf(e)})(e)}function p(e){return(p="function"==typeof Symbol&&"symbol"==typeof Symbol.iterator?function(e){return typeof e}:function(e){return e&&"function"==typeof Symbol&&e.constructor===Symbol&&e!==Symbol.prototype?"symbol":typeof e})(e)}function d(e,t){return!t||"object"!==p(t)&&"function"!=typeof t?function(e){if(void 0===e)throw new ReferenceError("this hasn't been initialised - super() hasn't been called");return e}(e):t}function v(e){var t=function(){if("undefined"==typeof Reflect||!Reflect.construct)return!1;if(Reflect.construct.sham)return!1;if("function"==typeof Proxy)return!0;try{return Date.prototype.toString.call(Reflect.construct(Date,[],(function(){}))),!0}catch(e){return!1}}();return function(){var s,i=u(e);if(t){var n=u(this).constructor;s=Reflect.construct(i,arguments,n)}else s=i.apply(this,arguments);return d(this,s)}}s.r(t);var f={searchable:!0,clearable:!0,clearLabel:"Clear Selection",toggleLabel:"Toggle List",clearShape:"M14.348 14.849c-.469.469-1.229.469-1.697 0L10 11.819l-2.651 3.029c-.469.469-1.229.469-1.697 0-.469-.469-.469-1.229 0-1.697l2.758-3.15-2.759-3.152c-.469-.469-.469-1.228 0-1.697s1.228-.469 1.697 0L10 8.183l2.651-3.031c.469-.469 1.228-.469 1.697 0s.469 1.229 0 1.697l-2.758 3.152 2.758 3.15c.469.469.469 1.229 0 1.698z",toggleShape:"M4.516 7.548c.436-.446 1.043-.481 1.576 0L10 11.295l3.908-3.747c.533-.481 1.141-.446 1.574 0 .436.445.408 1.197 0 1.615-.406.418-4.695 4.502-4.695 4.502-.217.223-.502.335-.787.335s-.57-.112-.789-.335c0 0-4.287-4.084-4.695-4.502s-.436-1.17 0-1.615z",messages:{loading:"Loading...",search:"Please enter 1 or more characters.",noResults:"No Results Found.",selected:"option %s, selected.",deselected:"option %s, deselected.",cleared:"options cleared.",expanded:"Use Up and Down to choose options, press Enter to select the currently focused option, press Escape to collapse the list.",collapsed:"Press Enter or Space to expand the list."},async:{url:"",data:"",post:"",response:""}},m={},g=function(){function e(){a(this,e)}return r(e,[{key:"dispatchEvent",value:function(e){var t;"function"==typeof Event?t=new Event(e,{bubbles:!0}):(t=document.createEvent("Event")).initEvent(e,!0,!0),this.element.dispatchEvent(t)}},{key:"handleEvent",value:function(e){var t="on"+e.type;this[t]&&this[t](e)}},{key:"isBind",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];return e?"addEventListener":"removeEventListener"}},{key:"selectEvents",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];e=this.isBind(e),this.element[e]("change",this),this.element[e]("focus",this),this.DOM.select[e]("keydown",this),this.DOM.select[e]("click",this),this.DOM.search[e]("focus",this),this.DOM.search[e]("blur",this),this.DOM.search[e]("input",this),this.DOM.search[e]("change",this),window[e]("mousedown",this)}},{key:"dropDownEvents",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];e=this.isBind(e),window[e]("resize",this),window[e]("keydown",this),this.DOM.dropDown[e]("click",this),this.DOM.dropDown[e]("mousemove",this)}},{key:"onfocus",value:function(e){e.currentTarget===this.element?this.toggle():this.DOM.focus()}},{key:"onblur",value:function(e){this.DOM.blur(),this.close()}},{key:"onmousedown",value:function(e){var t=e.target,s=t&&t.closest(".wpgb-select-dropdown"),i=t&&t.closest(".wpgb-select"),n=e.toElement&&e.toElement.control;t===this.DOM.search&&this.DOM.search.value||n!==this.element&&i!==this.DOM.select&&s!==this.DOM.dropDown||e.preventDefault()}},{key:"onmousemove",value:function(e){var t=e.target.closest(".wpgb-select-item");t&&this.DOM.highlight(t)}},{key:"onkeydown",value:function(e){e.currentTarget===this.DOM.select?this.selectNavigation(e):this.dropDownNavigation(e)}},{key:"onclick",value:function(e){var t=e.target,s=e.currentTarget,i=t.closest(".wpgb-select-remove"),n=t.closest(".wpgb-select-clear"),o=t.closest(".wpgb-select-item");s===this.DOM.select?n?(this.close(),this.clear()):i?this.remove(i.index):this.DOM.search.value&&t===this.DOM.search||this.toggle():o&&this.select(o.index)}},{key:"selectNavigation",value:function(e){var t=this.DOM,s=t.search,i=t.focused,n=e.target,o=n&&n.closest(".wpgb-select-remove");switch(e.keyCode){case 27:this.close();break;case 13:o?this.remove(o.index):this.opened?i&&this.select(i.index):this.toggle();break;case 8:var a=this.Data.selection,l=this.element.options;if(!this.options.clearable&&!this.multiple)return;if(!this.multiple&&l.length&&l[0].value)return;!this.DOM.search.value&&a.length&&this.remove(a.pop().index);break;case 32:s.value||(e.preventDefault(),this.toggle())}}},{key:"dropDownNavigation",value:function(e){var t=this.DOM,s=t.items,i=t.focused,n=s.length,o=s.indexOf(i);switch(e.keyCode){case 38:o=Math.max(--o,0);break;case 40:o=Math.min(++o,n-1);break;case 35:o=n-1;break;case 36:o=0;break;default:return}s[o]&&(e.preventDefault(),this.DOM.highlight(s[o]),this.DOM.scrollList())}},{key:"oninput",value:function(e){var t=this;if(e.preventDefault(),e.stopPropagation(),this.opened||this.DOM.search.value){this.opened||this.open();var s=this.Data.normalize(this.DOM.search.value,!0);this.DOM.searchValue!==s&&(this.DOM.searchValue=s,this.setWidth(),this.DOM.togglePlaceholder(),this.DOM.assertive.textContent="",this.options.async?(this.xhr&&this.xhr.abort(),clearTimeout(this.timeout),this.Data.options=[],this.Data.loading=!!s,this.DOM.clearDropDown(),s&&(this.timeout=setTimeout((function(){return t.load()}),250))):this.search())}}},{key:"search",value:function(){var e=this.DOM.createList(),t=this.results&&e.isEqualNode(this.results);!this.options.async&&t||(this.results=e,this.DOM.refreshDropDown(e),this.DOM.search.value?this.DOM.dropDown.scrollTop=0:this.DOM.scrollList(!0))}},{key:"appendOptions",value:function(){this.element.options[0];var e=this.Data.selection||{},t=[];e.forEach((function(e){t[e.value]=e})),this.Data.options&&this.Data.options.map((function(e,s){return e.index=s,e.selected=!!t[e.value],e}))}},{key:"load",value:function(){var e=this,t=new URLSearchParams,s=this.options.async,i=s.url,n=s.data,o=s.post,a=s.response;for(var l in n=n&&n(this.DOM.search.value),void 0===this.xhr&&(this.xhr=new XMLHttpRequest),n)t.set(l,n[l]);i=t.toString()?"".concat(i,"?").concat(t.toString()):i,this.xhr.onload=function(t){var s=t.target.responseText;try{s=JSON.parse(s)}catch(e){s=""}e.Data.options=a?a(s):s,e.Data.loading=!1,e.appendOptions(),e.search()},this.xhr.open("POST",i,!0),setTimeout((function(){return e.xhr.send(o&&o(e.DOM.search.value))}))}},{key:"setWidth",value:function(){var e=this.DOM.select.clientHeight;this.DOM.sizer.textContent=this.DOM.search.value,this.DOM.search.style.width=this.DOM.sizer.clientWidth+5+"px",this.DOM.search.value.length||this.DOM.search.removeAttribute("style"),this.DOM.select.clientHeight!==e&&this.DOM.sizeDropDown()}},{key:"onchange",value:function(e){e.target===this.DOM.search?(e.preventDefault(),e.stopPropagation()):this.update()}},{key:"onresize",value:function(){this.close()}}]),e}(),b=function(){function e(t,s){a(this,e),this.element=t,this.settings=s}return r(e,[{key:"parse",value:function(){this.options=this.getOptions(this.element)}},{key:"getOptions",value:function(e){var t=this,s=[];return e.children&&(e=e.children),Array.from(e).forEach((function(e){var i=e.tagName,n=e.value,o=e.index,a=e.textContent,l=e.selected,r=e.disabled;"OPTGROUP"!==i?(0!==o||n||(e.selected=!1),s.push({value:n,index:o,textContent:a,selected:l,disabled:r})):s.push({label:e.label,children:t.getOptions(e)})})),s}},{key:"getSelection",value:function(){var e=this.element.options;this.selection=Array.from(e).filter((function(e){return e.selected}))}},{key:"normalize",value:function(e,t){return String.prototype.normalize&&(e=e.normalize("NFD").replace(/[\u0300-\u036f]/g,"")),t&&(e=e.replace(/[.*+?^${}()|[\]\\]/g,"\\$&")),this.settings.async?e.toLowerCase().replace(/\s\s+/g," "):e.toLowerCase().trim()}}]),e}(),y=function(){function e(){var t=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};a(this,e),this.options=t}return r(e,[{key:"createEl",value:function(e,t,s){var i=document.createElement(e);if(t)for(var n=0,o=Object.keys(t);n<o.length;n++){var a=o[n];void 0!==i[a]?i[a]=t[a]:i.hasAttribute(a)||i.setAttribute(a,t[a])}return s&&(i.textContent=s),i}},{key:"select",value:function(){return this.createEl("div",{class:"wpgb-select"})}},{key:"placeholder",value:function(){return this.createEl("div",{class:"wpgb-select-placeholder",role:"combobox","aria-haspopup":!0,"aria-expanded":!1})}},{key:"dropDown",value:function(){return this.createEl("div",{class:"wpgb-select-dropdown"})}},{key:"noFounds",value:function(){return this.createEl("div",{class:"wpgb-select-noresults"},"No Options Found")}},{key:"label",value:function(e,t){return this.createEl("label",{class:"wpgb-select-sr-only",id:"wpgb-select-label-".concat(e),for:"wpgb-select-".concat(e)},t)}},{key:"search",value:function(e){return this.createEl("input",{id:"wpgb-select-".concat(e),tabindex:0,type:"text",placeholder:"",spellcheck:!1,autocomplete:"off",autocapitalize:"none","aria-autocomplete":"list"})}},{key:"assertive",value:function(){return this.createEl("div",{class:"wpgb-select-sr-only",role:"status","aria-live":"polite","aria-atomic":!0})}},{key:"item",value:function(e,t){return this.createEl("li",{id:"wpgb-select-item-".concat(t),class:"wpgb-select-item",role:"option",tabindex:-1,"aria-selected":e.selected,"aria-disabled":e.disabled},e.textContent)}},{key:"group",value:function(e){return this.createEl("li",{class:"wpgb-select-group",role:"group","aria-labelledby":"wpgb-select-group-".concat(e.uid)})}},{key:"heading",value:function(e){return this.createEl("div",{class:"wpgb-select-label",role:"heading"},e.label)}},{key:"list",value:function(e,t){return this.createEl("ul",{role:"listbox",tabindex:-1,"aria-labelledby":"wpgb-select-label-".concat(t),"aria-multiselectable":e})}},{key:"value",value:function(e){var t=this.button("remove","remove"),s=this.svg(this.options.clearShape),i=document.createElement("span"),n=this.createEl("div",{class:"wpgb-select-value"});return i.textContent=e,t.appendChild(s),n.appendChild(i),n.appendChild(t),n}},{key:"button",value:function(e,t){return this.createEl("button",{class:"wpgb-select-".concat(e),type:"button",tabindex:-1,"aria-label":t})}},{key:"loader",value:function(){var e=this,t=this.createEl("div",{class:"wpgb-select-loader",type:"div"});return[1,2,3].forEach((function(){return t.appendChild(e.createEl("span"))})),t}},{key:"svg",value:function(e){var t="http://www.w3.org/2000/svg",s=document.createElementNS(t,"svg"),i=document.createElementNS(t,"path");return i.setAttribute("d",e),s.setAttribute("viewBox","0 0 20 20"),s.setAttribute("aria-hidden",!0),s.setAttribute("focusable",!1),s.appendChild(i),s}}]),e}(),D=function(e){h(s,e);var t=v(s);function s(e,i){var n,o=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return a(this,s),(n=t.call(this)).Data=i,n.options=o,n.element=e,n.instance=e.instance,n.multiple=e.multiple,n.components=new y(n.options),n}return r(s,[{key:"create",value:function(){this.createHolders(),this.createSearch(),this.createInput(),this.createDropDown(),this.createControls()}},{key:"append",value:function(){var e=this.element.closest("label");this.select.appendChild(this.placeholder),this.select.appendChild(this.controls),e?e.parentNode.insertBefore(this.select,e.nextSibling):this.element.parentNode.insertBefore(this.select,this.element.nextSibling)}},{key:"remove",value:function(){this.select.parentElement.removeChild(this.select),this.element.classList.remove("wpgb-select-sr-only")}},{key:"hide",value:function(){this.element.classList.add("wpgb-select-sr-only"),this.element.setAttribute("tabindex",-1),this.element.setAttribute("aria-hidden",!0)}},{key:"reveal",value:function(){this.element.style.display="",this.element.removeAttribute("tabindex"),this.element.removeAttribute("aria-hidden")}},{key:"expand",value:function(){var e=!(arguments.length>0&&void 0!==arguments[0])||arguments[0];this.list.setAttribute("aria-expanded",e),this.placeholder.setAttribute("aria-expanded",e),e?(this.search.focus(),this.placeholder.setAttribute("aria-owns","wpgb-select-results"),this.search.setAttribute("aria-activedescendant",this.focused&&this.focused.id),this.assertive.textContent=this.options.messages.expanded):(this.search.removeAttribute("style"),this.placeholder.removeAttribute("aria-owns"),this.search.removeAttribute("aria-activedescendant"))}},{key:"focus",value:function(){this.select.classList.add("wpgb-select-focused"),this.assertive.textContent=this.options.messages.collapsed}},{key:"blur",value:function(){this.select.classList.remove("wpgb-select-focused"),this.assertive.textContent=""}},{key:"createHolders",value:function(){this.select=this.components.select(),this.placeholder=this.components.placeholder()}},{key:"createControls",value:function(){var e=this.options,t=e.toggleLabel,s=e.clearLabel,i=e.toggleShape,n=e.clearShape;this.controls=document.createElement("div"),this.controls.className="wpgb-select-controls",this.separator=document.createElement("span"),this.separator.className="wpgb-select-separator",this.toggleButton=this.components.button("toggle",t),this.clearButton=this.components.button("clear",s),this.loader=this.components.loader(),this.toggleButton.appendChild(this.components.svg(i)),this.clearButton.appendChild(this.components.svg(n)),this.controls.appendChild(this.separator),this.controls.appendChild(this.toggleButton)}},{key:"createSearch",value:function(){this.input=document.createElement("div"),this.sizer=document.createElement("div"),this.search=this.components.search(this.element.instance),this.label=this.components.label(this.element.instance,this.getLabel()),this.assertive=this.components.assertive(),this.input.className="wpgb-select-search",this.options.searchable||(this.search.readOnly=!0),this.input.appendChild(this.assertive),this.input.appendChild(this.label),this.input.appendChild(this.search),this.input.appendChild(this.sizer)}},{key:"getLabel",value:function(){var e=this.element.id,t=e&&document.querySelector('[for="'.concat(e,'"]'));return t&&t.textContent||"select content"}},{key:"createInput",value:function(){this.multiple?(this.selection=document.createElement("div"),this.selection.className="wpgb-select-values",this.selection.appendChild(this.input),this.placeholder.appendChild(this.selection)):(this.selectValue=document.createElement("span"),this.selectValue.className="wpgb-select-value",this.placeholder.appendChild(this.input))}},{key:"setSelection",value:function(){var e=this,t=this.Data.selection;if(this.multiple){this.removeSelection();var s=document.createDocumentFragment();t.forEach((function(t){var i=e.components.value(t.textContent.trim());i.lastElementChild.index=t.index,s.appendChild(i)})),this.selection.insertBefore(s,this.input)}else t[0]&&t[0].value?(this.selectValue.textContent=t[0].textContent.trim(),this.placeholder.insertBefore(this.selectValue,this.input)):this.selectValue.parentElement&&this.placeholder.removeChild(this.selectValue);this.addPlaceholder(),this.addClear()}},{key:"removeSelection",value:function(e){for(;this.selection.firstElementChild!==this.input;)this.selection.removeChild(this.selection.firstElementChild)}},{key:"addPlaceholder",value:function(){var e=this.Data.selection,t=this.element.options,s=e.length;!s&&t.length&&!t[0].value||1===s&&!e[0].value?this.search.placeholder=t[0]&&t[0].textContent||"":this.search.placeholder=""}},{key:"togglePlaceholder",value:function(){var e=this.Data.selection;this.multiple||(this.searchValue&&this.selectValue.parentElement?this.placeholder.removeChild(this.selectValue):!this.searchValue&&e[0]&&e[0].value&&this.placeholder.insertBefore(this.selectValue,this.input))}},{key:"toggleLoader",value:function(){this.options.async&&(this.Data.loading?(!this.loader.parentElement&&this.controls.insertBefore(this.loader,this.separator),this.clearButton&&this.clearButton.parentElement&&this.controls.removeChild(this.clearButton)):(this.loader&&this.loader.parentElement&&this.controls.removeChild(this.loader),this.clearButton&&this.addClear()))}},{key:"addClear",value:function(){var e=this.Data.selection,t=this.element.options;this.options.clearable&&(t[0]&&t[0].value&&!this.multiple||(e.length>0&&e[0].value?this.controls.insertBefore(this.clearButton,this.separator):this.clearButton.parentElement&&this.controls.removeChild(this.clearButton)))}}]),s}(function(){function e(){a(this,e)}return r(e,[{key:"createDropDown",value:function(){this.list=this.createList(),this.list.id="wpgb-select-results",this.dropDown=this.components.dropDown(),this.dropDown.appendChild(this.list)}},{key:"appendDropDown",value:function(){this.updateDropDown(),document.body.appendChild(this.dropDown)}},{key:"removeDropDown",value:function(){this.dropDown.parentElement&&this.dropDown.parentElement.removeChild(this.dropDown)}},{key:"refreshDropDown",value:function(e){this.updateDropDown(),this.dropDown.replaceChild(e,this.dropDown.lastElementChild)}},{key:"clearDropDown",value:function(){this.list=this.createList(),this.dropDown.replaceChild(this.list,this.dropDown.lastElementChild)}},{key:"updateDropDown",value:function(){var e=this,t=this.element.options;delete this.focused,this.items.forEach((function(s){var i=t[s.index]||{};e.options.async&&(i=e.Data.options[s.index]||{}),s.classList.remove("wpgb-focused"),s.setAttribute("aria-selected",i.selected),i.selected&&!e.focused&&(e.focused=s)})),this.focused&&!this.searchValue||(this.focused=this.items[0]),this.focused&&this.focused.classList.add("wpgb-focused"),this.dropDown.parentElement&&this.search.setAttribute("aria-activedescendant",this.focused&&this.focused.id||"")}},{key:"createList",value:function(){this.uid=0,this.items=[],this.focused=!1;var e=this.createItems(this.Data.options),t=this.options.messages,s=t.search,i=t.loading,n=t.noResults,o=this.options.async;if(e.firstChild)this.assertive&&this.assertive.parentElement&&(this.assertive.textContent="");else{var a=document.createElement("li"),l=n;a.className="wpgb-select-noresults",o&&!this.search.value?l=s:o&&this.Data.loading&&(l=i),this.assertive.textContent=l,a.textContent=l,e.appendChild(a)}return this.toggleLoader(),e}},{key:"createItems",value:function(e){var t=this,s=this.components.list(this.multiple,this.instance);return e&&e.forEach((function(e){if(e.children){var i=t.createGroup(e);i&&s.appendChild(i)}else{var n=t.createItem(e);n&&s.appendChild(n)}})),s}},{key:"createItem",value:function(e){var t=this.components.item(e,e.index);if(e.value&&this.optionExists(e))return e.selected&&!this.focused&&(this.focused=t),e.disabled||this.items.push(t),t.index=e.index,t.disabled=e.disabled,t}},{key:"createGroup",value:function(e){e.uid=++this.uid;var t=this.createItems(e.children);if(t.childElementCount){var s=this.components.group(e),i=this.components.heading(e);return s.appendChild(i),s.appendChild(t),s}}},{key:"optionExists",value:function(e){return!!this.options.async||(!this.searchValue||(this.Data.normalize(e.textContent).search(this.searchValue)>-1||void 0))}},{key:"scrollList",value:function(e){if(this.focused){var t=this.dropDown.getBoundingClientRect(),s=this.focused.getBoundingClientRect(),i=s.top-t.top+s.height;e?this.dropDown.scrollTop+=s.top-t.top+s.height/2-t.height/2:i>t.height?this.dropDown.scrollTop+=i-t.height:i<s.height&&(this.dropDown.scrollTop+=i-s.height)}}},{key:"sizeDropDown",value:function(){var e=this.select.getBoundingClientRect(),t=(e.top,e.bottom),s=e.left,i=e.width,n=this.dropDown.style;n.top=t+window.pageYOffset+"px",n.left=s+"px",n.width=i+"px",n.position="absolute",n.display="block"}},{key:"highlight",value:function(e){e&&!e.disabled&&this.focused&&e!==this.focused&&(this.focused.classList.remove("wpgb-focused"),this.focused=e,this.focused.classList.add("wpgb-focused"),this.search.setAttribute("aria-activedescendant",e.id))}}]),e}()),w=0,O=function(e){h(s,e);var t=v(s);function s(e){var i,n=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{};return a(this,s),(i=t.call(this)).element=e,i.multiple=e.multiple,i.options=o(o({},f),n),i.options.async.url||(i.options.async=0),i.options.async&&(i.options.searchable=1),i}return r(s,[{key:"setInstance",value:function(){var e=this.element.instance;if(m[e])return m[e];this.instance=++w-1,this.element.instance=this.instance,m[this.instance]=this}},{key:"init",value:function(){var e=this.setInstance();if(e)return e;this.Data=new b(this.element,this.options),this.DOM=new D(this.element,this.Data,this.options),this.options.async||this.Data.parse(),this.DOM.create(),this.DOM.append(),this.DOM.hide(),this.element.disabled?this.disable():this.selectEvents(),this.update()}},{key:"destroy",value:function(){this.close(),this.DOM.remove(),this.DOM.reveal(),this.selectEvents(!1),document.activeElement===this.select&&this.element.focus(),delete m[this.instance],delete this.element.instance,delete this.instance}},{key:"enable",value:function(){this.DOM.select.classList.remove("wpgb-select-disabled"),this.DOM.search.disabled=!1,this.selectEvents()}},{key:"disable",value:function(){this.DOM.select.classList.add("wpgb-select-disabled"),this.DOM.search.disabled=!0}},{key:"focus",value:function(){var e=this.DOM.search;document.activeElement!==e&&e.focus()}},{key:"blur",value:function(){var e=this.DOM.search;document.activeElement===e&&e.blur()}},{key:"open",value:function(){this.opened||(this.DOM.appendDropDown(),this.DOM.sizeDropDown(),this.DOM.scrollList(!0),this.DOM.expand(!0),this.dropDownEvents(!0),this.opened=!0)}},{key:"close",value:function(){this.opened&&(this.DOM.expand(!1),this.DOM.removeDropDown(),this.options.async&&(this.Data.options=[],this.Data.loading=!1,this.xhr&&this.xhr.abort(),clearTimeout(this.timeout),this.DOM.clearDropDown()),this.DOM.search.value&&this.reset(),this.DOM.togglePlaceholder(),this.dropDownEvents(!1),this.opened=!1)}},{key:"toggle",value:function(){this.opened?this.close():this.open()}},{key:"reset",value:function(){delete this.results,delete this.DOM.searchValue,this.DOM.search.value="",this.DOM.sizer.textContent="",this.DOM.createDropDown()}},{key:"update",value:function(){this.Data.getSelection(),this.options.async&&this.appendOptions(),this.DOM.updateDropDown(),this.DOM.setSelection(),this.DOM.sizeDropDown()}},{key:"select",value:function(e){var t=this.element.options[e];this.options.async&&(t=this.addOption(e)),t&&!t.disabled&&(t.selected=t&&!t.selected,this.DOM.assertive.textContent=this.options.messages.selected.replace("%s",t.textContent),this.dispatchEvent("change"),this.close())}},{key:"addOption",value:function(e){var t=this,s=this.Data.selection||{},i=this.Data.options||{},n=document.createElement("option"),o=i[e];return o?o&&o.selected?(s.forEach((function(e){e.value!==o.value||t.element.remove(e.index)})),o):(n.value=o.value,n.selected=!0,n.textContent=o.textContent,this.element.add(n),o):{}}},{key:"remove",value:function(e){var t=this.element.options[e];t&&(0!==e||t.value)&&(t.selected=!1,this.DOM.assertive.textContent=this.options.messages.deselected.replace("%s",t.textContent),this.options.async&&this.element.remove(e),this.dispatchEvent("change"),this.DOM.scrollList(!0),this.focus())}},{key:"clear",value:function(){var e=this;this.Data.selection.length&&(Array.from(this.element.options).forEach((function(t){var s=""===t.value&&!t.index;t.selected=!1,e.options.async&&!s&&e.element.remove(t.index)})),this.DOM.assertive.textContent=this.options.messages.cleared,this.dispatchEvent("change"),this.focus())}}]),s}(g);window.WP_Grid_Builder||(window.WP_Grid_Builder={vendors:{}}),WP_Grid_Builder.vendors.select=function(e,t){return new O(e,t)};t.default=O}]);