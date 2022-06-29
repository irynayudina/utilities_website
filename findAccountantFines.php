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
$cityDebt = $ownerDebt = "";
$cityDebt_err = $ownerDebt_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
   
    if(empty(trim($_POST["daif"]))){
        $cityDebt_err = "Please enter phone.";
    } else{
        $cityDebt = $_POST['daif'];
    }
     $sql = "SELECT Fines.id, Fines.gas_fine, Fines.water_fine, Fines.power_fine FROM Fines INNER JOIN Appartment On Fines.id = Appartment.id WHERE 1 ";
    
    if(empty($cityDebt_err)){
        $sql .= "AND Fines.id = '$cityDebt' ";
    }
    
}
$result = $conn->query($sql);?> 