<?php

include "db.php";

if ($_POST) {
    writeInterval($_POST['interval']);
}

header('Location: https://honestinstall.com/smooth/admindemo/index.php');