<?php

if (isset($_POST["submit"])) {
    $id = $_POST["update_id"];
    $estimatedHours = $_POST["estimatedHours"];
    $description = $_POST["description"];
    $date = $_POST["date"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    updateBug($conn, $id, $estimatedHours, $description, $date);
}

else {
    header("location: ../add.php?error");
}