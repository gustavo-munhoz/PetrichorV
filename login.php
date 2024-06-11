<!DOCTYPE html>
    <head>
        <link rel="stylesheet" href="loginStyles.css">
        <!-- gemunu font links -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre:wght@200..800&display=swap" rel="stylesheet">
    
        <!-- bootstrap icons links -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <meta charset="UTF-8">
        <title>Login</title>
    </head>
    <body>
        <div class="NavBar">
            <img class="logo" src="images/logo.png" alt="logo.png">
        </div>
        <div class="centerContainer">
            <div class="loginItems">
                <h2 class= "welcomeMensage">Welcome Back. They'll surely feast on your flesh.</h2>
                <div class="userInfo">
                    <p>Email or username</p>
                    <input type="text" id = "username">
                    <p>Password</p>
                    <input type="password" id = "password"><br>
                    <div class="loginButtons">
                        <button id="loginButton">Login</button>
                        <button id="registerButton">Register</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="login.js"></script>
    </body>
    
</html>