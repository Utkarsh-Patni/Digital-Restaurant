<?php 

$submit = $_POST['submit'];
echo $submit;

$user_name = $_SESSION['user'];
$query = 'UPDATE `useramt` SET `payst` = "Paid" WHERE `useramt`.`user_name` =?;';
$query  = $pdoconn->prepare($sql);
$query->execute($user_name);

require('tablestatus.php');
?>


