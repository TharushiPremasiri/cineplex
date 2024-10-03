<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "cineplex";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve seat number from the request body
$data = json_decode(file_get_contents("php://input"));
$seatNumber = $data->seatNumber;

// SQL to update the status of the seat to 'booked' in the database
$sql = "UPDATE seats SET status = 'booked' WHERE seat_number = '$seatNumber'";

if ($conn->query($sql) === TRUE) {
    // Seat booked successfully
    http_response_code(200);
} else {
    // Failed to book seat
    http_response_code(500);
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
