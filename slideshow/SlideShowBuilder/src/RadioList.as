package src {
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import src.BuilderEvents.BuilderEvent;
	
	public class RadioList extends Sprite {
		
		private var a:Array;
		private var radios:Array;
		private var orientation:String;
		public var selectedItem:int;
		
		public function get selection():int { return selectedItem; }
		public function set selection(i:int):void { selectedItem = i; toggleItem(i); }
		
		public function disable():void {
			for (var i:int = 0; i < radios.length; i++ ) {
				radios[i].Deselect();
				radios[i].removeEventListener(MouseEvent.CLICK, handleClick);
				}
		}
			
		public function enable():void {
			for (var i:int = 0; i < radios.length; i++ ) {
				radios[i].addEventListener(MouseEvent.CLICK, handleClick);
				}
		}
		
		public function reset():void {
			for (var i:int = 0; i < radios.length; i++ ) {
				radios[i].Deselect();
				}
			}
		
		public function RadioList(a:Array, orientation:String) {
			this.a = a;
			this.orientation = orientation;
			
			switch (orientation) {
				case "vertical": buildVerticalMenu();
				break;
				case "horizontal" :buildHorizontalMenu();
				break;
			}
		}
		
		private function buildVerticalMenu():void {
			radios = new Array();
			var currentRadio:RadioItem;
			var currentY:int = 0;
			for (var i:int = 0; i < a.length; i++) {
				currentRadio = new RadioItem(a[i]);
				this.addChild(currentRadio);
				radios.push(currentRadio);
				currentRadio.y = currentY;
				currentY += 23;
				currentRadio.addEventListener(MouseEvent.CLICK, handleClick);
			}
		}
		
		private function buildHorizontalMenu():void {
			radios = new Array();
			var currentRadio:RadioItem;
			var currentX:int = 0;
			for (var i:int = 0; i < a.length; i++) {
				currentRadio = new RadioItem(a[i]);
				this.addChild(currentRadio);
				radios.push(currentRadio);
				currentRadio.x = currentX;
				currentX += (currentRadio.width+5);
				currentRadio.addEventListener(MouseEvent.CLICK, handleClick);
			}
		}
		
		private function handleClick(e:MouseEvent):void {
			for (var i:int = 0; i < radios.length; i++ ) {
				if (radios[i] == e.currentTarget) { radios[i].select = true; selectedItem = i; }
					else radios[i].Deselect();
				}
			dispatchEvent(new BuilderEvent(BuilderEvent.RADIOSTATECHANGED));
		}
		
		public function toggleItem(ind:int):void {
			for (var i:int = 0; i < radios.length; i++ ) {
				if (i==ind) { radios[i].select = true; selectedItem = i; }
					else radios[i].Deselect();
				}
		}
		
	}
}