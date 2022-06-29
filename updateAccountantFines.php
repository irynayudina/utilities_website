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
    $mon = date('m', strtotime($password));
    $year = date('Y', strtotime($password));
     $sql = "UPDATE Fines 
     SET id=id";
    if(empty($forename_err)){
        $sql .= ", gas_fine = '$forename' ";
    }
    if(empty($name_err)){
        $sql .= ", water_fine = '$name' ";
    }
    if(empty($middlename_err)){
        $sql .= ", power_fine = '$middlename' ";
    }
    $sql .= " WHERE Fines.id = '$phone' ";
}
$result = $conn->query($sql);?>