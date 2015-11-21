<?php

error_reporting(E_ALL ^ E_DEPRECATED);

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = "us-cdbr-azure-east-a.cloudapp.net";
$database_localhost = "prescriAvpzXeqTu";
$username_localhost = "bf7f5c6469ff9b";
$password_localhost = "c3f02b41";
$localhost = mysql_connect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_ERROR | E_PARSE); 
?>

