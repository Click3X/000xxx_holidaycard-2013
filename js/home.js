var main 	= 
events 		= 
paths		= {};

paths.selected_thumbs	= "img/thumbnails/300/";
paths.posters			= "img/thumbnails/600/";

var selections = [];
var current_category = {id:null,index:null};

var preview_video;
var preview_video_controls;

var modal_video;

main.settings = {};

jQuery( function($){
	main.settings = $.initUserAgent();

	for(var i in main.settings	 ){
	    if(main.settings[i] === true){
	    	$("html").addClass(i);
	    	$("html").prepend('<span style="font-size:14px; color:#666"> '+i+'</span>');
	    }
	}

	main.video_ext = $.getVideoExtension();

	console.log(main.settings);

	preview_video 				= $("#preview video");
	preview_video_controls 		= $("#preview div.play-controls");
	modal_video 				= $("#preview_modal video");

	$.each(categories, function(i,v){
		selections.push("none");
	});

	main.addEventListeners();
	main.showCategory(categories[0]);
});

main.playPreviewVideo = function(){
	preview_video_controls.fadeOut(300,function(){
		preview_video.attr("controls",true);
		preview_video.get(0).play();
	});
}

main.positionCaret = function( _callback ){
	var pos = $("#category-nav li[data-id="+current_category.id+"]").position().left;
	$("#nav-container img#arrow").animate( {"left":pos+10},300,"swing", _callback ? _callback(): null );
}

main.addEventListeners = function(){
	$(".thumbnail p.add-btn").click( events.onAddClicked );
	$(".thumbnail p.preview-btn").click( events.onPreviewThumbClicked );

	$(".thumbnail").mouseover( events.thumbImageOver );
	$(".thumbnail").mouseout( events.thumbImageOut );

	$('#nav-container li a').click(function (e) {
		e.preventDefault();
		main.showCategory( $(this).attr("data-id") );
	});

	$('#edit-video-nav li a').click(main.onRemoveClicked);

	$('#build a').click(function(e){
		e.preventDefault();
		
		main.initVideoPreviewMode();
	});

	$('#share-nav #facebook-btn').click($.shareOnFacebook);
	$('#share-nav #twitter-btn').click($.shareOnTwitter);

	$('.play-controls a.glyphicon-play').click( function(e){
		e.preventDefault();
		main.playPreviewVideo();
	});

	$(".modal-close").click( main.closeModalClicked );
}

events.thumbImageOver = function(){
	var t = $(this);
	var img = t.children("img").eq(0);
	var src = img.attr("data-hover-src");
	img.attr("src",src);
}

events.thumbImageOut = function(){
	var t = $(this);
	var img = t.children("img").eq(0);
	var src = img.attr("data-src");
	img.attr("src",src);
}

main.closeModalClicked = function(e){
	e.preventDefault();

	$("#preview_modal").modal("hide");

	setTimeout(function(){
		main.resetModalVideo();
	},200);
}

main.resetModalVideo = function(){
	modal_video.attr("src","");
	modal_video.attr("poster","");
}

events.onPreviewThumbClicked = function( e ){
	e.preventDefault();

	var _thumb 		= $(this).parent().parent(),
	_thumb_id		= _thumb.attr("data-id"),
	_category 		= _thumb.attr("data-video-category"),
	_category_index = $.inArray(_category,categories);

	modal_video.attr("type", "video/" + main.video_ext );
	modal_video.attr("src", base_url + main.video_ext + "/" + _category + "_" + _thumb_id + "." + main.video_ext );
	modal_video.attr("poster", base_url + paths.posters + _category + "_" + _thumb_id + ".jpg" );
	preview_video.load();

	$("#preview_modal").modal("show");
}

events.onAddClicked = function( e ){
	e.preventDefault();

	var _thumb 		= $(this).parent().parent(),
	_thumb_id		= _thumb.attr("data-id"),
	_category 		= _thumb.attr("data-video-category"),
	_category_index = $.inArray(_category,categories);

	if( selections[ _category_index ] != _thumb_id ){
		selections[ _category_index ] = _thumb_id;

		$("#video-category-"+_category+" .thumbnail.selected").removeClass("selected");
		_thumb.addClass("selected");

		main.videoChanged( _category, _thumb_id );

		if( main.checkComplete() )
			main.toEditVideoMode();
		else
			main.nextCategory();		
	} else {
		console.log("video is already selected");
	}
}

main.onRemoveClicked = function( e ){
	e.preventDefault();

	var _a 			= $(this).parent(),
	_category_id	= _a.attr("data-id"),
	_category_index = $.inArray(_category_id,categories);

	selections[ _category_index ] = "none";
	main.videoChanged(_category_id);
	main.showCategory(_category_id);
}

