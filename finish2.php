<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();
?>
<link href="style.css" rel="stylesheet">
<br>
<center>
<h1>
ส่งแบบตอบรับเสร็จเรียบร้อยแล้ว
</h1>
</br>
<br>
<a href="menuUser2.php" class=Button>กลับสู่หน้าหลัก</a></center></br>

<?php

/*if(!isset($_POST['meeting']) && !isset($_POST['nomeeting']) && !isset($_POST['other']) && !isset($_POST['other2']))
{
	die('Hacker');
}

$no= $_POST['meeting'];
$first= $_POST['nomeeting'];
$name= $_POST['other'];
$sername= $_POST['other2'];

$query = db()->query('SELECT idlog FROM tbllog WHERE idlog = "'. $idlog .'" LIMIT 1');
if($query->num_rows > 0)
{
	die('no duplicate');
}

db()->query('INSERT INTO tbllog (
	meeting,
	nomeeting,
	other,
	other2
) 
VALUES (
	"'. $meeting .'",
	"'. $nomeeting .'", 
	"'. $other.'", 
	"'. $other2.'"
)');
echo $mysqli->error;

//header('Location:index.php');
*/?>

<?
echo $meeting;
?>