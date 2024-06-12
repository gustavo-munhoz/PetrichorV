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
        sessionStorage.removeItem('user_id');
        window.location.href = 'login.html';
    });

    if (adminButton) {
        const username = sessionStorage.getItem('user_id');
        if (username !== '1') {
            adminButton.style.display = 'none';
        } else {
            adminButton.addEventListener('click', function() {
                window.location.href = 'admin.html';
            });
        }
    }

});