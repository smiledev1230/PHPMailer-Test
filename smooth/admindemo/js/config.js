/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
    config.extraPlugins = 'doksoft_image,doksoft_preview,doksoft_resize';
    /* testing
    config.filebrowserImageUploadUrl = 'http://localhost/honest/js/plugins/doksoft_uploader/uploader.php?type=Images';
    config.filebrowserImageThumbsUploadUrl = 'http://localhost/honest/js/plugins/doksoft_uploader/uploader.php?type=Images&makeThumb=true';
    config.filebrowserImageResizeUploadUrl = 'http://localhost/honest/js/plugins/doksoft_uploader/uploader.php?type=Images&resize=true';
    */
   //live site https://honestinstall.com/smooth/admindemo/js/plugins/doksoft_uploader
    config.filebrowserImageUploadUrl = 'https://honestinstall.com/smooth/admindemo/js/plugins/doksoft_uploader/uploader.php?type=Images';
    config.filebrowserImageThumbsUploadUrl = 'https://honestinstall.com/smooth/admindemo/js/plugins/doksoft_uploader/uploader.php?type=Images&makeThumb=true';
    config.filebrowserImageResizeUploadUrl = 'https://honestinstall.com/smooth/admindemo/js/plugins/doksoft_uploader/uploader.php?type=Images&resize=true';
};