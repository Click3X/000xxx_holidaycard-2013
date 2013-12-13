var main 	= 
events 		= 
paths		=
selections 	= {};

paths.selected_thumbs	= "img/thumbnails/300/";
paths.videos 			= "img/mp4/";

var categories = [];
var current_category = {id:null,index:null};

jQuery( function($){
	$.each(categories, function(i,v){
		selections[v] = -1;
	});

	console.log(categories);

	$('#nav-container li a').click(function (e) {
	  e.preventDefault();
	  main.showCategory( $(this).attr("data-id") );
	});

	main.addEventListeners();
	main.showCategory("2");
});

main.positionCaret = function(_x){
	//var pos = $(this).parent().position().left;
	$("#nav-container img#arrow").css("left",_x+14);
}

main.addEventListeners = function(){
	$(".thumbnail p.add-btn").click( events.onAddClicked );
	$(".thumbnail p.preview-btn").click( events.onPreviewClicked );
}

events.onPreviewClicked = function( $e ){
	$("#preview_modal").modal("show");
}

events.onAddClicked = function( $e ){
	var _thumb 		= $(this).parent().parent();

	var _thumb_id	= _thumb.attr("data-id"),
	_category 		= _thumb.attr("data-video-category");

	 if( selections[ _category ] != _thumb_id ){
		main.videoChanged( _category, _thumb_id );
		selections[ _category ] = _thumb_id;
	 } else {
		console.log("video is already selected");
	}

	main.nextCategory( _category );
}

main.nextCategory = function(){
	if( current_category.index == categories.length-1 ){
		//main.scrollToEditor();
	}else{
		main.showCategory( categories[ current_category.index+1 ] );
	}

	// var _nextCategory = Number(_currentCategory) + 1;

	// if(_nextCategory == 4){
	// 	main.scrollToEditor();
	// }else{
	// 	$('#nav-container li:eq(' + String(_nextCategory) + ') a').tab('show');
	// }
}

main.showCategory = function( _category_id ){
	current_category.id = _category_id;
	current_category.index = categories.indexOf(_category_id);

	console.log("showing category : ");
	console.log(current_category);

	$('#category-nav li a[data-id='+ current_category.id +']' ).tab('show');
}

main.scrollToEditor = function(){
	var editorTop = $("#edit-video-nav").offset().top-60;
	$("body").animate({scrollTop:editorTop});

	console.log(editorTop);
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

main.getCombinedVideo = function(){
	$.ajax({
        type: 'GET',
        url: base_url + "encoder/combine",
        dataType: "json",
        success: function (response) {
        	console.log(response);

            if(response.status == "success"){
            	console.log("success : " + response.video);

            	$("#preview-video-source").attr('src', response.video);
			    $("#preview-video").load();
            }else{
            	console.log("ffmpeg video error: " + response.error);
            }
        },
        error:function(error){
        	console.log("server video error");
        }
    });
}

