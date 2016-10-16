<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
?>

<link href="style.css" rel="stylesheet" type="text/css">
<?php
include 'config.php'; 
connect_db();

$no= $_POST['no'];
$first= $_POST['first'];
$name= $_POST['name'];
$sername= $_POST['sername'];
$position= $_POST['position'];
$telephone= $_POST['telephone'];
$tel= $_POST['tel'];
$status= $_POST['status'];
$username= $_POST['username'];
$password= $_POST['password'];
$category= $_POST['category'];
$statusnow= $_POST['statusnow'];
$userId= $_POST['userId'];


$query = db()->query('SELECT userId FROM users WHERE no = "'. $no .'" LIMIT 1');
if($query->num_rows > 0)
{
	die('<center><br><table border="0"><tr><td colspan="2"><h3>ไม่สามารถแก้ไขข้อมูลได้ อาจมีสาเหตุมาจาก </h></td></tr>
										<tr><td align="center">-</td>
											<td>มีเลขที่ลำดับนี้อยู่แล้ว</td>
										</tr>
										<tr><td align="center">-</td>
											<td>กรอกข้อมูลไม่ครบ</td>
										</tr><br>
		</table></center>');
}
$s = sprintf('UPDATE users SET no="%s",first="%s",name="%s",sername="%s",position="%s",telephone="%s",tel="%s",status="%s",username="%s",password="%s",category="%s",statusnow="%s" WHERE userId ="%s" LIMIT 1',$no,$first,$name,$sername,$position,$telephone,$tel,$status,$username,$password,$category,$statusnow,$userId);
db()->query($s);
echo db()->error;
header('Location:menu6.php');
?> 
