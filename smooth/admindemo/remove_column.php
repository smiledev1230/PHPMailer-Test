<?php

include "db.php";
if ($_POST['submit']) {
    removeColumn($_POST['column_position']);
}

header('Location: index.php');