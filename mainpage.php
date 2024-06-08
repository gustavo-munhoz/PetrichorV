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
    <div class="NavBar">
        <img class="logo" src="images/logo.png" alt="logo.png" >
        <div class="searchElements">
            <input id="productSearch" type="text" placeholder="Find something...">
            <button id="searchButton" class="navButton"><i class="bi bi-search"></i></button>
            <button id="cart" class="navButton"><i class="bi bi-cart-dash-fill"></i></button>
            <button id="hamburger" class="navButton"><i class="bi bi-list"></i></button>
        </div>
    </div>
    <div class="storeItems">

        <div class="item">
            <div class="imgContainer">
                <img class="itemImg" src="images/AtG_Missile_Mk_1.png" alt="ATG">
            </div>
            <h3 class="itemName green">AtG Missile Mk. 1</h3>
            <p class="itemPrice">Price: $30</p>
            <p class="itemDescription"><span class="dmgNumbers">10%</span> chance to fire a missile that deals <span class="dmgNumbers">300%</span> 
                <span class="stackNumbers">(+300% per stack)</span> TOTAL damage.</p>
            <button class="cartButton">ADD TO CART</button>
        </div>

        <div class="item">
            <div class="imgContainer">
                <img class="itemImg" src="images/item.png" alt="TEST">
            </div>
            <h3 class="itemName blue">Item Name</h3>
            <p class="itemPrice">Price</p>
            <p class="itemDescription">Item description</p>
            <button class="cartButton">ADD TO CART</button>
        </div>

        <div class="item">
            <div class="imgContainer">
                <img class="itemImg" src="images/item.png" alt="TEST">
            </div>
            <h3 class="itemName orange">Item Name</h3>
            <p class="itemPrice">Price</p>
            <p class="itemDescription">Item description</p>
            <button class="cartButton">ADD TO CART</button>
        </div>
        
        <div class="item">
            <div class="imgContainer">
                <img class="itemImg" src="images/item.png" alt="TEST">
            </div>
            <h3 class="itemName yellow">Item Name</h3>
            <p class="itemPrice">Price</p>
            <p class="itemDescription">Item description</p>
            <button class="cartButton">ADD TO CART</button>
        </div>

        <div class="item">
            <div class="imgContainer">
                <img class="itemImg" src="images/item.png" alt="TEST">
            </div>
            <h3 class="itemName red">Item Name</h3>
            <p class="itemPrice">Price</p>
            <p class="itemDescription">Item description</p>
            <button class="cartButton">ADD TO CART</button>
        </div>

        <div class="item">
            <div class="imgContainer">
                <img class="itemImg" src="images/item.png" alt="TEST">
            </div>
            <h3 class="itemName purple">Item Name</h3>
            <p class="itemPrice">Price</p>
            <p class="itemDescription">Item description</p>
            <button class="cartButton">ADD TO CART</button>
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

    <?php include 'db.php'; ?>
</body>
</html>