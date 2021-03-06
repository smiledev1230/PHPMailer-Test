
(function($) {


/***********************************************************************************
* 							Thumbnail: Prelaod Images
***********************************************************************************/

var thumbImageArray;

function preloadImages(thumbnailArray) {   

var thumbImage = [];

     for(var i = 0; i<thumbnailArray.length; i++){
	
	var _url = thumbnailArray[i];
	
	// set up the node / element
	var _img = $("<img>");
	
	thumbImage.push(_img);
	
    
	_img.attr("src", thumbnailArray[i]);
	
    }
	
	thumbImageArray = thumbImage;
}

/***********************************************************************************
* 							Navigation: Build
***********************************************************************************/
var contentArray;

function intialize(customData){
	
	$(".photo-gallery").append('<div id="photo-gallery-stage"></div><div id="photo-gallery-header"></div><div id="thumbnail-container"></div><div id="photo-gallery-nav"></div>');
	
	return buildNav(customData);
}


function buildNav(customData){
	
	var thumbnailArray = [];
	var items = "";
	
	
	$.each(customData, function(i, val) {
		
		var addClass = "cursor-hand "
		addClass += (i % 11) == 0 ? "item-active skip-to-item" : "item-active";		
		
		 var count = i + 1;
		 items +='<div class="'+ addClass +'">' + count + '</div>';
		 
		 thumbnailArray.push(customData[i].thumbnail);
		 
		 if(thumbnailArray.length ==  customData.length){
			
			preloadImages(thumbnailArray);		 
		 }
      	
    });
	
	buildGalleryImage();
	navConfiguration(thumbnailArray, items);
	initializeMenu();
	
}

function navConfiguration(thumbnailArray, items){
	
	var prevBTN = '<div id="item-prev" class="item-prev-next"></div>';
	var prevSkipBtn = '<div id="item-prev-skip" class="item-prev-next-skip"></div>';
	var nextBTN = '<div id="item-next" class="item-prev-next"></div>';
	var nextSkipBtn = '<div id="item-next-skip" class="item-prev-next-skip"></div>';
	var itemContainer = '<div id="item-container-mask"><div id="item-container">' + items + '</div></div>'; 
	
	var nav = thumbnailArray.length > 12 ? (prevSkipBtn + prevBTN + itemContainer +  nextSkipBtn +nextBTN) : (prevBTN + itemContainer + nextBTN);
	
	$("#photo-gallery-nav").append(nav);
	 
		
	thumbnailArray.length > 12 ? $('#item-container-mask').css('left', '84px') : $('#item-container-mask').css('left', '42px');
	$("#item-container").css({'width' : (thumbnailArray.length * 42) + 'px'});
	
	thumbnailArray.length > 12 ? navSkipAddListeners() : "";
	
	return navAddListeners();
}

function navSkipAddListeners(){
	var itemNextSkip = $("#item-next-skip");
	itemNextSkip.bind("mousedown", skipNextPrevMousedown);
	itemNextSkip.bind("mouseup",  skipNextPrevMousedown);
	itemNextSkip.bind("mousedown", skipNextPrevMousedown);
	itemNextSkip.bind("mouseup",  skipNextPrevMousedown);
}
 
function navAddListeners(){
	var photoGalleryNav = $("#photo-gallery-nav");
	 photoGalleryNav.bind("click", navItemClick);
	 photoGalleryNav.bind("mouseover",  navItemOver);
	 photoGalleryNav.bind("mouseout",  navItemOver);
	 photoGalleryNav.bind("mousedown", nextPrevMousedown);
	 photoGalleryNav.bind("mouseup",  nextPrevMousedown);
}

function cursorDefaultHand(action, id){
	
	var $add;
	var $remove; 
	
	if(action == "cursorHand"){
		$remove = 'cursor-default';
		$add = 'cursor-hand';
	}
	
	if(action == "cursorDefault"){
		$remove = 'cursor-hand';
		$add = 'cursor-default';
	}
	
	id.removeClass($remove);
	id.addClass($add);
}

function initializeMenu(){
	var prevSkip = $('#item-prev-skip');
    prevSkip.css({'background-position': '-133px -32px'});
	cursorDefaultHand("cursorDefault", prevSkip);
		  
	$('#item-container div:first-child').trigger('click');
	
	return loadImage(0);
}

function skipNextPrevMousedown(evt){
	var itemID = $(evt.target);
	
	if(itemID.attr('id') == 'item-next-skip' && !itemID.hasClass("cursor-default")){
		
		evt.type == "mouseup" ?  itemID.css({'background-position': '-88px 0px'}) : itemID.css({'background-position': '-88px -32px'});
	}
	
	if(itemID.attr('id') == 'item-prev-skip' && !itemID.hasClass("cursor-default")){
		evt.type == "mouseup" ?  itemID.css({'background-position': '-133px 0px'}) : itemID.css({'background-position': '-133px -32px'});
	}
}

function nextPrevMousedown(evt){
	var itemID = $(evt.target);
	
		if(itemID.attr('id') == 'item-next'){
			evt.type == "mouseup" ?  itemID.css( {'background-position': '-44px 0px'}) : itemID.css( {'background-position': '-44px -32px'});
		}
	
		if(itemID.attr('id') == 'item-prev'){
			evt.type == "mouseup" ?  itemID.css( {'background-position': '0px 0px'}) : itemID.css( {'background-position': '0px -32px'});
		}
}

function nextPrevState(){
		var itemLength = $('#item-container').children().length -1;
		var index = $('#item-container').children(".item-clicked").index();
		
		
		//next
		var itemNext = $('#item-next');
		itemLength > index ?  itemNext.css( {'background-position': '-44px 0px'}) : itemNext.css( {'background-position': '-44px -32px'}) ;
		itemLength > index ?   cursorDefaultHand("cursorHand", itemNext) : cursorDefaultHand("cursorDefault", itemNext);
		
		//previous
		var itemPrev = $('#item-prev');
		0  <  index ?  itemPrev.css( {'background-position': '0px 0px'}) : itemPrev.css( {'background-position': '0px -32px'}) ;
		0  <  index ?  cursorDefaultHand("cursorHand", itemPrev) : cursorDefaultHand("cursorDefault", itemPrev);
		
}


var galleryNavItemIndex = 0;

function navItemClick(evt){


	var containerID = $(evt.target).parent().attr("id");
	var itemID = $(evt.target);
	var id = itemID.index();
	
	
	if(itemID.hasClass("item-prev-next-skip") && ! itemID.hasClass("cursor-default")){
		
		skipNavItems(itemID);
	}
	
	if(itemID.hasClass("item-prev-next")){
	
		var idSelected = $('#item-container').children(".item-clicked");
		var element = itemID.attr("id") == "item-next" ? idSelected.next() : idSelected.prev() ;
		var elementIndex = element.index();
		
		elementIndex != -1 ? updateStage(element , elementIndex) : "";
		
		
	    if(idSelected.hasClass('skip-to-item') && itemID.attr("id") == "item-prev"){
			
				element.addClass('item-clicked item-over');
				skipNavItems(itemID);		
		}
			
		if(idSelected.next().hasClass('skip-to-item') && itemID.attr("id") == "item-next"){
			skipNavItems(itemID);
		}
	}

	
	//Items
	if(containerID == "item-container" &&
	   !itemID.hasClass("item-clicked")){
		updateStage(itemID,id);
		
	}
	
	if(containerID == "item-container" &&
	   itemID.hasClass("item-clicked")){
		
		itemID.removeClass("item-active");
		itemID.addClass("item-not-active");
		thumbnialShowHide("hide");
	}
	
	return nextPrevState();
}

function skipNavItems(itemID){
	
			//Button: skip-next
		var n = $('#item-container > div:gt('+ galleryNavItemIndex +')').next('.skip-to-item').index();	
		n = n == -1 ? galleryNavItemIndex : n;
		
		//Button: skip-previous
		var p = $('#item-container > div:lt('+ galleryNavItemIndex +')').last().prevAll('.skip-to-item').index();
		p = p == -1 ? galleryNavItemIndex : p;
		
		//Item: index-value
		galleryNavItemIndex = (itemID.attr('id') == "item-next-skip") || (itemID.attr("id") == "item-next") ? n : p;

		//Button: skip-previous-state
		var prevSkip = $('#item-prev-skip');
		galleryNavItemIndex == 0 ?  prevSkip.css({'background-position': '-133px -32px'}) : prevSkip.css({'background-position': '-133px 0px'});
		galleryNavItemIndex == 0 ?  cursorDefaultHand("cursorDefault", prevSkip) : cursorDefaultHand("cursorHand", prevSkip);
		
		//Button: skip-next-state
		var navItemLength = $('#item-container > div').length;
		var nextSkip = $('#item-next-skip');
		galleryNavItemIndex == (navItemLength - (navItemLength % 11)) ?  nextSkip.css({'background-position': '-88px -32px'}) : nextSkip.css({'background-position': '-88px 0px'});	
		galleryNavItemIndex == (navItemLength - (navItemLength % 11)) ?  cursorDefaultHand("cursorDefault", nextSkip) : cursorDefaultHand("cursorHand", nextSkip);
		
		//Menu: scroll-animation
		var scrollAmount = $('#item-container > div:eq('+ galleryNavItemIndex +')').position().left;
		$("#item-container").stop(true, true).animate({left : -scrollAmount },"slow");
		
				
		
			  	if(itemID.hasClass("item-prev-next-skip")){
					$('#item-container > div').removeClass("item-clicked item-over");
				}
				
	
			  
				if(itemID.attr("id") != "item-prev"){
					$('#item-container > div:eq('+ galleryNavItemIndex +')').addClass("item-clicked item-over");
				}
	
				thumbnialShowHide("hide");
				
				return updateGalleryContent(galleryNavItemIndex);
	
}


function  updateStage(itemID, id){
	
	updateItemState();
		
		cursorDefaultHand("cursorDefault", itemID);
		itemID.addClass("item-clicked item-over");
		
		return updateGalleryContent(id);
}

function updateGalleryContent(id){
	
		//Content - Update
		updateContent(id);
	
		//Content - Container Size
		descriptionSizeAnim();
		
		//Image - Load
		loadImage(id);
}

function updateContent(id){
		$("#photo-gallery-title").html(contentArray[id].title);
		$("#photo-gallery-description-txt").html(contentArray[id].description);
}

function updateItemState(id){
	
	$("#item-container").children().each(function(key, value) { 
		var $this =  $(this);
		
		if(id != key){
			$this.removeClass('item-clicked item-not-active item-over');
			$this.addClass("item-active");
			 cursorDefaultHand("cursorHand", $this);
		}
});
}

function navItemOver(evt){

	var containerID = $(evt.target).parent().attr("id");
	
	var itemID = $(evt.target);
	var id = itemID.index();
	
	
	if(containerID == "item-container" && 
	   evt.type == "mouseover" && 
	   !itemID.hasClass("item-clicked")){
		
		$(evt.target).addClass("item-over");
		
		//Add thumb image
		$("#thumbnail-container").html(thumbImageArray[id]);
		
		var thumbnailW = $("#thumbnail-container").outerWidth() / 4;
		var value = ($(evt.target).position().left - thumbnailW) + ($("#item-container").position().left + $("#item-container-mask").position().left); 
		
		imageHeightWidth();
		
		$("#thumbnail-container").stop(true, true).css({left:value + "px"}).show("scale",  {origin:['bottom','center']}, 250);
	
	}
	
	if(containerID == "item-container" &&
	   evt.type == "mouseout" && 
	   !itemID.hasClass("item-clicked")){
		
		$(evt.target).removeClass("item-over");
		imageHeightWidth();
		thumbnialShowHide("hide");
	}
}

function thumbnialShowHide(action){
	
		action == "hide" ? $("#thumbnail-container").stop(true, true).hide() : "";
}

function imageHeightWidth(){
	
	$("#thumbnail-container").children().css({width:"61px", height:"61px"});
}

function loadImage(id){
	
	var _url = contentArray[id].image;
	
	// set up the node / element
	_im =$("<img>");
	
	// hide and bind to the load event
	_im.hide();
	
	_im.bind("load",function(){ 
		 var $this = $(this);			 
		imageFadeIn($this);
	 });
	
	// append to target node / element
	$('#photo-gallery-img').append(_im);
	
	// set the src attribute now, after insertion to the DOM
	_im.attr('src',_url);

}

function imageFadeIn($this){
	
	$this.fadeIn(function(){
								 
		if($('.photo-gallery img').length > 2){
			$('#photo-gallery-img img:eq(0)').remove();
		}
					
	});
}

/***********************************************************************************
* 							Header: Build
***********************************************************************************/

function buildGalleryImage(){
	$('#photo-gallery-stage').append('<div id="photo-gallery-img"></div>');
	return buildGalleryDescription();
}
function buildGalleryDescription(){
	$("#photo-gallery-stage").append('<div id="photo-gallery-description"><div id="photo-gallery-description-txt">' + contentArray[0].description + '</div></div>');
	return buildGalleryHeader();
}

function buildGalleryHeader(){
	$("#photo-gallery-header").append('<div id="photo-gallery-title">' + contentArray[0].title + '</div><div id="photo-gallery-description-btn" class="cursor-hand">HIDE CAPTION</div>');
	$("#photo-gallery-description-btn").bind("click", descriptionBtnClick);
}


/***********************************************************************************
* 							Button: Description Toggle
***********************************************************************************/

function getButtonLabel(){
	
	return $("#photo-gallery-description-btn").text();
}


function descriptionBtnClick(evt){
	
	var label = getButtonLabel() == "HIDE CAPTION" ? "SHOW CAPTION" : "HIDE CAPTION";
	
	$("#photo-gallery-description-btn").text(label);
	
	 descriptionSizeAnim();
}


function descriptionSizeAnim(){

	var descriptionH = "HIDE CAPTION" == getButtonLabel() ? $("#photo-gallery-description-txt").outerHeight(true) : 0;
	var duration = 400;
	var easing = 'easeOutCubic';

	 $("#photo-gallery-description").stop(true, true).animate({height:descriptionH}, {
    easing: easing,
    duration: duration
	});
}

/***********************************************************************************
* 							Plugin: Photo Gallery
***********************************************************************************/

$.fn.photoGallery = function(params) {

// merge default and parameters  
params = $.extend({content: []}, params);  
		
contentArray =  params.content;

intialize(contentArray);


 	return this;
}

})(jQuery);