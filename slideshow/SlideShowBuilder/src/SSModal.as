package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import src.RadioList;
	import src.SSCheckBox;
	import src.SSButton;
	import src.BuilderEvents.BuilderEvent;
	import src.SSItem;
	import src.UploadButton;
	
	public class SSModal extends Sprite {
		
		private var bg:MovieClip;
		private var nameTF:TextField;
		private var nameFormat:TextFormat;
		private var basicFormat:TextFormat;
		private var itemTypeRadio:RadioList;
		private var titleTF:TextField;
		private var contentTF:TextField;
		private var dimensionsTF:TextField;
		private var stDimRadio:RadioList;
		private var defDimRadio:RadioList;
		private var urlTF:TextField;
		private var alignRadio:RadioList;
		private var neighborsCB:SSCheckBox;
		private var highlightCB:SSCheckBox;
		private var ssposXTF:TextField;
		private var ssposYTF:TextField;
		private var currentItem:SSItem;
		
		private var uploadImgBtn:UploadButton;
		private var saveBtn:SButton;
		private var cancelBtn:SButton;
		
		public var item:SSItem;
		public var saveditem:SSItem;
		private var standardSize:Boolean;
		private var item_is_valid:Boolean = false;
		
		public function set useStandardSizes(b:Boolean):void { 
			standardSize = b; 
			if (standardSize) {
				dimensionsTF.visible = false;
				stDimRadio.visible = true;
				defDimRadio.visible = false;
				}
				else {
					stDimRadio.visible = false;
					defDimRadio.visible = true;
					if (defDimRadio.selection == 3) dimensionsTF.visible = true;
					}
			}
		
		public function get savedObject():SSItem { return saveditem; }
		
		
		
		public function SSModal(currentItem:SSItem=null) {
			if(currentItem) this.currentItem = currentItem;
			init();
		}
		
		private function init():void {
			bg = new Modal_Bg();
			this.addChild(bg);
			
			addName();
		}
		
		private function addName():void {
			nameFormat = new TextFormat();
			nameFormat.size = 20;
			nameFormat.font = "Arial";
			nameTF = new TextField();
			nameTF.defaultTextFormat = nameFormat;
			if (currentItem) nameTF.text = "Item " + String(currentItem.id);
				else nameTF.text = "New Item";
			nameTF.textColor = 0xFFFFFF;
			nameTF.selectable = false;
			nameTF.x = 20;
			nameTF.y = 10;
			this.addChild(nameTF);
			
			basicFormat = new TextFormat();
			basicFormat.size = 14;
			basicFormat.font = "Arial";
			
			addType();
		}
		
		private function addType():void {
			var types:Array = ["Text", "Image", "Image with URL"];
			itemTypeRadio = new RadioList(types, "horizontal");
			itemTypeRadio.x = 100;
			itemTypeRadio.y = 50;
			this.addChild(itemTypeRadio);
			itemTypeRadio.addEventListener(BuilderEvent.RADIOSTATECHANGED, handleTypeChanged);
			
			if (currentItem){
				switch (currentItem.type) {
					case "1": itemTypeRadio.selection=0;
					break;
					case "2": itemTypeRadio.selection=1;
					break;
					case "3": itemTypeRadio.selection=2;
					break;
					}
			}	
			addTitle();
		}
		
		private function addTitle():void {
			titleTF = new TextField();
			titleTF.defaultTextFormat = basicFormat;
			titleTF.type = "input";
			titleTF.x = 100;
			titleTF.y = 80;
			titleTF.width = 300;
			titleTF.height = 20;
			titleTF.background = true;
			titleTF.backgroundColor = 0x555555;
			titleTF.textColor = 0xFFFFFF;
			if(currentItem) titleTF.text = currentItem.title;
			this.addChild(titleTF);
			
			addContent();
		}		
		
		private function addContent():void {
			contentTF = new TextField();
			contentTF.defaultTextFormat = basicFormat;
			contentTF.type = "input";
			contentTF.x = 125;
			contentTF.y = 110;
			contentTF.width = 300;
			contentTF.height = 20;
			contentTF.background = true;
			contentTF.backgroundColor = 0x555555;
			contentTF.textColor = 0xFFFFFF;
			if(currentItem) contentTF.text = currentItem.content;
			this.addChild(contentTF);
			
			addDimensions();
		}
			
		private function addDimensions():void {
			dimensionsTF = new TextField();
			dimensionsTF.defaultTextFormat = basicFormat;
			dimensionsTF.type = "input";
			dimensionsTF.x = 410;
			dimensionsTF.y = 140;
			dimensionsTF.width = 120;
			dimensionsTF.height = 20;
			dimensionsTF.background = true;
			dimensionsTF.backgroundColor = 0x555555;
			dimensionsTF.textColor = 0xFFFFFF;
			this.addChild(dimensionsTF);
			dimensionsTF.visible = false;
			
			var st_dim:Array = ["Portrait", "Small Landscape", "Large Landscape"];
			stDimRadio = new RadioList(st_dim, "horizontal");
			stDimRadio.x = 100;
			stDimRadio.y = 140;
			this.addChild(stDimRadio);
			
			var def_dim:Array = ["Fit", "Actual Size", "Random", "Custom"];
			defDimRadio = new RadioList(def_dim, "horizontal");
			defDimRadio.x = 100;
			defDimRadio.y = 140;
			this.addChild(defDimRadio);
			defDimRadio.addEventListener(BuilderEvent.RADIOSTATECHANGED, handleDEFDIMChanged);
			
			if (standardSize) {
				dimensionsTF.visible = false;
				stDimRadio.visible = true;
				defDimRadio.visible = false;
				if(currentItem){
					switch (currentItem.resize) {
						case "200x260": stDimRadio.selection = 0;
						break;
						case "200x120": stDimRadio.selection = 1;
						break;
						case "420x260": stDimRadio.selection = 2;
						break;
						}
				}
			}
				else {
					stDimRadio.visible = false;
					defDimRadio.visible = true;
					dimensionsTF.visible = false;
					if(currentItem){
						switch(currentItem.resize) {
							case "0": defDimRadio.selection = 0;
							break;
							case "1": defDimRadio.selection = 1;
							break;
							case "2": defDimRadio.selection = 2;
							break;
							}
						if (currentItem.resize.length > 1) {
							defDimRadio.selection = 3;
							dimensionsTF.visible = true;
							dimensionsTF.text = currentItem.resize;
							}
					}
					}
			
			addURL();
		}
		
		private function addURL():void {
			urlTF = new TextField();
			urlTF.defaultTextFormat = basicFormat;
			urlTF.type = "input";
			urlTF.x = 120;
			urlTF.y = 170;
			urlTF.width = 300;
			urlTF.height = 20;
			urlTF.background = true;
			urlTF.backgroundColor = 0x555555;
			urlTF.textColor = 0xFFFFFF;
			if(currentItem) urlTF.text = currentItem.navURL;
			this.addChild(urlTF);
			
			addAlign();
		}
			
		private function addAlign():void {
			var alignaments:Array = ["Up", "Down", "Center", "Random"];
			alignRadio = new RadioList(alignaments, "horizontal");
			alignRadio.x = 145;
			alignRadio.y = 200;
			this.addChild(alignRadio);
			
			if (currentItem) {
				switch (currentItem.align) {
					case "UP": alignRadio.selection = 0;
					break;
					case "DOWN":alignRadio.selection = 1;
					break;
					case "CENTER": alignRadio.selection = 2;
					break;
					case "RANDOM": alignRadio.selection = 3;
					break;
					}
				}
				
			addNeighbors();
		}	
			
		private function addNeighbors():void {
			neighborsCB = new SSCheckBox("Allow Neighbors", false);
			neighborsCB.x = 20;
			neighborsCB.y = 230;
			this.addChild(neighborsCB);
			
			if (currentItem && currentItem.allowNeighbors != "0") neighborsCB.selection = true;
			
			addHighlight();
		}	
			
		private function addHighlight():void {
			highlightCB = new SSCheckBox("Highlight Item", false);
			highlightCB.x = 20;
			highlightCB.y = 260;
			this.addChild(highlightCB);
			
			if (currentItem && currentItem.highlight != "0") highlightCB.selection = true;
			
			addPos();
		}	
			
		private function addPos():void {
			ssposXTF = new TextField();
			ssposXTF.defaultTextFormat = basicFormat;
			ssposXTF.type = "dynamic";
			ssposXTF.x = 205;
			ssposXTF.y = 290;
			ssposXTF.textColor = 0xFFFFFF;
			ssposXTF.restrict = "0-9";
			this.addChild(ssposXTF);
			
			ssposYTF = new TextField();
			ssposYTF.defaultTextFormat = basicFormat;
			ssposYTF.type = "dynamic";
			ssposYTF.x = 205;
			ssposYTF.y = 320;
			ssposYTF.restrict = "0-9";
			ssposYTF.textColor = 0xFFFFFF;
			this.addChild(ssposYTF);
			
			if (currentItem) {
				ssposXTF.text = String(currentItem.ssPosX);
				ssposYTF.text = String(currentItem.ssPosY);
				}
			
			addButtons();
		}
			
		private function addButtons():void {
			saveBtn = new SButton("Save");
			saveBtn.x = 350;
			saveBtn.y = 305;
			this.addChild(saveBtn);
			saveBtn.addEventListener(MouseEvent.CLICK, savePressed);
			
			cancelBtn = new SButton("Cancel");
			cancelBtn.x = 420;
			cancelBtn.y = 305;
			this.addChild(cancelBtn);
			cancelBtn.addEventListener(MouseEvent.CLICK, cancelPressed);
			
			uploadImgBtn = new UploadButton();
			uploadImgBtn.x = 538;
			uploadImgBtn.y = 50;
			this.addChild(uploadImgBtn);
			uploadImgBtn.addEventListener(BuilderEvent.FILEUPLOADED, handleFileUploaded);
			
			if(currentItem) handleRestrictions();
		}	
		
		private function handleRestrictions():void {
			switch (itemTypeRadio.selection) {
				case 0: { 
					titleTF.type = "input";
					contentTF.type = "input";
					defDimRadio.disable(); 
					defDimRadio.disable(); 
					stDimRadio.disable(); 
					uploadImgBtn.setInactive(); 
					highlightCB.enable(); 
					}
				break;
				case 1: { 
					titleTF.type = "dynamic";
					contentTF.type = "dynamic";
					urlTF.type = "dynamic";
					defDimRadio.enable(); 
					stDimRadio.enable(); 
					uploadImgBtn.setActive(); 
					highlightCB.disable(); }
				break;
				case 2: { 
					titleTF.type = "dynamic";
					contentTF.type = "dynamic";
					urlTF.type = "input";
					defDimRadio.enable(); 
					stDimRadio.enable(); 
					uploadImgBtn.setActive(); 
					highlightCB.disable(); }
				break;
				}
		}
			
			

		
		private function handleTypeChanged(e:Event):void {
			var radio:RadioList = RadioList(e.currentTarget);
			if (currentItem) {
				currentItem.type = String(radio.selection + 1);
			}
			handleRestrictions();
		}
		
		private function handleDEFDIMChanged(e:Event):void {
			var radio:RadioList = RadioList(e.currentTarget);
			if (radio.selection == 3) dimensionsTF.visible = true;
				else dimensionsTF.visible = false;
		}
		
		private function cancelPressed(e:MouseEvent):void {
			this.visible = false;
		}
		
		private function handleFileUploaded(e:Event):void {
			contentTF.text = 'uploads/' + uploadImgBtn.fileName;
		}
		
		private function savePressed(e:MouseEvent):void {
			switch (itemTypeRadio.selection) {
				case 0: { if (testTextItem()) {  
							this.visible = false; 
							if (currentItem) dispatchEvent(new BuilderEvent(BuilderEvent.ITEMSAVED)); 
								else dispatchEvent(new BuilderEvent(BuilderEvent.NEWITEMSAVED));
							} 
						}
				break;
				case 1: { if (testImgItem()) { 
							this.visible = false; 
							if (currentItem) dispatchEvent(new BuilderEvent(BuilderEvent.ITEMSAVED)); 
								else dispatchEvent(new BuilderEvent(BuilderEvent.NEWITEMSAVED)); 
							} 
						}
				break;
				case 2: { if (testImgURLItem()) { 
							this.visible = false; 
							if (currentItem) dispatchEvent(new BuilderEvent(BuilderEvent.ITEMSAVED)); 
								else dispatchEvent(new BuilderEvent(BuilderEvent.NEWITEMSAVED)); 
							} 
						}
				break;
				}
		}
		
		private function testTextItem():Boolean {
			if (titleTF.text.length > 1) 
				if (contentTF.text.length > 1)
					if (urlTF.text.length > 1) item_is_valid = true;
			if (item_is_valid) {
				if(currentItem){
					if (highlightCB.selected) currentItem.highlight = "1";
						else currentItem.highlight = "0";
						
					currentItem.title = titleTF.text;
					currentItem.content = contentTF.text;
					currentItem.resize = "1";
					currentItem.navURL = urlTF.text;
					
					if (neighborsCB.selected) currentItem.allowNeighbors = "1";
						else currentItem.allowNeighbors = "0";
					
					switch (alignRadio.selection) {
						case 0: currentItem.align = "UP";
						break;
						case 1: currentItem.align = "DOWN";
						break;
						case 2: currentItem.align = "CENTER";
						break;
						default: currentItem.align = "RANDOM";
						break;
						}
				}
				else {
					var type:String = "1";
					var highlight:String;
					if (highlightCB.selected) highlight = "1";
						else highlight = "0";
					var title:String = titleTF.text;
					var content:String = contentTF.text;
					var resize:String = "1";
					var url:String = urlTF.text;
					var allowneighbors:String;
					if (neighborsCB.selected) allowneighbors = "1";
						else allowneighbors = "0";
					var align:String;
					switch (alignRadio.selection) {
						case 0: align = "UP";
						break;
						case 1: align = "DOWN";
						break;
						case 2: align = "CENTER";
						break;
						default: align = "RANDOM";
						break;
						}
					saveditem = new SSItem(0, type, highlight, title, content, resize, url);
					saveditem.align = align;
					saveditem.allowNeighbors = allowneighbors;
					}
				}
			return item_is_valid;
		}
		
		private function testImgItem():Boolean {
			if (contentTF.text.length > 1) item_is_valid = true;
			if (item_is_valid) {
				if(currentItem){
					currentItem.title = "0";
					currentItem.highlight = "0";
					currentItem.content = contentTF.text;
					
					if (standardSize) {
						switch (stDimRadio.selection) {
							case 0: currentItem.resize = "200x260";
							break;
							case 1: currentItem.resize = "200x120";
							break;
							case 2: currentItem.resize = "420x260";
							break;
							}
						}
						else {
							switch(defDimRadio.selection) {
								case 0: currentItem.resize = "0";
								break;
								case 1: currentItem.resize = "1";
								break;
								case 2: currentItem.resize = "2";
								break;
								case 3: currentItem.resize = dimensionsTF.text;
								break;
								default: currentItem.resize = "1";
								break;
								}
							}
					currentItem.navURL = "0";
					
					if (neighborsCB.selected) currentItem.allowNeighbors = "1";
						else currentItem.allowNeighbors = "0";
					
					switch (alignRadio.selection) {
						case 0: currentItem.align = "UP";
						break;
						case 1: currentItem.align = "DOWN";
						break;
						case 2: currentItem.align = "CENTER";
						break;
						default: currentItem.align = "RANDOM";
						break;
						}
				}
				else {
					var type:String = "2";
					var title:String = "0";
					var highlight:String = "0";
					var content:String = contentTF.text;
					var resize:String;
					if (standardSize) {
						switch (stDimRadio.selection) {
							case 0: resize = "200x260";
							break;
							case 1: resize = "200x120";
							break;
							case 2: resize = "420x260";
							break;
							}
						}
						else {
							switch(defDimRadio.selection) {
								case 0: resize = "0";
								break;
								case 1: resize = "1";
								break;
								case 2: resize = "2";
								break;
								case 3: resize = dimensionsTF.text;
								break;
								default: resize = "1";
								break;
								}
							}
					var url:String = "0";
					var allowneighbors:String;
					if (neighborsCB.selected) allowneighbors = "1";
						else allowneighbors = "0";
					var align:String;
					switch (alignRadio.selection) {
						case 0: align = "UP";
						break;
						case 1: align = "DOWN";
						break;
						case 2: align = "CENTER";
						break;
						default: align = "RANDOM";
						break;
						}
					saveditem = new SSItem(0, type, highlight, title, content, resize, url);
					saveditem.align = align;
					saveditem.allowNeighbors = allowneighbors;
					}
			}
			return item_is_valid;
		}
		
		private function testImgURLItem():Boolean {
			if (contentTF.text.length > 1)
				if (urlTF.text.length > 1) item_is_valid = true;
			if (item_is_valid) {
				if(currentItem){
					currentItem.title = "0";
					currentItem.highlight = "0";
					currentItem.content = contentTF.text;
					
					if (standardSize) {
						switch (stDimRadio.selection) {
							case 0: currentItem.resize = "200x260";
							break;
							case 1: currentItem.resize = "200x120";
							break;
							case 2: currentItem.resize = "420x260";
							break;
							}
						}
						else {
							switch(defDimRadio.selection) {
								case 0: currentItem.resize = "0";
								break;
								case 1: currentItem.resize = "1";
								break;
								case 2: currentItem.resize = "2";
								break;
								case 3: currentItem.resize = dimensionsTF.text;
								break;
								default: currentItem.resize = "1";
								break;
								}
							}
					
					
					currentItem.navURL = urlTF.text;
					
					if (neighborsCB.selected) currentItem.allowNeighbors = "1";
						else currentItem.allowNeighbors = "0";
					
					switch (alignRadio.selection) {
						case 0: currentItem.align = "UP";
						break;
						case 1: currentItem.align = "DOWN";
						break;
						case 2: currentItem.align = "CENTER";
						break;
						default: currentItem.align = "RANDOM";
						break;
						}
				}
				else {
					var type:String = "3";
					var title:String = "0";
					var highlight:String = "0";
					var content:String = contentTF.text;
					var resize:String;
					if (standardSize) {
						switch (stDimRadio.selection) {
							case 0: resize = "200x260";
							break;
							case 1: resize = "200x120";
							break;
							case 2: resize = "420x260";
							break;
							}
						}
						else {
							switch(defDimRadio.selection) {
								case 0: resize = "0";
								break;
								case 1: resize = "1";
								break;
								case 2: resize = "2";
								break;
								case 3: resize = dimensionsTF.text;
								break;
								default: resize = "1";
								break;
								}
							}
					var url:String = urlTF.text;
					var allowneighbors:String;
					if (neighborsCB.selected) allowneighbors = "1";
						else allowneighbors = "0";
					var align:String;
					switch (alignRadio.selection) {
						case 0: align = "UP";
						break;
						case 1: align = "DOWN";
						break;
						case 2: align = "CENTER";
						break;
						default: align = "RANDOM";
						break;
						}
					saveditem = new SSItem(0, type, highlight, title, content, resize, url);
					saveditem.align = align;
					saveditem.allowNeighbors = allowneighbors;
					}
			}
			return item_is_valid;
		}
	}
}
