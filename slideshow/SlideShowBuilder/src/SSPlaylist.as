package src {
	import flash.display.Sprite;
	import src.SSItem;
		
	public class SSPlaylist extends Sprite {
		
		public var itemsadded:int = 0;
		private var itemList:Array;
		
		public function refreshItem(item_id:int, r:SSItem):void {
			for (var i:int = 0; i < itemList.length; i++ ) {
				if (itemList[i].id == item_id) itemList[i] = r;
				}
		}
		
		public function removeAll():void {
			while (itemList[0]) {
				this.removeChild(getChildAt(0));
				itemList.splice(0, 1);
				itemsadded--;
				}
		}
		
		public function addItem(s:SSItem):void {
			itemList.push(s);
			this.addChild(s);
			s.x = 3;;
			s.y = itemsadded * 23;
			itemsadded++;
		}
		
		public function removeItem(t:SSItem):void {
			var removed:Boolean = false;
			for (var i:int = 0; i < itemList.length; i++ ) {
				if (removed) {
					itemList[i].y -= 23;
					}
					else {
						if (itemList[i] == t) {
							this.removeChild(t);
							itemList.splice(i,1);
							removed = true;
							itemsadded--;
							i--;
							}
						}
				}
		}
		
		public function SSPlaylist() {
			init();
		}
		
		private function init():void {
			this.itemsadded = itemsadded;
			this.itemList = itemList;
			itemList = new Array();
		}
		
	}
}