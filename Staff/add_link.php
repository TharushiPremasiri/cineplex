<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cineplex";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the form submission
$href = $_POST['href'];
$img_src = $_POST['img_src'];

// Prepare and execute the SQL statement to insert data into the sliderimages table
$sql = "INSERT INTO sliderimages (href, img_src) VALUES ('$href', '$img_src')";

if ($conn->query($sql) === TRUE) {
    echo "New link added successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
