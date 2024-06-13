<!DOCTYPE html>
<head>
    <!-- gemunu font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap" rel="stylesheet">

    <!-- bootstrap icons links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <title>Admin</title>
    <link rel="stylesheet" href="adminStyles.css">
</head>
<body>
    <div class="NavBar">
        <img class="logo" src="images/logo.png" alt="logo.png" >
        <div class="searchElements">
            <button id="cartButton" class="navButton"><i class="bi bi-cart-dash-fill"></i></button>
            <button id="hamburger" class="navButton"><i class="bi bi-list"></i></button>
        </div>
    </div>

    <div id="sideMenu" class="sideMenu">
        <a href="javascript:void(0)" class="closeButton" id="closeButton">&times;</a>
        <a href="mainpage.php">Store</a>
        <a href="cart.php">Cart</a>
        <a id="logoutButton">Logout</a>
    </div>

    <div class="itemManager">
        <div>
            <button id="addButton">+</button>
            <input id="productSearch" type="text" placeholder="Search item...">
        </div>

        <?php
        include 'fetchItems.php';

        $items = fetchItems();

        if (!empty($items)) {
            foreach ($items as $item) {
                echo "<div class='item'>
                <div class='imgContainer'>
                    <img class='imageDisplay' src='{$item->image}' alt='test'>
                </div>
                <div class='itemInfo'>
                    <p class= 'itemName' id='itemName'>{$item->name}</p>
                    <p id='itemPrice'>{$item->price}</p>
                </div>
                <button class='removeButton' data-item-id='{$item->id}'>Remove Item</button>
            </div>";
            }
        } else {
            echo "No items found.";
        }
        ?>
    </div>

    <div id="addProductModal" class="modal">
        <div class="modal-content">
            <div>
                <span class="close">&times;</span>
                <h2>Add New Product</h2>
            </div>
            <form id="addProductForm">
                <div class="container">
                    <label for="productName">Name:</label>
                    <input type="text" id="productName" name="productName" required>
                </div>
                <div class="container">
                    <label for="productDescription">Description:</label>
                    <textarea id="productDescription" name="productDescription" required></textarea>
                </div>

                <div class="container">
                <label for="productColor">Color:</label>
                    <select id="productColor" name="productColor" required>
                        <option value="" disabled selected hidden>Select a color</option>
                        <option value="White">White</option>
                        <option value="Green">Green</option>
                        <option value="Red">Red</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Blue">Blue</option>
                        <option value="Purple">Purple</option>
                        <option value="Orange">Orange</option>
                    </select>
                </div>
                
                <div class="container">
                    <label for="productPrice">Price:</label>
                    <input type="number" id="productPrice" name="productPrice" required>
                </div>

                <div class="container">
                    <label for="productImage">Image URL:</label>
                    <input type="file" id="productImage" name="productImage" required>
                </div>
                <div class="container">
                    <button type="submit" id="confirmButton">Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <script src="admin.js"></script>
</body>
</html>