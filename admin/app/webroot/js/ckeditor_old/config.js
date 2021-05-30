/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For the complete reference:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

        config.extraPlugins = 'doksoft_image,doksoft_preview,doksoft_resize';

        config.filebrowserImageUploadUrl = 'https://honestinstall.com/admin/app/webroot/js/ckeditor/plugins/doksoft_uploader/uploader.php?type=Images';
        config.filebrowserImageThumbsUploadUrl = 'https://honestinstall.com/admin/app/webroot/js/ckeditor/plugins/doksoft_uploader/uploader.php?type=Images&makeThumb=true';
        config.filebrowserImageResizeUploadUrl = 'https://honestinstall.com/admin/app/webroot/js/ckeditor/plugins/doksoft_uploader/uploader.php?type=Images&resize=true';

	// The toolbar groups arrangement, optimized for two toolbar rows.
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

	// Remove some buttons, provided by the standard plugins, which we don't
	// need to have in the Standard(s) toolbar.
	config.removeButtons = 'Underline,Subscript,Superscript';

	// Se the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Make dialogs simpler.
	config.removeDialogTabs = 'image:advanced;link:advanced';
};
