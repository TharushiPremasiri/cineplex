<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX-STAFF</title>
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #000;
            color: #fff;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #000;
            border-radius: 0;
        }
        h2 {
            color: #ffd700; /* Gold color */
            text-align: center;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ffd700; /* Gold color border */
            border-radius: 5px;
            box-sizing: border-box;
            background-color: #333;
            color: #fff;
            font-family: Arial, sans-serif;
        }
        input[type="submit"] {
            background-color: #ffd700; /* Gold color */
            color: #000;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-family: Arial, sans-serif;
        }
        input[type="submit"]:hover {
            background-color: #ffcc00; /* Darker gold color on hover */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #666;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #666;
            color: #fff;
        }
        td button {
            background-color: #ffd700; /* Gold color */
            color: #000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        td button:hover {
            background-color: #ffcc00; /* Darker gold color on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add upcoming movie</h2>
        <form action="add_moviesuggestion.php" method="POST">
            <input type="text" id="name" name="name" placeholder="Name" required>
            <input type="text" id="description" name="description" placeholder="Description" required>
            <input type="text" id="image" name="image" placeholder="Image URL" required>
            <input type="text" id="link" name="link" placeholder="Link" required>
            <input type="submit" value="Add Movie Suggestion">
        </form>

        <h2>Movie Suggestions</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
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

                // Retrieve data from the moviesuggestions table
                $sql = "SELECT name FROM moviesuggetions";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td><form action='delete_moviesuggestion.php' method='POST'><input type='hidden' name='name' value='" . $row['name'] . "'><button type='submit'>Delete</button></form></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='2'>No movie suggestions found</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
