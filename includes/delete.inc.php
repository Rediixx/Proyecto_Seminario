<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if(!$_GET['id']){
    echo 'error';
} else {
    $id = $_GET['id'];

    deleteRecord($conn, $id);

    header("location: ../add.php");
}