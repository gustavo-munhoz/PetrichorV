document.addEventListener('DOMContentLoaded', function(){
    let sideMenu = document.getElementById('sideMenu');
    let cartButton = document.getElementById('cartButton');
    let hamburgerButton = document.getElementById('hamburger');
    let closeButton = document.getElementById('closeButton');
    let logoutButton = document.getElementById('logoutButton');
    let productSearch = document.getElementById('productSearch');
    let removeButtons = document.querySelectorAll('.removeButton');
    const modal = document.getElementById('addProductModal');
    const btn = document.getElementById('addButton');
    const span = document.getElementsByClassName('close')[0];

    btn.onclick = function() {
        modal.style.display = 'block';
    }

    span.onclick = function() {
        modal.style.display = 'none';
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = 'none';
        }
    }

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
        sessionStorage.removeItem('user_id');
        window.location.href = 'login.html';
    });

    productSearch.addEventListener('input', function() {
        const query = productSearch.value.toLowerCase();
        let items = document.querySelectorAll('.item');

        items.forEach(item => {
            const itemName = item.querySelector('.itemName').textContent.toLowerCase();
            if (itemName.includes(query)) {
                item.classList.remove('hidden');
            } else {
                item.classList.add('hidden');
            }
        });
    });

    removeButtons.forEach(button => {
        button.addEventListener('click', function() {
            let itemId = button.getAttribute('data-item-id');
            removeItem(itemId);
        });
    });

    document.getElementById('addProductForm').addEventListener('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);

        const productName = document.getElementById('productName').value;
        const productDescription = document.getElementById('productDescription').value;
        const productColor = document.getElementById('productColor').value;
        const productPrice = document.getElementById('productPrice').value;
        const productImage = document.getElementById('productImage');

        if (!productName || !productDescription || !productColor || !productPrice || !productImage) {
            alert('Please fill in all fields.');
            return;
        }

        if(productImage.files[0].type !== 'image/jpeg' && productImage.files[0].type !== 'image/png') {
            alert('Please upload a valid image file.');
            return;
        }

        if (productPrice < 0) {
            alert('Please enter a valid price.');
            return;
        }

        fetch('addProduct.php', {
            method: 'POST',
            body: formData
        }).then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Product added');
                location.reload();
                modal.style.display = 'none';
            }
        }).catch(error => {
            console.error('Error:', error);
            modal.style.display = 'none';
        });
    });
});

function removeItem(itemId) {
    let formData = new FormData();
    formData.append('itemId', itemId);

    fetch('removeItem.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Item removed');
            location.reload();
        }
    }).catch(error => {
        console.error('Error:', error);
    });
}