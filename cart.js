document.addEventListener('DOMContentLoaded', function(){
    let cartButton = document.getElementById('cart');
    let sideMenu = document.getElementById('sideMenu');
    let hamburgerButton = document.getElementById('hamburger');
    let closeButton = document.getElementById('closeButton');
    let logoutButton = document.getElementById('logoutButton');
    let purchaseButton = document.getElementById('purchaseButton');
    let userId = sessionStorage.getItem('user_id');

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
                window.location.href = 'admin.php';
            });
        }
    }

    purchaseButton.addEventListener('click', function() {
        if(userId === null) {
            alert('User not logged in.');
        } else {
            purchase();
        }
    });

});

function purchase(){
    fetch('purchase.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({})
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Purchase successful! Your cart has been cleared.");
            // Optionally reload the page or redirect the user
            location.reload();
        } else {
            alert("Failed to complete the purchase. Please try again.");
        }
    })
    .catch(error => {
        console.error("Error: ", error);
        alert("An error occurred. Please try again.");
    });
}