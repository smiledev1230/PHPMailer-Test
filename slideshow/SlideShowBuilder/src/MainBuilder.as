

package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.net.URLLoader;
	import flash.net.URLRequest;
	import flash.events.IOErrorEvent;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import src.BuilderEvents.BuilderEvent;
	import src.SButton;
	import src.SSButton;
	import src.SSPlaylist;
	import src.SSModal;
	import flash.net.URLRequestMethod;
	import flash.net.URLVariables;
	import src.SSColumn;
	import flash.system.Security;
	import flash.system.SecurityDomain;
	
	
	public class MainBuilder extends Sprite {
		
		private var itemsMenu:SSMenu;
		private var modal:SSModal;
		
		private var ssXML:XML;
		private var builtXML:XML;
		private var colXML:XML;
		private var xmlLoader:URLLoader;
		private var xmlURL:String = "slideshowplaylist.xml";
		private var colLoader:URLLoader;
		private var colURL:String = "columns.xml";
		private var items:Array;
		private var loadedItems:int = 0;
		private var currentY:int = 0;
		
		private var xmlString:String;
		private var slideshowxml:String;
		
		private var speed:String;
		private var speedMeter:SSSpeedMeter;
		private var chrono_order:Boolean;
		private var CheckBoxChrono:SSCheckBox;
		private var navtype:String;
		private var navRadio:RadioList;
		private var standardSize:Boolean;
		private var CheckBoxStd:SSCheckBox;
		private var customPositioning:Boolean;
		private var CheckBoxCP:SSCheckBox;
		private var saveXMLBtn:SSButton;
		
		private var prevItem:PreviewItem;
		private var addNewItemButton:SSButton;
		
		private var customBuilder:PositioningModule;
		private var columnXmlLoaded:Boolean = false;
		private var itemGallery:ItemGal = new ItemGal();
		
		
		public function MainBuilder() {
			buildUI();
		}
		
		private function buildUI():void {
			itemsMenu = new SSMenu();
			itemsMenu.x = 310;
			itemsMenu.y = 30;
			addChild(itemsMenu);
			
			addNewItemButton = new SSButton(new NewItem_Out(), new NewItem_Over());
			addNewItemButton.x = 338;
			addNewItemButton.y = 300;
			addChild(addNewItemButton);
			addNewItemButton.addEventListener(MouseEvent.CLICK, handleNewItem);
			
			prevItem = new PreviewItem("1", "1", "1", "1");
			addChild(prevItem);
			prevItem.x = 690 + (250 - prevItem.width) / 2;
			prevItem.y = 75 + (220 - prevItem.height) / 2;
			prevItem.visible = false;
			
			customBuilder = new PositioningModule();
			customBuilder.x = 50;
			customBuilder.y = 340;
			addChild(customBuilder);
			customBuilder.visible = false;
			customBuilder.addEventListener(BuilderEvent.DISPLAYAVAILABLEITEMS, handleItemAssignament);
			
			itemGallery.x = (stage.stageWidth - itemGallery.width) / 2;
			itemGallery.y = (stage.stageHeight - itemGallery.height) / 2;
			addChild(itemGallery);
			itemGallery.visible = false;
			itemGallery.addEventListener(BuilderEvent.ITEMSELECTEDFROMGAL, handleGalItemsSelected);
			
			loadXML();
		}
		
		private function loadXML():void {
			xmlLoader = new URLLoader();
			xmlLoader.load(new URLRequest(xmlURL));
			xmlLoader.addEventListener(Event.COMPLETE, XMLLoaded);
			xmlLoader.addEventListener(IOErrorEvent.IO_ERROR, XMLNotLoaded);
		}
		
		private function XMLNotLoaded(e:IOErrorEvent):void {
			trace("XML file not found");
		}
		
		private function XMLLoaded(e:Event):void {
			builtXML = XML(e.currentTarget.data);
			items = new Array();
			
			speed = String(builtXML.children()[0].children()[0]);
			var s:int = int(speed);
			speedMeter = new SSSpeedMeter(s);
			speedMeter.x = 45;
			speedMeter.y = 95;
			addChild(speedMeter);
			if (builtXML.children()[0].children()[1] == "0") chrono_order = false;
				else chrono_order = true;
			CheckBoxChrono = new SSCheckBox("Keep chronological order of objects", chrono_order);
			CheckBoxChrono.x = 16;
			CheckBoxChrono.y = 120;
			addChild(CheckBoxChrono);
			
			navtype = String(builtXML.children()[0].children()[2]);
			var navs:Array = ["Same Window", "New Window"];
			navRadio = new RadioList(navs, "vertical");
			navRadio.x = 16;
			navRadio.y = 175;
			addChild(navRadio);
			navRadio.selection = int(navtype);
			
			if (builtXML.children()[0].children()[3] == "0") standardSize = false;
				else standardSize = true;
			CheckBoxStd = new SSCheckBox("Use standard sizes", standardSize);
			CheckBoxStd.x = 16;
			CheckBoxStd.y = 225;
			CheckBoxStd.selection = standardSize;
			addChild(CheckBoxStd);
			CheckBoxStd.addEventListener(BuilderEvent.CBSTATECHANGED, handleStandardChanged);
			
			if (builtXML.children()[0].children()[4] == "0") customPositioning = false;
				else { customPositioning = true; customBuilder.visible = true; }
			CheckBoxCP = new SSCheckBox("Use custom positioning", customPositioning);
			CheckBoxCP.x = 16;
			CheckBoxCP.y = 250;
			CheckBoxCP.selection = customPositioning;
			addChild(CheckBoxCP);
			CheckBoxCP.addEventListener(BuilderEvent.CBSTATECHANGED, handleCustomPosChanged);
			
			var a:MovieClip = new Save_Off();
			var b:MovieClip = new Save_Over();
			saveXMLBtn = new SSButton(a, b);
			saveXMLBtn.x = 16;
			saveXMLBtn.y = 280;
			addChild(saveXMLBtn);
			saveXMLBtn.buttonMode = true;
			saveXMLBtn.addEventListener(MouseEvent.CLICK, startSaveProcess);
			
			var currentItem:SSItem;
			if(builtXML.children()[1].children().length()>0){
				for (var i:int = 0; i < builtXML.children()[1].children().length(); i++ ) {
					var itm_type:String = String(builtXML.children()[1].children()[i].children()[0]);
					var itm_highl:String = String(builtXML.children()[1].children()[i].children()[1]);
					var itm_title:String = String(builtXML.children()[1].children()[i].children()[2]);
					var itm_content:String = String(builtXML.children()[1].children()[i].children()[3]);
					var itm_resize:String = String(builtXML.children()[1].children()[i].children()[4]);
					var itm_navURL:String = String(builtXML.children()[1].children()[i].children()[5]);
					currentItem = new SSItem(i, itm_type, itm_highl, itm_title, itm_content, itm_resize, itm_navURL);
					currentItem.addEventListener(BuilderEvent.ITEMREADY, handleItemReady);
					items.push(currentItem);
					currentItem.allowNeighbors = builtXML.children()[1].children()[i].children()[6];
					currentItem.align = builtXML.children()[1].children()[i].children()[7];
					currentItem.navigation = navtype;
				}
			}
		}
		
		private function handleNewItem(e:MouseEvent):void {
			modal = new SSModal();
			modal.useStandardSizes = standardSize;
			modal.x = 180;
			modal.y = 125;
			addChild(modal);
			modal.addEventListener(BuilderEvent.NEWITEMSAVED, handleNewItemSaved);
		}
		
		private function handleNewItemSaved(e:Event):void {
			var newItem:SSItem = modal.savedObject;
			modal.removeEventListener(BuilderEvent.NEWITEMSAVED, handleNewItemSaved);
			removeChild(modal);
			items.push(newItem);
			newItem.ident = int(items.length - 1);
			newItem.navigation = navtype;
			switch (newItem.type) {
				case "1": itemsMenu.pltxt.addItem(newItem);
				break;
				case "2": itemsMenu.plimg.addItem(newItem);
				break;
				case "3": itemsMenu.plimgURL.addItem(newItem);
				break;
				}
			newItem.addEventListener(BuilderEvent.EDITITEM, handleEditItem);
			newItem.addEventListener(BuilderEvent.PREVIEWITEM, handlePreviewItem);
			newItem.addEventListener(BuilderEvent.DELETEITEM, handleDeleteItem);
		}
		
		private function handleStandardChanged(e:Event):void {
			if (modal)
				if (modal.visible) modal.useStandardSizes = CheckBoxStd.selected;
		}
		
		private function handleCustomPosChanged(e:Event):void {
			if (CheckBoxCP.selected) {customBuilder.visible = true; customPositioning=true;}
				else{ customBuilder.visible = false; customPositioning=false;}
		}
		
		private function handleItemReady(e:Event):void {
			var item:SSItem = SSItem(e.currentTarget);
			switch (item.type) {
				case "1": itemsMenu.pltxt.addItem(item);
				break;
				case "2": itemsMenu.plimg.addItem(item);
				break;
				case "3": itemsMenu.plimgURL.addItem(item);
				break;
				}
			item.addEventListener(BuilderEvent.EDITITEM, handleEditItem);
			item.addEventListener(BuilderEvent.PREVIEWITEM, handlePreviewItem);
			item.addEventListener(BuilderEvent.DELETEITEM, handleDeleteItem);
			loadedItems++;
			if (loadedItems == builtXML.children()[1].children().length() && customPositioning) importColXml();
		}
		
		private function importColXml() {
			colLoader = new URLLoader();
			colLoader.load(new URLRequest(colURL));
			colLoader.addEventListener(Event.COMPLETE, colLoaded);
			colLoader.addEventListener(IOErrorEvent.IO_ERROR, colNotLoaded);
		}
		
		private function colNotLoaded(e:IOErrorEvent):void {
			trace("columns.xml could not be loaded");
			}
		
		private function colLoaded(e:Event):void {
			colXML = XML(e.currentTarget.data);
			var iC = 4; //indice coloana
			trace('lvl 1: ' + colXML.name());
			trace('lvl 2: ' + colXML.children()[iC].name()); // schimbi 5 in indicele coloanei primul for
			trace('lvl 3: ' + colXML.children()[iC].children()[0].name()); // 0 pt settings 1 pt items(ultimul 0)
			trace('lvl 4 - column type : ' + colXML.children()[iC].children()[0].children()[1]);
//			trace('lvl 4 - item id: ' + colXML.children()[iC].children()[1].children()[0]);
			trace('column length + seetings included: ' + colXML.children()[iC].children().length()); //al doilea for.. numar de iteme +1 (settings)
			
			var column:SSColumn;
			trace('numar coloane ' + colXML.children().length());
/*numar*/	if(colXML.children()[0] && colXML.children().length()){
/*coloane*/	for (var i:int = 0; i < colXML.children().length(); i++ ) {
				trace('column ' + i + ' type: ' + colXML.children()[i].children()[0].children()[1]);
				customBuilder.addColumn(int(colXML.children()[i].children()[0].children()[1]));
				customBuilder.columns[i].alignament = String((colXML.children()[i].children()[0].children()[0]));
				for (var j:int = 1; j < colXML.children()[i].children().length() ; j++ ) {
					trace('item id: ' + colXML.children()[i].children()[j].children()[0]);
					trace(customBuilder.columns[i].items[j-1]);
					var currentCol:SSColumn = customBuilder.columns[i];
///*item id*/			currentItem.appendItem(items[int(colXML.children()[i].children()[j].children()[0])] );
					
					var contType:int = currentCol.items[j - 1].itemType;
					var itemType:int = int(items[int(colXML.children()[i].children()[j].children()[0])].type);
					if ((contType < 3 && itemType > 1) || (contType == 3 && itemType == 1)) {
						trace('containerul e de tip:' + contType + ' si itemul e de tip: ' + itemType);
						currentCol.items[j - 1].appendItem(items[int(colXML.children()[i].children()[j].children()[0])] );
						}
					}
				}
			}
		}
		
		private function handleEditItem(e:Event):void {
			var item:SSItem = SSItem(e.currentTarget);
			modal = new SSModal(item);
			modal.useStandardSizes = standardSize;
			modal.x = 180;
			modal.y = 125;
			addChild(modal);
			modal.addEventListener(BuilderEvent.ITEMSAVED, handleItemSaved);
		}
		
		private function handlePreviewItem(e:Event):void {
			removeChild(prevItem);
			var item:SSItem = SSItem(e.currentTarget);
			prevItem = new PreviewItem(item.type, item.highlight, item.title, item.content);
			addChild(prevItem);
			prevItem.x = 690 + (250 - prevItem.width) / 2;
			prevItem.y = 75 + (220 - prevItem.height) / 2;
			prevItem.visible = true;
		}
		
		private function handleDeleteItem(e:Event):void {
			var item:SSItem = SSItem(e.currentTarget);
			var indexToBeRemoved:int = -1;
			for (var i:int = 0; i < items.length; i++ ) {
				if (items[i] == item) {
					items.splice(i, 1);
					indexToBeRemoved = i;
					trace('index to be removed is: ' + indexToBeRemoved);
					}
				}
			itemsMenu.pltxt.removeAll();
			itemsMenu.plimg.removeAll();
			itemsMenu.plimgURL.removeAll();
			for ( i = 0; i < items.length; i++ ) {
				items[i].ident = i;
				switch (items[i].type) {
				case "1": itemsMenu.pltxt.addItem(items[i]);
				break;
				case "2": itemsMenu.plimg.addItem(items[i]);
				break;
				case "3": itemsMenu.plimgURL.addItem(items[i]);
				break;
				}
			}
			
			trace('before item removal');
			for (i = 0; i < customBuilder.columns.length; i++) {
				for (var j:int = 0; j < customBuilder.columns[i].items.length; j++ ) {
					if (customBuilder.columns[i].items[j].contentId == indexToBeRemoved) {
						customBuilder.columns[i].items[j].removeItem();
						trace('found the item and removed it');
						}
						else {
							if (customBuilder.columns[i].items[j].contentId > indexToBeRemoved) {
								var id:int = customBuilder.columns[i].items[j].contentId;
								id -= 1;
								customBuilder.columns[i].items[j].contentId = id;
								trace('decremented the higher ids');
								}
							}
					}
				}
		}
		
		private function handleItemSaved(e:Event):void {
			modal.removeEventListener(BuilderEvent.ITEMSAVED, handleItemSaved);
			removeChild(modal);
		}
		
		private function handleItemAssignament(e:BuilderEvent):void {
			var oType:int = e.arg[2];
			if (oType == 3) {
				itemGallery.getItems(items, 1);
				}
				else itemGallery.getItems(items, 2);
		}
		
		private function handleGalItemsSelected(e:BuilderEvent):void {
			trace(e.arg[0]);
			var targetItem:int = int(e.arg[0]);
			items[targetItem].selected = true;
			customBuilder.currentColumn.currentItem.appendItem(items[targetItem]);
		}
		
		private function startSaveProcess(e:MouseEvent):void {
		trace("intra start save");
			
			if (customPositioning) {
				xmlString = '<?xml version="1.0"?>'+'\n'+'<POSITIONS>' + '\n';
				trace("trece de custom pos test");
				var xcolumn:Number = 10;
				for (var i:int = 0; i < customBuilder.columns.length; i++ ) {
					if (i > 0) xcolumn += (customBuilder.columns[i - 1].width) * 2;
					xmlString += '<COLUMN>' + '\n' + '<settings>' + '\n' + '<align>' + customBuilder.columns[i].alignament + '</align>' + '\n' + '<type>' + String(customBuilder.columns[i].type) + '</type>' + '\n' + '</settings>';
					for (var j:int = 0; j < customBuilder.columns[i].items.length; j++ ) {
						if (customBuilder.columns[i].items[j].contentId >(-1)) var itemid:String = '<itemid>' + String(customBuilder.columns[i].items[j].contentId) + '</itemid>' + '\n';
							else var itemid:String = '<itemid>' + "-1" + '</itemid>' + '\n';
						trace("id: " + itemid);
						var itemx:String = '<itemx>' + String(xcolumn+(customBuilder.columns[i].items[j].x) * 2) + '</itemx>' + '\n';
						var itemy:String = '<itemy>' + String((customBuilder.columns[i].items[j].y) * 2) + '</itemy>' + '\n';
						var itemw:String = '<itemw>' + String((customBuilder.columns[i].items[j].width) * 2) + '</itemw>' + '\n';
						var itemh:String = '<itemh>' + String((customBuilder.columns[i].items[j].height) * 2) + '</itemh>' + '\n';
						if (customBuilder.columns[i].items[j].itemType == 3 ) itemw = String(200.5);
						var itemnode:String = '<item>' + '\n' + itemid + '\n' + itemx + '\n' + itemy + '\n' + itemw + '\n' + itemh + '\n' +'</item>';
						xmlString += itemnode;
						xmlString += '\n';
						}
					xmlString += '</COLUMN>'+'\n';
					}
					xmlString += '</POSITIONS>';
				}
			var chron:String;
			var stdsize:String;
			var custpos:String;
			if (CheckBoxChrono.selected) chron = '1';
				else chron = "0";
			if (CheckBoxStd.selected) stdsize = '1';
				else stdsize = '0';
			if (CheckBoxCP.selected) custpos = '1';
				else custpos = '0';
			trace("before xml for");
			slideshowxml = '<?xml version="1.0"?>' + '\n' + '<SLIDESHOW>' + '\n' + '<SETTINGS>' + '\n' + '<speed>' + String(speedMeter.speedLevel) + '</speed>' + '\n' + '<chron>' + chron + '</chron>' + '\n' + '<navtype>' + String(navRadio.selection) + '</navtype>' + '\n' + '<standardsize>' + stdsize + '</standardsize>' + '\n' + '<custompos>' + custpos + '</custompos>' + '\n' + '</SETTINGS>' + '\n' + '<ITEMS>' + '\n';
			for (var k:int = 0; k < items.length; k++ ) {
				slideshowxml += '<item>' + '\n' + '<type>' + String(items[k].type) + '</type>' + '\n' + '<highlight>' + String(items[k].highlight) + '</highlight>' + '\n' + '<title>' + String(items[k].title) + '</title>' + '\n' + '<content>' + String(items[k].content) + '</content>' + '\n' + '<resize>' + String(items[k].resize) + '</resize>' + '\n' + '<navigate>' + items[k].navURL + '</navigate>' + '\n' + '<allowneighbors>' + items[k].allowNeighbors + '</allowneighbors>' + '\n' + '<align>' + items[k].align + '</align>' + '\n' + '</item>' + '\n';
				}
			slideshowxml += '</ITEMS>' + '\n' + '</SLIDESHOW>';
			trace("trece de xml items for");
			goSave();
		}
		
		private function goSave():void {
			Security.allowDomain('www.vpg.ro');
			Security.allowInsecureDomain('www.vpg.ro');
			trace('intra save');
			if (xmlString) {
				var colLoader:URLLoader = new URLLoader();
				var colReq:URLRequest = new URLRequest('http://www.vpg.ro/ss/savecolumns.php');
				colReq.method = URLRequestMethod.POST;
				colLoader.addEventListener(Event.COMPLETE, colSaved);
				
				colReq.data = xmlString;
				colReq.contentType = "text/xml";
				colLoader.load(colReq);
				}
			var itemLoader:URLLoader = new URLLoader();
			var itemReq:URLRequest = new URLRequest('http://www.vpg.ro/ss/savexml.php');
			itemReq.method = URLRequestMethod.POST;
			itemLoader.addEventListener(Event.COMPLETE, xmlSaved);
			
			itemReq.data = slideshowxml;
			itemReq.contentType = "text/xml";
			itemLoader.load(itemReq);
		}
		
		private function colSaved(e:Event):void{
			trace("columns saved");
		}
		
		private function xmlSaved(e:Event):void{
			trace("xml saved");
		}
		
	}
}