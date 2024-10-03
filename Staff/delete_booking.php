<?php
// Check if the booking ID is provided
if (isset($_GET['id'])) {
    // Get the booking ID
    $bookingId = $_GET['id'];

    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cineplex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and execute the SQL statement to delete the booking
    $sql = "DELETE FROM bookings WHERE booking_id = $bookingId";

    if ($conn->query($sql) === TRUE) {
        echo "Booking deleted successfully";
    } else {
        echo "Error deleting booking: " . $conn->error;
    }

    $conn->close();
} else {
    // If booking ID is not provided, display an error message
    echo "Error: Booking ID not provided";
}
?>
