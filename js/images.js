    const imageGrid = document.getElementById('imageGrid');
    let currentFocused = null;

    document.querySelectorAll('.design-images img').forEach(img => {
      img.addEventListener('click', () => {
        const parent = img.parentElement;

        if (imageGrid.classList.contains('focused-view') && parent.classList.contains('focused')) {
          // Remove focus
          imageGrid.classList.remove('focused-view');
          parent.classList.remove('focused');
          currentFocused = null;
        } else {
          // Focus this image
          if (currentFocused) {
            currentFocused.classList.remove('focused');
          }
          imageGrid.classList.add('focused-view');
          parent.classList.add('focused');
          currentFocused = parent;
        }
      });
    });