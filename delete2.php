<html>
<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();
?>
<title>แบบตอบรับการเข้าประชุมออนไลน์</title>
<head>
<meta charset="UTF-8">
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<center>
<?php
	ini_set('display_errors', 1);
	error_reporting(~0);

	$conn = mysqli_connect('localhost','root','','lab25');

	$struserId = $_GET["userId"];
	$sql = "DELETE FROM users
			WHERE userId = '".$struserId."' ";

	$query = mysqli_query($conn,$sql);

	if(mysqli_affected_rows($conn)) {
		 echo "<br>ลบข้อมูลเรียบร้อยแล้ว";
		 echo "<meta http-equiv='refresh' content='1;URL=delete.php'>";
	}

	mysqli_close($conn);
?>
</center>
</body>
</html>
