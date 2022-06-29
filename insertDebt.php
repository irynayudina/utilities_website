<?php
//    ini_set('display_errors', 1);
// error_reporting(~0);
include_once 'db.php';
if(isset($_POST['submit']))
{    
    
     $appartment = $_POST['dai'];
     $dated = $_POST['dd'];
     $gas = $_POST['dgd'];
     $water = $_POST['dwd'];     
     $power = $_POST['dpd'];
     $mon = date('m', strtotime($dated));
     $year = date('Y', strtotime($dated));
     $sqlpref = "SELECT id FROM Debt WHERE 
     MONTH(date_of_currentDebt) = '$mon' AND YEAR(date_of_currentDebt) = '$year' 
     AND appartment_id = '$appartment'";
     mysqli_query("SET TRANSACTION ISOLATION LEVEL SERIALIZABLE");
     $sqlfines = "INSERT INTO Fines (id, gas_fine, water_fine, power_fine) VALUES ($appartment, 0,0,0) ";
     $resfines = $conn->query($sqlfines);
     $res = $conn->query($sqlpref);
     if ($res->num_rows > 0){
        $upd = "UPDATE Debt
        SET date_of_currentDebt = '$dated', gas = '$gas', water = '$water', power = '$power'
        WHERE appartment_id = '$appartment' AND MONTH(date_of_currentDebt)='$mon' AND YEAR(date_of_currentDebt) = '$year';";
        $updquery = $conn->query($upd);
        $updPaidDebts = "UPDATE PaidDebts
        SET date_of_currentDebt = '$dated', gas = '$gas', water = '$water', power = '$power'
        WHERE appartment_id = '$appartment' AND MONTH(date_of_currentDebt)='$mon' AND YEAR(date_of_currentDebt) = '$year';";
        $updPDquery = $conn->query($updPaidDebts);
     } else{
        $sql = "INSERT INTO Debt(appartment_id, date_of_currentDebt, gas, water, power) 
        VALUES ('$appartment','$dated','$gas','$water','$power')";
        if (mysqli_query($conn, $sql)) {
         $sqlPD = "INSERT INTO `PaidDebts`(`appartment_id`, `date_of_currentDebt`, `gas_debt`, `water_debt`, `power_debt`, 
         `gas_paid`, `water_paid`, `power_paid`, `gas_remained`, `water_remained`, `power_remained`) VALUES 
          ('$appartment', '$dated','$gas','$water','$power', 0, 0, 0,'$gas','$water','$power')";
          $PDqueryins = $conn->query($sqlPD);
           echo "New record has been added successfully !";
        } else {
           echo "Error: " . $sql . ":-" . mysqli_error($conn);
        }
     }
     mysqli_close($conn);
}
header("refresh:2; url=MainEditorPageDebts.php");
?>