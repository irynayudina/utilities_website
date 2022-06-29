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
    $mon = date('m', strtotime($password));
    $year = date('Y', strtotime($password));
     $sql = "UPDATE PaidDebts 
     SET appartment_id = appartment_id";
    if(empty($forename_err)){
        $sql .= ", gas_paid = '$forename' ";
        $sql .= ", gas_remained = gas_remained - '$forename' ";
    }
    if(empty($name_err)){
        $sql .= ", water_paid = '$name' ";
        $sql .= ", water_remained = water_remained - '$name' ";
    }
    if(empty($middlename_err)){
        $sql .= ", power_paid = '$middlename' ";
        $sql .= ", power_remained = power_remained - '$middlename' ";
    }
    $sql .= " WHERE appartment_id = '$phone' AND MONTH(date_of_currentDebt)='$mon' AND YEAR(date_of_currentDebt) = '$year'; ";
    
$gasCoef = $waterCoef = $powerCoef = "";

$sqlCoef = " SELECT value FROM Coeficients ORDER BY id LIMIT 0,1 ";
    $resultCoef = mysqli_query($conn, $sqlCoef);
while ($row = $resultCoef->fetch_assoc()) {
    $gasCoef = $row['value']."<br>";
}
$sqlCoef = " SELECT value FROM Coeficients ORDER BY id LIMIT 1,1 ";
    $resultCoef = mysqli_query($conn, $sqlCoef);
while ($row = $resultCoef->fetch_assoc()) {
    $waterCoef = $row['value']."<br>";
    
}
$sqlCoef = " SELECT value FROM Coeficients ORDER BY id LIMIT 2,1 ";
    $resultCoef = mysqli_query($conn, $sqlCoef);
while ($row = $resultCoef->fetch_assoc()) {
    $powerCoef = $row['value']."<br>";
    
}

$powerCoef = floatval($powerCoef);
$waterCoef = floatval($waterCoef);
$gasCoef = floatval($gasCoef);
   
    $delTab = "DELETE FROM `Fines` ";
    mysqli_query($conn, $delTab);
    $sqlins = "INSERT INTO Fines SELECT appartment_id, SUM(gas_remained) * $gasCoef AS gas_fine, SUM(water_remained) * $waterCoef AS water_fine, 
    SUM(power_remained) * $powerCoef AS power_sum FROM PaidDebts GROUP BY appartment_id";    
     if (mysqli_query($conn, $sqlins)) {
           
        } else {
           
        }
}
$phone = $forename = $name = $middlename = $password = "";
$phone_err = $forename_err = $name_err = $middlename_err = $password_err = "";
$result = $conn->query($sql);

?>