<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX-ADMIN</title>
    <link rel="icon" type="image/png" href="logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Global styles */
        body {
            background: #000;
            color: #fff;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        /* Form container styles */
        .form-container {
        width: 100%;
        height: 100%;
        padding: 40px;
        border-radius: 10px;
        background-color: #222;
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4);
        border: 2px solid #f0d348; /* Gold color border */
        box-sizing: border-box;
        overflow: hidden;
        display: flex;
        justify-content: center;
        align-items: center;
    }

        /* Form styles */
        form {
            width: 100%;
            text-align: center;
        }

        h2 {
            color: #f0d348; /* Gold color */
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            color: #f0d348; /* Gold color */
            text-align: left;
        }

        input[type="text"], textarea {
            width: calc(100% - 24px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #f0d348; /* Gold color border */
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #333;
            color: #fff;
            font-family: 'Roboto', sans-serif;
        }

        input[type="submit"] {
            background-color: #f0d348; /* Gold color */
            color: #000;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: 'Roboto', sans-serif;
        }

        input[type="submit"]:hover {
            background-color: #b38f00; /* Darker gold color on hover */
        }

        .success-message {
            color: #f0d348; /* Gold color */
            margin-top: 20px;
            display: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <form id="movieForm" method="post">
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
                    echo "<script>document.getElementById('movieForm').reset();</script>";
                    echo "<div class='success-message'>Film added successfully!</div>";
                    echo "<script>document.querySelector('.success-message').style.display = 'block';</script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Close the database connection
                $conn->close();
            }
            ?>
            <!-- HTML form for inserting movie data -->
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
            <div class="success-message">Film added successfully!</div>
        </form>
    </div>

    <script>
        // Function to show success message
        setTimeout(function() {
            var successMessage = document.querySelector('.success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 5000); // Hide after 5 seconds
    </script>
</body>
</html>
