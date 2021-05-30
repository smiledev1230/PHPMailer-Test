package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.events.MouseEvent;
	
	
	public class RadioItem extends Sprite {
		
		public var selected:Boolean = false;
		private var info:String;
		
		private var radio_off:MovieClip = new Radio_Off();
		private var radio_over:MovieClip = new Radio_Over();
		private var radio_on:MovieClip = new Radio_On();
		private var radioTF:TextField=new TextField();
		private var radioFormat:TextFormat = new TextFormat();
		
		public function set select(s:Boolean):void { selected = s; toggleSelected(); }
		public function get select():Boolean { return selected; }
		
		public function RadioItem(info:String) {
			this.info = info;
			this.buttonMode = true;
			
			buildRadio();
		}
		
		private function buildRadio():void {
			radio_off.y = 1;
			this.addChild(radio_off);
			radio_over.y = 1;
			this.addChild(radio_over);
			radio_on.y = 1;
			this.addChild(radio_on);
			radio_over.visible = false;
			radio_on.visible = false;
			
			radioFormat.font = "Arial";
			radioFormat.size = 14;
			radioFormat.align = "left";
			radioTF.defaultTextFormat = radioFormat;
			radioTF.textColor = 0xFFFFFF;
			radioTF.text = info;
			radioTF.selectable = false;
			radioTF.width = radioTF.textWidth+4;
			radioTF.height = 20;
			radioTF.x = 19;
			this.addChild(radioTF);
			
			addEvents();
		}
		
		public function toggleSelected():void {
			radio_off.visible = false;
			radio_over.visible = false;
			radio_on.visible = true;
			selected = true;
		}
		
		public function Deselect():void {
			radio_off.visible = true;
			radio_over.visible = false;
			radio_on.visible = false;
			selected = false;
		}
		
		private function addEvents():void {
			this.addEventListener(MouseEvent.ROLL_OVER, handleRollOver);
			this.addEventListener(MouseEvent.ROLL_OUT, handleRollOut);
		}
		
		private function handleRollOver(e:MouseEvent):void {
			if (!selected) {
				radio_off.visible = false;
				radio_over.visible = true;
				radio_on.visible = false;
				}
			radioTF.textColor = 0xF9CF3D;
		}
		
		private function handleRollOut(e:MouseEvent):void {
			if (!selected) {
				radio_off.visible = true;
				radio_over.visible = false;
				radio_on.visible = false;
				}
			radioTF.textColor = 0xFFFFFF;
		}
	}
}