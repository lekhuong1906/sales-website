document.addEventListener('DOMContentLoaded', function () {
    const carousel = document.querySelector('[data-carousel="slide"]');
    const items = carousel.querySelectorAll('[data-carousel-item]');
    const indicators = carousel.querySelectorAll('[data-carousel-slide-to]');
    const prevButton = carousel.querySelector('[data-carousel-prev]');
    const nextButton = carousel.querySelector('[data-carousel-next]');
    let currentIndex = 0;
    const intervalTime = 5000; // Auto-slide interval in milliseconds
    let autoSlideInterval;

    // Helper function to update active slide
    const updateCarousel = (index) => {
        items.forEach((item, idx) => {
            item.classList.toggle('hidden', idx !== index);
            item.classList.toggle('block', idx === index);
        });

        indicators.forEach((indicator, idx) => {
            indicator.setAttribute('aria-current', idx === index ? 'true' : 'false');
            indicator.classList.toggle('bg-gray-800', idx === index);
            indicator.classList.toggle('bg-gray-400', idx !== index);
        });
    };

    // Go to next slide
    const nextSlide = () => {
        currentIndex = (currentIndex + 1) % items.length;
        updateCarousel(currentIndex);
    };

    // Go to previous slide
    const prevSlide = () => {
        currentIndex = (currentIndex - 1 + items.length) % items.length;
        updateCarousel(currentIndex);
    };

    // Go to a specific slide
    const goToSlide = (index) => {
        currentIndex = index;
        updateCarousel(currentIndex);
    };

    // Start auto-slide
    const startAutoSlide = () => {
        autoSlideInterval = setInterval(nextSlide, intervalTime);
    };

    // Stop auto-slide
    const stopAutoSlide = () => {
        clearInterval(autoSlideInterval);
    };

    // Add event listeners to buttons
    nextButton.addEventListener('click', () => {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
    });

    prevButton.addEventListener('click', () => {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
    });

    // Add event listeners to indicators
    indicators.forEach((indicator, index) => {
        indicator.addEventListener('click', () => {
            stopAutoSlide();
            goToSlide(index);
            startAutoSlide();
        });
    });

    // Pause auto-slide on mouse over
    carousel.addEventListener('mouseenter', stopAutoSlide);

    // Resume auto-slide on mouse leave
    carousel.addEventListener('mouseleave', startAutoSlide);

    // Initialize carousel with the first slide and start auto-slide
    updateCarousel(currentIndex);
    startAutoSlide();
});

document.addEventListener('DOMContentLoaded', function () {
    const carouselItems = document.getElementById('product-carousel-items');
    const prevButton = document.getElementById('prev');
    const nextButton = document.getElementById('next');
    const visibleItems = 4; // Number of visible items
    let currentIndex = 0;
    const totalItems = carouselItems.children.length;
    const maxIndex = Math.ceil(totalItems / visibleItems) - 1;
    const slideInterval = 5000; // Auto-slide interval in milliseconds
    let autoSlide;

    // Update carousel position
    const updateCarousel = () => {
        const translateX = -(currentIndex * 100); // Move by 100% per row
        carouselItems.style.transform = `translateX(${translateX}%)`;
    };

    // Go to next slide
    const nextSlide = () => {
        currentIndex = (currentIndex + 1 > maxIndex) ? 0 : currentIndex + 1;
        updateCarousel();
    };

    // Go to previous slide
    const prevSlide = () => {
        currentIndex = (currentIndex - 1 < 0) ? maxIndex : currentIndex - 1;
        updateCarousel();
    };

    // Start auto-slide
    const startAutoSlide = () => {
        autoSlide = setInterval(nextSlide, slideInterval);
    };

    // Stop auto-slide
    const stopAutoSlide = () => {
        clearInterval(autoSlide);
    };

    // Add event listeners
    nextButton.addEventListener('click', () => {
        stopAutoSlide();
        nextSlide();
        startAutoSlide();
    });

    prevButton.addEventListener('click', () => {
        stopAutoSlide();
        prevSlide();
        startAutoSlide();
    });

    // Pause auto-slide on hover
    carouselItems.addEventListener('mouseenter', stopAutoSlide);
    carouselItems.addEventListener('mouseleave', startAutoSlide);

    // Initialize carousel
    updateCarousel();
    startAutoSlide();
});
