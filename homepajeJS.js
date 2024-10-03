let items = document.querySelectorAll('.slider .item');
let active = 3; // Initial active index
let intervalId; // Variable to store interval ID

function loadShow() {
    items[active].style.transform = `none`;
    items[active].style.zIndex = 1;
    items[active].style.filter = 'none';
    items[active].style.opacity = 1;

    let stt = 0;
    for (var i = active + 1; i < items.length; i++) {
        stt++;
        items[i].style.transform = `translateX(${120 * stt}px) scale(${1 - 0.2 * stt}) perspective(16px) rotateY(-1deg)`;
        items[i].style.zIndex = -stt;
        items[i].style.filter = 'blur(5px)';
        items[i].style.opacity = stt > 2 ? 0 : 0.6;
    }

    stt = 0;
    for (var i = (active - 1); i >= 0; i--) {
        stt++;
        items[i].style.transform = `translateX(${-120 * stt}px) scale(${1 - 0.2 * stt}) perspective(16px) rotateY(1deg)`;
        items[i].style.zIndex = -stt;
        items[i].style.filter = 'blur(5px)';
        items[i].style.opacity = stt > 2 ? 0 : 0.6;
    }
}

function nextSlide() {
    active = active + 1 < items.length ? active + 1 : 0; // Wrap around if reached end
    loadShow();
}

function prevSlide() {
    active = active - 1 >= 0 ? active - 1 : items.length - 1; // Wrap around if reached beginning
    loadShow();
}

function startAutoSlide() {
    intervalId = setInterval(nextSlide, 3000); // Change image every 3 seconds (adjust as needed)
}

function stopAutoSlide() {
    clearInterval(intervalId); // Clear the interval
}

// Start auto slideshow
startAutoSlide();

// Stop auto slideshow when hovering over slider
document.querySelector('.slider').addEventListener('mouseenter', stopAutoSlide);
document.querySelector('.slider').addEventListener('mouseleave', startAutoSlide);

// Next and previous button event handlers
document.getElementById('next').onclick = nextSlide;
document.getElementById('prev').onclick = prevSlide;


//search
$(document).ready(function(){
    $('#searchInput').on('input', function(){
        var searchText = $(this).val();
        $.ajax({
            type: 'GET',
            url: 'search.php',
            data: { movieName: searchText },
            success: function(response){
                $('#movieGrid').html(response);
            }
        });
    });
});

document.getElementById("searchInput").addEventListener("input", function() {
    var input = this.value.toLowerCase();
    var cards = document.querySelectorAll(".movie-card");

    cards.forEach(function(card) {
        var name = card.getAttribute("data-name").toLowerCase();
        if (name.indexOf(input) > -1) {
            card.style.display = "";
        } else {
            card.style.display = "none";
        }
    });

    // Scroll to section2
    var section2 = document.querySelector(".section2");
    section2.scrollIntoView({ behavior: 'smooth' });
});