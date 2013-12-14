var main 	= 
events 		= 
paths		= {};

paths.selected_thumbs	= "img/thumbnails/300/";
paths.videos 			= "img/mp4/";

var selections = [];
var current_category = {id:null,index:null};

jQuery( function($){
	console.log(categories);

	$.each(categories, function(i,v){
		selections.push("none");
	});

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

	main.addEventListeners();
	main.showCategory("2");
});

main.positionCaret = function(){
	var pos = $("#category-nav li[data-id="+current_category.id+"]").position().left;
	$("#nav-container img#arrow").css("left",pos+10);
}

main.addEventListeners = function(){
	$(".thumbnail p.add-btn").click( events.onAddClicked );
	$(".thumbnail p.preview-btn").click( events.onPreviewClicked );
}

events.onPreviewClicked = function( $e ){
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

main.showPreview = function(){

}

main.hidePreview = function(){

}

main.checkComplete = function(){
	return selections.indexOf("none") == -1 ? true : false;
}

main.toEditVideoMode = function(){
	main.scrollToEditor();
	$("#build").fadeIn();
}

main.initVideoPreviewMode = function(){
	main.scrollToPreview();

	$("#build").fadeOut(400,function(){
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
        	console.log(response);
       //      if(response.status == "success"){
       //      	console.log("success : " + response.video);

       //      	$("#preview-video-source").attr('src', response.video);
			    // $("#preview-video").load();

			    // main.onVideoPreviewModeComplete();
       //      }else{
       //      	console.log("ffmpeg video error: " + response.error);
       //      }
        },
        error:function(error){
        	console.log("server video error");
        }
    });
}

main.onVideoPreviewModeComplete = function(){
	$("#preview").fadeIn();
}

main.showCategory = function( _category_id ){
	current_category.id = _category_id;
	current_category.index = categories.indexOf(_category_id);

	$('#category-nav li a[data-id='+ current_category.id +']' ).tab('show');

	main.scrollToChooseVideos();
	main.positionCaret();
}

main.scrollToChooseVideos = function(){
	var editorTop = $("#choose-videos-header").offset().top;

	if( $("body").scrollTop() > editorTop){
		$("body").animate({scrollTop:editorTop});
	}
}

main.scrollToEditor = function(){
	var editorTop = $("#edit-video").offset().top-30;
	$("body").animate({scrollTop:editorTop});
}

main.scrollToPreview = function(){
	var editorTop = $("#preview-video").offset().top-30;
	$("body").animate({scrollTop:editorTop});
}

main.videoChanged = function( $category, $thumb_id ){
	console.log( "category " + $category + " changed to : " + $thumb_id );

	var _filename = $category + "_" + $thumb_id + ".jpg";
	var _li = $("#edit-video-nav li[data-id=" + $category + "]");
	var _span = _li.children("span").eq(0);

	if(!_li.hasClass("selected"))
		_li.addClass("selected");

	_span.css( "background-image", "url(../img/overlay_bg.png), url(" + paths.selected_thumbs + _filename + ")" );
}



