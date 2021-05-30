<?php

include "db.php";

if ($_POST['submit']) {
    switch ($_POST['position']) {
        case 'end':
            insertEndColumn(1);
            break;
        case 'beginning':
            insertFirstColumn(1);
            break;
        case 'after':
            insertAfterColumn($_POST['column_position']);
            break;
        default:
            echo 'test...';
            break;
    }
}
header('Location: index.php');