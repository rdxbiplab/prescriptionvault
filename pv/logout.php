<?php 
session_start();
error_reporting(0);
include('admin/connect.php');

session_destroy();
echo "<script>window.location='index.php'</script>";
	
?>

