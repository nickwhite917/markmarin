<?php
echo "DB TEST";
$servername = "localhost";
$username = "root";
$password = "markmarin";
$dbname = "myDb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM maint";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "Value: " . $row["value"]. " - Updated Time: " . $row["updated"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();