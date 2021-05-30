/*
 Loads and parses the xml file. CallBack is triggered when the xml is ready.
*/


(function($) {
var contentArray = [];
var parameterObject = {};


function globalParameters(xml, fnk){
	 $(xml).find('gallery').each(function(i){
		
		  for (var i = 0; i < this.attributes.length; i++) {
		  var attrib = this.attributes[i];
		  
			 parameterObject[attrib.name] = attrib.value;
		
		}
  
});
	 fnk.call();
	 
}


function globalContent(xml, fnk){
	
 $(xml).find('asset').each(function(){
	var xmlObj = {};
	
	//Parse XML node attributes
	for (var i = 0; i < this.attributes.length; i++) {
	  var attrib = this.attributes[i];
	
	  xmlObj[attrib.name] = attrib.value;
	
	}
	
	//Parse XML nodes
	$(this).children().each(function(){
		xmlObj[this.tagName] = $(this).text();
	});
	
	contentArray.push(xmlObj);					
	
});
	
	 fnk.call();
}


function xmlError(xhr, ajaxOptions, thrownError){
    alert(xhr.status + " " + "Xml File: failed to load");
 }  


function xmlSuccess(xml) {
	var $this = this;
	//Parse Xml: Parameters
	globalParameters(xml, function(){
		
		//Parse Xml: Content
		globalContent(xml, function(){
					
			if($this){ 
				//alert(contentArray.length);
				$this.call({content:contentArray, param:parameterObject});
				
			}

	});				
					
 });
	
}


$.loadXML = function(xmlURL,fnk) {

var $fnk = fnk;

var time = new Date().getTime();
	
    jQuery.ajax({
			type: "GET",
			url: xmlURL + '?time=' + time,
			dataType: "xml",
			context: $fnk,
			success: xmlSuccess,
	 		 error: xmlError
    });
	
}

})(jQuery);