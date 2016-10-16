<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet">
  <title>แบบตอบรับการเข้าประชุมออนไลน์</title>
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

$query = db()->query('SELECT idautodatastart FROM tbldatastart WHERE round = "'. $round .'" LIMIT 1');
if($query->num_rows > 0)
{
	die('<center><br><table border="0"><tr><td colspan="2"><h3>ไม่สามารถแก้ไขข้อมูลการประชุมได้ อาจมีสาเหตุมาจาก </h></td></tr>
										<tr><td align="center">-</td>
											<td>ครั้งที่ประชุมนี้มีอยู่แล้ว</td>
										</tr>
										<tr><td align="center">-</td>
											<td>กรอกข้อมูลไม่ครบ</td>
										</tr>
										<tr><td align="center">-</td>
											<td>สถานะการประชุมไม่ถูกต้อง เช่น อาจไม่มีสถานะการประชุมครั้งล่าสุด</td>
										</tr><br>
		</table></center>');
}

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
