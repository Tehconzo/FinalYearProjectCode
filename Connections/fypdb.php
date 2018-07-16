<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_fypdb = "localhost";
$database_fypdb = "fypdb";
$username_fypdb = "root";
$password_fypdb = "";
$fypdb = mysql_pconnect($hostname_fypdb, $username_fypdb, $password_fypdb) or trigger_error(mysql_error(),E_USER_ERROR); 
?>