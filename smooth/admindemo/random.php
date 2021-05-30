<?php

//if (!$_POST)
//    header('Location: index.php');

include "db.php";
$totalColumn = getLastColumn();
$query = mysql_query("SELECT * FROM scroll_preview");
$counter = 1;
$lastColumn = getLastColumn();

$columnPosition = 0;

while ($result = mysql_fetch_assoc($query)) {
    $data[$result['column']][$counter]['row'] = $result['row'];
    $data[$result['column']][$counter]['field'] = $result['field'];
    $data[$result['column']][$counter]['description'] = $result['description'];
    $data[$result['column']][$counter]['text_title'] = $result['text_title'];
    $counter++;
}

$data = shuffle_assoc($data);

//clear data & insert updated one
mysql_query("TRUNCATE TABLE `scroll_preview`");

$columnPosition = 0;
$rowPosition = 1;
foreach ($data as $field) {
    $columnPosition++;
    foreach ($field as $detail) {
        mysql_query("INSERT INTO `scroll_preview`
  (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
  VALUES ('' , '$detail[field]', '$columnPosition', '$detail[row]', '" . mysql_real_escape_string($detail[description]) . "', '$detail[text_title]')");
    }
}

reOrderTable();

header('Location: index.php');
