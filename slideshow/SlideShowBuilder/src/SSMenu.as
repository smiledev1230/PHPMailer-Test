package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.MouseEvent;
	import flash.geom.Rectangle;
	import src.SSButton;
	
	public class SSMenu extends Sprite {
		
		private var txtBtn:MenuButton;
		private var imgBtn:MenuButton;
		private var imgURLBtn:MenuButton;
		
		public var plContainer:Sprite;
		public var pltxt:SSPlaylist;
		public var plimg:SSPlaylist;
		public var plimgURL:SSPlaylist;
		private var currentPl:SSPlaylist;
		
		private var slider:SSButton;
		private var sliderPath:Rectangle = new Rectangle( -3, 45, 0, 207);
		
		
		
		public function SSMenu() {
			init();
		}
		
		private function init():void {
			
			txtBtn = new MenuButton();
			txtBtn.x = 25;
			this.addChild(txtBtn);
			txtBtn.id = 1;
			txtBtn.addEventListener(MouseEvent.CLICK, toggleList);
			
			imgBtn = new MenuButton();
			imgBtn.x = 92;
			this.addChild(imgBtn);
			imgBtn.id = 2;
			imgBtn.addEventListener(MouseEvent.CLICK, toggleList);
			
			imgURLBtn = new MenuButton();
			imgURLBtn.x = 159;
			this.addChild(imgURLBtn);
			imgURLBtn.id = 3;
			imgURLBtn.addEventListener(MouseEvent.CLICK, toggleList);
			
			buildPlaylists();
		}
		
		private function buildPlaylists():void {
			plContainer = new Sprite();
			plContainer.x = 20;
			plContainer.y = 45;
			addChild(plContainer);
			
			pltxt = new SSPlaylist();
			pltxt.x = 5;
			plContainer.addChild(pltxt);
			pltxt.visible = false;
			
			plimg = new SSPlaylist();
			plimg.x = 5;
			plContainer.addChild(plimg);
			plimg.visible = false;
			
			plimgURL = new SSPlaylist();
			plimgURL.x = 5;
			plContainer.addChild(plimgURL);
			plimgURL.visible = false;
			
			var plMask:MovieClip = new Blank_Mask();
			plMask.x = 20;
			plMask.y = 45;
			plMask.width = 200;
			plMask.height = 220;
			addChild(plMask);
			plContainer.mask = plMask;
			
			addScroll();
		}
		
		private function addScroll():void {
			var a:MovieClip = new Slider_Out();
			var b:MovieClip = new Slider_Over();
			slider = new SSButton(a, b);
			slider.x = -3;
			slider.y = 45;
			addChild(slider);
			slider.buttonMode = true;
			slider.useHandCursor = true;
			slider.visible = false;
			slider.addEventListener(MouseEvent.MOUSE_DOWN, handleSliderDown);
		}
		
		private function handleSliderDown(e:MouseEvent):void {
			slider.removeEventListener(MouseEvent.MOUSE_DOWN, handleSliderDown);
			this.addEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			this.addEventListener(MouseEvent.MOUSE_UP, handleSliderUp);
			stage.addEventListener(MouseEvent.MOUSE_UP, handleSliderUp);
			stage.addEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			slider.addEventListener(MouseEvent.MOUSE_UP, handleSliderUp);
			slider.startDrag(false, sliderPath);
		}
		
		private function handleSliderUp(e:MouseEvent):void {
			slider.removeEventListener(MouseEvent.MOUSE_UP, handleSliderUp);
			this.removeEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			this.removeEventListener(MouseEvent.MOUSE_UP, handleSliderUp);
			stage.removeEventListener(MouseEvent.MOUSE_UP, handleSliderUp);
			stage.removeEventListener(MouseEvent.MOUSE_MOVE, getPosition);
			slider.stopDrag();
			slider.addEventListener(MouseEvent.MOUSE_DOWN, handleSliderDown);
		}
		
		private function getPosition(e:MouseEvent):void {
			var percent:Number = (slider.y - 45) / 207;
			currentPl.y = 0 - (currentPl.itemsadded * 23 - 220) * percent;
		}
		
		private function toggleList(e:MouseEvent):void {
			switch (e.currentTarget) {
				case txtBtn: {
					txtBtn.select = true;
					pltxt.visible = true;
					imgBtn.select = false;
					plimg.visible = false;
					imgURLBtn.select = false;
					plimgURL.visible = false;
					currentPl = pltxt;
					}
				break;
				case imgBtn: {
					txtBtn.select = false;
					pltxt.visible = false;
					imgBtn.select = true;
					plimg.visible = true;
					imgURLBtn.select = false;
					plimgURL.visible = false;
					currentPl = plimg;
					}
				break;
				case imgURLBtn: {
					txtBtn.select = false;
					pltxt.visible = false;
					imgBtn.select = false;
					plimg.visible = false;
					imgURLBtn.select = true;
					plimgURL.visible = true;
					currentPl = plimgURL;
					}
				break;
			}
		if (currentPl.itemsadded * 23 > 220) slider.visible = true; 
			else slider.visible = false;
		pltxt.y = 0;
		plimg.y = 0;
		plimgURL.y = 0;
		slider.y = 45;
		}
	}
}