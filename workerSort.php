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
    if(empty(trim($_POST["wi"]))){
        $phone_err = "Please enter phone.";
    } else{
        $phone = $_POST['wi'];
    }
    if(empty(trim($_POST["wf"]))){
        $forename_err = "Please enter phone.";
    } else{
        $forename = $_POST['wf']; 
    }
    if(empty(trim($_POST["wn"]))){
        $name_err = "Please enter phone.";
    } else{
        $name = $_POST['wn'];
    }
    if(empty(trim($_POST["wm"]))){
        $middlename_err = "Please enter phone.";
    } else{
        $middlename = $_POST['wm'];
    }
    if(empty(trim($_POST["wp"]))){
        $password_err = "Please enter phone.";
    } else{
        $password = $_POST['wp'];
    }
     $sql = "SELECT phone, forename, name, middlename, password FROM Worker WHERE 1 ";
    if(empty($phone_err)){
        $sql .= "AND Worker.phone LIKE '%{$phone}%' ";
    }
    if(empty($forename_err)){
        $sql .= "AND Worker.forename LIKE '%{$forename}%' ";
    }
    if(empty($name_err)){
        $sql .= "AND Worker.name LIKE '%{$name}%' ";
    }
    if(empty($middlename_err)){
        $sql .= "AND Worker.middlename LIKE '%{$middlename}%' ";
    }
    if(empty($password_err)){
        $sql .= "AND Worker.password LIKE '%{$password}%' ";
    }
}
$result = $conn->query($sql);?>