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
	  <li><a href="menu6.php">แก้ไขข้อมูลบุคลากร</a></li>
	  <li><a href="menu7.php">รายชื่อคณะกรรมการ</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php	$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
echo db()->error; ?>
      <li class="active"><a href="menu3.php"><span class="glyphicon glyphicon-user"></span> <?php echo $data['first']." ".$data['name'];?></a></li>
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
<body> 
<?php 
	
$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
echo db()->error;
?>

<!doctype html>
<html lang="en"
 
 <body>

	<div class="container">
	<div class="row">
	<form class="form-horizontal">

	<div class="form-group">
		<div class="col-sm-6"></div>
		<div class="bg-primary">ข้อมูลส่วนตัว</div>
		<div class="col-sm-6">
		</div>
	</div>
   
	<div class="form-group">
		<label class="col-sm-4 control-label" >คำนำหน้า : </label>
		<div class="col-sm-4">
			<input type="text" name="first" class="form-control" readonly value="<?php echo $data['first']?>">
		</div>
	</div>


	<div class="form-group">
		<label class="col-sm-4 control-label" >ชื่อ : </label>
			<div class="col-sm-4">
		<input type="text" name="name" class="form-control" readonly value="<?php echo $data['name']?>">
		<div class="col-sm-2"></div>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-4 control-label">นามสกุล :</label>
			<div class="col-sm-4">
		<input type="text" class="form-control" name="sername" readonly value="<?php echo $data['sername']?>">
		<div class="col-sm-2"></div>
	 </div>
	 </div>
	
	<div class="form-group">
	<label class="col-sm-4 control-label" >เบอร์โทรศัพท์ : </label>
	<div class="col-sm-4">
		<input type="text" name="telephone" class="form-control" readonly value="<?php echo $data['telephone']?>">
	 </div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label" >ตำแหน่ง : </label>
	<div class="col-sm-4">
		<input type="text" name="position" class="form-control" readonly value="<?php echo $data['position']?>">
	 </div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label" >วันที่เข้า : </label>
	<div class="col-sm-4">
		<input type="text" name="datein" class="form-control" readonly value="<?php echo $data['datein']?>">
	 </div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label" >Username : </label>
	<div class="col-sm-4">
		<input type="text" name="username" class="form-control" readonly value="<?php echo $data['username']?>">
	 </div>
	</div>

	<div class="form-group">
	<label class="col-sm-4 control-label" >Password : </label>
	<div class="col-sm-4">
		<input type="text" name="password" class="form-control" readonly value="<?php echo $data['password']?>">
	 </div>
	</div>

	</div>
  </form>
  </div>
</div>

</center>
<br></br>
<div id="footer">
<center><font color="white">ระบบส่งแบบตอบรับการเข้าประชุมออนไลน์</font>
		<font color="white">สภาวิชาการมหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</font>
		<br><font color="white">ติดต่อสอบถาม : pimparn@rmutl.ac.th</font></br>
	</center></div>
</div>
