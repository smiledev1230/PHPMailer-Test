<?php
include "db.php";
$query = mysql_query("SELECT * FROM `scroll_preview`");
while ($result = mysql_fetch_assoc($query)) {
    $data[$result['column']][$result['row']]['description'] = $result['description'];
    $data[$result['column']][$result['row']]['text_title'] = $result['text_title'];
    $data[$result['column']][$result['row']]['column'] = $result['column'];
    $data[$result['column']][$result['row']]['row'] = $result['row'];
    $data[$result['column']][$result['row']]['field'] = $result['field'];
}
$queryMax = mysql_query("SELECT MAX(`column`) AS `column` FROM scroll_preview");
$result = mysql_fetch_assoc($queryMax);
$totalColumn = $result['column'];

//AJAX call
if ($_POST) {
    $order = 0;
    $ids = $_POST["ids"];

//fetch all origin data
    $columnPosition = 1;
    $rowPosition = 1;
    for ($idx = 0; $idx < count($ids); $idx+=1) {
        $order++;
        $temp = explode('-', $ids[$idx]);
        $column = $temp[0];
        $row = $temp[1];
        $query = mysql_query("SELECT * FROM `scroll_preview` WHERE `row` = $row AND `column` = $column");
        $result = mysql_fetch_assoc($query);

        $switchData[$order]['description'] = mysql_real_escape_string($result['description']);
        $switchData[$order]['text_title'] = mysql_real_escape_string($result['text_title']);
        $switchData[$order]['field'] = mysql_real_escape_string($result['field']);

        if ($columnPosition > $totalColumn) {
            $rowPosition++;
            $columnPosition = 1;
        }

        $switchData[$order]['row'] = $rowPosition;
        $switchData[$order]['column'] = $columnPosition;
        $columnPosition++;
    }

    //clear data & insert updated one
    mysql_query("TRUNCATE TABLE `scroll_preview`");

    //update data
    for ($counter = 1; $counter <= sizeof($switchData); $counter++) {
        mysql_query("INSERT INTO `scroll_preview` 
        (`id` , `field` ,`column` ,`row` ,`description` ,`text_title`)
        VALUES ('' , '{$switchData[$counter]['field']}', '{$switchData[$counter]['column']}', '{$switchData[$counter]['row']}', '{$switchData[$counter]['description']}', '{$switchData[$counter]['text_title']}')");
    }
    return;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns = "http://www.w3.org/1999/xhtml">
    <head>
        <style type = "text/css">
            h1 {
                font-size:16pt;
            }
            h2 {
                font-size:13pt;
            }
            ul {
                width:<?= ($totalColumn + 1) * 400; ?>px; list-style-type: none; margin:0px; padding:0px; }
            li { float:left; padding:5px; width:400px; height:400px; }
            li div { width:360px; height:360px; border:solid 1px black; background-color:#E0E0E0; text-align:center; padding-top:40px; }
            .placeHolder div { background-color:white!important; border:dashed 1px gray !important; }
        </style>
        <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.dragsort-0.5.1.min.js"></script>
    </head>
    <body>
        <ul id="gallery">
            <?php
            for ($row = 1; $row <= 3; $row++)
                for ($column = 1; $column <= $totalColumn; $column++) {
                    echo "<li data-itemid='$column-$row'>";
                    if ($data[$column][$row]['field'] == 'image') {
                        $imageSize = getimagesize($baseImagePath . $data[$column][$row]['description']);
                        echo '<div>' . "<b>column: $column   row: $row</b><br/><br/>" . '<img src="' . $baseImagePath . $data[$column][$row]['description'] . '"&nbsp;' . imageResize($imageSize[0], $imageSize[1], 200) . '"/></div>';
                    } else if ($data[$column][$row]['field'] == 'text')
                        echo '<div>' . "<b>column: $column   row: $row</b><br/><br/>" . $data[$column][$row]['text_title'] . '<br/>' . $data[$column][$row]['description'] . '</div>';
                    else if ($data[$column][$row]['field'] == 'image_text')
                        echo '<div>' . "<b>column: $column   row: $row </b><br/><br/>" . $data[$column][$row]['description'] . '</div>';
                    else
                        echo "<div> </div>";
                    echo "</li>";
                }
            ?>
        </ul>

        <script type="text/javascript">
            $("#gallery").dragsort({ dragSelector: "div", dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

            function saveOrder() {
                var data = $("#gallery li").map(function() { return $(this).data("itemid"); }).get();
                $.post("drag.php", { "ids[]": data }).success(function(data) {
                    //alert("Data Loaded: " + data);
                    location.reload();
                });;
            };
        </script>
    </body>
</html>
