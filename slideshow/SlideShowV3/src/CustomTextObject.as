package src {
	import flash.display.Shape;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	import flash.ui.Mouse;
	import flash.ui.MouseCursor;
	import flash.display.GradientType;
	import flash.geom.Matrix;
	import flash.net.URLRequest;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.net.navigateToURL;
	import flash.utils.Timer;
	
	
	public class CustomTextObject extends Sprite {
		
		private var highlight:int;
		private var title:String;
		private var content:String;
		private var navURL:String;
		
		private var userWidth:int;
		private var userHeight:int;
		private var my_bg:Shape;
		
		private var title_tf:TextField;
		private var title_tformat: TextFormat;
		private var text_tf:TextField;
		private var text_tformat:TextFormat;
		
		private var objectTimer = new Timer(10);
		
		public function CustomTextObject(highlight:int, title:String, content:String, navURL:String) {
			this.highlight = highlight;
			this.title = title;
			this.content = content;
			this.navURL = navURL;
			this.buttonMode = true;
			
			init();
		}
		
		private function init():void {
			userWidth = 200; 
			userHeight = 190;
			
			my_bg = new Shape();
			var gtype:String = GradientType.LINEAR;
			var matrix:Matrix = new Matrix();
			matrix.createGradientBox(200, 190, Math.PI/2, 0, 0);
			var colors:Array;
			if (highlight) colors = [0xf8d212, 0xf8f010];
				else colors = [0xcccccc, 0xeeeeee];	
			var alphas:Array = [1, 1];
			var gratios:Array = [0, 255];
			my_bg.graphics.lineStyle(1, 0x000000, 0);
			my_bg.graphics.beginGradientFill(gtype,colors,alphas,gratios,matrix);
			my_bg.graphics.moveTo(0, 5);
			my_bg.graphics.lineTo(0, userHeight - 15);
			my_bg.graphics.curveTo(0,userHeight - 10,5,userHeight - 10);
			my_bg.graphics.lineTo(userWidth - 40, userHeight - 10);
			my_bg.graphics.lineTo(userWidth - 30, userHeight);
			my_bg.graphics.lineTo(userWidth - 20, userHeight - 10);
			my_bg.graphics.lineTo(userWidth-5, userHeight - 10);
			my_bg.graphics.curveTo(userWidth,userHeight-10,userWidth,userHeight-15);
			my_bg.graphics.lineTo(userWidth, 5);
			my_bg.graphics.curveTo(userWidth,0,userWidth-5,0);
			my_bg.graphics.lineTo(5, 0);
			my_bg.graphics.curveTo(0,0,0,5);
			my_bg.graphics.endFill();	
			
			this.addChild(my_bg);
			
			title_tf = new TextField();
			text_tf = new TextField();
			var viewmore_tf:TextField = new TextField();
				
			title_tf.text = title;
			if (highlight) { title_tf.textColor = 0x003399; text_tf.textColor = 0x0066ff; viewmore_tf.textColor = 0x0066ff; }
				else { title_tf.textColor = 0x000000; text_tf.textColor = 0x666666; viewmore_tf.textColor = 0x666666; }
			title_tf.x = 10;
			title_tf.y = 10;
			title_tf.selectable = false;
			addChild(title_tf);
			title_tf.width = title_tf.textWidth + 4;
			title_tf.height = title_tf.textHeight + 4;
			
			text_tf.multiline = true;
			text_tf.wordWrap = true;
			text_tf.width = userWidth - 20;
			text_tf.text = content;
			text_tf.x = 10;
			text_tf.y = 30;
			text_tf.selectable = false;
			addChild(text_tf);
			text_tf.width = text_tf.textWidth + 4;
			text_tf.height = text_tf.textHeight + 4;
			
			viewmore_tf.text = "View More";
			viewmore_tf.selectable = false;
			viewmore_tf.x = 10;
			viewmore_tf.y = userHeight - 20 - viewmore_tf.textHeight;
			addChild(viewmore_tf);
			viewmore_tf.width = viewmore_tf.textWidth + 4;
			viewmore_tf.height = viewmore_tf.textHeight + 4;
			viewmore_tf.addEventListener(MouseEvent.MOUSE_DOWN, goToURL);
			//viewmore_tf.addEventListener(MouseEvent.ROLL_OVER, onRollOver);
			//viewmore_tf.addEventListener(MouseEvent.ROLL_OUT, onRollOut);
		}
		
		//private function onRollOver(e:MouseEvent):void {
			//Mouse.cursor = MouseCursor.BUTTON;
		//}
		
		//private function onRollOut(e:MouseEvent):void {
			//Mouse.cursor = MouseCursor.AUTO;
		//}
		
		private function goToURL(e:MouseEvent):void {
			navigateToURL(new URLRequest(navURL), "_self");
		}
	}
}