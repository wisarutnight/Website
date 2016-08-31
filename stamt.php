<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
?>
<?php
 $_GET['userId'];


?>

<?php
include 'config.php';
connect_db();

$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel, telephone, statusnow, category, datein, dateout FROM users WHERE userId = "'.$_GET['userId'].'"');
list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout) = $query->fetch_row();


?>
<!doctype html>
<html lang="en">
<title>แบบตอบรับการเข้าประชุมออนไลน์</title>
 <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css">
 </head>

<body>
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
	
	echo $first.$name." ".$sername; 
echo db()->error;

?>
</td>
  
  </tr>
   <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
  <tr>
    <td>
<?php
$query = db()->query('SELECT meeting,
	nomeeting,
	other,
	commentother,
	statusmeeting,
	telnow,
	plane,
	from1,
	fromtime1,
	arrive1,
	arrivetime1,
	return1,
	returntime1,
	Airport1,
	Airporttime1,
	idautodatastart,
	userId,
	fromtype FROM tbllog WHERE userId="'.$_GET['userId'].'"');
list($meeting,
	$nomeeting,
	$other,
	$commentother,
	$statusmeeting,
	$telnow,
	$plane,
	$from1,
	$fromtime1,
	$arrive1,
	$arrivetime1,
	$return1,
	$returntime1,
	$Airport1,
	$Airporttime1,
	$idautodatastart,
	$userId,
	$fromtype) = $query->fetch_row();
			{
			echo db()->error;
	if ($meeting == 1){
	echo "เข้าร่วมประชุมได้";
}	if ($meeting == 2){
	echo "เข้าร่วมประชุมทางไกลได้";
}
	if ($meeting == 0){
	echo "ยังไม่ได้ส่งแบบตอบรับ";
}
	elseif ($meeting == 3){
	echo "ไม่สามารถเข้าประชุมได้";
	echo " เนื่องจาก ";
}
	if ($nomeeting == 1){
	echo "ไปราชการ ";
	echo $other;
}	
	if ($nomeeting == 2){
	echo "ลาพัก / ลากิจ / ลาป่วย";
}
	elseif ($nomeeting == 3){
	echo "อื่นๆ ";
	echo $commentother;
}

if ($fromtype == 2){
echo "<br>รายละเอียดเดินทางเข้าประชุม";
echo "<br>เครื่องบินเดินทาง วันที่ ";
echo $plane;

echo "<br>เดินทางมาจาก ";
echo $from1;
echo " เวลา ";
echo $fromtime1;

echo "<br>ถึงสนามบิน ";
echo $arrive1;
echo " เวลา ";
echo $arrivetime1;

echo "<br>เดินทางขากลับจาก ";
echo $return1;
echo " เวลา ";
echo $returntime1;

echo "<br>ถึงสนามบิน ";
echo $Airport1;
echo " เวลา ";
echo $Airporttime1;

}else{
echo "";
}

?>
<?php
			}
?>
</td>
    
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">ลงชื่อ..............................................ผู้ตอบแบบตอบรับ</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">( <?php echo $first.$name." ".$sername; ?> )</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center"><?php echo $position ?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td colspan="2" align="center">  หมายเลขโทรศัพท์ที่ติดต่อได้สะดวก  <?php echo $telephone; ?></td>
  </tr>
</table>
</center>
	</TR></TBODY></TABLE></br>

</center>
</form>

<div class="form-group">
	<ul class="pager">
    <li class="previous" type="button" value="Refresh"><a href="menu5.php">ย้อนกลับ</a></li>
	</ul>
</div>

  <script src="js/jquery-1.11.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
 </body>
</html>