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

$sql = "SELECT Debt.id, Owner.phone, appartment_id, date_of_currentDebt, gas, water, power FROM Debt 
INNER JOIN Appartment On Debt.appartment_id = Appartment.id 
INNER JOIN Owner On Owner.phone = Appartment.id_owner";
$result = $conn->query($sql); ?>