<?php

if (isset($_POST["submit"])) {
    $owner = $_POST["owner"];
    $status = $_POST["status"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $estimatedHours = $_POST["estimatedHours"];

    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    createBug($conn, $owner, $status, $description, $date, $estimatedHours);
}

else {
    header("location: ../add.php");
}