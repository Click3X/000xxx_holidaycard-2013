var main 	= 
events 		= 
paths		= {};

paths.selected_thumbs	= "img/thumbnails/300/";
paths.videos 			= "img/mp4/";

var selections = [];
var current_category = {id:null,index:null};

var preview_video;
var preview_video_controls;

main.settings = {};

jQuery( function($){
	console.log(categories);

	main.initSettings();

	preview_video = $("#preview video");
	preview_video_controls = $("#preview div.play-controls");

	$.each(categories, function(i,v){
		selections.push("none");
	});

	main.addEventListeners();
	main.showCategory("2");
});

main.initSettings = function(){
	main.settings.agent = navigator.userAgent;

	main.settings.aspect_ratio = window.devicePixelRatio || 1;

	if( main.settings.agent.match(/iPhone/i) || main.settings.agent.match(/iPod/i) ){
		main.settings.iphone = true;
		$("html").addClass("iphone");		
	}else if( main.settings.agent.match(/iPad/i) ){
		main.settings.ipad = true;
		$("html").addClass("ipad");
	}else if ( main.settings.agent.match(/Android/i) ){
		main.settings.android = true;
		$("html").addClass("android");
	}else if( main.settings.agent.match(/Mac OS/i)){
		main.settings.mac = true;
		$("html").addClass("macos");
	}else if( main.settings.agent.match(/Windows/i)){
		main.settings.windows = true;
		$("html").addClass("windowsos");
	}

	if( main.settings.agent.match(/Mobile/i) ){
		main.settings.mobile = true;
		$("html").addClass("mobile");
	}

	if(main.settings.iphone || main.settings.ipad){
		main.settings.ios = true;

		if( main.settings.aspect_ratio == 2 ){
			main.settings.retina = true;
			$("html").addClass("retina");
		}

		if( main.settings.agent.match(/4_/i) ){
			main.settings.ios_version = 4;
			$("html").addClass("ios4");
		} else if( main.settings.agent.match(/5_/i) ){
			main.settings.ios_version = 5;
			$("html").addClass("ios5");
		} else if( main.settings.agent.match(/6_/i) ){
			main.settings.ios_version = 6;
			$("html").addClass("ios6");
		} else if( main.settings.agent.match(/7_/i) ){
			main.settings.ios_version = 7;
			$("html").addClass("ios7");
		}
	}

	alert(main.settings.mobile);
}

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

	$('#nav-container li a').click(function (e) {
	  e.preventDefault();
	  main.showCategory( $(this).attr("data-id") );
	});

	$('#edit-video-nav li a').click(function (e) {
	  e.preventDefault();
	  main.showCategory( $(this).attr("data-id") );
	});

	$('#build button').click(function(){
		main.initVideoPreviewMode();
	});

	$('.play-controls a.glyphicon-play').click(function (e) {
	  e.preventDefault();
	  main.playPreviewVideo();
	});
}

events.onPreviewThumbClicked = function( $e ){
	$("#preview_modal").modal("show");
}

events.onAddClicked = function( $e ){
	var _thumb 		= $(this).parent().parent(),
	_thumb_id		= _thumb.attr("data-id"),
	_category 		= _thumb.attr("data-video-category"),
	_category_index = categories.indexOf(_category);

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

main.nextCategory = function(){
	if( current_category.index == categories.length-1 ){
		console.log( main.firstMissingCategory() );

		main.showCategory( main.firstMissingCategory() );
	}else{
		main.showCategory( categories[ current_category.index+1 ] );
	}
}

main.firstMissingCategory = function(){	
	return categories[selections.indexOf("none")];
}

main.checkComplete = function(){
	return selections.indexOf("none") == -1 ? true : false;
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
            	console.log("success : " + response.video);

            	preview_video.attr('src', response.video);
			    preview_video.load();

			    main.onVideoPreviewReady();
            }else{
            	console.log("ffmpeg video error: " + response.error);
            }
        },
        error:function(error){
        	console.log("server video error");
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
	current_category.index = categories.indexOf(_category_id);

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

	var _filename = $category + "_" + $thumb_id + ".jpg";
	var _li = $("#edit-video-nav li[data-id=" + $category + "]");
	var _span = _li.children("span").eq(0);

	if(!_li.hasClass("selected"))
		_li.addClass("selected");

	_span.css( "background-image", "url("+base_url+"img/overlay_bg.png), url(" + base_url + paths.selected_thumbs + _filename + ")" );
}



