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
<title>แบบตอบรับการเข้าประชุมออนไลน์</title>
<head>
  <meta charset="UTF-8">
  <link href="style.css" rel="stylesheet" type="text/css">
 </head>
<?php
require 'PHPMailerAutoload.php';
if(isset($_POST['send']))
{
// Fetching data that is entered by the user
$email = $_POST['email'];
$password = $_POST['password'];
$to_id = $_POST['toid'];
$message = $_POST['message'];
$subject = "=?utf-8?b?".base64_encode($_POST['subject'])."?=";

// Configuring SMTP server settings
$mail = new PHPMailer;
$mail->CharSet = "utf-8";
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
//$mail->SMTPDebug  = 1;
$mail->SMTPAuth = true;
$mail->Username = $email;
$mail->Password = $password;

// Email Sending Details
$mail->addAddress($to_id);
$mail->Subject = $subject;
$mail->msgHTML($message);

// Success or Failure
if (!$mail->send()) {
$error = "Mailer Error: " . $mail->ErrorInfo;
echo '<p id="para">'.$error.'</p>';
}
else {
echo '<p id="para">Message sent!</p>';
}
}
else{
echo '<p id="para">Please enter valid data</p>';
}
?>
<br>
<center>
<h1>
ส่งเมล์เสร็จเรียบร้อยแล้ว
</h1>
</br>
<br>
<a href="menu4.php" class=Button>ตกลง</a></center></br>
</html>
