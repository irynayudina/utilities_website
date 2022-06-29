<?php
    $servername='sql108.byethost32.com';
    $username='b32_31818718';
    $password='fxmj2hyq';
    $dbname = "b32_31818718_firstlabdb";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>