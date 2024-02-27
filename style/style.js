//general
function scrollToAnchor(anchorId) {
  const targetElement = document.getElementById(anchorId);

  if (targetElement) {
    var scrollPosition = targetElement.offsetTop - (window.innerHeight / 4);
    targetElement.scrollIntoView({
      top: scrollPosition,
      behavior: 'smooth',
    });
  }
}

//accueil
/*
 let treeBouton = document.getElementById('tree-explication');
 treeBouton.addEventListener('mouseover', function() {
   this.style.zIndex = '2';
   this.style.transform = 'scale(1.1)';
 });

 
 treeBouton.addEventListener('mouseout', function() {
   this.style.zIndex = '1';
   this.style.transform = 'scale(1)';
 });

*/
function resizeMap() {
  var img = document.querySelector('.responsive-map'); // Adjust this selector as needed
  if (!img) return;

  var width = img.offsetWidth,
      height = img.offsetHeight,
      areas = img.useMap ? document.querySelectorAll('map[name="' + img.useMap.substring(1) + '"] area') : [];

  // Adjust this based on your original image size
  var originalWidth = 1920; // Example original size
  var originalHeight = 1080;

  var widthRatio = width / originalWidth;
  var heightRatio = height / originalHeight;

  areas.forEach(function(area) {
      var originalCoords = area.dataset.originalCoords || area.getAttribute('coords');
      if (!area.dataset.originalCoords) {
          area.dataset.originalCoords = originalCoords; // Save original coords
      }

      var coords = originalCoords.split(',').map(function(coord) {
          return Math.round(coord * widthRatio); // Adjust this if height ratio is also needed
      }).join(',');

      area.setAttribute('coords', coords);
  });
}

// Run on load and on resize
window.addEventListener('load', resizeMap);
window.addEventListener('resize', resizeMap);


//page ressources
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
  anchor.addEventListener('click', function (e) {
    e.preventDefault();

    var targetId = this.getAttribute('href').substring(1);
    var targetElement = document.getElementById(targetId);

    if (targetElement) {
      // Calculate the centered scroll position
      var scrollPosition = targetElement.offsetTop - (window.innerHeight / 4);

      // Scroll to the calculated position
      window.scrollTo({
        top: scrollPosition,
        behavior: 'smooth' // Optional: Add smooth scrolling effect
      });
    }
  });
});
