

<?php
$servername = "localhost";
$username = "root";   // Replace with your MariaDB username
$password = "newpassword";       // Replace with your MariaDB password
$dbname = "CAT1";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

