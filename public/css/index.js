;window.Modernizr=function(a,b,c){function A(a){j.cssText=a}function B(a,b){return A(n.join(a+";")+(b||""))}function C(a,b){return typeof a===b}function D(a,b){return!!~(""+a).indexOf(b)}function E(a,b){for(var d in a){var e=a[d];if(!D(e,"-")&&j[e]!==c)return b=="pfx"?e:!0}return!1}function F(a,b,d){for(var e in a){var f=b[a[e]];if(f!==c)return d===!1?a[e]:C(f,"function")?f.bind(d||b):f}return!1}function G(a,b,c){var d=a.charAt(0).toUpperCase()+a.slice(1),e=(a+" "+p.join(d+" ")+d).split(" ");return C(b,"string")||C(b,"undefined")?E(e,b):(e=(a+" "+q.join(d+" ")+d).split(" "),F(e,b,c))}var d="2.8.3",e={},f=!0,g=b.documentElement,h="modernizr",i=b.createElement(h),j=i.style,k,l=":)",m={}.toString,n=" -webkit- -moz- -o- -ms- ".split(" "),o="Webkit Moz O ms",p=o.split(" "),q=o.toLowerCase().split(" "),r={},s={},t={},u=[],v=u.slice,w,x=function(a,c,d,e){var f,i,j,k,l=b.createElement("div"),m=b.body,n=m||b.createElement("body");if(parseInt(d,10))while(d--)j=b.createElement("div"),j.id=e?e[d]:h+(d+1),l.appendChild(j);return f=["&#173;",'<style id="s',h,'">',a,"</style>"].join(""),l.id=h,(m?l:n).innerHTML+=f,n.appendChild(l),m||(n.style.background="",n.style.overflow="hidden",k=g.style.overflow,g.style.overflow="hidden",g.appendChild(n)),i=c(l,a),m?l.parentNode.removeChild(l):(n.parentNode.removeChild(n),g.style.overflow=k),!!i},y={}.hasOwnProperty,z;!C(y,"undefined")&&!C(y.call,"undefined")?z=function(a,b){return y.call(a,b)}:z=function(a,b){return b in a&&C(a.constructor.prototype[b],"undefined")},Function.prototype.bind||(Function.prototype.bind=function(b){var c=this;if(typeof c!="function")throw new TypeError;var d=v.call(arguments,1),e=function(){if(this instanceof e){var a=function(){};a.prototype=c.prototype;var f=new a,g=c.apply(f,d.concat(v.call(arguments)));return Object(g)===g?g:f}return c.apply(b,d.concat(v.call(arguments)))};return e}),r.flexbox=function(){return G("flexWrap")},r.flexboxlegacy=function(){return G("boxDirection")},r.rgba=function(){return A("background-color:rgba(150,255,150,.5)"),D(j.backgroundColor,"rgba")},r.hsla=function(){return A("background-color:hsla(120,40%,100%,.5)"),D(j.backgroundColor,"rgba")||D(j.backgroundColor,"hsla")},r.multiplebgs=function(){return A("background:url(https://),url(https://),red url(https://)"),/(url\s*\(.*?){3}/.test(j.background)},r.backgroundsize=function(){return G("backgroundSize")},r.borderimage=function(){return G("borderImage")},r.borderradius=function(){return G("borderRadius")},r.boxshadow=function(){return G("boxShadow")},r.textshadow=function(){return b.createElement("div").style.textShadow===""},r.opacity=function(){return B("opacity:.55"),/^0.55$/.test(j.opacity)},r.cssanimations=function(){return G("animationName")},r.csscolumns=function(){return G("columnCount")},r.cssgradients=function(){var a="background-image:",b="gradient(linear,left top,right bottom,from(#9f9),to(white));",c="linear-gradient(left top,#9f9, white);";return A((a+"-webkit- ".split(" ").join(b+a)+n.join(c+a)).slice(0,-a.length)),D(j.backgroundImage,"gradient")},r.cssreflections=function(){return G("boxReflect")},r.csstransforms=function(){return!!G("transform")},r.csstransforms3d=function(){var a=!!G("perspective");return a&&"webkitPerspective"in g.style&&x("@media (transform-3d),(-webkit-transform-3d){#modernizr{left:9px;position:absolute;height:3px;}}",function(b,c){a=b.offsetLeft===9&&b.offsetHeight===3}),a},r.csstransitions=function(){return G("transition")},r.fontface=function(){var a;return x('@font-face {font-family:"font";src:url("https://")}',function(c,d){var e=b.getElementById("smodernizr"),f=e.sheet||e.styleSheet,g=f?f.cssRules&&f.cssRules[0]?f.cssRules[0].cssText:f.cssText||"":"";a=/src/i.test(g)&&g.indexOf(d.split(" ")[0])===0}),a},r.generatedcontent=function(){var a;return x(["#",h,"{font:0/0 a}#",h,':after{content:"',l,'";visibility:hidden;font:3px/1 a}'].join(""),function(b){a=b.offsetHeight>=3}),a};for(var H in r)z(r,H)&&(w=H.toLowerCase(),e[w]=r[H](),u.push((e[w]?"":"no-")+w));return e.addTest=function(a,b){if(typeof a=="object")for(var d in a)z(a,d)&&e.addTest(d,a[d]);else{a=a.toLowerCase();if(e[a]!==c)return e;b=typeof b=="function"?b():b,typeof f!="undefined"&&f&&(g.className+=" "+(b?"":"no-")+a),e[a]=b}return e},A(""),i=k=null,e._version=d,e._prefixes=n,e._domPrefixes=q,e._cssomPrefixes=p,e.testProp=function(a){return E([a])},e.testAllProps=G,e.testStyles=x,g.className=g.className.replace(/(^|\s)no-js(\s|$)/,"$1$2")+(f?" js "+u.join(" "):""),e}(this,this.document);;(function($){$(function(){$('div.share42init_1').each(function(idx){var el=$(this),u=el.attr('data-url'),t=el.attr('data-title'),i=el.attr('data-image'),d=el.attr('data-description'),f=el.attr('data-path'),fn=el.attr('data-icons-file'),z=el.attr("data-zero-counter");if(!u)u=location.href;if(!fn)fn='sprites.png';if(!z)z=0;if(!f){function path(name){var sc=document.getElementsByTagName('script'),sr=new RegExp('^(.*/|)('+name+')([#?]|$)');for(var p=0,scL=sc.length;p<scL;p++){var m=String(sc[p].src).match(sr);if(m){if(m[1].match(/^((https?|file)\:\/{2,}|\w:[\/\\])/))return m[1];if(m[1].indexOf("/")==0)return m[1];b=document.getElementsByTagName('base');if(b[0]&&b[0].href)return b[0].href+m[1];else return document.location.pathname.match(/(.*[\/\\])/)[0]+m[1];}}return null;}f=path('share42.js');}if(!t)t=document.title;if(!d){var meta=$('meta[name="description"]').attr('content');if(meta!==undefined)d=meta;else d='';}u=encodeURIComponent(u);t=encodeURIComponent(t);t=t.replace(/\'/g,'%27');i=encodeURIComponent(i);d=encodeURIComponent(d);d=d.replace(/\'/g,'%27');var fbQuery='u='+u;if(i!='null'&&i!='')fbQuery='s=100&p[url]='+u+'&p[title]='+t+'&p[summary]='+d+'&p[images][0]='+i;var vkImage='';if(i!='null'&&i!='')vkImage='&image='+i;var s=new Array('"#" data-count="vk" onclick="window.open(\'http://vk.com/share.php?url='+u+'&title='+t+vkImage+'&description='+d+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться В Контакте"','"#" data-count="odkl" onclick="window.open(\'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl='+u+'&title='+t+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Одноклассники"','"#" data-count="fb" onclick="window.open(\'http://www.facebook.com/sharer.php?m2w&'+fbQuery+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Facebook"','"#" data-count="twi" onclick="window.open(\'https://twitter.com/intent/tweet?text='+t+'&url='+u+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Twitter"','"#" data-count="gplus" onclick="window.open(\'https://plus.google.com/share?url='+u+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Google+"');var l='';for(j=0;j<s.length;j++)l+='<span class="share42-item" style="display:inline-block;margin:0 6px 0 0;"><a rel="nofollow" style="display:inline-block;width:32px;height:32px;margin:0;padding:0;outline:none;vertical-align:bottom;background:url('+f+fn+') -'+32*j+'px -64px no-repeat" href='+s[j]+' target="_blank"></a></span>';el.html('<span id="share42">'+l+'</span>'+'');})})})(jQuery);(function($){$(function(){$('div.share42init_2').each(function(idx){var el=$(this),u=el.attr('data-url'),t=el.attr('data-title'),i=el.attr('data-image'),d=el.attr('data-description'),f=el.attr('data-path'),fn=el.attr('data-icons-file'),z=el.attr("data-zero-counter");if(!u)u=location.href;if(!fn)fn='sprites.png';if(!z)z=0;if(!f){function path(name){var sc=document.getElementsByTagName('script'),sr=new RegExp('^(.*/|)('+name+')([#?]|$)');for(var p=0,scL=sc.length;p<scL;p++){var m=String(sc[p].src).match(sr);if(m){if(m[1].match(/^((https?|file)\:\/{2,}|\w:[\/\\])/))return m[1];if(m[1].indexOf("/")==0)return m[1];b=document.getElementsByTagName('base');if(b[0]&&b[0].href)return b[0].href+m[1];else return document.location.pathname.match(/(.*[\/\\])/)[0]+m[1];}}return null;}f=path('share42.js');}if(!t)t=document.title;if(!d){var meta=$('meta[name="description"]').attr('content');if(meta!==undefined)d=meta;else d='';}u=encodeURIComponent(u);t=encodeURIComponent(t);t=t.replace(/\'/g,'%27');i=encodeURIComponent(i);d=encodeURIComponent(d);d=d.replace(/\'/g,'%27');var fbQuery='u='+u;if(i!='null'&&i!='')fbQuery='s=100&p[url]='+u+'&p[title]='+t+'&p[summary]='+d+'&p[images][0]='+i;var vkImage='';if(i!='null'&&i!='')vkImage='&image='+i;var s=new Array('"#" data-count="vk" onclick="window.open(\'http://vk.com/share.php?url='+u+'&title='+t+vkImage+'&description='+d+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться В Контакте"','"#" data-count="fb" onclick="window.open(\'http://www.facebook.com/sharer.php?m2w&'+fbQuery+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Facebook"','"#" data-count="twi" onclick="window.open(\'https://twitter.com/intent/tweet?text='+t+'&url='+u+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Twitter"','"#" data-count="gplus" onclick="window.open(\'https://plus.google.com/share?url='+u+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Google+"','"#" data-count="odkl" onclick="window.open(\'http://www.odnoklassniki.ru/dk?st.cmd=addShare&st._surl='+u+'&title='+t+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Добавить в Одноклассники"','"#" data-count="mail" onclick="window.open(\'http://connect.mail.ru/share?url='+u+'&title='+t+'&description='+d+'&imageurl='+i+'\', \'_blank\', \'scrollbars=0, resizable=1, menubar=0, left=100, top=100, width=550, height=440, toolbar=0, status=0\');return false" title="Поделиться в Моем Мире@Mail.Ru"');var l='';for(j=0;j<s.length;j++)l+='<span class="share42-item" style="display:inline-block;margin:0 5px 0 0;"><a rel="nofollow" style="display:inline-block;width:24px;height:24px;margin:0;padding:0;outline:none;vertical-align:bottom;background:url('+f+fn+') -'+24*j+'px -96px no-repeat" href='+s[j]+' target="_blank"></a></span>';el.html('<span id="share42">'+l+'</span>'+'');})})})(jQuery);
;(function (factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module.
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        // Node/CommonJS
        factory(require('jquery'));
    } else {
        // Browser globals
        factory(jQuery);
    }
}(function ($) {

var ua = navigator.userAgent,
	iPhone = /iphone/i.test(ua),
	chrome = /chrome/i.test(ua),
	android = /android/i.test(ua),
	caretTimeoutId;

$.mask = {
	//Predefined character definitions
	definitions: {
		'9': "[0-9]",
		'a': "[A-Za-z]",
		'*': "[A-Za-z0-9]"
	},
	autoclear: true,
	dataName: "rawMaskFn",
	placeholder: '_'
};

$.fn.extend({
	//Helper Function for Caret positioning
	caret: function(begin, end) {
		var range;

		if (this.length === 0 || this.is(":hidden") || this.get(0) !== document.activeElement) {
			return;
		}

		if (typeof begin == 'number') {
			end = (typeof end === 'number') ? end : begin;
			return this.each(function() {
				if (this.setSelectionRange) {
					this.setSelectionRange(begin, end);
				} else if (this.createTextRange) {
					range = this.createTextRange();
					range.collapse(true);
					range.moveEnd('character', end);
					range.moveStart('character', begin);
					range.select();
				}
			});
		} else {
			if (this[0].setSelectionRange) {
				begin = this[0].selectionStart;
				end = this[0].selectionEnd;
			} else if (document.selection && document.selection.createRange) {
				range = document.selection.createRange();
				begin = 0 - range.duplicate().moveStart('character', -100000);
				end = begin + range.text.length;
			}
			return { begin: begin, end: end };
		}
	},
	unmask: function() {
		return this.trigger("unmask");
	},
	mask: function(mask, settings) {
		var input,
			defs,
			tests,
			partialPosition,
			firstNonMaskPos,
            lastRequiredNonMaskPos,
            len,
            oldVal;

		if (!mask && this.length > 0) {
			input = $(this[0]);
            var fn = input.data($.mask.dataName)
			return fn?fn():undefined;
		}

		settings = $.extend({
			autoclear: $.mask.autoclear,
			placeholder: $.mask.placeholder, // Load default placeholder
			completed: null
		}, settings);


		defs = $.mask.definitions;
		tests = [];
		partialPosition = len = mask.length;
		firstNonMaskPos = null;

		mask = String(mask);

		$.each(mask.split(""), function(i, c) {
			if (c == '?') {
				len--;
				partialPosition = i;
			} else if (defs[c]) {
				tests.push(new RegExp(defs[c]));
				if (firstNonMaskPos === null) {
					firstNonMaskPos = tests.length - 1;
				}
                if(i < partialPosition){
                    lastRequiredNonMaskPos = tests.length - 1;
                }
			} else {
				tests.push(null);
			}
		});

		return this.trigger("unmask").each(function() {
			var input = $(this),
				buffer = $.map(
    				mask.split(""),
    				function(c, i) {
    					if (c != '?') {
    						return defs[c] ? getPlaceholder(i) : c;
    					}
    				}),
				defaultBuffer = buffer.join(''),
				focusText = input.val();

            function tryFireCompleted(){
                if (!settings.completed) {
                    return;
                }

                for (var i = firstNonMaskPos; i <= lastRequiredNonMaskPos; i++) {
                    if (tests[i] && buffer[i] === getPlaceholder(i)) {
                        return;
                    }
                }
                settings.completed.call(input);
            }

            function getPlaceholder(i){
                if(i < settings.placeholder.length)
                    return settings.placeholder.charAt(i);
                return settings.placeholder.charAt(0);
            }

			function seekNext(pos) {
				while (++pos < len && !tests[pos]);
				return pos;
			}

			function seekPrev(pos) {
				while (--pos >= 0 && !tests[pos]);
				return pos;
			}

			function shiftL(begin,end) {
				var i,
					j;

				if (begin<0) {
					return;
				}

				for (i = begin, j = seekNext(end); i < len; i++) {
					if (tests[i]) {
						if (j < len && tests[i].test(buffer[j])) {
							buffer[i] = buffer[j];
							buffer[j] = getPlaceholder(j);
						} else {
							break;
						}

						j = seekNext(j);
					}
				}
				writeBuffer();
				input.caret(Math.max(firstNonMaskPos, begin));
			}

			function shiftR(pos) {
				var i,
					c,
					j,
					t;

				for (i = pos, c = getPlaceholder(pos); i < len; i++) {
					if (tests[i]) {
						j = seekNext(i);
						t = buffer[i];
						buffer[i] = c;
						if (j < len && tests[j].test(t)) {
							c = t;
						} else {
							break;
						}
					}
				}
			}

			function androidInputEvent(e) {
				var curVal = input.val();
				var pos = input.caret();
				if (oldVal && oldVal.length && oldVal.length > curVal.length ) {
					// a deletion or backspace happened
					checkVal(true);
					while (pos.begin > 0 && !tests[pos.begin-1])
						pos.begin--;
					if (pos.begin === 0)
					{
						while (pos.begin < firstNonMaskPos && !tests[pos.begin])
							pos.begin++;
					}
					input.caret(pos.begin,pos.begin);
				} else {
					var pos2 = checkVal(true);
					var lastEnteredValue = curVal.charAt(pos.begin);
					if (pos.begin < len){
						if(!tests[pos.begin]){
							pos.begin++;
							if(tests[pos.begin].test(lastEnteredValue)){
								pos.begin++;
							}
						}else{
							if(tests[pos.begin].test(lastEnteredValue)){
								pos.begin++;
							}
						}
					}
					input.caret(pos.begin,pos.begin);
				}
				tryFireCompleted();
			}


			function blurEvent(e) {
                checkVal();

                if (input.val() != focusText)
                    input.change();
            }

			function keydownEvent(e) {
                if (input.prop("readonly")){
                    return;
                }

				var k = e.which || e.keyCode,
					pos,
					begin,
					end;
                    oldVal = input.val();
				//backspace, delete, and escape get special treatment
				if (k === 8 || k === 46 || (iPhone && k === 127)) {
					pos = input.caret();
					begin = pos.begin;
					end = pos.end;

					if (end - begin === 0) {
						begin=k!==46?seekPrev(begin):(end=seekNext(begin-1));
						end=k===46?seekNext(end):end;
					}
					clearBuffer(begin, end);
					shiftL(begin, end - 1);

					e.preventDefault();
				} else if( k === 13 ) { // enter
					blurEvent.call(this, e);
				} else if (k === 27) { // escape
					input.val(focusText);
					input.caret(0, checkVal());
					e.preventDefault();
				}
			}

			function keypressEvent(e) {
                if (input.prop("readonly")){
                    return;
                }

				var k = e.which || e.keyCode,
					pos = input.caret(),
					p,
					c,
					next;

				if (e.ctrlKey || e.altKey || e.metaKey || k < 32) {//Ignore
					return;
				} else if ( k && k !== 13 ) {
					if (pos.end - pos.begin !== 0){
						clearBuffer(pos.begin, pos.end);
						shiftL(pos.begin, pos.end-1);
					}

					p = seekNext(pos.begin - 1);
					if (p < len) {
						c = String.fromCharCode(k);
						if (tests[p].test(c)) {
							shiftR(p);

							buffer[p] = c;
							writeBuffer();
							next = seekNext(p);

							if(android){
								//Path for CSP Violation on FireFox OS 1.1
								var proxy = function() {
									$.proxy($.fn.caret,input,next)();
								};

								setTimeout(proxy,0);
							}else{
								input.caret(next);
							}
                            if(pos.begin <= lastRequiredNonMaskPos){
		                         tryFireCompleted();
                             }
						}
					}
					e.preventDefault();
				}
			}

			function clearBuffer(start, end) {
				var i;
				for (i = start; i < end && i < len; i++) {
					if (tests[i]) {
						buffer[i] = getPlaceholder(i);
					}
				}
			}

			function writeBuffer() { input.val(buffer.join('')); }

			function checkVal(allow) {
				//try to place characters where they belong
				var test = input.val(),
					lastMatch = -1,
					i,
					c,
					pos;

				for (i = 0, pos = 0; i < len; i++) {
					if (tests[i]) {
						buffer[i] = getPlaceholder(i);
						while (pos++ < test.length) {
							c = test.charAt(pos - 1);
							if (tests[i].test(c)) {
								buffer[i] = c;
								lastMatch = i;
								break;
							}
						}
						if (pos > test.length) {
							clearBuffer(i + 1, len);
							break;
						}
					} else {
                        if (buffer[i] === test.charAt(pos)) {
                            pos++;
                        }
                        if( i < partialPosition){
                            lastMatch = i;
                        }
					}
				}
				if (allow) {
					writeBuffer();
				} else if (lastMatch + 1 < partialPosition) {
					if (settings.autoclear || buffer.join('') === defaultBuffer) {
						// Invalid value. Remove it and replace it with the
						// mask, which is the default behavior.
						if(input.val()) input.val("");
						clearBuffer(0, len);
					} else {
						// Invalid value, but we opt to show the value to the
						// user and allow them to correct their mistake.
						writeBuffer();
					}
				} else {
					writeBuffer();
					input.val(input.val().substring(0, lastMatch + 1));
				}
				return (partialPosition ? i : firstNonMaskPos);
			}

			input.data($.mask.dataName,function(){
				return $.map(buffer, function(c, i) {
					return tests[i]&&c!=getPlaceholder(i) ? c : null;
				}).join('');
			});


			input
				.one("unmask", function() {
					input
						.off(".mask")
						.removeData($.mask.dataName);
				})
				.on("focus.mask", function() {
                    if (input.prop("readonly")){
                        return;
                    }

					clearTimeout(caretTimeoutId);
					var pos;

					focusText = input.val();

					pos = checkVal();

					caretTimeoutId = setTimeout(function(){
                        if(input.get(0) !== document.activeElement){
                            return;
                        }
						writeBuffer();
						if (pos == mask.replace("?","").length) {
							input.caret(0, pos);
						} else {
							input.caret(pos);
						}
					}, 10);
				})
				.on("blur.mask", blurEvent)
				.on("keydown.mask", keydownEvent)
				.on("keypress.mask", keypressEvent)
				.on("input.mask paste.mask", function() {
                    if (input.prop("readonly")){
                        return;
                    }

					setTimeout(function() {
						var pos=checkVal(true);
						input.caret(pos);
                        tryFireCompleted();
					}, 0);
				});
                if (chrome && android)
                {
                    input
                        .off('input.mask')
                        .on('input.mask', androidInputEvent);
                }
				checkVal(); //Perform initial check for existing values
		});
	}
});
}));

;var leave_show=0;var timestamp1=0;var timestamp2=0;var leave_y=0;var leave_allow=false;var leave_timer=0;var close_event=0;$(function(){timestamp1=getUnixTimestamp();timestamp2=timestamp1;leave_show=$.cookie('leave_show');if(leave_show==null)leave_show=1;$.cookie('leave_show',leave_show,{expires:1,path:'/'});if(leave_show==1){$('#hoverdiv').mousemove(function(event){leave_y_new=event.pageY;leave_allow=false;if(leave_y_new<leave_y)leave_allow=true;leave_y=leave_y_new;if(leave_show==0)leave_allow=false;})
$('#hoverdiv').hover(function(){clearTimeout(leave_timer);},function(){if(leave_allow){leave_timer=setTimeout(leave,100);}});}});function leave_close(){leave_show=0;$.cookie('leave_show',leave_show,{expires:5,path:'/'});$('#hoverdiv').unbind();}
function leave(){if(leave_show==0)return false;var d=new Date();timestamp2=getUnixTimestamp();var delta=timestamp2-timestamp1;if(delta<5)return false;var rmd=$('[data-remodal-id=modal]').remodal({});rmd.open();yaCounter31501218.reachGoal('exit');return false;}
function getUnixTimestamp(){var d=new Date();return Math.round(d.getTime()/1000);}
$(document).on('closing','div[data-remodal-id="modal"]',function(e){leave_close();});$(document).on('opened','.remodal',function(){$('.remodal-wrapper').bind('click',function(){exit1();});$('#close_modal').bind('click',function(){exit2();});});$(document).on('opened','#sremodal',function(){yaCounter31501218.reachGoal('sravnenie');});function exit1(){if(close_event==0)yaCounter31501218.reachGoal('not-exit2');close_event=1;}
function exit2(e){if(close_event==0)yaCounter31501218.reachGoal('not-exit1');close_event=1;};var sliderValue;var sliderTable;var sliderSize;var coldiv;var spec=false;var url;var massid=[];var delcol=[];var save;var close_event_cmp=0;function ButtonChange(id,class_show,textshow){el='article[id="'+id+'"]';el=$(el).children('.cmp-block');$(el).attr("class",class_show);$(el).find('span').html(textshow);}
$(function(){$(".add-cmp > span , #allchar , #diffchar").on('click',function(){if($(this).get(0).tagName=='span'){if(close_event_cmp==0)yaCounter31501218.reachGoal('sravnenie');close_event_cmp=1;}
coldiv=$('#coltable');str='';aa=$('div[class="cmp-block cmp-active"]').get();$.each(aa,function(){element=$(this).parent('article').attr('id');if(element)str=str+element+',';});if(!str)$(coldiv).html('<p style="margin: 35px 24px 35px 20px;">Вы не выбрали элементы для сравнения!</p>');else{sheme=$('#shemecat').text();tmp_url=url='/diffbanks/'+sheme+'/'+str;if(!sheme)alert('Ошибка! Отсутсвует схема, пожалуйста, сообщите это на info@credits-on-line.ru!');if($(this).attr('id')=='diffchar'){url=tmp_url+';/';$(this).attr('class','active');$('#allchar').attr('class','');}
else{url=tmp_url+'/';$('#allchar').attr('class','active');$('#diffchar').attr('class','');}
$.ajax({url:url,success:function(data){$(coldiv).html(data);sliderSize=$('.remodal').find('.table').find('tr:first-child').find('td').length-2;$('.delete-cmp').on('click',function(){el=$(this).parent('td').attr('class');id=$(this).attr('id');el='.'+el;$(el).remove();ButtonChange(id,'cmp-block','Добавить в <a href="#cmp-modal">сравнение</a>');});sliderTable=$('.table').find('table');$(".remodal.comparison").find('.zeos_slider').slider({min:1,max:sliderSize,value:1,slide:function(event,ui){sliderValue="-"+(ui.value-1)*241+"px";sliderTable.animate({marginLeft:sliderValue},300);}});var trCol=$(".remodal.comparison").find('table tr').length;var trHeight=$(".remodal.comparison").find('table tr').eq(trCol-2).height();$(".remodal.comparison").find('.left-column .td:last-child').height(trHeight-41);}});}});$(".cmp-button").on('click',function(){divparent=$(this).parent('div');if($(divparent).attr("class")=='cmp-block cmp-active'){$(divparent).attr("class",'cmp-block');$(divparent).find('.add-cmp > span').html('Добавить в <a href="#cmp-modal">сравнение</a>');el=$(this).parent('.clr2').attr('id');}
else{$(divparent).attr("class",'cmp-block cmp-active');$(divparent).find('.add-cmp > span').html('Удалить из <a href="#cmp-modal">сравнения</a>');el=$(divparent).parent('.clr2').attr('id');}});});
;/* jQuery Form Styler v1.7.8 | (c) Dimox | https://github.com/Dimox/jQueryFormStyler */
!function(e){"function"==typeof define&&define.amd?define(["jquery"],e):"object"==typeof exports?module.exports=e($||require("jquery")):e(jQuery)}(function(e){"use strict";function t(t,s){this.element=t,this.options=e.extend({},l,s);var i=this.options.locale;void 0!==this.options.locales[i]&&e.extend(this.options,this.options.locales[i]),this.init()}function s(t){if(!e(t.target).parents().hasClass("jq-selectbox")&&"OPTION"!=t.target.nodeName&&e("div.jq-selectbox.opened").length){var s=e("div.jq-selectbox.opened"),l=e("div.jq-selectbox__search input",s),o=e("div.jq-selectbox__dropdown",s),a=s.find("select").data("_"+i).options;a.onSelectClosed.call(s),l.length&&l.val("").keyup(),o.hide().find("li.sel").addClass("selected"),s.removeClass("focused opened dropup dropdown")}}var i="styler",l={idSuffix:"-styler",filePlaceholder:"Файл не выбран",fileBrowse:"Обзор...",fileNumber:"Выбрано файлов: %s",selectPlaceholder:"Выберите...",selectSearch:!1,selectSearchLimit:10,selectSearchNotFound:"Совпадений не найдено",selectSearchPlaceholder:"Поиск...",selectVisibleOptions:0,singleSelectzIndex:"100",selectSmartPositioning:!0,locale:"ru",locales:{en:{filePlaceholder:"No file selected",fileBrowse:"Browse...",fileNumber:"Selected files: %s",selectPlaceholder:"Select...",selectSearchNotFound:"No matches found",selectSearchPlaceholder:"Search..."}},onSelectOpened:function(){},onSelectClosed:function(){},onFormStyled:function(){}};t.prototype={init:function(){function t(){void 0!==i.attr("id")&&""!==i.attr("id")&&(this.id=i.attr("id")+l.idSuffix),this.title=i.attr("title"),this.classes=i.attr("class"),this.data=i.data()}var i=e(this.element),l=this.options,o=!(!navigator.userAgent.match(/(iPad|iPhone|iPod)/i)||navigator.userAgent.match(/(Windows\sPhone)/i)),a=!(!navigator.userAgent.match(/Android/i)||navigator.userAgent.match(/(Windows\sPhone)/i));if(i.is(":checkbox")){var d=function(){var s=new t,l=e('<div class="jq-checkbox"><div class="jq-checkbox__div"></div></div>').attr({id:s.id,title:s.title}).addClass(s.classes).data(s.data);i.css({position:"absolute",zIndex:"-1",opacity:0,margin:0,padding:0}).after(l).prependTo(l),l.attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","-o-user-select":"none","user-select":"none",display:"inline-block",position:"relative",overflow:"hidden"}),i.is(":checked")&&l.addClass("checked"),i.is(":disabled")&&l.addClass("disabled"),l.click(function(e){e.preventDefault(),l.is(".disabled")||(i.is(":checked")?(i.prop("checked",!1),l.removeClass("checked")):(i.prop("checked",!0),l.addClass("checked")),i.focus().change())}),i.closest("label").add('label[for="'+i.attr("id")+'"]').on("click.styler",function(t){e(t.target).is("a")||e(t.target).closest(l).length||(l.triggerHandler("click"),t.preventDefault())}),i.on("change.styler",function(){i.is(":checked")?l.addClass("checked"):l.removeClass("checked")}).on("keydown.styler",function(e){32==e.which&&l.click()}).on("focus.styler",function(){l.is(".disabled")||l.addClass("focused")}).on("blur.styler",function(){l.removeClass("focused")})};d(),i.on("refresh",function(){i.closest("label").add('label[for="'+i.attr("id")+'"]').off(".styler"),i.off(".styler").parent().before(i).remove(),d()})}else if(i.is(":radio")){var r=function(){var s=new t,l=e('<div class="jq-radio"><div class="jq-radio__div"></div></div>').attr({id:s.id,title:s.title}).addClass(s.classes).data(s.data);i.css({position:"absolute",zIndex:"-1",opacity:0,margin:0,padding:0}).after(l).prependTo(l),l.attr("unselectable","on").css({"-webkit-user-select":"none","-moz-user-select":"none","-ms-user-select":"none","-o-user-select":"none","user-select":"none",display:"inline-block",position:"relative"}),i.is(":checked")&&l.addClass("checked"),i.is(":disabled")&&l.addClass("disabled"),e.fn.commonParents=function(){var t=this;return t.first().parents().filter(function(){return e(this).find(t).length===t.length})},e.fn.commonParent=function(){return e(this).commonParents().first()},l.click(function(t){if(t.preventDefault(),!l.is(".disabled")){var s=e('input[name="'+i.attr("name")+'"]');s.commonParent().find(s).prop("checked",!1).parent().removeClass("checked"),i.prop("checked",!0).parent().addClass("checked"),i.focus().change()}}),i.closest("label").add('label[for="'+i.attr("id")+'"]').on("click.styler",function(t){e(t.target).is("a")||e(t.target).closest(l).length||(l.triggerHandler("click"),t.preventDefault())}),i.on("change.styler",function(){i.parent().addClass("checked")}).on("focus.styler",function(){l.is(".disabled")||l.addClass("focused")}).on("blur.styler",function(){l.removeClass("focused")})};r(),i.on("refresh",function(){i.closest("label").add('label[for="'+i.attr("id")+'"]').off(".styler"),i.off(".styler").parent().before(i).remove(),r()})}else if(i.is(":file")){i.css({position:"absolute",top:0,right:0,margin:0,padding:0,opacity:0,fontSize:"100px"});var n=function(){var s=new t,o=i.data("placeholder");void 0===o&&(o=l.filePlaceholder);var a=i.data("browse");void 0!==a&&""!==a||(a=l.fileBrowse);var d=e('<div class="jq-file"><div class="jq-file__browse">'+a+'</div><div class="jq-file__name">'+o+"</div></div>").css({display:"inline-block",position:"relative",overflow:"hidden"}).attr({id:s.id,title:s.title}).addClass(s.classes).data(s.data);i.after(d).appendTo(d),i.is(":disabled")&&d.addClass("disabled"),i.on("change.styler",function(){var t=i.val(),s=e("div.jq-file__name",d);if(i.is("[multiple]")){t="";var a=i[0].files.length;if(a>0){var r=i.data("number");void 0===r&&(r=l.fileNumber),r=r.replace("%s",a),t=r}}s.text(t.replace(/.+[\\\/]/,"")),""===t?(s.text(o),d.removeClass("changed")):d.addClass("changed")}).on("focus.styler",function(){d.addClass("focused")}).on("blur.styler",function(){d.removeClass("focused")}).on("click.styler",function(){d.removeClass("focused")})};n(),i.on("refresh",function(){i.off(".styler").parent().before(i).remove(),n()})}else if(i.is('input[type="number"]')){var c=function(){var s=new t,l=e('<div class="jq-number"><div class="jq-number__spin minus"></div><div class="jq-number__spin plus"></div></div>').attr({id:s.id,title:s.title}).addClass(s.classes).data(s.data);i.after(l).prependTo(l).wrap('<div class="jq-number__field"></div>'),i.is(":disabled")&&l.addClass("disabled");var o,a,d,r=null,n=null;void 0!==i.attr("min")&&(o=i.attr("min")),void 0!==i.attr("max")&&(a=i.attr("max")),d=void 0!==i.attr("step")&&e.isNumeric(i.attr("step"))?Number(i.attr("step")):Number(1);var c=function(t){var s,l=i.val();e.isNumeric(l)||(l=0,i.val("0")),t.is(".minus")?s=Number(l)-d:t.is(".plus")&&(s=Number(l)+d);var r=(d.toString().split(".")[1]||[]).length;if(r>0){for(var n="1";n.length<=r;)n+="0";s=Math.round(s*n)/n}e.isNumeric(o)&&e.isNumeric(a)?s>=o&&a>=s&&i.val(s):e.isNumeric(o)&&!e.isNumeric(a)?s>=o&&i.val(s):!e.isNumeric(o)&&e.isNumeric(a)?a>=s&&i.val(s):i.val(s)};l.is(".disabled")||(l.on("mousedown","div.jq-number__spin",function(){var t=e(this);c(t),r=setTimeout(function(){n=setInterval(function(){c(t)},40)},350)}).on("mouseup mouseout","div.jq-number__spin",function(){clearTimeout(r),clearInterval(n)}).on("mouseup","div.jq-number__spin",function(){i.change()}),i.on("focus.styler",function(){l.addClass("focused")}).on("blur.styler",function(){l.removeClass("focused")}))};c(),i.on("refresh",function(){i.off(".styler").closest(".jq-number").before(i).remove(),c()})}else if(i.is("select")){var f=function(){function d(t){t.off("mousewheel DOMMouseScroll").on("mousewheel DOMMouseScroll",function(t){var s=null;"mousewheel"==t.type?s=-1*t.originalEvent.wheelDelta:"DOMMouseScroll"==t.type&&(s=40*t.originalEvent.detail),s&&(t.stopPropagation(),t.preventDefault(),e(this).scrollTop(s+e(this).scrollTop()))})}function r(){for(var e=0;e<f.length;e++){var t=f.eq(e),s="",i="",o="",a="",d="",r="",n="",c="",u="",p="disabled",v="selected sel disabled";t.prop("selected")&&(i="selected sel"),t.is(":disabled")&&(i=p),t.is(":selected:disabled")&&(i=v),void 0!==t.attr("id")&&""!==t.attr("id")&&(a=' id="'+t.attr("id")+l.idSuffix+'"'),void 0!==t.attr("title")&&""!==f.attr("title")&&(d=' title="'+t.attr("title")+'"'),void 0!==t.attr("class")&&(n=" "+t.attr("class"),u=' data-jqfs-class="'+t.attr("class")+'"');var m=t.data();for(var g in m)""!==m[g]&&(r+=" data-"+g+'="'+m[g]+'"');i+n!==""&&(o=' class="'+i+n+'"'),s="<li"+u+r+o+d+a+">"+t.html()+"</li>",t.parent().is("optgroup")&&(void 0!==t.parent().attr("class")&&(c=" "+t.parent().attr("class")),s="<li"+u+r+' class="'+i+n+" option"+c+'"'+d+a+">"+t.html()+"</li>",t.is(":first-child")&&(s='<li class="optgroup'+c+'">'+t.parent().attr("label")+"</li>"+s)),h+=s}}function n(){var a=new t,n="",c=i.data("placeholder"),u=i.data("search"),p=i.data("search-limit"),v=i.data("search-not-found"),m=i.data("search-placeholder"),g=i.data("z-index"),b=i.data("smart-positioning");void 0===c&&(c=l.selectPlaceholder),void 0!==u&&""!==u||(u=l.selectSearch),void 0!==p&&""!==p||(p=l.selectSearchLimit),void 0!==v&&""!==v||(v=l.selectSearchNotFound),void 0===m&&(m=l.selectSearchPlaceholder),void 0!==g&&""!==g||(g=l.singleSelectzIndex),void 0!==b&&""!==b||(b=l.selectSmartPositioning);var y=e('<div class="jq-selectbox jqselect"><div class="jq-selectbox__select" style="position: relative"><div class="jq-selectbox__select-text"></div><div class="jq-selectbox__trigger"><div class="jq-selectbox__trigger-arrow"></div></div></div></div>').css({display:"inline-block",position:"relative",zIndex:g}).attr({id:a.id,title:a.title}).addClass(a.classes).data(a.data);i.css({margin:0,padding:0}).after(y).prependTo(y);var C=e("div.jq-selectbox__select",y),x=e("div.jq-selectbox__select-text",y),w=f.filter(":selected");r(),u&&(n='<div class="jq-selectbox__search"><input type="search" autocomplete="off" placeholder="'+m+'"></div><div class="jq-selectbox__not-found">'+v+"</div>");var q=e('<div class="jq-selectbox__dropdown" style="position: absolute">'+n+'<ul style="position: relative; list-style: none; overflow: auto; overflow-x: hidden">'+h+"</ul></div>");y.append(q);var _=e("ul",q),j=e("li",q),k=e("input",q),S=e("div.jq-selectbox__not-found",q).hide();j.length<p&&k.parent().hide(),""===f.first().text()&&f.first().is(":selected")&&c!==!1?x.text(c).addClass("placeholder"):x.text(w.text());var T=0,N=0;if(j.css({display:"inline-block"}),j.each(function(){var t=e(this);t.innerWidth()>T&&(T=t.innerWidth(),N=t.width())}),j.css({display:""}),x.is(".placeholder")&&x.width()>T)x.width(x.width());else{var P=y.clone().appendTo("body").width("auto"),A=P.outerWidth();P.remove(),A==y.outerWidth()&&x.width(N)}T>y.width()&&q.width(T),""===f.first().text()&&""!==i.data("placeholder")&&j.first().hide(),i.css({position:"absolute",left:0,top:0,width:"100%",height:"100%",opacity:0});var D=y.outerHeight(!0),H=k.parent().outerHeight(!0)||0,I=_.css("max-height"),z=j.filter(".selected");if(z.length<1&&j.first().addClass("selected sel"),void 0===j.data("li-height")){var K=j.outerHeight();c!==!1&&(K=j.eq(1).outerHeight()),j.data("li-height",K)}var M=q.css("top");if("auto"==q.css("left")&&q.css({left:0}),"auto"==q.css("top")&&(q.css({top:D}),M=D),q.hide(),z.length&&(f.first().text()!=w.text()&&y.addClass("changed"),y.data("jqfs-class",z.data("jqfs-class")),y.addClass(z.data("jqfs-class"))),i.is(":disabled"))return y.addClass("disabled"),!1;C.click(function(){if(e("div.jq-selectbox").filter(".opened").length&&l.onSelectClosed.call(e("div.jq-selectbox").filter(".opened")),i.focus(),!o){var t=e(window),s=j.data("li-height"),a=y.offset().top,r=t.height()-D-(a-t.scrollTop()),n=i.data("visible-options");void 0!==n&&""!==n||(n=l.selectVisibleOptions);var c=5*s,h=s*n;n>0&&6>n&&(c=h),0===n&&(h="auto");var u=function(){q.height("auto").css({bottom:"auto",top:M});var e=function(){_.css("max-height",Math.floor((r-20-H)/s)*s)};e(),_.css("max-height",h),"none"!=I&&_.css("max-height",I),r<q.outerHeight()+20&&e()},p=function(){q.height("auto").css({top:"auto",bottom:M});var e=function(){_.css("max-height",Math.floor((a-t.scrollTop()-20-H)/s)*s)};e(),_.css("max-height",h),"none"!=I&&_.css("max-height",I),a-t.scrollTop()-20<q.outerHeight()+20&&e()};b===!0||1===b?r>c+H+20?(u(),y.removeClass("dropup").addClass("dropdown")):(p(),y.removeClass("dropdown").addClass("dropup")):b===!1||0===b?r>c+H+20&&(u(),y.removeClass("dropup").addClass("dropdown")):(q.height("auto").css({bottom:"auto",top:M}),_.css("max-height",h),"none"!=I&&_.css("max-height",I)),y.offset().left+q.outerWidth()>t.width()&&q.css({left:"auto",right:0}),e("div.jqselect").css({zIndex:g-1}).removeClass("opened"),y.css({zIndex:g}),q.is(":hidden")?(e("div.jq-selectbox__dropdown:visible").hide(),q.show(),y.addClass("opened focused"),l.onSelectOpened.call(y)):(q.hide(),y.removeClass("opened dropup dropdown"),e("div.jq-selectbox").filter(".opened").length&&l.onSelectClosed.call(y)),k.length&&(k.val("").keyup(),S.hide(),k.keyup(function(){var t=e(this).val();j.each(function(){e(this).html().match(new RegExp(".*?"+t+".*?","i"))?e(this).show():e(this).hide()}),""===f.first().text()&&""!==i.data("placeholder")&&j.first().hide(),j.filter(":visible").length<1?S.show():S.hide()})),j.filter(".selected").length&&(""===i.val()?_.scrollTop(0):(_.innerHeight()/s%2!==0&&(s/=2),_.scrollTop(_.scrollTop()+j.filter(".selected").position().top-_.innerHeight()/2+s))),d(_)}}),j.hover(function(){e(this).siblings().removeClass("selected")});var O=j.filter(".selected").text();j.filter(":not(.disabled):not(.optgroup)").click(function(){i.focus();var t=e(this),s=t.text();if(!t.is(".selected")){var o=t.index();o-=t.prevAll(".optgroup").length,t.addClass("selected sel").siblings().removeClass("selected sel"),f.prop("selected",!1).eq(o).prop("selected",!0),O=s,x.text(s),y.data("jqfs-class")&&y.removeClass(y.data("jqfs-class")),y.data("jqfs-class",t.data("jqfs-class")),y.addClass(t.data("jqfs-class")),i.change()}q.hide(),y.removeClass("opened dropup dropdown"),l.onSelectClosed.call(y)}),q.mouseout(function(){e("li.sel",q).addClass("selected")}),i.on("change.styler",function(){x.text(f.filter(":selected").text()).removeClass("placeholder"),j.removeClass("selected sel").not(".optgroup").eq(i[0].selectedIndex).addClass("selected sel"),f.first().text()!=j.filter(".selected").text()?y.addClass("changed"):y.removeClass("changed")}).on("focus.styler",function(){y.addClass("focused"),e("div.jqselect").not(".focused").removeClass("opened dropup dropdown").find("div.jq-selectbox__dropdown").hide()}).on("blur.styler",function(){y.removeClass("focused")}).on("keydown.styler keyup.styler",function(e){var t=j.data("li-height");""===i.val()?x.text(c).addClass("placeholder"):x.text(f.filter(":selected").text()),j.removeClass("selected sel").not(".optgroup").eq(i[0].selectedIndex).addClass("selected sel"),38!=e.which&&37!=e.which&&33!=e.which&&36!=e.which||(""===i.val()?_.scrollTop(0):_.scrollTop(_.scrollTop()+j.filter(".selected").position().top)),40!=e.which&&39!=e.which&&34!=e.which&&35!=e.which||_.scrollTop(_.scrollTop()+j.filter(".selected").position().top-_.innerHeight()+t),13==e.which&&(e.preventDefault(),q.hide(),y.removeClass("opened dropup dropdown"),l.onSelectClosed.call(y))}).on("keydown.styler",function(e){32==e.which&&(e.preventDefault(),C.click())}),s.registered||(e(document).on("click",s),s.registered=!0)}function c(){var s=new t,l=e('<div class="jq-select-multiple jqselect"></div>').css({display:"inline-block",position:"relative"}).attr({id:s.id,title:s.title}).addClass(s.classes).data(s.data);i.css({margin:0,padding:0}).after(l),r(),l.append("<ul>"+h+"</ul>");var o=e("ul",l).css({position:"relative","overflow-x":"hidden","-webkit-overflow-scrolling":"touch"}),a=e("li",l).attr("unselectable","on"),n=i.attr("size"),c=o.outerHeight(),u=a.outerHeight();void 0!==n&&n>0?o.css({height:u*n}):o.css({height:4*u}),c>l.height()&&(o.css("overflowY","scroll"),d(o),a.filter(".selected").length&&o.scrollTop(o.scrollTop()+a.filter(".selected").position().top)),i.prependTo(l).css({position:"absolute",left:0,top:0,width:"100%",height:"100%",opacity:0}),i.is(":disabled")?(l.addClass("disabled"),f.each(function(){e(this).is(":selected")&&a.eq(e(this).index()).addClass("selected")})):(a.filter(":not(.disabled):not(.optgroup)").click(function(t){i.focus();var s=e(this);if(t.ctrlKey||t.metaKey||s.addClass("selected"),t.shiftKey||s.addClass("first"),t.ctrlKey||t.metaKey||t.shiftKey||s.siblings().removeClass("selected first"),(t.ctrlKey||t.metaKey)&&(s.is(".selected")?s.removeClass("selected first"):s.addClass("selected first"),s.siblings().removeClass("first")),t.shiftKey){var l=!1,o=!1;s.siblings().removeClass("selected").siblings(".first").addClass("selected"),s.prevAll().each(function(){e(this).is(".first")&&(l=!0)}),s.nextAll().each(function(){e(this).is(".first")&&(o=!0)}),l&&s.prevAll().each(function(){return e(this).is(".selected")?!1:void e(this).not(".disabled, .optgroup").addClass("selected")}),o&&s.nextAll().each(function(){return e(this).is(".selected")?!1:void e(this).not(".disabled, .optgroup").addClass("selected")}),1==a.filter(".selected").length&&s.addClass("first")}f.prop("selected",!1),a.filter(".selected").each(function(){var t=e(this),s=t.index();t.is(".option")&&(s-=t.prevAll(".optgroup").length),f.eq(s).prop("selected",!0)}),i.change()}),f.each(function(t){e(this).data("optionIndex",t)}),i.on("change.styler",function(){a.removeClass("selected");var t=[];f.filter(":selected").each(function(){t.push(e(this).data("optionIndex"))}),a.not(".optgroup").filter(function(s){return e.inArray(s,t)>-1}).addClass("selected")}).on("focus.styler",function(){l.addClass("focused")}).on("blur.styler",function(){l.removeClass("focused")}),c>l.height()&&i.on("keydown.styler",function(e){38!=e.which&&37!=e.which&&33!=e.which||o.scrollTop(o.scrollTop()+a.filter(".selected").position().top-u),40!=e.which&&39!=e.which&&34!=e.which||o.scrollTop(o.scrollTop()+a.filter(".selected:last").position().top-o.innerHeight()+2*u)}))}var f=e("option",i),h="";if(i.is("[multiple]")){if(a||o)return;c()}else n()};f(),i.on("refresh",function(){i.off(".styler").parent().before(i).remove(),f()})}else i.is(":reset")&&i.on("click",function(){setTimeout(function(){i.closest("form").find("input, select").trigger("refresh")},1)})},destroy:function(){var t=e(this.element);t.is(":checkbox")||t.is(":radio")?(t.removeData("_"+i).off(".styler refresh").removeAttr("style").parent().before(t).remove(),t.closest("label").add('label[for="'+t.attr("id")+'"]').off(".styler")):t.is('input[type="number"]')?t.removeData("_"+i).off(".styler refresh").closest(".jq-number").before(t).remove():(t.is(":file")||t.is("select"))&&t.removeData("_"+i).off(".styler refresh").removeAttr("style").parent().before(t).remove()}},e.fn[i]=function(s){var l=arguments;if(void 0===s||"object"==typeof s)return this.each(function(){e.data(this,"_"+i)||e.data(this,"_"+i,new t(this,s))}).promise().done(function(){var t=e(this[0]).data("_"+i);t&&t.options.onFormStyled.call()}),this;if("string"==typeof s&&"_"!==s[0]&&"init"!==s){var o;return this.each(function(){var a=e.data(this,"_"+i);a instanceof t&&"function"==typeof a[s]&&(o=a[s].apply(a,Array.prototype.slice.call(l,1)))}),void 0!==o?o:this}},s.registered=!1});
;!function(a,b){"function"==typeof define&&define.amd?define(["jquery"],function(c){return b(a,c)}):"object"==typeof exports?b(a,require("jquery")):b(a,a.jQuery||a.Zepto)}(this,function(a,b){"use strict";function c(a){if(w&&"none"===a.css("animation-name")&&"none"===a.css("-webkit-animation-name")&&"none"===a.css("-moz-animation-name")&&"none"===a.css("-o-animation-name")&&"none"===a.css("-ms-animation-name"))return 0;var b,c,d,e,f=a.css("animation-duration")||a.css("-webkit-animation-duration")||a.css("-moz-animation-duration")||a.css("-o-animation-duration")||a.css("-ms-animation-duration")||"0s",g=a.css("animation-delay")||a.css("-webkit-animation-delay")||a.css("-moz-animation-delay")||a.css("-o-animation-delay")||a.css("-ms-animation-delay")||"0s",h=a.css("animation-iteration-count")||a.css("-webkit-animation-iteration-count")||a.css("-moz-animation-iteration-count")||a.css("-o-animation-iteration-count")||a.css("-ms-animation-iteration-count")||"1";for(f=f.split(", "),g=g.split(", "),h=h.split(", "),e=0,c=f.length,b=Number.NEGATIVE_INFINITY;c>e;e++)d=parseFloat(f[e])*parseInt(h[e],10)+parseFloat(g[e]),d>b&&(b=d);return b}function d(){if(b(document.body).height()<=b(window).height())return 0;var a,c,d=document.createElement("div"),e=document.createElement("div");return d.style.visibility="hidden",d.style.width="100px",document.body.appendChild(d),a=d.offsetWidth,d.style.overflow="scroll",e.style.width="100%",d.appendChild(e),c=e.offsetWidth,d.parentNode.removeChild(d),a-c}function e(){if(!x){var a,c,e=b("html"),f=k("is-locked");e.hasClass(f)||(c=b(document.body),a=parseInt(c.css("padding-right"),10)+d(),c.css("padding-right",a+"px"),e.addClass(f))}}function f(){if(!x){var a,c,e=b("html"),f=k("is-locked");e.hasClass(f)&&(c=b(document.body),a=parseInt(c.css("padding-right"),10)-d(),c.css("padding-right",a+"px"),e.removeClass(f))}}function g(a,b,c,d){var e=k("is",b),f=[k("is",u.CLOSING),k("is",u.OPENING),k("is",u.CLOSED),k("is",u.OPENED)].join(" ");a.$bg.removeClass(f).addClass(e),a.$overlay.removeClass(f).addClass(e),a.$wrapper.removeClass(f).addClass(e),a.$modal.removeClass(f).addClass(e),a.state=b,!c&&a.$modal.trigger({type:b,reason:d},[{reason:d}])}function h(a,d,e){var f=0,g=function(a){a.target===this&&f++},h=function(a){a.target===this&&0===--f&&(b.each(["$bg","$overlay","$wrapper","$modal"],function(a,b){e[b].off(r+" "+s)}),d())};b.each(["$bg","$overlay","$wrapper","$modal"],function(a,b){e[b].on(r,g).on(s,h)}),a(),0===c(e.$bg)&&0===c(e.$overlay)&&0===c(e.$wrapper)&&0===c(e.$modal)&&(b.each(["$bg","$overlay","$wrapper","$modal"],function(a,b){e[b].off(r+" "+s)}),d())}function i(a){a.state!==u.CLOSED&&(b.each(["$bg","$overlay","$wrapper","$modal"],function(b,c){a[c].off(r+" "+s)}),a.$bg.removeClass(a.settings.modifier),a.$overlay.removeClass(a.settings.modifier).hide(),a.$wrapper.hide(),f(),g(a,u.CLOSED,!0))}function j(a){var b,c,d,e,f={};for(a=a.replace(/\s*:\s*/g,":").replace(/\s*,\s*/g,","),b=a.split(","),e=0,c=b.length;c>e;e++)b[e]=b[e].split(":"),d=b[e][1],("string"==typeof d||d instanceof String)&&(d="true"===d||("false"===d?!1:d)),("string"==typeof d||d instanceof String)&&(d=isNaN(d)?d:+d),f[b[e][0]]=d;return f}function k(){for(var a=q,b=0;b<arguments.length;++b)a+="-"+arguments[b];return a}function l(){var a,c,d=location.hash.replace("#","");if(d){try{c=b("[data-"+p+'-id="'+d+'"]')}catch(e){}c&&c.length&&(a=b[p].lookup[c.data(p)],a&&a.settings.hashTracking&&a.open())}else n&&n.state===u.OPENED&&n.settings.hashTracking&&n.close()}function m(a,c){var d=b(document.body),e=this;e.settings=b.extend({},t,c),e.index=b[p].lookup.push(e)-1,e.state=u.CLOSED,e.$overlay=b("."+k("overlay")),e.$overlay.length||(e.$overlay=b("<div>").addClass(k("overlay")+" "+k("is",u.CLOSED)).hide(),d.append(e.$overlay)),e.$bg=b("."+k("bg")).addClass(k("is",u.CLOSED)),e.$modal=a.addClass(q+" "+k("is-initialized")+" "+e.settings.modifier+" "+k("is",u.CLOSED)).attr("tabindex","-1"),e.$wrapper=b("<div>").addClass(k("wrapper")+" "+e.settings.modifier+" "+k("is",u.CLOSED)).hide().append(e.$modal),d.append(e.$wrapper),e.$wrapper.on("click."+q,"[data-"+p+'-action="close"]',function(a){a.preventDefault(),e.close()}),e.$wrapper.on("click."+q,"[data-"+p+'-action="cancel"]',function(a){a.preventDefault(),e.$modal.trigger(v.CANCELLATION),e.settings.closeOnCancel&&e.close(v.CANCELLATION)}),e.$wrapper.on("click."+q,"[data-"+p+'-action="confirm"]',function(a){a.preventDefault(),e.$modal.trigger(v.CONFIRMATION),e.settings.closeOnConfirm&&e.close(v.CONFIRMATION)}),e.$wrapper.on("click."+q,function(a){var c=b(a.target);c.hasClass(k("wrapper"))&&e.settings.closeOnOutsideClick&&e.close()})}var n,o,p="remodal",q=a.REMODAL_GLOBALS&&a.REMODAL_GLOBALS.NAMESPACE||p,r=b.map(["animationstart","webkitAnimationStart","MSAnimationStart","oAnimationStart"],function(a){return a+"."+q}).join(" "),s=b.map(["animationend","webkitAnimationEnd","MSAnimationEnd","oAnimationEnd"],function(a){return a+"."+q}).join(" "),t=b.extend({hashTracking:!0,closeOnConfirm:!0,closeOnCancel:!0,closeOnEscape:!0,closeOnOutsideClick:!0,modifier:""},a.REMODAL_GLOBALS&&a.REMODAL_GLOBALS.DEFAULTS),u={CLOSING:"closing",CLOSED:"closed",OPENING:"opening",OPENED:"opened"},v={CONFIRMATION:"confirmation",CANCELLATION:"cancellation"},w=function(){var a=document.createElement("div").style;return void 0!==a.animationName||void 0!==a.WebkitAnimationName||void 0!==a.MozAnimationName||void 0!==a.msAnimationName||void 0!==a.OAnimationName}(),x=/iPad|iPhone|iPod/.test(navigator.platform);m.prototype.open=function(){var a,c=this;c.state!==u.OPENING&&c.state!==u.CLOSING&&(a=c.$modal.attr("data-"+p+"-id"),a&&c.settings.hashTracking&&(o=b(window).scrollTop(),location.hash=a),n&&n!==c&&i(n),n=c,e(),c.$bg.addClass(c.settings.modifier),c.$overlay.addClass(c.settings.modifier).show(),c.$wrapper.show().scrollTop(0),c.$modal.focus(),h(function(){g(c,u.OPENING)},function(){g(c,u.OPENED)},c))},m.prototype.close=function(a){var c=this;c.state!==u.OPENING&&c.state!==u.CLOSING&&(c.settings.hashTracking&&c.$modal.attr("data-"+p+"-id")===location.hash.substr(1)&&(location.hash="",b(window).scrollTop(o)),h(function(){g(c,u.CLOSING,!1,a)},function(){c.$bg.removeClass(c.settings.modifier),c.$overlay.removeClass(c.settings.modifier).hide(),c.$wrapper.hide(),f(),g(c,u.CLOSED,!1,a)},c))},m.prototype.getState=function(){return this.state},m.prototype.destroy=function(){var a,c=b[p].lookup;i(this),this.$wrapper.remove(),delete c[this.index],a=b.grep(c,function(a){return!!a}).length,0===a&&(this.$overlay.remove(),this.$bg.removeClass(k("is",u.CLOSING)+" "+k("is",u.OPENING)+" "+k("is",u.CLOSED)+" "+k("is",u.OPENED)))},b[p]={lookup:[]},b.fn[p]=function(a){var c,d;return this.each(function(e,f){d=b(f),null==d.data(p)?(c=new m(d,a),d.data(p,c.index),c.settings.hashTracking&&d.attr("data-"+p+"-id")===location.hash.substr(1)&&c.open()):c=b[p].lookup[d.data(p)]}),c},b(document).ready(function(){b(document).on("click","[data-"+p+"-target]",function(a){a.preventDefault();var c=a.currentTarget,d=c.getAttribute("data-"+p+"-target"),e=b("[data-"+p+'-id="'+d+'"]');b[p].lookup[e.data(p)].open()}),b(document).find("."+q).each(function(a,c){var d=b(c),e=d.data(p+"-options");e?("string"==typeof e||e instanceof String)&&(e=j(e)):e={},d[p](e)}),b(document).on("keydown."+q,function(a){n&&n.settings.closeOnEscape&&n.state===u.OPENED&&27===a.keyCode&&n.close()}),b(window).on("hashchange."+q,l)})});function getbonus(){var tmp=$('#get_bonus_email').val();if(!validateEmail(tmp)){$('#get_bonus_email').addClass('error');return false;}else{$.post('/getbonus/','email='+tmp,function(data){var rmd=$('[data-remodal-id=modal]').remodal({});rmd.close();});}}
function validateEmail(emailaddress){var emailReg=/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;if(!emailReg.test(emailaddress))return false;return true;}
function replaced(inp){inp.value=inp.value.replace(/[^\d,.]*/g,'').replace(/([,.])[,.]+/g,'$1').replace(/^[^\d]*(\d+([.,]\d{0,5})?).*$/g,'$1').replace(/(\d)(?=(\d\d\d)+([^\d]|$))/g,'$1 ').replace(',','.');}
function counter(){var el=document.getElementById("digits");$.post('/reqcounter.php',{'action':'get'},function(data){var str=data.trim().split("").join("</span><span>");str="<span>"+str+"</span>";el.innerHTML=str;});}
function doStep1(){$('#other').show();$('#step_1').show();$('#step_2').hide();$("#step_2 div.error_type_1, #step_2 div.error_type_2").remove();}
function doStep2(){console.log('test');if(!checkRequired())return false;clearPlaceholders();$('#submit_step1').attr('disabled','disabled');$('#submit_step1').after('<span class="inferror"><span></span>Подождите, пожалуйста</span>');$.post('/savedata/',$('#online_request').serialize(),function(data){$('#input_22').val($('#nameofbank').val());$('#city_code_fact').val($('#city_code').val());$('#region_fact_id').val($('#region_id').val());if(!$('#data_id').val()){$('#input_17').val($('#nameofbank').val());}
$('#data_id').val(data);if($('#select_14').val()==39||$('#select_14').val()==40||$('#select_14').val()==41){$('#workplace input, #select_7, #select_8').removeClass('required_2');$('#workplace').hide();$('#addresshead').append('<span class="right">Шаг 2 из 2</span>');}else{$('#workplace input, #select_7, #select_8').addClass('required_2');$('#workplace').show();$('#addresshead > span.right').remove();}
$('#other').hide();$('#step_1').hide();$('#step_2').show();$("#step_2 input[type=\"text\"].error_info").each(function(){var el=$("<div class=\"error_type_1\">Поле не заполнено</div><div class=\"error_type_2\">Ошибка</div>");$(this).after(el);el.css({"position":"absolute"}).position({of:$(this),my:"center top-50%",at:"center bottom",collision:"none none"});});});}
function doRequest(step){if(!checkRequired(true))return false;clearPlaceholders();$('#other').hide();$('#step_1').hide();$('#step_2').hide();$('#step_3').hide();$('#'+step).show();$('#dorequest').attr('disabled','disabled');$('#dorequest').before('<span class="inferror"><span></span>Подождите, пожалуйста</span>');$.post('/dorequest/',$('#online_request').serialize(),function(data){$('#other').hide();$('#step_1').hide();$('#step_2').hide();$('#step_3').hide();$('#'+step).show();console.log(data);});}
function reCheckRequired(field){var check=$(field).val();var placeholder=$(field).attr("data-placeholder");if(check&&check!==null&&(!placeholder||placeholder&&check!==placeholder)){if($(field).hasClass('error_1')){$(field).removeClass('error_1');}else if($(field).hasClass('error_2')){$(field).removeClass('error_2');}}}
function checkRequired(second){var foundErrors=false;tmp='';if(second)var tmp=', input[type=text].required_2';$('input[type=text].required'+tmp).each(function(){var check=$(this).val();var placeholder=$(this).attr("data-placeholder");if(placeholder!==undefined){if(!check||(placeholder!=='10 000'&&placeholder!=='5 000'&&check===placeholder)){$(this).addClass('error_1').on('change',function(){reCheckRequired($(this));});foundErrors=true;}else{$(this).removeClass('error_1');}}});$('select.required'+(second?', select.required_2':'')).each(function(){var check=$(this).val();if(!check||check===null){$(this).addClass('error_1').on('change',function(){reCheckRequired($(this));});foundErrors=true;}else{$(this).removeClass('error_1');}});$('input[type=checkbox].required'+(second?', input[type=checkbox].required_2':'')).each(function(){var check=$(this).prop('checked');if(!check){$(this).addClass('error_1').on('change',function(){reCheckRequired($(this));});foundErrors=true;}else{$(this).removeClass('error_1');}});var check=$('#input_1').val();if(check<1000||check>1000000){$('#input_1').addClass('error_2').on('change',function(){reCheckRequired($(this));});foundErrors=true;}else{$('#input_1').removeClass('error_2');}
var re=/^(?:[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*|"(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21\x23-\x5b\x5d-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])*")@(?:(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?|\[(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?|[a-z0-9-]*[a-z0-9]:(?:[\x01-\x08\x0b\x0c\x0e-\x1f\x21-\x5a\x53-\x7f]|\\[\x01-\x09\x0b\x0c\x0e-\x7f])+)\])$/i;if(re.test($('#input_7').val())){$('#input_7').removeClass('error_2');}else{if(!$('#input_7').hasClass('error_1')){$('#input_7').addClass('error_2').on('change',function(){reCheckRequired($(this));});foundErrors=true;}}
if((!$('#region_fact_id').val()||$('#region_fact_id').val()===''||!$('#city_code_fact').val()||$('#city_code_fact').val()==='')&&!$('#nameofbank').hasClass('error_1')){$('#nameofbank').val('').addClass('error_2');reCheckRequired('#nameofbank');foundErrors=true;}else{}
if((!$('#region_id').val()||$('#region_id').val()===''||!$('#city_code').val()||$('#city_code').val()==='')&&!$('#input_17').hasClass('error_1')&&second){$('#input_17').val('').addClass('error_2');reCheckRequired('#input_17');foundErrors=true;}
return!foundErrors;}
function clearPlaceholders(){$('input[data-placeholder]').each(function(){var check=$(this).val();var placeholder=$(this).attr("data-placeholder");if(placeholder!=='10 000'&&placeholder!=='5 000'&&check===placeholder){$(this).val('');}});}
function saintInput(el,type){if(type=='num'){$(el).val($(el).val().replace(/\D/g,""));}else if(type=='numdefis'){$(el).val($(el).val().replace(/[^0-9\-]/g,""));}else if(type=='numdot'){$(el).val($(el).val().replace(/[^0-9\.]/g,""));}else if(type=='cyr'){$(el).val($(el).val().replace(/[^А-Яа-яЁё\-]/g,""));}else if(type=='cyrnumdefis'){$(el).val($(el).val().replace(/[^А-Яа-яЁё0-9\-]/g,""));}else if(type=='cyrnumdefspace'){$(el).val($(el).val().replace(/[^А-Яа-яЁё0-9\- ]/g,""));}}
function getSelected(object){if(object){if(window.getSelection){return window.getSelection();}else if(document.selection){return document.selection;}
return null;}else{if(window.getSelection){return window.getSelection().toString();}else if(document.selection){return document.selection.createRange().text;}
return"";}}
function CopyText(){if(getSelected().length<10)return;var div=document.createElement("div");div.style.position="absolute";div.style.left="-99999px";document.body.appendChild(div);div.innerHTML="<pre>"+getSelected()+"<br><br>Подробнее: <a href=\""+document.location.href+"\">"+document.location.href+"</a></pre>";getSelected(true).selectAllChildren(div);window.setTimeout(function(){document.body.removeChild(div);},200);}
function Tooltip(){$("[data-tooltip]").on({focus:function(){var el=$("<div class=\"tooltip\">"+$(this).data("tooltip")+"<i></i></div>");$(this).before(el);el.css({"position":"absolute"}).position({of:$(this),my:"left bottom-10",at:"left top",collision:"none none"});},blur:function(){$(".tooltip").remove();}});}
function SelectEach(){$("select").each(function(){$(this).prop('selectedIndex',0);$(this).selectmenu({position:{my:"left top",at:"left bottom",collision:"none fit"},}).selectmenu("widget").addClass("zeos_select").end().selectmenu("menuWidget").addClass("zeos_select");});}
function SelectEEE(el){$(el).each(function(){$(this).prop('selectedIndex',0);$(this).selectmenu({position:{my:"left top",at:"left bottom",collision:"none fit"},}).selectmenu("widget").addClass("zeos_select").end().selectmenu("menuWidget").addClass("zeos_select");});}
function SoH(el,find_f,find_n,find_t,txt_1,txt_2,img_1,img_2,el_2){$(el).find(find_f).find(find_n).click(function(){if(img_1){$(this).parent().parent().find(find_t).toggle('display');}else{$(el_2).toggle('display');}
var text=$(this).text();if(text==txt_1){$(this).text(txt_2);if(img_1){$(this).parent().css('background-image','url('+dle_root+'templates/'+dle_skin+'/img/'+img_1+')');}}else{$(this).text(txt_1);if(img_2){$(this).parent().css('background-image','url('+dle_root+'templates/'+dle_skin+'/img/'+img_2+')');}}});}
function placeholder(){var input_placeholder=$("input[placeholder]").not('.masked'),value;input_placeholder.each(function(){value=$(this).attr("placeholder");$(this).removeAttr("placeholder");$(this).data("placeholder",value);$(this).attr("data-placeholder",value);if(!$(this).val()){$(this).val(value);}});input_placeholder.on({blur:function(){if($(this).val()=="")$(this).val($(this).data("placeholder"));},focus:function(){if($(this).val()==$(this).data("placeholder"))$(this).val("");}});}
function filter(val,page){ShowLoading('');$.post(dle_root+"engine/ajax/filter.php",{page:page,filter:val,skin:dle_skin},function(data){HideLoading('');$("#filter-content_in").remove();$("#filter-content").hide();$("#filter-content").before(data);$("button, input:button, input:submit, input:reset, a.btn").button();if(!data||data===""){$("#filter-content").show();}
yaCounter31501218.reachGoal('filter-mfo');});}
function reCheckReq(field){var check=$(field).val();var min=$(field).attr("data-min");if(check&&check!==null&&(!min||min&&check!==min)){if($(field).hasClass('error_1')){$(field).removeClass('error_1');}else if($(field).hasClass('error_2')){$(field).removeClass('error_2');}}}
function checkReq(){var foundErrors=false;$('#b-filter input[type=text].requir').each(function(){var check=new Number($(this).val());var min=new Number($(this).attr("data-min"));var max=new Number($(this).attr("data-max"));if($(this).val()==='0'){$(this).addClass('error_1').on('change',function(){reCheckReq($(this));});foundErrors=true;}else{if((check>0)&&(check<min)||(check>max)){$(this).addClass('error_1').on('change',function(){reCheckReq($(this));});foundErrors=true;}else{$(this).removeClass('error_1');}}});return!foundErrors;}
function get_coupon(mfo_url,post_id,el){ShowLoading();$.get(dle_root+'engine/ajax/get_coupon.php',{post_id:post_id},function(data){HideLoading();if(!data.error){$("#coupon_count-"+post_id).html(data.success.view);$(el).parent().html('<span class="url_click nodecor" data-url="'+data.success.url+'">Ваш код: '+data.success.coupon+'</span>');}},"json");window.open(mfo_url,'_blank');return false;};(function($){$.fn.quickPager=function(options){var defaults={pageSize:10,currentPage:1,holder:""};var options=$.extend(defaults,options);var selector=$(this);var totalRecords=$(this).children().length;var pageCounter=1;selector.children().each(function(i){if(i<pageCounter*options.pageSize&&i>=(pageCounter-1)*options.pageSize){$(this).addClass("page"+pageCounter);}else{$(this).addClass("page"+(pageCounter+1));pageCounter++;}});selector.children().hide();$(".page"+options.currentPage).show();if(pageCounter>1){var pageNav="<ul class='pagination_reviews'><li class='pages'>";for(i=1;i<=pageCounter;i++){if(i==options.currentPage){pageNav+="<a rel='"+i+"' class='active' href='javascript:;'>"+i+"</a>";}else{pageNav+="<a rel='"+i+"' href='javascript:;'>"+i+"</a>";}}
pageNav+="</li></ul>";if(options.holder==""){selector.after(pageNav);}else{$(options.holder).append(pageNav);}
$(".pagination_reviews a").on("click",function(){var clickedLink=$(this).attr("rel");options.currentPage=clickedLink;$("li .active").removeClass("active");$(this).addClass("active");selector.children().hide();selector.find(".page"+clickedLink).show();return false;});}}})(jQuery);WebFontConfig={google:{families:['Open+Sans:300,400,600,700,800:cyrillic-ext']}};(function(){var wf=document.createElement('script');wf.src=('https:'==document.location.protocol?'https':'http')+'://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';wf.type='text/javascript';wf.async='true';var s=document.getElementsByTagName('script')[0];s.parentNode.insertBefore(wf,s);})();$(window).load(function(){$("html").addClass("load");$("#step_1 input[type=\"text\"].error_info").each(function(){var el=$("<div class=\"error_type_1\">Поле не заполнено</div><div class=\"error_type_2\">Ошибка</div>");$(this).after(el);el.css({"position":"absolute"}).position({of:$(this),my:"center top-50%",at:"center bottom",collision:"none none"});});if(innerWidth<=480){var iMax=$('.static_offers__kredits').find('p.info a').length;for(i=0;i<=iMax;i++){var titleBlock=$('.static_offers__kredits').find('p.info a').eq(i);if(titleBlock.height()>30){titleBlock.closest('article.clr2').css('padding-top','60px');}}}else{if(innerWidth>480&&innerWidth<=980){var iMax=$('.static_offers__kredits').find('p.info a').length;for(i=0;i<=iMax;i++){var titleBlock=$('.static_offers__kredits').find('p.info a').eq(i);if(titleBlock.height()<30){titleBlock.closest('article.clr2').find('.left').find('p.info').css('padding-top','30px');}else if(titleBlock.height()>60){titleBlock.closest('article.clr2').find('.left').find('p.info').css('padding-top','70px');}}}}});$(document).ready(function(){$("img").parent('.highslide').css("border","none");$(window).scroll(function(){if($(this).scrollTop()>800)$("#top i").fadeIn();else $("#top i").fadeOut();});SelectEach();$(".subject_select").selectmenu({change:function(event,data){$('.subject_select :nth-child('+(this.selectedIndex+1)+')').attr("selected","selected");}}).change(function(){$('.subject_select :nth-child('+(this.selectedIndex+1)+')').attr("selected","selected");$(this).selectmenu("refresh");});$("ul.block_reviews").quickPager();counter();setInterval(function(){counter();},120000);$("#top i").click(function(){$("body, html").animate({scrollTop:0},1000);});$("button, input:button, input:submit, input:reset, a.btn").button();$(".radio_b, input:checkbox").button({icons:{primary:"ui-icon-gear"}});$('#dle-vote input[type="radio"]').styler();$("body").on("copy",CopyText);$('.root_menu .width').prepend('<div id="adapt_menu" class="adapt_menu"><span></span> Меню</div>');$('.adapt_menu').click(function(){$(this).next("ul").slideToggle();});SoH('.region-bank-page','.office__adress','a','~.office__map',"Скрыть карту","Показать карту",'arrow_5.png','arrow_4.png');SoH('.region-bank-page','.atm__adress','a','~.atm__map',"Скрыть карту","Показать карту",'arrow_5.png','arrow_4.png');SoH('.offices-bank-page','.office__adress','a','~.office__map',"Скрыть карту","Показать карту",'arrow_5.png','arrow_4.png');SoH('.atms-bank-page','.atm__adress','a','~.atm__map',"Скрыть карту","Показать карту",'arrow_5.png','arrow_4.png');SoH('.offices-bank-page','.top-desc','a.close-map','~.atm__map',"Скрыть карту","Показать карту",'','','.offices-bank-page > .map');SoH('.atms-bank-page','.top-desc','a.close-map','~.atm__map',"Скрыть карту","Показать карту",'','','.atms-bank-page > .map');$('.hr_3').find('a.close-search').click(function(){$('.hr_3:first').toggle('display');$('.category-search').toggle('display');var text=$(this).text();if(text=="Показать фильтр"){$(this).text("Скрыть фильтр");$(this).css('background-image','url('+dle_root+'templates/'+dle_skin+'/img/arrow-top.png)');}else{$(this).text("Показать фильтр");$(this).css('background-image','url('+dle_root+'templates/'+dle_skin+'/img/arrow-bottom.png)');}});if(document.getElementById("bankscatalog")){var select_region=$("#select_region"),select_city=$("#select_city");SelectEach();select_region.selectmenu("option","width",218);select_city.selectmenu("option","width",378);Tooltip();$('#nameofbank').autocomplete({source:"/bankinfo_search.php?request=name",minLength:1,select:function(event,ui){if(ui.item){$('#bank_id').val(ui.item.id);}},position:{my:"left top-1",at:"left bottom",collision:"none fit"}}).autocomplete("widget").addClass("zeos_autocomplete");}
if(document.getElementById("online_request")){$("#confidentiality").on("click",function(event){event.preventDefault();var confidentiality_tooltip=$("<div id=\"confidentiality_tooltip\">Принимаю <a href=\"/polzovatelskoe-soglashenie.html\" target='_blank'>Пользовательское соглашение сайта</a> и даю согласие на обработку, хранение и передачу персональных данных, подбор кредита (займа) и получение предложений доступными средствами телефонной связи, SMS и E-mail. Данное соглашение действует бессрочно и может быть отозвано путем отправки запроса на <a href=\"mailto:otkaz@credits-on-line.ru?subject=Отказ от сотрудничества\">otkaz@credits-on-line.ru</a>. <i></i></div>");$("body").append(confidentiality_tooltip);confidentiality_tooltip.position({of:$(this),my:"left-50 bottom-30",at:"left top",collision:"fit fit"});});$(this).on("click",function(event){if(document.getElementById("confidentiality_tooltip")&&event.target.id!="confidentiality_tooltip"&&event.target.id!="confidentiality"){console.log(event.target);$("#confidentiality_tooltip").fadeOut(function(){$(this).remove();});}});var input_1=$("#input_1"),slider_1=$("#slider_1"),slider_2=$("#slider_2"),select_1=$("#select_1"),select_2=$("#select_2"),select_3=$("#select_3"),select_4=$("#select_4"),select_5=$("#select_5"),select_7=$("#select_7"),select_8=$("#select_8"),select_9=$("#select_9"),select_10=$("#select_10"),select_11=$("#select_11"),select_12=$("#select_12"),select_13=$("#select_13"),select_14=$("#select_14"),select_66=$("#select_66"),select_67=$("#select_67"),select_68=$("#select_68"),checkbox_2=$("#checkbox_2");SelectEach();select_1.selectmenu("option","width",128);select_2.selectmenu("option","width",128);select_3.selectmenu("option","width",68);select_4.selectmenu("option","width",106);select_5.selectmenu("option","width",88);select_7.selectmenu("option","width",70);select_8.selectmenu("option","width",108);select_9.selectmenu("option","width",70);select_10.selectmenu("option","width",108);select_11.selectmenu("option","width",68);select_12.selectmenu("option","width",124);select_13.selectmenu("option","width",88);select_14.selectmenu("option","width",230);select_66.selectmenu("option","width",190);select_67.selectmenu("option","width",190);select_68.selectmenu("option","width",192);Tooltip();$(".slider").slider({animate:500,});slider_1.slider({min:1000,max:($(slider_1).hasClass('micro')?30000:1000000),step:500,value:input_1.val(),slide:function(event,ui){input_replacer(input_1);input_1.val(ui.value);input_replacer(input_1,true);$('#online_request').removeClass('static').removeClass('notstatic');if(ui.value>30001){$('#online_request').addClass('notstatic');}else{$('#online_request').addClass('static');}}});var timer;input_1.keyup(function(e){clearTimeout(timer);if(e.which<33||e.which>40){input_replacer($(this));if($(slider_1).hasClass('micro')){if($(this).val()>30000)$(this).val(30000);}else{if($(this).val()>1000000)$(this).val(1000000);}
if($(this).val()<1000){timer=setTimeout(function(){input_1.val(1000);slider_1.slider("value",input_1.val());input_replacer(input_1,true);},3000);}
slider_1.slider("value",$(this).val());input_replacer($(this),true);}});slider_2.slider({min:1,max:($(slider_1).hasClass('micro')?15:19),value:select_1[0].selectedIndex+1,slide:function(event,ui){select_1[0].selectedIndex=ui.value-1;select_1.selectmenu("refresh");}});select_1.selectmenu({change:function(event,data){slider_2.slider("value",this.selectedIndex+1);}}).change(function(){slider_2.slider("value",this.selectedIndex+1);$(this).selectmenu("refresh");});function input_replacer(el,m){el.val(el.val().replace(/\D/g,""));if(m!==undefined){el.val(el.val().replace(/(\d)(?=(\d{3})+([^\d]|$))/g,"$1 "));}}
var ir_selectors=$("#input_1");input_replacer(ir_selectors,true);$("#input_6, #input_11").mask("(999) 999-99-99");$("#input_12").mask("9999");$("#input_13").mask("999999");$("#input_14").mask("999-999");placeholder();if(checkbox_2.prop("checked")){$(".actually").css("display","none");}
checkbox_2.on("click",function(){$(".actually").fadeToggle();});$('#nameofbank').autocomplete({source:dle_root+"engine/getcities.php",minLength:1,select:function(event,ui){if(ui.item){$('#region_fact_id').val(ui.item.region);$('#city_code_fact').val(ui.item.id);$('#region_id').val(ui.item.region);$('#city_code').val(ui.item.id);$('#nameofbank').removeClass('error_2');}},position:{my:"left top-1",at:"left bottom",collision:"none fit"}}).autocomplete("widget").addClass("zeos_autocomplete");$('#input_5').autocomplete({source:dle_root+"engine/getcities.php",minLength:1,select:function(event,ui){if(ui.item){$('#region_fact_id').val(ui.item.region);$('#city_code_fact').val(ui.item.id);$('#region_id').val(ui.item.region);$('#city_code').val(ui.item.id);$('#nameofbank').removeClass('error_2');}},position:{my:"left top-1",at:"left bottom",collision:"none fit"}}).autocomplete("widget").addClass("zeos_autocomplete");$('#input_17').autocomplete({source:dle_root+"engine/getcities.php",minLength:1,select:function(event,ui){if(ui.item){$('#region_id').val(ui.item.region);$('#city_code').val(ui.item.id);$('#input_17').removeClass('error_2');}},position:{my:"left top-1",at:"left bottom",collision:"none fit"}}).autocomplete("widget").addClass("zeos_autocomplete");$('#input_22').autocomplete({source:dle_root+"engine/getcities.php",minLength:1,position:{my:"left top-1",at:"left bottom",collision:"none fit"}}).autocomplete("widget").addClass("zeos_autocomplete");$('#input_10, #input_21, #input_26, #input_19, #input_24').on('keyup',function(){saintInput($(this),'num');});$('#input_18, #input_23').on('keyup',function(){saintInput($(this),'cyrnumdefspace');});$('#input_21, #input_26').on('keyup',function(){saintInput($(this),'cyrnumdefis');});$('#submit_step1').on('click',function(){doStep2();return false;});$('#return_step1').on('click',function(){doStep1();$('#submit_step1').removeAttr('disabled');$('#dorequest').removeAttr('disabled');$(".inferror").remove();return false;});$('#dorequest').on('click',function(){if($("#online_request").hasClass('static')){doRequest('step_5');}else{doRequest('step_4');}
return false;});}
$('#b-filter input[name="sum"]').on('keyup',function(){saintInput($(this),'num');});$('#b-filter input[name="time"]').on('keyup',function(){saintInput($(this),'num');});$('#b-filter input[name="percent"]').on('keyup',function(){saintInput($(this),'numdot');});$("#b-filter input").keyup(function(){if(!checkReq()){$("#filter-content_in").remove();$("#filter-content").show();return false;}
var str=$("#b-filter").serialize();filter(str);});$('select[name="process"]').selectmenu({change:function(event,data){if(!checkReq()){$("#filter-content_in").remove();$("#filter-content").show();return false;}
$("select[name=\"process\"]").val(this.selectedIndex);$("select[name=\"process\"]").selectmenu("refresh");var str=$("#b-filter").serialize();filter(str);}});$('#get_bonus_email').hover(function(){$('#get_bonus_email').removeClass('error');});$("#credit-summa-15").keyup(function(){replaced(this);});$("#summa_zayma").keyup(function(){replaced(this);});$('.big-tooltip__link').click(function(){if($(this).siblings('.big-tooltip__desc').hasClass('big-tooltip__desc_open')){$('.big-tooltip__desc_open').removeClass('big-tooltip__desc_open');}
else{$('.big-tooltip__desc_open').removeClass('big-tooltip__desc_open');$(this).siblings('.big-tooltip__desc').addClass('big-tooltip__desc_open');}});$('.big-tooltip__desc a.close').click(function(){$(this).parent('.big-tooltip__desc').toggleClass('big-tooltip__desc_open');});$(".target_1").on("click",function(){ga("send","event","button_1","click_1","","30");yaCounter31501218.reachGoal('zayava');});$(".target_2").on("click",function(){ga("send","event","button_2","click_2","","30");yaCounter31501218.reachGoal('zayava2');});$(".target_3, .target_4, .target_5, .target_6, .target_7, .target_8, .target_9, .target_10, .target_11, .target_12, .target_13, .target_14, .target_15, .target_16, .target_17, .target_18, .target_19, .target_20, .target_21, .target_22, .target_23, .target_24, .target_25, .target_26, .target_27, .target_28, .target_29").on("click",function(){ga("send","event","button_3","click_3","","30");});$(".target_3").on("click",function(){yaCounter31501218.reachGoal('nalik');});$(".target_4").on("click",function(){yaCounter31501218.reachGoal('mikrik');});$(".target_5").on("click",function(){yaCounter31501218.reachGoal('mapka');});$(".target_6").on("click",function(){yaCounter31501218.reachGoal('qiwi');});$(".target_7").on("click",function(){yaCounter31501218.reachGoal('tinkoff');});$(".target_8").on("click",function(){yaCounter31501218.reachGoal('tovar');});$(".target_9").on("click",function(){yaCounter31501218.reachGoal('history');});$(".target_10").on("click",function(){yaCounter31501218.reachGoal('5min');});$(".target_11").on("click",function(){yaCounter31501218.reachGoal('business');});$(".target_12").on("click",function(){yaCounter31501218.reachGoal('rating');});$(".target_13").on("click",function(){yaCounter31501218.reachGoal('news');});$(".target_14").on("click",function(){yaCounter31501218.reachGoal('debet');});$(".target_15").on("click",function(){yaCounter31501218.reachGoal('creditkarate');});$(".target_16").on("click",function(){yaCounter31501218.reachGoal('faq');});$(".target_17").on("click",function(){yaCounter31501218.reachGoal('proverka');});$(".target_18").on("click",function(){yaCounter31501218.reachGoal('rf');});$(".target_19").on("click",function(){yaCounter31501218.reachGoal('broker');});$(".target_20").on("click",function(){yaCounter31501218.reachGoal('zalogned');});$(".target_21").on("click",function(){yaCounter31501218.reachGoal('passport');});$(".target_22").on("click",function(){yaCounter31501218.reachGoal('denvdolg');});$(".target_23").on("click",function(){yaCounter31501218.reachGoal('zaymi');});$(".target_24").on("click",function(){yaCounter31501218.reachGoal('bankiinfo');});$(".target_28").on("click",function(){yaCounter31501218.reachGoal('qiwicat');});$(".target_29").on("click",function(){yaCounter31501218.reachGoal('microcat');});});;function saveReviews(i,area){var o={};o['id']=i;o['area']=area;o['text']=$("iframe#description"+i+"_ifr").contents().find("p").text();o['text']=o['text']?o['text']:$("#description"+i).val();return o.user=i,$.each($("#ajaxreviews"+i).serializeArray(),function(i,e){-1!=e.name.indexOf("Reviews")&&(o[e.name]=e.value)}),o.action="save",ShowLoading(""),$.post(dle_root+"engine/mods/reviews/ajax/edit.php",o,function(i){HideLoading(""),"ok"!=i?DLEalert(i,dle_info):($("#dlepopup-reviews-edit").dialog("close"),DLEconfirm(dle_save_ok,dle_confirm,function(){location.reload(!0)}))}),!1}
function editReviews(id,area,event){ShowLoading('');$.get(dle_root+"engine/mods/reviews/ajax/edit.php",{id:id,area:area,action:"edit"},function(data){HideLoading('');var shadow='none';var b={};var height=300;var width=500;b[dle_act_lang[3]]=function(){$(this).dialog('close');};b[dle_act_lang[4]]=function(){saveReviews(id,area,event);};$('#dlepopup-reviews-edit').remove();$('body').prepend("<div id='dlepopup-reviews-edit' class='dlepopupreviewsedit' title='"+menu_short+"' style='display:none'></div>");$('.dlepopupreviewsedit').html('');$('#dlepopup-reviews-edit').dialog({autoOpen:true,width:width,height:height,buttons:b,resizable:false,dialogClass:"modalfixed dle-popup-quickedit",close:function(event,ui){$(this).dialog('destroy');}});if($(window).width()>830&&$(window).height()>530){$('.modalfixed.ui-dialog').css({position:"fixed"});$('#dlepopup-reviews-edit').dialog("option","position",['0','0']);}
$("#dlepopup-reviews-edit").html(data);},'html');return false;};function reviewsModer(id,mod){if(mod=='moder')var text='Отправить на модерацию выбранный отзыв?';if(mod=='del')var text='Удалить выбранный отзыв?';DLEconfirm(text,'Подтверждение',function(){ShowLoading('');$.get(dle_root+"engine/mods/reviews/ajax/moder.php",{id:id,mod:mod,dle_allow_hash:dle_login_hash},function(data){HideLoading('');setTimeout(function(){location.reload();},1000);});});}
function ReviewsModMenu(id){var menu=new Array();menu[0]='<a onclick="editReviews(\''+id+'\'); return false;" href="#">Редактировать</a>';if(dle_admin!=''){menu[1]='<a onclick="reviewsModer (\''+id+'\', \'moder\'); return false;" href="#">Скрыть/опубликовать</a>';menu[3]='<a onclick="reviewsModer (\''+id+'\', \'del\'); return false;" href="#">Удалить</a>';}
return menu;}
function doReviewsRate(a,b){ShowLoading("");$.get(dle_root+"engine/mods/reviews/ajax/rating.php",{go_rate:a,c_id:b},function(a){HideLoading("");if(a.success){var d=a.rating,d=d.replace(/&lt;/g,"<"),d=d.replace(/&gt;/g,">"),d=d.replace(/&amp;/g,"&");$("#reviews-ratig-layer-"+b).html(d);$("#reviews-vote-num-id-"+b).html(a.votenum)}},"json")}