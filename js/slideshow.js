let slideIndex = 0;
const slides = document.querySelectorAll(".mySlides");
const slidesWrapper = document.querySelector(".slides-wrapper");

// Clone first 3 slides and append for infinite loop
for (let i = 0; i < 3; i++) {
  slidesWrapper.appendChild(slides[i].cloneNode(true));
}

const totalSlides = document.querySelectorAll(".mySlides").length;

// Continuous sliding
setInterval(() => {
  slideIndex++;
  slidesWrapper.style.transform = `translateX(-${slideIndex * (100 / 3)}%)`;

  // When reaching cloned slides, reset instantly
  if (slideIndex >= totalSlides - 3) {
    setTimeout(() => {
      slidesWrapper.style.transition = "none";
      slideIndex = 0;
      slidesWrapper.style.transform = `translateX(0)`;
      setTimeout(() => {
        slidesWrapper.style.transition = "transform 0.8s linear";
      }, 50);
    }, 800);
  }
}, 2000); // slides every 2s
