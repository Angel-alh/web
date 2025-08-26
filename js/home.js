const text = "Welcome to Family Carpenter.";
let i = 0;
let forward = true;
const speed = 100; // typing speed in ms
const eraseSpeed = 50; // erasing speed
const pause = 1500; // pause before erasing

function typeEffect() {
  const element = document.getElementById("typewriter");

  if (forward) {
    // typing forward
    if (i < text.length) {
      element.innerHTML = text.substring(0, i + 1);
      i++;
      setTimeout(typeEffect, speed);
    } else {
      forward = false;
      setTimeout(typeEffect, pause);
    }
  } else {
    // erasing
    if (i > 0) {
      element.innerHTML = text.substring(0, i - 1);
      i--;
      setTimeout(typeEffect, eraseSpeed);
    } else {
      forward = true;
      setTimeout(typeEffect, speed);
    }
  }
}

// start typing when page loads
window.onload = typeEffect;
