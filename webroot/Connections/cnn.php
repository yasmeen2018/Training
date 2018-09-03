<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_asconn = "localhost";
$database_asconn = "visitors";
$username_asconn = "root";
$password_asconn = "";
$asconn = mysql_connect($hostname_asconn, $username_asconn, $password_asconn) or die(mysql_error());
?>