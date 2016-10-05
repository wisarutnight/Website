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

<script type="text/javascript">
$(document).ready(function()
{
//change page
$("#round").change(function()
{
var id=$(this).val();
var dataString = 'id='+ id;
$.ajax
({
type: "POST",
url: "../11/setmeet2.php",
data: dataString,
cache: false,
success: function(html)
{
$("#show").html(html);
} 
});

});
});



</script>

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
	  <li class="active"><a href="setmeet.php">เพิ่มการประชุม</a></li>
      <li><a href="menu4.php">ส่งอีเมล</a></li>
	  <li><a href="menu5.php">สถานะการตอบรับ</a></li>
	  <li><a href="menu6.php">แก้ไขข้อมูลบุคลากร</a></li>
	  <li><a href="menu7.php">รายชื่อคณะกรรมการ</a></li>
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

<?php

$query = db()->query('SELECT round, date, time, place, statusmeeting FROM tbldatastart');
list($round, $date, $time, $place, $statusmeeting) = $query->fetch_row();

?>

 <body>
 <div class="container">
	<div class="row">
	<form class="form-horizontal" action="setmeet2.php" method="post">

	<div class="form-group">
		<div class="col-sm-5"></div>

   </FONT>
		<div class="col-sm-6">
		</div>
	</div>
   

<div class="form-group">
	<div class="col-sm-7">
	<input a class="btn btn-primary btn-lg" type="submit" value="+ เพิ่มการประชุม"></a></div>
	<div id="show">
 </div>       
</div>

<table class="table table-hover">
	<tr>
		<td><center>ครั้งที่ประชุม</center></td>
		<td><center>วันที่ประชุม</center></td>
		<td><center>เวลา</center></td>
		<td><center>สถานที่</center></td>
		<td><center>สถานะการประชุม</center></td>
		<td><center>แก้ไข</center></td>
	</tr>
<?php 
	
$query = db()->query('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart ORDER BY round DESC');
while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
{
?>
<tr>
		<td><center><?php echo $round;?></center></td>
		<td><center><?php echo $date;?></center></td>
		<td><center><?php echo $time;?></center></td>
		<td><?php echo $place;?></td>
		<td><center><?php if ($statusmeeting == 1){ echo "ครั้งล่าสุด";}
										else{ echo "ครั้งเก่า";}?>
		</center></td>
		<td><a href="editmeet.php?idautodatastart=<?php echo $idautodatastart;?>"><center>แก้ไข</center></a></td>
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
  
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>