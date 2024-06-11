document.addEventListener('DOMContentLoaded', function(){
    let cartButton = document.getElementById('cart');
    let sideMenu = document.getElementById('sideMenu');
    let hamburgerButton = document.getElementById('hamburger');
    let closeButton = document.getElementById('closeButton');
    let logoutButton = document.getElementById('logoutButton');

    cartButton.addEventListener('click', function(){
        window.location.href = 'cart.php';
    });
    
    hamburgerButton.addEventListener('click', function() {
        sideMenu.style.width = '250px';
        mainContent.style.marginRight = '250px';
    });

    closeButton.addEventListener('click', function() {
        sideMenu.style.width = '0';
        mainContent.style.marginRight = '0';
    });

    logoutButton.addEventListener('click', function() {
        // TODO: Logout user when button is clicked
        window.location.href = 'login.html';
    });
});