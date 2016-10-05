<?php
session_start();
if(!isset($_SESSION['User1']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();
?>

<head>
  <meta charset="UTF-8">
  <title>แบบตอบรับการเข้าประชุมออนไลน์</title>
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
      <li class="active"><a href="<?php
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
					?>">แบบตอบรับ</a></li>
      <li><a href="myUser.php">ข้อมูลส่วนตัว</a></li>
	  <li><a href="info.php">ติดต่อสอบถาม</a></li>
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

<?php
/*$query = db()->query('SELECT statusmeeting FROM tbllog WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
			{
			echo db()->error;
			if ($data['statusmeeting'] == 1){ ?> 
			<table border=0>
			<tr bgColor=FF0000><td><font color="white"><?php echo "ส่งแบบตอบรับแล้ว";}
							else{ echo "ยังไม่ได้ส่งแบบตอบรับ";} ?></td></tr></table>

<?php
			}
*/?>

<center>
<form name="form" action="finish1.php" method="post" enctype="multipart/form-data">
<br><TABLE height=50 cellSpacing=1 cellPadding=0 width="1200" bgColor=FFFFFF border=0>
	
	<TBODY>
	<TR bgColor=FFFFFF>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<br>การเข้าประชุมสภาวิชาการใหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</br>
			<br><form>ครั้งที่  
<?php 



$query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
{
echo db()->error;
if ($statusmeeting == 1){ echo $round;
$idtest=$idautodatastart;
}
							else{ echo "";}
?>
<?php
}
?></br>
			<br>วันที่  <?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
			while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
			{
			echo db()->error;
			if ($statusmeeting == 1){ echo $date;
			$date1=$date;
			}
							else{ echo "";}?>
			<?php
			}
			?>
			เวลา  <?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
			while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
			{
			echo db()->error;
			if ($statusmeeting == 1){ echo $time;
			$time1=$time;
			}
							else{ echo "";}?>
			<?php
			}
			?> น.</br>
			</br>
			<br><?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
			while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
			{
			echo db()->error;
			if ($statusmeeting == 1){ echo $place;
			$place1=$place;
			}
							else{ echo "";}?>
			<?php
			}
			?></br>
			<br>---------------------------------------------</br>
	</TD>
	<TR bgColor=FFFFFF>
	<TD> 
	<center><table height=100 cellSpacing=1 cellPadding=0 width="800" bgColor=FFFFFF border=0>
	 <tr>
    <td colspan="3">&nbsp;</td>
	</tr>
	 <tr>
    <td colspan="3">ชื่อ 
<?php 
	
$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
	
	echo $data['first'].$data['name']." ".$data['sername']; 
echo db()->error;

?>
</td>
  
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td width="250">1. <input name="meeting" type="radio" value="1" checked="checked" > เข้าประชุมได้</td>
    <td colspan="2"> <input name="meeting" type="radio" value="2"> เข้าประชุมทางไกลได้</td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>2. <input name="meeting" type="radio" value="3"> ไม่สามารถเข้าประชุมได้</td>
    <td>เนื่องจาก</td>
    <td align="left"> <input name="nomeeting" type="radio" value="1"> ไปราชการ  
	<input type="text" name="other" id="other">
	</td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td width="72">&nbsp;</td>
    <td width="403" align="left"> <input name="nomeeting" type="radio" value="2"> ลาพัก / ลากิจ / ลาป่วย</td>
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="left"> <input name="nomeeting" type="radio" value="3"> อื่นๆ <input type="text" name="other2" id="other"> </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">ลงชื่อ..............................................ผู้ตอบแบบตอบรับ</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">( <?php echo $data['first'].$data['name']." ".$data['sername']; ?> )</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><?php echo $data['position'] ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">  หมายเลขโทรศัพท์ที่ติดต่อได้สะดวก  <?php echo $data['telephone']; ?></td>
  </tr>
</table>
	<div class="container">            
	<ul class="pager">
	<input type="hidden" name="idautostart" value="<?php echo $idtest; ?>" >
	<input type="hidden" name="telnow" value="<?php echo $data['telephone']; ?>" >
    <input a class="btn btn-primary btn-lg" type="submit" value="ส่งแบบฟอร์ม">
	</ul>
</div>
</center>
	</TR></TBODY></TABLE></br>

</center>
</form>
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