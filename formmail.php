<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<?
session_start();
$num1 = rand(0,10);
$num2 = rand(0,10);
$_SESSION['total'] = ($num1 * $num2);
?>
<form action='sendmail.php' method='post'>
   : <br>
  <table width="50%" border="1" align="center">
     <tr>
       <td width="11%">Subject</td>
       <td width="89%"><input type='text' name='subj' /></td>
     </tr>
     <tr>
       <td>Name</td>
       <td><input type='text' name='name' /></td>
     </tr>
     <tr>
       <td>Email</td>
       <td><input type='text' name='email' /></td>
     </tr>
     <tr>
       <td>Tel</td>
       <td><input type='text' name='tel' /></td>
     </tr>
     <tr>
       <td>Message</td>
       <td><textarea name="msg" rows="4" cols="30"></textarea></td>
     </tr>
     <tr>
       <td colspan="2">Verify Code :
         <?=$num1;?>*<?=$num2;?>
=
<input type='text' name='verifycode' />
         <input type='hidden' name='action' value='1' />
       <input type='submit' value='   ส่ง   ' /></td>
     </tr>
  </table>
</form>
</body>
</html>