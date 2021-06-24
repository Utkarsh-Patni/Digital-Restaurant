<?php


session_start();

session_destroy();

$ordlist=array();
$i=0;

header('location: index.php');