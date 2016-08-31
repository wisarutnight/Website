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
	die('no duplicate');
}
$s = sprintf('UPDATE users SET no="%s",first="%s",name="%s",sername="%s",position="%s",telephone="%s",tel="%s",status="%s",username="%s",password="%s",category="%s",statusnow="%s" WHERE userId ="%s" LIMIT 1',$no,$first,$name,$sername,$position,$telephone,$tel,$status,$username,$password,$category,$statusnow,$userId);
db()->query($s);
echo db()->error;
header('Location:menu6.php');
?> 
