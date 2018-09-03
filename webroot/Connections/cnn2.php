<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_cnn = "localhost";
$database_cnn = "copycenter";
$username_cnn = "root";
$password_cnn = "";
$cnn = mysql_connect($hostname_cnn, $username_cnn, $password_cnn) or trigger_error(mysql_error(),E_USER_ERROR); 
?>