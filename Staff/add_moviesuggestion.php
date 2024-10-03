<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $link = $_POST['link'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cineplex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into moviesuggestions table
    $sql = "INSERT INTO moviesuggetions (name, description, image, link) VALUES ('$name', '$description', '$image', '$link')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the previous page with a success message
        header("Location: {$_SERVER['HTTP_REFERER']}?success=add");
        exit();
    } else {
        // Redirect to the previous page with an error message
        header("Location: {$_SERVER['HTTP_REFERER']}?error=add");
        exit();
    }

    $conn->close();
}
?>
