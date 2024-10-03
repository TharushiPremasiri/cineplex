// Function to display movie poster, time options, and seat map based on selected movie
function displayMovieDetails() {
    var selectedMovie = document.getElementById("movie").value;
    var movieOptions = document.getElementById("movie").options;
    var selectedMovieIndex = document.getElementById("movie").selectedIndex;
    var selectedMoviePoster = movieOptions[selectedMovieIndex].getAttribute("data-image");
    var selectedMovieTime1 = movieOptions[selectedMovieIndex].getAttribute("data-time1");
    var selectedMovieTime2 = movieOptions[selectedMovieIndex].getAttribute("data-time2");
    var moviePoster = document.getElementById("movie-poster");
    var timeDropdown = document.getElementById("time");
    var seatMap = document.getElementById("seat-map");

    // Display movie poster
    if (selectedMovie && selectedMoviePoster) {
        moviePoster.src = selectedMoviePoster;
    } else {
        moviePoster.src = "";
    }

    // Populate time options based on selected movie
    timeDropdown.innerHTML = "<option value=''>Select Time</option>";
    if (selectedMovieTime1) {
        timeDropdown.innerHTML += "<option value='" + selectedMovieTime1 + "'>" + selectedMovieTime1 + "</option>";
    }
    if (selectedMovieTime2) {
        timeDropdown.innerHTML += "<option value='" + selectedMovieTime2 + "'>" + selectedMovieTime2 + "</option>";
    }

    // Generate seat map for selected movie
    seatMap.innerHTML = "";
    for (var i = 1; i <= 9; i++) {
        var row = document.createElement("div");
        row.classList.add("seat-row");
        for (var j = 1; j <= 10; j++) {
            var seat = document.createElement("div");
            seat.classList.add("seat");
            seat.dataset.seatNumber = "S" + i + "-" + j;
            seat.textContent = "S" + i + "-" + j;
            seat.addEventListener("click", toggleSeatSelection);
            row.appendChild(seat);
        }
        seatMap.appendChild(row);
    }
}

// Function to toggle seat selection
function toggleSeatSelection(event) {
    event.target.classList.toggle("selected");
}

// Function to book ticket
function bookTicket() {
    var selectedMovie = document.getElementById("movie").value;
    var selectedTime = document.getElementById("time").value;
    var selectedSeats = document.querySelectorAll(".seat.selected");

    if (selectedMovie === "" || selectedTime === "") {
        alert("Please select a movie and time.");
        return;
    }

    if (selectedSeats.length === 0) {
        alert("Please select at least one seat.");
        return;
    }

    var seatNumbers = [];
    selectedSeats.forEach(function(seat) {
        seatNumbers.push(seat.dataset.seatNumber);
    });

    // Perform AJAX request to save booking details in the database
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "book_ticket.php", true);
    xhr.setRequestHeader("Content-Type", "application/json");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                alert(xhr.responseText); // Display response from server
            } else {
                alert("Error occurred while booking. Please try again later.");
            }
        }
    };
    var data = JSON.stringify({
        movie: selectedMovie,
        time: selectedTime,
        seats: seatNumbers
    });
    xhr.send(data);
}
