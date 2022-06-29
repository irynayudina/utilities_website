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

$sql = "SELECT  PaidDebts.id, Appartment.id, CONCAT(City.name,', ', Street.name,', b.', Appartment.building,', ',Appartment.appartment_num) AS address, 
Appartment.id_owner, CONCAT(Owner.forename,' ',Owner.name,' ',Owner.middlename) AS owner_info, date_of_currentDebt, gas_debt, water_debt, power_debt, 
gas_paid, water_paid, power_paid, gas_remained, water_remained, power_remained FROM PaidDebts
INNER JOIN Appartment On PaidDebts.appartment_id = Appartment.id 
INNER JOIN Owner ON Appartment.id_owner = Owner.phone 
INNER JOIN City ON City.id = Appartment.city_id
INNER JOIN Street ON Street.id = Appartment.street_id";
$result = $conn->query($sql); ?>