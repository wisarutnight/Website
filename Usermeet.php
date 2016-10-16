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
<table class="table table-hover">
	<tr>
		<td><center>สถานะการตอบรับ</center></td>
		<td><center>ดูแบบตอบรับ</center></td>

	</tr>
<?php 
	
$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel,  telephone, statusnow, category, datein, dateout, rmeet FROM users WHERE userId="'.$_SESSION['userIdtest'].'"');
while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout, $rmeet) = $query->fetch_row())
{
?>
<tr>
		<?php
		$query1 = db()->query('SELECT idlog, idautodatastart, userId FROM tbllog WHERE idautodatastart="'.$_POST['id'].'" and userId="'.$userId.'"');
		echo db()->error;
		?>
		<td><?php if($query1->num_rows > 0)
			{
				echo "<center>ส่งแบบตอบรับแล้ว</center>";
			}else{
				echo "<center>ยังไม่ได้ส่ง</center>";	
			}
			?></td>
		<td><?php 	while(list($idlog, $idautodatastart, $userId) = $query1->fetch_row()) { ?>
		<center><a href="Userstameet.php?idlog=<?php echo $idlog;?>">ดู</center></a><?php } ?></td>
</tr>
<?php
}
?>
</table>
</center>