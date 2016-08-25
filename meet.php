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


<table class="table table-hover">
	<tr>
		<td>ลำดับ</td>
		<td>ชื่อ</td>
		<td>นามสกุล</td>
		<td>ตำแหน่ง</td>
		<td>เบอร์โทรศัพท์</td>
		<td>สถานะการตอบรับ</td>
	</tr>
<?php 
	
$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel,  telephone, statusnow, category, datein, dateout, rmeet FROM users');
while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $telephone, $statusnow, $category, $datein, $dateout, $rmeet) = $query->fetch_row())
{
?>
<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $first," ",$name;?></td>
		<td><?php echo $sername;?></td>
		<td><?php echo $position;?></td>
		<td><?php echo $telephone;?></td>
		<?php
		$query1 = db()->query('SELECT idautodatastart, userId FROM tbllog WHERE idautodatastart="'.$_POST['id'].'" and userId="'.$userId.'"');
		echo db()->error;
		?>
		<td><?php if($query1->num_rows > 0)
			{
				echo "ส่งแบบตอบรับแล้ว";
			}else{
				echo "ยังไม่ได้ส่ง";	
			}
			?></td>
</tr>
<?php
}
?>
</table>
</center>


	