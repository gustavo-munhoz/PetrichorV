document.addEventListener('DOMContentLoaded', function(){
    let cartButton = document.getElementById('cart');
    let buttons = document.querySelectorAll('.cartButton');
    let sideMenu = document.getElementById('sideMenu');
    let hamburgerButton = document.getElementById('hamburger');
    let closeButton = document.getElementById('closeButton');
    let logoutButton = document.getElementById('logoutButton');
    let adminButton = document.getElementById('adminButton');


    cartButton.addEventListener('click', function(){
        window.location.href = 'cart.php';
    });

    hamburgerButton.addEventListener('click', function() {
        sideMenu.style.width = '250px';
    });

    closeButton.addEventListener('click', function() {
        sideMenu.style.width = '0';
    });

    logoutButton.addEventListener('click', function() {
        // TODO: Logout user when button is clicked
        window.location.href = 'login.html';
    });

    if (adminButton) {
        const username = sessionStorage.getItem('username');
        if (username !== 'admin') {
            adminButton.style.display = 'none';
        } else {
            adminButton.addEventListener('click', function() {
                window.location.href = 'admin.html';
            });
        }
    }

    document.addEventListener('DOMContentLoaded', (event) => {
        const searchInput = document.getElementById('productSearch');
        const items = document.querySelectorAll('.item');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();

            items.forEach(item => {
                const itemName = item.querySelector('.itemName').textContent.toLowerCase();
                if (itemName.includes(query)) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
    });

    buttons.forEach(button => {
        button.addEventListener('click', (e) => {
            let itemId = e.target.getAttribute('data-item-id');
            addToCart(itemId);
        });
    });

    });
});

function addToCart(itemId) {
    // TODO: Add item to cart
};