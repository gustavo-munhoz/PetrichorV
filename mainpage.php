<!DOCTYPE html>
<html lang="en">
<head>
    <!-- gemunu font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap" rel="stylesheet">

    <!-- bootstrap icons links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <title>PetrichorV</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="content">
        <div class="NavBar">
            <img class="logo" src="images/logo.png" alt="logo.png" onclick="returnHome()" >
            <div class="searchElements">
                <form id="searchForm" action="" method="GET" autocomplete="off">
                    <input id="productSearch" name="query" type="text" placeholder="Find something...">
                </form>
                <button id="cart" class="navButton"><i class="bi bi-cart-dash-fill"></i></button>
                <button id="hamburger" class="navButton"><i class="bi bi-list"></i></button>
            </div>
        </div>

        <div id="sideMenu" class="sideMenu">
            <a href="javascript:void(0)" class="closeButton" id="closeButton">&times;</a>
            <a href="cart.php">Cart</a>
            <a id="logoutButton">Logout</a>
            <a href="admin.php" id="adminButton">Admin</a>
        </div>

        <div class="storeItems">
            <?php
            include 'fetchItems.php';

            $items = fetchItems();

            if (!empty($items)) {
                foreach ($items as $item) {
                    echo "<div class='item' id='item-{$item->id}'>
                    <div class='imgContainer'>
                        <img class='itemImg' src='{$item->image}' alt='{$item->name}'>
                    </div>
                    <h3 class='itemName {$item->color}'>{$item->name}</h3>
                    <p class='itemPrice'>Price: \${$item->price}</p>
                    <p class='itemDescription'>{$item->description}</p>
                    <button class='cartButton' data-item-id='{$item->id}'>ADD TO CART</button>
                  </div>";
                }
            } else {
                echo "No items found.";
            }
            ?>
        </div>

        <div class="bottomBar">
            <div class="info">
                <div>
                    <h2>About Us</h2>
                    <p><i class="bi bi-github"></i> https://github.com/gustavo-munhoz</p>
                    <p><i class="bi bi-github"></i> https://github.com/RafaVenetikides</p>
                </div>
                <div>
                    <h2>Contact Us</h2>
                    <p><i class="bi bi-envelope-at-fill"></i> munhoz.correa@pucpr.edu.br</p>
                    <p><i class="bi bi-envelope-at-fill"></i> rafael.venetikides@pucpr.edu.br</p>
                </div>
            </div>
            <div class="logoWrapper">
                <img src="images/logo.png" alt="LOGO">
            </div>
        </div>
    </div>
    <script src="mainpage.js"></script>
    <script >
        function returnHome() {
            window.location.href = "mainpage.php"
        }
    </script>
</body>
</html>