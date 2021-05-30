package src{
	
	import flash.display.*;
	import flash.events.*;
	import flash.net.URLVariables;
	import flash.text.*;
	
	import flash.net.FileReference;
	import flash.net.FileReferenceList;
	import flash.net.FileFilter;
	import flash.net.URLRequest;
	import flash.utils.Timer;
	import flash.events.TimerEvent;
	import src.SButton;
	import flash.net.URLRequestMethod;
	import flash.events.HTTPStatusEvent;
	
	
	public class Uploader extends MovieClip {
		
		var file:FileReference;
		var filefilters:Array;
		var req:URLRequest;
		var tm:Timer;
		var speed:Number = 0;
		var currbytes:Number = 0;
		var lastbytes:Number = 0;
		var select_btn:MovieClip = new Upload_Out();
		var progress_mc:MovieClip = new ProgressBar();
		var cancel_btn:SButton = new SButton("Cancel");
		var label_txt:TextField = new TextField();
		var status_txt:TextField = new TextField();
		
		public function Uploader() {
			addChild(select_btn);
			progress_mc.y = 45;
			addChild(progress_mc);
			cancel_btn.y = 100;
			addChild(cancel_btn);
			label_txt.x = -100;
			label_txt.y = 150;
			label_txt.autoSize = "center";
			label_txt.text = "Messages";
			label_txt.textColor = 0xFFFFFF;
			addChild(label_txt);
			status_txt.x = -100;
			status_txt.y = 200;
			status_txt.autoSize = "center";
			status_txt.text = "Waiting for status";
			status_txt.textColor = 0xFFFFFF;
			addChild(status_txt);
			req = new URLRequest();
			req.url = 'http://localhost/ss/upload.php';
			req.method = URLRequestMethod.POST;
			var variables:URLVariables = new URLVariables();
			req.data = variables;
			file = new FileReference();
			setup( file );
			select_btn.addEventListener( MouseEvent.CLICK, browse );
			progress_mc.scaleX = 0;
			tm = new Timer( 1000 );
			tm.addEventListener( TimerEvent.TIMER, updateSpeed );
			cancel_btn.addEventListener( MouseEvent.CLICK, cancelUpload );
			cancel_btn.visible = false;
		}
		
		public function browse( e:MouseEvent ){
			filefilters = [ new FileFilter('Images', '*.jpg') ]; // add other file filters
			file.browse( filefilters );
		}
		
		private function setup( file:FileReference ){
			file.addEventListener( Event.CANCEL, cancel_func );
			//file.addEventListener( Event.COMPLETE, complete_func );
			file.addEventListener( IOErrorEvent.IO_ERROR, io_error );
			file.addEventListener( Event.OPEN, open_func );
			//file.addEventListener( ProgressEvent.PROGRESS, progress_func );
			file.addEventListener( Event.SELECT, selectHandler );
			//file.addEventListener( DataEvent.UPLOAD_COMPLETE_DATA, show_message );	
			//file.addEventListener(HTTPStatusEvent.HTTP_RESPONSE_STATUS, responsestatus);
			//file.addEventListener(HTTPStatusEvent.HTTP_STATUS, status);
		}
		
		private function responsestatus(e:HTTPStatusEvent):void {
			label_txt.text = e.responseURL;
		}
		
		private function status(e:HTTPStatusEvent):void {
			status_txt.text = String(e.status);
			trace(e.status);
		}
		
		private function cancel_func( e:Event ){
			trace( 'canceled !' );
		}
		
		private function complete_func( e:Event ){
			trace( 'complete !' );
		}
		
		private function io_error( e:IOErrorEvent ){
			var tf = new TextFormat();
			tf.color = 0xff0000;
			label_txt.defaultTextFormat = tf;
			label_txt.text = 'The file could not be uploaded. We are at '+ e.eventPhase + " Error: "+e.text;
			tm.stop();
			cancel_btn.visible = false;
			select_btn.visible = true;
		}
		
		private function open_func( e:Event ){
			//trace( 'opened !' );
			tm.start();
			cancel_btn.visible = true;
			select_btn.visible = false;
		}
		
		private function progress_func( e:ProgressEvent ){
			progress_mc.scaleX = e.bytesLoaded / e.bytesTotal;
			var tf = new TextFormat();
			tf.color = 0x000000;
			label_txt.defaultTextFormat = tf;
			label_txt.text = Math.round( (e.bytesLoaded/e.bytesTotal)*100)+'% uploaded '+speed+' kb/s';
			currbytes = e.bytesLoaded;
		}
		
		private function selectHandler( e:Event ) {
			file.addEventListener(Event.COMPLETE, onfileloaded);
			file.load();
			//file.upload( req );
			
		}
		
		private function onfileloaded(e:Event):void {
			file.addEventListener( ProgressEvent.PROGRESS, progress_func );
			file.addEventListener(HTTPStatusEvent.HTTP_STATUS, status);
			file.addEventListener( DataEvent.UPLOAD_COMPLETE_DATA, show_message );
			file.upload(req);
		}
		
		private function show_message( e:DataEvent ){
			tm.stop();
			status_txt.textColor = 0xFF0000;
			var tf = new TextFormat();
			if( e.data == 'ok' ){
				tf.color = 0x009900;
				label_txt.defaultTextFormat = tf;
				label_txt.text = 'The file has been uploaded.'+ e.text;
			} else if( e.data == 'error'){
				tf.color = 0xff0000;
				label_txt.defaultTextFormat = tf;
				label_txt.text = 'The file could not be uploaded.'+ e.text;
			}
		}
		
		private function updateSpeed( e:TimerEvent ){
			speed = Math.round( (currbytes - lastbytes)/1024 );
			lastbytes = currbytes;
		}
		
		private function cancelUpload( e:MouseEvent ){
			file.cancel();
			reset();
		}
		
		private function reset(){
			cancel_btn.visible = false;
			select_btn.visible = true;
			label_txt.text = '';
			progress_mc.scaleX = 0;
		}
		
	}	
}