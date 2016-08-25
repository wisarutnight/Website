<?php
session_start();
//unset($_SESSION['login']);
unset($_SESSION['userIdtest']);
unset($_SESSION['status']);
header('Location: index.html');
die();

?>