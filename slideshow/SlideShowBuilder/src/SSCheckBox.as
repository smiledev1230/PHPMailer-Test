package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.events.MouseEvent;
	import src.BuilderEvents.BuilderEvent;
	
	public class SSCheckBox extends Sprite {
		
		public var info:String;
		public var checked:Boolean;
		private var checkboxTF:TextField;
		private var checkboxFormat:TextFormat;
		private var checkboxMask:MovieClip = new Blank_Mask();
		private var check_out:MovieClip = new CheckBox_Out();
		private var check_over:MovieClip = new CheckBox_Over();
		private var check_selected:MovieClip = new CheckBox_Selected();
		
		
		public function get selected():Boolean { return checked; }
		
		public function set selection(b:Boolean):void {
			checked = b;
			if (checked) {
				check_out.visible = false;
				check_over.visible = false;
				check_selected.visible = true;
				}
				else {
					check_out.visible = true;
					check_over.visible = false;
					check_selected.visible = false;
					}
		}
		
		public function disable():void {
			check_out.visible = true;
			check_over.visible = false;
			check_selected.visible = false;
			checkboxMask.removeEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
			checkboxMask.removeEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);
			checkboxMask.removeEventListener(MouseEvent.CLICK, handleClick);
		}
		
		public function enable():void {
			check_out.visible = true;
			check_over.visible = false;
			check_selected.visible = false;
			checkboxMask.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
			checkboxMask.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);
			checkboxMask.addEventListener(MouseEvent.CLICK, handleClick);
		}
		
		public function SSCheckBox(info:String,checked:Boolean) {
			this.info = info;
			this.checked = checked;
			
			buildCheckBox();
		}
		
		private function buildCheckBox():void {
			check_out.y = 2;
			this.addChild(check_out);
			check_over.y = 2;
			this.addChild(check_over);
			check_selected.y = 2;
			this.addChild(check_selected);
			
			if (checked) {
				check_out.visible = false;
				check_over.visible = false;
				check_selected.visible = true;
				}
				else {
					check_out.visible = true;
					check_over.visible = false;
					check_selected.visible = false;
					}
			
			checkboxTF = new TextField();
			checkboxFormat = new TextFormat();
			checkboxFormat.font = "Arial";
			checkboxFormat.size = 16;
			checkboxFormat.align = "left";
			checkboxTF.defaultTextFormat = checkboxFormat;
			checkboxTF.text = info;
			checkboxTF.autoSize = "left";
			checkboxTF.x = 19;
			checkboxTF.textColor = 0xFFFFFF;
			this.addChild(checkboxTF);
			
			checkboxMask.width = checkboxTF.width + 19;
			checkboxMask.height = checkboxTF.height;
			checkboxMask.buttonMode = true;
			this.addChild(checkboxMask);
			checkboxMask.addEventListener(MouseEvent.MOUSE_OVER, handleMouseOver);
			checkboxMask.addEventListener(MouseEvent.MOUSE_OUT, handleMouseOut);
			checkboxMask.addEventListener(MouseEvent.CLICK, handleClick);
		}
		
		private function handleMouseOver(e:MouseEvent):void {
			if (!checked) {
				check_out.visible = false;
				check_over.visible = true;
				check_selected.visible = false;
				}
			checkboxTF.textColor = 0xF9CF3D;
		}
		
		private function handleMouseOut(e:MouseEvent):void {
			if (!checked) {
				check_out.visible = true;
				check_over.visible = false;
				check_selected.visible = false;
				}
			checkboxTF.textColor = 0xFFFFFF;
		}
		
		private function handleClick(e:MouseEvent):void {
			if (checked) {
				check_out.visible = false;
				check_over.visible = true;
				check_selected.visible = false;
				checked = false;
				}
				else {
					check_out.visible = false;
					check_over.visible = false;
					check_selected.visible = true;
					checked = true;
					}
			dispatchEvent(new BuilderEvent(BuilderEvent.CBSTATECHANGED));
		}
		
		
	}
	
}