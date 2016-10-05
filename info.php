<?php
session_start();
if(!isset($_SESSION['User']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();
?>
<head>
  <title>แบบตอบรับการเข้าประชุมออนไลน์</title>
  <meta charset="UTF-8">
  <link href="css/bootstrap.min.css" rel="stylesheet">
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
      <li><a href="menuUser.php">Home</a></li>
      <li><a href="<?php
						$query = db()->query('SELECT status FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
						$data = $query->fetch_array();
						{
						echo db()->error;
						if ($data['status'] == 2){
						echo "form.php";
						}elseif ($data['status'] == 3){
						echo "form2.php";
						}
					?>
					<?php
					}
					?>
		">แบบตอบรับ</a></li>
      <li><a href="myUser.php">ข้อมูลส่วนตัว</a></li>
	  <li class="active"><a href="info.php">ติดต่อสอบถาม</a></li>
    </ul>
<ul class="nav navbar-nav navbar-right">
<?php	$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel, statusnow, category, datein, dateout, meet1, rmeet FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
echo db()->error; ?>
      <li><a href="myUser.php"><span class="glyphicon glyphicon-user"></span> <?php echo $data['first']." ".$data['name'];?></a></li>
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
	
$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel, statusnow, category, datein, dateout, meet1, rmeet FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
echo db()->error;
?>
<center>
<br><table border="0">
  <tr>
	<td>	<table border="0">
			 <tr>
				<td rowspan="3"><img src="logo1.png"></td>
			  </tr>
			  <tr>
			  <td colspan="2">ติดต่อสอบถามงานสภาวิชาการ สำนักส่งเสริมวิชาการและงานทะเบียน มทร.ล้านนา <br>
			  <br>หมายเลขโทรศัพท์ : ๐๕๓ ๙๒๑ ๔๔๔ ต่อ ๑๑๐๔ <br>
			  <br>อีเมล : pimparn@rmutl.ac.th</td>
			  </tr>

			</table>
	</td>
  </tr>
</table></br>
</center>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
 <div id="footer">
<center><font color="white">ระบบส่งแบบตอบรับการเข้าประชุมออนไลน์</font>
		<font color="white">สภาวิชาการมหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</font>
		<br><font color="white">ติดต่อสอบถาม : pimparn@rmutl.ac.th</font></br>
	</center></div>
</div>

</html>