<?php
session_start();

if (isset($_SESSION["username"])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VOCO login</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</head>

<body>
    <main class="container">
        <div class="loginContainer">
            <form class="loginForm" method="post" id="loginForm">
                <h1>Login</h1>
                <img src="images/vocologo.png" alt="Voco logo" width="70">
                <input type="text" placeholder="Username" name="username" required>
                <div id="loginError" style="color: red;"></div>
                <button type="submit" class="btn" onclick="loginUser(event)">Login</button>
                <div class="secondary">
                    <p id="toggleFormText">Don't have an account? <a href="javascript:void(0);"
                            onclick="toggleForms()">Register</a></p>
                </div>
            </form>

            <form class="loginForm" method="post" id="registrationForm" style="display: none;">
                <h1>Register</h1>
                <img src="images/vocologo.png" alt="Voco logo" width="70">
                <input type="text" placeholder="Username" name="username" required>
                <div id="regError" style="color: red;"></div>
                <button type="submit" class="btn" onclick="registerUser(event)">Register</button>
                <div class="secondary">
                    <p id="toggleFormText">Already have an account? <a href="javascript:void(0);"
                            onclick="toggleForms()">Log in</a></p>
                </div>
            </form>
        </div>
    </main>

</body>

</html>