<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-874" />
<title>Untitled Document</title>
</head>

<body>
<?PHP
session_start();
if($_POST['action']){
 if($_POST['verifycode'] !=$_SESSION['total'] ){
    echo " Verify Code ���١��ͧ �ô�������ա����<br>";
 }else{
     $headers  = "MIME-Version: 1.0\r\n";
     $headers .= "Content-type: text/html; charset=tis-620\r\n";
     $headers .= "From:  ".$_POST['name']." <".$_POST['email'].">\r\n";

     $msgs .= " �ҡ�س  ".$_POST['name'].'<br>';
     $msgs .= " ��  ".$_POST['tel'].'<br>';
     $msgs .= "��ͤ���<br>".$_POST['msg'];


     $mailto = "wisarut_night@hotmail.com";
     if(mail($mailto, $_POST['subj'], $msgs, $headers)){
     echo "�������";
     }else{
     echo "�Դ��Ҵ";
     }
     exit();
 }
  }
?>
</body>
</html>