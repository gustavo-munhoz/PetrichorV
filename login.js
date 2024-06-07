document.addEventListener('DOMContentLoaded', function(){
    var register = document.getElementById("registerButton");
    var login = document.getElementById("loginButton");
    var username = document.getElementById("username");
    var password = document.getElementById("password");

    register.addEventListener('click', function(){
        window.location.href = 'register.html';
    });

    login.addEventListener('click', function(){
        Login(username, password);
    });
});

function Login(){

};