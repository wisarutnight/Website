<?php
session_start(); 
include 'config.php';
connect_db();

$username = $_POST['username'];
$password = $_POST['password'];

if($username == ''){
echo "username";
} else if($password == ''){
echo "password";
} else {


$query = db()->query('SELECT no, userId, username, password, status, first, name, sername, position, tel, statusnow, category, datein, dateout, meet1, rmeet FROM users WHERE username="'.$username.'" and password="'.$password.'"');
echo db()->error;
$data = $query->fetch_array();
$_SESSION['userIdtest']=$data['userId'];

if ($data['status'] == 1){
	$_SESSION['status'] = "Admin";
	echo "<meta http-equiv='refresh' content='1;URL=menu.php'>";
}elseif ($data['status'] == 2){
	$_SESSION['status'] = "User";
	echo "<meta http-equiv='refresh' content='1;URL=menuUser.php'>";
}
elseif ($data['status'] == 3){
	$_SESSION['status'] = "User";
	echo "<meta http-equiv='refresh' content='1;URL=menuUser2.php'>";
}
/*$num = $query->num_rows;
if($num <= 0){
echo "<meta http-equiv='refresh' content='1;URL=index.html'>";
}
while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $statusnow, $category, $datein, $dateout) = $query->fetch_row())

if($status == 1){
$data = $query->fetch_array();
$_SESSION['status'] = "Admin";
$_SESSION['userIdtest']=$data['userId'];
echo "<meta http-equiv='refresh' content='1;URL=menu.php'>";
}

else if($status == 2){
$data = $query->fetch_array();
$_SESSION['status'] = "User";
$_SESSION['userIdtest']=$data['userId'];
echo "<meta http-equiv='refresh' content='1;URL=menuUser.php'>";
}

else{
$data = $query->fetch_array();
$_SESSION['status'] = "User";
$_SESSION['userIdtest']=$data['userId'];
echo "<meta http-equiv='refresh' content='1;URL=menuUser2.php'>";
}
*/

/*	if($num <= 0){
	echo "<meta http-equiv='refresh' content='1;URL=index.html'>";
	} else {
		while(list($no, $userId, $username, $password, $status, $first, $name, $sername, $position, $tel, $statusnow, $category, $datein, $dateout) = $query->fetch_row())
		//echo $status;
		if($status == 1){
				$_SESSION['ses_id'] = session_id();
				$_SESSION['username'] = $status;
				$_SESSION['status'] = "Admin";
				$_SESSION['userId'] = "userId";
				echo "<meta http-equiv='refresh' content='1;URL=menu.php'>";
		}else if($status == 2){
				$_SESSION['ses_id'] = session_id();
				$_SESSION['username'] = $status;
				$_SESSION['status'] = "User";
				$_SESSION['userId'] = "userId";
				echo "<meta http-equiv='refresh' content='1;URL=menuUser.php'>";
		} else{
				$_SESSION['ses_id'] = session_id();
				$_SESSION['username'] = $status;
				$_SESSION['status'] = "User2";
				$_SESSION['userId'] = "userId";
				echo "<meta http-equiv='refresh' content='1;URL=menuUser2.php'>";
		}

		}*/
	}
?>