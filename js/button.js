const newButton = document.getElementById("button1");

const originalImage = "images/index.jpg"; // 🖼️ your default image
const newImage = "images/about.jpg";      // 🖼️ image to switch to

let isImageChanged = false; // Track toggle state

newButton.onclick = function toggleImage() {
  const header = document.getElementById("header");
  const img = header.querySelector("img");

  // Fade out the image
  img.style.transition = "opacity 0.2s ease";
  img.style.opacity = "0";

  setTimeout(() => {
    // Toggle image source
    img.src = isImageChanged ? originalImage : newImage;

    // Fade in the new image
    img.style.opacity = "1";

    // Flip the toggle state
    isImageChanged = !isImageChanged;
  }, 200);
};
