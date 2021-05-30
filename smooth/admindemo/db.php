<?php

//testing
//$baseUrl = 'http://localhost/honest/';
//$baseImagePath = 'http://localhost/honest/js/plugins/doksoft_uploader/userfiles/images/';
//live site
$baseImagePath = 'https://honestinstall.com/smooth/admindemo/js/plugins/doksoft_uploader/userfiles/images/';
//testing
//mysql_connect('localhost', 'root', '') or die(mysql_error());
//mysql_select_db('honest') or die(mysql_error());
//live db
mysql_connect('localhost', 'honest25_emailc', 'jAnup3ya!') or die(mysql_error());
mysql_select_db('honest25_emailconf') or die(mysql_error());

function update($field, $column, $row, $description, $text_title) {
    return mysql_query("UPDATE `scroll` SET `field` = '$field',
`description` = '$description',
`text_title` = '$text_title' WHERE `row`='$row' AND `column`='$column'");
}

function updatePreview($field, $column, $row, $description, $text_title) {
    return mysql_query("UPDATE `scroll_preview` SET `field` = '$field',
`description` = '$description',
`text_title` = '$text_title' WHERE `row`='$row' AND `column`='$column'");
}

//replace p tag from editor into br tag
function sanitizeEditor($string) {
    $filter1 = array("<p>", "</p>");
    $filter2 = array("", "<br/>");
    return str_replace($filter1, $filter2, $string);
}

function imageResize($width, $height, $target) {
    if ($width > $height) {
        $percentage = ($target / $width);
    } else {
        //stick to width resize
        //$percentage = ($target / $height);
        $percentage = $target / $width;
    }
    $width = round($width * $percentage);
    $height = round($height * $percentage);
    return "width=\"$width\" height=\"$height\"";
}

function getLastColumn() {
    $query = mysql_query("SELECT MAX(`column`) AS `column` FROM scroll_preview");
    $result = mysql_fetch_assoc($query);
    return $result['column'];
}

function reOrderTable() {
    $query = mysql_query("SELECT * FROM scroll_preview ORDER BY `row`, `column` ASC");
    $order = 0;
    while ($result = mysql_fetch_assoc($query)) {
        $order++;
        $data[$order]['field'] = $result['field'];
        $data[$order]['column'] = $result['column'];
        $data[$order]['row'] = $result['row'];
        $data[$order]['description'] = $result['description'];
        $data[$order]['text_title'] = $result['text_title'];
    }

    //clear data & insert updated one
    mysql_query("TRUNCATE TABLE `scroll_preview`");

    //update data
    for ($counter = 1; $counter <= sizeof($data); $counter++) {
        $description = mysql_real_escape_string($data[$counter]['description']);
        $textTitle = mysql_real_escape_string($data[$counter]['text_title']);

        mysql_query("INSERT INTO `scroll_preview` 
        (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
        VALUES ('' , '{$data[$counter]['field']}', '{$data[$counter]['column']}', '{$data[$counter]['row']}', '$description', '$textTitle')");
    }
}

function insertEndColumn($number) {
    $lastColumn = getLastColumn();
    for ($counter = 1; $counter <= $number; $counter++) {
        ++$lastColumn;
        mysql_query("INSERT INTO `scroll_preview` 
        (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
        VALUES ('' , '', $lastColumn, 1, '', '')");
        mysql_query("INSERT INTO `scroll_preview` 
        (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
        VALUES ('' , '', $lastColumn, 2, '', '')");
        mysql_query("INSERT INTO `scroll_preview` 
        (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
        VALUES ('' , '', $lastColumn, 3, '', '')");
    }

    reOrderTable();
}

function insertFirstColumn($number) {
    $counter = 1;
    $columnPosition = 1;
    while ($counter <= ($number * 3)) {
        $data[$counter]['field'] = '';
        $data[$counter]['column'] = $columnPosition;
        $data[$counter]['row'] = 1;
        $data[$counter]['description'] = '';
        $data[$counter]['text_title'] = '';

        $data[$counter + 1]['field'] = '';
        $data[$counter + 1]['column'] = $columnPosition;
        $data[$counter + 1]['row'] = 2;
        $data[$counter + 1]['description'] = '';
        $data[$counter + 1]['text_title'] = '';

        $data[$counter + 2]['field'] = '';
        $data[$counter + 2]['column'] = $columnPosition;
        $data[$counter + 2]['row'] = 3;
        $data[$counter + 2]['description'] = '';
        $data[$counter + 2]['text_title'] = '';
        $counter+=3;
        $columnPosition++;
    }
    //contatenate with current data
    $query = mysql_query("SELECT * FROM scroll_preview ORDER BY `row`, `column` ASC");
    $order = ($number * 3) + 1;
    while ($result = mysql_fetch_assoc($query)) {
        $data[$order]['field'] = $result['field'];
        $data[$order]['column'] = $result['column'] + ($number);
        $data[$order]['row'] = $result['row'];
        $data[$order]['description'] = $result['description'];
        $data[$order]['text_title'] = $result['text_title'];
        $order++;
    }
    //clear data & insert updated one
    mysql_query("TRUNCATE TABLE `scroll_preview`");
    //update data
    foreach ($data as $field) {
        ++$counter;
        $description = mysql_real_escape_string($field['description']);
        $textTitle = mysql_real_escape_string($field['text_title']);

        $description = mysql_real_escape_string($field['description']);
        $textTitle = mysql_real_escape_string($field['text_title']);
        mysql_query("INSERT INTO `scroll_preview`
          (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
          VALUES ('' , '$field[field]', '$field[column]', '$field[row]', '$description', '$textTitle')") or die(mysql_error());
    }
    reOrderTable();
}

function removeColumn($column) {
    $lastColumn = getLastColumn();
    mysql_query("DELETE FROM `scroll_preview` WHERE `column` = $column");
    if ($column != $lastColumn) {
        $lastColumn = $lastColumn - 1;
        $rowCounter = 1;
        $row = 1;

        //reorder position
        $query = mysql_query("SELECT * FROM scroll_preview ORDER BY `row`, `column` ASC");
        $order = 0;
        $columnPosition = 0;
        while ($result = mysql_fetch_assoc($query)) {
            $order++;
            $columnPosition++;
            $data[$order]['field'] = $result['field'];
            if ($columnPosition > $lastColumn)
                $columnPosition = 1;
            $data[$order]['column'] = $columnPosition;
            $data[$order]['row'] = $result['row'];
            $data[$order]['description'] = $result['description'];
            $data[$order]['text_title'] = $result['text_title'];
        }

        //clear data & insert updated one
        mysql_query("TRUNCATE TABLE `scroll_preview`");
        //update data
        foreach ($data as $field) {
            ++$counter;
            $description = mysql_real_escape_string($field['description']);
            $textTitle = mysql_real_escape_string($field['text_title']);

            $description = mysql_real_escape_string($field['description']);
            $textTitle = mysql_real_escape_string($field['text_title']);
            mysql_query("INSERT INTO `scroll_preview`
          (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
          VALUES ('' , '$field[field]', '$field[column]', '$field[row]', '$description', '$textTitle')") or die(mysql_error());
        }
        reOrderTable();
    }
}

function insertAfterColumn($number) {
    $lastColumn = getLastColumn();
    $lastColumn = $lastColumn + 1;
    $order = 0;
    $columnPosition = 0;
    $query = mysql_query("SELECT * FROM scroll_preview ORDER BY `row`, `column` ASC");
    while ($result = mysql_fetch_assoc($query)) {
        $order++;
        //if ($columnPosition != $number) {
        $columnPosition++;
        $data[$order]['field'] = $result['field'];
        if ($result['column'] > $number)
            $data[$order]['column'] = $result['column'] + 1;
        else
            $data[$order]['column'] = $result['column'];
        $data[$order]['row'] = $result['row'];
        $data[$order]['description'] = $result['description'];
        $data[$order]['text_title'] = $result['text_title'];
    }

    //add new inserted column
    $data[$order + 1]['column'] = $number + 1;
    $data[$order + 1]['row'] = 1;
    $data[$order + 1]['description'] = '';
    $data[$order + 1]['text_title'] = '';

    $data[$order + 2]['column'] = $number + 1;
    $data[$order + 2]['row'] = 2;
    $data[$order + 2]['description'] = '';
    $data[$order + 2]['text_title'] = '';

    $data[$order + 3]['column'] = $number + 1;
    $data[$order + 3]['row'] = 3;
    $data[$order + 3]['description'] = '';
    $data[$order + 3]['text_title'] = '';


    //testing phase
    /*
      $x = 0;
      foreach ($data as $row) {
      ++$x;
      echo "$x ===> $row[column] ---> $row[row] <br/>";
      }
      exit();
     * 
     */

    //clear data & insert updated one
    mysql_query("TRUNCATE TABLE `scroll_preview`");
    //update data
    foreach ($data as $field) {
        ++$counter;
        $description = mysql_real_escape_string($field['description']);
        $textTitle = mysql_real_escape_string($field['text_title']);

        $description = mysql_real_escape_string($field['description']);
        $textTitle = mysql_real_escape_string($field['text_title']);
        mysql_query("INSERT INTO `scroll_preview`
          (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
          VALUES ('' , '$field[field]', '$field[column]', '$field[row]', '$description', '$textTitle')") or die(mysql_error());
    }
    reOrderTable();
}

function shuffle_assoc($list) {
    if (!is_array($list))
        return $list;

    $keys = array_keys($list);
    shuffle($keys);
    $random = array();
    foreach ($keys as $key) {
        $random[] = $list[$key];
    }
    return $random;
}

function writeInterval($speed) {
    $myFile = "interval.txt";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = $speed;
    fwrite($fh, $stringData);
    fclose($fh);
    
    $myFile = "../../interval.txt";
    $fh = fopen($myFile, 'w') or die("can't open file");
    $stringData = $speed;
    fwrite($fh, $stringData);
    fclose($fh);
    
}

function readInterval() {
    $myFile = "interval.txt";
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    return $theData;
}

function readInterval2(){
    $myFile = "smooth/admindemo/interval.txt";
    $fh = fopen($myFile, 'r');
    $theData = fread($fh, filesize($myFile));
    fclose($fh);
    return $theData;    
}