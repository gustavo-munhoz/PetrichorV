document.addEventListener('DOMContentLoaded', function(){
    let cartButton = document.getElementById('cart');
    let searchInput = document.getElementById('productSearch');
    let items = document.querySelectorAll('.item');

    cartButton.addEventListener('click', function(){
        window.location.href = 'cart.php';
    });
    
    searchInput.addEventListener('input', function(){
        let query = searchInput.value.toLowerCase();

        items.forEach(item =>{
            let itemName = item.querySelector('.item-name').textContent.toLowerCase();
            if(itemName.includes(query)){
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });

});