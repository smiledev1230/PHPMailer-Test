package src {
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.display.Graphics;
	import flash.display.GraphicsGradientFill;
	import flash.display.GradientType;
	import flash.display.SpreadMethod;
	import flash.display.InterpolationMethod;
	import flash.display.GraphicsSolidFill;
	import flash.display.GraphicsEndFill;
	import flash.events.Event;
	import flash.geom.Matrix;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.utils.Timer;
	import flash.events.TimerEvent;
	import src.SlideShowEvents.SlideShowEvent;
	import flash.events.MouseEvent;
	import src.SSImage;
	import com.gskinner.motion.GTween;
	import com.gskinner.motion.easing.Sine;
	import flash.net.*;
	
	public class SSObject extends Sprite {
		
		private var allowN:String;
		private var alignament:String;
		private var navType:int;
		private var slideshowpositionX:Number;
		private var slideshowpositionY:Number;
		
		public var type:int;
		public var highlight:int;
		public var title:String;
		public var prefix:String;
		public var content:String;
		public var resize:String;
		public var navURL:String;
		
		private var nativeWidth:int;
		private var nativeHeight:int;
		private var userWidth:int;
		private var userHeight:int;
		private var my_bg:flash.display.Shape;
		
		private var image:SSImage;
		private var title_tf:TextField;
		private var title_tformat: TextFormat;
		private var text_tf:TextField;
		private var text_tformat:TextFormat;
		
		private var zoomTweenBG:GTween;
		private var zoomTweenImg:GTween;
		
		private var objectTimer = new Timer(10);
		
		// Object property that enables the object to have neighbors on the same column
		public function set allowNeighbors(s:String):void { allowN = s; }
		public function get allowNeighbors():String { return allowN; }
		
		// Object property that determines the vertical alignament of the object
		public function set align(a:String):void { alignament = a; }
		public function get align():String { return alignament; }
		
		// Object property that determines the navigation type on click (0 for same window, 1 for new window or tab depending on the user's browser)
		public function set navigation(nav:int):void { navType = nav; }
		public function get navigation():int { return navType; }
		
		// Object property that stores the x coordinate in the slideshow
		public function set ssPosX(ssX:Number):void { slideshowpositionX = ssX; }
		public function get ssPosX():Number { return slideshowpositionX; }
		
		// Object property that stores the y coordinate in the slideshow
		public function set ssPosY(ssY:Number):void { slideshowpositionY = ssY; }
		public function get ssPosY():Number { return slideshowpositionY; }
		
		public function SSObject(type:int, highlight:int, title:String, prefix:String, content:String, resize:String, navURL:String) {
			this.type = type;
			this.highlight = highlight;
			this.title = title;
			this.prefix = prefix;
			this.content = prefix+content;
			this.resize = resize;
			this.navURL = navURL;
			this.buttonMode = true;
			if (type != 1) loadImage();
				else calcObjectSize();
		}
		
		private function loadImage():void {
			image = new SSImage(content);
			image.addEventListener(SlideShowEvent.IMAGEREADY, imageLoaded);
		}
		
		private function imageLoaded(e:Event):void {
			var dim:Array = image.imageSize();
			nativeWidth = dim[0];
			nativeHeight = dim[1];
			calcObjectSize();
		}
		
		private function calcObjectSize():void {
			if (resize.length > 1) { userWidth = (resize.split("x"))[0]; userHeight = (resize.split("x")[1]); }
				else {
					if (type == 1) { userWidth = 200; userHeight = 190; }
						else {
							if (resize == "0") {
											var raport: Number = Math.max((nativeWidth / 810), (nativeHeight / 450));
											userWidth = nativeWidth / raport;
											userHeight = nativeHeight / raport;
											}
								else {
									if (resize == "1") {
										userWidth = nativeWidth;
										userHeight = nativeHeight;
										}
										else {
											if (resize == "2") {
												var max_raport: Number = Math.max((nativeWidth / 810), (nativeHeight / 450));
												var min_raport: Number = nativeWidth / 200;
												var random_raport = Math.random() * (min_raport - max_raport + 1) + max_raport;
												userWidth = nativeWidth / random_raport;
												userHeight = nativeHeight / random_raport;
												}
											}
									}
							}
					}
			buildObjectBackground();
		}
		
		private function buildObjectBackground():void {
			my_bg = new Shape();
			var gtype:String = GradientType.LINEAR;
			var matrix:Matrix = new Matrix();
			matrix.createGradientBox(200, 190, Math.PI/2, 0, 0);
			if (type == 1) {		// the following block of code draws the text type object background
				var colors:Array;
				if (highlight) colors = [0xf8d212, 0xf8f010];
					else colors = [0xcccccc, 0xeeeeee];
				var alphas:Array = [1, 1];
				var gratios:Array = [0, 255];
				my_bg.graphics.lineStyle(1, 0x000000, 0);
				my_bg.graphics.beginGradientFill(gtype,colors,alphas,gratios,matrix);
				my_bg.graphics.moveTo(0, 5);
				my_bg.graphics.lineTo(0, userHeight - 15);
				my_bg.graphics.curveTo(0,userHeight - 10,5,userHeight - 10);
				my_bg.graphics.lineTo(userWidth - 40, userHeight - 10);
				my_bg.graphics.lineTo(userWidth - 30, userHeight);
				my_bg.graphics.lineTo(userWidth - 20, userHeight - 10);
				my_bg.graphics.lineTo(userWidth-5, userHeight - 10);
				my_bg.graphics.curveTo(userWidth,userHeight-10,userWidth,userHeight-15);
				my_bg.graphics.lineTo(userWidth, 5);
				my_bg.graphics.curveTo(userWidth,0,userWidth-5,0);
				my_bg.graphics.lineTo(5, 0);
				my_bg.graphics.curveTo(0,0,0,5);
				my_bg.graphics.endFill();				
				}
				else {			//the following block of code draws the image type object background
					my_bg.graphics.beginFill(0xffffff, 1);
					my_bg.graphics.drawRect(0, 0, userWidth+20, userHeight+20);
					my_bg.graphics.endFill();
					}
			addChild(my_bg);
			addContent();	
		}
		
		private function addContent():void {
			if (type == 1) {
				title_tf = new TextField();
				text_tf = new TextField();
				var viewmore_tf:TextField = new TextField();
				
				title_tf.text = title;
				if (highlight) { title_tf.textColor = 0x003399; text_tf.textColor = 0x0066ff; viewmore_tf.textColor = 0x0066ff; }
					else { title_tf.textColor = 0x000000; text_tf.textColor = 0x666666; viewmore_tf.textColor = 0x666666; }
				title_tf.x = 10;
				title_tf.y = 10;
				title_tf.selectable = false;
				addChild(title_tf);
				
				text_tf.multiline = true;
				text_tf.wordWrap = true;
				text_tf.width = userWidth - 20;
				text_tf.text = content;
				text_tf.x = 10;
				text_tf.y = 30;
				text_tf.selectable = false;
				addChild(text_tf);
				
				viewmore_tf.text = "View More";
				viewmore_tf.selectable = false;
				viewmore_tf.x = 10;
				viewmore_tf.y = userHeight - 20 - viewmore_tf.textHeight;
				addChild(viewmore_tf);
				viewmore_tf.addEventListener(MouseEvent.CLICK, goToURL);
				}
				else {
					image.width = userWidth;
					image.height = userHeight;
					image.x = image.y = 10;
					addChild(image);
					
					if (type == 2) {					
						}
						else addEventListener(MouseEvent.CLICK, goToURL);
					}
			objectTimer.addEventListener(TimerEvent.TIMER, fireObjectReady);
			objectTimer.start();
		}
		
		private function fireObjectReady(e:TimerEvent):void {
			objectTimer.stop();
			dispatchEvent(new Event(SlideShowEvent.OBJECTREADY));
			}
		
		private function goToURL(e:MouseEvent):void {
			if (navType) navigateToURL(new URLRequest(navURL), "_self");
				else navigateToURL(new URLRequest(navURL), "_blank");
		}
		
	}
}