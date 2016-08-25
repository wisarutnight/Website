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
      <li class="active"><a href="menuUser.php">Home</a></li>
      <li><a href="form.php">แบบตอบรับ</a></li>
      <li><a href="myUser.php">ข้อมูลส่วนตัว</a></li>
	  <li><a href="info.php">ติดต่อสอบถาม</a></li>
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

<?php
$query = db()->query('SELECT mt FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
			{
			echo db()->error;
			if ($data['mt'] == 1){ echo "ส่งแบบตอบรับแล้ว";}
							else{ echo "ยังไม่ได้ส่งแบบตอบรับ";}
?>
<?php
			}
?>

<center>
<form name="form1" action="finish2.php" method="post">
<br><TABLE height=50 cellSpacing=1 cellPadding=0 width="1200" bgColor=FFFFFF border=0>
	
	<TBODY>
	<TR bgColor=FFFFFF>
	<TD onmouseover="mOvr(this,'#6600FF');" onclick=mClk(this); onmouseout=mOut(this); align=center width=120 height=1>
	<br>การเข้าประชุมสภาวิชาการใหาวิทยาลัยเทคโนโลยีราชมงคลล้านนา</br>
			<br><form>ครั้งที่  
<?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
{
echo db()->error;
if ($statusmeeting == 1){ echo $round;}
							else{ echo "";}
?>
<?php
}
?></br>
			<br>วันที่  <?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
			while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
			{
			echo db()->error;
			if ($statusmeeting == 1){ echo $date;}
							else{ echo "";}?>
			<?php
			}
			?>
			เวลา  <?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
			while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
			{
			echo db()->error;
			if ($statusmeeting == 1){ echo $time;}
							else{ echo "";}?>
			<?php
			}
			?> น.</br>
			</br>
			<br><?php $query = db()->query ('SELECT idautodatastart, round, date, time, place, statusmeeting FROM tbldatastart');
			while(list($idautodatastart, $round, $date, $time, $place, $statusmeeting) = $query->fetch_row())
			{
			echo db()->error;
			if ($statusmeeting == 1){ echo $place;}
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
    <td height="45" colspan="7" align="left">ชื่อ <?php 
	
$query = db()->query('SELECT * FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
	echo $data['first'].$data['name']." ".$data['sername']; 

echo db()->error;

?></td>
  </tr>
  <tr>
    <td width="20" height="41">1.</td>
    <td colspan="6" align="left"><input name="meeting" type="radio" value="เข้าประชุมได้"> เข้าประชุมได้</td>
  </tr>
  <tr>
    <td height="42">2.</td>
    <td colspan="6" align="left"><input name="meeting" type="radio" value="ไม่สามารถเข้าประชุมได้"> ไม่สามารถเข้าประชุมได้</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td width="27">&nbsp;</td>
    <td width="99">เนื่องจาก</td>
    <td colspan="4"><input name="nomeeting" type="radio" value="nomeeting"> ไปราชการ <input type="text" name="other" id="other"></td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4"><input name="nomeeting" type="radio" value="nomeeting"> ลาพักผ่อน / ลากิจ / ลาป่วย</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4"><input name="nomeeting" type="radio" value="nomeeting"> อื่นๆ <input type="text" name="other" id="other"></td>
  </tr>
  <tr>
    <td height="37">3.</td>
    <td colspan="6">รายละเอียดเดินทางเข้าประชุม เดินทางโดย</td>
  </tr>
  <tr>
    <td height="35">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="5">เครื่องบินเดินทาง วันที่ <input type="date" name="plane" value="plane"></td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">เดินทางมาจาก <input type="text" name="from" id="from" size="40"></td>
    <td colspan="3">เวลา <input type="time" name="fromtime" id="fromtime"></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">ถึงสนามบิน <input type="text" name="arrive" id="arrive" size="43"></td>
    <td colspan="3">เวลา <input type="time" name="arrivetime" id="arrivetime"></td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">เดินทางขากลับจาก <input type="text" name="return" id="return" size="36"></td>
    <td colspan="3">เวลา <input type="time" name="returntime" id="returntime"></td>
  </tr>
  <tr>
    <td height="31">&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="2">ถึงสนามบิน <input type="text" name="Airport" id="Airport" size="43"></td>
    <td colspan="3">เวลา <input type="time" name="Airporttime" id="Airporttime"></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>ลงชื่อ...................................................ผู้ตอบแบบตอบรับ</td>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center">( <?php echo $data['first'].$data['name']." ".$data['sername']; ?> )</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td align="center"><?php echo $data['position'] ?></td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4">หมายเลขโทรศัพท์ที่ติดต่อได้สะดวก <?php echo $data['telephone']; ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td width="300">&nbsp;</td>
    <td width="110">&nbsp;</td>
    <td width="77">&nbsp;</td>
    <td width="84">&nbsp;</td>
  </tr>
</table>
	<br></br>
	<input type="button" value="Refresh" onClick="javascript:location.reload();">
	<input type="submit" name="Submit" value="ส่งแบบฟอร์ม">
	<br></br>
</center>
	</TR></TBODY></TABLE></br>

</center>
</form>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>