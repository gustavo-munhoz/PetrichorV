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
                    <img src='{$item->image}' alt='test'>
                </div>
                <div class='itemInfo'>
                    <p id='itemName'>{$item->name}</p>
                    <p id='itemPrice'>{$item->price}</p>
                </div>
                <button id='removeButton'>Remove Item</button>
            </div>";
            }
        } else {
            echo "No items found.";
        }
        ?>
    </div>

    <script src="admin.js"></script>
</body>
</html>