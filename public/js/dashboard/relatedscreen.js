function getScreens(cinemaId) {
    //to get the related screens
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
    }else {
        //if there is no cinema selected so it will be clear
        document.getElementById('screen_id').innerHTML = '<option value="">Select Screen</option>';
    }
}
