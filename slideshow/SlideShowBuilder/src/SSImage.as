package src {
	import flash.display.Bitmap;
	import flash.display.BitmapData;
	import flash.display.Loader;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.geom.Matrix;
	import flash.geom.Rectangle;
	import flash.net.URLRequest;
	import flash.events.IOErrorEvent;
	import src.BuilderEvents.BuilderEvent;
	import flash.display.PixelSnapping;
	
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
			dispatchEvent(new BuilderEvent(BuilderEvent.IMAGEREADY));
		}
		
		public function imageSize():Array {
			var dimensions:Array = [imageBmp.width, imageBmp.height];
			return dimensions;
		}
		
	public function fitImageProportionally( ARG_object:SSImage, ARG_width:Number, ARG_height:Number, ARG_center:Boolean = true, ARG_fillBox:Boolean = true ):Bitmap {
 
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