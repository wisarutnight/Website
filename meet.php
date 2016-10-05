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


<table class="table table-hover">
	<tr>
		<td><center>ลำดับ</center></td>
		<td><center>ชื่อ</center></td>
		<td><center>นามสกุล</center></td>
		<td><center>ตำแหน่ง</center></td>
		<td><center>เบอร์โทรศัพท์</center></td>
		<td><center>สถานะการตอบรับ</center></td>
		<td><center>ดูแบบตอบรับ</center></td>

	</tr>
<?php 
	
$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel,  telephone, statusnow, category, datein, dateout, rmeet FROM users');
while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout, $rmeet) = $query->fetch_row())
{
?>
<tr>
		<td><center><?php echo $no;?></center></td>
		<td><?php echo $first," ",$name;?></td>
		<td><?php echo $sername;?></td>
		<td><?php echo $position;?></td>
		<td><center><?php echo $telephone;?></center></td>
		<?php
		$query1 = db()->query('SELECT idlog, idautodatastart, userId FROM tbllog WHERE idautodatastart="'.$_POST['id'].'" and userId="'.$userId.'"');
		echo db()->error;
		?>
		<td><?php if($query1->num_rows > 0)
			{
				echo "ส่งแบบตอบรับแล้ว";
			}else{
				echo "ยังไม่ได้ส่ง";	
			}
			?></td>
		<td><?php 	while(list($idlog, $idautodatastart, $userId) = $query1->fetch_row()) { ?>
		<center><a href="stamt.php?idlog=<?php echo $idlog;?>">ดู</center></a><?php } ?></td>
</tr>
<?php
}
?>
</table>
</center>


	