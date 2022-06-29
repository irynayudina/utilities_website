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

$sql = "SELECT Appartment.id, CONCAT(City.name,', ', Street.name,', b.', Appartment.building,', ',Appartment.appartment_num) AS address, Appartment.id_owner, CONCAT(Owner.forename,' ',Owner.name,' ',Owner.middlename) AS owner_info FROM Appartment 
INNER JOIN Owner ON Appartment.id_owner = Owner.phone 
INNER JOIN City ON City.id = Appartment.city_id
INNER JOIN Street ON Street.id = Appartment.street_id";
$result = $conn->query($sql); ?>