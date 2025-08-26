
const toggles = document.querySelectorAll('.faq-toggle');

toggles.forEach(btn => {
  const arrow = btn.querySelector('.faq-arrow');
  const content = btn.nextElementSibling;

  // initial arrow
  arrow.textContent = ">";

  btn.addEventListener('click', () => {
    const isOpen = content.classList.contains('show');

    if (isOpen) {
      content.classList.remove('show');
      arrow.textContent = ">";
      arrow.classList.remove('v-shape');
    } else {
      content.classList.add('show');
      arrow.textContent = "∨";
      arrow.classList.add('v-shape');
    }
  });
});

