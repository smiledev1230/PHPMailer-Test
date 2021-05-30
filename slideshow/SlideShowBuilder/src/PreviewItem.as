package src {
	import flash.display.Sprite;
	import flash.display.Shape;
	import flash.display.Graphics;
	import flash.display.GraphicsGradientFill;
	import flash.display.GradientType;
	import flash.display.SpreadMethod;
	import flash.events.Event;
	import flash.geom.Matrix;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import src.BuilderEvents.BuilderEvent;
	
	public class PreviewItem extends Sprite {
		
		private var type:String;
		private var highlight:String;
		private var title:String;
		private var content:String;
		
		private var titleTF:TextField;
		private var titleFormat:TextFormat;
		private var contentTF:TextField;
		private var contentFormat:TextFormat;
		private var image:SSImage;
		private var itemId:int;
		
		public function get indice():int { return itemId; }
		public function set indice(ind:int) { itemId = ind; }
		
		public function PreviewItem(type:String, highlight:String, title:String, content:String) {
			this.type = type;
			this.highlight = highlight;
			this.title = title;
			this.content = content;
			init();
		}
		
		private function init():void {
			if (type == "1") buildTextObject();
				else loadImage();
		}
		
		private function buildTextObject():void {
			var background:Shape = new Shape();
			var gtype:String = GradientType.LINEAR;
			var matrix:Matrix = new Matrix();
			matrix.createGradientBox(200, 190, Math.PI / 2, 0, 0);
			var colors: Array;
			if (highlight=="1") colors = [0xf8d212, 0xf8f010];
				else colors = [0xcccccc, 0xeeeeee];
			var alphas:Array = [1, 1];
			var gratios:Array = [0, 255];
			background.graphics.lineStyle(1, 0x000000, 0);
			background.graphics.beginGradientFill(gtype,colors,alphas,gratios,matrix);
			background.graphics.moveTo(0, 5);
			background.graphics.lineTo(0, 190 - 15);
			background.graphics.curveTo(0,190 - 10,5,190 - 10);
			background.graphics.lineTo(200 - 40, 190 - 10);
			background.graphics.lineTo(200 - 30, 190);
			background.graphics.lineTo(200 - 20, 190 - 10);
			background.graphics.lineTo(200-5, 190 - 10);
			background.graphics.curveTo(200,190-10,200,190-15);
			background.graphics.lineTo(200, 5);
			background.graphics.curveTo(200,0,200-5,0);
			background.graphics.lineTo(5, 0);
			background.graphics.curveTo(0,0,0,5);
			background.graphics.endFill();
			
			this.addChild(background);
			
			var titleTF:TextField=new TextField();
			var titleFormat:TextFormat=new TextFormat();
			var contentTF:TextField = new TextField();
			var contentFormat:TextFormat = new TextFormat();
			var viewmoreTF:TextField = new TextField();
			var viewmoreFormat:TextFormat = new TextFormat();
			
			titleFormat.font = "Arial";
			titleFormat.bold = true;
			titleTF.defaultTextFormat = titleFormat;
			titleTF.text = title;
			//titleTF.autoSize = "left";
			titleTF.selectable = false;
			titleTF.x = titleTF.y = 10;
			titleTF.width = titleTF.textWidth + 4;
			this.addChild(titleTF);
			
			contentFormat.font = "Arial";
			contentTF.defaultTextFormat = contentFormat;
			contentTF.multiline = true;
			contentTF.wordWrap = true;
			contentTF.text = content;
			contentTF.selectable = false;
			contentTF.x = 10; 
			contentTF.y = 30;
			contentTF.width = 180;
			this.addChild(contentTF);
			
			viewmoreTF.defaultTextFormat = contentFormat;
			viewmoreTF.text = "View More";
			viewmoreTF.x = 10;
			viewmoreTF.y = 190 - viewmoreTF.textHeight - 20;
			viewmoreTF.multiline = false;
			viewmoreTF.height = 18;
			viewmoreTF.selectable = false;
			viewmoreTF.width = viewmoreTF.textWidth + 4;
			viewmoreTF.height = viewmoreTF.textHeight + 4;
			this.addChild(viewmoreTF);
			
		}
		
		private function loadImage():void {
			image = new SSImage(content);
			image.addEventListener(BuilderEvent.IMAGEREADY, imageLoaded);
		}
		
		private function imageLoaded(e:Event):void {
			var percent:Number = image.nativeWidth / image.nativeHeight;
			if (percent > 1) { image.width = 210; image.height = 210 / percent; }
				else { image.height = 180; image.width = 180 * percent; }
			var background:Shape = new Shape();
			background.graphics.beginFill(0xffffff, 1);
			background.graphics.drawRect(0, 0, image.width + 20, image.height + 20);
			background.graphics.endFill();
			this.addChild(background);
			
			image.x = 10;
			image.y = 10;
			this.addChild(image);
			this.x -= this.width / 2;
			this.y -= this.height / 2;
		}
	}
}