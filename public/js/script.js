document.addEventListener('DOMContentLoaded', function () {
    const selectboxHeader = document.getElementById('selectboxHeader');
    const optionsList = document.getElementById('optionsList');
    const selectedImage = document.getElementById('selectedImage');
    const selectedText = document.getElementById('selectedText');
    const hiddenInput = document.getElementById('movie_id');

    // Toggle the options dropdown
    selectboxHeader.addEventListener('click', function () {
        optionsList.style.display = optionsList.style.display === 'none' || optionsList.style
            .display === '' ? 'block' : 'none';
    });

    // Add event listener to each option
    const options = document.querySelectorAll('.selectbox-option');
    options.forEach(option => {
        option.addEventListener('click', function () {
            const image = option.getAttribute('data-image');
            const text = option.getAttribute('data-text');
            const movieId = option.getAttribute('data-value');

            // Update the header with the selected option's image and text
            selectedImage.src = image;
            selectedText.textContent = text;

            // Close the dropdown
            optionsList.style.display = 'none';

                // Update the hidden input
                hiddenInput.value = movieId;
        });
    });

    // Close dropdown if clicking outside
    document.addEventListener('click', function (event) {
        if (!selectboxHeader.contains(event.target)) {
            optionsList.style.display = 'none';
        }
    });
});
