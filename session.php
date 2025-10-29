<?php
session_start();
$_SESSION['username']='abc';
$_SESSION['role']='admin';
echo "Session is created";
?>
