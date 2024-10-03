<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cineplex";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Function to insert booking details into the database
function bookTicket($movie, $time, $seats, $connection) {
    // Escape user inputs for security
    $movie = mysqli_real_escape_string($connection, $movie);
    $time = mysqli_real_escape_string($connection, $time);
    $seats = implode(',', $seats); // Convert array of seats to comma-separated string

    // Prepare SQL query to insert booking details
    $sql = "INSERT INTO bookings (movie_name, selected_time, selected_seats) VALUES ('$movie', '$time', '$seats')";

    // Execute SQL query
    if (mysqli_query($connection, $sql)) {
        echo "Booking successful!";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
}

// Fetch movies from the 'movies' table
$query = "SELECT name, image, time1, time2 FROM movies";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX</title>
    <link rel="stylesheet" href="ticketbooking.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body>

<header class="header">

  <a href="homepage.php" class="logo">
        <img src="images/hlogo.png" alt="Cineplex Logo">
    </a>
   
    <input type="checkbox" id="check">
    <label for="check" class="icons">
      <i class='bx bx-menu' id="menu-icon"></i>
      <i class='bx bx-x' id="close-icon"></i>
    </label>

    <nav class="navbar">
      <a href="faci.html"style="--i:1;">Facilities</a>
      <a href="signin.php"style="--i:3;">Sign In</a>
    </nav>
  
  </header >

<div class="container">
    <div class="card">
        <div class="poster">
            <?php
            // Fetch the first movie from the database
            $first_movie = mysqli_fetch_assoc($result);
            // Display the image of the first movie
            echo "<img id='movie-poster' src='" . $first_movie['image'] . "' alt='" . $first_movie['name'] . "'>";
            ?>
        </div>
        <div class="details">
            <label for="movie"><h4>Select Movie:</h4></label>
            <select id="movie" class="select" onchange="displayMovieDetails()">
                
                <?php
                // Populate movie options dynamically
                mysqli_data_seek($result, 0); // Reset result pointer to the beginning
                while ($row = mysqli_fetch_assoc($result)) {
                    // Set 'selected' attribute for the first movie
                    $selected = ($row === $first_movie) ? 'selected' : '';
                    echo "<option value='" . $row['name'] . "' data-image='" . $row['image'] . "' data-time1='" . $row['time1'] . "' data-time2='" . $row['time2'] . "' $selected>" . $row['name'] . "</option>";
                }
                ?>
            </select>
            <br>
            <label for="time"><h4>Select Time:</h4></label>
            <select id="time" class="select">
                
                <!-- Options populated dynamically using JavaScript -->
            </select>
            <br>
            <h4>Select Seat:</h4>
            <div id="seat-map" class="seat-map"></div>
            <br>
            <button onclick="bookTicket()" class="button">Book Now</button>
        </div>
    </div>
</div>

<!-- WhatsApp Floating Button -->
<div class="whatsapp-float">
        <a href="https://wa.me/+94729878918" target="_blank">
            <img id="whatsapp-float" src="images/chatlogo.png" alt="WhatsApp">
        </a>
    </div>



<script src="ticketbooking.js"></script>
</body>
</html>
