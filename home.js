document.addEventListener('DOMContentLoaded', () => {
    const userDisplay = document.getElementById('userDisplay');
    const username = localStorage.getItem('username');

    if (username) {
        userDisplay.textContent = username;
    } else {
        userDisplay.textContent = 'Guest';
    }
});
