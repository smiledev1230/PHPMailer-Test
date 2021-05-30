package src.BuilderEvents {
	import flash.events.Event;
	
	public class BuilderEvent extends Event{
		
		public static const RADIOSTATECHANGED:String = "radiostatechanged";
		public static const CBSTATECHANGED:String = "cbstatechanged";
		public static const ITEMREADY:String = "itemready";
		public static const EDITITEM:String = "edititem";
		public static const PREVIEWITEM:String = "previewitem";
		public static const DELETEITEM:String = "deleteitem";
		public static const IMAGEREADY:String = "imageready";
		public static const PREVIEWREADY:String = "previewready";
		public static const FILEUPLOADED:String = "fileuploaded";
		public static const ITEMSAVED:String = "itemsaved";
		public static const NEWITEMSAVED:String = "newitemsaved";
		public static const NEWCOLUMNSELECTED:String = "newcolumnselected";
		public static const LOADITEM:String = "loaditem";
		public static const REMOVECOLUMN:String = "removecolumn";
		public static const CHANGECOLUMNTYPE:String = "changecolumntype";
		public static const DISPLAYITEMLIST:String = "displayitemlist";
		public static const DISPLAYAVAILABLEITEMS:String = "displayavailableitems";
		public static const ITEMSELECTEDFROMGAL:String = "itemselectedfromgal";
		
		public var arg:*;
		
		public function BuilderEvent(type:String, bubbles:Boolean = false, cancelable:Boolean = false, ... a:*) {
			super(type, bubbles, cancelable);
			this.arg = a;
		}
		
		override public function clone():Event {
			return new BuilderEvent(type, bubbles, cancelable, arg);
		}
	}
}