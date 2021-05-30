package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	
	
	public class MenuButton extends Sprite {
		
		public var selected:Boolean;
		public var identificator:int;
		private var bg:MovieClip;
		private var mc_over:MovieClip;
		private var mc_down:MovieClip;
		
		public function set select(s:Boolean):void { selected = s; toggleSelect(s); }
		
		public function set id(i:int):void { identificator = i; }
		public function get id():int { return identificator; }
		
		public function MenuButton() {
			this.buttonMode = true;
			init();
		}
		
		private function init():void {
			bg = new Blank_Mask();
			bg.width = 65;
			bg.height = 32;
			bg.y = 5;
			mc_over = new Menu_Over();
			mc_over.y = 5;
			mc_down = new Menu_Active();
			mc_down.y = 5;
			
			this.addChild(bg);
			this.addChild(mc_over);
			this.addChild(mc_down);
			mc_over.visible = false;
			mc_down.visible = false;
			
			this.addEventListener(MouseEvent.ROLL_OVER, handleRollOver);
			this.addEventListener(MouseEvent.ROLL_OUT, handleRollOut);
		}
		
		private function handleRollOver(e:MouseEvent):void {
			if(!selected) mc_over.visible = true;
		}
		
		private function handleRollOut(e:MouseEvent):void {
			if(!selected) mc_over.visible = false;
		}
		
		private function toggleSelect(i:Boolean):void {
			if (i) { mc_down.visible = true; mc_over.visible = false; }
				else { mc_down.visible = false; mc_over.visible = false; }
		}
	}
}