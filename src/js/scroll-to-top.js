window.addEventListener('scroll', function() {
    var scrollToTopBtn = document.getElementById('scrollToTopBtn');
  
    if (window.pageYOffset > 150) {
        scrollToTopBtn.style.opacity = '1';
        scrollToTopBtn.style.right = '30px'; // Position finale pour l'animation
      } else {
        scrollToTopBtn.style.opacity = '0';
        scrollToTopBtn.style.right = '-50px'; // Position initiale pour l'animation
      }
  });
  
  document.getElementById('scrollToTopBtn').addEventListener('click', function() {
    scrollToTop(0, 600); // Scroll jusqu'au top de la page en 600ms (0.6 secondes)
  });
  
  function scrollToTop(scrollTo, duration) {
    const scrollStep = -window.scrollY / (duration / 15);
    const scrollInterval = setInterval(function() {
      if (window.scrollY !== scrollTo) {
        window.scrollBy(0, scrollStep);
      } else {
        clearInterval(scrollInterval);
      }
    }, 15);
  }
  
  // Animation slide right to left lors de l'affichage du bouton
  window.addEventListener('scroll', function() {
    var scrollToTopBtn = document.getElementById('scrollToTopBtn');
  
    if (window.scrollY > 150) {
      scrollToTopBtn.style.right = '30px'; // Position finale pour l'animation
    } else {
      scrollToTopBtn.style.right = '-50px'; // Position initiale pour l'animation
    }
  });
  