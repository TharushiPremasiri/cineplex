<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cineplex";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data sent from client-side JavaScript
$data = json_decode(file_get_contents("php://input"), true);

// Extract data
$selectedMovie = mysqli_real_escape_string($connection, $data['movie']);
$selectedTime = mysqli_real_escape_string($connection, $data['time']);
$selectedSeats = implode(',', $data['seats']); // Convert array of seats to comma-separated string

// Prepare SQL query to insert booking details
$sql = "INSERT INTO bookings (movie_name, selected_time, selected_seats) VALUES ('$selectedMovie', '$selectedTime', '$selectedSeats')";

// Execute SQL query
if (mysqli_query($connection, $sql)) {
    echo "Booking successful!";
} else {
    echo "Error occurred while booking. Please try again later.";
}

// Close database connection
mysqli_close($connection);
?>
