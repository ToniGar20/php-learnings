<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "formula1";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} //echo "Connected successfully";

$sql = "SELECT fname, lname FROM driver;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo " - Driver: " . $row["fname"]. " " . $row["lname"]. "<br>";
    }
} else {
    echo "0 results";
}


?>