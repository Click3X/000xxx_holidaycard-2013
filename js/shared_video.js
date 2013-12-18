var main = {};
var current_fbimage;

jQuery( function($){
	main.settings = $.initUserAgent();

	for(var i in main.settings	 ){
	    if(main.settings[i] === true){
	    	$("html").addClass(i);
	    	//$("html").prepend('<span style="font-size:14px; color:#666"> '+i+'</span>');
	    }
	}

	main.video_ext = $.getVideoExtension();

	console.log(main.settings.sys);

	$('.play-controls a.glyphicon-play').click(function (e) {
		e.preventDefault();
		main.playPreviewVideo();
	});

	current_fbimage = base_url + "output/images/" + video_filename + ".jpg";

	$('video').attr("type","video/" + main.video_ext);
	$('video').attr("src",base_url + "output/" + video_filename + "." + main.video_ext);
	$('video').get(0).load();

	$('#share-nav #facebook-btn').click($.shareOnFacebook);
	$('#share-nav #twitter-btn').click($.shareOnTwitter);
});

main.playPreviewVideo = function(){
	$('.play-controls').fadeOut(300,function(){
		$('video').attr("controls",true);
		$('video').get(0).play();
	});
};