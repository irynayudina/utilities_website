<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'sql108.byethost32.com');
define('DB_USERNAME', 'b32_31818718');
define('DB_PASSWORD', 'fxmj2hyq');
define('DB_NAME', 'b32_31818718_firstlabdb');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>