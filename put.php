<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
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

$query = db()->query('SELECT userId FROM users WHERE no = "'. $no .'" LIMIT 1');
if($query->num_rows > 0)
{
	die('<center><br><table border="0"><tr><td colspan="2"><h3>ไม่สามารถเพิ่มข้อมูลได้ อาจมีสาเหตุมาจาก </h></td></tr>
										<tr><td align="center">-</td>
											<td>มีเลขที่ลำดับนี้อยู่แล้ว</td>
										</tr>
										<tr><td align="center">-</td>
											<td>กรอกข้อมูลไม่ครบ</td>
										</tr><br>
		</table></center>');
}

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
