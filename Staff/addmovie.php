<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX-STAFF</title>
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        /* CSS styles for the form */
        body {
            background-color: white;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #333;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #444;
            color: #fff;
        }
        input[type="submit"] {
            background-color: #c00;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        h2 {
            text-align: center;
            color: #c00;
        }
        input[type="submit"]:hover {
            background-color: #f00;
        }
    </style>
</head>
<body>
    <h2>Add New Movie</h2>
    <!-- PHP code to handle form submission -->
    <?php
    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Retrieve data from the form submission
        $name = $_POST['name'];
        $description = $_POST['description'];
        $image = $_POST['image'];
        $link = $_POST['link'];
        $time1 = $_POST['time1']; // New field
        $time2 = $_POST['time2']; // New field

        // Prepare and execute the SQL statement to insert data into the movies table
        $sql = "INSERT INTO movies (name, description, image, link, time1, time2) VALUES ('$name', '$description', '$image', '$link', '$time1', '$time2')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Close the database connection
        $conn->close();
    }
    ?>
    <!-- HTML form for inserting movie data -->
    <form method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        <label for="image">Image URL:</label>
        <input type="text" id="image" name="image" required>
        <label for="link">Link:</label>
        <input type="text" id="link" name="link" required>
        <label for="time1">Time 1:</label> <!-- New field -->
        <input type="text" id="time1" name="time1" required> <!-- New field -->
        <label for="time2">Time 2:</label> <!-- New field -->
        <input type="text" id="time2" name="time2" required> <!-- New field -->
        <input type="submit" value="Submit">
    </form>
</body>
</html>
