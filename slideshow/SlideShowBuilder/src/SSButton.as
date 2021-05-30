package src {
	import flash.display.MovieClip;
	import flash.events.MouseEvent;
	
	public class SSButton extends MovieClip {
		
		private var mc_out:MovieClip;
		private var mc_over:MovieClip;
		
		public function SSButton(mc_out:MovieClip, mc_over:MovieClip) {
			this.mc_out = mc_out;
			this.mc_over = mc_over;
			this.buttonMode = true;
			build();
		}
		
		private function build():void {
			addChild(mc_out);
			addChild(mc_over);
			mc_over.visible = false;
			addEvents();
		}
		
		private function addEvents():void {
			this.addEventListener(MouseEvent.ROLL_OVER, handleRollOver);
			this.addEventListener(MouseEvent.ROLL_OUT, handleRollOut);
		}
		
		private function handleRollOver(e:MouseEvent):void {
			mc_out.visible = false;
			mc_over.visible = true;
		}
		
		private function handleRollOut(e:MouseEvent):void {
			mc_out.visible = true;
			mc_over.visible = false;
		}
	}
	
}