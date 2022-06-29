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
     $sql = "UPDATE Coeficients
     SET coeficient = coeficient";
    if(empty($forename_err)){
        $sql .= ", value = '$forename' ";
    }
    $sql .= " WHERE coeficient = '$phone'; ";
    $gasCoef = $waterCoef = $powerCoef = "";

$sqlCoef = " SELECT value FROM Coeficients ORDER BY id LIMIT 0,1 ";
    $resultCoef = mysqli_query($conn, $sqlCoef);
while ($row = $resultCoef->fetch_assoc()) {
    $gasCoef = $row['value']."<br>";
}
echo "gas coeficient - " . $gasCoef;
$sqlCoef = " SELECT value FROM Coeficients ORDER BY id LIMIT 1,1 ";
    $resultCoef = mysqli_query($conn, $sqlCoef);
while ($row = $resultCoef->fetch_assoc()) {
    $waterCoef = $row['value']."<br>";
    
}echo "water coeficient - " . $waterCoef;
$sqlCoef = " SELECT value FROM Coeficients ORDER BY id LIMIT 2,1 ";
    $resultCoef = mysqli_query($conn, $sqlCoef);
while ($row = $resultCoef->fetch_assoc()) {
    $powerCoef = $row['value']."<br>";
    
}echo "power coeficient - " . $powerCoef;

$powerCoef = floatval($powerCoef);
$waterCoef = floatval($waterCoef);
$gasCoef = floatval($gasCoef);
   
    $delTab = "DELETE FROM `Fines` ";
    mysqli_query($conn, $delTab);
    $sqlins = "INSERT INTO Fines SELECT appartment_id, SUM(gas_remained) * $gasCoef AS gas_fine, SUM(water_remained) * $waterCoef AS water_fine, 
    SUM(power_remained) * $powerCoef AS power_sum FROM PaidDebts GROUP BY appartment_id";    
     if (mysqli_query($conn, $sqlins)) {
           echo "New record has been added successfully !";
        } else {
           echo "Error: " . $sqlins . ":-" . mysqli_error($conn);
        }
}
$result = $conn->query($sql);?>