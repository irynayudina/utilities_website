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
    if(empty(trim($_POST["oiu"]))){
        $phone_err = "Please enter phone.";
    } else{
        $phone = $_POST['oiu'];
    }
    if(empty(trim($_POST["ofu"]))){
        $forename_err = "Please enter phone.";
    } else{
        $forename = $_POST['ofu']; 
    }
    if(empty(trim($_POST["onu"]))){
        $name_err = "Please enter phone.";
    } else{
        $name = $_POST['onu'];
    }
    if(empty(trim($_POST["omu"]))){
        $middlename_err = "Please enter phone.";
    } else{
        $middlename = $_POST['omu'];
    }
    if(empty(trim($_POST["opu"]))){
        $password_err = "Please enter phone.";
    } else{
        $password = $_POST['opu'];
    }
     $sql = "UPDATE Owner
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