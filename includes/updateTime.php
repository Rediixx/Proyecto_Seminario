<?php

$id = $_POST['id'];
$estimatedHours = $_POST['estimatedHours'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

updateHour($conn, $id, $estimatedHours);