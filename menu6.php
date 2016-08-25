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
      <li><a href="menu4.php">ประวัติการประชุม</a></li>
	  <li><a href="menu5.php">สถานะการตอบรับ</a></li>
	  <li class="active"><a href="menu6.php">แก้ไขข้อมูลบุคลากร</a></li>
	  <li><a href="menu7.php">รายชื่อคณะกรรมการ</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php	$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
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
		<div class="bg-primary">แก้ไขข้อมูลบุคคลากร</div>
		<div class="col-sm-6">
		</div>
</div>
<a href="menu8.php"><h5 align="right">เพิ่มผู้ใช้งาน</h3></a>
<table class="table table-hover">
	<tr>
		<td>ลำดับ</td>
		<td>คำนำหน้า</td>
		<td>ชื่อ</td>
		<td>นามสกุล</td>
		<td>ตำแหน่ง</td>
		<td>สถานะ</td>
		<td>แก้ไขข้อมูล</td>
	</tr>
<?php 
	
$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel,  telephone, statusnow, category, datein, dateout FROM users ORDER BY no ASC');
while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout) = $query->fetch_row())
{
?>
<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $first;?></td>
		<td><?php echo $name;?></td>
		<td><?php echo $sername;?></td>
		<td><?php echo $position;?></td>
		<td><?php if ($status == 1){ echo "Admin";}
				  elseif ($status == 2){ echo "User";}
				  elseif ($status == 3){ echo "User2";}
				  else { echo "ไม่ได้ลงทะเบียน";}?></td>
		<td><a href="edit.php?userId=<?php echo $userId;?>">แก้ไข </a></td>
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
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="top.png"/></a>