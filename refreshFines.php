<?php
   ini_set('display_errors', 1);
error_reporting(~0);
include_once 'db.php';
if(isset($_POST['submit']))
{    
    
}
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
    $sql = "INSERT INTO Fines SELECT appartment_id, SUM(gas_remained) * $gasCoef AS gas_fine, SUM(water_remained) * $waterCoef AS water_fine, 
    SUM(power_remained) * $powerCoef AS power_sum FROM PaidDebts GROUP BY appartment_id";    
     if (mysqli_query($conn, $sql)) {
           echo "New record has been added successfully !";
        } else {
           echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
    mysqli_close($conn);
header("refresh:2; url=AccountantPageSumDebts.php");
?>