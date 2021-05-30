package src {
	import flash.display.Bitmap;
	import flash.display.Loader;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.net.URLRequest;
	import flash.events.IOErrorEvent;
	import src.SlideShowEvents.SlideShowEvent;
	
	public class SSImage extends Sprite {
		
		private var l:Loader;
		private var myLink:String;
		private var imageBmp:Bitmap;
		
		public var nativeWidth:int;
		public var nativeHeight:int;
		
		public function SSImage(myLink:String) {
			this.myLink = myLink;
			init();
		}
		
		private function init():void {
			l = new Loader();
			l.load(new URLRequest(myLink));
			l.contentLoaderInfo.addEventListener(Event.COMPLETE, imageLoaded);
			l.contentLoaderInfo.addEventListener(IOErrorEvent.IO_ERROR, imageLoadingError);
		}
		
		private function imageLoadingError(e:IOErrorEvent):void {
			trace('my link: ' + myLink);
			trace("Error loading image");
		}
		
		private function imageLoaded(e:Event):void {
			imageBmp = new Bitmap(e.currentTarget.content.bitmapData);
			imageBmp.smoothing = true;
			addChild(imageBmp);
			nativeWidth = imageBmp.width;
			nativeHeight = imageBmp.height;
			fireImageReady();
		}
		
		private function fireImageReady():void {
			dispatchEvent(new Event(SlideShowEvent.IMAGEREADY));
		}
		
		public function imageSize():Array {
			var dimensions:Array = [imageBmp.width, imageBmp.height];
			return dimensions;
		}
	}
}