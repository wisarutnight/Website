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
      <li><a href="menu.php">Home</a></li>
      <li class="active"><a href="menu2.php">แบบตอบรับ</a></li>
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
$query = db()->query('SELECT statusmeeting FROM tbllog WHERE userId="'.$_SESSION['userIdtest'].'"');
$data = $query->fetch_array();
			{
			echo db()->error;
			if ($data['statusmeeting'] == 1){ echo "ส่งแบบตอบรับแล้ว";}
							else{ echo "ยังไม่ได้ส่งแบบตอบรับ";}
?>
<?php
			}
?>
<center>
<form name="form" action="finishadmin21.php" method="post">
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
    <td colspan="6" align="left"><input name="meeting" type="radio" value="1"  checked="checked" > เข้าประชุมได้</td>
  </tr>
  <tr>
    <td height="42">2.</td>
    <td colspan="6" align="left"><input name="meeting" type="radio" value="3"> ไม่สามารถเข้าประชุมได้</td>
  </tr>
  <tr>
    <td height="36">&nbsp;</td>
    <td width="27">&nbsp;</td>
    <td width="99">เนื่องจาก</td>
    <td colspan="4"><input name="nomeeting" type="radio" value="1"> ไปราชการ 
	<input type="text" name="other" id="other"></td>
  </tr>
  <tr>
    <td height="34">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4"><input name="nomeeting" type="radio" value="2"> ลาพักผ่อน / ลากิจ / ลาป่วย</td>
  </tr>
  <tr>
    <td height="32">&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td colspan="4"><input name="nomeeting" type="radio" value="3"> อื่นๆ 
	<input type="text" name="other2" id="other"></td>
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
<div class="container">            
	<ul class="pager">
    <li class="previous" type="button" value="Refresh"><a href="menu2.php">ย้อนกลับ</a></li>
	<input type="hidden" name="idautostart" value="<?php echo $idtest; ?>" >
	<input type="hidden" name="telnow" value="<?php echo $data['telephone']; ?>" >
    <input a class="btn btn-primary btn-lg" type="submit" value="ส่งแบบฟอร์ม">
	</ul>
</div>
</center>
	</TR></TBODY></TABLE></br>

</center>
</form>
<a style="display:scroll;position:fixed;bottom:5px;right:5px;" class="backtotop" href="#" rel="nofollow" title="Back to Top"><img style="border:0;" src="top.png"/></a>
  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>