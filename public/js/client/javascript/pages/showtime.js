function fetchShowtimesAndMovieDetails(movieId, cinemaId) {
    const showtimeTable = document.getElementById('showtime_table');
    const movieSection = document.querySelector('.movie');

    showtimeTable.innerHTML = '<p>Loading showtimes...</p>';
    movieSection.innerHTML = '<p>Loading movie details...</p>';

    fetch(`/client/showtimes?cinema_id=${cinemaId}&movie_id=${movieId}`)
        .then(response => response.json())
        .then(data => {
            if (data.movie) {
                movieSection.innerHTML = `
                    <div class="wrapper">
                        <img src="/storage/${data.movie.poster}" alt="${data.movie.title}">
                    </div>
                    <h2>${data.movie.title}</h2>
                    <p>${data.movie.duration} min</p>
                    <p>${data.movie.genre}</p>
                `;
            } else {
                movieSection.innerHTML = '<p>Movie details not available.</p>';
            }
            if (data.showtimes && data.showtimes.length > 0) {
                showtimeTable.innerHTML = '<p>Available showtimes</p>';
                data.showtimes.forEach(showtime => {
                    const dayShowtime = document.createElement('div');
                    dayShowtime.classList.add('day_showtime');

                    const showtimeDate = document.createElement('p');
                    showtimeDate.textContent = showtime.show_date;
                    dayShowtime.appendChild(showtimeDate);

                    const showtimeButton = document.createElement('button');
                    showtimeButton.textContent = showtime.show_time;
                    showtimeButton.onclick = () => selectSlot(showtime.id);
                    dayShowtime.appendChild(showtimeButton);

                    showtimeTable.appendChild(dayShowtime);
                });
            } else {
                showtimeTable.innerHTML = '<p>No showtimes available for this movie at the selected cinema.</p>';
            }
        })
        .catch(error => {
            console.error('Error fetching showtimes and movie details:', error);
            showtimeTable.innerHTML = '<p>Error loading showtimes. Please try again.</p>';
            movieSection.innerHTML = '<p>Error loading movie details. Please try again.</p>';
        });
}


function clickMovieTab(movieId) {
    document.querySelectorAll('.ver_tab button').forEach(button => {
        button.classList.remove('active');
    });

    event.target.classList.add('active');
    const cinemaId = new URLSearchParams(window.location.search).get('cinema_id');
    fetchShowtimesAndMovieDetails(movieId, cinemaId);
    const newUrl = `${window.location.pathname}?cinema_id=${cinemaId}&movie_id=${movieId}`;
    history.pushState(null, '', newUrl);
}

function clickCinemaTab(cinemaId) {
    document.querySelectorAll('.hor_tab button').forEach(button => {
        button.classList.remove('active');
    });
    event.target.classList.add('active');
    const movieId = new URLSearchParams(window.location.search).get('movie_id');
    fetchShowtimesAndMovieDetails(movieId, cinemaId);
    const newUrl = `${window.location.pathname}?cinema_id=${cinemaId}&movie_id=${movieId}`;
    history.pushState(null, '', newUrl);
}

