package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.events.MouseEvent;
	
	public class SButton extends Sprite {
		
		private var bg:MovieClip;
		public var label:String;
		private var labelTF:TextField;
		private var buttonFormat:TextFormat;
		
		public function SButton(label:String) {
			this.label = label;
			this.buttonMode = true;
			init();
		}
		
		private function init():void {
			bg = new Large_Btn();
			this.addChild(bg);
			
			buttonFormat = new TextFormat();
			buttonFormat.font = "Arial";
			buttonFormat.size = 16;
			
			labelTF = new TextField();
			labelTF.defaultTextFormat = buttonFormat;
			labelTF.text = label;
			labelTF.textColor = 0xFFFFFF;
			labelTF.selectable = false;
			labelTF.autoSize = "left";
			labelTF.height = 22;
			labelTF.x = (bg.width - labelTF.width) / 2;
			labelTF.y = (bg.height - 22) / 2;
			this.addChild(labelTF);
			
			addEvents();
		}
		
		private function addEvents():void {
			this.addEventListener(MouseEvent.ROLL_OVER, handleRollOver);
			this.addEventListener(MouseEvent.ROLL_OUT, handleRollOut);
		}
		
		private function handleRollOver(e:MouseEvent):void {
			labelTF.textColor = 0xF9CF3D;
		}
		
		private function handleRollOut(e:MouseEvent):void {
			labelTF.textColor = 0xFFFFFF;
		}
	}
}