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
        <img class="logo" src="images/logo.png" alt="logo.png" >
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
        <a href="admin.html" id="adminButton">Admin</a>
        <!-- TODO: add admin button, to add or remove products from the store -->
    </div>

    <div class="cart">
        <h2>Your cart</h2>
        <div class="cartProducts">
            <div class="product">
                <img src="images/AtG_Missile_Mk_1.png" alt="ATG">
                <div class="productDescription">
                    <p id="itemName">ATG Missile MK.1</p>
                    <p id="itemPrice">Price</p>
                </div>
                <div class="productQtd">
                    <p>x</p>
                    <p id="itemQtd">QTD</p>
                </div>
            </div>
            <div class="product">
                <img src="" alt="TEST">
                <div class="productDescription">
                    <p id="itemName">TEST</p>
                    <p id="itemPrice">TEST</p>
                </div>
                <div class="productQtd">
                    <p>x</p>
                    <p id="itemQtd">QTD</p>
                </div>
            </div>
        </div>
        <div class="purchaseElements">
            <div class="totalCost">
                <p id= "total">Total:</p>
                <p id = "totalCost">$XXXXX</p>
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
</body>
</html>