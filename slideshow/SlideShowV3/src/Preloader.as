package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	
	public class Preloader extends Sprite {
		
		private var prel_bg:MovieClip = new Preloader_Bg();
		private var prel_mask:MovieClip = new Preloader_Mask();
		
		public function Preloader() {
			this.addChild(prel_bg);
			this.addChild(prel_mask);
			prel_bg.mask = prel_mask;
		}
		
		public function startLoading():void {
			this.addEventListener(Event.ENTER_FRAME, spinPreloader);
		}
		
		public function stopLoading():void {
			this.removeEventListener(Event.ENTER_FRAME, spinPreloader);
		}
		
		private function spinPreloader(e:Event):void {
			prel_bg.rotation += 5;
		}
	}
}