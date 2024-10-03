<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX-ADMIN</title>
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        /* CSS styles for the table and buttons */
        body {
            font-family: Arial, sans-serif;
            background-color: #1d1d1d; /* Dark background */
            color: #fff;
            margin: 0;
            padding: 0;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.1); /* Add shadow for depth */
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #333; /* Darker border */
        }
        th {
            background: linear-gradient(to right, #ffd700, #ffaf30); /* Golden gradient */
            color: #333; /* Dark color for contrast */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.3); /* Add shadow for text */
        }
        tr:nth-child(even) {
            background-color: #222; /* Darker background for even rows */
        }
        .delete-btn {
            background: linear-gradient(to right, #ffd700, #ffaf30); /* Golden gradient */
            color: #333; /* Dark color for contrast */
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s; /* Smooth transition */
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
        }
        .delete-btn:hover {
            background: linear-gradient(to right, #ffcc00, #ff9933); /* Lighten gradient on hover */
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
