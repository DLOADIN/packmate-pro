document.addEventListener('DOMContentLoaded', function() {
  const menuItems = document.querySelectorAll('.sidebar .menu a');

  // Function to set the active class based on the current URL
  function setActiveMenu() {
    const currentPage = window.location.pathname.split('/').pop(); // Get the current page filename
    menuItems.forEach(item => {
      const linkPage = item.getAttribute('href').split('/').pop(); // Get the link's page filename
      if (currentPage === linkPage) {
        item.classList.add('active');
      } else {
        item.classList.remove('active');
      }
    });
  }

  setActiveMenu(); // Set the active menu item on page load

  menuItems.forEach(item => {
    item.addEventListener('click', function() {
      menuItems.forEach(link => link.classList.remove('active'));
      this.classList.add('active');
    });
  });
});