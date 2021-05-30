package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.events.MouseEvent;
	
	public class SSSpeedMeter extends Sprite {
		
		private var speedTF:TextField;
		private var speedFormat:TextFormat;
		private var minusBtn:SSButton;
		private var plusBtn:SSButton;
		public var speed:int;
		
		public function set speedLevel(s:int):void { speed = s; speedTF.text = String(speed); }
		public function get speedLevel():int { return speed; }
		
		public function SSSpeedMeter(speed:int) {
			this.speed = speed;
			
			var a:MovieClip = new Minus_Out();
			var b:MovieClip = new Minus_Over();
			minusBtn = new SSButton(a, b);
			minusBtn.y = 5;
			this.addChild(minusBtn);
			minusBtn.buttonMode = true;
			minusBtn.addEventListener(MouseEvent.CLICK, goMinus);
			
			a = new Plus_Out();
			b = new Plus_Over();
			plusBtn = new SSButton(a, b);
			plusBtn.y = 5;
			plusBtn.x = 50;
			this.addChild(plusBtn);
			plusBtn.buttonMode = true;
			plusBtn.addEventListener(MouseEvent.CLICK, goPlus);
			
			speedTF = new TextField();
			speedFormat = new TextFormat();
			speedFormat.font = "Arial";
			speedFormat.size = 14;
			speedFormat.color = 0xFFFFFF;
			speedTF.defaultTextFormat = speedFormat;
			speedTF.text = String(speed);
			speedTF.selectable = false;
			speedTF.autoSize = "center";
			speedTF.x = (60-speedTF.textWidth)/2;
			this.addChild(speedTF);
		}
		
		private function goMinus(e:MouseEvent):void {
			if (speed > 1) {
				speed--;
				speedTF.text = String(speed);
				speedTF.x = (60-speedTF.textWidth)/2;
				}
		}
		
		private function goPlus(e:MouseEvent):void {
			if (speed < 5) {
				speed++;
				speedTF.text = String(speed);
				speedTF.x = (60-speedTF.textWidth)/2;
				}
		}
	}
}