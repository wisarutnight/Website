<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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

	$no= $_POST['no'];
	$first= $_POST['first'];
	$name= $_POST['name'];
	$sername= $_POST['sername'];
	$username= $_POST['username'];
	$password= $_POST['password'];
	$telephone= $_POST['telephone'];
	$tel= $_POST['tel'];
	$position= $_POST['position'];
	$statusnow= $_POST['statusnow'];
	$datein= $_POST['datein'];
	$dateout= $_POST['dateout'];
	$status= $_POST['status'];

db()->query('INSERT INTO users (
	no,
	first,
	name,
	sername,
	username,
	password,
	telephone,
	tel,
	position,
	statusnow,
	datein,
	dateout,
	status
) 
VALUES (
	"'. $no.'",
	"'. $first.'",  
	"'. $name .'",
	"'. $sername.'",
	"'. $username.'",
	"'. $password.'",
	"'. $telephone.'",
	"'. $tel.'",
	"'. $position.'",
	"'. $statusnow.'",
	"'. $datein.'",
	"'. $dateout.'",
	"'. $status.'"
)');
echo $mysqli->error;

?> 


<link href="style.css" rel="stylesheet">
<br>
<center>
<h1>
เพิ่มข้อมูลแล้ว
</h1>
</br>
<br>
<a href="menu6.php" class=Button>กลับสู่หน้าหลัก</a></center></br>
</html>
