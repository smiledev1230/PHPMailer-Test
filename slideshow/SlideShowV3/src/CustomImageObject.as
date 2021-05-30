package src {
	import flash.display.Bitmap;
	import flash.display.BitmapData;
	import flash.geom.Matrix;
	import flash.display.PixelSnapping;
	import flash.geom.Rectangle;
	import flash.display.Loader;
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.IOErrorEvent;
	import flash.events.MouseEvent;
	import flash.net.URLRequest;
	import flash.net.navigateToURL;
	
	
	public class CustomImageObject extends Sprite {
		
		private var l:Loader;
		private var imgURL:String;
		private var _width:int;
		private var _height:int;
		private var navURL:String;
		
		private var imageBmp:Bitmap;
		private var croppedBmp:Bitmap;
		private var my_bg:Shape;
		
		
		public function CustomImageObject(myLink:String, _w:int, _h:int, iURL:String="") {
			imgURL = myLink;
			_width = _w;
			_height = _h;
			navURL = iURL;
			
			init();
		}
		
		private function init():void {
			l = new Loader();
			l.load(new URLRequest(imgURL));
			l.contentLoaderInfo.addEventListener(Event.COMPLETE, imageLoaded);
			l.contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, imageLoadingError);
		}
		
		private function imageLoadingError(e:IOErrorEvent):void {
			trace("Error loading image");
		}
		
		private function imageLoaded(e:Event):void {
			imageBmp = new Bitmap(e.currentTarget.content.bitmapData);
			imageBmp.smoothing = true;
			my_bg = new Shape();
			my_bg.graphics.beginFill(0xffffff, 1);
			my_bg.graphics.drawRect(0, 0, _width, _height);
			my_bg.graphics.endFill();
			this.addChild(my_bg);
			
			if (_width == 200 && _height == 120) croppedBmp = fitImageProportionally(imageBmp, _width - 20, _height - 20, true, true);
				else croppedBmp = fitImageProportionally(imageBmp, _width - 40, _height - 40, true, true);
			croppedBmp.x = (my_bg.width - croppedBmp.width) / 2;
			croppedBmp.y = (my_bg.height - croppedBmp.height) / 2;
			this.addChild(croppedBmp);
			if (navURL.length > 7) this.buttonMode = true;
			this.addEventListener(MouseEvent.MOUSE_DOWN, goToURL);
		}
		
		private function goToURL(e:MouseEvent):void {
			if (navURL.length > 7) navigateToURL(new URLRequest(navURL), "_blank");
		}
		
		public function fitImageProportionally( ARG_object:Bitmap, ARG_width:Number, ARG_height:Number, ARG_center:Boolean = true, ARG_fillBox:Boolean = true ):Bitmap {
 
			var tempW:Number = ARG_object.width;
			var tempH:Number = ARG_object.height;
		 
			ARG_object.width = ARG_width;
			ARG_object.height = ARG_height;
		 
			var scale:Number = (ARG_fillBox) ? Math.max(ARG_object.scaleX, ARG_object.scaleY) : Math.min(ARG_object.scaleX, ARG_object.scaleY);
		 
			ARG_object.width = tempW;
			ARG_object.height = tempH;
		 
			var scaleBmpd:BitmapData = new BitmapData(ARG_object.width * scale, ARG_object.height * scale);
			var scaledBitmap:Bitmap = new Bitmap(scaleBmpd, PixelSnapping.ALWAYS, true);
			var scaleMatrix:Matrix = new Matrix();
			scaleMatrix.scale(scale, scale);
			scaleBmpd.draw( ARG_object, scaleMatrix );
		 
			if (scaledBitmap.width > ARG_width || scaledBitmap.height > ARG_height) {
		 
				var cropMatrix:Matrix = new Matrix();
				var cropArea:Rectangle = new Rectangle(0, 0, ARG_width, ARG_height);
		 
				var croppedBmpd:BitmapData = new BitmapData(ARG_width, ARG_height);
				var croppedBitmap:Bitmap = new Bitmap(croppedBmpd, PixelSnapping.ALWAYS, true);
		 
				if (ARG_center) {
					var offsetX:Number = Math.abs((ARG_width -scaleBmpd.width) / 2);
					var offsetY:Number = Math.abs((ARG_height - scaleBmpd.height) / 2);
		 
					cropMatrix.translate(-offsetX, -offsetY);
				}
		 
				croppedBmpd.draw( scaledBitmap, cropMatrix, null, null, cropArea, true );
				return croppedBitmap;
		 
			} else {
				return scaledBitmap;
			}
		}
		
	}
}