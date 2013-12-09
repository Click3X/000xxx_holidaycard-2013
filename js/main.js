var main 	= 
events 		= 
paths		=
selections 	= {};

paths.thumbnails 	= "img/timeline/";
paths.videos 		= "img/mp4/";

jQuery( function($){
	$('#nav-container li a').click(function (e) {
	  e.preventDefault();

	  $(this).tab('show')
	});

	main.init();
	main.addEventListeners();
});

main.init = function(){
	selections["0"] = selections["1"] =	
	selections["2"]	= selections["3"] = { last:null, current:null };
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

	if( selections[ _category ].current == null ){
		selections[ _category ].last = 
		selections[ _category ].current = _thumb_id;

		main.videoChanged( _category, _thumb_id );
	} else if( selections[ _category ].last != _thumb_id ){
		selections[ _category ].current = _thumb_id;
		selections[ _category ].last = selections[ _category ].current;

		main.videoChanged( _category, _thumb_id );
	} else {
		console.log("video is already selected");
	}

	main.nextCategory( _category );
}

main.nextCategory = function( _currentCategory ){
	var _nextCategory = Number(_currentCategory) + 1;

	if(_nextCategory > 3){
		main.scrollToEditor();
	}else{
		$('#nav-container li:eq(' + String(_nextCategory) + ') a').tab('show');
	}
}

main.scrollToEditor = function(){
	var editorTop = $("#edit-video-nav").offset().top-60;
	$("body").animate({scrollTop:editorTop});

	console.log(editorTop);
}

main.videoChanged = function( $category, $thumb_id ){
	console.log( "category " + $category + " changed to : " + $thumb_id );
	var _filename = $category + "_" + $thumb_id + ".jpg";

	$("#edit-video-nav li[data-video-category=" + $category + "] a").css( "background-image", "url(" + paths.thumbnails + _filename + ")" );
}



