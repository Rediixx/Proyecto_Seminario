<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(!$_GET['id']){
    echo 'error';
} else {
    $id = $_GET['id'];

    deleteRecordTrash($conn, $id);

    header("location: ../trash.php");
}