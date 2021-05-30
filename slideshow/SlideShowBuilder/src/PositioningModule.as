package src {
	import flash.display.MovieClip;
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import src.SSButton;
	import src.RadioList;
	import src.SSColumn;
	import src.BuilderEvents.BuilderEvent;
	
	public class PositioningModule extends Sprite {
		
		private var moduleHolder:Sprite;
		private var moduleBg:MovieClip;
		private var moduleMarker:Shape;
		private var moduleMask:MovieClip;
		private var addColBtn:SSButton;
		
		private var radioBg:MovieClip;
		private var columnRadio:RadioList;
		public var columns:Array=new Array();
		
		private var scrollbarBg:MovieClip;
		private var scroller:MovieClip;
		private var scrolerPath:Rectangle = new Rectangle(10, 233.7, 440, 0);
		private var leftArrow:SSButton;
		private var rightArrow:SSButton;
		public var indexToBeChanged:int = -1;
		public var currentColumn:SSColumn;
		
		public function addColumn(type:int):void {
			var column:SSColumn = new SSColumn(type);
			if (columns) columns.push(column);
				else {
					columns = new Array();
					columns.push(column);
					}
			moduleHolder.addChild(column);
			var listLength:int = 10;
			for (var i:int = 0; i < columns.length; i++ ) {
				if (i == 0) columns[i].x = 5;
					else columns[i].x = columns[i - 1].x + columns[i - 1].width;
				listLength += columns[i].width;
				}
			if (listLength > 850) {moduleBg.width = listLength; scroller.x = 10; scroller.visible = true; }
				else { moduleBg.width = 850; moduleBg.x = 0; scroller.visible = false; }
			this.setChildIndex(radioBg, this.numChildren - 1);
			this.setChildIndex(addColBtn, this.numChildren - 1);
			this.setChildIndex(columnRadio, this.numChildren - 1);
			column.addEventListener(BuilderEvent.DISPLAYITEMLIST, handleAssignItem);
			column.addEventListener(BuilderEvent.REMOVECOLUMN, handleRemoveColumn);
			column.addEventListener(BuilderEvent.CHANGECOLUMNTYPE, handleChangeType);
		}
			
		private function removeColumn(index:int):void {
			columns[index].removeEventListener(BuilderEvent.DISPLAYITEMLIST, handleAssignItem);
			columns[index].removeEventListener(BuilderEvent.REMOVECOLUMN, handleRemoveColumn);
			columns[index].removeEventListener(BuilderEvent.CHANGECOLUMNTYPE, handleChangeType);
			moduleHolder.removeChild(columns[index]);
			columns.splice(index, 1);
			var listLength:int = 10;
			for (var i:int = 0; i < columns.length; i++ ) {
				if (i == 0) columns[i].x = 5;
					else columns[i].x = columns[i - 1].x + columns[i - 1].width;
				listLength += columns[i].width;
				}
			if (listLength > 850) { moduleBg.width = listLength; scroller.x = 10; scroller.visible = true; }
				else { moduleBg.width = 850; moduleBg.x = 0; scroller.visible = false; }
		}
		
		private function editColumnType(index:int, newType:int):void {
			
			columns[index].removeEventListener(BuilderEvent.DISPLAYITEMLIST, handleAssignItem);
			columns[index].removeEventListener(BuilderEvent.REMOVECOLUMN, handleRemoveColumn);
			columns[index].removeEventListener(BuilderEvent.CHANGECOLUMNTYPE, handleChangeType);
			moduleHolder.removeChild(columns[index]);
			var column:SSColumn = new SSColumn(newType);
			column.addEventListener(BuilderEvent.DISPLAYITEMLIST, handleAssignItem);
			column.addEventListener(BuilderEvent.REMOVECOLUMN, handleRemoveColumn);
			column.addEventListener(BuilderEvent.CHANGECOLUMNTYPE, handleChangeType);
			columns[index] = column;
			moduleHolder.addChild(columns[index]);
			var listLength:int = 10;
			for (var i:int = 0; i < columns.length; i++ ) {
				if (i == 0) columns[i].x = 5;
					else columns[i].x = columns[i - 1].x + columns[i - 1].width;
				listLength += columns[i].width;
				}
			if (listLength > 850) {moduleBg.width = listLength; scroller.x = 10; scroller.visible = true; }
				else { moduleBg.width = 850; moduleBg.x = 0; scroller.visible = false; }
		}
		
		public function PositioningModule() {
			init();
		}
		
		private function init():void {
			moduleHolder = new Sprite();
			this.addChild(moduleHolder);
			
			moduleBg = new PosModuleBg();
			moduleHolder.addChild(moduleBg);
			
			moduleMarker = new Shape();
			moduleMarker.graphics.lineStyle(3, 0xFF0000, 1);
			moduleMarker.graphics.moveTo(850, 0);
			moduleMarker.graphics.lineTo(850, 225);
			moduleHolder.addChild(moduleMarker);
			//moduleMarker.x = 850;
			
			radioBg = new PosModuleBg();
			this.addChild(radioBg);
			radioBg.visible = false;
			
			addColBtn = new SSButton(new NewColumn_Out(), new NewColumn_Over());
			addColBtn.x = 10;
			addColBtn.y = (225 - addColBtn.height) / 2;
			this.addChild(addColBtn);
			addColBtn.addEventListener(MouseEvent.CLICK, handleAddColumn);
			
			var colummns:Array = ["1xLarge Landscape Image", "1xLarge Lanscape Image & 2xSmall Langscape Images", "1xSmall Lanscape Image", "2xSmall Landscape Images", "3xSmall Landscape Images", "1xPortrait Image", "1xPortrait Image & 1xSmall Landscape Image", "1xSmall Landscape Image & 1xText Item", "1xText Item", "2xText Items"];
			columnRadio = new RadioList(colummns, "vertical");
			this.addChild(columnRadio);
			columnRadio.x = addColBtn.x + addColBtn.width + 10;
			columnRadio.y = (225 - columnRadio.height) / 2;
			columnRadio.visible = false;
			columnRadio.addEventListener(BuilderEvent.RADIOSTATECHANGED, handleNewColumnSel);
			
			moduleMask = new PosModuleBg();
			this.addChild(moduleMask);
			moduleHolder.mask = moduleMask;
			
			scrollbarBg = new Scroll_Bar();
			scrollbarBg.width = 850;
			scrollbarBg.height = 29.2;
			scrollbarBg.y = 230;
			this.addChild(scrollbarBg);
			
			scroller = new Scroll_Handler();
			scroller.width = 349.3;
			scroller.height = 22;
			scroller.x = 10;
			scroller.y = 233.7;
			this.addChild(scroller);
			scroller.visible = false;
			scroller.addEventListener(MouseEvent.MOUSE_DOWN, handleScrollerDown);
			
			leftArrow = new SSButton(new Left_Out(), new Left_Over());
			leftArrow.x = 805;
			leftArrow.y = 236;
			this.addChild(leftArrow);
			leftArrow.addEventListener(MouseEvent.MOUSE_DOWN, moveLeft);
			
			rightArrow = new SSButton(new Right_Out(), new Right_Over());
			rightArrow.x = 826;
			rightArrow.y = 236;
			this.addChild(rightArrow);
			rightArrow.addEventListener(MouseEvent.MOUSE_DOWN, moveRight);
		}
		
		private function handleAddColumn(e:Event):void {
			addColBtn.removeEventListener(MouseEvent.CLICK, handleAddColumn);
			columnRadio.visible = true;
			radioBg.visible = true;
			addColBtn.addEventListener(MouseEvent.CLICK, hideColumnRadio);
		}
		
		private function hideColumnRadio(e:MouseEvent):void {
			addColBtn.removeEventListener(MouseEvent.CLICK, hideColumnRadio);
			columnRadio.visible = false;
			radioBg.visible = false;
			addColBtn.addEventListener(MouseEvent.CLICK, handleAddColumn);
		}
		
		private function handleNewColumnSel(e:Event):void {
			addColBtn.removeEventListener(MouseEvent.CLICK, hideColumnRadio);
			addColumn(columnRadio.selection);
			columnRadio.reset();
			columnRadio.visible = false;
			radioBg.visible = false;
			addColBtn.addEventListener(MouseEvent.CLICK, handleAddColumn);
		}
		
		private function handleScrollerDown(e:MouseEvent):void {
			scroller.removeEventListener(MouseEvent.MOUSE_DOWN, handleScrollerDown);
			this.addEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			this.addEventListener(MouseEvent.MOUSE_UP, handleScrollerUp);
			stage.addEventListener(MouseEvent.MOUSE_UP, handleScrollerUp);
			stage.addEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			scroller.startDrag(false, scrolerPath);
		}
		
		private function getPosition(e:MouseEvent):void {
			var percent:Number = (scroller.x - 10) / 440;
			moduleHolder.x = 0 - (moduleBg.width - 850) * percent;
		}
		
		private function handleScrollerUp(e:MouseEvent):void {
			this.removeEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			this.removeEventListener(MouseEvent.MOUSE_UP, handleScrollerUp);
			stage.removeEventListener(MouseEvent.MOUSE_UP, handleScrollerUp);
			stage.removeEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			scroller.stopDrag();
			scroller.addEventListener(MouseEvent.MOUSE_DOWN, handleScrollerDown);
		}
		
		private function moveLeft(e:MouseEvent):void {
			if (moduleHolder.x <= -5 && moduleBg.width > 850) {
				moduleHolder.x += 5;
				scroller.x = moduleHolder.x / (moduleBg.width - 850) * ( -1) * (440) + 10;
				}
		}
		
		private function moveRight(e:MouseEvent):void {
			if (moduleHolder.x >= (850 - moduleBg.width) && moduleBg.width > 850) {
				moduleHolder.x -= 5;
				scroller.x = moduleHolder.x / (moduleBg.width - 850) * ( -1) * (440) + 10;
			}
		}
		
		private function handleAssignItem(e:BuilderEvent):void {
			currentColumn = SSColumn(e.currentTarget);
			var targetItem:ColumnItem = ColumnItem(e.arg[0]);
			var targetType:int = int(e.arg[1]);
			dispatchEvent(new BuilderEvent(BuilderEvent.DISPLAYAVAILABLEITEMS, false, false, currentColumn, targetItem, targetType));
		}
		
		private function handleRemoveColumn(e:Event):void {
			var column:SSColumn = SSColumn(e.currentTarget);
			for (var i:int = 0; i < columns.length; i++ ) {
				if (columns[i] == column) removeColumn(i);
				}
		}
		
		private function handleChangeType(e:Event):void {
			var column:SSColumn = SSColumn(e.currentTarget);
			for (var i:int = 0; i < columns.length; i++ ) {
				if (columns[i] == column) indexToBeChanged = i;
				}
			columnRadio.visible = true;
			radioBg.visible = true;
			addColBtn.addEventListener(MouseEvent.CLICK, hideColumnRadio);
			columnRadio.removeEventListener(BuilderEvent.RADIOSTATECHANGED, handleNewColumnSel);
			columnRadio.addEventListener(BuilderEvent.RADIOSTATECHANGED, handleNewType);
		}
		
		private function handleNewType(e:Event):void {
			addColBtn.removeEventListener(MouseEvent.CLICK, hideColumnRadio);
			editColumnType(indexToBeChanged, columnRadio.selection);
			columnRadio.reset();
			columnRadio.removeEventListener(BuilderEvent.RADIOSTATECHANGED, handleNewType);
			columnRadio.addEventListener(BuilderEvent.RADIOSTATECHANGED, handleNewColumnSel);
			columnRadio.visible = false;
			radioBg.visible = false;
			addColBtn.addEventListener(MouseEvent.CLICK, handleAddColumn);
		}
	}
}