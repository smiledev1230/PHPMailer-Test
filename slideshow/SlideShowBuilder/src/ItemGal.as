package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import src.BuilderEvents.BuilderEvent;
	import src.SSButton;
	import src.SSItem;
	import flash.events.MouseEvent;
	import src.PreviewItem;
	
	
	public class ItemGal extends Sprite {
		
		private var arItems:Array;
		private var bg:MovieClip;
		private var prev:SSButton;
		private var next:SSButton;
		private var close:SSButton;
		private var itemsContainer:Sprite;
		
		private var currentItem:int;
		
		public function ItemGal() {
			init();
		}
		
		private function init():void {
			bg = new Gal_BG();
			this.addChild(bg);
			
			prev = new SSButton(new Prev_Out(), new Prev_Over());
			this.addChild(prev);
			prev.addEventListener(MouseEvent.CLICK, onPrev);
			
			next = new SSButton(new Next_Out(), new Next_Over());
			next.x = bg.width - next.width;
			this.addChild(next);
			next.addEventListener(MouseEvent.CLICK, onNext);
			
			close = new SSButton(new Close_Out(), new Close_Over());
			this.addChild(close);
			close.x = bg.width;
			close.y = 0 - close.height;
			close.addEventListener(MouseEvent.CLICK, onClose);
			
			itemsContainer = new Sprite();
			this.addChild(itemsContainer);
			this.visible = false;
		}
		
		private function displayItem(ind:int) {
			for (var i:int = 0; i < arItems.length ; i++ ) {
				if (i == ind) arItems[i].visible = true;
					else arItems[i].visible = false;
				}
		}
		
		private function onPrev(e:MouseEvent):void {
			if (arItems) {
				if (currentItem < arItems.length - 1) { 
					currentItem++; 
					}
					else {
						currentItem = 0;
						}
					displayItem(currentItem);
				}
		}
		
		private function onNext(e:MouseEvent):void {
			if (arItems) {
				if (currentItem > 0) { 
					currentItem--; 
					}
					else {
						currentItem = arItems.length - 1;
						}
					displayItem(currentItem);
				}
		}
		
		private function onClose(e:MouseEvent):void {
			for (var i:int = 0; i < arItems.length; i++  ) {
				arItems[i].removeEventListener(MouseEvent.CLICK, onItemClick);
				itemsContainer.removeChildAt(0);
				}
			arItems.splice(0);
			currentItem = -1;
			this.visible = false;
		}
		
		public function getItems(a:Array, iType:int) {
			arItems = new Array();
			this.visible = true;
			var preview:PreviewItem;
			for ( var i:int = 0; i < a.length; i++ ) {
				if (iType == 1 && a[i].type == 1) {
					preview = new PreviewItem(a[i].type, a[i].highlight, a[i].title, a[i].content);
					preview.indice = i;
					itemsContainer.addChild(preview);
					preview.x = (bg.width - preview.width) / 2;
					preview.y = (bg.height - preview.height) / 2;
					preview.addEventListener(MouseEvent.CLICK, onItemClick);
					preview.visible = false;
					arItems.push(preview);
					}
					else {
						if (iType != 1 && a[i].type != 1) {
							preview = new PreviewItem(a[i].type, a[i].highlight, a[i].title, a[i].content);
							preview.indice = i;
							itemsContainer.addChild(preview);
							preview.x = (bg.width - preview.width) / 2;
							preview.y = (bg.height - preview.height) / 2;
							preview.addEventListener(MouseEvent.CLICK, onItemClick);
							preview.visible = false;
							arItems.push(preview);
							}
						}
				}
			arItems[0].visible = true;
		}
		
		private function onItemClick(e:MouseEvent):void {
			var itemid:int = e.currentTarget.indice;
			flushAll();
			dispatchEvent(new BuilderEvent(BuilderEvent.ITEMSELECTEDFROMGAL, false, false, itemid));
		}
		
		private function flushAll():void {
			for (var i:int = 0; i < arItems.length; i++  ) {
				arItems[i].removeEventListener(MouseEvent.CLICK, onItemClick);
				itemsContainer.removeChildAt(0);
				}
			arItems.splice(0);
			currentItem = -1;
			this.visible = false;
		}
		
		
	
	}
}