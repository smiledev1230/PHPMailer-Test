package src {
	import flash.display.Bitmap;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	import flash.events.Event;
	import src.BuilderEvents.BuilderEvent;
	import src.SSImage;
	import flash.display.Shape;
	import flash.geom.Matrix;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.display.GradientType;
	
	public class ColumnItem extends Sprite {
		
		private var ctype:int;
		private var mcoutCont:Sprite;
		private var mcOut:MovieClip;
		private var mcOver:MovieClip;
		private var image:SSImage;
		private var item:SSItem;
		private var objectId:int=-1;
		
		public function get itemType():int { return ctype; }
		
		public function get contentId():int { return objectId; }
		public function set contentId(i:int) { objectId = i; }
		
		public function ColumnItem(t:int) {
			this.ctype = t;
			this.buttonMode = true;
			init();
		}
		
		private function init():void {
			switch (ctype) {
				case 0: {
					mcOut = new Bt_Out();
					mcOver = new Bt_Over();
					}
				break;
				case 1: {
					mcOut = new St_Out();
					mcOver = new St_Over();
					}
				break;
				case 2: {
					mcOut = new Pt_Out();
					mcOver = new Pt_Over();
					}
				break;
				case 3: {
					mcOut = new Ta_Out();
					mcOver = new Ta_Over();
					}
				break;
			}
			mcoutCont = new Sprite();
			this.addChild(mcoutCont);
			mcoutCont.addChild(mcOut);
			this.addChild(mcOver);
			mcOver.visible = false;
			
			addEvents();
		}
		
		private function addEvents():void {
			this.addEventListener(MouseEvent.ROLL_OVER, handleRollOver);
			this.addEventListener(MouseEvent.ROLL_OUT, handleRollOut);
			this.addEventListener(MouseEvent.CLICK, handleClick);
		}
		
		private function handleRollOver(e:MouseEvent):void {
			mcoutCont.visible = false;
			trace('child width: ' + mcoutCont.getChildAt(0).width);
			trace('cont width: ' + mcoutCont.width);
			trace('over width: ' + mcOver.width);
			mcOver.visible = true;
		}
		
		private function handleRollOut(e:MouseEvent):void {
			mcoutCont.visible = true;
			mcOver.visible = false;
		}
		
		private function handleClick(e:MouseEvent):void {
			dispatchEvent(new BuilderEvent(BuilderEvent.LOADITEM));
		}
		
		public function appendItem(itm:SSItem):void {
			objectId = itm.id;
			item = itm;
			mcoutCont.removeChildAt(0);
			if (ctype == 3) {
				var prev:PreviewItem = new PreviewItem(item.type, item.highlight, item.title, item.content);
				//trace('ta width: ' + mcOver.width);
				prev.width = mcOver.width;
				prev.height = mcOver.height;
				
				mcoutCont.addChild(prev);
				//mcoutCont.width = mcOver.width;
				//mcoutCont.height = mcOver.height;
				}
				else loadImage();
		}
		
		public function removeItem():void {
			if (mcoutCont.getChildAt(0)) {
				mcoutCont.removeChildAt(0);
				}
			switch (ctype) {
				case 0: {
					mcOut = new Bt_Out();
					}
				break;
				case 1: {
					mcOut = new St_Out();
					}
				break;
				case 2: {
					mcOut = new Pt_Out();
					}
				break;
				case 3: {
					mcOut = new Ta_Out();
					}
				break;
			}
			mcoutCont.addChild(mcOut);
			objectId = -1;
		}
		
		private function loadImage():void {
			image = new SSImage(item.content);
			image.addEventListener(BuilderEvent.IMAGEREADY, imageLoaded);
		}
		
		private function imageLoaded(e:Event):void {
			
			var background:Shape = new Shape();
			background.graphics.beginFill(0xffffff, 1);
			background.graphics.drawRect(0, 0, mcOver.width, mcOver.height );
			background.graphics.endFill();
			mcoutCont.addChild(background);
			var cr_image:Bitmap;
			if (ctype == 0 || ctype == 2) { cr_image = image.fitImageProportionally(image,mcOver.width-20, mcOver.height-20,true,true); cr_image.x = cr_image.y = 10; }
			if (ctype == 1) {cr_image = image.fitImageProportionally(image,mcOver.width-10, mcOver.height-10,true,true); cr_image.x = cr_image.y = 5; }
			mcoutCont.addChild(cr_image);
		}
		
	}
}