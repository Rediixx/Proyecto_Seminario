<?php

$id = $_POST['id'];

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

checkStatus($conn, $id);