document.addEventListener('DOMContentLoaded', function(){
    let sideMenu = document.getElementById('sideMenu');
    let cartButton = document.getElementById('cartButton');
    let hamburgerButton = document.getElementById('hamburger');
    let closeButton = document.getElementById('closeButton');
    let logoutButton = document.getElementById('logoutButton');

    hamburgerButton.addEventListener('click', function() {
        sideMenu.style.width = '250px';
    });

    closeButton.addEventListener('click', function() {
        sideMenu.style.width = '0';
    });

    cartButton.addEventListener('click', function() {
        window.location.href = 'cart.php';
    });

    logoutButton.addEventListener('click', function() {
        // TODO: Logout user when button is clicked
        window.location.href = 'login.html';
    });
});