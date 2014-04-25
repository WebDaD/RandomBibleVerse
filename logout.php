<?php 
session_start();
$_SESSION['loggedin'] == 1;
session_write_close();
header('Location:login.php');
?>
