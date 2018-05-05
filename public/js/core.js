var agile={init:function(){$(".agile-list").length&&(agile.columns(),agile.update(),agile.scroll())},scroll:function(){$(".agile-list").height($(window).height()-290),$(".kanban-board-scroll").width($(".agile").length*$(".agile-column .row").width()+100),$("body").css("overflow-y","hidden")},columns:function(){$.each($(".agile-list"),function(){$(this).closest(".agile").find("h5").css("border-top","2px solid #"+$(this).data("color")),$(this).find(".small-issue-closed").hide(),$(this).data("closed")&&$(this).find(".small-issue-closed").show()})},update:function(){$(".agile-column").sortable({connectWith:".connectColumn",tolerance:"pointer",placeholder:"ui-state-highlight-column",forcePlaceholderSize:!0,handle:".handle",stop:function(){var i=[];$.each($(".agile-column .agile"),function(t,e){i.push($(e).data("value"))}),$.post($(this).data("endpoint"),{columns:i})}}).disableSelection(),$(".agile-list").sortable({connectWith:".connectList",tolerance:"intersect",placeholder:"ui-state-highlight-list",start:function(i,t){t.placeholder.height(t.item.height())},stop:function(){$.each($(".agile-list"),function(i,t){$(t).closest(".agile").find("h5").find("span").text($(t).find("li").length),$(t).sortable("toArray").length&&$.post($(t).data("endpoint"),{status_id:$(t).data("value"),json:window.JSON.stringify($(t).sortable("toArray"))})}),agile.columns(),agile.scroll()}}).disableSelection()}};
var attachment={init:function(){$(".btn-file-attachment").on("change",function(){$("#file-attachment").html($(this).val()),$("#btn-file-attachment-upload").removeClass("hidden")})}};
$(function(){$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$('[data-toggle="tooltip"]').tooltip(),$('[data-provide="markdown"]').markdown({autofocus:!1,savable:!1}),main.init(),attachment.init(),agile.init()});var main={init:function(){main.modalRemoveData(),main.modalSwal(),main.activateTab(),main.loading()},activateTab:function(){""!==location.hash&&$('a[href="'+location.hash+'"]').tab("show"),$('a[data-toggle="tab"]').on("shown",function(t){return location.hash=$(t.target).attr("href").substr(1)})},modalRemoveData:function(){$("body").on("hidden.bs.modal",".modal",function(){$(this).removeData("bs.modal")})},modalSwal:function(){$(".form-delete button").on("click",function(t){t.preventDefault();var a=$(this);swal({title:"Are you sure about this?",text:"You will not be able to recover this information!",type:"warning",showCancelButton:!0,confirmButtonColor:"#DD6B55",confirmButtonText:"Yes, proceed",cancelButtonText:"No, cancel it",closeOnConfirm:!0},function(t){t&&a.closest("form").submit()})})},loading:function(){var t=$("<div>",{class:"loader"});$(".btn-loader").on("click",function(){$(".loader-area").append(t)})}};
var note={init:function(){$(".agile-list").sortable()}};
!function(e,t,n){"use strict";!function e(t,n,o){function a(s,l){if(!n[s]){if(!t[s]){var i="function"==typeof require&&require;if(!l&&i)return i(s,!0);if(r)return r(s,!0);var u=new Error("Cannot find module '"+s+"'");throw u.code="MODULE_NOT_FOUND",u}var c=n[s]={exports:{}};t[s][0].call(c.exports,function(e){var n=t[s][1][e];return a(n||e)},c,c.exports,e,t,n,o)}return n[s].exports}for(var r="function"==typeof require&&require,s=0;s<o.length;s++)a(o[s]);return a}({1:[function(o){var a,r,s,l,i=function(e){return e&&e.__esModule?e:{default:e}},u=o("./modules/handle-dom"),c=o("./modules/utils"),d=o("./modules/handle-swal-dom"),f=o("./modules/handle-click"),p=i(o("./modules/handle-key")),m=i(o("./modules/default-params")),v=i(o("./modules/set-params"));(s=l=function(){function o(e){var t=s;return t[e]===n?m.default[e]:t[e]}var s=arguments[0];if(u.addClass(t.body,"stop-scrolling"),d.resetInput(),s===n)return c.logStr("SweetAlert expects at least 1 attribute!"),!1;var l=c.extend({},m.default);switch(typeof s){case"string":l.title=s,l.text=arguments[1]||"",l.type=arguments[2]||"";break;case"object":if(s.title===n)return c.logStr('Missing "title" argument!'),!1;l.title=s.title;for(var i in m.default)l[i]=o(i);l.confirmButtonText=l.showCancelButton?"Confirm":m.default.confirmButtonText,l.confirmButtonText=o("confirmButtonText"),l.doneFunction=arguments[1]||null;break;default:return c.logStr('Unexpected type of argument! Expected "string" or "object", got '+typeof s),!1}v.default(l),d.fixVerticalPosition(),d.openModal(arguments[1]);for(var y=d.getModal(),h=y.querySelectorAll("button"),g=["onclick","onmouseover","onmouseout","onmousedown","onmouseup","onfocus"],b=function(e){return f.handleButton(e,l,y)},w=0;w<h.length;w++)for(var C=0;C<g.length;C++){var S=g[C];h[w][S]=b}d.getOverlay().onclick=b,a=e.onkeydown;e.onkeydown=function(e){return p.default(e,l,y)},e.onfocus=function(){setTimeout(function(){r!==n&&(r.focus(),r=n)},0)}}).setDefaults=l.setDefaults=function(e){if(!e)throw new Error("userParams is required");if("object"!=typeof e)throw new Error("userParams has to be a object");c.extend(m.default,e)},s.close=l.close=function(){var o=d.getModal();u.fadeOut(d.getOverlay(),5),u.fadeOut(o,5),u.removeClass(o,"showSweetAlert"),u.addClass(o,"hideSweetAlert"),u.removeClass(o,"visible");var s=o.querySelector(".sa-icon.sa-success");u.removeClass(s,"animate"),u.removeClass(s.querySelector(".sa-tip"),"animateSuccessTip"),u.removeClass(s.querySelector(".sa-long"),"animateSuccessLong");var l=o.querySelector(".sa-icon.sa-error");u.removeClass(l,"animateErrorIcon"),u.removeClass(l.querySelector(".sa-x-mark"),"animateXMark");var i=o.querySelector(".sa-icon.sa-warning");return u.removeClass(i,"pulseWarning"),u.removeClass(i.querySelector(".sa-body"),"pulseWarningIns"),u.removeClass(i.querySelector(".sa-dot"),"pulseWarningIns"),setTimeout(function(){var e=o.getAttribute("data-custom-class");u.removeClass(o,e)},300),u.removeClass(t.body,"stop-scrolling"),e.onkeydown=a,e.previousActiveElement&&e.previousActiveElement.focus(),r=n,clearTimeout(o.timeout),!0},s.showInputError=l.showInputError=function(e){var t=d.getModal(),n=t.querySelector(".sa-input-error");u.addClass(n,"show");var o=t.querySelector(".sa-error-container");u.addClass(o,"show"),o.querySelector("p").innerHTML=e,t.querySelector("input").focus()},s.resetInputError=l.resetInputError=function(e){if(e&&13===e.keyCode)return!1;var t=d.getModal(),n=t.querySelector(".sa-input-error");u.removeClass(n,"show");var o=t.querySelector(".sa-error-container");u.removeClass(o,"show")},void 0!==e?e.sweetAlert=e.swal=s:c.logStr("SweetAlert is a frontend module!")},{"./modules/default-params":2,"./modules/handle-click":3,"./modules/handle-dom":4,"./modules/handle-key":5,"./modules/handle-swal-dom":6,"./modules/set-params":8,"./modules/utils":9}],2:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});n.default={title:"",text:"",type:null,allowOutsideClick:!1,showConfirmButton:!0,showCancelButton:!1,closeOnConfirm:!0,closeOnCancel:!0,confirmButtonText:"OK",confirmButtonColor:"#AEDEF4",cancelButtonText:"Cancel",imageUrl:null,imageSize:null,timer:null,customClass:"",html:!1,animation:!0,allowEscapeKey:!0,inputType:"text",inputPlaceholder:"",inputValue:""},t.exports=n.default},{}],3:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});var a=t("./utils"),r=(t("./handle-swal-dom"),t("./handle-dom")),s=function(e,t){var n=!0;r.hasClass(e,"show-input")&&((n=e.querySelector("input").value)||(n="")),t.doneFunction(n),t.closeOnConfirm&&sweetAlert.close()},l=function(e,t){var n=String(t.doneFunction).replace(/\s/g,"");"function("===n.substring(0,9)&&")"!==n.substring(9,10)&&t.doneFunction(!1),t.closeOnCancel&&sweetAlert.close()};o.default={handleButton:function(t,n,o){function i(e){m&&n.confirmButtonColor&&(p.style.backgroundColor=e)}var u,c,d,f=t||e.event,p=f.target||f.srcElement,m=-1!==p.className.indexOf("confirm"),v=-1!==p.className.indexOf("sweet-overlay"),y=r.hasClass(o,"visible"),h=n.doneFunction&&"true"===o.getAttribute("data-has-done-function");switch(m&&n.confirmButtonColor&&(u=n.confirmButtonColor,c=a.colorLuminance(u,-.04),d=a.colorLuminance(u,-.14)),f.type){case"mouseover":i(c);break;case"mouseout":i(u);break;case"mousedown":i(d);break;case"mouseup":i(c);break;case"focus":var g=o.querySelector("button.confirm"),b=o.querySelector("button.cancel");m?b.style.boxShadow="none":g.style.boxShadow="none";break;case"click":var w=o===p,C=r.isDescendant(o,p);if(!w&&!C&&y&&!n.allowOutsideClick)break;m&&h&&y?s(o,n):h&&y||v?l(o,n):r.isDescendant(o,p)&&"BUTTON"===p.tagName&&sweetAlert.close()}},handleConfirm:s,handleCancel:l},n.exports=o.default},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],4:[function(n,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=function(e,t){return new RegExp(" "+t+" ").test(" "+e.className+" ")},s=function(e){e.style.opacity="",e.style.display="block"},l=function(e){e.style.opacity="",e.style.display="none"};a.hasClass=r,a.addClass=function(e,t){r(e,t)||(e.className+=" "+t)},a.removeClass=function(e,t){var n=" "+e.className.replace(/[\t\r\n]/g," ")+" ";if(r(e,t)){for(;n.indexOf(" "+t+" ")>=0;)n=n.replace(" "+t+" "," ");e.className=n.replace(/^\s+|\s+$/g,"")}},a.escapeHtml=function(e){var n=t.createElement("div");return n.appendChild(t.createTextNode(e)),n.innerHTML},a._show=s,a.show=function(e){if(e&&!e.length)return s(e);for(var t=0;t<e.length;++t)s(e[t])},a._hide=l,a.hide=function(e){if(e&&!e.length)return l(e);for(var t=0;t<e.length;++t)l(e[t])},a.isDescendant=function(e,t){for(var n=t.parentNode;null!==n;){if(n===e)return!0;n=n.parentNode}return!1},a.getTopMargin=function(e){e.style.left="-9999px",e.style.display="block";var t,n=e.clientHeight;return t="undefined"!=typeof getComputedStyle?parseInt(getComputedStyle(e).getPropertyValue("padding-top"),10):parseInt(e.currentStyle.padding),e.style.left="",e.style.display="none","-"+parseInt((n+t)/2)+"px"},a.fadeIn=function(e,t){if(+e.style.opacity<1){t=t||16,e.style.opacity=0,e.style.display="block";var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity+(new Date-n)/100,n=+new Date,+e.style.opacity<1&&setTimeout(o,t)});o()}e.style.display="block"},a.fadeOut=function(e,t){t=t||16,e.style.opacity=1;var n=+new Date,o=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){e.style.opacity=+e.style.opacity-(new Date-n)/100,n=+new Date,+e.style.opacity>0?setTimeout(o,t):e.style.display="none"});o()},a.fireClick=function(n){if("function"==typeof MouseEvent){var o=new MouseEvent("click",{view:e,bubbles:!1,cancelable:!0});n.dispatchEvent(o)}else if(t.createEvent){var a=t.createEvent("MouseEvents");a.initEvent("click",!1,!1),n.dispatchEvent(a)}else t.createEventObject?n.fireEvent("onclick"):"function"==typeof n.onclick&&n.onclick()},a.stopEventPropagation=function(t){"function"==typeof t.stopPropagation?(t.stopPropagation(),t.preventDefault()):e.event&&e.event.hasOwnProperty("cancelBubble")&&(e.event.cancelBubble=!0)}},{}],5:[function(t,o,a){Object.defineProperty(a,"__esModule",{value:!0});var r=t("./handle-dom"),s=t("./handle-swal-dom");a.default=function(t,o,a){var l=t||e.event,i=l.keyCode||l.which,u=a.querySelector("button.confirm"),c=a.querySelector("button.cancel"),d=a.querySelectorAll("button[tabindex]");if(-1!==[9,13,32,27].indexOf(i)){for(var f=l.target||l.srcElement,p=-1,m=0;m<d.length;m++)if(f===d[m]){p=m;break}9===i?(f=-1===p?u:p===d.length-1?d[0]:d[p+1],r.stopEventPropagation(l),f.focus(),o.confirmButtonColor&&s.setFocusStyle(f,o.confirmButtonColor)):13===i?("INPUT"===f.tagName&&(f=u,u.focus()),f=-1===p?u:n):27===i&&!0===o.allowEscapeKey?(f=c,r.fireClick(f,l)):f=n}},o.exports=a.default},{"./handle-dom":4,"./handle-swal-dom":6}],6:[function(n,o,a){var r=function(e){return e&&e.__esModule?e:{default:e}};Object.defineProperty(a,"__esModule",{value:!0});var s=n("./utils"),l=n("./handle-dom"),i=r(n("./default-params")),u=r(n("./injected-html")),c=function(){var e=t.createElement("div");for(e.innerHTML=u.default;e.firstChild;)t.body.appendChild(e.firstChild)},d=function(e){function t(){return e.apply(this,arguments)}return t.toString=function(){return e.toString()},t}(function(){var e=t.querySelector(".sweet-alert");return e||(c(),e=d()),e}),f=function(){var e=d();return e?e.querySelector("input"):void 0},p=function(){return t.querySelector(".sweet-overlay")},m=function(e){if(e&&13===e.keyCode)return!1;var t=d(),n=t.querySelector(".sa-input-error");l.removeClass(n,"show");var o=t.querySelector(".sa-error-container");l.removeClass(o,"show")};a.sweetAlertInitialize=c,a.getModal=d,a.getOverlay=p,a.getInput=f,a.setFocusStyle=function(e,t){var n=s.hexToRgb(t);e.style.boxShadow="0 0 2px rgba("+n+", 0.8), inset 0 0 0 1px rgba(0, 0, 0, 0.05)"},a.openModal=function(n){var o=d();l.fadeIn(p(),10),l.show(o),l.addClass(o,"showSweetAlert"),l.removeClass(o,"hideSweetAlert"),e.previousActiveElement=t.activeElement;o.querySelector("button.confirm").focus(),setTimeout(function(){l.addClass(o,"visible")},500);var a=o.getAttribute("data-timer");if("null"!==a&&""!==a){var r=n;o.timeout=setTimeout(function(){r&&"true"===o.getAttribute("data-has-done-function")?r(null):sweetAlert.close()},a)}},a.resetInput=function(){var e=d(),t=f();l.removeClass(e,"show-input"),t.value=i.default.inputValue,t.setAttribute("type",i.default.inputType),t.setAttribute("placeholder",i.default.inputPlaceholder),m()},a.resetInputError=m,a.fixVerticalPosition=function(){d().style.marginTop=l.getTopMargin(d())}},{"./default-params":2,"./handle-dom":4,"./injected-html":7,"./utils":9}],7:[function(e,t,n){Object.defineProperty(n,"__esModule",{value:!0});n.default='<div class="sweet-overlay" tabIndex="-1"></div><div class="sweet-alert"><div class="sa-icon sa-error">\n      <span class="sa-x-mark">\n        <span class="sa-line sa-left"></span>\n        <span class="sa-line sa-right"></span>\n      </span>\n    </div><div class="sa-icon sa-warning">\n      <span class="sa-body"></span>\n      <span class="sa-dot"></span>\n    </div><div class="sa-icon sa-info"></div><div class="sa-icon sa-success">\n      <span class="sa-line sa-tip"></span>\n      <span class="sa-line sa-long"></span>\n\n      <div class="sa-placeholder"></div>\n      <div class="sa-fix"></div>\n    </div><div class="sa-icon sa-custom"></div><h2>Title</h2>\n    <p>Text</p>\n    <fieldset>\n      <input type="text" tabIndex="3" />\n      <div class="sa-input-error"></div>\n    </fieldset><div class="sa-error-container">\n      <div class="icon">!</div>\n      <p>Not valid!</p>\n    </div><div class="sa-button-container">\n      <button class="cancel" tabIndex="2">Cancel</button>\n      <button class="confirm" tabIndex="1">OK</button>\n    </div></div>',t.exports=n.default},{}],8:[function(e,t,o){Object.defineProperty(o,"__esModule",{value:!0});var a=e("./utils"),r=e("./handle-swal-dom"),s=e("./handle-dom"),l=["error","warning","info","success","input","prompt"];o.default=function(e){var t=r.getModal(),o=t.querySelector("h2"),i=t.querySelector("p"),u=t.querySelector("button.cancel"),c=t.querySelector("button.confirm");if(o.innerHTML=e.html?e.title:s.escapeHtml(e.title).split("\n").join("<br>"),i.innerHTML=e.html?e.text:s.escapeHtml(e.text||"").split("\n").join("<br>"),e.text&&s.show(i),e.customClass)s.addClass(t,e.customClass),t.setAttribute("data-custom-class",e.customClass);else{var d=t.getAttribute("data-custom-class");s.removeClass(t,d),t.setAttribute("data-custom-class","")}if(s.hide(t.querySelectorAll(".sa-icon")),e.type&&!a.isIE8()){var f=function(){for(var o=!1,a=0;a<l.length;a++)if(e.type===l[a]){o=!0;break}if(!o)return logStr("Unknown alert type: "+e.type),{v:!1};var i=n;-1!==["success","error","warning","info"].indexOf(e.type)&&(i=t.querySelector(".sa-icon.sa-"+e.type),s.show(i));var u=r.getInput();switch(e.type){case"success":s.addClass(i,"animate"),s.addClass(i.querySelector(".sa-tip"),"animateSuccessTip"),s.addClass(i.querySelector(".sa-long"),"animateSuccessLong");break;case"error":s.addClass(i,"animateErrorIcon"),s.addClass(i.querySelector(".sa-x-mark"),"animateXMark");break;case"warning":s.addClass(i,"pulseWarning"),s.addClass(i.querySelector(".sa-body"),"pulseWarningIns"),s.addClass(i.querySelector(".sa-dot"),"pulseWarningIns");break;case"input":case"prompt":u.setAttribute("type",e.inputType),u.value=e.inputValue,u.setAttribute("placeholder",e.inputPlaceholder),s.addClass(t,"show-input"),setTimeout(function(){u.focus(),u.addEventListener("keyup",swal.resetInputError)},400)}}();if("object"==typeof f)return f.v}if(e.imageUrl){var p=t.querySelector(".sa-icon.sa-custom");p.style.backgroundImage="url("+e.imageUrl+")",s.show(p);var m=80,v=80;if(e.imageSize){var y=e.imageSize.toString().split("x"),h=y[0],g=y[1];h&&g?(m=h,v=g):logStr("Parameter imageSize expects value with format WIDTHxHEIGHT, got "+e.imageSize)}p.setAttribute("style",p.getAttribute("style")+"width:"+m+"px; height:"+v+"px")}t.setAttribute("data-has-cancel-button",e.showCancelButton),e.showCancelButton?u.style.display="inline-block":s.hide(u),t.setAttribute("data-has-confirm-button",e.showConfirmButton),e.showConfirmButton?c.style.display="inline-block":s.hide(c),e.cancelButtonText&&(u.innerHTML=s.escapeHtml(e.cancelButtonText)),e.confirmButtonText&&(c.innerHTML=s.escapeHtml(e.confirmButtonText)),e.confirmButtonColor&&(c.style.backgroundColor=e.confirmButtonColor,r.setFocusStyle(c,e.confirmButtonColor)),t.setAttribute("data-allow-outside-click",e.allowOutsideClick);var b=!!e.doneFunction;t.setAttribute("data-has-done-function",b),e.animation?"string"==typeof e.animation?t.setAttribute("data-animation",e.animation):t.setAttribute("data-animation","pop"):t.setAttribute("data-animation","none"),t.setAttribute("data-timer",e.timer)},t.exports=o.default},{"./handle-dom":4,"./handle-swal-dom":6,"./utils":9}],9:[function(t,n,o){Object.defineProperty(o,"__esModule",{value:!0});o.extend=function(e,t){for(var n in t)t.hasOwnProperty(n)&&(e[n]=t[n]);return e},o.hexToRgb=function(e){var t=/^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(e);return t?parseInt(t[1],16)+", "+parseInt(t[2],16)+", "+parseInt(t[3],16):null},o.isIE8=function(){return e.attachEvent&&!e.addEventListener},o.logStr=function(t){e.console&&e.console.log("SweetAlert: "+t)},o.colorLuminance=function(e,t){(e=String(e).replace(/[^0-9a-f]/gi,"")).length<6&&(e=e[0]+e[0]+e[1]+e[1]+e[2]+e[2]),t=t||0;var n,o,a="#";for(o=0;3>o;o++)n=parseInt(e.substr(2*o,2),16),n=Math.round(Math.min(Math.max(0,n+n*t),255)).toString(16),a+=("00"+n).substr(n.length);return a}},{}]},{},[1]),"function"==typeof define&&define.amd?define(function(){return sweetAlert}):"undefined"!=typeof module&&module.exports&&(module.exports=sweetAlert)}(window,document);