<?php $servername='sql108.byethost32.com';
$username='b32_31818718';
$password='fxmj2hyq';
$dbname = "b32_31818718_firstlabdb";
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$phone = $forename = $name = $middlename = $password = "";
$phone_err = $forename_err = $name_err = $middlename_err = $password_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){   
    if(empty(trim($_POST["oi"]))){
        $phone_err = "Please enter phone.";
    } else{
        $phone = $_POST['oi'];
    }
    if(empty(trim($_POST["of"]))){
        $forename_err = "Please enter phone.";
    } else{
        $forename = $_POST['of']; 
    }
    if(empty(trim($_POST["on"]))){
        $name_err = "Please enter phone.";
    } else{
        $name = $_POST['on'];
    }
    if(empty(trim($_POST["om"]))){
        $middlename_err = "Please enter phone.";
    } else{
        $middlename = $_POST['om'];
    }
    if(empty(trim($_POST["op"]))){
        $password_err = "Please enter phone.";
    } else{
        $password = $_POST['op'];
    }
     $sql = "SELECT phone, forename, name, middlename, password FROM Owner WHERE 1 ";
    if(empty($phone_err)){
        $sql .= "AND Owner.phone LIKE '%{$phone}%' ";
    }
    if(empty($forename_err)){
        $sql .= "AND Owner.forename LIKE '%{$forename}%' ";
    }
    if(empty($name_err)){
        $sql .= "AND Owner.name LIKE '%{$name}%' ";
    }
    if(empty($middlename_err)){
        $sql .= "AND Owner.middlename LIKE '%{$middlename}%' ";
    }
    if(empty($password_err)){
        $sql .= "AND Owner.password LIKE '%{$password}%' ";
    }
}
$result = $conn->query($sql);?>