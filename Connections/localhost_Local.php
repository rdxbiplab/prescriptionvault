<?php

error_reporting(E_ALL ^ E_DEPRECATED);

# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_localhost = "localhost";
$database_localhost = "registeruser";
$username_localhost = "root";
$password_localhost = "";
$localhost = mysql_connect($hostname_localhost, $username_localhost, $password_localhost) or trigger_error(mysql_error(),E_ERROR | E_PARSE); 
?>
