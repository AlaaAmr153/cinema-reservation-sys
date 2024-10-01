function toggleOptions() {
    const optionsList = document.getElementById('optionsList');
    optionsList.classList.toggle('hidden');
}

function selectMovie(movieId) {
    document.getElementById('selectedMovieId').value = movieId;
    toggleOptions();
}
