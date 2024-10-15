window.addEventListener('load', () => {
    const slideshow = document.querySelector('.slideshow');
    const container = slideshow.querySelector('figure');
    const { delay, speed } = slideshow.dataset;
    const totalSlides = container.childElementCount;

    // Set up the indicators
    const ul = document.createElement('ul');
    ul.innerHTML = '<li></li>'.repeat(totalSlides);
    slideshow.appendChild(ul);

    let current = 0;
    let timer;

    // Function to update the slide position
    const updateSlidePosition = () => {
        container.style.transform = `translateX(-${current * 100}%)`;
    };

    // Start the slideshow
    function start() {
        timer = setInterval(() => {
            current = (current + 1) % totalSlides;
            updateSlidePosition();
            updateIndicators();
        }, delay);
    }

    // Update indicators based on current slide
    const updateIndicators = () => {
        [...ul.children].forEach((el, i) => el.classList.toggle('active', i === current));
    };

    // Event listeners for indicators
    [...ul.children].forEach((el, i) => el.addEventListener('click', () => {
        clearInterval(timer);
        current = i;
        updateSlidePosition();
        updateIndicators();
        start();
    }));

    // Pause on mouse enter, resume on mouse leave
    slideshow.addEventListener('mouseenter', () => clearInterval(timer));
    slideshow.addEventListener('mouseleave', start);

    start();
});
