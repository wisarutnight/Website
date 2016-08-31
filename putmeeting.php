<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
</head>
<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();

	$round= $_POST['round'];
	$date= $_POST['date'];
	$time= $_POST['time'];
	$place= $_POST['place'];
	$statusmeeting= $_POST['statusmeeting'];

db()->query('INSERT INTO tbldatastart (
	round,
	date,
	time,
	place,
	statusmeeting
) 
VALUES (
	"'. $round.'",
	"'. $date.'",  
	"'. $time .'",
	"'. $place.'",
	"'. $statusmeeting.'"
)');
echo $mysqli->error;


echo "<meta http-equiv='refresh' content='1;URL=setmeet.php'>";
?> 



</html>
