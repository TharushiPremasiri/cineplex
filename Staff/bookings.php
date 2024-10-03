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
            background-color: #333;
            color: white;
            margin: 0;
            padding: 0;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5); /* Add shadow for depth */
            border-radius: 10px; /* Add border radius for rounded corners */
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #555; /* Darker border */
        }
        th {
            background: linear-gradient(to right, #ffd700, #ffaf30); /* Golden gradient for table header */
            color: #333; /* Dark color for contrast */
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5); /* Add shadow for text */
        }
        td button {
            background: linear-gradient(to right, #ffd700, #ffaf30); /* Golden gradient for button */
            color: #333; /* Dark color for contrast */
            border: none;
            padding: 8px 16px;
            cursor: pointer;
            border-radius: 4px; /* Add border radius for rounded button */
            transition: background-color 0.3s; /* Smooth transition */
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.2); /* Add shadow for depth */
        }
        td button:hover {
            background: linear-gradient(to right, #ffcc00, #ff9933); /* Lighten gradient on hover */
        }
        td button:active {
            transform: translateY(1px); /* Add slight push down effect on click */
        }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Manage Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Movie Name</th>
                <th>Selected Time</th>
                <th>Selected Seats</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Connect to the database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cineplex";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Fetch bookings data from the database
            $sql = "SELECT * FROM bookings";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['booking_id'] . "</td>";
                    echo "<td>" . $row['movie_name'] . "</td>";
                    echo "<td>" . $row['selected_time'] . "</td>";
                    echo "<td>" . $row['selected_seats'] . "</td>";
                    echo "<td><button onclick='deleteBooking(" . $row['booking_id'] . ")'>Delete</button></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No bookings found</td></tr>";
            }

            $conn->close();
            ?>
        </tbody>
    </table>

    <script>
        function deleteBooking(bookingId) {
            if (confirm("Are you sure you want to delete this booking?")) {
                // Send an AJAX request to delete the booking
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Reload the page after deleting the booking
                        window.location.reload();
                    }
                };
                xhttp.open("GET", "delete_booking.php?id=" + bookingId, true);
                xhttp.send();
            }
        }
    </script>
</body>
</html>
