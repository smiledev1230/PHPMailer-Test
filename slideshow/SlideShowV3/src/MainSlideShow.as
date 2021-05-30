package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.IOErrorEvent;
	import flash.geom.Rectangle;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.text.TextField;
	import src.Preloader;
	import src.SlideShowEvents.SlideShowEvent;
	import flash.filters.DropShadowFilter;
	import flash.ui.Mouse;
	import flash.ui.MouseCursor;
	import flash.display.LoaderInfo;
	
	public class MainSlideShow extends Sprite {
		
		private var preloader:Preloader;
		
		private var xmlLoader:URLLoader;
		private var xmlURL:String = "slideshowplaylist.xml";
		private var slideshowXML:XML;
		private var items:Array;
		private var slideshowElements:Array=new Array();
		private var copies:Array;
		private var loadedItems:int = 0;
		private var xmlSpeed:int;
		private var navtype:int;
		private var chrono_order:Boolean;
		private var custpos:Boolean;
		
		private var colLoader:URLLoader;
		private var colURL:String = "columns.xml";
		private var columnsXML:XML;
		private var columns:Array;
		private var prefix:String = "";
		
		private var itemsContainer:Sprite;
		private var copyContainer:Sprite;
		private var containerWidth:Number;
		private var componentWidth:Number;
		private var itemsHandler:MovieClip;
		private var copyHandler:MovieClip;
		private var paused:Boolean = false;
		private var speed:int;
		private var cursor:Cursor;
		private var activeCursor:Boolean = false;
		private var activeDragging:Boolean = false;
		private var initDragXValue:Number;
		private var initDragX:Number;
		private var finalDragXValue:Number;
		private var finalSpeed:Number=0;
		private var velocity:Number = 0.96;
		private var mouseSpeed:MouseSpeed=new MouseSpeed()
		private var offsetX:Number;
		private var dragTimer:Number;
		private var currentContainer:Sprite;
				
		public function MainSlideShow() {
			this.root.loaderInfo.addEventListener(Event.COMPLETE, loadParam); 
		}
		
		private function loadParam(evt:Event):void {
			var prefix = String(LoaderInfo(this.root.loaderInfo).parameters.SSROOT);
			preloader = new Preloader();
			preloader.x = stage.stageWidth / 2;
			preloader.y = stage.stageHeight / 2;
			addChild(preloader);
			preloader.startLoading();
			loadXML();
		}
		
		private function loadXML():void {
			xmlLoader = new URLLoader();
			xmlLoader.load(new URLRequest(prefix + xmlURL+"?time=" + new Date().getTime()));
			//xmlLoader.load(new URLRequest(xmlURL));
			xmlLoader.addEventListener(Event.COMPLETE, XMLLoaded);
			xmlLoader.addEventListener(IOErrorEvent.IO_ERROR, XMLNotLoaded);
		}
		
		private function XMLNotLoaded(e:IOErrorEvent):void {
			trace("XML file not found");
		}
		
		private function XMLLoaded(e:Event):void {
			slideshowXML = XML(e.currentTarget.data);
			items = new Array();
			copies = new Array();
			xmlSpeed = int(slideshowXML.children()[0].children()[0]);
			speed = xmlSpeed;
			
			if (slideshowXML.children()[0].children()[1] == "0") chrono_order = false;
				else chrono_order = true;
			
			navtype = int(slideshowXML.children()[0].children()[2]);
			
			if (slideshowXML.children()[0].children()[4] == "0") custpos = false;
				else custpos = true;
			
			var currentObject:SSObject;
			var currentObjectCopy:SSObject;
			
			for (var i:int = 0; i < slideshowXML.children()[1].children().length(); i++ ) {
				var itm_type:int = int(slideshowXML.children()[1].children()[i].children()[0]);
				var itm_highl:int = int(slideshowXML.children()[1].children()[i].children()[1]);
				var itm_title:String = String(slideshowXML.children()[1].children()[i].children()[2]);
				var itm_content:String = String(slideshowXML.children()[1].children()[i].children()[3]);
				var itm_resize:String = String(slideshowXML.children()[1].children()[i].children()[4]);
				var itm_navURL:String = String(slideshowXML.children()[1].children()[i].children()[5]);
				currentObject = new SSObject(itm_type, itm_highl, itm_title, prefix, itm_content, itm_resize, itm_navURL);
				currentObjectCopy = new SSObject(itm_type, itm_highl, itm_title, prefix, itm_content, itm_resize, itm_navURL);
				currentObject.addEventListener(SlideShowEvent.OBJECTREADY, handleObjectReady);
				items.push(currentObject);
				copies.push(currentObjectCopy);
				currentObject.allowNeighbors = slideshowXML.children()[1].children()[i].children()[6];
				currentObject.align = slideshowXML.children()[1].children()[i].children()[7];
				currentObject.navigation = navtype;
				currentObjectCopy.allowNeighbors = slideshowXML.children()[1].children()[i].children()[6];
				currentObjectCopy.align = slideshowXML.children()[1].children()[i].children()[7];
				currentObjectCopy.navigation = navtype;
				}
			
		}
		
		private function handleObjectReady(e:Event):void {
			loadedItems++;
			if (loadedItems == items.length) {
				preloader.stopLoading();
				preloader.visible = false;
				if (!custpos) buildSlideShow();
					else fetchColumns();
			}
		}
		
		private function buildSlideShow():void {
			var nextAvailableX:Number = 10;
			var nextAvailableY:Number = 10;
			var heightLeft:Number = stage.stageHeight - 20;
			var columnWidth:Number = 0;
			itemsContainer = new Sprite();
			copyContainer = new Sprite();
			addChild(itemsContainer);
			addChild(copyContainer);
			
			itemsHandler = new Transparent_Bg();
			copyHandler = new Transparent_Bg();
			itemsContainer.addChild(itemsHandler);
			copyContainer.addChild(copyHandler);
			
			for (var i:int = 0; i < items.length; i++ ) {
				if (items[i].allowNeighbors == true)
					if (heightLeft >= items[i].height) { 
														items[i].x = nextAvailableX; 
														items[i].y = nextAvailableY; 
														copies[i].x = nextAvailableX; 
														copies[i].y = nextAvailableY; 
														nextAvailableY += items[i].height+20;
														itemsContainer.addChild(items[i]);
														copyContainer.addChild(copies[i]);
														if (items[i].width > columnWidth) columnWidth = items[i].width;
														}
					else {
						nextAvailableX += columnWidth + 20;
						nextAvailableY = 10;
						columnWidth = 0;
						heightLeft = stage.stageHeight - 20;
						items[i].x = nextAvailableX; 
						items[i].y = nextAvailableY; 
						copies[i].x = nextAvailableX; 
						copies[i].y = nextAvailableY; 
						nextAvailableY += items[i].height;
						itemsContainer.addChild(items[i]);
						copyContainer.addChild(copies[i]);
						columnWidth = items[i].width;
						}
				else {
					nextAvailableX += columnWidth + 20;
					nextAvailableY = 10;
					columnWidth = 0;
					items[i].x = nextAvailableX;
					copies[i].x = nextAvailableX;
					switch (items[i].align) {
						case "UP": nextAvailableY = 10;
						break;
						case "DOWN": nextAvailableY = stage.stageHeight - 10 - items[i].height ;
						break;
						case "CENTER": nextAvailableY = (stage.stageHeight - items[i].height) / 2;
						break;
						case "RANDOM": nextAvailableY = Math.random() * (stage.stageHeight - items[i].height - 20) + 10;
						break;
						}
					items[i].y = nextAvailableY;
					copies[i].y = nextAvailableY;
					itemsContainer.addChild(items[i]);
					copyContainer.addChild(copies[i]);
					nextAvailableX += items[i].width+20;
					nextAvailableY = 10;
					heightLeft = stage.stageHeight - 20;
					}
			}
			copyContainer.x = itemsContainer.x - itemsContainer.width - 10;
			itemsHandler.width = copyHandler.width = containerWidth + 10;
			itemsHandler.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOverBG);
			itemsHandler.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOutBG);
			itemsContainer.addEventListener(MouseEvent.MOUSE_DOWN, handleMouseDown);
			copyHandler.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOverBG);
			copyHandler.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOutBG);
			copyContainer.addEventListener(MouseEvent.MOUSE_DOWN, handleMouseDown);
			
			cursor = new Cursor();
			addChild(cursor);
			cursor.visible = false;
			
			startMoving();
		}
		
		private function fetchColumns():void {
			colLoader = new URLLoader();
			colLoader.load(new URLRequest(prefix + colURL+"?time=" + new Date().getTime()));
			//colLoader.load(new URLRequest(colURL));
			colLoader.addEventListener(Event.COMPLETE, colLoaded);
			colLoader.addEventListener(IOErrorEvent.IO_ERROR, colNotLoaded);
		}
		
		private function colNotLoaded(e:IOErrorEvent):void {
			trace("columns.xml could not be loaded!!");
		}
		
		private function colLoaded(e:Event):void {
			containerWidth = 0;
			columnsXML = XML(e.currentTarget.data);
			itemsContainer = new Sprite();
			copyContainer = new Sprite();
			slideshowElements = new Array();
			addChild(itemsContainer);
//			addChild(copyContainer);
			
			itemsHandler = new Transparent_Bg();
			//copyHandler = new Transparent_Bg();
			itemsContainer.addChild(itemsHandler);
			//copyContainer.addChild(copyHandler);
			
			var numberOfAdds:int = 0;
			var numberOfUniqueElements:int = 0;
			
			for (var i:int = 0; i < columnsXML.children().length(); i++ ) {
				for (var j:int = 1; j <  columnsXML.children()[i].children().length(); j++ ) {
					var size:Number = Number(columnsXML.children()[i].children()[j].children()[1]) + Number(columnsXML.children()[i].children()[j].children()[3]);
					if(int(columnsXML.children()[i].children()[j].children()[0])!=1) trace('poza size: ' + Number(columnsXML.children()[i].children()[j].children()[3]));
					if(size > containerWidth) containerWidth = size;
				}
			}
			
			trace('cont width: ' + containerWidth);
			numberOfAdds = Math.ceil(3 * stage.stageWidth / containerWidth);
			trace('number of adds: ' + numberOfAdds);
			var finalContWidth:Number = 0;
			
			for ( i = 0; i < columnsXML.children().length(); i++ ) {
				for ( j = 1; j <  columnsXML.children()[i].children().length(); j++ ) {
					//trace(columnsXML.children()[i].children()[j].children()[0]);
					numberOfUniqueElements++;
					var id:int = columnsXML.children()[i].children()[j].children()[0];
					var _x:int = columnsXML.children()[i].children()[j].children()[1];
					var _y:int = columnsXML.children()[i].children()[j].children()[2];
					var _width:int = columnsXML.children()[i].children()[j].children()[3];
					var _height:int = columnsXML.children()[i].children()[j].children()[4];
					
					for (var k:int = 0; k < numberOfAdds; k++ ){
						if (items[id].type == 1) {
							var tItem:CustomTextObject = new CustomTextObject(items[id].highlight, items[id].title, items[id].content, items[id].navURL);
							//var tItemCopy:CustomTextObject = new CustomTextObject(items[id].highlight, items[id].title, items[id].content, items[id].navURL);
							itemsContainer.addChild(tItem);
							//copyContainer.addChild(tItemCopy);
							tItem.x = _x + containerWidth*k;
							tItem.y = _y;
							slideshowElements.push(tItem);
							if ((tItem.x + tItem.width) > finalContWidth) finalContWidth = tItem.x + tItem.width;
							//trace('slideshowElements updated... current length: ' + slideshowElements.length);
							//tItemCopy.x = _x;
							//tItemCopy.y = _y;
							//if(iItem.x + iItem.width > containerWidth) containerWidth = tItem.x + tItem.width;
							}
							else {
								var iItem:CustomImageObject = new CustomImageObject(prefix+String(items[id].content), _width, _height, items[id].navURL);
								//var iItemCopy:CustomImageObject = new CustomImageObject(items[id].content, _width, _height, items[id].navURL);
								itemsContainer.addChild(iItem);
								//copyContainer.addChild(iItemCopy);
								iItem.x = _x + containerWidth*k;
								iItem.y = _y;
								slideshowElements.push(iItem);
								if ((iItem.x + iItem.width) > finalContWidth) finalContWidth = iItem.x + iItem.width;
								trace('slideshowElements updated... current length: ' + slideshowElements.length);
								//iItemCopy.x = _x;
								//iItemCopy.y = _y;
								//if(iItem.x + iItem.width > containerWidth) containerWidth = iItem.x + iItem.width;
								}
					}
				}
			}
			//trace('number of unique elements: ' + numberOfUniqueElements);	
			//trace('number of elements in slideshow: ' + slideshowElements.length);
			//copyContainer.x = itemsContainer.x + containerWidth + 10;
			//trace('contWidth: ' + itemsContainer.width + ' actualWidth: ' + (containerWidth + 10) * numberOfAdds);
			trace('calcWidth: ' + finalContWidth);
			itemsContainer.width = finalContWidth;
			componentWidth = finalContWidth;
			itemsContainer.x=(stage.stageWidth-finalContWidth)/2;
			//itemsHandler.width = finalContWidth;
			itemsHandler.width = containerWidth*numberOfAdds;
			itemsHandler.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOverBG);
			itemsHandler.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOutBG);
			itemsContainer.addEventListener(MouseEvent.MOUSE_DOWN, handleMouseDown);
			//copyHandler.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOverBG);
			//copyHandler.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOutBG);
			//copyContainer.addEventListener(MouseEvent.MOUSE_DOWN, handleMouseDown);
			cursor = new Cursor();
			addChild(cursor);
			cursor.visible = false;
			
			startMoving();
		}
		
		private function startMoving():void {
			speed = xmlSpeed;
			paused = false;
			var ds_filter:DropShadowFilter = new DropShadowFilter(5, 0, 0x333333, 0.8, 20, 20, 0.8, 1, false, false, false);
			itemsContainer.addEventListener(Event.ENTER_FRAME, moveSS);
			
			for (var i:int = 0; i < slideshowElements.length; i++ ) {
				if (slideshowElements[i].height != 191) { 
					slideshowElements[i].addEventListener(MouseEvent.ROLL_OVER, handleRollOver); 
					slideshowElements[i].addEventListener(MouseEvent.ROLL_OUT, handleRollOut); 
					slideshowElements[i].filters = new Array(ds_filter); 
					}
			}
		}
		
		private function handleRollOver(e:MouseEvent):void {
			e.currentTarget.x -= 10;
			e.currentTarget.y -= 10;
			e.currentTarget.width += 20;
			e.currentTarget.height += 20;
		}
		
		private function handleRollOut(e:MouseEvent):void {
			e.currentTarget.x += 10;
			e.currentTarget.y += 10;
			e.currentTarget.width -= 20;
			e.currentTarget.height -= 20;
		}
		
		private function moveSS(e:Event):void {
			if (activeDragging) {
				itemsContainer.x = mouseX - offsetX;
				}
				
			if (finalSpeed != 0) {
				speed = int(finalSpeed);
				finalSpeed = finalSpeed * (velocity);
				}
			if (speed) {
				if (speed > 0) {
					for (var i:int = 0; i < slideshowElements.length; i++ ) {
						slideshowElements[i].x -= speed;
						if (slideshowElements[i].x < -440) slideshowElements[i].x += itemsHandler.width;
						}
					}
					else {
						for (var i:int = 0; i < slideshowElements.length; i++ ) {
						slideshowElements[i].x -= speed;
						if (slideshowElements[i].x > itemsHandler.width-440) slideshowElements[i].x -= itemsHandler.width;
						}
						}
			}
		}
		
		private function handleMouseOverBG(e:MouseEvent):void {
			Mouse.hide();
			cursor.visible = true;
			cursor.x = stage.mouseX + 10;
			cursor.y = mouseY - 10;
			itemsHandler.addEventListener(MouseEvent.MOUSE_MOVE, handleMouseMove);
			//copyHandler.addEventListener(MouseEvent.MOUSE_MOVE, handleMouseMove);
		}
		
		private function handleMouseOutBG(e:MouseEvent):void {
			Mouse.show();
			cursor.visible = false;
			itemsHandler.removeEventListener(MouseEvent.MOUSE_MOVE, handleMouseMove);
			//copyHandler.removeEventListener(MouseEvent.MOUSE_MOVE, handleMouseMove);
		}
		
		private function handleMouseMove(e:MouseEvent):void {
			cursor.x = stage.mouseX + 10;
			cursor.y = mouseY - 10;
		}
		
		private function handleMouseDown(e:MouseEvent):void {
			
			activeDragging = true;
			speed = 0;
			initDragXValue = itemsContainer.x;
			offsetX = mouseX - itemsContainer.x;
			//trace('onDown - contX: ' + itemsContainer.x);
			stage.addEventListener(MouseEvent.MOUSE_UP, handleMouseUp);
			//trace(' - down - elem 0.x: ' + slideshowElements[0].x);
		}
		
		private function handleMouseUp(e:MouseEvent):void {
			//trace('contWidth onUp: ' + itemsContainer.width);
			//trace('onUp - contX: ' + itemsContainer.x);
			
			activeDragging = false;
			finalDragXValue = itemsContainer.x;
			itemsContainer.x=(stage.stageWidth-componentWidth)/2;
			initDragX = finalDragXValue-initDragXValue;
			//trace('draggedDistance: ' + initDragX);
			if (int(Math.sqrt(Math.pow(initDragX, 2))) < 10 ) {
				if (paused) {
					paused = false;
					speed = xmlSpeed;
					finalSpeed = 0;
					cursor.cursorText = "Pause";
					}
					else {
						paused = true;
						speed = 0;
						finalSpeed = 0;
						cursor.cursorText = "Play";
						}
			}

			reposition(initDragX*(-1));
			stage.removeEventListener(MouseEvent.MOUSE_UP, handleMouseUp);
			finalSpeed = mouseSpeed.getXSpeed()*-1;
			trace('final speed: ' + finalSpeed);
		}
		
		private function reposition(offset:Number):void {
			//trace('intra reposition cu offset: ' + offset);
			if (offset > 0) {
					for (var i:int = 0; i < slideshowElements.length; i++ ) {
						slideshowElements[i].x -= offset;
						if (slideshowElements[i].x < -440) slideshowElements[i].x += itemsHandler.width;
						}
					}
					else 
						if(offset<0){
						for (var i:int = 0; i < slideshowElements.length; i++ ) {
						slideshowElements[i].x -= offset;
						if (slideshowElements[i].x > itemsHandler.width-440) slideshowElements[i].x -= itemsHandler.width;
						}
						}
		}
	}
}