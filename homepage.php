<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX</title>
    <link rel="stylesheet" href="homepageStyle.css" >
    <link rel="icon" type="image/png" href="images/logo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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
    <input type="text" id="searchInput" placeholder="search 🔍">
      <a href="ticketbooking.php"style="--i:1;">Book Tickets</a>
      <a href="faci.html"style="--i:1;">Facilities</a>
      <a href="signin.php"style="--i:3;">Sign In</a>
    </nav>
  
  </header >

  <div class="slidertopic">
     <h1></h1>
  </div>


  <div class="video-container">
        <video autoplay loop muted>
            <source src="images/gold.mp4" type="video/mp4">
        </video>
  </div>
  
  <?php
// Connect to the database
$servername = "localhost";
$username = "root"; // Replace with your MySQL username
$password = ""; // Replace with your MySQL password
$dbname = "cineplex";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query to fetch slider images from the database
$sql = "SELECT href, img_src FROM sliderimages";
$result = $conn->query($sql);

?>

<div class="slider">
  
    <?php
    // Loop through the result set and generate HTML for each slider item
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="item">
                <a href="<?php echo $row['href']; ?>">
                    <img src="<?php echo $row['img_src']; ?>">
                </a>
            </div>
            <?php
        }
    }
    ?>
    <button id="next">></button>
    <button id="prev"><</button>
</div>

<?php
// Close the database connection
$conn->close();
?>

<!-- Search -->
<div class="section2">
<div class="containermovie">
  <h1>Now Showing</h1>

   
  <div class="movie-grid" id="movieGrid">
    <?php
    // Connect to your database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cineplex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Fetch movie data from the database
    $sql = "SELECT * FROM movies";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="movie-card">';
            echo '<a href="ticketbooking.php?name=' . urlencode($row['name']) . '" class="movie-link" data-name="' . $row['name'] . '">';
            echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
            echo '<h2>' . $row['name'] . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
            echo '</a>';
            echo '<a href="' . $row['link'] . '" class="btn" target="_blank">Watch Trailer</a>';
            echo '</div>';
        }
    }

    $conn->close();
    ?>
 </div>



</div>

</div>


<div class="section1"> 
 <div class="containermovie">
  <h1>Upcomming</h1>
  <div class="movie-grid">
      <?php
      // Connect to your database
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "cineplex";

      $conn = new mysqli($servername, $username, $password, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      // Fetch movie data from the database
      $sql = "SELECT * FROM moviesuggetions";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo '<div class="movie-card">';
              echo '<img src="' . $row['image'] . '" alt="' . $row['name'] . '">';
              echo '<h2>' . $row['name'] . '</h2>';
              echo '<p>' . $row['description'] . '</p>';
              echo '<a href="' . $row['link'] . '" class="btn">Watch Trailer</a>';
              echo '</div>';
          }
      }

      $conn->close();
      ?>
  </div>
 </div>

</div>

<!-- WhatsApp Floating Button -->
<div class="whatsapp-float">
        <a href="https://wa.me/+94729878918" target="_blank">
            <img id="whatsapp-float" src="images/chatlogo.png" alt="WhatsApp">
        </a>
    </div>




  <!-- Site footer -->
  <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-sm-12 col-md-6">
              <h6>About</h6> <br>
              <p class="text-justify">Discover cinematic excellence at Cineplex, Kandy's premier movie theater destination. With state-of-the-art facilities and cutting-edge technologies, we redefine entertainment, offering luxurious seating, crystal-clear audio, and stunning visuals. Whether you're a film enthusiast, a family, or friends seeking an unforgettable outing, Cineplex promises to captivate your senses and create lasting memories. Step into the world of cinema at Cineplex, where every moment is a masterpiece waiting to unfold.</p>
            </div>
      
            <br>
            <br>
            <div class="col-xs-6 col-md-3 footer-links-wrapper">
              
              <ul class="footer-links">            
                <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSdeQ5umVBeC4HibuX02T9cSjIBpRbcD4mpOE6VM4uDgDSalEA/viewform?usp=sf_link">Feedback &nbsp  &nbsp   &nbsp </a></li> 
                <li><a href="Events.html">Events &nbsp &nbsp  &nbsp</a></li> 
                <li><a href="tos.html">ToS &nbsp &nbsp  &nbsp</a></li> 
              </ul>
              <br>


            </div>
          </div>
          <hr>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text" style="text-align: center; margin-top: 20px;">Copyright &copy; 2024 All Rights Reserved by Tharushi Premasiri ,  Developed by <a href="#">ImDil</a>.</p>

            </div>
      
            
          </div>
        </div>
    </footer>


  <script src="homepajeJS.js"></script>

  <!-- Search -->
  <script>
    document.getElementById("searchInput").addEventListener("input", function() {
        var input = this.value.toLowerCase();
        var cards = document.querySelectorAll(".movie-card");

        cards.forEach(function(card) {
            var name = card.querySelector(".movie-link").getAttribute("data-name").toLowerCase();
            if (name.indexOf(input) > -1) {
                card.style.display = "";
            } else {
                card.style.display = "none";
            }
        });
    });
</script>

</body>
</html>