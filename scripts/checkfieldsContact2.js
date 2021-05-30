
<!-- Copyright 2003 Bontrager Connection, LLC
// Code obtained from http://WillMaster.com/
//
// Each required form field can be checked with JavaScript. Here are 
//    the function names for the different kinds of checks:
//
//       1. WithoutContent() -- check if the text, textarea, password, 
//              or file fields has no content.
//       2. NoneWithContent() -- check if none of the set of text, 
//              textarea, password, or file fields have content. 
//              (Set: More than one with the same field name.)
//
//       3. NoneWithCheck() -- check if none of the set of radio buttons 
//              or checkboxes are checked. (Set: More than one with the 
//              same field name.)
//       4. WithoutCheck() -- check if the single radio button or checkbox 
//              is unchecked.
//
//       5. WithoutSelectionValue() -- check if selected drop-down list or 
//              select box entries have no value.
//
//
// The format for using the above functions is
//             if(       WithoutContent([FORMFIELDVALUE])) [ERRORMESSAGE]
//             if(      NoneWithContent([FORMFIELD])     ) [ERRORMESSAGE]
//             if(        NoneWithCheck([FORMFIELD])     ) [ERRORMESSAGE]
//             if(         WithoutCheck([FORMFIELD])     ) [ERRORMESSAGE]
//             if(WithoutSelectionValue([FORMFIELD])     ) [ERRORMESSAGE]
//
// The if(...) part and the error message part may be on separate lines, like
//             if(WithoutContent([FORMFIELDVALUE]))
//                [ERRORMESSAGE]
//             if(NoneWithContent([FORMFIELD]))
//                [ERRORMESSAGE]
//             if(NoneWithCheck([FORMFIELD]))
//                [ERRORMESSAGE]
//             if(WithoutCheck([FORMFIELD]))
//                [ERRORMESSAGE]
//             if(WithoutSelectionValue([FORMFIELD]))
//                [ERRORMESSAGE]
//
//
//      FORMFIELD -- The format for specifying a "form field" is 
//                         document.[FORMNAME].[FIELDNAME]
// FORMFIELDVALUE -- The format for specifying a "form field value" is 
//                         document.[FORMNAME].[FIELDNAME].value
//   ERRORMESSAGE -- The format for specifying an "error message" is
//                         { errormessage += "\n\n[MESSAGE]"; }
//                   If the message itself contains quotation marks, 
//                      they must be preceded with a back slash. 
//                      Example: \"
//
//
//      FORMNAME -- The name assigned to the form in the <FORM... tag. 
//     FIELDNAME -- The field name being checked.
// 
//
// For use with this JavaScript, the only non-alphanumeric character a 
//    fieldname may have is the underscore. Replace any hyphens, colons, 
//    spaces, or other non-alphanumeric characters in your field names 
//    with an underscore character.
//
//
// Put field checks into the function CheckRequiredFields(), in the order 
//    you want the fields checked.
//


function CheckRequiredFields() {
var errormessage = new String();
// Put field checks below this point.
/*if(NoneWithCheck(document.contactform.servicetype.value))
	{errormessage += "\n\nPlease select the type of your inquiry."; }*/
if(WithoutContent(document.contactform.realname.value))
	{ errormessage += "\n\nPlease enter your full name in the \"Full Name\" text field."; }
	
if(!isEmail(document.contactform.email.value))
	{ errormessage += "\n\nPlease enter your email in the \"Email\" text field."; }
if(WithoutContent(document.contactform.phone.value))
	{ errormessage += "\n\nPlease enter your phone in the \"Phone\" text field."; }
if(WithoutContent(document.contactform.PROJECT.value))
	{ errormessage += "\n\nPlease enter your project type in the \"Describe your project\" text area"; }

// Put field checks above this point.
if(errormessage.length > 2) {
	alert('Please correct the following error:' + errormessage);
	return false;
	}
return true;
} // end of function CheckRequiredFields()

function isEmail(string) {
if (string.search(/^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/) != -1)
return true;
else
return false;
}



function WithoutContent(ss) {
if(ss.length > 0) { return false; }
return true;
}

function NoneWithContent(ss) {
for(var i = 0; i < ss.length; i++) {
	if(ss[i].value.length > 0) { return false; }
	}
return true;
}

function NoneWithCheck(ss) {
for(var i = 0; i < ss.length; i++) {
	if(ss[i].checked) { return false; }
	}
return true;
}

function WithoutCheck(ss) {
if(ss.checked) { return false; }
return true;
}

function WithoutSelectionValue(ss) {
for(var i = 0; i < ss.length; i++) {
	if(ss[i].selected) {
		if(ss[i].value.length) { return false; }
		}
	}
return true;
}

//-->
