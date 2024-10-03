<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    // Retrieve name of the movie suggestion to delete
    $name = $_POST['name'];

    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cineplex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Delete data from moviesuggestions table based on name
    $sql = "DELETE FROM moviesuggetions WHERE name = '$name'";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the previous page with a success message
        header("Location: {$_SERVER['HTTP_REFERER']}?success=delete");
        exit();
    } else {
        // Redirect to the previous page with an error message
        header("Location: {$_SERVER['HTTP_REFERER']}?error=delete");
        exit();
    }

    $conn->close();
}
?>
