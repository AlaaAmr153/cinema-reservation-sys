function getScreens(cinemaId) {
    //to fetch related screens
    if (cinemaId) {
        fetch(`/cinemas/${cinemaId}/screens`)
            .then(response => response.json())
            .then(data => {
                const screenSelect = document.getElementById('screen_id');
                screenSelect.innerHTML = '<option value="">Select Screen</option>';
                data.forEach(screen => {
                    screenSelect.innerHTML += `<option value="${screen.id}">${screen.screen_code}</option>`;
                });
            })
            .catch(error => console.error('Error fetching screens:', error));
    }
}
