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
  <link href="css/bootstrap.min.css" rel="stylesheet">
    <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
 </head>
<style type="text/css">

body  { background-color : FFFFCC }

</style>			
<link href="style.css" rel="stylesheet">
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    </div>
    <ul class="nav navbar-nav">
      <li><a href="menu.php">Home</a></li>
      <li><a href="menu2.php">แบบตอบรับ</a></li>
	  <li><a href="setmeet.php">เพิ่มการประชุม</a></li>
      <li><a href="menu4.php">ส่งอีเมล</a></li>
	  <li><a href="menu5.php">สถานะการตอบรับ</a></li>
	  <li><a href="menu6.php">แก้ไขข้อมูลบุคลากร</a></li>
	  <li class="active"><a href="menu7.php">รายชื่อคณะกรรมการ</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php	$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel, statusnow, category, datein, dateout, meet1, rmeet FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
echo db()->error; ?>
      <li><a href="menu3.php"><span class="glyphicon glyphicon-user"></span> <?php echo $data['first']." ".$data['name'];?></a></li>
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>
	<style type="text/css">  
	div.iBannerFix{  
    height:50px;  
    position:fixed;  
    left:0px;  
    bottom:0px;  
    background-color:#000000;  
    width:100%;  
    z-index: 99;  
}  
</style>
<div class="container">
	<div class="row">
	<form class="form-horizontal">

	<div class="form-group">
		<div class="col-sm-6"></div>
		<div class="bg-primary">รายชื่อคณะกรรมการ</div>
		<div class="col-sm-6">
		</div>
	</div>

<table class="table table-hover">
	<tr>
		<td><center>ลำดับ</center></td>
		<td><center>ชื่อ</center></td>
		<td><center>นามสกุล</center></td>
		<td><center>ตำแหน่ง</center></td>
		<td><center>เบอร์โทรศัพท์</center></td>
		<td><center>ประเภทกรรมการ</center></td>
		<td><center>สถานะ</center></td>
	</tr>
<?php 
	
$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel,  telephone, statusnow, category, datein, dateout FROM users');
while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout) = $query->fetch_row())
{
?>
<tr>
		<td><center><?php echo $no;?></center></td>
		<td><?php echo $first," ", $name;?></td>
		<td><?php echo $sername;?></td>
		<td><?php echo $position;?></td>
		<td><center><?php echo $telephone;?></center></td>
		<td><center><?php if ($statusnow == 1){ echo "กรรมการสภาวิชาการ";}
										else{ echo "ผู้เข้าร่วมประชุม";}?></center></td>
		<td><center><?php if ($statusnow == 1){ echo "ปัจจุบัน";}
										else{ echo "หมดวาระ";}?></center></td>
</tr>
<?php
}
?>
</table>
</center>
<div id="footer">
<center><font color="white">ระบบส่งแบบตอบรับการเข้าประชุมออนไลน์</font>
		<font color="white">สภาวิชาการมหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</font>
		<br><font color="white">ติดต่อสอบถาม : pimparn@rmutl.ac.th</font></br>
	</center></div>
</div>

	