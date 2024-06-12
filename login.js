document.addEventListener('DOMContentLoaded', function(){
    let register = document.getElementById("registerButton");
    let login = document.getElementById("loginButton");
    let username = document.getElementById("username");
    let password = document.getElementById("password");

    register.addEventListener('click', function(){
        window.location.href = 'register.html';
    });

    login.addEventListener('click', function(){
        Login(username, password);
    });
});


function Login(usernameInput, passwordInput) {
    const username = usernameInput.value;
    const password = passwordInput.value;

    const formData = new FormData();
    formData.append('username', username);
    formData.append('password', password);

    fetch('login.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Login successful!');
                sessionStorage.setItem('username', username);
                window.location.href = 'mainpage.php';
            } else {
                alert('Login failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred. Please try again.');
        });
}