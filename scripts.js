const signInButton = document.getElementById('signIn');
const signUpButton = document.getElementById('signUp');
const container = document.querySelector('.container');

signInButton.addEventListener('click', () => {
    container.classList.remove('right-panel-active');
});

signUpButton.addEventListener('click', () => {
    container.classList.add('right-panel-active');
});

function signUp() {
    const username = document.getElementById('signUpUsername').value;
    const password = document.getElementById('signUpPassword').value;

    if (username && password) {
        localStorage.setItem('username', username);
        localStorage.setItem('password', password);
        alert('Sign up successful! Please sign in.');
    } else {
        alert('Please enter both username and password.');
    }
}

function signIn() {
    const username = document.getElementById('signInUsername').value;
    const password = document.getElementById('signInPassword').value;
    const storedUsername = localStorage.getItem('username');
    const storedPassword = localStorage.getItem('password');

    if (username === storedUsername && password === storedPassword) {
        alert('Sign in successful! Redirecting to homepage...');
        window.location.href = 'home.html';
    } else {
        alert('Invalid username or password.');
    }
}
