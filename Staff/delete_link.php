<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cineplex";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve href parameter from the form
$href = $_POST['href'];

// Prepare SQL statement to delete record based on href value
$sql = "DELETE FROM sliderimages WHERE href = '$href'";

// Execute SQL statement
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}

// Close database connection
$conn->close();
?>
