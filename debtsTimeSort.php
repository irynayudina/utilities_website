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
$date_of_currentDebt = $enddate_of_currentDebt = "";
$date_of_currentDebt_err = $enddate_of_currentDebt_err = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){ 
   
    if(empty(trim($_POST["start_date"]))){
        $date_of_currentDebt_err = "Please enter phone.";
    } else{
        $date_of_currentDebt = $_POST['start_date'];
    }if(empty(trim($_POST["end_date"]))){
        $enddate_of_currentDebt_err = "Please enter phone.";
    } else{
        $enddate_of_currentDebt = $_POST['end_date'];
    }
     $sql = "SELECT Debt.id, Owner.phone, appartment_id, date_of_currentDebt, gas, water, power FROM Debt 
     INNER JOIN Appartment On Debt.appartment_id = Appartment.id 
     INNER JOIN Owner On Owner.phone = Appartment.id_owner
     WHERE 1 ";
    
    if(empty($date_of_currentDebt_err) && empty($enddate_of_currentDebt_err)){
        $sql .= "AND Debt.date_of_currentDebt between '$date_of_currentDebt' 
        and DATE_ADD('$enddate_of_currentDebt',INTERVAL 1 DAY) ";
    }
}
$result = $conn->query($sql);?> 