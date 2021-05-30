<?php
include "db.php";
$query = mysql_query("SELECT * FROM `scroll_preview`");
$order = 1;
while ($result = mysql_fetch_assoc($query)) {
    $data[$result['column']][$result['row']]['description'] = $result['description'];
    $data[$result['column']][$result['row']]['text_title'] = $result['text_title'];
    $data[$result['column']][$result['row']]['column'] = $result['column'];
    $data[$result['column']][$result['row']]['row'] = $result['row'];

    //to be compared for swap later
    $dataSource[$order]['description'] = $result['description'];
    $dataSource[$order]['text_title'] = $result['text_title'];
    $dataSource[$order]['column'] = $result['column'];
    $dataSource[$order]['row'] = $result['row'];
    $order++;
}
$totalColumn = 8;

//AJAX call
if ($_POST) {
    $order = 1;
    $ids = $_POST["ids"];
    for ($idx = 0; $idx < count($ids); $idx+=1) {
        $temp = explode('-', $ids[$idx]);
        $column = $temp[0];
        $row = $temp[1];
        $query = mysql_query("SELECT * FROM `scroll_preview` WHERE `row` = $row AND `column` = $column");
        $result = mysql_fetch_assoc($query);

        $switchData[$order]['description'] = $result['description'];
        $switchData[$order]['text_title'] = $result['text_title'];
        $switchData[$order]['row'] = $result['row'];
        $switchData[$order]['column'] = $result['column'];
        $order++;
    }

    $columnPosition = 1;
    $rowPosition = 1;
    $order = 1;
    for ($idx = 0; $idx < count($ids); $idx++) {
        //compare array & swap content
        if ($dataSource[$order]['description'] != $switchData[$order]['description']) {
            $temp['description'] = $dataSource[$order]['description'];
            $temp['text_title'] = $dataSource[$order]['text_title'];
            $temp['column'] = $dataSource[$order]['column'];
            $temp['row'] = $dataSource[$order]['row'];

            echo "swap datasource $order to switchdata $order <br/>";
            echo "swap switchdata $order to datasource $order <br/><br/>";
            
            //swap
            /*
            $first = mysql_query("UPDATE `scroll_preview` SET
              `description` = '{$switchData[$order][description]}',
              `text_title` = '{$switchData[$order][text_title]}'
              WHERE `row`='{$dataSource[$order][row]}' AND `column` = '{$dataSource[$order][column]}'") or die(mysql_error());

            $second = mysql_query("UPDATE `scroll_preview` SET
              `description` = '{$dataSource[$order][description]}',
              `text_title` = '{$dataSource[$order][text_title]}'
              WHERE `row`={$switchData[$order][row]} AND `column` = {$switchData[$order][column]}") or die(mysql_error());
             * 
             */
        }
        /*
          if ($rowPosition > 3) {
          $columnPosition++;
          $rowPosition = 1;
          }
          $rowPosition++;
         */
        $id = $ids[$idx];
        $ordinal = $idx;
        $order++;
    }
    return;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
    <head>        
        <style type="text/css">
            h1 { font-size:16pt; }
            h2 { font-size:13pt; }
            ul { width:<?= ($totalColumn + 1) * 400; ?>px; list-style-type: none; margin:0px; padding:0px; }
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
            $counter = 0;
            for ($column = 1; $column <= $totalColumn; $column++)
                for ($row = 1; $row <= 3; $row++) {
                    $list[] = $data[$column][$row]['description'];
                    echo "<li data-itemid='$column-$row'>";
                    echo "<div>" . $list[$counter] . "</div>";
                    echo "</li>";
                    ++$counter;
                }
            ?>
        </ul>

        <script type="text/javascript">
            $("#gallery").dragsort({ dragSelector: "div", dragEnd: saveOrder, placeHolderTemplate: "<li class='placeHolder'><div></div></li>" });

            function saveOrder() {
                var data = $("#gallery li").map(function() { return $(this).data("itemid"); }).get();
                $.post("drag.php", { "ids[]": data });
            };
        </script>
    </body>
</html>
