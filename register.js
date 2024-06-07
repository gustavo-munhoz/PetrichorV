document.addEventListener('DOMContentLoaded', function(){
    var register = document.getElementById('registerButton');
    var username = document.getElementById('username');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var passwordConfirmation = document.getElementById('passwordConfirmation');

    register.addEventListener('click', function(){
        register();
    });
});

function register(username, email, password, confirmation){

};