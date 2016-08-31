<?php
session_start();
//unset($_SESSION['login']);
unset($_SESSION['userIdtest']);
/*unset($_SESSION['status']);*/
unset($_SESSION['Admin']);
unset($_SESSION['User']);
unset($_SESSION['User1']);
unset($_SESSION['User2']);
header('Location: index.html');
die();

?>