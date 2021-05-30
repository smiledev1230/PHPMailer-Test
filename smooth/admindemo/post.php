<?php

session_start();

include "db.php";
$totalColumn = $_POST['max_column'];

if ($_POST['submit'] == 'delete')
    mysql_query("UPDATE `scroll_preview` SET `field`='', `description`='', `text_title`='' WHERE `row`=$_POST[row] AND `column`=$_POST[column]");
else if ($_POST['submit'] == 'apply') {
    for ($counter = 1; $counter <= $totalColumn; $counter++) {
        switch ($_POST['radio_row1-column' . $counter]) {
            case 'image':
                //upload the image to server only if file added
                if (($_FILES['row1image-column' . $counter]['name'] != '') &&
                        (($_FILES['row1image-column' . $counter]["type"] == "image/gif") || ($_FILES['row1image-column' . $counter]["type"] == "image/jpeg") || ($_FILES['row1image-column' . $counter]["type"] == "image/jpg") || ($_FILES['row1image-column' . $counter]["type"] == "image/png"))
                ) {
                    move_uploaded_file($_FILES['row1image-column' . $counter]["tmp_name"], "js/plugins/doksoft_uploader/userfiles/images/" . $_FILES['row1image-column' . $counter]["name"]);
                    //update into db
                    updatePreview('image', $counter, 1, $_FILES['row1image-column' . $counter]['name'], '');
                }
                break;
            case 'text':
                //update into db
                if ($_POST['row1text-column' . $counter] != '')
                    updatePreview('text', $counter, 1, sanitizeEditor($_POST['row1text-column' . $counter]), $_POST['row1title-column' . $counter]);
                break;
            case 'image_text':
                //update into db
                updatePreview('image_text', $counter, 1, sanitizeEditor($_POST['row1textimage-column' . $counter]), '');
                break;
        }

        switch ($_POST['radio_row2-column' . $counter]) {
            case 'image':
                //upload the image to server only if file added
                if (($_FILES['row2image-column' . $counter]['name'] != '') &&
                        (($_FILES['row2image-column' . $counter]["type"] == "image/gif") || ($_FILES['row2image-column' . $counter]["type"] == "image/jpeg") || ($_FILES['row2image-column' . $counter]["type"] == "image/jpg") || ($_FILES['row2image-column' . $counter]["type"] == "image/png"))) {
                    move_uploaded_file($_FILES['row2image-column' . $counter]["tmp_name"], "images/crawler/" . $_FILES['row2image-column' . $counter]["name"]);
                    //update into db
                    updatePreview('image', $counter, 2, $_FILES['row2image-column' . $counter]['name'], '');
                }
                break;
            case 'text':
                //update into db
                if ($_POST['row2text-column' . $counter] != '')
                    updatePreview('text', $counter, 2, sanitizeEditor($_POST['row2text-column' . $counter]), $_POST['row2title-column' . $counter]);
                break;
            case 'image_text':
                updatePreview('image_text', $counter, 2, sanitizeEditor($_POST['row2textimage-column' . $counter]), '');
                break;
        }

        switch ($_POST['radio_row3-column' . $counter]) {
            case 'image':
                //upload the image to server only if file added
                if (($_FILES['row3image-column' . $counter]['name'] != '') &&
                        (($_FILES['row3image-column' . $counter]["type"] == "image/gif") || ($_FILES['row3image-column' . $counter]["type"] == "image/jpeg") || ($_FILES['row3image-column' . $counter]["type"] == "image/jpg") || ($_FILES['row3image-column' . $counter]["type"] == "image/png"))) {
                    move_uploaded_file($_FILES['row3image-column' . $counter]["tmp_name"], "images/crawler/" . $_FILES['row3image-column' . $counter]["name"]);
                    //update into db
                    updatePreview('image', $counter, 3, $_FILES['row3image-column' . $counter]["name"], '');
                }
                break;
            case 'text':
                updatePreview('text', $counter, 3, sanitizeEditor($_POST['row3text-column' . $counter]), $_POST['row3title-column' . $counter]);
                break;
            case 'image_text':
                updatePreview('image_text', $counter, 3, sanitizeEditor($_POST['row3textimage-column' . $counter]), '');
                break;
        }
    }
} else if ($_POST['submit'] == 'save') {
    //update data from preview into live
    $queryPreview = mysql_query('SELECT * FROM scroll_preview');
    mysql_query("TRUNCATE TABLE `scroll`");
    while ($field = mysql_fetch_assoc($queryPreview)) {
        $description = mysql_real_escape_string($field['description']);
        $textTitle = mysql_real_escape_string($field['text_title']);

        $description = mysql_real_escape_string($field['description']);
        $textTitle = mysql_real_escape_string($field['text_title']);
        mysql_query("INSERT INTO `scroll`
          (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
          VALUES ('' , '$field[field]', '$field[column]', '$field[row]', '$description', '$textTitle')") or die(mysql_error());
    }
}
$_SESSION['message'] = 'Data has been updated.';
header('Location: index.php');