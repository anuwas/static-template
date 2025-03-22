<?php
$servername = "localhost";
$username = "umhUser123";
$password = "umhUser123";
$dbname = "UberMobileHealthCare";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
?>