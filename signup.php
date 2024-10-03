<?php
// Start a session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include the database connection file
    $servername = "localhost";
    $username = "root"; // Replace with your MySQL username
    $password = ""; // Replace with your MySQL password
    $dbname = "cineplex";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Escape user inputs for security
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);

    // Check if the password is at least 7 characters long
    if (strlen($password) < 7) {
        // Password too short, redirect back to signup page with error message
        header("Location: signup.php?error=password_too_short");
        exit();
    }

    // Query to insert username and password into the database
    $sql = "INSERT INTO logininfo (username, password) VALUES ('$username', '$password')";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // New record created successfully, set session variable and redirect to homepage
        $_SESSION['username'] = $username;
        header("Location: homepage.php");
        exit();
    } else {
        // Database query error, redirect back to signup page with error message
        header("Location: signup.php?error=database_error");
        exit();
    }

    // Close the database connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CINEPLEX</title>
    <link rel="stylesheet" href="login.css">
    <link rel="icon" type="image/png" href="images/logo.png">
</head>
<body class="align">

<div class="logo">
    <img src="images/logo.png" class="logo-img">
</div>

<div class="grid">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form login">
        <div class="form__field">
            <label for="login__username">
                <svg class="icon">
                    <use xlink:href="#icon-user"></use>
                </svg>
                <span class="hidden">Username</span>
            </label>
            <input autocomplete="username" id="login__username" type="text" name="username" class="form__input" placeholder="Username" required>
        </div>

        <div class="form__field">
            <label for="login__password">
                <svg class="icon">
                    <use xlink:href="#icon-lock"></use>
                </svg>
                <span class="hidden">Password</span>
            </label>
            <input id="login__password" type="password" name="password" class="form__input" placeholder="Password" required>
        </div>

        <div class="form__field">
            <input type="submit" value="Sign Up">
        </div>
    </form>

    <?php
    // Display error message if present
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        if ($error === "password_too_short") {
            echo "<p class='error'>Password must be at least 7 characters long.</p>";
        } elseif ($error === "database_error") {
            echo "<p class='error'>Database error. Please try again later.</p>";
        }
    }
    ?>

    <p class="text--center">Already a member? <a href="signin.php">Sign in now</a> <svg class="icon">
            <use xlink:href="#icon-arrow-right"></use>
        </svg></p>
</div>

<svg xmlns="http://www.w3.org/2000/svg" class="icons">
    <symbol id="icon-arrow-right" viewBox="0 0 1792 1792">
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
    </symbol>
    <symbol id="icon-lock" viewBox="0 0 1792 1792">
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
    </symbol>
    <symbol id="icon-user" viewBox="0 0 1792 1792">
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
    </symbol>
</svg>

</body>
</html>
