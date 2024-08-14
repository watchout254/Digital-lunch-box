<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Digital Lunchbox - Sign Up / Log In</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
    }

    .container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        width: 100%;
        max-width: 400px;
        margin: 0 20px;
    }

    h1 {
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    h2 {
        color: #555;
        margin-bottom: 15px;
        font-size: 20px;
    }

    input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #28a745;
        border: none;
        border-radius: 4px;
        color: #fff;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #218838;
    }

    a {
        color: #007bff;
        cursor: pointer;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    #logout {
        background-color: #dc3545;
    }

    #logout:hover {
        background-color: #c82333;
    }

    @media (max-width: 400px) {
        .container {
            padding: 15px;
            width: 90%;
        }

        input,
        button {
            padding: 8px;
        }

        h1,
        h2 {
            font-size: 18px;
        }
    }
    </style>
</head>

<body>
    <div class="container">
        <h1>Digital Lunchbox</h1>

        <!-- Sign Up Form -->
        <div id="signup-container">
            <h2>Sign Up</h2>
            <form id="signup-form" method="POST" action="signup.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
                <button type="submit">Sign Up</button>
            </form>
            <p>Already have an account? <a href="#" id="show-login">Log In</a></p>
        </div>

        <!-- Log In Form -->
        <div id="login-container" style="display:none;">
            <h2>Log In</h2>
            <form id="login-form" method="POST" action="login.php">
                <input type="text" name="username" placeholder="Username" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit">Log In</button>
            </form>
            <p>Don't have an account? <a href="#" id="show-signup">Sign Up</a></p>
            <p>Admin Login <a href="admin.php">Admin</a></p>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", () => {
        const signupContainer = document.getElementById("signup-container");
        const loginContainer = document.getElementById("login-container");

        // Toggle between Sign Up and Log In
        document.getElementById("show-login").addEventListener("click", (e) => {
            e.preventDefault();
            signupContainer.style.display = "none";
            loginContainer.style.display = "block";
        });

        document.getElementById("show-signup").addEventListener("click", (e) => {
            e.preventDefault();
            loginContainer.style.display = "none";
            signupContainer.style.display = "block";
        });
    });
    </script>
</body>

</html>