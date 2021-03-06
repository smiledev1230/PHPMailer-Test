/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    
     config.filebrowserBrowseUrl = '/admin/app/webroot/js/ckfinder/browse.php?type=files';
   config.filebrowserImageBrowseUrl = '/admin/app/webroot/js/ckfinder/browse.php?type=images';
   config.filebrowserFlashBrowseUrl = '/admin/app/webroot/js/ckfinder/browse.php?type=flash';
   config.filebrowserUploadUrl = '/admin/app/webroot/js/ckfinder/upload.php?type=files';
   config.filebrowserImageUploadUrl = '/admin/app/webroot/js/ckfinder/upload.php?type=images';
   config.filebrowserFlashUploadUrl = '/admin/app/webroot/js/ckfinder/upload.php?type=flash';
    
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
        /*
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker', 'Table', 'SpecialChar', 'HorizontalRule' ] },
		{ name: 'links' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align' ] },
		{ name: 'styles' },
		{ name: 'colors' }
	];
        */

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
