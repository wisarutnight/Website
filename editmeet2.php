<?php
session_start();
if(!isset($_SESSION['Admin']))
{
	header('Location: index.html');
	die();
}
?>
<title>Ẻ�ͺ�Ѻ�����һ�Ъ���͹�Ź�</title>
<link href="style.css" rel="stylesheet" type="text/css">
<?php
include 'config.php'; 
connect_db();

$round= $_POST['round'];
$date= $_POST['date'];
$time= $_POST['time'];
$place= $_POST['place'];
$statusmeeting= $_POST['statusmeeting'];
$idautodatastart= $_POST['idautodatastart'];


$query = db()->query('SELECT idautodatastart FROM tbldatastart WHERE round = "'. $round .'" LIMIT 1');
if($query->num_rows > 0)
{
	die('<center><br><table border="0"><tr><td colspan="2"><h3>�������ö��䢢����š�û�Ъ���� �Ҩ�����˵��Ҩҡ </h></td></tr>
										<tr><td align="center">-</td>
											<td>���駷���Ъ���������������</td>
										</tr>
										<tr><td align="center">-</td>
											<td>��͡���������ú</td>
										</tr>
										<tr><td align="center">-</td>
											<td>ʶҹС�û�Ъ�����١��ͧ �� �Ҩ�����ʶҹС�û�Ъ����������ش</td>
										</tr><br>
		</table></center>');
}

$s = sprintf('UPDATE tbldatastart SET 
round="%s",date="%s",time="%s",place="%s",statusmeeting="%s" WHERE idautodatastart ="%s" LIMIT 1'
,$round,$date,$time,$place,$statusmeeting,$idautodatastart);
db()->query($s);
echo db()->error;
echo "<meta http-equiv='refresh' content='1;URL=setmeet.php'>";
?> 
