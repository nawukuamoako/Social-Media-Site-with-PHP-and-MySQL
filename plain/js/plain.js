// Open side nav on mobile view
function openNav() {
    document.getElementById("sidebar").style.display = "block";
    document.getElementById("btn").style.display = "none";
  }

  // Close side nav on mobile view 
  function closeNav() {
    if (window.innerWidth <= 500){
      document.getElementById("btn").style.display = "block";
      document.getElementById("sidebar").style.display = "none";
    }
  }
