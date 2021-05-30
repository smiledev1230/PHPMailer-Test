package src {
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.display.Graphics;
	import flash.events.Event;
	import src.ColumnItem;
	import src.BuilderEvents.BuilderEvent;
	import flash.events.MouseEvent;
	
	
	public class SSColumn extends Sprite {
		
		public var type:int;
		private var bg:Shape;
		private var item1:ColumnItem;
		private var item2:ColumnItem;
		private var item3:ColumnItem;
		public var items:Array = new Array();
		public var currentItemType:int;
		public var currentItem:ColumnItem;
		
		private var removeColBtn:SSButton;
		private var alignUpBtn:SSButton;
		private var alignCenterBtn:SSButton;
		private var alignDownBtn:SSButton;
		private var reverseBtn:SSButton;
		private var changeTypeBtn:SSButton;
		
		private var alignPermissions:Array = [0, 2, 3, 5, 7, 8];
		private var reversePermissions:Array = [1, 6, 7];
		private var alignType:String;
		
		public function get currentType():int { return currentItemType; }
		
		public function get alignament():String { return alignType; }
		public function set alignament(a:String):void {
			switch (a) {
				case "UP": { alignType = a; AlignUp(); }
				break;
				case "CENTER": { alignType = a; AlignCenter(); }
				break;
				case "DOWN": { alignType = a; AlignDown(); }
				break;
				default: alignType = "0";
				break;
				}
		}
			
		
		public function SSColumn(t:int) {
			this.type = t;
			init();
		}
		
		private function init():void {
			bg = new Shape();
			bg.graphics.beginFill(0x999999, 1);
			if(type<2) bg.graphics.drawRect(0, 0, 220, 225); 
				else bg.graphics.drawRect(0, 0, 110, 225); 
			bg.graphics.endFill();
			this.addChild(bg);
			
			addItems();
		}
		
		private function addItems():void {
			items = new Array();
			switch (type) {
				case 0: {
					item1 = new ColumnItem(0);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 47.5;
					}
				break;
				case 1: {
					item1 = new ColumnItem(0);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 12.5;
					item2 = new ColumnItem(1);
					this.addChild(item2);
					item2.x = 5;
					item2.y = 152.5;
					item3 = new ColumnItem(1);
					this.addChild(item3);
					item3.x = 115;
					item3.y = 152.5;
					}
				break;
				case 2: {
					item1 = new ColumnItem(1);
					this.addChild(item1);
					item1.x = 5;
					item1.y = (225-item1.height)/2;
					}
				break;
				case 3: {
					item1 = new ColumnItem(1);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 47.5;
					item2 = new ColumnItem(1);
					this.addChild(item2);
					item2.x = 5;
					item2.y = 117.5;
					}
				break;
				case 4: {
					item1 = new ColumnItem(1);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 12.5;
					item2 = new ColumnItem(1);
					this.addChild(item2);
					item2.x = 5;
					item2.y = 82.5;
					item3 = new ColumnItem(1);
					this.addChild(item3);
					item3.x = 5;
					item3.y = 152.5;
					}
				break;
				case 5: {
					item1 = new ColumnItem(2);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 47.5;
					}
				break;
				case 6: {
					item1 = new ColumnItem(1);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 12.5;
					item2 = new ColumnItem(2);
					this.addChild(item2);
					item2.x = 5;
					item2.y = 82.5;
					}
				break;
				case 7: {
					item1 = new ColumnItem(1);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 12.5;
					item2 = new ColumnItem(3);
					this.addChild(item2);
					item2.x = 5;
					item2.y = 82.5;
					}
				break;
				case 8: {
					item1 = new ColumnItem(3);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 65;
					}
				break;
				case 9: {
					item1 = new ColumnItem(3);
					this.addChild(item1);
					item1.x = 5;
					item1.y = 12.5;
					item2 = new ColumnItem(3);
					this.addChild(item2);
					item2.x = 5;
					item2.y = 117.5;
					}
				break;
				}
			item1.addEventListener(BuilderEvent.LOADITEM, handleLoadItem);
			items.push(item1);
			if (item2) { 
				item2.addEventListener(BuilderEvent.LOADITEM, handleLoadItem);
				items.push(item2);
				}
			if (item3) {
				item3.addEventListener(BuilderEvent.LOADITEM, handleLoadItem);
				items.push(item3);
				}
			addControllButtons();
		}
		
		private function addControllButtons():void {
			removeColBtn = new SSButton(new DelColumn_Out(), new DelColumn_Over());
			removeColBtn.x = this.width - removeColBtn.width;
			this.addChild(removeColBtn);
			removeColBtn.addEventListener(MouseEvent.CLICK, handleRemoveColumn);
			
			changeTypeBtn = new SSButton(new ColEdit_Out(), new ColEdit_Over());
			changeTypeBtn.x = this.width - changeTypeBtn.width;
			changeTypeBtn.y = this.height - changeTypeBtn.height;
			this.addChild(changeTypeBtn);
			changeTypeBtn.addEventListener(MouseEvent.CLICK, handleChangeType);
			if(alignPermissions.indexOf(type)!=-1){
				alignUpBtn = new SSButton(new Up_Out(), new Up_Over());
				this.addChild(alignUpBtn);
				alignUpBtn.addEventListener(MouseEvent.CLICK, handleAlignUp);
				
				alignCenterBtn = new SSButton(new Center_Out(), new Center_Over());
				alignCenterBtn.y = (this.height - alignCenterBtn.height) / 2;
				this.addChild(alignCenterBtn);
				alignCenterBtn.addEventListener(MouseEvent.CLICK, handleAlignCenter);
				
				alignDownBtn = new SSButton(new Down_Out(), new Down_Over());
				alignDownBtn.y = this.height - alignDownBtn.height;
				this.addChild(alignDownBtn);
				alignDownBtn.addEventListener(MouseEvent.CLICK, handleAlignDown);
			}
			
			if (reversePermissions.indexOf(type) != -1) {
				reverseBtn = new SSButton(new Reverse_Out(), new Reverse_Over());
				reverseBtn.y = (this.height - reverseBtn.height) / 2;
				reverseBtn.x = this.width - reverseBtn.width;
				this.addChild(reverseBtn);
				reverseBtn.addEventListener(MouseEvent.CLICK, handleReverse);
			}
			this.addEventListener(MouseEvent.ROLL_OVER, showButtons);
			this.addEventListener(MouseEvent.ROLL_OUT, hideButtons);
		}
		
		private function showButtons(e:MouseEvent):void {
			removeColBtn.visible = true;
			changeTypeBtn.visible = true;
			if (alignUpBtn) alignUpBtn.visible = true;
			if (alignCenterBtn) alignCenterBtn.visible = true;
			if (alignDownBtn) alignDownBtn.visible = true;
			if (reverseBtn) reverseBtn.visible = true;
		}
		
		private function hideButtons(e:MouseEvent):void {
			removeColBtn.visible = false;
			changeTypeBtn.visible = false;
			if (alignUpBtn) alignUpBtn.visible = false;
			if (alignCenterBtn) alignCenterBtn.visible = false;
			if (alignDownBtn) alignDownBtn.visible = false;
			if (reverseBtn) reverseBtn.visible = false;
		}
		
		private function handleLoadItem(e:Event):void {
			currentItemType = e.currentTarget.itemType;
			currentItem = ColumnItem(e.currentTarget);
			dispatchEvent(new BuilderEvent(BuilderEvent.DISPLAYITEMLIST,false,false,e.currentTarget,currentItemType));
		}
		
		private function handleRemoveColumn(e:MouseEvent):void {
			dispatchEvent(new BuilderEvent(BuilderEvent.REMOVECOLUMN));
		}
		
		private function handleChangeType(e:MouseEvent):void {
			dispatchEvent(new BuilderEvent(BuilderEvent.CHANGECOLUMNTYPE));
		}
		
		private function handleAlignUp(e:MouseEvent):void {
			alignType = "UP";
			AlignUp();
		}
		
		private function handleAlignCenter(e:MouseEvent):void {
			alignType = "CENTER";
			AlignCenter();
		}
		
		private function handleAlignDown(e:MouseEvent):void {
			alignType = "Down";
			AlignDown();
		}
		
		private function AlignUp():void {
			switch (type) {
				case 0: item1.y = 12.5;
				break;
				case 2: item1.y = 12.5;
				break;
				case 3: { item1.y = 12.5; item2.y = 82.5; }
				break;
				case 5: item1.y = 12.5;
				break;
				case 7: { if (item1.y < item2.y) { item1.y = 12.5; item2.y = item1.y + item1.height + 10; }
							else { item2.y = 12.5; item1.y = item2.y + item2.height + 10; }
						}
				break;
				case 8: item1.y = 12.5;
				break;
				case 9: { if (item1.y < item2.y) { item1.y = 12.5; item2.y = item1.y + item1.height + 10; }
							else { item2.y = 12.5; item1.y = item2.y + item2.height + 10; }
						}
				break;
				}
		}
		
		private function AlignCenter():void {
			switch (type) {
				case 0: item1.y = (225-item1.height)/2;
				break;
				case 2: item1.y = (225-item1.height)/2;
				break;
				case 3: { if (item1.y < item2.y) { item1.y = (225-item1.height-item2.height-10)/2; item2.y = item1.y + item1.height + 10; }
							else { item2.y = (225-item1.height-item2.height-10)/2; item1.y = item2.y + item2.height + 10; }
						}
				break;
				case 5: item1.y = (225 - item1.height) / 2;
				break;
				case 7: { if (item1.y < item2.y) { item1.y = (225-item1.height-item2.height-10)/2; item2.y = item1.y + item1.height + 10; }
							else { item2.y = (225-item1.height-item2.height-10)/2; item1.y = item2.y + item2.height + 10; }
						}
				break;
				case 8: item1.y = (225-item1.height)/2;
				break;
				case 9: { if (item1.y < item2.y) { item1.y = (225-item1.height-item2.height-10)/2; item2.y = item1.y + item1.height + 10; }
							else { item2.y = (225-item1.height-item2.height-10)/2; item1.y = item2.y + item2.height + 10; }
						}
				break;
				}
		}
		
		private function AlignDown():void {
			switch (type) {
				case 0: item1.y = 225-item1.height-12.5;
				break;
				case 2: item1.y = 225-item1.height-12.5;
				break;
				case 3: { if (item1.y < item2.y) { item1.y = 225-item1.height-item2.height-22.5; item2.y = item1.y + item1.height + 10; }
							else { item2.y = 225-item1.height-item2.height-22.5; item1.y = item2.y + item2.height + 10; }
						}
				break;
				case 5: item1.y = 225-item1.height-12.5;
				break;
				case 7: { if (item1.y < item2.y) { item1.y = 225-item1.height-item2.height-22.5; item2.y = item1.y + item1.height + 10; }
							else { item2.y = 225-item1.height-item2.height-22.5; item1.y = item2.y + item2.height + 10; }
						}
				break;
				case 8: item1.y = 225-item1.height-12.5;
				break;
				case 9: { if (item1.y < item2.y) { item1.y = 225-item1.height-item2.height-22.5; item2.y = item1.y + item1.height + 10; }
							else { item2.y = 225-item1.height-item2.height-22.5; item1.y = item2.y + item2.height + 10; }
						}
				break;
				}
		}
		
		private function handleReverse(e:MouseEvent):void {
			switch (type) {
				case 1: {
					if (item1.y == 12.5) {
						item2.y = item3.y = 12.5;
						item1.y = 22.5 + item2.height;
						}	
						else {
							item1.y = 12.5;
							item2.y = item3.y = 22.5 + item1.height;
							}
				}
				break;
				case 6: {
					if (item1.y == 12.5) {
						item2.y = 12.5;
						item1.y = 22.5 + item2.height;
						}	
						else {
							item1.y = 12.5;
							item2.y = 22.5 + item1.height;
							}
					}
				break;
				case 7: {
					if (item1.y < item2.y) {
						item2.y = item1.y;
						item1.y = item2.y + item2.height + 10;
						}
						else {
							item1.y = item2.y;
							item2.y = item1.y + item1.height + 10;
							}
				}
				break;
			}
		}
		
	}
}