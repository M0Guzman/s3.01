const images = document.querySelector('.carousel-images');
const leftArrow = document.querySelector('.arrow-left');
const rightArrow = document.querySelector('.arrow-right');

let currentIndex = 0;
const totalImages = images.children.length;

leftArrow.addEventListener('click', () => {
    currentIndex = (currentIndex > 0) ? currentIndex - 1 : totalImages - 1;
    updateCarousel();
});

rightArrow.addEventListener('click', () => {
    currentIndex = (currentIndex < totalImages - 1) ? currentIndex + 1 : 0;
    updateCarousel();
});

function updateCarousel() {
    const width = images.children[0].offsetWidth;
    images.style.transform = `translateX(-${currentIndex * width}px)`;
}