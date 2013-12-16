(function() {
    'use strict';

    // Add ECMA262-5 method binding if not supported natively
    //
    if (!('bind' in Function.prototype)) {
        Function.prototype.bind= function(owner) {
            var that= this;
            if (arguments.length<=1) {
                return function() {
                    return that.apply(owner, arguments);
                };
            } else {
                var args= Array.prototype.slice.call(arguments, 1);
                return function() {
                    return that.apply(owner, arguments.length===0? args : args.concat(Array.prototype.slice.call(arguments)));
                };
            }
        };
    }
    
    if (!('indexOf' in Array.prototype)) {
        console.log("Adding Array.indexOf");

        Array.prototype.indexOf= function(find, i /*opt*/) {
            if (i===undefined) i= 0;
            if (i<0) i+= this.length;
            if (i<0) i= 0;
            for (var n= this.length; i<n; i++)
                if (i in this && this[i]===find)
                    return i;
            return -1;
        };
    } else {
        console.log("Array.indexOf already exists.");
    }
}());

// Avoid `console` errors in browsers that lack a console.
(function() {
    var method;
    var noop = function () {};
    var methods = [
        'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
        'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
        'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
        'timeStamp', 'trace', 'warn'
    ];
    var length = methods.length;
    var console = (window.console = window.console || {});

    while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
            console[method] = noop;
        }
    }
}());

(function($) {
    $.extend({
        initUserAgent: function() {
            var settings = {};
            settings.agent = navigator.userAgent;
            settings.aspect_ratio = window.devicePixelRatio || 1;

            if( settings.agent.match(/iPhone/i) || settings.agent.match(/iPod/i) ){
                settings.iphone = true;
                $("html").addClass("iphone");       
            }else if( settings.agent.match(/iPad/i) ){
                settings.ipad = true;
                $("html").addClass("ipad");
            }else if ( settings.agent.match(/Android/i) ){
                settings.android = true;
                $("html").addClass("android");
            }else if( settings.agent.match(/Mac OS/i)){
                settings.mac = true;
                $("html").addClass("macos");
            }else if( settings.agent.match(/Windows/i)){
                settings.windows = true;
                $("html").addClass("windowsos");
            }

            if( settings.agent.match(/Mobile/i) ){
                settings.mobile = true;
                $("html").addClass("mobile");
            }

            if(settings.iphone || settings.ipad){
                settings.ios = true;

                if( settings.aspect_ratio == 2 ){
                    settings.retina = true;
                    $("html").addClass("retina");
                }

                if( settings.agent.match(/4_/i) ){
                    settings.ios_version = 4;
                    $("html").addClass("ios4");
                } else if( settings.agent.match(/5_/i) ){
                    settings.ios_version = 5;
                    $("html").addClass("ios5");
                } else if( settings.agent.match(/6_/i) ){
                    settings.ios_version = 6;
                    $("html").addClass("ios6");
                } else if( settings.agent.match(/7_/i) ){
                    settings.ios_version = 7;
                    $("html").addClass("ios7");
                }
            }

            return settings;
        },

        shareOnFacebook: function(e) {
            var _selections = [];
            $.each(selections,function(i,v){
                _selections.push(parseInt(v));
            });

            var sel = {selections:_selections};

            var _name       = "Happy Holidays from Click 3X",
            _caption        = "holidays.click3x.com",
            _description    = header_text,
            _link           = base_url + "home/video?data=" + JSON.stringify(sel),
            _picture        = base_url + "img/thumbnails/200/2_" + _selections[0] + ".jpg"

            FB.ui({
               method: 'feed',
               name: _name,
               caption: _caption,
               description: _description,
               link: _link,
               picture: _picture
              },
              function(_result) {
                if(_result && _result.post_id){
                  response.status = "success";
                } else {
                  response.status = "failed";
                }
            });
        },

        shareOnTwitter: function(e){
            var _selections = [];
            $.each(selections,function(i,v){
                _selections.push(parseInt(v));
            });

            var sel = {selections:_selections};

            var _route      = base_url + "twitter/share",
            _status         = "Happy Holidays from Click 3X. " + header_text,
            _link           = "?data=" + JSON.stringify(sel);

            window.open(    _route + "/" + escape(_status) + "/" + escape(_link), 
                            "_blank", "width=500,height=300,top=200px,left=" + $(window).width()*.5);
        }
    });
})(jQuery);

// Place any jQuery/helper plugins in here.
