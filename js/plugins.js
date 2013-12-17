function gaTrackEvent( _action, _label ){
    ga('send', 'event', _action, 'click', _label);
}

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
            var s = {};
            s.agent = navigator.userAgent;
            s.ar = window.devicePixelRatio || 1;

            //os
            s.mac          = s.agent.indexOf("Mac OS") > -1;
            s.windows      = s.agent.indexOf("Windows") > -1;


            //browser
            s.chrome       = s.agent.indexOf("Chrome") > -1;
            s.ie           = s.agent.indexOf("MSIE") > -1;
            s.firefox      = s.agent.indexOf("Firefox") > -1;
            s.safari       = s.agent.indexOf("Safari") > -1;
            s.opera        = s.agent.indexOf("Presto") > -1;

            //mobile
            s.mobile       = s.agent.indexOf("Mobile") > -1;
            s.iphone       = s.agent.indexOf("iPhone") > -1 || s.agent.indexOf("iPod") > -1;
            s.ipad         = s.agent.indexOf("iPad") > -1;
            s.android      = s.agent.indexOf("Android") > -1;

            if( (s.chrome) && (s.safari) ){
                s.safari = false;
            }

            //retina?
            if( s.ar == 2 ){
                s.retina = true;
            }

            return s;
        },

        getVideoExtension: function(){
            var ext = "mp4";
            if(main.settings.firefox === true)
                ext = "webm";

            return ext;
        },

        shareOnFacebook: function(e) {
            gaTrackEvent("share","facebook");

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
            gaTrackEvent("share","twitter");

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
