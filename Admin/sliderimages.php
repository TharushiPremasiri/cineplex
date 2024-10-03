<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX-ADMIN</title>
    <link rel="icon" type="image/png" href="logo.png">
    <style>
        body {
            background-color: #252525; /* Dark gray background */
            color: #fff; /* White text color */
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
       
        form {
            margin-bottom: 20px;
            padding: 20px;
            border-radius: 10px;
            background-color: rgba(255, 255, 255, 0.1); /* Semi-transparent white background */
        }
        input[type="text"] {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.2); /* Semi-transparent white background */
            color: #fff; /* White text color */
        }
        input[type="submit"] {
            background-color: #f1c40f; /* Golden background */
            color: #333; /* Dark text color */
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #e2b515; /* Dark golden hover background */
            color: #fff; /* White text color on hover */
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc; /* Light gray border */
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f1c40f; /* Golden header background */
        }
        td {
            color: #fff; /* White text color for table data */
        }
        td button {
            background-color: #f1c40f; /* Golden button background */
            color: #333; /* Dark text color for buttons */
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        td button:hover {
            background-color: #e2b515; /* Dark golden hover background */
            color: #fff; /* White text color on hover */
        }
        h2 {
            color: #f1c40f; /* Golden color for headings */
            text-align: center;
            margin-top: 30px;
            padding-top: 20px; /* Added padding for headings */
        }
    </style>
</head>
<body>
    <header>
        
    </header>

    <h2>Add Links</h2>
    <form action="add_link.php" method="POST">
        <label for="href" style="color: #f1c40f;">Link:</label> <!-- Golden color for labels -->
        <input type="text" id="href" name="href" required>
        <label for="img_src" style="color: #f1c40f;">Image Source:</label> <!-- Golden color for labels -->
        <input type="text" id="img_src" name="img_src" required>
        <input type="submit" value="Add Link"> <!-- Golden background for button -->
    </form>

    <h2>Slider Images</h2>
    <table>
        <thead>
            <tr>
                <th>Link</th>
                <th>Image Source</th>
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

            // Retrieve data from the sliderimages table
            $sql = "SELECT * FROM sliderimages";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['href'] . "</td>";
                    echo "<td>" . $row['img_src'] . "</td>";
                    echo '<td><form action="delete_link.php" method="POST"><input type="hidden" name="href" value="' . $row['href'] . '"><button type="submit">Delete</button></form></td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No records found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
