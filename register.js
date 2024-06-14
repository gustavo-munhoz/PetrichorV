document.addEventListener('DOMContentLoaded', function(){
    let registerButton = document.getElementById('registerButton');
    let username = document.getElementById('username');
    let email = document.getElementById('email');
    let password = document.getElementById('password');
    let passwordConfirmation = document.getElementById('passwordConfirmation');

    registerButton.addEventListener('click', function(){
        register(username.value, email.value, password.value, passwordConfirmation.value);
    });
});

function register(username, email, password, passwordConfirmation) {
    if (password !== passwordConfirmation) {
        alert('Passwords do not match.');
        return;
    }

    let formData = new FormData();
    formData.append('username', username);
    formData.append('email', email);
    formData.append('password', password);

    fetch('register.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Registration successful!');
                window.location.href = 'login.html';
            } else {
                alert('Registration failed: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('An error occurred during registration. Please try again.');
        });
}
