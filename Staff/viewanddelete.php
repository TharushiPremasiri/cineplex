<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX-STAFF</title>
    <style>
        /* CSS styles for the table and buttons */
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #555;
        }
        th {
            background-color: #900;
        }
        tr:nth-child(even) {
            background-color: #444;
        }
        .delete-btn {
            background-color: #c00;
            color: #fff;
            border: none;
            padding: 6px 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background-color: #f00;
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Movies List</h2>
    <!-- PHP code to display movies -->
    <?php
    // Establish a connection to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cineplex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Handle movie deletion
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['delete'])){
            $movie_name = $_POST['movie_name'];
            // SQL query to delete the movie with the specified name
            $delete_sql = "DELETE FROM movies WHERE name='$movie_name'";
            if ($conn->query($delete_sql) === TRUE) {
                echo "<script>alert('Movie deleted successfully');</script>";
                echo "<script>window.location.href='viewanddelete.php';</script>"; // Refresh the page
            } else {
                echo "Error deleting movie: " . $conn->error;
            }
        }
    }

    // SQL query to retrieve movie names and times
    $sql = "SELECT name, time1, time2 FROM movies";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row in a table
        echo "<table>";
        echo "<tr><th>Name</th><th>Time 1</th><th>Time 2</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['name']}</td>";
            echo "<td>{$row['time1']}</td>";
            echo "<td>{$row['time2']}</td>";
            echo "<td>
                    <form method='post'>
                        <input type='hidden' name='movie_name' value='{$row['name']}'> <!-- Added hidden input for movie name -->
                        <input type='submit' class='delete-btn' name='delete' value='Delete'>
                    </form>
                  </td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
