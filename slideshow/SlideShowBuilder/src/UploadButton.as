package src {
	import flash.display.MovieClip;
	import flash.display.Sprite;
	import flash.events.DataEvent;
	import flash.events.Event;
	import flash.events.MouseEvent;
	import flash.events.SecurityErrorEvent;
	import flash.net.FileFilter;
	import flash.net.FileReference;
	import flash.net.URLRequest;
	import flash.net.URLVariables;
	import flash.text.TextField;
	import flash.text.TextFormat;
	import src.BuilderEvents.BuilderEvent;
	import flash.net.URLRequestMethod;
	import flash.system.Security;
	import flash.system.SecurityDomain;
	import flash.events.IOErrorEvent;
	import flash.events.ProgressEvent;
	import src.Uploader;
	
	public class UploadButton extends Sprite {
		
		private var mc_out:MovieClip = new Upload_Out();
		private var mc_over:MovieClip = new Upload_Over();
		private var upload_btn:SSButton;
		private var progress_mc:MovieClip = new ProgressBar();
		
		public var file:FileReference;
		public var req:URLRequest;
		public var fileSelected:Boolean = false;
		public var imgName:String;
		private var info_format:TextFormat;
		private var info_tf:TextField;
		
		
		public function get file2upload():FileReference { return file; }
		
		public function get fileName():String { return imgName; }
		
		public function setInactive():void {
			file = null; 
			fileSelected = false; 
			upload_btn.removeEventListener(MouseEvent.CLICK, handleClick);
			info_tf.textColor = 0x999999;
		}
		
		public function setActive():void { 
			upload_btn.addEventListener(MouseEvent.CLICK, handleClick);
			info_tf.textColor = 0xFFFFFF;
		}
		
		public function UploadButton() {
			init();
		}
		
		private function init() {
			upload_btn = new SSButton(mc_out, mc_over);
			this.addChild(upload_btn);
			
			progress_mc.y = 45;
			this.addChild(progress_mc);
			progress_mc.scaleX = 0;
			
			info_format = new TextFormat();
			info_format.font = "Arial";
			info_format.size = 10;
			info_format.align = "center";
			info_tf = new TextField();
			info_tf.defaultTextFormat = info_format;
			info_tf.text = "Upload Image";
			info_tf.y = 50;
			info_tf.width = 50;
			info_tf.autoSize = "center";
			info_tf.multiline = true;
			info_tf.wordWrap = true;
			info_tf.textColor = 0xFFFFFF;
			info_tf.x = (41 - info_tf.width) / 2;
			this.addChild(info_tf);
			
			addEvents();
		}
		
		private function addEvents():void {
			upload_btn.addEventListener(MouseEvent.CLICK, handleClick);
		}
		
		private function handleClick(e:MouseEvent):void {
			upload_btn.removeEventListener(MouseEvent.CLICK, handleClick);
			file = new FileReference();
			req = new URLRequest();
			Security.allowDomain('www.vpg.ro');
			Security.allowInsecureDomain('www.vpg.ro');
			var fileTypes:FileFilter = new FileFilter("Image Files", "*.jpg; *.jpeg; *.gif; *.png");
			file.addEventListener(Event.SELECT, handleFileSelected);
			file.browse([fileTypes]);			
		}
		
		private function handleFileSelected(e:Event):void {
			file.removeEventListener(Event.SELECT, handleFileSelected);
			imgName = file.name;
			file.addEventListener(Event.COMPLETE, handleFileLoaded);
			file.load();
		}
		
		private function handleFileLoaded(e:Event):void {
			file.removeEventListener(Event.COMPLETE, handleFileLoaded);
			info_tf.text = "Uploading";
			info_tf.x = (41 - info_tf.width) / 2;
			var variables:URLVariables = new URLVariables();
			req.url = 'http://www.vpg.ro/ss/upload.php';
			req.method = URLRequestMethod.POST;
			req.data = variables;
			file.addEventListener( ProgressEvent.PROGRESS, handleProgress );
			file.addEventListener(DataEvent.UPLOAD_COMPLETE_DATA, dataTransferComplete);
			file.addEventListener(SecurityErrorEvent.SECURITY_ERROR, handleSecError);
			file.addEventListener(IOErrorEvent.IO_ERROR, io_error);
			file.upload(req);
		}
		
		private function handleProgress(e:ProgressEvent):void {
			progress_mc.scaleX = e.bytesLoaded / e.bytesTotal;
		}
		
		private function handleSecError(e:SecurityErrorEvent):void {
			info_tf.text = "Error!";
			info_tf.x = (41 - info_tf.width) / 2;
		}
		
		private function io_error(e:IOErrorEvent):void {
			info_tf.text = "Error!";
			info_tf.x = (41 - info_tf.width) / 2;
		}
		
		private function dataTransferComplete(e:DataEvent):void {
			if (e.data == "ok") { info_tf.text = "Image uploaded"; info_tf.x = (41 - info_tf.width) / 2; imgName = file.name; dispatchEvent(new BuilderEvent(BuilderEvent.FILEUPLOADED)); }
			if (e.data == "error") { info_tf.text = "Error!"; info_tf.x = (41 - info_tf.width) / 2; }
			reset();
		}
		
		private function reset():void {
			file.removeEventListener( ProgressEvent.PROGRESS, handleProgress );
			file.removeEventListener(DataEvent.UPLOAD_COMPLETE_DATA, dataTransferComplete);
			file.removeEventListener(SecurityErrorEvent.SECURITY_ERROR, handleSecError);
			file.removeEventListener(IOErrorEvent.IO_ERROR, io_error);
			upload_btn.addEventListener(MouseEvent.CLICK, handleClick);
			progress_mc.scaleX = 0;
		}
	}
}