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
<head>
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
      <li><a href="form.php">แบบตอบรับ</a></li>
      <li><a href="myUser.php">ข้อมูลส่วนตัว</a></li>
	  <li class="active"><a href="info.php">ติดต่อสอบถาม</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
<?php	$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
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
	
$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
echo db()->error;
?>

<!doctype html>
<html lang="en"
 <body>
<center>
<br><table width="1200" height="411" border=0>
  <tr bgColor=FFFFFF>
    <td><table width="591" height="440" border="0" align="left">
      <tr>
        <td height="31" colspan="2" align="left" valign="middle">ติดต่อสอบถามงานสภาวิชาการ สำนักส่งเสริมวิชาการและงานทะเบียน มทร.ล้านนา</td>
      </tr>
      <tr>
        <td width="132" height="38" align="left">หมายเลขโทรศัพท์ : </td>
        <td width="443">๐๕๓ ๙๒๑ ๔๔๔ ต่อ ๑๑๐๔</td>
      </tr>
      <tr>
        <td height="36" align="left">อีเมล : </td>
        <td>pimparn@rmutl.ac.th</td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
      </tr>
    </table></td>
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