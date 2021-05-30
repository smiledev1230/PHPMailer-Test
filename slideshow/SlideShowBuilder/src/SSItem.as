package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.media.Microphone;
	import flash.text.Font;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.utils.Timer;
	import flash.events.TimerEvent;
	import src.BuilderEvents.BuilderEvent;
	
	public class SSItem extends Sprite {
		
		private var allowN:String;
		private var alignament:String;
		private var navType:String;
		private var slideshowpositionX:Number;
		private var slideshowpositionY:Number;
		
		public var id:int;
		public var type:String;
		public var highlight:String;
		public var title:String;
		public var content:String;
		public var resize:String;
		public var navURL:String;
		private var sel:Boolean = false;
		
		private var itemTimer:Timer = new Timer(10);
		
		private var itemBg:MovieClip = new Playlist_Item_Bg();
		private var itemTF:TextField = new TextField();
		private var itemFormat:TextFormat = new TextFormat();
		
		// Object property that enables the object to have neighbors on the same column
		public function set allowNeighbors(s:String):void { allowN = s; }
		public function get allowNeighbors():String { return allowN; }
		
		// Object property that determines the vertical alignament of the object
		public function set align(a:String):void { alignament = a; }
		public function get align():String { return alignament; }
		
		// Object property that determines the navigation type on click (0 for same window, 1 for new window or tab depending on the user's browser)
		public function set navigation(nav:String):void { navType = nav; }
		public function get navigation():String { return navType; }
		
		// Object property that stores the x coordinate in the slideshow
		public function set ssPosX(ssX:Number):void { slideshowpositionX = ssX; }
		public function get ssPosX():Number { return slideshowpositionX; }
		
		// Object property that stores the y coordinate in the slideshow
		public function set ssPosY(ssY:Number):void { slideshowpositionY = ssY; }
		public function get ssPosY():Number { return slideshowpositionY; }
		
		public function set selected(s:Boolean):void { sel = s; }
		public function get selected():Boolean { return sel; }
		
		public function set ident(i:int):void { this.id = i; itemTF.text = "Item " + String(id); }
		
		public function set updateItem(updater:SSItem):void {
			this.type = updater.type;
			this.highlight = updater.highlight;
			this.title = updater.title;
			this.content = updater.content;
			this.resize = updater.resize;
			this.navURL = updater.navURL;
			}
		
		public function SSItem(id:int, type:String,highlight:String, title:String, content:String, resize:String, navURL:String) {
			this.id = id;
			this.type = type;
			this.highlight = highlight;
			this.title = title;
			this.content = content;
			this.resize = resize;
			this.navURL = navURL;
			this.buttonMode = true;
			
			buildPlaylistItem();
		}
		
		private function buildPlaylistItem():void {
			this.addChild(itemBg);
			
			itemFormat.font = "Arial";
			itemFormat.size = 12;
			itemFormat.color = 0xFFFFFF;
			itemTF.defaultTextFormat = itemFormat;
			itemTF.text = "Item " + String(id);
			itemTF.selectable = false;
			this.addChild(itemTF);
			
			var a:MovieClip = new Edit_Out();
			var b:MovieClip = new Edit_Over();
			var editBtn = new SSButton(a, b);
			editBtn.x = 55;
			this.addChild(editBtn);
			editBtn.addEventListener(MouseEvent.CLICK, fireEditItem);
			
			a = new Preview_Out();
			b = new Preview_Over();
			var previewBtn = new SSButton(a, b);
			previewBtn.x = 90;
			this.addChild(previewBtn);
			previewBtn.addEventListener(MouseEvent.CLICK, firePreviewItem);
			
			a = new Delete_Out();
			b = new Delete_Over();
			var deleteBtn = new SSButton(a, b);
			deleteBtn.x = 150;
			this.addChild(deleteBtn);
			deleteBtn.addEventListener(MouseEvent.CLICK, fireDeleteItem);
			
			itemTimer.addEventListener(TimerEvent.TIMER, fireItemReady);
			itemTimer.start();
		}
		
		private function fireItemReady(e:TimerEvent):void {
			itemTimer.stop();
			dispatchEvent(new BuilderEvent(BuilderEvent.ITEMREADY));
		}
		
		private function fireEditItem(e:MouseEvent):void {
			dispatchEvent(new BuilderEvent(BuilderEvent.EDITITEM));
		}
		
		private function firePreviewItem(e:MouseEvent):void {
			dispatchEvent(new BuilderEvent(BuilderEvent.PREVIEWITEM));
		}
		
		private function fireDeleteItem(e:MouseEvent):void {
			dispatchEvent(new BuilderEvent(BuilderEvent.DELETEITEM));
		}
	}
}