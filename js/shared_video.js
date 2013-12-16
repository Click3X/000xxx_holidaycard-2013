var main = {};

jQuery( function($){
	main.settings = $.initUserAgent();

	$('.play-controls a.glyphicon-play').click(function (e) {
		e.preventDefault();
		main.playPreviewVideo();
	});

	$('video').attr("src",base_url + "output/" + video_filename);
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