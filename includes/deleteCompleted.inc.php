<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(!$_GET['id']){
    echo 'error';
} else {
    $id = $_GET['id'];

    deleteRecordCompleted($conn, $id);

    header("location: ../completed.php");
}