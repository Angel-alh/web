
  window.addEventListener('load', () => {
    const image = document.querySelector('.reveal-image');
    const heading = document.querySelector('.image-text');

    // Reveal image first
    image.classList.add('show');

    // After image animation completes (~1.2s), reveal text
    setTimeout(() => {
      heading.classList.add('show');
    }, 1200);
  });

