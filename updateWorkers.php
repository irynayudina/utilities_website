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
    if(empty(trim($_POST["wiu"]))){
        $phone_err = "Please enter phone.";
    } else{
        $phone = $_POST['wiu'];
    }
    if(empty(trim($_POST["wfu"]))){
        $forename_err = "Please enter phone.";
    } else{
        $forename = $_POST['wfu']; 
    }
    if(empty(trim($_POST["wnu"]))){
        $name_err = "Please enter phone.";
    } else{
        $name = $_POST['wnu'];
    }
    if(empty(trim($_POST["wmu"]))){
        $middlename_err = "Please enter phone.";
    } else{
        $middlename = $_POST['wmu'];
    }
    if(empty(trim($_POST["wpu"]))){
        $password_err = "Please enter phone.";
    } else{
        $password = $_POST['wpu'];
    }
     $sql = "UPDATE Worker
     SET phone = phone";
    if(empty($forename_err)){
        $sql .= ", forename = '$forename' ";
    }
    if(empty($name_err)){
        $sql .= ", name = '$name' ";
    }
    if(empty($middlename_err)){
        $sql .= ", middlename = '$middlename' ";
    }
    if(empty($password_err)){
        $sql .= ", password = '$password' ";
    }
    $sql .= " WHERE phone = '$phone'; ";
}
$result = $conn->query($sql);?>