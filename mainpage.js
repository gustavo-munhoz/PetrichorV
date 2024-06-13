document.addEventListener('DOMContentLoaded', function(){
    let cartButton = document.getElementById('cart');
    let buttons = document.querySelectorAll('.cartButton');
    let sideMenu = document.getElementById('sideMenu');
    let hamburgerButton = document.getElementById('hamburger');
    let closeButton = document.getElementById('closeButton');
    let logoutButton = document.getElementById('logoutButton');
    let adminButton = document.getElementById('adminButton');
    let searchInput = document.getElementById('productSearch');
    let items = document.querySelectorAll('.item');


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

function addToCart(itemId) {
    let userId = sessionStorage.getItem('user_id');
    fetch('addToCart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            userId: userId,
            itemId: itemId
        })
    })
    .then(response => response.json())
    .then(data => {
        console.log(data.mensage);
    })
    .catch(error => {
        console.error('Error:', error);
    });
}