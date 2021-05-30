package src {
	import flash.display.GraphicsBitmapFill;
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import flash.text.AntiAliasType;
	
	
	public class Cursor extends Sprite {
		
		private var play_mc:MovieClip;
		private var pause_mc:MovieClip;
		private var slide_mc:MovieClip;
		private var cursorTF:TextField;
		private var cursorFormat:TextFormat;
		
		public function set cursorText(txt:String):void {
			cursorTF.text = txt;
			cursorTF.width = cursorTF.textWidth + 4;
			cursorTF.height = cursorTF.textHeight + 4;
			switch (txt) {
				case "Play": {
					play_mc.visible = true;
					pause_mc.visible = false;
					slide_mc.visible = false;
					}
				break;
				case "Pause": {
					play_mc.visible = false;
					pause_mc.visible = true;
					slide_mc.visible = false;
					}
				break;
				default : {
					play_mc.visible = false;
					pause_mc.visible = false;
					slide_mc.visible = true;
					}
				break;
				}
			}
		
		public function Cursor() {
			buildCursor();
		}
		
		private function buildCursor():void {
			play_mc = new Play();
			this.addChild(play_mc);
			play_mc.visible = false;
			
			pause_mc = new Pause();
			this.addChild(pause_mc);
			pause_mc.x = 2;
			pause_mc.visible = true;
			
			slide_mc = new Slide();
			this.addChild(slide_mc);
			slide_mc.x = (slide_mc.width) / ( -2);
			slide_mc.visible = false;
			
			cursorFormat = new TextFormat("Arial", Object(12), Object(0x0099FF));
			cursorTF = new TextField();
			cursorTF.defaultTextFormat = cursorFormat;
			cursorTF.antiAliasType = AntiAliasType.ADVANCED;
			cursorTF.selectable = false;
			cursorTF.autoSize = "left";
			cursorTF.text = "Pause";
			cursorTF.width = cursorTF.textWidth + 4;
			cursorTF.height = cursorTF.textHeight + 4;
			cursorTF.x = play_mc.width + 2;
			cursorTF.y = (play_mc.height - cursorTF.height) / 2;
			this.addChild(cursorTF);
		}
	}
}