main.nextCategory = function(){
	if( current_category.index == categories.length-1 ){
		console.log( main.firstMissingCategory() );

		main.showCategory( main.firstMissingCategory() );
	}else{
		main.showCategory( categories[ current_category.index+1 ] );
	}
}

main.firstMissingCategory = function(){	
	return categories[ $.inArray("none",selections) ];
}

main.checkComplete = function(){
	return $.inArray("none",selections) == -1 ? true : false;
}

main.toEditVideoMode = function(){
	console.log("toEditMode");

	$("#preview").fadeOut(200, function(){
		main.resetPreviewVideo();

		$("#build").fadeTo(200, 1, function(){
			main.scrollToEditor();
		});
	});
}

main.resetPreviewVideo = function(){
	preview_video.attr("src","");
	preview_video.removeAttr("controls");
	preview_video_controls.fadeIn(0);
}

main.initVideoPreviewMode = function(){
	$("#build").fadeTo(300,0,function(){
		_gaq.push(['_trackEvent', 'video', 'create', selections.join("-") ]);

		main.getCombinedVideo();
	});
}

main.getCombinedVideo = function(){
	$.ajax({
        type: 'POST',
        url: base_url + "encoder/combine",
        data: {"selections":JSON.stringify(selections)},
        dataType: "json",
        success: function (response) {
            if(response.status == "success"){
            	console.log("success:");
            	console.log(response);

            	preview_video.attr('type', "video/" + main.video_ext);
            	preview_video.attr('src', response[main.video_ext]["video"] );
			    preview_video.load();

			    main.onVideoPreviewReady();
            }else{
            	console.log("ffmpeg video error:");
            	console.log(response);
            }
        },
        error:function(error){
        	console.log("server video error:");
        	console.log(error);
        }
    });

	//local testing;
	// preview_video.attr('src', "mp4/1_0.mp4");
	// preview_video.load();
	// main.onVideoPreviewReady();
}

main.onVideoPreviewReady = function(){
	$("#build").fadeOut(0);

	$("#preview").fadeIn(300, function(){
		main.scrollToPreview();
	});
}

main.showCategory = function( _category_id ){
	current_category.id = _category_id;
	current_category.index = $.inArray(_category_id,categories);

	preview_video.get(0).pause();

	//first scroll to top
	setTimeout(function(){
		main.scrollToChooseVideos(function(){
			console.log("scroll complete");

			//starting position of tab-pane
			$('#video-category-'+ current_category.id).css({left:"100px"});

			//show the tab-pane and move caret
			$('#video-category-'+ current_category.id).animate({left:"0"});
			$('#category-nav li a[data-id='+ current_category.id +']' ).tab('show');

			//move the caret
			main.positionCaret();

			//transition in thumbs
			var i = 0;
			$('#video-category-'+ current_category.id + " .col-xs-6").each(function(){
				var t = $(this);
				var rand = 200+ (Math.random()*500);

				//set starting positions
				t.css({"opacity":"0","left":(i*50)-rand + "px"});

				//animate in
				t.delay(i*50).animate({"opacity":"1","left":"0px"});
				i++;
			});
		});
	},300);
}

main.scrollToChooseVideos = function( _callback ){
	var editorTop = $("#choose-videos-header").offset().top;

	if( $("body").scrollTop() > editorTop){
		$("body").animate( {scrollTop:editorTop},300,"swing",_callback ? _callback(): null );
	} else {
		_callback ? _callback(): null;
	}
}

main.scrollToEditor = function( _callback ){
	var editorTop = $("#edit-video").offset().top-30;
	$("body").animate({scrollTop:editorTop},300,"swing",_callback ? _callback(): null );
}

main.scrollToPreview = function( _callback ){
	var previewTop = $("#preview").offset().top-30;
	$("body").animate({scrollTop:previewTop},300,"swing",_callback ? _callback(): null );
}

main.videoChanged = function( $category, $thumb_id ){
	console.log( "category " + $category + " changed to : " + $thumb_id );

	var _li = $("#edit-video-nav li[data-id=" + $category + "]");
	var _span = _li.children("span").eq(0);

	if($thumb_id != undefined){
		var _filename = $category + "_" + $thumb_id + "r.jpg";

		if(!_li.hasClass("selected"))
			_li.addClass("selected");

		_span.css( "background-image", "url("+base_url+"img/overlay_bg.png), url(" + base_url + paths.selected_thumbs + _filename + ")" );
	} else {
		if(_li.hasClass("selected"))
			_li.removeClass("selected");

		_span.css( "background-image", "url('../img/gray_button_bg.jpg')" );
	}
}