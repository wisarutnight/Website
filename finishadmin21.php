<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
</head>
<?php
session_start();
if(!isset($_SESSION['status']))
{
	header('Location: index.html');
	die();
}
include 'config.php';
connect_db();

$meeting= $_POST['meeting'];

if($meeting==2){
$nomeeting= $_POST['nomeeting'];
if ($nomeeting==1){
	$other= $_POST['other'];
	$commentother= "";
}elseif($nomeeting==3){
	$commentother= $_POST['other2'];
	$other= "";
}
}else{
$nomeeting=0;
$other= "";
	$commentother= "";
}
$statusmeeting= 1;
$idautodatastart= $_POST['idautostart'];
$userId=$_SESSION['userIdtest'];
$fromtype=1;
$telnow=$_POST['telnow'];
$plane= $_POST['plane'];
$from1= $_POST['from'];
$fromtime1= $_POST['fromtime'];
$arrive1= $_POST['arrive'];
$arrivetime1= $_POST['arrivetime'];
$return1= $_POST['return'];
$returntime1= $_POST['returntime'];
$Airport1= $_POST['Airport'];
$Airporttime1= $_POST['Airporttime'];

/*$plane= $_POST['plane'];
$from= $_POST['from'];
$fromtime= $_POST['fromtime'];
$arrive= $_POST['arrive'];
$arrivetime= $_POST['arrivetime'];
$return= $_POST['return'];
$returntime= $_POST['returntime'];
$Airport= $_POST['Airport'];
$Airporttime= $_POST['Airporttime'];
$telnow= $_POST['telnow'];
$idautodatastart= $_POST['idautodatastart'];
$userId= $_POST['userId'];
$fromtype= $_POST['fromtype'];*/

db()->query('INSERT INTO tbllog (
	meeting,
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
	fromtype
) 
VALUES (
	"'. $meeting.'",
	"'. $nomeeting.'", 
	"'. $other.'", 
	"'. $commentother .'",
	"'. $statusmeeting.'",
	"'. $telnow.'",
	"'. $plane.'",
	"'. $from1.'",
	"'. $fromtime1.'",
	"'. $arrive1.'",
	"'. $arrivetime1.'",
	"'. $return1.'",
	"'. $returntime1.'",
	"'. $Airport1.'",
	"'. $Airporttime1.'",
	"'. $idautodatastart.'",
	"'. $userId.'",
	"'. $fromtype.'"
)');
echo $mysqli->error;

/*$s = sprintf('INSERT INTO tbllog meeting="%s",nomeeting="%s",other="%s",commentother="%s",statusmeeting="%s",telnow="%s",idautodatastart="%s",userId="%s",fromtype="%s"'
,$meeting,$nomeeting,$other,$commentother,$statusmeeting,$telnow,$idautodatastart,$userId,$fromtype);
db()->query($s);
echo db()->error;*/

?> 


<link href="style.css" rel="stylesheet">
<br>
<center>
<h1>
ส่งแบบตอบรับเสร็จเรียบร้อยแล้ว
</h1>
</br>
<br>
<a href="menu.php" class=Button>กลับสู่หน้าหลัก</a></center></br>
</html>
