<?php
session_start();
$_SESSION['user'] = null;
$_SESSION['user_id'] = null;
session_destroy();
header('Location:../index.php');
?>