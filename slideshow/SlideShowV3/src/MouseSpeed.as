package src {
	import flash.display.Sprite;
	import flash.events.Event;
	
	
	public class MouseSpeed extends Sprite {
		
		private var newX:Number = 0;
		private var oldX:Number = 0;
		public var xSpeed:Number;
  		
		public function MouseSpeed()
		{
			this.addEventListener(Event.ENTER_FRAME, calculateMouseSpeed);
		}
  		
		private function calculateMouseSpeed(e:Event)
		{
			newX = mouseX;
			xSpeed = newX - oldX;
			oldX = newX;
		}
  		
		public function getXSpeed():Number
		{
			return xSpeed;
		}
  		
	}
	
}