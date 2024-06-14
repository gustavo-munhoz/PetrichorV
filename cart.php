<!DOCTYPE html>
<head>
    <!-- gemunu font links -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap" rel="stylesheet">

    <!-- bootstrap icons links -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <meta charset="UTF-8">
    <title>Your Cart</title>
    <link rel="stylesheet" href="cartStyles.css">
</head>
<body>
    <div class="NavBar">
        <img class="logo" src="images/logo.png" alt="logo.png" onclick="returnHome()">
        <div class="searchElements">
            <input id="productSearch" type="text" placeholder="Find something...">
            <button id="searchButton" class="navButton"><i class="bi bi-search"></i></button>
            <button id="cart" class="navButton"><i class="bi bi-cart-dash-fill"></i></button>
            <button id="hamburger" class="navButton"><i class="bi bi-list"></i></button>
        </div>
    </div>

    <div id="sideMenu" class="sideMenu">
        <a href="javascript:void(0)" class="closeButton" id="closeButton">&times;</a>
        <a href="mainpage.php">Store</a>
        <a id="logoutButton">Logout</a>
        <a href="admin.php" id="adminButton">Admin</a>
    </div>

    <div class="cart">
        <h2>Your cart</h2>
        <div class="cartProducts">
            <?php
            include "fillCart.php";

            session_start();

            $items = fetchCart($_SESSION['userId']);

            if(!empty($items)) {
                foreach($items as $item) {
                    echo '<div class="product">';
                    echo '<img src="' . htmlspecialchars($item['image']) . '" alt="' . htmlspecialchars($item['name']) . '">';
                    echo '<div class="productDescription">';
                    echo '<p id="itemName">' . htmlspecialchars($item['name']) . '</p>';
                    echo '<p id="itemPrice">$' . htmlspecialchars($item['price']) . '</p>';
                    echo '</div>';
                    echo '<div class="productQtd">';
                    echo '<p>x</p>';
                    echo '<p id="itemQtd">' . htmlspecialchars($item['quantity']) . '</p>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo "<h1>No items added to cart.</h1>";
            }

            ?>
        </div>
        <div class="purchaseElements">
            <div class="totalCost">
                <?php
                    $totalCost = array_reduce($items, function($sum, $item) {
                        return $sum + ($item['price'] * $item['quantity']);
                    }, 0);
                    echo '<p id= "total">Total:</p>';
                    echo '<p id = "totalCost">$' . number_format($totalCost, 2). '</p>';
                    ?>
            </div>
            <button id="purchaseButton">PURCHASE</button>
        </div>
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
    <script src="cart.js"></script>
    <script >
        function returnHome() {
            window.location.href = "mainpage.php"
        }
    </script>
</body>
</html>