<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"


$hostname = "localhost";
$database = "teedhottaaa";
$username = "teedhottaaa";
$password = "sNCxKGFKEJGiLddA";

$language = "SET NAMES 'utf8'";


//$link = mysql_connect($hostname, $username, $password) or trigger_error(mysql_error(),E_USER_ERROR);
$conn = new mysqli($hostname, $username, $password, $database);
mysqli_set_charset($conn,'utf8');


//mysql_select_db($database,$conn)or trigger_error(mysql_error(),E_USER_ERROR);
//mysql_query($language)or trigger_error(mysql_error(),E_USER_ERROR);

// Create connection
/* $conn = new mysqli($hostname, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully"; */


?>